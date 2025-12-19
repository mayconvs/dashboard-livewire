<?php

namespace App\Livewire\Users;

use Livewire\Component;
use App\Models\User;
use App\Models\Cargo;
use App\Models\Role;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Log;
use Throwable;

class EditUserModal extends Component
{
    public $modalOpen = false;
    public $user_id;

    public $name;
    public $last_name;
    public $email;
    public $phone;
    public $cargo_id;
    public $role_id;
    public $active;

    protected $listeners = ['open-edit-user-modal' => 'loadUser'];

    public function mount(User $user)
    {

        if ($user->id) {
            $user = User::findOrFail($user->id);
            $this->user_id = $user->id;
            $this->name = $user->name;
            $this->email = $user->email;
            $this->cargo_id = $user->cargo_id; // ← Atribui o cargo_id aqui
            $this->active = (bool) $user->active;
        }
    }

    public function loadUser($id)
    {
        $this->resetValidation();

        $this->modalOpen = true;
        $this->user_id = $id;

        $user = User::findOrFail($id);

        $this->name = $user->name;
        $this->last_name = $user->last_name;
        $this->email = $user->email;
        $this->phone = $user->phone;
        $this->cargo_id = $user->cargo_id;
        $this->role_id = $user->role_id;
        $this->active = (bool) $user->active;
    }

    public function save()
    {
        try {
            //dd($this->cargo_id); // teste
            $this->validate([
                'name' => 'required|string|max:40',
                'last_name' => 'nullable|string|max:40',
                'email' => ['required', 'email', 'email:rfc,dns', 'min:2', 'max:100', Rule::unique('users')->ignore($this->user_id)],
                'phone' => 'nullable|string|max:40|regex:/^\+[1-9]\d{1,14}$/',
                'cargo_id' => ['required', 'integer', 'min:1', Rule::exists('cargos', 'id')],
                'role_id' => ['required', Rule::exists('roles', 'id')],
                /* 'active'    => 'boolean' */
            ], [
                'name.required' => 'O nome é obrigatório.',
                'name.max' => 'O nome deve ter, no máximo, :max caracteres.',
                'last_name.required' => 'O sobrenome é obrigatório.',
                'last_name.max' => 'O sobrenome deve ter, no máximo, :max caracteres.',

                'email.required' => 'O e-mail é obrigatório.',
                'email.min' => 'O e-mail deve ter no mínimo :min caracteres.',
                'email.max' => 'O e-mail deve ter no máximo :max caracteres.',
                'email.email' => 'O e-mail deve ser válido.',
                'email.unique' => 'O e-mail deve ser válido.',

                'phone.required' => 'O telefone é obrigatório.',
                'phone.max' => 'O telefone deve ter, no máximo, :max caracteres.',
                'phone.regex' => 'O telefone deve estar em algum desses formatos: "(48) 99999-9999", "48 99999-9999" ou "48999999999"',

                'cargo_id.required' => 'O cargo é obrigatório.',
                'cargo_id.min' => 'O valor deve ser maior do que zero',
                'cargo_id.integer' => 'O cargo deve ser um número.',
                'cargo_id.exists' => 'O cargo deve existir em nosso banco de dados.',

                'role_id.required' => 'A permissão é obrigatória.',
                'role_id.exists' => 'A permissão deve existir em nosso banco de dados.',

                /* 'active.boolean' => 'O Status está incorreto.', */
            ]);

            $user = User::findOrFail($this->user_id);

            $user->update([
                'name' => $this->name,
                'last_name' => $this->last_name,
                'email' => $this->email,
                'phone' => $this->phone,
                'cargo_id' => $this->cargo_id,
                'role_id' => $this->role_id,
                'active' => $this->active,
            ]);

            $this->dispatch('user_updated', [
                'type' => 'success',
                'title' => 'Sucesso!',
                'message' => 'Usuário atualizado com sucesso!'
            ]);

            $this->modalOpen = false;

        } catch (Throwable $e) {

            // 🧾 LOG COMPLETO (dev / produção)
            Log::error('Erro ao atualizar usuário', [
                'user_id' => $this->user_id,
                'payload' => [
                    'name' => $this->name,
                    'last_name' => $this->last_name,
                    'email' => $this->email,
                    'phone' => $this->phone,
                    'cargo_id' => $this->cargo_id,
                    'role_id' => $this->role_id,
                    'active' => $this->active,
                ],
                'exception' => $e,
            ]);

            // 🚨 Mensagem genérica para o usuário
            $this->dispatch('user_updated', [
                'type' => 'error',
                'title' => 'Erro',
                'message' => 'Não foi possível atualizar o usuário. Tente novamente.',
            ]);
        }
    }

    public function render()
    {
        return view('livewire.users.edit-user-modal', [
            'roles' => Role::all(),
            'cargos' => Cargo::all(),
        ]);
    }
}
