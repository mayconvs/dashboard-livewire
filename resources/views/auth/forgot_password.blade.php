{{-- C:\laragon\www\dashboard-livewire\resources\views\auth\forgot_password.blade.php --}}
<x-layouts.guest title="Esqueci a senha - {{ env('APP_NAME') }}">
    <div
        class="fixed top-0 left-0 right-0 z-30 h-16 flex justify-end items-right px-4 bg-gray-50 dark:border-gray-700 dark:bg-gray-950 ">
        <button class="hover:cursor-pointer hover:text-primary" @click="toggleDarkMode()">
            <template x-if="!isDark">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M20.354 15.354A9 9 9 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                </svg>
            </template>
            <template x-if="isDark">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 3v2.25m6.364.386-1.591 1.591M21 12h-2.25m-.386 6.364-1.591-1.591M12 18.75V21m-4.773-4.227-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" />
                </svg>
            </template>
        </button>
    </div>

    <div class="relative flex min-h-screen w-full bg-gray-50 dark:bg-gray-950">
        <div class="flex flex-1 justify-center items-center p-4 lg:p-8">
            <div class="bg-gray-50 dark:bg-gray-900 rounded-xl shadow-2xl p-8 w-full max-w-md">

                <div class="flex flex-col gap-3 mb-6">
                    <p class="text-3xl font-black text-gray-900 dark:text-gray-50">Esqueci minha senha</p>
                    <p class="text-gray-600 dark:text-gray-300 text-sm">
                        Informe o e-mail que você usou ao se cadastrar. Enviaremos um link para redefinir sua senha.
                    </p>
                </div>

                {{-- Mensagem de sucesso (por exemplo: "Nós enviamos o link...") --}}
                @if (session('status'))
                    <div
                        class="mb-4 p-3 rounded-md bg-green-50 dark:bg-green-900/30 text-green-800 dark:text-green-200 text-sm">
                        {{ session('status') }}
                    </div>
                @endif

                {{-- Formulário: rota típica do Laravel para envio do link é route('password.email') --}}
                <form method="POST" action="{{ route('send_reset_password_link') }}" class="flex flex-col gap-4">
                    @csrf

                    <x-forms.input type="email" name="email" label="E-mail cadastrado"
                        placeholder="seu.email@exemplo.com" wire:model="email" required autofocus />


                        @if(session('server_message'))
                        <p class="mt-1 text-sm border text-center p-4 rounded border-gray-100 text-gray-300">{{ session('server_message') }}</p>
                        @endif

                    <x-forms.button type="submit" size="lg">
                        Enviar link de redefinição
                    </x-forms.button>
                </form>

                <div class="text-center mt-6">
                    <a class="text-primary font-medium hover:underline" href="{{ route('login') }}">
                        Voltar ao login
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-layouts.guest>
