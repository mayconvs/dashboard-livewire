<div class="grid grid-cols-1 md:grid-cols-3 gap-6 lg:gap-8 items-start mb-8">

    {{-- PLANO GRÁTIS --}}
    <div
        class="flex flex-col gap-6 rounded-2xl border border-solid border-slate-200 dark:border-border-dark bg-white dark:bg-[#1a202c] p-6 lg:p-8 hover:border-slate-300 dark:hover:border-slate-500 transition-all duration-300 hover:-translate-y-1 shadow-sm hover:shadow-xl dark:shadow-none">

        <div class="flex flex-col gap-2">
            <h3 class="text-slate-900 dark:text-white text-xl font-bold leading-tight">Grátis</h3>
            <p class="text-slate-500 dark:text-text-secondary text-sm">Para você começar e testar.</p>

            <div class="mt-4 flex items-baseline gap-1">
                <span class="text-slate-900 dark:text-white text-4xl font-black tracking-[-0.033em]">
                    R$0
                </span>
                <span class="text-slate-500 dark:text-text-secondary text-base font-medium">
                    /mês
                </span>
            </div>
        </div>

        <a href="{{ route('register') }}"
           class="flex w-full h-12 items-center justify-center rounded-lg px-4
                  bg-slate-100 dark:bg-slate-800
                  hover:bg-slate-200 dark:hover:bg-slate-700
                  text-slate-900 dark:text-white
                  text-sm font-bold transition-colors">
            Começar Grátis
        </a>

        <div class="space-y-4 pt-2 border-t border-slate-100 dark:border-slate-800">
            <p class="text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider">
                Recursos
            </p>

            <ul class="flex flex-col gap-3">
                <li class="flex items-start gap-3 text-sm text-slate-700 dark:text-slate-300">
                    <svg class="size-6 shrink-0 mt-0.5 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/>
                    </svg>
                    1 Edital
                </li>

                <li class="flex items-start gap-3 text-sm text-slate-700 dark:text-slate-300">
                    <svg class="size-6 shrink-0 mt-0.5 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/>
                    </svg>
                    Edital Verticalizado
                </li>

                <li class="flex items-start gap-3 text-sm text-slate-700 dark:text-slate-300">
                    <svg class="size-6 shrink-0 mt-0.5 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/>
                    </svg>
                    Análise orientativa com IA baseada no edital
                </li>

                <li class="flex items-start gap-3 text-sm text-slate-400 dark:text-slate-600 line-through">
                    <svg class="size-6 shrink-0 mt-0.5 text-slate-400 dark:text-slate-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12"/>
                    </svg>
                    Estatísticas
                </li>

                <li class="flex items-start gap-3 text-sm text-slate-400 dark:text-slate-600 line-through">
                    <svg class="size-6 shrink-0 mt-0.5 text-slate-400 dark:text-slate-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12"/>
                    </svg>
                    Suporte
                </li>
            </ul>
        </div>
    </div>

    {{-- PLANO MENSAL --}}
    <div
        class="relative flex flex-col gap-6 rounded-2xl border-2 border-primary bg-white dark:bg-[#1a202c]
               p-6 lg:p-8 md:-translate-y-4 shadow-xl shadow-primary/10 hover:shadow-primary/20 transition-all z-10">

        <div
            class="absolute top-0 left-1/2 -translate-x-1/2 -translate-y-1/2
                   bg-primary text-white px-4 py-1 rounded-full text-xs font-bold shadow-lg">
            MAIS POPULAR
        </div>

        <div class="flex flex-col gap-2">
            <h3 class="text-xl font-bold text-primary">Mensal</h3>
            <p class="text-slate-500 dark:text-text-secondary text-sm">Tudo no seu tempo!</p>

            <div class="mt-4 flex items-baseline gap-1">
                <span class="text-4xl font-black tracking-[-0.033em] text-slate-900 dark:text-white">
                    R$34,90
                </span>
                <span class="text-slate-500 dark:text-text-secondary text-base font-medium">
                    /mês
                </span>
            </div>
        </div>

        <a href="{{ route('plan.selected', ['id' => $prices['monthly']]) }}"
            class="flex w-full h-12 items-center justify-center rounded-lg px-4
                   bg-primary hover:bg-primary/90
                   text-white text-sm font-bold
                   shadow-lg shadow-primary/30
                   transition-all">
             Assinar
         </a>

