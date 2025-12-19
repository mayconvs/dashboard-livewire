<?php

// config/branding.php → versão OKLCH (recomendada 2025+)
return [
    'name' => env('APP_NAME', 'mayconvs'),

    'logo' => [
        'light'  => env('APP_LOGO_LIGHT',  '/images/logo-light.svg'),
        'dark'   => env('APP_LOGO_DARK',   '/images/logo-dark.svg'),
        'light-mini'  => env('APP_LOGO_LIGHT_MINI',  '/images/logo-light-mini.svg'),
        'dark-mini'   => env('APP_LOGO_DARK_MINI',   '/images/logo-dark-mini.svg'),
        'alt'    => env('APP_LOGO_ALT',    env('APP_NAME', 'Neoenergy')),
        'width'  => env('APP_LOGO_WIDTH',  180),
        'width-mini'  => env('APP_LOGO_WIDTH_MINI',  90),
    ],

    'colors' => [
        'light' => [
            // Primary (indigo) → ficou ainda mais bonito
            'primary'       => 'oklch(63%  0.25 265)',   // era #6366f1
            'primary-hover' => 'oklch(56%  0.27 265)',   // era #4f46e5

            'background'    => 'oklch(98.5% 0.01 250)',  // era #f8fafc → quase branco com leve azul
            'surface'       => 'oklch(100%  0     0)',   // #ffffff puro → oklch(100% 0 0)
            'text'          => 'oklch(23%  0.04 260)',   // era #1e293b → mais elegante
            'text-muted'    => 'oklch(52%  0.04 255)',   // era #64748b
            'border'        => 'oklch(92%  0.02 250)',   // era #e2e8f0 → mais suave
        ],

        'dark' => [
            // Primary no dark → mais claro e vibrante (padrão 2025)
            'primary'       => 'oklch(75%  0.22 265)',   // era #818cf8 → mais bonito
            'primary-hover' => 'oklch(80%  0.20 265)',   // era #a5b4fc → hover perfeito

            'background'    => 'oklch(14%  0.03 255)',   // era #0f172a → mais rico
            'surface'       => 'oklch(22%  0.04 260)',   // era #1e293b → slate-800 melhorado
            'text'          => 'oklch(95%  0.02 250)',   // era #f1f5f9 → branco suave
            'text-muted'    => 'oklch(65%  0.04 255)',   // era #94a3b8
            'border'        => 'oklch(30%  0.04 260)',   // era #334155 → mais contraste
        ],

        // Cores de status → todas convertidas e otimizadas
        'success' => 'oklch(65%  0.20 160)',   // era #10b981 → emerald mais vivo
        'danger'  => 'oklch(65%  0.28  30)',   // era #ef4444 → red-500 perfeito
        'warning' => 'oklch(75%  0.25  75)',   // era #f59e0b → amber vibrante
        'info'    => 'oklch(70%  0.20 225)',   // era #06b6d4 → cyan mais elegante
    ]
];
