{{-- C:\laragon\www\dashboard-livewire\resources\views\components\forms\textarea.blade.php --}}
<div class="mb-4">
    @if ($label)
        <label for="{{ $name }}" class="block text-sm font-medium text-[var(--gray-700)]">
            {{ $label }}
        </label>
    @endif

    <textarea
        name="{{ $name }}"
        id="{{ $name }}"
        placeholder="{{ $placeholder }}"
        rows="{{ $rows }}"
        {{ $attributes->merge([
            'class' =>
                'mt-1 block w-full caret-[var(--color-primary-500)] border border-[var(--gray-300)] rounded-md shadow-sm p-2 focus:ring-[var(--color-primary-500)] focus:border-[var(--color-primary-500)] sm:text-sm'
        ]) }}

        @isset($attributes['wire:model'])
            wire:model="{{ $attributes['wire:model'] }}"
        @endisset
    ></textarea>

    @error($name)
        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>
