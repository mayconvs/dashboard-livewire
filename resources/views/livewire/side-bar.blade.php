{{-- C:\laragon\www\dashboard-livewire\resources\views\livewire\side-bar.blade.php --}}
<div x-data="{ 
    sidebarCollapsed: localStorage.getItem('sidebarCollapsed') === 'true' 
}" 
x-init="$watch('sidebarCollapsed', value => {
    localStorage.setItem('sidebarCollapsed', value);
    window.dispatchEvent(new CustomEvent('sidebar-toggle', { detail: { collapsed: value } }));
})"
@sidebar-toggle.window="sidebarCollapsed = $event.detail.collapsed">
    <aside id="side-bar"
        :class="sidebarCollapsed ? 'lg:w-16' : 'lg:w-64'"
        class="hidden fixed top-0 left-0 h-screen sm:w-0 md:w-16 md:flex flex-shrink-0 bg-gradient-to-t from-[var(--color-primary-700)] to-[var(--color-primary-500)] dark:from-[var(--color-primary-700)] dark:to-[var(--color-primary-600)] text-[var(--color-primary-50)] flex-col z-40 transition-all duration-300">
        
        <!-- Header com Logo e Botão Toggle -->
        <div class="hidden p-2 sm:flex md:justify-center lg:justify-between lg:items-center lg:px-4 lg:p-6 border-b border-white/10">
            <a href="{{ route('dashboard') }}" wire:navigate class="block">
                <!-- Logo pequeno (sidebar colapsada) -->
                <img src="{{ Storage::url($settings->light_logo_tablet_path) }}" alt="Logo"
                    :class="sidebarCollapsed ? 'lg:block' : 'lg:hidden'"
                    class="h-9 w-9 mx-auto block sm:hidden md:block">

                <!-- Logo grande (sidebar expandida) -->
                <img src="{{ Storage::url($settings->light_logo_path) }}" alt="Logo"
                    :class="sidebarCollapsed ? 'lg:hidden' : 'lg:block'"
                    class="h-10 w-auto mx-auto hidden">
            </a>

            <!-- Botão Toggle (só aparece em lg) -->
            <button @click="sidebarCollapsed = !sidebarCollapsed" id="toggle-mobile-sidebar"
                    class="hidden lg:block p-2 rounded-lg hover:bg-white/10 transition-colors hover:cursor-pointer">
                <svg class="w-5 h-5 transition-transform" 
                     :class="{ 'rotate-180': sidebarCollapsed }"
                     fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 19l-7-7 7-7m8 14l-7-7 7-7" />
                </svg>
            </button>
        </div>

        <nav class="hidden md:inline flex-1 px-1 md:px-4 mt-2 space-y-1 overflow-y-visible">
            @foreach(config('sidebar.items') as $item)
                @if(isset($item['sublinks']) && count($item['sublinks']) > 0)
                    {{-- Item com dropdown --}}
                    <div x-data="{ 
                        open: false, 
                        tooltip: false 
                    }" class="relative">
                        {{-- Container principal do dropdown --}}
                        <div @mouseenter="tooltip = true"
                             @mouseleave="tooltip = false"
                             class="w-full flex items-center md:px-4 py-2.5 md:justify-center transition-colors rounded-lg
                             {{ request()->routeIs($item['route'] . '*') && $item['route'] != null ? 'bg-white/10 text-white' : 'text-[var(--gray-100)] hover:bg-white/10' }}"
                             :class="sidebarCollapsed ? 'lg:justify-center' : 'lg:justify-start'">
                            
                            {!! $item['icon'] !!}

                            {{-- Link clicável do menu (versão expandida) --}}

                            <a href="{{ $item['route'] ? route($item['route']) : '#' }}" 
                            {{ $item['route'] ? 'wire:navigate' : '' }}
                            x-show="!sidebarCollapsed"
                            class="hidden lg:inline ml-2 flex-1 text-left text-sm font-medium">
                                {{ $item['name'] }}
                            </a>
                            
                            {{-- Seta do dropdown (versão expandida) --}}
                            <button @click.stop="open = !open" 
                                    x-show="!sidebarCollapsed"
                                    class="hidden lg:inline ml-auto p-1 hover:bg-white/10 rounded transition-colors hover:cursor-pointer">
                                <svg class="w-4 h-4 transition-transform" 
                                     :class="{ 'rotate-180': open }"
                                     fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>

                            {{-- Botão para abrir dropdown quando colapsado --}}
                            <button @click.stop="open = !open" 
                                    x-show="sidebarCollapsed"
                                    class="hidden lg:block absolute inset-0 w-full h-full">
                            </button>
                        </div>

                        {{-- Tooltip (quando colapsado em md ou quando sidebarCollapsed em lg) --}}
                        <div x-show="tooltip && !open && (sidebarCollapsed || window.innerWidth < 1024)" 
                             x-transition 
                             x-cloak  
                             class="absolute left-full ml-3 top-1/2 -translate-y-1/2 
                             bg-[var(--color-primary-950)]/95 backdrop-blur-sm text-white text-xs font-medium 
                             px-4 py-2 rounded-lg shadow-xl border border-white/10 
                             whitespace-nowrap pointer-events-none z-50">
                            {{ $item['name'] }}
                        </div>

                        {{-- Submenu expansível (versão expandida - lg) --}}
                        <div x-show="open && !sidebarCollapsed" 
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="opacity-0 -translate-y-2"
                             x-transition:enter-end="opacity-100 translate-y-0"
                             x-transition:leave="transition ease-in duration-150"
                             x-transition:leave-start="opacity-100 translate-y-0"
                             x-transition:leave-end="opacity-0 -translate-y-2"
                             class="hidden lg:block mt-1 ml-4 space-y-1 border-l-2 border-white/20 pl-4">
                            @foreach($item['sublinks'] as $sublink)
                                <a href="{{ $sublink['route'] ? route($sublink['route']) : '#' }}"
                                    {{ $sublink['route'] ? 'wire:navigate' : '' }}
                                   class="flex items-center px-3 py-2 text-xs font-medium rounded-lg transition-colors
                                   {{ request()->routeIs($sublink['route'] . '*') && $sublink['route'] != null ? 'bg-white/10 text-white' : 'text-[var(--gray-100)] hover:bg-white/10' }}">
                                    @if(isset($sublink['icon']))
                                        {!! $sublink['icon'] !!}
                                    @endif
                                    <span class="ml-2">{{ $sublink['name'] }}</span>
                                </a>
                            @endforeach
                        </div>

                        {{-- Submenu flutuante (versão colapsada - md e lg quando collapsed) --}}
                        <div x-show="open && (sidebarCollapsed || window.innerWidth < 1024)" 
                             x-transition
                             @click.away="open = false"
                             class="absolute left-full ml-3 top-0 min-w-[200px]
                             bg-[var(--color-primary-950)]/95 backdrop-blur-sm rounded-lg shadow-xl border border-white/10 
                             py-2 z-50">
                            <a href="{{ $item['route'] ? route($item['route']) : '#' }}" 
                            {{ $item['route'] ? 'wire:navigate' : '' }}
                               class="block px-3 py-2 text-xs font-semibold text-white hover:bg-white/10 border-b border-white/10 transition-colors">
                                {{ $item['name'] }}
                            </a>
                            @foreach($item['sublinks'] as $sublink)
                                <a href="{{ $sublink['route'] ? route($sublink['route']) : '#' }}"
                                {{ $sublink['route'] ? 'wire:navigate' : '' }}
                                   class="flex items-center px-4 py-2 text-sm font-medium transition-colors
                                   {{ request()->routeIs($sublink['route'] . '*') && $sublink['route'] != null ? 'bg-white/10 text-white' : 'text-[var(--gray-100)] hover:bg-white/10' }}">
                                    @if(isset($sublink['icon']))
                                        <span class="w-5 h-5 flex-shrink-0">{!! $sublink['icon'] !!}</span>
                                    @endif
                                    <span class="ml-2">{{ $sublink['name'] }}</span>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @else
                    {{-- Item simples sem dropdown --}}
                    <div x-data="{ tooltip: false }" class="relative">
                        <a href="{{ $item['route'] ? route($item['route']) : '#' }}" 
                        {{ $item['route'] ? 'wire:navigate' : '' }}
                           @mouseenter="tooltip = true"
                           @mouseleave="tooltip = false"
                           class="flex items-center md:px-4 py-2.5 md:justify-center text-sm font-medium rounded-lg text-gray-300 hover:bg-white/10 transition-colors cursor-pointer 
                           {{ request()->routeIs($item['route'] . '*') && $item['route'] != null ? 'bg-white/10 text-white' : 'text-[var(--gray-100)] hover:bg-white/10' }}"
                           :class="sidebarCollapsed ? 'lg:justify-center' : 'lg:justify-start'">

                            {!! $item['icon'] !!}

                            <span x-show="!sidebarCollapsed" class="hidden lg:inline ml-2">{{ $item['name'] }}</span>
                        </a>

                        <!-- Tooltip -->
                        <div x-show="tooltip && (sidebarCollapsed || window.innerWidth < 1024)" 
                             x-transition 
                             x-cloak 
                             class="absolute left-full ml-3 top-1/2 -translate-y-1/2 
                             bg-[var(--color-primary-950)]/95 backdrop-blur-sm text-white text-xs font-medium 
                             px-4 py-2 rounded-lg shadow-xl border border-white/10 
                             whitespace-nowrap pointer-events-none z-50">
                            {{ $item['name'] }}
                        </div>
                    </div>
                @endif
            @endforeach
        </nav>
    </aside>

    <!-- Sidebar mobile (overlay) -->
    <div x-data="{ mobileOpen: false }" @toggle-mobile-sidebar.window="mobileOpen = !mobileOpen" class="md:hidden">
        <!-- Overlay -->
        <div x-show="mobileOpen" 
             x-transition:enter="transition-opacity ease-linear duration-300"
             x-transition:enter-start="opacity-0" 
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition-opacity ease-linear duration-300" 
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0" 
             @click="mobileOpen = false"
             class="fixed inset-0 bg-black/50 z-40" 
             style="display: none;">
        </div>

        <!-- Sidebar mobile -->
        <aside x-show="mobileOpen" 
               x-transition:enter="transform transition ease-in-out duration-300"
               x-transition:enter-start="-translate-x-full" 
               x-transition:enter-end="translate-x-0"
               x-transition:leave="transform transition ease-in-out duration-300" 
               x-transition:leave-start="translate-x-0"
               x-transition:leave-end="-translate-x-full"
               class="fixed top-0 left-0 h-screen w-64 bg-gradient-to-t from-[var(--color-primary-700)] to-[var(--color-primary-500)] dark:from-[var(--color-primary-700)] dark:to-[var(--color-primary-600)] text-white flex flex-col z-50"
               style="display: none;">
            
            <!-- Header com botão fechar -->
            <div class="flex items-center justify-between p-6 border-b border-white/10">
                <img src="{{ Storage::url($settings->light_logo_path) }}" alt="Logo" class="h-10 w-auto">
                <button @click="mobileOpen = false" class="p-2 rounded-lg hover:bg-white/10 transition-colors hover:cursor-pointer">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Navegação mobile -->
            <nav class="flex-1 px-4 py-4 space-y-1 overflow-y-auto">
                @foreach(config('sidebar.items') as $item)
                    @if(isset($item['sublinks']) && count($item['sublinks']) > 0)
                        {{-- Item com dropdown (mobile) --}}
                        <div x-data="{ open: false }">
                            <div class="w-full flex items-center px-4 py-2.5 text-sm font-medium rounded-lg transition-colors
                                    {{ request()->routeIs($item['route'] . '*') && $item['route'] != null ? 'bg-white/10 text-white' : 'text-[var(--gray-100)] hover:bg-white/10' }}">
                                {!! $item['icon'] !!}
                                
                                {{-- Link clicável do menu --}}
                                <a href="{{ $item['route'] ? route($item['route']) : '#' }}" 
                                {{ $item['route'] ? 'wire:navigate' : '' }}
                                   @click="mobileOpen = false"
                                   class="ml-2 flex-1 text-left">
                                    {{ $item['name'] }}
                                </a>
                                
                                {{-- Seta do dropdown - APENAS ELA abre/fecha --}}
                                <button @click.stop="open = !open" class="p-1 hover:bg-white/10 rounded transition-colors">
                                    <svg class="w-4 h-4 transition-transform" 
                                         :class="{ 'rotate-180': open }"
                                         fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>
                            </div>

                            {{-- Submenu mobile --}}
                            <div x-show="open" 
                                 x-transition:enter="transition ease-out duration-200"
                                 x-transition:enter-start="opacity-0 -translate-y-2"
                                 x-transition:enter-end="opacity-100 translate-y-0"
                                 class="mt-1 ml-4 space-y-1 border-l-2 border-white/20 pl-4">
                                @foreach($item['sublinks'] as $sublink)
                                    <a href="{{ $sublink['route'] ? route($sublink['route']) : '#' }}" 
                                    {{ $sublink['route'] ? 'wire:navigate' : '' }}
                                       @click="mobileOpen = false"
                                       class="flex items-center px-3 py-2 text-xs font-medium rounded-lg transition-colors
                                       {{ request()->routeIs($sublink['route'] . '*') && $sublink['route'] != null ? 'bg-white/10 text-white' : 'text-[var(--gray-100)] hover:bg-white/10' }}">
                                        @if(isset($sublink['icon']))
                                            {!! $sublink['icon'] !!}
                                        @endif
                                        <span class="ml-2">{{ $sublink['name'] }}</span>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @else
                        {{-- Item simples (mobile) --}}
                        <a href="{{ $item['route'] ? route($item['route']) : '#' }}" 
                        {{ $item['route'] ? 'wire:navigate' : '' }}
                           @click="mobileOpen = false"
                           class="flex items-center px-4 py-2.5 text-sm font-medium rounded-lg transition-colors 
                           {{ request()->routeIs($item['route'] . '*') && $item['route'] != null ? 'bg-white/10 text-white' : 'text-[var(--gray-100)] hover:bg-white/10' }}">
                            {!! $item['icon'] !!}
                            <span class="ml-2">{{ $item['name'] }}</span>
                        </a>
                    @endif
                @endforeach
            </nav>
        </aside>
    </div>
</div>