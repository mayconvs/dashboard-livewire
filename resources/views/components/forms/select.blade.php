{{-- resources/views/components/forms/select.blade.php --}}
@props([
    'name',
    'label',
    'items',
    'itemValue',
    'itemLabel',
    'placeholder',
    'required',
])

@php
    $items = collect($items);
    // Pega o valor do wire:model ou do selected
    //$wireModel = $attributes->wire('model')->value();
    $wireModel = $attributes->get('wire:model');

@endphp

<div class="flex flex-col w-full" x-data="{ 
    open: false, 
    search: '',
    selected: @entangle($wireModel).live

}" @click.away="open = false">
{{-- <input
    type="hidden"
    name="{{ $name }}"
    wire:model.live="{{ $wireModel }}"
> --}}
    
    @if ($label)
        <label class="text-gray-900 dark:text-gray-50 text-base text-left font-medium leading-normal pb-2">
            {{ $label }}
            @if($required)
                <span class="text-red-500">*</span>
            @endif
        </label>
    @endif

    <div class="relative">
        {{-- Botão do Select --}}
        <button 
            type="button"
            @click="open = !open"
            class="grid w-full cursor-default grid-cols-1 border border-[#324467] bg-gray-50 dark:bg-gray-900 focus:border-primary rounded-md py-1.5 pr-2 pl-3 text-left outline-1 -outline-offset-1 outline-white/10 focus-visible:outline-2 focus-visible:-outline-offset-2 focus-visible:outline-indigo-500 sm:text-sm/6 h-14 hover:cursor-pointer transition-colors"
        >
            <span class="col-start-1 row-start-1 flex items-center gap-3 pr-6">
                <span class="block truncate text-gray-900 dark:text-gray-50">
                    <template x-if="selected">
                        <span>
                            @foreach ($items as $item)
                                <span x-cloak x-show="selected == {{ $item->{$itemValue} }}">
                                    {{ $item->{$itemLabel} }}
                                </span>
                            @endforeach
                        </span>
                    </template>
                    <template x-if="!selected">
                        <span>{{ $placeholder }}</span>
                    </template>
                </span>
            </span>
            
            {{-- Ícone de seta --}}
            <svg 
                viewBox="0 0 16 16" 
                fill="currentColor" 
                aria-hidden="true"
                class="col-start-1 row-start-1 size-5 self-center justify-self-end text-gray-400 sm:size-4 transition-transform"
                :class="{ 'rotate-180': open }"
            >
                <path
                    d="M5.22 10.22a.75.75 0 0 1 1.06 0L8 11.94l1.72-1.72a.75.75 0 1 1 1.06 1.06l-2.25 2.25a.75.75 0 0 1-1.06 0l-2.25-2.25a.75.75 0 0 1 0-1.06ZM10.78 5.78a.75.75 0 0 1-1.06 0L8 4.06 6.28 5.78a.75.75 0 0 1-1.06-1.06l2.25-2.25a.75.75 0 0 1 1.06 0l2.25 2.25a.75.75 0 0 1 0 1.06Z"
                    clip-rule="evenodd" 
                    fill-rule="evenodd" 
                />
            </svg>
        </button>

        {{-- Dropdown com opções --}}
        <div 
        x-cloak
            x-show="open"
            x-transition:enter="transition ease-out duration-100"
            x-transition:enter-start="opacity-0 scale-95"
            x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-75"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-95"
            class="absolute z-50 mt-1 w-full max-h-60 overflow-auto rounded-md border border-[#324467] bg-gray-50 dark:bg-gray-900 py-1 shadow-lg"
            style="display: none;"
        >
            {{-- Campo de busca --}}
            <div class="px-3 py-2 border-b border-[#324467]">
                <input 
                    type="text"
                    x-model="search"
                    placeholder="Buscar..."
                    class="w-full px-2 py-1.5 text-sm bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded text-gray-900 dark:text-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    @click.stop
                >
            </div>

            {{-- Lista de opções --}}
            <div class="py-1">
                @forelse($items as $item)
                    @php
                        $itemId = $item->{$itemValue};
                        $itemText = $item->{$itemLabel};
                    @endphp
                    <button
                        type="button"
                        @click="
                            selected = {{ $itemId }};
                            open = false;
                            search = '';
                        "
                        x-cloak x-show="'{{ strtolower($itemText) }}'.includes(search.toLowerCase())"
                        class="group/option w-full relative flex items-center py-2 pr-9 pl-3 text-left hover:bg-indigo-500 focus:bg-indigo-500 transition-colors"
                        :class="{ 'bg-indigo-600': selected == {{ $itemId }} }"
                    >
                        <span class="ml-3 block truncate text-gray-900 dark:text-gray-50 group-hover/option:text-white"
                              :class="{ 'text-white': selected == {{ $itemId }} }">
                            {{ $itemText }}
                        </span>
                        
                        <svg x-cloak x-show="selected == {{ $itemId }}" 
                             class="absolute right-3 size-5 text-white" 
                             viewBox="0 0 20 20" 
                             fill="currentColor">
                            <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                        </svg>
                    </button>
                @empty
                    <div class="px-3 py-2 text-sm text-gray-500 dark:text-gray-400">
                        Nenhum item disponível
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    {{-- Mensagem de erro --}}
    @error($name)
        <p class="mt-1 text-sm text-red-600 dark:text-red-400">
            {{ $message }}
        </p>
    @enderror
</div>