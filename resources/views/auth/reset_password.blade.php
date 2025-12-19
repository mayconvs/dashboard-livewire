{{-- C:\laragon\www\dashboard-livewire\resources\views\auth\reset_password.blade.php --}}
<x-layouts.guest title="Redefinir senha - {{ env('APP_NAME') }}">
    <div
        class="fixed top-0 left-0 right-0 z-30 h-16 flex justify-end items-right px-4 bg-gray-50 dark:border-gray-700 dark:bg-gray-950">
        <button class="hover:cursor-pointer hover:text-primary" @click="toggleDarkMode()">
            <template x-if="!isDark">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M20.354 15.354A9 9 9 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                </svg>
            </template>
            <template x-if="isDark">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 3v2.25m6.364.386-1.591 1.591M21 12h-2.25m-.386 6.364-1.591-1.591M12 18.75V21m-4.773-4.227-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" />
                </svg>
            </template>
        </button>
    </div>

    <div class="relative flex min-h-screen w-full bg-gray-50 dark:bg-gray-950">
        <div class="flex flex-1 justify-center items-center p-4">
            <div class="bg-gray-50 dark:bg-gray-900 rounded-xl shadow-2xl p-8 w-full max-w-md">

                <div class="flex flex-col gap-3 mb-6">
                    <p class="text-4xl font-black text-gray-900 dark:text-gray-50">Redefinir senha</p>
                    <p class="text-gray-600 dark:text-gray-300 text-sm">
                        Defina uma nova senha para acessar sua conta.
                    </p>
                </div>

                <form method="POST" action="{{ route('reset_password_update') }}" class="flex flex-col gap-4">
                    @csrf
                    <input type="hidden" name="remember_token" value="{{ $remember_token }}">
                    {{-- <input type="hidden" name="email" value="{{ $email }}"> --}}

                    <label class="flex flex-col">
                        <p class="text-gray-900 dark:text-gray-50 text-base font-medium pb-2">Nova senha</p>
                        <input
                            class="form-input w-full rounded-lg border border-[#324467] bg-gray-50 dark:bg-gray-900 text-gray-900 dark:text-gray-50 h-14 p-[15px]"
                            type="password" name="new_password" placeholder="Digite a nova senha" />

                        @error('new_password')
                            <p class="mt-1 text-sm text-danger">{{ $message }}</p>
                        @enderror
                    </label>

                    <label class="flex flex-col">
                        <p class="text-gray-900 dark:text-gray-50 text-base font-medium pb-2">Confirmar senha</p>
                        <input
                            class="form-input w-full rounded-lg border border-[#324467] bg-gray-50 dark:bg-gray-900 text-gray-900 dark:text-gray-50 h-14 p-[15px]"
                            type="password" name="new_password_confirmation" placeholder="Confirme a nova senha" />

                        @error('new_password_confirmation')
                            <p class="mt-1 text-sm text-danger">{{ $message }}</p>
                        @enderror
                    </label>

                    <x-forms.button type="submit" size="lg">
                        Definir senha
                    </x-forms.button>

                    {{-- <button
                        class="h-14 rounded-lg bg-primary text-white font-medium hover:bg-primary/90 transition-colors"
                        type="submit">
                        Definir senha
                    </button> --}}
                </form>

                {{-- @if (session('status'))
                    <p class="mt-4 text-sm text-success text-center">{{ session('status') }}</p>
                @endif --}}

                <div class="text-center mt-4">
                    <a class="text-primary font-medium hover:underline" href="{{ route('login') }}">
                        Não precisa mais, já lembrei!
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-layouts.guest>
