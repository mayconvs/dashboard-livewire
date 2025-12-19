{{-- C:\laragon\www\dashboard-livewire\resources\views\components\layouts\_theme_variables.blade.php --}}
@php
    function hexToHsl($hex)
    {
        [$r, $g, $b] = sscanf($hex, '#%02x%02x%02x');

        $r /= 255;
        $g /= 255;
        $b /= 255;
        $max = max($r, $g, $b);
        $min = min($r, $g, $b);
        $l = ($max + $min) / 2;

        if ($max === $min) {
            $h = $s = 0;
        } else {
            $d = $max - $min;
            $s = $l > 0.5 ? $d / (2 - $max - $min) : $d / ($max + $min);

            switch ($max) {
                case $r:
                    $h = ($g - $b) / $d + ($g < $b ? 6 : 0);
                    break;
                case $g:
                    $h = ($b - $r) / $d + 2;
                    break;
                case $b:
                    $h = ($r - $g) / $d + 4;
                    break;
            }
            $h /= 6;
        }

        return [round($h * 360), round($s * 100) . "%", round($l * 100)];
    }

    $settings = \App\Models\Setting::get_app_settings();
    $primary = $settings->primary_color_hex;
    $secondary = $settings->secondary_color_hex;
    [$r, $g, $b] = sscanf($primary, '#%02x%02x%02x');
    [$rs, $gs, $bs] = sscanf($secondary, '#%02x%02x%02x');

    [$primary_h, $primary_s, $primary_l] = hexToHsl($primary);
    [$secondary_h, $secondary_s, $secondary_l] = hexToHsl($secondary);
@endphp

<style>
    :root {
        --color-primary: {{ $settings->primary_color_hex ?? '#6366f1' }};
        --primary-h: {{ $primary_h }};
        --primary-s: {{ $primary_s }};
        --primary-l: {{ $primary_l }};
        --color-primary-rgb: {{ "$r $g $b" }};

        --color-secondary: {{ $settings->secondary_color_hex ?? '#06b6d4' }};
        --secondary-h: {{ $secondary_h }};
        --secondary-s: {{ $secondary_s }};
        --secondary-l: {{ $secondary_l }};
        --color-secondary-rgb: {{ "$rs $gs $bs" }};


        /* Se quiser shades automáticos: */
        --color-primary-50: color-mix(in oklab, var(--color-primary), white 90%);
        --color-primary-100: color-mix(in oklab, var(--color-primary), white 80%);
        --color-primary-200: color-mix(in oklab, var(--color-primary), white 65%);
        --color-primary-300: color-mix(in oklab, var(--color-primary), white 50%);
        --color-primary-400: color-mix(in oklab, var(--color-primary), white 35%);
        --color-primary-500: var(--color-primary);
        --color-primary-600: color-mix(in oklab, var(--color-primary), black 10%);
        --color-primary-700: color-mix(in oklab, var(--color-primary), black 20%);
        --color-primary-800: color-mix(in oklab, var(--color-primary), black 35%);
        --color-primary-900: color-mix(in oklab, var(--color-primary), black 50%);
        --color-primary-950: color-mix(in oklab, var(--color-primary), black 60%);

        --color-secondary-50: color-mix(in oklab, var(--color-secondary), white 90%);
        --color-secondary-100: color-mix(in oklab, var(--color-secondary), white 80%);
        --color-secondary-200: color-mix(in oklab, var(--color-secondary), white 65%);
        --color-secondary-300: color-mix(in oklab, var(--color-secondary), white 50%);
        --color-secondary-400: color-mix(in oklab, var(--color-secondary), white 35%);
        --color-secondary-500: var(--color-secondary);
        --color-secondary-600: color-mix(in oklab, var(--color-secondary), black 10%);
        --color-secondary-700: color-mix(in oklab, var(--color-secondary), black 20%);
        --color-secondary-800: color-mix(in oklab, var(--color-secondary), black 35%);
        --color-secondary-900: color-mix(in oklab, var(--color-secondary), black 50%);
        --color-secondary-950: color-mix(in oklab, var(--color-secondary), black 60%);

        --gray-50: hsl({{ $primary_h }}, 0%, 98%);
        --gray-100: hsl({{ $primary_h }}, 2%, 94%);
        --gray-200: hsl({{ $primary_h }}, 4%, 86%);
        --gray-300: hsl({{ $primary_h }}, 6%, 74%);
        --gray-400: hsl({{ $primary_h }}, 8%, 62%);
        --gray-500: hsl({{ $primary_h }}, 10%, 49%);
        --gray-600: hsl({{ $primary_h }}, 12%, 38%);
        --gray-700: hsl({{ $primary_h }}, 14%, 28%);
        --gray-800: hsl({{ $primary_h }}, 2%, 18%);
        --gray-900: hsl({{ $primary_h }}, 18%, 5%);
        --gray-950: hsl({{ $primary_h }}, 20%, 2%);


    }

    .dark {
        --color-primary: {{ $settings->primary_color_hex }};
    }
</style>
