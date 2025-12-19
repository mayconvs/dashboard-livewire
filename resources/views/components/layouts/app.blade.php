{{-- C:\laragon\www\dashboard-livewire\resources\views\components\layouts\app.blade.php --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    @livewireScripts
    <!-- Poppins do Google Fonts (todos os pesos) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="icon" href="{{ asset('favicon.ico') }}">

    <title>{{ $title ?? env('APP_NAME') }}</title>

    @include('components/layouts/_theme_variables')

    <script>
        // Inicializa dark mode como padrão se não houver preferência salva
        if (!('theme' in localStorage)) {
            localStorage.theme = 'dark';
        }

        // Aplica o tema
        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia(
                '(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark')
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>

</head>

<body
    class="font-sans antialiased bg-white dark:bg-[var(--gray-900)] text-[var(--gray-900)] dark:text-[var(--gray-100)]"
    x-data="{
        open: false, // Variável que controla a abertura do dropdown (TEM QUE FICAR AQUI)
        open_notification: false,
        showPassword: false,
        isDark: document.documentElement.classList.contains('dark'),
        toggleDarkMode() {
            document.documentElement.classList.toggle('dark');
            this.isDark = document.documentElement.classList.contains('dark');
            localStorage.theme = this.isDark ? 'dark' : 'light';
        }
    }">

    <div class="flex min-h-screen">
        <!-- Sidebar fixo -->
        <livewire:side-bar />

        <!-- Área principal com header e conteúdo -->
        <div x-data="{
            sidebarCollapsed: localStorage.getItem('sidebarCollapsed') === 'true'
        }" @sidebar-toggle.window="sidebarCollapsed = $event.detail.collapsed"
            :class="sidebarCollapsed ? 'lg:ml-16' : 'lg:ml-64'"
            class="flex-1 flex flex-col min-h-screen ml-0 md:ml-16 transition-all duration-300">
            <livewire:header />

            <!-- Conteúdo principal -->
            <main class="flex-1 pt-16 bg-[var(--gray-50)] dark:bg-[var(--gray-950)]">
                <div class="p-8">
                    <div
                        class="rounded p-4 dark:border-[var(--gray-700)] bg-[var(--gray-100)] dark:bg-[var(--gray-900)]/50 pattern-bg-light dark:pattern-bg">
                        {{ $slot }}
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Script do dark mode -->
    <script>
        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia(
                '(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark')
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>
    

    <script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module"></script>
</body>

</html>