<ul class="flex flex-col gap-3">
                <li class="flex items-center gap-3 text-sm text-slate-700 dark:text-slate-300">
                    
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-primary shrink-0 mt-0.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                      </svg>
                      
                    <span class="font-medium">2 Editais</span>
                </li>
                <li class="flex items-center gap-3 text-sm text-slate-700 dark:text-slate-300">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-primary shrink-0 mt-0.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                      </svg>
                    <span class="font-medium">Edital Verticalizado</span>
                </li>
                <li class="flex items-center gap-3 text-sm text-slate-700 dark:text-slate-300">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-primary shrink-0 mt-0.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                      </svg>
                    <span class="font-medium">Análise orientativa com IA baseada no edital</span>
                </li>
                <li class="flex items-center gap-3 text-sm text-slate-700 dark:text-slate-300">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-primary shrink-0 mt-0.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                      </svg>
                    <span class="font-medium">Estatísticas</span>
                </li>
                <li class="flex items-center gap-3 text-sm text-slate-700 dark:text-slate-300">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-primary shrink-0 mt-0.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                      </svg>
                    <span class="font-medium">Suporte</span>
                </li>
                
            </ul>
    </div>

    {{-- PLANO ANUAL --}}
    <div
        class="flex flex-col gap-6 rounded-2xl border border-slate-200 dark:border-border-dark bg-white dark:bg-[#1a202c]
               p-6 lg:p-8 hover:border-slate-300 dark:hover:border-slate-500 transition-all hover:-translate-y-1 shadow-sm hover:shadow-xl">

        <div class="flex flex-col gap-2">
            <h3 class="text-xl font-bold text-slate-900 dark:text-white">Anual</h3>
            <p class="text-slate-500 dark:text-text-secondary text-sm">
                Para você que leva o estudo realmente a sério!
            </p>

            <div class="mt-4 flex items-baseline gap-1">
                <span class="text-4xl font-black tracking-[-0.033em] text-slate-900 dark:text-white">
                    R$299,90
                </span>
                <span class="text-slate-500 dark:text-text-secondary text-base font-medium">
                    /ano
                </span>
            </div>
        </div>

        <a href="{{ route('plan.selected', ['id' => $prices['yearly']]) }}"
           class="flex w-full h-12 items-center justify-center rounded-lg px-4
                  border border-slate-300 dark:border-slate-600
                  hover:bg-slate-50 dark:hover:bg-slate-800
                  text-slate-900 dark:text-white
                  text-sm font-bold transition-colors">
            Assinar
        </a>

        <ul class="flex flex-col gap-3">
                <li class="flex items-center gap-3 text-sm text-slate-700 dark:text-slate-300">
                    
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-purple-500 shrink-0 mt-0.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z" />
                      </svg>
                      
                    2 Editais
                </li>
                <li class="flex items-center gap-3 text-sm text-slate-700 dark:text-slate-300">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-purple-500 shrink-0 mt-0.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z" />
                      </svg>
                    Edital Verticalizado
                </li>
                <li class="flex items-center gap-3 text-sm text-slate-700 dark:text-slate-300">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-purple-500 shrink-0 mt-0.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z" />
                      </svg>
                      Análise orientativa com IA baseada no edital
                </li>
                <li class="flex items-center gap-3 text-sm text-slate-700 dark:text-slate-300">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-purple-500 shrink-0 mt-0.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z" />
                      </svg>
                    Estatísticas
                </li>
                <li class="flex items-center gap-3 text-sm text-slate-700 dark:text-slate-300">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-purple-500 shrink-0 mt-0.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z" />
                      </svg>
                    Suporte
                </li>
            </ul>
    </div>

</div>
