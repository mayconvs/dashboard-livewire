<div class="">
    <x-pricing-cards></x-pricing-cards>

    <div class="w-full mx-auto">
        <div
            class="bg-surface-light dark:bg-surface-dark rounded-xl shadow-sm border border-border-light dark:border-border-dark overflow-hidden">

            {{-- Header --}}
            <div
                class="p-5 flex flex-col sm:flex-row justify-between items-center gap-4 border-b border-border-light dark:border-border-dark">

                {{-- Quantidade por página --}}
                <div class="flex items-center text-sm text-gray-600 dark:text-gray-400">
                    <span class="mr-2">Mostrar</span>

                    <select wire:model.live="perPage"
                        class="bg-surface-light dark:bg-gray-700 border border-border-light dark:border-gray-600 text-gray-700 dark:text-gray-200 text-sm rounded-lg focus:ring-primary focus:border-primary block p-2 py-1.5">
                        <option value="10">10</option>
                        <option value="30">30</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                    <span class="ml-2">registros</span>
                </div>

                {{-- Busca --}}
                <div class="flex items-center gap-3 w-full sm:w-auto">
                    <div class="relative w-full sm:w-64">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                            </svg>
                        </div>

                        <input wire:model.live="search"
                            class="bg-gray-50 dark:bg-gray-800 border border-border-light dark:border-gray-600 text-gray-900 dark:text-gray-200 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full pl-10 p-2"
                            placeholder="Pesquisar..." type="text" />
                    </div>
                </div>
            </div>

            {{-- TABLE --}}
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-900/50 dark:text-gray-400">
                        <tr>
                            <th class="p-4 w-4">
                                <input type="checkbox">
                            </th>
                            <th class="px-6 py-3">Usuário</th>
                            <th class="px-6 py-3">Telefone</th>
                            <th class="px-6 py-3">Cargo</th>
                            <th class="px-6 py-3">Criado em</th>
                            <th class="px-6 py-3">Status</th>
                            <th class="px-6 py-3 text-right">Ações</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-border-light dark:divide-border-dark">

                        @forelse ($users as $user)
                            <tr
                                class="bg-surface-light dark:bg-surface-dark hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors">

                                <td class="w-4 p-4">
                                    <input type="checkbox">
                                </td>

                                <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                    <div class="flex flex-col">
                                        <span class="text-sm font-semibold">{{ $user->name }}
                                            {{ $user->last_name }}</span>
                                        <span
                                            class="text-xs text-gray-500 dark:text-gray-400">{{ $user->email }}</span>
                                    </div>
                                </td>

                                <td class="px-6 py-4">{{ $user->phone ?? '—' }}</td>

                                <td class="px-6 py-4">{{ $user->cargo->name ?? '—' }}</td>

                                <td class="px-6 py-4">
                                    {{ $user->created_at?->format('d/m/Y') }}
                                </td>

                                <td class="px-6 py-4">
                                    <span
                                        class="px-2.5 py-0.5 rounded-full text-xs font-medium {{ $user->active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                        {{ $user->active ? 'Ativo' : 'Inativo' }}
                                    </span>
                                </td>

                                <td class="px-6 py-4 text-right">
                                    <div class="flex justify-end gap-3">
                                        {{-- actions  --}}
                                        <button title="Configurar permissões"
                                            class="text-gray-400 hover:text-yellow-500 transition-colors cursor-pointer">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15.75 5.25a3 3 0 0 1 3 3m3 0a6 6 0 0 1-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1 1 21.75 8.25Z" />
                                            </svg>
                                        </button>

                                        <button title="Enviar e-mail de reset de senha"
                                            class="text-gray-400 hover:text-purple-500 transition-colors cursor-pointer">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M6 12 3.269 3.125A59.769 59.769 0 0 1 21.485 12 59.768 59.768 0 0 1 3.27 20.875L5.999 12Zm0 0h7.5" />
                                            </svg>
                                        </button>

                                        <button title="Excluir"
                                            class="text-gray-400 hover:text-red-500 transition-colors cursor-pointer">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                            </svg>
                                        </button>

                                        <button title="Editar"
                                            wire:click="openEditModal({{ $user->id }})"
                                            class="text-gray-400 hover:text-primary transition-colors cursor-pointer">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                                            </svg>
                                        </button>
                                        


                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-6 py-4 text-center text-gray-500">
                                    Nenhum resultado encontrado.
                                </td>
                            </tr>
                        @endforelse

                        @livewire('users.edit-user-modal')

                    </tbody>
                </table>
            </div>

            {{-- PAGINATION --}}
            <div
                class="p-5 flex flex-col sm:flex-row justify-between items-center gap-4 border-t border-border-light dark:border-border-dark">

                <span class="text-sm text-gray-600 dark:text-gray-400">
                    Mostrando
                    <span class="font-semibold">{{ $users->firstItem() }}</span>
                    a
                    <span class="font-semibold">{{ $users->lastItem() }}</span>
                    de
                    <span class="font-semibold">{{ $users->total() }}</span>
                    registros
                </span>

                {{-- <nav>{{ $users->links() }} </nav> --}}
                <nav>
                    <ul class="inline-flex -space-x-px text-sm">

                        {{-- Primeira --}}
                        @if ($users->currentPage() > 1)
                            <li>
                                <button wire:click="gotoPage(1)"
                                    class="flex items-center justify-center px-3 h-9 leading-tight text-gray-500 bg-white dark:bg-gray-800 border border-border-light dark:border-gray-700 rounded-l-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors cursor-pointer">
                                    Primeira
                                </button>
                            </li>
                        @endif

                        {{-- Numeração tradicional --}}
                        @foreach ($users->links()->paginator->getUrlRange($users->currentPage() - 1, $users->currentPage() + 1) as $page => $url)
                            @if ($page > 0 && $page <= $users->lastPage())
                                <li>
                                    <button wire:click="gotoPage({{ $page }})"
                                        class="flex items-center justify-center px-3 h-9 leading-tight border cursor-pointer
                                            {{ $page == $users->currentPage()
                                                ? 'text-white bg-primary border-primary'
                                                : 'text-gray-500 bg-white dark:bg-gray-800 border-border-light dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors' }}">
                                        {{ $page }}
                                    </button>
                                </li>
                            @endif
                        @endforeach

                        {{-- Última --}}
                        @if ($users->currentPage() < $users->lastPage())
                            <li>
                                <button wire:click="gotoPage({{ $users->lastPage() }})"
                                    class="flex items-center justify-center px-3 h-9 leading-tight text-gray-500 bg-white dark:bg-gray-800 border border-border-light dark:border-gray-700 rounded-r-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors cursor-pointer">
                                    Última
                                </button>
                            </li>
                        @endif

                    </ul>
                </nav>
            </div>

        </div>
    </div>
</div>
