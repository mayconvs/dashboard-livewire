{{-- C:\laragon\www\dashboard-livewire\resources\views\livewire\perfil.blade.php --}}
<div class="layout-content-container flex flex-col w-full max-w-[1280px] flex-1">
    {{-- <form wire:submit.prevent="save">
        <x-forms.input 
            type="text" 
            name="nome" 
            label="Nome Completo" 
            placeholder="Digite seu nome"
            wire:model="name" 
        />
        
        <x-forms.input 
            type="email" 
            name="email" 
            label="Email" 
            placeholder="seu.email@exemplo.com"
            wire:model="email" 
        />
        
        <x-forms.button type="submit">
            Salvar Usuário
        </x-forms.button>
    </form> --}}

    <div class="flex flex-wrap gap-2 ">
        {{-- <a class="text-text-secondary-light dark:text-text-secondary-dark text-sm font-medium leading-normal"
            href="#">Dashboard</a>
        <span class="text-text-secondary-light dark:text-text-secondary-dark text-sm font-medium leading-normal">/</span>
        <a class="text-text-secondary-light dark:text-text-secondary-dark text-sm font-medium leading-normal"
            href="#">Settings</a>
        <span class="text-text-secondary-light dark:text-text-secondary-dark text-sm font-medium leading-normal">/</span> --}}
        <span class="text-text-[var(--gray-900)] dark:text-text-[var(--gray-50)] text-sm font-medium leading-normal">Meu
            Perfil</span>
    </div>
    <div class="flex flex-col lg:flex-row gap-8 mt-4">
        <!-- Left Column: Profile Card -->
        <aside class="w-full lg:w-1/3 xl:w-1/4 flex flex-col gap-8">
            <div
                class="bg-[var(--gray-100)] dark:bg-[var(--gray-900)] border border-[var(--gray-500)] dark:border-[var(--gray-800)] rounded-xl p-6 flex flex-col gap-4 items-center relative">

                <!-- Input escondido -->
                <x-forms.file-input class="hidden" name="new_photo_profile_input" wire:model.live="new_photo_profile"
                    accept="image/jpeg,image/png,image/jpg,image/webp,image/gif" />

                <div class="relative group cursor-pointer">
                    <!-- Avatar -->
                    <div id="avatar-preview"
                        class="bg-center bg-no-repeat aspect-square bg-cover rounded-full w-32 h-32 border-4 border-white dark:border-gray-800 shadow-2xl ring-4 ring-white/20"
                        style="background-image: url('{{ Auth::user()->get_avatar_url() }}');">

                        @if ($new_photo_profile)
                            <img src="{{ $new_photo_profile->temporaryUrl() }}"
                                class="rounded-full w-full h-full object-cover" alt="Preview" />
                        @endif
                    </div>

                    <!-- Loading Spinner (PERFEITAMENTE CENTRALIZADO) -->
                    <div wire:loading wire:target="new_photo_profile"
                    class="absolute inset-0 rounded-full bg-black/75 z-30 pointer-events-none">
                    <svg class="absolute inset-0 m-auto w-10 h-10 animate-spin text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor"
                                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                            </path>
                        </svg>
                    </div>

                    <!-- Overlay para clicar e trocar foto -->
                    <div x-on:click="document.getElementById('new_photo_profile_input').click()"
                        class="absolute inset-0 rounded-full bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center z-20 cursor-pointer">
                        <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                </div>

                @script
                    <script>
                        Livewire.on('notify', (data) => {
                            notify(data[0].type, data[0].title, data[0].message);
                        });
                    </script>
                @endscript



                <!-- Nome e cargo -->
                <div class="text-center">
                    <p class="text-[22px] font-bold text-[var(--gray-900)] dark:text-[var(--gray-50)]">
                        {{ Auth::user()->name }} {{ Auth::user()->last_name }}
                    </p>
                    <p class="text-base opacity-80">{{ Auth::user()->cargo?->name ?? 'Usuário' }}</p>
                </div>

                

                <!-- Erros -->
                @if ($uploadError)
                    <div class="text-red-600 dark:text-red-400 text-sm font-medium mt-2 text-center max-w-[240px]">
                        {{ $uploadError }}
                    </div>
                @endif

                @error('new_photo_profile')
                    <div class="text-red-600 dark:text-red-400 text-sm font-medium mt-2 text-center max-w-[240px]">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div
                class="bg-[var(--gray-100)] dark:bg-[var(--gray-900)] border border-[var(--gray-500)] dark:border-[var(--gray-800)] rounded-xl p-6 flex flex-col gap-4">
                <h3 class="text-lg font-bold text-[var(--gray-900)] dark:text-[var(--gray-50)]">Social Profiles</h3>
                <div class="flex items-center gap-4">
                    <div class="rounded-full bg-[var(--gray-100)] dark:bg-[var(--gray-900)] p-2.5">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 21a9.004 9.004 0 0 0 8.716-6.747M12 21a9.004 9.004 0 0 1-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 0 1 7.843 4.582M12 3a8.997 8.997 0 0 0-7.843 4.582m15.686 0A11.953 11.953 0 0 1 12 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0 1 21 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0 1 12 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 0 1 3 12c0-1.605.42-3.113 1.157-4.418" />
                        </svg>

                    </div>
                    <div class="flex flex-col">
                        <p class="text-[var(--gray-900)] dark:text-[var(--gray-50)] text-sm font-medium leading-normal">
                            Site</p>
                        <a class="text-[var(--color-primary-500)] dark:text-[var(--color-primary-500)] hover:text-[var(--color-secondary-500)] text-sm font-normal"
                            href="#">mayconvs.com.br</a>
                    </div>
                </div>
                <div class="flex items-center gap-4">
                    <div class="rounded-full bg-background-light dark:bg-background-dark p-2.5">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            stroke="none" class="size-5" viewBox="0 0 16 16">
                            <path
                                d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z" />
                        </svg>

                    </div>
                    <div class="flex flex-col">
                        <p class="text-[var(--gray-900)] dark:text-[var(--gray-50)] text-sm font-medium leading-normal">
                            Whatsapp</p>
                        <a class="text-[var(--color-primary-500)] dark:text-[var(--color-primary-500)] hover:text-[var(--color-secondary-500)] text-sm font-normal"
                            href="#">5548988887777</a>
                    </div>
                </div>
                <div class="flex items-center gap-4">
                    <div class="rounded-full bg-background-light dark:bg-background-dark p-2.5">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" stroke="none"
                            xmlns="http://www.w3.org/2000/svg" class="size-5">
                            <path
                                d="M6.5 8C7.32843 8 8 7.32843 8 6.5C8 5.67157 7.32843 5 6.5 5C5.67157 5 5 5.67157 5 6.5C5 7.32843 5.67157 8 6.5 8Z"
                                fill="color-gray-800 dark:color-white " />
                            <path
                                d="M5 10C5 9.44772 5.44772 9 6 9H7C7.55228 9 8 9.44771 8 10V18C8 18.5523 7.55228 19 7 19H6C5.44772 19 5 18.5523 5 18V10Z"
                                fill="color-white dark:color-gray-800" />
                            <path
                                d="M11 19H12C12.5523 19 13 18.5523 13 18V13.5C13 12 16 11 16 13V18.0004C16 18.5527 16.4477 19 17 19H18C18.5523 19 19 18.5523 19 18V12C19 10 17.5 9 15.5 9C13.5 9 13 10.5 13 10.5V10C13 9.44771 12.5523 9 12 9H11C10.4477 9 10 9.44772 10 10V18C10 18.5523 10.4477 19 11 19Z"
                                fill="color-white dark:color-gray-800" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M20 1C21.6569 1 23 2.34315 23 4V20C23 21.6569 21.6569 23 20 23H4C2.34315 23 1 21.6569 1 20V4C1 2.34315 2.34315 1 4 1H20ZM20 3C20.5523 3 21 3.44772 21 4V20C21 20.5523 20.5523 21 20 21H4C3.44772 21 3 20.5523 3 20V4C3 3.44772 3.44772 3 4 3H20Z"
                                fill="color-white dark:color-gray-800" />
                        </svg>
                    </div>
                    <div class="flex flex-col">
                        <p
                            class="text-[var(--gray-900)] dark:text-[var(--gray-50)] text-sm font-medium leading-normal">
                            LinkedIn</p>
                        <a class="text-[var(--color-primary-500)] dark:text-[var(--color-primary-500)] hover:text-[var(--color-secondary-500)] text-sm font-normal"
                            href="#">example_user_company</a>
                    </div>
                </div>
                <div class="flex items-center gap-4">
                    <div class="rounded-full bg-background-light dark:bg-background-dark p-2.5">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" stroke="none"
                            xmlns="http://www.w3.org/2000/svg" class="size-5">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M20 1C21.6569 1 23 2.34315 23 4V20C23 21.6569 21.6569 23 20 23H4C2.34315 23 1 21.6569 1 20V4C1 2.34315 2.34315 1 4 1H20ZM20 3C20.5523 3 21 3.44772 21 4V20C21 20.5523 20.5523 21 20 21H15V13.9999H17.0762C17.5066 13.9999 17.8887 13.7245 18.0249 13.3161L18.4679 11.9871C18.6298 11.5014 18.2683 10.9999 17.7564 10.9999H15V8.99992C15 8.49992 15.5 7.99992 16 7.99992H18C18.5523 7.99992 19 7.5522 19 6.99992V6.31393C19 5.99091 18.7937 5.7013 18.4813 5.61887C17.1705 5.27295 16 5.27295 16 5.27295C13.5 5.27295 12 6.99992 12 8.49992V10.9999H10C9.44772 10.9999 9 11.4476 9 11.9999V12.9999C9 13.5522 9.44771 13.9999 10 13.9999H12V21H4C3.44772 21 3 20.5523 3 20V4C3 3.44772 3.44772 3 4 3H20Z"
                                fill="color-white dark:color-gray-800" />
                        </svg>
                    </div>
                    <div class="flex flex-col">
                        <p
                            class="text-[var(--gray-900)] dark:text-[var(--gray-50)] text-sm font-medium leading-normal">
                            Facebook</p>
                        <a class="text-[var(--color-primary-500)] dark:text-[var(--color-primary-500)] hover:text-[var(--color-secondary-500)] text-sm font-normal"
                            href="#">example_user</a>
                    </div>
                </div>
                <div class="flex items-center gap-4">
                    <div class="rounded-full bg-background-light dark:bg-background-dark p-2.5">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" stroke="none"
                            xmlns="http://www.w3.org/2000/svg" class="size-5">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M12 18C15.3137 18 18 15.3137 18 12C18 8.68629 15.3137 6 12 6C8.68629 6 6 8.68629 6 12C6 15.3137 8.68629 18 12 18ZM12 16C14.2091 16 16 14.2091 16 12C16 9.79086 14.2091 8 12 8C9.79086 8 8 9.79086 8 12C8 14.2091 9.79086 16 12 16Z"
                                fill="dark:color-white color-gray-800" />
                            <path
                                d="M18 5C17.4477 5 17 5.44772 17 6C17 6.55228 17.4477 7 18 7C18.5523 7 19 6.55228 19 6C19 5.44772 18.5523 5 18 5Z"
                                fill="dark:color-white color-gray-800" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M1.65396 4.27606C1 5.55953 1 7.23969 1 10.6V13.4C1 16.7603 1 18.4405 1.65396 19.7239C2.2292 20.8529 3.14708 21.7708 4.27606 22.346C5.55953 23 7.23969 23 10.6 23H13.4C16.7603 23 18.4405 23 19.7239 22.346C20.8529 21.7708 21.7708 20.8529 22.346 19.7239C23 18.4405 23 16.7603 23 13.4V10.6C23 7.23969 23 5.55953 22.346 4.27606C21.7708 3.14708 20.8529 2.2292 19.7239 1.65396C18.4405 1 16.7603 1 13.4 1H10.6C7.23969 1 5.55953 1 4.27606 1.65396C3.14708 2.2292 2.2292 3.14708 1.65396 4.27606ZM13.4 3H10.6C8.88684 3 7.72225 3.00156 6.82208 3.0751C5.94524 3.14674 5.49684 3.27659 5.18404 3.43597C4.43139 3.81947 3.81947 4.43139 3.43597 5.18404C3.27659 5.49684 3.14674 5.94524 3.0751 6.82208C3.00156 7.72225 3 8.88684 3 10.6V13.4C3 15.1132 3.00156 16.2777 3.0751 17.1779C3.14674 18.0548 3.27659 18.5032 3.43597 18.816C3.81947 19.5686 4.43139 20.1805 5.18404 20.564C5.49684 20.7234 5.94524 20.8533 6.82208 20.9249C7.72225 20.9984 8.88684 21 10.6 21H13.4C15.1132 21 16.2777 20.9984 17.1779 20.9249C18.0548 20.8533 18.5032 20.7234 18.816 20.564C19.5686 20.1805 20.1805 19.5686 20.564 18.816C20.7234 18.5032 20.8533 18.0548 20.9249 17.1779C20.9984 16.2777 21 15.1132 21 13.4V10.6C21 8.88684 20.9984 7.72225 20.9249 6.82208C20.8533 5.94524 20.7234 5.49684 20.564 5.18404C20.1805 4.43139 19.5686 3.81947 18.816 3.43597C18.5032 3.27659 18.0548 3.14674 17.1779 3.0751C16.2777 3.00156 15.1132 3 13.4 3Z"
                                fill="dark:color-white color-gray-800" />
                        </svg>
                    </div>
                    <div class="flex flex-col">
                        <p
                            class="text-[var(--gray-900)] dark:text-[var(--gray-50)] text-sm font-medium leading-normal">
                            Instagram</p>
                        <a class="text-[var(--color-primary-500)] dark:text-[var(--color-primary-500)] hover:text-[var(--color-secondary-500)] text-sm font-normal"
                            href="#">example_user</a>
                    </div>
                </div>
            </div>
        </aside>
        <!-- Right Column: Information Sections -->
        <section class="w-full lg:w-2/3 xl:w-3/4 flex flex-col gap-8">
            <div
                class="bg-[var(--gray-100)] dark:bg-[var(--gray-900)] border border-[var(--gray-500)] dark:border-[var(--gray-800)] rounded-xl">
                <div
                    class="flex items-center justify-between p-6 border-b border-[var(--gray-500)] dark:border-[var(--gray-800)]">
                    <h2
                        class="text-[var(--gray-900)] dark:text-[var(--gray-50)] text-[22px] font-bold leading-tight tracking-[-0.015em]">
                        Informação Pessoal</h2>

                    <x-forms.button size="md" variant="primary" icon='edit'>
                        Editar
                    </x-forms.button>
                </div>
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-6">
                    <div>
                        <label
                            class="block text-sm font-medium text-[var(--color-primary-600)] dark:text-[var(--color-primary-500)] mb-1">Nome</label>
                        <p class="text-base text-[var(--gray-900)] dark:text-[var(--gray-50)]">{{ Auth::user()->name }}
                        </p>
                    </div>
                    <div>
                        <label
                            class="block text-sm font-medium text-[var(--color-primary-600)] dark:text-[var(--color-primary-500)] mb-1">Sobrenome</label>
                        <p class="text-base text-[var(--gray-900)] dark:text-[var(--gray-50)]">
                            {{ Auth::user()->last_name }}</p>
                    </div>
                    <div>
                        <label
                            class="block text-sm font-medium text-[var(--color-primary-600)] dark:text-[var(--color-primary-500)] mb-1">E-mail</label>
                        <p class="text-base text-[var(--gray-900)] dark:text-[var(--gray-50)]">
                            {{ Auth::user()->email }}</p>
                    </div>
                    <div>
                        <label
                            class="block text-sm font-medium text-[var(--color-primary-600)] dark:text-[var(--color-primary-500)] mb-1">Telefone</label>
                        <p class="text-base text-[var(--gray-900)] dark:text-[var(--gray-50)]">
                            {{ Auth::user()->phone }}</p>
                    </div>
                    {{-- <div class="md:col-span-2">
                        <label
                            class="block text-sm font-medium text-text-secondary-light dark:text-text-secondary-dark mb-1">Sobre mim</label>
                        <p class="text-base text-text-primary-light dark:text-text-primary-dark">Creative and
                            detail-oriented product designer with over 8 years of experience in crafting user-centric
                            interfaces for web and mobile applications. Passionate about solving complex problems
                            through elegant and intuitive design solutions.</p>
                    </div> --}}
                </div>
            </div>
            <div class="bg-card-light dark:bg-card-dark border border-border-light dark:border-border-dark rounded-xl">
                <div
                    class="flex items-center justify-between p-6 border-b border-border-light dark:border-border-dark">
                    <h2
                        class="text-[var(--gray-900)] dark:text-[var(--gray-50)] text-[22px] font-bold leading-tight tracking-[-0.015em]">
                        Endereços</h2>

                    <x-forms.button size="md" variant="primary" icon="edit">
                        Editar
                    </x-forms.button>

                </div>
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-6">
                    <div>
                        <label
                            class="block text-sm font-medium text-[var(--color-primary-600)] dark:text-[var(--color-primary-500)] mb-1">Rua</label>
                        <p class="text-base text-[var(--gray-900)] dark:text-[var(--gray-50)]">Av. Das Empresas</p>
                    </div>
                    <div>
                        <label
                            class="block text-sm font-medium text-[var(--color-primary-600)] dark:text-[var(--color-primary-500)] mb-1">Número</label>
                        <p class="text-base text-[var(--gray-900)] dark:text-[var(--gray-50)]">999</p>
                    </div>
                    <div>
                        <label
                            class="block text-sm font-medium text-[var(--color-primary-600)] dark:text-[var(--color-primary-500)] mb-1">Complemento</label>
                        <p class="text-base text-[var(--gray-900)] dark:text-[var(--gray-50)]">XXXXXXX</p>
                    </div>
                    <div>
                        <label
                            class="block text-sm font-medium text-[var(--color-primary-600)] dark:text-[var(--color-primary-500)] mb-1">Bairro
                        </label>
                        <p class="text-base text-[var(--gray-900)] dark:text-[var(--gray-50)]">XXXXXXX</p>
                    </div>
                    <div>
                        <label
                            class="block text-sm font-medium text-[var(--color-primary-600)] dark:text-[var(--color-primary-500)] mb-1">Cidade
                            - Estado
                            ID</label>
                        <p class="text-base text-[var(--gray-900)] dark:text-[var(--gray-50)]">XXXXXXXX - XX</p>
                    </div>
                </div>
                <div
                    class="flex justify-end p-6 border-t border-border-light dark:border-border-dark mt-2 gap-3 hidden">
                    <!-- Example of actions in edit mode, hidden by default -->
                    <button
                        class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 bg-card-light dark:bg-card-dark border border-border-light dark:border-border-dark text-text-primary-light dark:text-text-primary-dark text-sm font-bold leading-normal tracking-[0.015em]">
                        <span class="truncate">Cancelar</span>
                    </button>
                    <button
                        class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 bg-primary text-white text-sm font-bold leading-normal tracking-[0.015em]">
                        <span class="truncate">Salvar</span>
                    </button>
                </div>
            </div>
        </section>
    </div>
</div>
