{{-- C:\laragon\www\dashboard-livewire\resources\views\livewire\header.blade.php --}}
<header id="main-header"
    class="fixed top-0 left-0 sm:left-0 right-0 z-60 h-16 flex items-center px-2 sm:px-2 md:px-6 lg:px-6 bg-white border-b border-[var(--gray-200)] dark:border-[var(--gray-700)] dark:bg-[var(--gray-950)] shadow-sm md:left-16 lg:left-64">

    <div class="top-4 left-4 z-50 md:hidden">
        <button @click="$dispatch('toggle-mobile-sidebar')"
            class="p-2 mr-2 rounded-lg bg-white/10 hover:bg-white/20 hover:cursor-pointer transition-colors">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
    </div>
    <div class="flex w-full">
        <span class="material-icons-outlined text-[var(--gray-500)] dark:text-[var(--gray-400)]"><svg
                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
            </svg>
        </span>
        <input
            class="ml-2 bg-transparent border-none focus:ring-0 w-full text-[var(--gray-800)] dark:text-[var(--gray-200)] placeholder-[var(--gray-500)] dark:placeholder-[var(--gray-400)] outline-none"
            placeholder="Procurar" type="text" />
    </div>
    <div class="flex space-x-6 ml-auto flex-shrink-0">

        <div class="flex  space-x-6 relative">
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


            <button @click="open_notification = !open_notification"
                class="relative text-muted hover:text-[var(--color-primary-500)] hover:cursor-pointer transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                        d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
                </svg>
                <span class="absolute top-0 right-0 block w-2 h-2 bg-red-500 rounded-full ring-2 ring-surface"></span>
            </button>

            <div x-show="open_notification" @click.outside="open_notification = false"
                x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 scale-95"
                x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-150"
                x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                class="absolute top-16 right-6 w-96 bg-white dark:bg-[var(--gray-900)] rounded-lg shadow-2xl text-white z-10">
                <div class="p-4 flex justify-between items-center border-b border-[var(--gray-700)] ">
                    <h2 class="text-lg font-bold text-[var(--gray-800)] dark:text-[var(--gray-50)] ">Notificações</h2>
                    <button
                        @click="open_notification = !open_notification"class="text-gray-400 hover:text-primary hover:cursor-pointer">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M6 18L18 6M6 6l12 12" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"></path>
                        </svg>
                    </button>
                </div>
                <div class="p-4 space-y-4">
                    <div class="flex items-start space-x-4">
                        <div class="relative flex-shrink-0 hover:cursor-pointer">
                            <img alt="Terry Franci avatar" class="h-10 w-10 rounded-full"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuBlffgB4UycIWRnIxWoRfoUPMHIq4NR5_saGHMZfG8Xg_bkEcnGaGxBsCx5q6KLbIqxfc1UnU-wwLN5Ic_n_sPHDANskDwKEYM5WocuGjWyvkhm7bG3dL6wMRxjRlIX1YdfdI10a_tKnaV0Ta8Uhw-woUAdZvICFZERJj44l_TkzZVrpFNjK80lCnz7hmnmJiyZRYBfegYOBDw3-Plz0R_4GQohrS0LOuKYXEP3JZQnCurAnoGvLMOL4saZMhvtMdEyzvMYh8MUYQg" />
                            <span
                                class="absolute bottom-0 right-0 block h-2.5 w-2.5 rounded-full bg-green-400 ring-2 ring-[var(--gray-800)]"></span>
                        </div>
                        <div>
                            <p class="text-sm text-[var(--gray-800)] dark:text-[var(--gray-50)]"><span
                                    class="font-bold text-[var(--gray-800)] dark:text-[var(--gray-50)] hover:cursor-pointer">Terry
                                    Franci</span> solicitou
                                permissão para alterar <span
                                    class="font-bold text-[var(--gray-800)] dark:text-[var(--gray-50)] hover:cursor-pointer hover:text-[var(--color-primary-500)]">Projeto
                                    – Nganter App</span></p>
                            <p class="text-xs text-gray-500 mt-1">Projeto • há 5 min</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-4">
                        <div class="relative flex-shrink-0 hover:cursor-pointer">
                            <img alt="Alena Franci avatar" class="h-10 w-10 rounded-full"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuAfUhBDoEYFcQo3v94qeALQXPR1T13QxIDo-RbBIO6kmCyFKyHwTI6lMO06UG4xQW3Sg9xV6CzUMxSS-rUHeAXcHmlpdWWmQniOl2-QaoX6XOVsmEg8V1OacXyJMAdYZ2AgFjZHfaVTs8qPSI5kXXUCNl75XfTjlRmIcP0Wx5jdJT1d0Yr93Aowd53qYsn09g-Y-Dq_dpoDE7MNOup_rnBerEbQ-NDUN-RRCyZ6vf82kpGrwXr_y3yut2jJlyLThkiw0J3gd4EkleI" />
                            <span
                                class="absolute bottom-0 right-0 block h-2.5 w-2.5 rounded-full bg-green-400 ring-2 ring-[var(--gray-800)]"></span>
                        </div>
                        <div>
                            <p class="text-sm text-[var(--gray-800)] dark:text-[var(--gray-50)]"><span
                                    class="font-bold text-[var(--gray-800)] dark:text-[var(--gray-50)] hover:cursor-pointer">Alena
                                    Franci</span> solicitou
                                permissão para alterar <span
                                    class="font-bold text-[var(--gray-800)] dark:text-[var(--gray-50)] hover:cursor-pointer hover:text-[var(--color-primary-500)]">Projeto
                                    – Nganter App</span></p>
                            <p class="text-xs text-gray-500 mt-1">Projeto • há 8 min</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-4">
                        <div class="relative flex-shrink-0 hover:cursor-pointer">
                            <img alt="Jocelyn Kenter avatar" class="h-10 w-10 rounded-full"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuD3VNj0CKBfRXqsIofxhaaQbn4eXrGo1lO7YL0gHAeEWKbG2jywcR3pqfV4VXJBMvM40A0QkH1OIqRQwzc_TNhVRa5G_oRQ7oQSZHbTpVkc_xH0wEtbpV-LpHmvxwJi9yCSW41_FXf0VaWHpSkm6Ygyhvm8UjVMf51uskDNYUtA06uUQc_J9eima6-ZzL4RycugFNWJi9oOCUZ8A_yxAvPlv8yFaSIsuITb7nwa0GAy2LItHDfBndjmfyf94iEYbE24v9Xn8fecSzg" />
                            <span
                                class="absolute bottom-0 right-0 block h-2.5 w-2.5 rounded-full bg-green-400 ring-2 ring-[var(--gray-800)]"></span>
                        </div>
                        <div>
                            <p class="text-sm text-[var(--gray-800)] dark:text-[var(--gray-50)]"><span
                                    class="font-bold text-[var(--gray-800)] dark:text-[var(--gray-50)] hover:cursor-pointer">Jocelyn
                                    Kenter</span> solicitou
                                permissão para alterar <span
                                    class="font-bold text-[var(--gray-800)] dark:text-[var(--gray-50)] hover:cursor-pointer hover:text-[var(--color-primary-500)]">Projeto
                                    – Nganter App</span></p>
                            <p class="text-xs text-gray-500 mt-1">Projeto • há 15 min</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-4">
                        <div class="relative flex-shrink-0 hover:cursor-pointer">
                            <img alt="Brandon Philips avatar" class="h-10 w-10 rounded-full"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuCcdYTmr2T62dfHqFKGzmxJyxrtcQaPc6ZPstwAyXaLgG3BN3nLQjzMG8vPk7chInO2X_i4QreQacgaBguaoWOgtJexZJV8YAPH6B_DsJnAUX3sGXNuIKJtCHNjr_Z41Q3ZiwUtLbTYNBPrkByEXfZ7FARPThNpSyO1vv6Bri3bpAS0I4obqyvV19x2sLO4KJeRe9RKnbz3-akvr_pHk7Gn6uKbD98scCH2cSQA9VFzFHxU544CUbqWDu-WwcfKfmV3nvQhewtn3eI" />
                            <span
                                class="absolute bottom-0 right-0 block h-2.5 w-2.5 rounded-full bg-red-500 ring-2 ring-[var(--gray-800)]"></span>
                        </div>
                        <div>
                            <p class="text-sm text-[var(--gray-800)] dark:text-[var(--gray-50)]"><span
                                    class="font-bold text-[var(--gray-800)] dark:text-[var(--gray-50)] hover:cursor-pointer">Brandon
                                    Philips</span> solicitou
                                permissão para alterar <span
                                    class="font-bold text-[var(--gray-800)] dark:text-[var(--gray-50)] hover:cursor-pointer hover:text-[var(--color-primary-500)]">Projeto
                                    – Nganter App</span></p>
                            <p class="text-xs text-[var(--gray-500)] mt-1">Projeto • há 1hr</p>
                        </div>
                    </div>
                </div>
                <div class="p-4 border-t border-[var(--gray-700)]">
                    <button
                        class="w-full text-center text-[var(--gray-50)] dark:text-[var(--gray-800)] bg-[var(--color-primary-500)] dark:bg-[var(--color-primary-500)]/80 dark:text-white py-2 text-sm font-semibold rounded-lg bg-[var(--color-primary-500)] hover:bg-[var(--color-primary-700)] transition-colors hover:cursor-pointer">Ver
                        Todas as Notificações</button>
                </div>
            </div>

            <button @click="open = !open"
                class="flex items-center space-x-3 text-sm font-medium text-body hover:text-[var(--color-primary-500)] hover:cursor-pointer transition">
                <img id="foto-header" src="{{ Auth::user()->get_avatar_url() }}"
                    onerror="{{ Auth::user()->get_avatar_url() }}"
                    alt="{{ Auth::user()->name }}"
                    class="w-9 h-9 rounded-full ring-2 ring-[var(--color-primary-500)]/20 object-cover object-center">
                <span>{{ Auth::user()->name }}</span>
                <svg class="w-5 h-5 text-muted transition" :class="{ 'rotate-180': open }" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>

            @script
                <script>
                    Livewire.on('avatar-updated', (data) => {
                        const img = document.getElementById('foto-header');
                        if (img && data[0]?.url) {
                            img.src = data[0].url;
                        }
                    });
                </script>
            @endscript


            <div x-show="open" @click.outside="open = false" x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-95"
                class="absolute right-0 mt-12 w-56 origin-top-right bg-surface rounded-xl shadow-xl ring-opacity-5 z-50 dark:bg-[var(--gray-900)]"
                style="display: none">

                <div class="py-2">
                    <a href="{{ route('perfil') }}" wire:navigate
                        class="flex items-center px-4 py-2.5 text-sm text-body hover:bg-[var(--color-primary-500)]/10 hover:text-[var(--color-primary-500)] hover:cursor-pointer transition">
                        <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        Meu Perfil
                    </a>
                    <a href="{{ route('configuracoes') }}" wire:navigate
                        class="flex items-center px-4 py-2.5 text-sm text-body hover:bg-[var(--color-primary-500)]/10 hover:text-[var(--color-primary-500)] hover:cursor-pointer transition">
                        <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        Configurações
                    </a>

                    <hr class="my-2 border-border">

                    <button @click="toggleDarkMode(); open = false;"
                        class="flex items-center w-full px-4 py-2.5 text-sm text-body hover:bg-[var(--color-primary-500)]/10 hover:text-[var(--color-primary-500)] hover:cursor-pointer transition">

                        <template x-if="!isDark">
                            <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M20.354 15.354A9 9 9 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                            </svg>
                        </template>

                        <template x-if="isDark">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-3">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 3v2.25m6.364.386-1.591 1.591M21 12h-2.25m-.386 6.364-1.591-1.591M12 18.75V21m-4.773-4.227-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" />
                            </svg>
                        </template>

                        <span x-text="isDark ? 'Modo Claro' : 'Modo Escuro'"></span>
                    </button>


                    <a href="#"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                        class="flex items-center px-4 py-2.5 text-sm text-danger hover:bg-red-50 dark:hover:bg-red-900/20 transition">
                        <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        Sair
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>
