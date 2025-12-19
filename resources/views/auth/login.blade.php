{{-- C:\laragon\www\dashboard-livewire\resources\views\auth\login.blade.php --}}
<x-layouts.guest title="Login - {{ env('APP_NAME') }}">
    <div
        class="fixed top-0 left-0 right-0 z-30 h-16 flex justify-end items-right px-4 bg-[var(--gray-50)]  dark:border-[var(--gray-700)] dark:bg-[var(--gray-950)] ">
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

    <div
        class="relative flex h-auto min-h-screen w-full flex-col bg-[var(--gray-50)] dark:bg-[var(--gray-950)] group/design-root overflow-x-hidden">
        <div class="layout-container flex h-full grow flex-col ">
            <div class="flex flex-1 justify-center items-center p-4 lg:p-8 ">
                <div class="layout-content-container flex flex-col w-full max-w-6xl flex-1 bg-[var(--gray-50)] dark:bg-[var(--gray-900)]">
                    <div
                        class="grid grid-cols-1 lg:grid-cols-2 w-full grow bg-[var(--gray-50)] dark:bg-[var(--gray-900)] text-[var(--gray-900)] dark:text-[var(--gray-50)] rounded-xl overflow-hidden shadow-2xl shadow-black/20">
                        <div class="hidden lg:flex flex-col gap-8 p-10 bg-[rgb(var(--primary-rgb)/0.05)]">
                            <div class="flex items-center gap-3">
                                <div
                                    class="hidden p-2 sm:flex md:justify-center lg:justify-between lg:items-center lg:px-4 lg:p-6 border-white/10">

                                    <a href="{{ route('login') }}" class="block">

                                        <!-- Logo no modo LIGHT -->
                                        <img x-show="!isDark" x-cloak src="{{ Storage::url($settings->dark_logo_path) }}"
                                            alt="Logo Light" class="h-10 w-auto mx-auto">

                                        <!-- Logo no modo DARK -->
                                        <img x-show="isDark" x-cloak src="{{ Storage::url($settings->light_logo_path) }}"
                                            alt="Logo Dark" class="h-10 w-auto mx-auto">
                                    </a>

                                </div>
                            </div>
                            <div class="flex-1 flex flex-col justify-center gap-6">
                                <div class="flex w-full grow bg-cover bg-center rounded-lg"
                                    data-alt="Abstract blue and dark flowing lines graphic"
                                    style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuBJMZAjF02FLxcp8e3QpRNcSn91XBOvwL-x7jcE50r-srvDxMuyQRfJbcvF0ZyOu87cr9OgxDoTbZnRsoELlUoOv00sAfrVwOuVdyGbXnMAzTInAau1Gtt_50oTYHJfOg3CLtNkhVCZR8SAP6-ZuQ8yzcAXf-dDBH7g8Hk0lNQGGjpGff9Pz0ppWBLNJbGGFQ6iIPdqDLGkS5fcTlgm3mxRizZYQC-Z2HncSkTqTUUwD9uePFt53KeN1_YahGkXnyNTJFmgqUf5Ja4');">
                                </div>
                                <div class="flex flex-col gap-2">
                                    <h1
                                        class="text-[var(--gray-900)] dark:text-[var(--gray-50)] tracking-light text-[32px] font-bold leading-tight text-left">
                                        Seja bem-vindo</h1>
                                    <p class="text-[var(--gray-900)] dark:text-[var(--gray-50)] text-base font-normal leading-normal">
                                        Quanto maior são as
                                        dificuldades a vencer, maior será a satisfação!</p>
                                </div>
                            </div>
                        </div>
                        <div class="w-full flex flex-col justify-center p-8 sm:p-12 md:p-16">
                            <div class="flex flex-col gap-8 w-full max-w-md mx-auto">
                                <div class="flex flex-col gap-3">
                                    <p
                                        class="text-[var(--gray-900)] dark:text-[var(--gray-50)] text-4xl font-black leading-tight tracking-[-0.033em]">
                                        Olá!</p>
                                    <p class="text-[var(--gray-900)] dark:text-[var(--gray-50)] text-base font-normal leading-normal">Faça
                                        login na sua
                                        conta</p>
                                </div>
                                <form method="POST" action="{{ route('login') }}" class="flex flex-col gap-4">
                                    @csrf
                                    <div class="flex flex-col gap-4">
                                        <x-forms.input type="email" label="E-mail" name="email" placeholder="Digite seu e-mail" value="{{ old('email') }}"></x-forms.input>
                                        <x-forms.input-password type="password" label="Senha" name="password" placeholder="Digite sua senha" value=""></x-forms.input-password>
                                    </div>
                                    <div class="flex justify-between items-center flex-wrap gap-2">
                                        <div class="flex items-center gap-2">
                                            <input
                                                class="form-checkbox h-4 w-4 rounded accent-[var(--color-primary)] bg-[var(--gray-700)] border-[var(--gray-800)] text-primary hover:cursor-pointer focus:ring-primary focus:ring-offset-background-dark"
                                                id="remember-me" type="checkbox" name="remember" value="true" {{ old('remember') ? 'checked' : '' }}/>
                                            <label
                                                class="text-[var(--gray-900)] dark:text-[var(--gray-50)] text-sm font-medium hover:cursor-pointer select-none"
                                                for="remember-me">Lembrar-me</label>
                                        </div>
                                        <a class="text-primary text-sm font-medium hover:underline"
                                            href="{{ route('forgot_password') }}">Esqueceu sua senha?</a>
                                    </div>
                                    <x-forms.button type="submit" size="lg">Entrar</x-forms.button>
                                    
                                </form>
                                @if (session('invalid_login'))
                                    <p class="m-0 text-sm text-center right-0 text-danger"><span
                                            class="font-medium"></span> {{ session('invalid_login') }}</p>
                                @endif


                                @if (session('success'))
                                    <p class="m-0 text-sm text-center right-0 text-success"><span
                                            class="font-medium"></span>Senha redefinida com sucesso.</p>
                                @endif

                                <div class="flex items-center gap-4">
                                    <hr class="w-full border-t border-[#324467]" />
                                    <p class="text-[#92a4c9] text-sm whitespace-nowrap">ou continue com</p>
                                    <hr class="w-full border-t border-[#324467]" />
                                </div>
                                <div class="grid grid-cols-1 sm:grid-cols-1 gap-4">
                                    <x-forms.button-login-google>Entrar com Google</x-forms.button-login-google>
                                </div>
                                <div class="text-center">
                                    <p class="text-[#92a4c9] text-sm">Não tem uma conta? <a
                                            class="text-primary font-medium hover:underline"
                                            href="{{ route('register') }}">Cadastre-se aqui!</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.guest>
