<x-layouts.guest>
<div class="relative flex min-h-screen w-full flex-col items-center justify-center overflow-hidden p-4 sm:p-6 lg:p-8">
    <div
        class="absolute inset-0 bg-grid-pattern bg-[length:30px_30px] sm:bg-[length:40px_40px] [mask-image:radial-gradient(ellipse_at_center,black_40%,transparent_100%)] pointer-events-none">
    </div>
    <div
        class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[300px] h-[300px] sm:w-[400px] sm:h-[400px] lg:w-[500px] lg:h-[500px] bg-primary/20 blur-[80px] sm:blur-[100px] rounded-full pointer-events-none">
    </div>
    <div
        class="relative z-10 flex w-full max-w-[340px] sm:max-w-[420px] lg:max-w-[480px] flex-col items-center gap-6 sm:gap-8 p-4 sm:p-6 animate-in fade-in zoom-in duration-500">
        <div class="relative flex items-center justify-center">
            <div class="absolute inset-0 rounded-full bg-primary/20 blur-sm scale-110"></div>
            <div
                class="relative flex h-20 w-20 sm:h-24 sm:w-24 lg:h-28 lg:w-28 items-center justify-center rounded-full bg-gradient-to-tr from-primary/10 to-primary/5 border border-primary/20 shadow-[0_0_20px_-5px_rgba(19,91,236,0.3)] sm:shadow-[0_0_30px_-5px_rgba(19,91,236,0.3)]">
                <div
                    class="flex h-14 w-14 sm:h-16 sm:w-16 lg:h-20 lg:w-20 items-center justify-center rounded-full bg-primary shadow-lg shadow-primary/40">
                    {{-- <span class="material-symbols-outlined text-3xl sm:text-4xl lg:text-5xl text-white font-bold">
                        check
                    </span> --}}
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-full">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                      </svg>
                      
                </div>
            </div>
        </div>
        <div class="flex flex-col items-center gap-3 sm:gap-4 text-center">
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black tracking-tight text-slate-900 dark:text-white">
                SUCCESSO!
            </h1>
            <p
                class="text-sm sm:text-base font-normal leading-relaxed text-slate-500 dark:text-slate-400 max-w-[280px] sm:max-w-[360px] lg:max-w-[400px]">
                Parabéns! Agora você está a um passo de chegar ao seu Dashboard!
            </p>
        </div>
        <button
            class="group relative flex w-full max-w-[280px] sm:max-w-[300px] lg:max-w-[320px] cursor-pointer items-center justify-center gap-2 overflow-hidden rounded-xl bg-primary px-6 py-3 sm:px-8 sm:py-3.5 text-sm font-bold text-white shadow-lg shadow-primary/25 transition-all hover:bg-blue-600 hover:shadow-primary/40 active:scale-95 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 dark:focus:ring-offset-background-dark">
            <a href="{{ route('dashboard') }}" class="relative z-10 whitespace-nowrap">
                Acessar Meu Dashboard
            </a>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
              </svg>
              
        </button>
        <div class="mt-2 sm:mt-4 flex items-center gap-2 text-[10px] sm:text-xs text-slate-500 dark:text-slate-600">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z" />
              </svg>
              
            <span>Transação Segura</span>
        </div>
    </div>
</div>
</x-layouts.guest>