<div class="w-full min-h-screen flex items-center justify-center p-4 -translate-y-20">

    <!-- CONTENEDOR CENTRAL -->
    <div class="w-full max-w-md">

        <!-- HEADER -->
        <div class="flex flex-col items-center text-center gap-6 pt-6">

            {{-- MENSAJE DE ÉXITO --}}
            @if ($status)
                <div x-data="{ show: true }" x-show="show"
                    x-transition:enter="transition ease-out duration-500"
                    x-transition:enter-start="opacity-0 transform -translate-y-2 scale-95"
                    x-transition:enter-end="opacity-100 transform translate-y-0 scale-100"
                    class="w-full bg-green-500/10 border border-green-500/20 text-green-400 px-4 py-3 rounded-lg text-sm font-bold mb-4 shadow-[0_0_15px_rgba(34,197,94,0.2)] flex items-center gap-3">
                    <span class="material-symbols-outlined text-lg">check_circle</span>
                    <span class="flex-1 text-left">{{ $status }}</span>
                    <button @click="show = false" class="text-green-600 hover:text-green-300">
                        <span class="material-symbols-outlined text-base">close</span>
                    </button>
                </div>
            @endif

            <h2 class="text-4xl font-bold tracking-tight font-licup text-licup">
                LicUp
            </h2>

            <h1 class="text-3xl sm:text-4xl font-black leading-tight">
                Bienvenido
            </h1>

            <p class="text-text-secondary-light dark:text-text-secondary-dark text-base">
                Inicia sesión para realizar una compra.
            </p>

        </div>

        <!-- FORM -->
        <form wire:submit="login" class="flex flex-col gap-6 mt-8">

            <div class="flex flex-col gap-4">

                <!-- EMAIL -->
                <label class="flex flex-col">
                    <span class="text-sm font-medium pb-1 text-text-secondary-light dark:text-text-secondary-dark">
                        Correo Electrónico
                    </span>

                    <input
                        wire:model="email"
                        type="email"
                        placeholder="tu@ejemplo.com"
                        class="form-input w-full rounded-lg border border-border-light dark:border-border-dark
                        bg-surface-light dark:bg-surface-dark h-12 px-4 text-base focus:outline-none
                        placeholder:text-text-secondary-light dark:placeholder:text-text-secondary-dark
                        focus:ring-2 focus:ring-primary/50"
                    />

                    @error('email')
                        <span class="text-red-500 text-xs mt-1 font-medium">{{ $message }}</span>
                    @enderror
                </label>

                <!-- PASSWORD -->
                <label class="flex flex-col" x-data="{ show: false }">

                    <span class="text-sm font-medium pb-1 text-text-secondary-light dark:text-text-secondary-dark">
                        Contraseña
                    </span>

                    <div class="relative">
                        <input
                            wire:model="password"
                            :type="show ? 'text' : 'password'"
                            placeholder="Introduce tu contraseña"
                            class="form-input w-full rounded-lg border border-border-light dark:border-border-dark
                            bg-surface-light dark:bg-surface-dark h-12 pl-4 pr-10 text-base focus:outline-none
                            placeholder:text-text-secondary-light dark:placeholder:text-text-secondary-dark
                            focus:ring-2 focus:ring-primary/50"
                        />

                        <span
                            @click="show = !show"
                            class="absolute right-3 top-1/2 -translate-y-1/2 cursor-pointer
                            text-text-secondary-light hover:text-primary transition">
                            <span class="material-symbols-outlined">
                                <span x-text="show ? 'visibility_off' : 'visibility'"></span>
                            </span>
                        </span>
                    </div>

                    @error('password')
                        <span class="text-red-500 text-xs mt-1 font-medium">{{ $message }}</span>
                    @enderror
                </label>

            </div>

            <!-- RESET -->
            <button
                type="button"
                wire:click="$dispatch('open-reset-modal')"
                class="text-sm text-right font-medium text-text-secondary-light hover:text-primary transition bg-transparent border-none">
                ¿Olvidaste tu contraseña?
            </button>

            <!-- SUBMIT -->
            <button
                type="submit"
                wire:loading.attr="disabled"
                wire:target="login"
                class="flex h-14 w-full items-center justify-center rounded-lg bg-primary text-background-dark
                    text-lg font-bold hover:opacity-90 transition
                    shadow-lg shadow-primary/20 disabled:opacity-50 disabled:cursor-not-allowed">

                <span wire:loading.remove wire:target="login">
                    Iniciar Sesión
                </span>

                <span wire:loading.flex wire:target="login" class="items-center gap-2">

                    <svg class="animate-spin h-5 w-5 text-background-dark" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10"
                                stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor"
                            d="M4 12a8 8 0 018-8V0
                                C5.373 0 0 5.373 0 12h4zm2 5.291
                                A7.962 7.962 0 014 12H0
                                c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                        </path>
                    </svg>

                    <span>Cargando...</span>
                </span>

            </button>

        </form>

        <!-- REGISTER -->
        <div class="text-center text-sm font-medium mt-8">

            <span class="text-text-secondary-light dark:text-text-secondary-dark">
                ¿No tienes una cuenta?
            </span>

            <button
                type="button"
                wire:click="$dispatch('openSidebar', { title: 'Crear Cuenta', partial: 'createUser' })"
                class="text-primary hover:underline font-bold bg-transparent border-none cursor-pointer">
                Crea una cuenta
            </button>

        </div>

    </div>
</div>
