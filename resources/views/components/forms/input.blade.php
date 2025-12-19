{{-- C:\laragon\www\dashboard-livewire\resources\views\components\forms\input.blade.php --}}
<div class="mb-4">
    <label class="flex flex-col">
        @if ($label)
            <p class="text-[var(--gray-900)] dark:text-[var(--gray-50)] text-base font-medium pb-2 text-left">{{ $label }}</p>
        @endif
        <input 
            value="{{ old($name, $value ?? '') }}"
            required 
            autofocus 
            type="{{ $type }}" 
            name="{{ $name }}"
            id="{{ $name }}" 
            placeholder="{{ $placeholder }}" 

            {{-- Classe base do Tailwind para estilo --}}
            {{-- {{ $attributes->merge(['class' => 'form-input w-full rounded-lg border border-[var(--gray-700)] placeholder:text-[var(--gray-500)] bg-[var(--gray-50)] dark:bg-[var(--gray-900)] text-[var(--gray-900)] dark:text-[var(--gray-50)] h-14 p-[15px] focus:border-primary focus:outline-0']) }} --}}
            {{ $attributes->class([
                'form-input w-full rounded-lg border border-[var(--gray-700)] placeholder:text-[var(--gray-500)]
                 bg-[var(--gray-50)] dark:bg-[var(--gray-900)] text-[var(--gray-900)] dark:text-[var(--gray-50)]
                 h-14 p-[15px] focus:border-primary focus:outline-0',
                 'hover:cursor-pointer' => $type === 'color',
            ]) }}

            {{-- Associa o wire:model se for passado como atributo --}}
            @isset($attributes['wire:model'])
                wire:model="{{ $attributes['wire:model'] }}"
            @endisset />


        {{-- Exibe erro do Livewire se houver --}}
        @error($name)
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </label>

</div>
