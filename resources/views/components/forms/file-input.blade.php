@props([
    'label' => '',
    'name' => '',
    'wire' => '', // Propriedade para wire:model
    'accept' => 'image/*',
    'current_file' => null, // Para exibir o nome do arquivo atual (se já estiver salvo)
    'selected_name' => null, 
])



<div {{ $attributes->only('class') }}>
    {{-- Label (Opcional) --}}
    @if ($label)
        <label for="{{ $name }}" class="block text-sm font-medium leading-6 text-text-muted dark:text-text-muted-dark mb-1">
            {{ $label }}
        </label>
    @endif

    {{-- Container do Input de Arquivo --}}
    <div class="relative">
        <input 
            type="file" 
            id="{{ $name }}" 
            name="{{ $name }}" 
            {{ $attributes->whereStartsWith('wire:model') }}
            accept="{{ $accept }}"
            class="
                absolute inset-0 z-50 
                w-full h-full opacity-0 
                focus:outline-none focus:ring-2 focus:ring-primary focus:ring-opacity-50 hover:cursor-pointer 
            "
        />

        {{-- Layout Visual Personalizado --}}
        <div class="
            flex items-center 
            bg-surface dark:bg-surface-dark 
            border border-[var(--color-primary-700)] dark:border-border-[var(--color-primary-800)]
            rounded-lg 
            shadow-sm 
            transition duration-150 ease-in-out
            overflow-hidden
        ">
            {{-- Botão "Procurar..." (Estilo do botão de cor Primária) --}}
            <span class="
                px-4 py-2 
                bg-[var(--color-primary-500)] hover:bg-[var(--color-primary-50)]
                text-white 
                font-semibold text-sm 
                rounded-l-lg 
                flex-shrink-0 
                transition duration-150 ease-in-out
                border-r border-[var(--color-primary-700)]
                
                
                {{-- O botão visual não recebe cliques, o input invisível recebe --}}
                pointer-events-none 
            ">
                Procurar...
            </span>

            {{-- Exibição do Nome do Arquivo Selecionado --}}
            <span class="
                flex-1 px-4 py-2 
                text-sm 
                truncate 
                text-[var(--gray-900)] dark:text-[var(--gray-50)]
                pointer-events-none
                
                {{-- Preenche o fundo --}}
                bg-surface dark:bg-surface-dark
            ">
                {{--
                    Lógica para mostrar:
                    1. O nome do arquivo *PENDENTE* de upload (Livewire $wire.name)
                    2. O nome do arquivo *ATUAL* (se fornecido via $current_file)
                    3. O texto padrão
                --}}

                @if ($selected_name)
                    {{ $selected_name }}
                @elseif ($current_file)
                    {{ $current_file }}
                @else
                    Nenhum arquivo selecionado.
                @endif


                



                {{-- @if ($current_file)
                    {{ $current_file }}
                @else
                    Nenhum arquivo selecionado.
                @endif --}}



                {{-- @if ($attributes->has('wire:model') && $this->{{ $wire }})
                    {{ $this->{{ $wire }}->getClientOriginalName() }}
                @elseif ($current_file)
                    {{ $current_file }}
                @else
                    Nenhum arquivo selecionado.
                @endif --}}
            </span>
        </div>
    </div>
    <div wire:loading wire:target="{{$name}}">Carregando...</div>
    
    {{-- Feedback de erro do Livewire --}}
    @error($name) 
        <p class="mt-2 text-sm text-danger">{{ $message }}</p> 
    @enderror
    
</div>