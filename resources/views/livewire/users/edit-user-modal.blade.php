{{-- C:\laragon\www\dashboard-livewire\resources\views\livewire\users\edit-user-modal.blade.php --}}
<div x-data="{ open: @entangle('modalOpen') }">
    <div x-show="open" class="fixed inset-0 bg-black/50 z-40"></div>

    <div x-show="open" x-transition
        class="fixed z-50 top-1/2 left-1/2 w-full max-w-lg -translate-x-1/2 -translate-y-1/2 
                bg-white dark:bg-gray-800 p-6 rounded-xl shadow-lg">

        <h2 class="text-lg font-semibold mb-4 text-gray-800 dark:text-gray-200">
            Editar Usuário
        </h2>

        <form wire:submit.prevent="save" class="space-y-4">

            <div>
                <x-forms.input type="text" name="name" wire:model="name" label="Nome"></x-forms.input>
            </div>

            <div>
                <x-forms.input type="text" name="last_name" wire:model="last_name" label="Sobrenome"></x-forms.input>
            </div>

            <div>
                <x-forms.input type="email" name="email" wire:model="email" label="E-mail"></x-forms.input>

            </div>

            <div>
                <x-forms.input-phone name="phone" wire_model="phone" label="Telefone" placeholder="DDD + Número"
                    required />
            </div>

            <div>


                <x-forms.select wire:model="cargo_id" name="cargo_id" label="Cargo" :items="$cargos" itemValue="id"
                    itemLabel="name" placeholder="Selecione um cargo" />

            </div>


            <div>

                <x-forms.select wire:model="role_id" name="role_id" label="Permissão" :items="$roles" itemValue="id"
                    itemLabel="label" placeholder="Selecione uma permissão" />


            </div>

            <div>
                <label class="cursor-pointer">Status
                    <input type="checkbox" wire:model="active"> Ativo
                </label>
            </div>

            <div class="flex justify-end gap-3 mt-4">
                <x-forms.button @click="open = false">Cancelar</x-forms.button>
                <x-forms.button type="submit">Salvar</x-forms.button>
            </div>

        </form>
        @script
            <script>
                Livewire.on('user_updated', (data) => {
                    // Essa função está definida em resources/js/notifications.js
                    notify(data[0].type, data[0].title, data[0].message);
                });
            </script>
        @endscript
    </div>
</div>
