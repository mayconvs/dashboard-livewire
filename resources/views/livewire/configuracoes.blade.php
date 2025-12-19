{{-- C:\laragon\www\dashboard-livewire\resources\views\livewire\configuracoes.blade.php --}}
<div class="layout-content-container flex flex-col w-full max-w-[1280px] flex-1">
    {{-- Breadcrumb/Título --}}
    <div class="flex flex-wrap gap-2 ">
        {{-- <a class="text-text-secondary-light dark:text-text-secondary-dark text-sm font-medium leading-normal"
            href="#">Dashboard</a>
        <span class="text-text-secondary-light dark:text-text-secondary-dark text-sm font-medium leading-normal">/</span>
        <a class="text-text-secondary-light dark:text-text-secondary-dark text-sm font-medium leading-normal"
            href="#">Settings</a>
        <span class="text-text-secondary-light dark:text-text-secondary-dark text-sm font-medium leading-normal">/</span> 
        <span
            class="text-text-primary-light dark:text-text-primary-dark text-sm font-medium leading-normal">Configurações</span> --}}
    </div>


    <div class="flex flex-wrap gap-2 ">
        @if (Auth::user()->role_id == 1)
            <span
                class="text-[var(--gray-900)] dark:text-[var(--gray-50)] text-lg font-bold leading-normal">Configurações
                da Empresa</span>
        @else
            <span
                class="text-[var(--gray-900)] dark:text-[var(--gray-50)] text-lg font-bold leading-normal">Configurações
                do Usuário</span>
        @endif
    </div>
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


    <div class="flex flex-col lg:flex-col gap-8 mt-4">

        @if (Auth::user()->role_id == 1)
            <section class="w-full flex flex-col gap-8">
                <div
                    class="bg-[var(--gray-100)] dark:bg-[var(--gray-900)] border border-[var(--gray-500)] dark:border-[var(--gray-800)] rounded-xl">
                    <div
                        class="flex items-center justify-between p-6 border-b border-[var(--gray-500)] dark:border-[var(--gray-800)]">
                        <h2
                            class="text-[var(--gray-900)] dark:text-[var(--gray-50)] text-[22px] font-bold leading-tight tracking-[-0.015em]">
                            Branding</h2>

                    </div>
                    <form wire:submit.prevent="save_branding_settings">
                        @csrf
                        <div class="z-50 p-6 grid sm:grid-cols-2 md:grid-cols-2 gap-x-6 gap-y-6">

                            <div>
                                <x-forms.input label="Cor Primária" type="color" name="primary_color_hex"
                                    wire:model="primary_color_hex" class="!p-2" :value="$primary_color_hex" />
                                {{-- A mensagem de erro e a mensagem de "Atual:..." já estão dentro do componente forms.file-input --}}
                            </div>

                            <div>
                                <x-forms.input label="Cor Secundária" type="color" name="secondary_color_hex"
                                    wire:model="secondary_color_hex" class="!p-2" :value="$secondary_color_hex" />
                                {{-- A mensagem de erro e a mensagem de "Atual:..." já estão dentro do componente forms.file-input --}}
                            </div>

                            <div class="mt-4">
                                <x-forms.file-input label="Logo Horizontal - Modo Claro (.svg ou .png)"
                                    name="new_logo_light" wire:model="new_logo_light" accept="image/*" :selected_name="$new_logo_light ? $new_logo_light->getClientOriginalName() : null"
                                    :current_file="$settings->light_logo_path ? basename($settings->light_logo_path) : null" />
                            </div>

                            {{-- Logo Modo Escuro --}}
                            <div class="mt-4">
                                <x-forms.file-input label="Logo Horizontal - Modo Escuro (.svg ou .png)"
                                    name="new_logo_dark" wire:model="new_logo_dark" accept="image/*" :selected_name="$new_logo_dark ? $new_logo_dark->getClientOriginalName() : null"
                                    :current_file="$settings->dark_logo_path ? basename($settings->dark_logo_path) : null" />
                            </div>

                            {{-- Logo Menu Tablet Modo Claro --}}
                            <div class="mt-4">
                                <x-forms.file-input label="Logo Menu Tablet - Modo Claro (.svg ou .png)"
                                    name="new_logo_light_mini" wire:model="new_logo_light_mini" accept="image/*"
                                    :selected_name="$new_logo_light_mini
                                        ? $new_logo_light_mini->getClientOriginalName()
                                        : null" :current_file="$settings->light_logo_tablet_path
                                        ? basename($settings->light_logo_tablet_path)
                                        : null" />
                            </div>

                            {{-- Logo Menu Tablet Modo Escuro --}}
                            <div class="mt-4">
                                <x-forms.file-input label="Logo Menu Tablet - Modo Escuro (.svg ou .png)"
                                    name="new_logo_dark_mini" wire:model="new_logo_dark_mini" accept="image/*"
                                    :selected_name="$new_logo_dark_mini
                                        ? $new_logo_dark_mini->getClientOriginalName()
                                        : null" :current_file="$settings->dark_logo_tablet_path
                                        ? basename($settings->dark_logo_tablet_path)
                                        : null" />
                            </div>

                            {{-- Favicon --}}
                            <div class="mt-4">
                                <x-forms.file-input label="Logo Horizontal E-mail (.png)" name="new_logo_dark_email"
                                    wire:model="new_logo_dark_email" accept="image/*" :selected_name="$new_logo_dark_email
                                        ? $new_logo_dark_email->getClientOriginalName()
                                        : null"
                                    :current_file="$settings->logo_dark_email_path
                                        ? basename($settings->logo_dark_email_path)
                                        : null" />
                            </div>

                            {{-- Favicon --}}
                            <div class="mt-4">
                                <x-forms.file-input label="Favicon (.ico)" name="new_favicon" wire:model="new_favicon"
                                    accept="image/*" :selected_name="$new_favicon ? $new_favicon->getClientOriginalName() : null" :current_file="$settings->favicon_path ? basename($settings->favicon_path) : null" />
                            </div>

                            @if (session('server_error'))
                                <p class="m-0 text-sm text-center right-0 text-danger"><span class="font-medium"></span>
                                    {{ session('server_error') }}</p>
                            @endif

                        </div>

                        <div
                            class="flex justify-end items-center p-6 border-t border-[var(--gray-500)] dark:border-[var(--gray-800)] mt-2 gap-3 ">

                            @error('server_error')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                            @enderror

                            @if ($success_message_save_branding_settings)
                                <p class="text-green-600 text-sm text-center">
                                    {{ $success_message_save_branding_settings }}</p>
                            @endif

                            <x-forms.button type="submit">
                                Salvar
                            </x-forms.button>

                        </div>
                    </form>
                </div>
            </section>

            <section class="w-full flex flex-col gap-8">
                <div
                    class="bg-[var(--gray-100)] dark:bg-[var(--gray-900)] border border-[var(--gray-500)] dark:border-[var(--gray-800)] rounded-xl">
                    <div
                        class="flex items-center justify-between p-6 border-b border-[var(--gray-500)] dark:border-[var(--gray-800)]">
                        <h2
                            class="text-[var(--gray-900)] dark:text-[var(--gray-50)] text-[22px] font-bold leading-tight tracking-[-0.015em]">
                            Informações da Empresa</h2>

                    </div>
                    <form wire:submit.prevent="save_company_settings">
                        @csrf
                        <div class="p-6 grid sm:grid-cols-2 md:grid-cols-2 gap-x-6 gap-y-6">

                            <div>
                                <x-forms.input label="Nome" type="text" name="company_name"
                                    wire:model="company_name" :value="$settings->app_name ?? (env('APP_NAME') ?? null)" />

                                <x-forms.input label="CNPJ" type="text" name="company_cnpj"
                                    wire:model="company_cnpj" x-mask="99.999.999/9999-99"
                                    placeholder="00.000.000/0000-00" {{-- mask="cnpj" --}} {{-- :value="$settings->cnpj_formated ?? env('CNPJ_COMPANY') ?? null" --}} />

                                <x-forms.input label="Site" type="text" name="url_site" wire:model="url_site"
                                    placeholder="https://www.example.com" :value="$settings->url_site ?? (env('URL_SITE') ?? null)" />

                                <x-forms.input label="Facebook (URL)" type="text" name="url_facebook"
                                    wire:model="url_facebook" placeholder="https://www.facebook.com/..."
                                    :value="$settings->url_facebook ?? (env('URL_FACEBOOK') ?? null)" />

                                <x-forms.input label="Linkedin (URL)" type="text" name="url_linkedin"
                                    wire:model="url_linkedin" placeholder="https://www.linkedin.com/company/..."
                                    :value="$settings->url_linkedin ?? (env('URL_LINKEDIN') ?? null)" />


                            </div>

                            <div>
                                

                                <x-forms.input-phone label="Telefone" name="company_phone" wire_model="company_phone"
                                    initial_country="br" placeholder="DDD + Número" required />


                                <x-forms.input label="E-mail" type="email" name="company_email"
                                    wire:model="company_email" :value="$settings->company_email ?? (env('MAIL_ADMIN') ?? null)" />

                                <x-forms.input label="Whatsapp (URL)" type="text" name="url_whatsapp"
                                    wire:model="url_whatsapp" placeholder="https://wa.me/..." :value="$settings->url_whatsapp ?? (env('URL_WHATSAPP') ?? null)" />

                                <x-forms.input label="Instagram (URL)" type="text" name="url_instagram"
                                    wire:model="url_instagram" placeholder="https://www.instagram.com/..."
                                    :value="$settings->url_instagram ?? (env('URL_INSTAGRAM') ?? null)" />

                                <x-forms.input label="Github (URL)" type="text" name="url_github"
                                    wire:model="url_github" placeholder="https://github.com/..." :value="$settings->url_github ?? (env('URL_GITHUB') ?? null)" />
                            </div>

                            @if (session('server_error'))
                                <p class="m-0 text-sm text-center right-0 text-danger"><span
                                        class="font-medium"></span>
                                    {{ session('server_error') }}</p>
                            @endif

                        </div>

                        <div
                            class="flex justify-end items-center p-6 border-t border-[var(--gray-500)] dark:border-[var(--gray-800)] mt-2 gap-3 ">

                            @error('server_error')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                            @enderror

                            @if ($success_message_save_company_settings)
                                <p class="text-green-600 text-sm text-center">
                                    {{ $success_message_save_company_settings }}</p>
                            @endif

                            <x-forms.button type="submit">
                                Salvar
                            </x-forms.button>

                        </div>

                        @script
                            <script>
                                Livewire.on('saved-company-notify', (data) => {
                                    notify(data[0].type, data[0].title, data[0].message);
                                });
                            </script>
                        @endscript
                    </form>
                </div>
            </section>

        @endif
        <!-- Right Column: Information Sections -->
        <section class="w-full flex flex-col gap-8">
            <div
                class="bg-[var(--gray-100)] dark:bg-[var(--gray-900)] border border-[var(--gray-500)] dark:border-[var(--gray-800)] rounded-xl">
                <div
                    class="flex items-center justify-between p-6 border-b border-border-light dark:border-border-dark">
                    <h2
                        class="text-text-primary-light dark:text-text-primary-dark text-[22px] font-bold leading-tight tracking-[-0.015em]">
                        Alterar Senha</h2>

                </div>
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-6">
                    <form wire:submit.prevent="change_password">
                        @csrf
                        <div>
                            <x-forms.input-password type="password" name="current_password" label="Senha atual"
                                placeholder="Digite sua senha atual" wire:model="current_password" />


                        </div>
                        <div>

                        </div>
                        <div class="mt-4">
                            <x-forms.input-password type="password" name="new_password" label="Nova senha"
                                placeholder="Digite sua nova senha" wire:model="new_password" />
                        </div>
                        <div class="mt-4">
                            <x-forms.input-password type="password" name="new_password_confirmation"
                                label="Confirme sua nova senha"
                                placeholder="Digite sua nova senha novamente para confirmar"
                                wire:model="new_password_confirmation" />
                        </div>

                        @if (session('server_error'))
                            <p class="m-0 text-sm text-center right-0 text-danger"><span class="font-medium"></span>
                                {{ session('server_error') }}</p>
                        @endif

                </div>

                <div
                    class="flex justify-end items-center p-6 border-t border-border-light dark:border-border-dark mt-2 gap-3 ">

                    @error('server_error')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror

                    @if ($success_message_change_password)
                        <p class="text-green-600 text-sm text-center">{{ $success_message_change_password }}</p>
                    @endif

                    <x-forms.button type="submit">
                        Salvar
                    </x-forms.button>

                </div>
                </form>
            </div>
        </section>

        <section class="w-full flex flex-col gap-8">
            <div
                class="bg-[var(--gray-100)] dark:bg-[var(--gray-900)] border border-[var(--gray-500)] dark:border-[var(--gray-800)] rounded-xl">
                <div
                    class="flex items-center justify-between p-6 border-b border-border-light dark:border-border-dark">
                    <h2
                        class="text-text-primary-light dark:text-text-primary-dark text-[22px] font-bold leading-tight tracking-[-0.015em]">
                        Meu Plano</h2>

                </div>
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-6">
                    <form >
                        @csrf
                        <p class="text-[var(--gray-900)] dark:text-[var(--gray-50)] text-base font-medium pb-2 text-left">Plano: <span class="text-[var(--color-primary-500)]">{{ $this->current_plan }}</span></p>
                        <p class="text-[var(--gray-900)] dark:text-[var(--gray-50)] text-base font-medium pb-2 text-left">Status: <span class="text-[var(--color-primary-500)]">{{ $this->status_plan }}</span></p>
                        <p class="text-[var(--gray-900)] dark:text-[var(--gray-50)] text-base font-medium pb-2 text-left">Sua Assinatura expira em: <span class="text-danger">{{ $this->expiration_plan }}</span></p>
                        
                        @forelse ($invoices as $invoice)
                            <div class="flex items-center justify-between border-b border-t py-2">
                                <div>
                                    <p class="font-medium">
                                        {{ $invoice['date'] }}
                                    </p>
                                    <p class="text-sm text-gray-500">
                                        {{ $invoice['status'] }} - {{ $invoice['total'] }}
                                    </p>
                                </div>

                                <a
                                    href="{{ route('invoice.download', $invoice['id']) }}"
                                    class="text-[var(--color-primary-500)] hover:underline hover:text-[var(--color-secondary-500)] text-sm"
                                >
                                    Download PDF
                                </a>
                            </div>
                        @empty
                            <p class="text-gray-500">Nenhuma fatura encontrada.</p>
                        @endforelse

                        
                        

                        

                </div>

                <div
                    class="flex justify-end items-center p-6 border-t border-border-light dark:border-border-dark mt-2 gap-3 ">


                    <x-forms.button type="submit">
                        Salvar
                    </x-forms.button>

                </div>
                </form>
            </div>
        </section>
    </div>
</div>
