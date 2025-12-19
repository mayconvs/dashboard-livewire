{{-- C:\laragon\www\dashboard-livewire\resources\views\auth\register.blade.php --}}
<x-layouts.guest title="Registrar - {{ env('APP_NAME') }}">
    <div
        class="fixed top-0 left-0 right-0 z-30 h-16 flex justify-end items-right px-4 bg-gray-50  dark:border-gray-700 dark:bg-gray-950 ">
        <button class="hover:cursor-pointer hover:text-primary" @click="toggleDarkMode()">
            <template x-if="!isDark">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M20.354 15.354A9 9 9 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                </svg>
            </template>
            <template x-if="isDark">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 3v2.25m6.364.386-1.591 1.591M21 12h-2.25m-.386 6.364-1.591-1.591M12 18.75V21m-4.773-4.227-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" />
                </svg>
            </template>
        </button>
    </div>

    <div
        class="relative flex h-auto min-h-screen w-full flex-col bg-gray-50 dark:bg-gray-950 group/design-root overflow-x-hidden">

        <div class="layout-container flex h-full grow flex-col ">
            <div class="flex flex-1 justify-center items-center p-4 lg:p-8 ">
                <div class="layout-content-container flex flex-col max-w-6xl  bg-gray-50 dark:bg-gray-900">
                    <div
                        class="grid grid-cols-1 lg:grid-cols-1 w-full grow bg-gray-50 dark:bg-gray-900 text-gray-900 dark:text-gray-50 rounded-xl overflow-hidden shadow-2xl shadow-black/20">

                        <div class="w-full flex flex-col justify-center p-8 sm:p-12 md:p-16">
                            <div class="flex flex-col gap-8 w-full max-w-md mx-auto">
                                <div class="flex flex-col gap-3">
                                    <p
                                        class="text-gray-900 dark:text-gray-50 text-4xl font-black leading-tight tracking-[-0.033em]">
                                        Registrar</p>
                                    <p class="text-gray-900 dark:text-gray-50 text-base font-normal leading-normal">Faça
                                        o registro da sua
                                        conta abaixo:</p>
                                </div>
                                <form method="POST" action="{{ route('store_user') }}" class="flex flex-col gap-4">
                                    @csrf
                                    <div class="flex flex-col gap-4">
                                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                                            <label class="flex flex-col w-full">
                                                <p
                                                    class="text-gray-900 dark:text-gray-50 text-base font-medium leading-normal pb-2">
                                                    Nome</p>
                                                <input
                                                    class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-gray-900 dark:text-gray-50 focus:outline-0 focus:ring-0 border border-[#324467] bg-gray-50 dark:bg-gray-900 focus:border-primary h-14 placeholder:text-[#92a4c9] p-[15px] text-base font-normal leading-normal"
                                                    placeholder="Digite seu nome" type="text" name="name"
                                                    value="{{ old('name') }}" />
                                                @error('name')
                                                    <p class="mt-0 text-sm right-0 text-danger"><span
                                                            class="font-medium"></span>
                                                        {{ $message }}</p>
                                                @enderror
                                            </label>

                                            <label class="flex flex-col w-full">
                                                <p
                                                    class="text-gray-900 dark:text-gray-50 text-base font-medium leading-normal pb-2">
                                                    Sobrenome</p>
                                                <input
                                                    class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-gray-900 dark:text-gray-50 focus:outline-0 focus:ring-0 border border-[#324467] bg-gray-50 dark:bg-gray-900 focus:border-primary h-14 placeholder:text-[#92a4c9] p-[15px] text-base font-normal leading-normal"
                                                    placeholder="Digite seu sobrenome" type="text" name="last_name"
                                                    value="{{ old('last_name') }}" />
                                                @error('last_name')
                                                    <p class="mt-0 text-sm right-0 text-danger"><span
                                                            class="font-medium"></span>
                                                        {{ $message }}</p>
                                                @enderror
                                            </label>

                                        </div>

                                        <label class="flex flex-col w-full">
                                            <p
                                                class="text-gray-900 dark:text-gray-50 text-base font-medium leading-normal pb-2">
                                                E-mail</p>
                                            <input
                                                class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-gray-900 dark:text-gray-50 focus:outline-0 focus:ring-0 border border-[#324467] bg-gray-50 dark:bg-gray-900 focus:border-primary h-14 placeholder:text-[#92a4c9] p-[15px] text-base font-normal leading-normal"
                                                placeholder="Digite seu e-mail" type="email" name="email"
                                                value="{{ old('email') }}" />
                                            @error('email')
                                                <p class="mt-0 text-sm right-0 text-danger"><span
                                                        class="font-medium"></span>
                                                    {{ $message }}</p>
                                            @enderror
                                        </label>

                                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                                            <label class="flex flex-col w-full">
                                                <p
                                                    class="text-gray-900 dark:text-gray-50 text-base font-medium leading-normal pb-2">
                                                    Telefone</p>
                                                <input
                                                    class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-gray-900 dark:text-gray-50 focus:outline-0 focus:ring-0 border border-[#324467] bg-gray-50 dark:bg-gray-900 focus:border-primary h-14 placeholder:text-[#92a4c9] p-[15px] text-base font-normal leading-normal"
                                                    placeholder="(00) 98888-7777" type="text" name="phone"
                                                    value="{{ old('phone') }}" />
                                                @error('phone')
                                                    <p class="mt-0 text-sm right-0 text-danger"><span
                                                            class="font-medium"></span>
                                                        {{ $message }}</p>
                                                @enderror
                                            </label>



                                            <label class="flex flex-col w-full">
                                                <p
                                                    class="text-gray-900 dark:text-gray-50 text-base font-medium leading-normal pb-2">
                                                    Cargo</p>
                                                <el-select id="cargo_id" name="cargo_id" value="{{ old('cargo_id') }}"
                                                    class="block">

                                                    <button type="button"
                                                        class="grid w-full cursor-default grid-cols-1 border border-[#324467] bg-gray-50 dark:bg-gray-900 focus:border-primary rounded-md bg-white/5 py-1.5 pr-2 pl-3 text-left text-white outline-1 -outline-offset-1 outline-white/10 focus-visible:outline-2 focus-visible:-outline-offset-2 focus-visible:outline-indigo-500 sm:text-sm/6 h-14 hover:cursor-pointer">
                                                        <el-selectedcontent
                                                            class="col-start-1 row-start-1 flex items-center gap-3 pr-6">
                                                            {{-- <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" class="size-5 shrink-0 rounded-full bg-gray-700 outline -outline-offset-1 outline-white/10" /> --}}
                                                            <span
                                                                class="block truncate text-gray-900 dark:text-gray-50">{{ old('cargo_id') ? $cargos->firstWhere('id', old('cargo_id'))->name : 'Selecione um cargo' }}</span>

                                                        </el-selectedcontent>
                                                        <svg viewBox="0 0 16 16" fill="currentColor" data-slot="icon"
                                                            aria-hidden="true"
                                                            class="col-start-1 row-start-1 size-5 self-center justify-self-end text-gray-400 sm:size-4">
                                                            <path
                                                                d="M5.22 10.22a.75.75 0 0 1 1.06 0L8 11.94l1.72-1.72a.75.75 0 1 1 1.06 1.06l-2.25 2.25a.75.75 0 0 1-1.06 0l-2.25-2.25a.75.75 0 0 1 0-1.06ZM10.78 5.78a.75.75 0 0 1-1.06 0L8 4.06 6.28 5.78a.75.75 0 0 1-1.06-1.06l2.25-2.25a.75.75 0 0 1 1.06 0l2.25 2.25a.75.75 0 0 1 0 1.06Z"
                                                                clip-rule="evenodd" fill-rule="evenodd" />
                                                        </svg>
                                                    </button>

                                                    <el-options anchor="bottom start" popover
                                                        class="max-h-56 w-(--button-width) overflow-auto rounded-md border border-[#324467] bg-gray-50 dark:bg-gray-900 py-1 text-base outline-1 -outline-offset-1 outline-white/10 [--anchor-gap:--spacing(1)] data-leave:transition data-leave:transition-discrete data-leave:duration-100 data-leave:ease-in data-closed:data-leave:opacity-0 sm:text-sm">
                                                        @foreach ($cargos as $cargo)
                                                            <el-option value="{{ $cargo->id }}"
                                                                class="group/option relative block cursor-default py-2 pr-9 pl-3 text-white select-none focus:bg-indigo-500 hover:cursor-pointer">

                                                                <div class="flex items-center">
                                                                    <span
                                                                        class="ml-3 block truncate text-gray-900 dark:text-gray-50">{{ $cargo->name }}</span>
                                                                </div>
                                                            </el-option>
                                                        @endforeach


                                                    </el-options>

                                                </el-select>
                                                @error('cargo_id')
                                                    <p class="mt-0 text-sm right-0 text-danger"><span
                                                            class="font-medium"></span>
                                                        {{ $message }}</p>
                                                @enderror
                                            </label>
                                        </div>


                                        {{-- <p class="mt-2.5 text-sm text-success"><span class="font-medium">Oh, snapp!</span> Some error message.</p> --}}
                                        <label class="flex flex-col w-full">
                                            <p
                                                class="text-gray-900 dark:text-gray-50 text-base font-medium leading-normal pb-2">
                                                Senha</p>
                                            <div class="relative w-full">
                                                <input :type="showPassword ? 'text' : 'password'"
                                                    class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-gray-900 dark:text-gray-50 focus:outline-0 focus:ring-0 border border-[#324467] bg-gray-50 dark:bg-gray-900 focus:border-primary h-14 placeholder:text-[#92a4c9] p-[15px] pr-12 text-base font-normal leading-normal"
                                                    placeholder="Digite sua senha" type="password" name="password"
                                                    value="" />

                                                <button type="button" @click="showPassword = !showPassword"
                                                    class="absolute inset-y-0 right-0 flex items-center pr-4 text-[#92a4c9] hover:text-primary hover:cursor-pointer transition-colors">

                                                    <!-- Ícone: ocultar senha -->
                                                    <template x-if="!showPassword">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5"
                                                            stroke="currentColor" class="size-6">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                                                        </svg>
                                                    </template>

                                                    <!-- Ícone: mostrar senha -->
                                                    <template x-if="showPassword">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5"
                                                            stroke="currentColor" class="size-6">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                        </svg>
                                                    </template>

                                                </button>
                                            </div>
                                            @error('password')
                                                <p class="mt-0 text-sm right-0 text-danger"><span
                                                        class="font-medium"></span>
                                                    {{ $message }}</p>
                                            @enderror
                                        </label>


                                        <label class="flex flex-col w-full">
                                            <p
                                                class="text-gray-900 dark:text-gray-50 text-base font-medium leading-normal pb-2">
                                                Confirmar Senha</p>
                                            <div class="relative w-full">
                                                <input :type="showPassword ? 'text' : 'password'"
                                                    class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-gray-900 dark:text-gray-50 focus:outline-0 focus:ring-0 border border-[#324467] bg-gray-50 dark:bg-gray-900 focus:border-primary h-14 placeholder:text-[#92a4c9] p-[15px] pr-12 text-base font-normal leading-normal"
                                                    placeholder="Digite sua senha" type="password"
                                                    name="password_confirmation" />

                                                <button type="button" @click="showPassword = !showPassword"
                                                    class="absolute inset-y-0 right-0 flex items-center pr-4 text-[#92a4c9] hover:text-primary hover:cursor-pointer transition-colors">

                                                    <!-- Ícone: ocultar senha -->
                                                    <template x-if="!showPassword">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5"
                                                            stroke="currentColor" class="size-6">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                                                        </svg>
                                                    </template>

                                                    <!-- Ícone: mostrar senha -->
                                                    <template x-if="showPassword">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5"
                                                            stroke="currentColor" class="size-6">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                        </svg>
                                                    </template>

                                                </button>
                                            </div>
                                            @error('password_confirmation')
                                                <p class="mt-0 text-sm right-0 text-danger"><span
                                                        class="font-medium"></span>
                                                    {{ $message }}</p>
                                            @enderror
                                        </label>



                                    </div>

                                    <button
                                        class="flex items-center justify-center whitespace-nowrap h-14 px-8 rounded-lg text-base font-medium text-white bg-primary hover:bg-primary/90 focus:outline-none focus:ring-2 focus:ring-primary/50 transition-colors w-full hover:cursor-pointer"
                                        type="submit">
                                        Registrar</button>
                                </form>
                                @if (session('invalid_login'))
                                    <p class="m-0 text-sm text-center right-0 text-danger"><span
                                            class="font-medium"></span> {{ session('invalid_login') }}</p>
                                @endif


                                <div class="text-center">
                                    <p class="text-[#92a4c9] text-sm">Já tem uma conta? <a
                                            class="text-primary font-medium hover:underline"
                                            href="{{ route('login') }}">Entrar!</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.guest>
