<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Perfil extends Component
{
    use WithFileUploads;

    public $new_photo_profile;
    public $uploadError = null;
    public $successMessage = null;

    // Escuta evento para atualizar a foto no frontend imediatamente
    protected $listeners = ['avatarUpdated' => '$refresh'];

    public function updatedNewPhotoProfile()
    {
        $this->uploadError = null;
        $this->successMessage = null;

        // Validação
        $this->validate([
            'new_photo_profile' => 'image|mimes:jpeg,png,jpg,gif,webp|max:4096',
        ], [
            'new_photo_profile.image' => 'O arquivo deve ser uma imagem válida.',
            'new_photo_profile.mimes' => 'Formatos permitidos: JPG, PNG, GIF ou WebP.',
            'new_photo_profile.max' => 'A imagem não pode ultrapassar 4MB.',
        ]);

        try {
            $user = Auth::user();

            // Força atualização do usuário (evita cache)
            $user = $user->fresh();

            $directory = "users/{$user->id}";
            Storage::disk('public')->makeDirectory($directory); // Garante que a pasta existe

            $ext = $this->new_photo_profile->getClientOriginalExtension();
            $file_name = "avatar." . $ext;

            // Remove avatares antigos
            $files = Storage::disk('public')->files($directory);
            foreach ($files as $file) {
                if (str_starts_with(basename($file), 'avatar.')) {
                    Storage::disk('public')->delete($file);
                }
            }

            // Salva nova foto
            $path = $this->new_photo_profile->storeAs($directory, $file_name, 'public');

            // Atualiza caminho no banco
            $user->photo_perfil_path = $path;
            $user->save();

            $this->dispatch('notify', [
                'type' => 'success',
                'title' => 'Sucesso!',
                'message' => 'Foto de perfil atualizada com sucesso!'
            ]);
            
            $this->dispatch('avatar-updated', [
                'url' => $user->get_avatar_url() . '?v=' . now()->timestamp
            ]);

        } catch (\Exception $e) {
            \Log::error('Erro ao atualizar avatar: ' . $e->getMessage());
            $this->uploadError = 'Erro ao salvar a foto. Tente novamente.';
            $this->reset('new_photo_profile');
        }
    }

    public function render()
    {
        return view('livewire.perfil');
    }
}