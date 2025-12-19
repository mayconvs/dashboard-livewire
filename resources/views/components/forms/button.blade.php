{{-- C:\laragon\www\dashboard-livewire\resources\views\components\forms\button.blade.php --}}
@props([
    'size' => 'md',
    'variant' => 'primary',
    'type' => 'button',
    'icon' => null,
])

@php
    $sizes = [
        'sm' => 'h-8 text-xs px-3',
        'md' => 'h-10 text-sm px-4',
        'lg' => 'h-14 text-base px-6',
    ];

    $variants = [
        'primary' =>
            'text-white bg-[var(--color-primary-500)] dark:bg-[var(--color-primary-700)] hover:bg-[var(--color-primary-500)]/90 dark:hover:bg-[var(--color-primary-700)]/90',
        'outline' => 'border border-primary text-primary hover:bg-primary hover:text-white',
    ];

    $icons = [
        'edit' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 p-1">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                      </svg>',
    ];
@endphp

@if (!$icon)
    <button
        {{ $attributes->merge(['type' => $type])->class([
                'flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center rounded-lg font-bold transition-colors  ',
                $sizes[$size],
                $variants[$variant],
            ]) }}>
        <span class="truncate">{{ $slot }}</span>
    </button>
@else
    <button
        {{ $attributes->merge(['type' => $type])->class([
                'flex items-center justify-center gap-2 min-w-[84px] max-w-[480px] cursor-pointer overflow-hidden rounded-lg h-10 px-4 text-primary text-sm font-bold leading-normal tracking-[0.015em]',
                $sizes[$size],
                $variants[$variant],
            ]) }}
        $sizes[$size], $variants[$variant],>
        {!! $icons[$icon] !!}
        <span class="truncate">{{ $slot }}</span>
    </button>
@endif
