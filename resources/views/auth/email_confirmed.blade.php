{{-- C:\laragon\www\dashboard-livewire\resources\views\auth\email_confirmed.blade.php --}}
<x-layouts.guest title="E-mail Confirmado! - {{ env('APP_NAME') }}">
    <div
        class="fixed top-0 left-0 right-0 z-30 h-16 flex justify-end items-right px-4 bg-gray-50 dark:border-gray-700 dark:bg-gray-900">
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

    <div class="relative flex min-h-screen w-full flex-col bg-gray-50 dark:bg-gray-900 overflow-x-hidden">
        <div class="flex flex-1 justify-center items-center p-4 lg:p-8">
            <div class="flex flex-col max-w-6xl">
                <div
                    class="bg-gray-50 dark:bg-gray-900 text-gray-900 dark:text-gray-50 rounded-xl shadow-2xl shadow-black/20 p-8 sm:p-12 md:p-16 w-full flex justify-center">
                    
                    <div class="flex flex-col gap-8 w-full max-w-md mx-auto text-center">

                        <div class="flex justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor"
                                class="w-20 h-20 text-green-500">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12.75l2.25 2.25L15 10.5m6 1.5a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>

                        <p class="text-3xl font-black">E-mail confirmado!</p>

                        <p class="text-base leading-normal">
                            Obrigado, {{ $name }}! Seu e-mail foi confirmado com sucesso e sua conta já está ativa!
                        </p>

                        <div class="flex flex-col gap-3">
                            <a href="{{ route('login') }}"
                                class="h-14 flex items-center justify-center rounded-lg text-base font-medium text-white bg-primary hover:bg-primary/90 transition-colors">
                                Fazer login
                            </a>

                            @auth
                                <a href="{{ route('dashboard') }}"
                                    class="w-full h-14 flex items-center justify-center rounded-lg text-base font-medium text-primary border border-primary hover:bg-primary/10 transition-colors">
                                    Ir para o painel
                                </a>
                            @endauth
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</x-layouts.guest>
