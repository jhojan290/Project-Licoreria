<div class="w-full min-h-screen flex items-center justify-center p-4 -translate-y-16">

    <!-- CONTENEDOR CENTRAL -->
    <div class="w-full max-w-md">

        <!-- HEADER -->
        <div class="flex flex-col items-center text-center gap-6">

            <h2 class="text-4xl font-bold tracking-tight font-licup text-licup">
                LicUp
            </h2>

            <h2 class="text-3xl font-extrabold tracking-tight">
                Crea tu Cuenta
            </h2>

        </div>

        <!-- FORM -->
        <form wire:submit="register" class="flex flex-col gap-5 mt-8">

            <!-- NOMBRE -->
            <label class="flex flex-col gap-1">
                <span class="text-sm font-medium text-text-secondary-light dark:text-text-secondary-dark">
                    Nombre
                </span>
                <input 
                    wire:model="name"
                    type="text"
                    placeholder="Escribe tu nombre completo"
                    class="h-10 px-3 rounded-lg border border-border-light dark:border-border-dark 
                        bg-surface-light dark:bg-surface-dark text-sm focus:ring-2 focus:ring-primary/40 focus:outline-none"
                >
                @error('name') 
                    <span class="text-red-500 text-xs font-medium">{{ $message }}</span> 
                @enderror
            </label>

            <!-- EMAIL -->
            <label class="flex flex-col gap-1">
                <span class="text-sm font-medium text-text-secondary-light dark:text-text-secondary-dark">
                    Correo Electrónico
                </span>
                <input 
                    wire:model="email"
                    type="email"
                    placeholder="tu@ejemplo.com"
                    class="h-10 px-3 rounded-lg border border-border-light dark:border-border-dark 
                        bg-surface-light dark:bg-surface-dark text-sm focus:ring-2 focus:ring-primary/40 focus:outline-none"
                >
                @error('email') 
                    <span class="text-red-500 text-xs font-medium">{{ $message }}</span> 
                @enderror
            </label>

            <!-- PASSWORD -->
            <label class="flex flex-col gap-1" x-data="{ show: false }">
                <span class="text-sm font-medium text-text-secondary-light dark:text-text-secondary-dark">
                    Contraseña
                </span>

                <div class="relative">
                    <input 
                        wire:model="password"
                        :type="show ? 'text' : 'password'"
                        placeholder="Introduce tu contraseña"
                        class="w-full h-10 pl-3 pr-9 rounded-lg border border-border-light dark:border-border-dark 
                            bg-surface-light dark:bg-surface-dark text-sm focus:ring-2 focus:ring-primary/40 focus:outline-none"
                    >
                    <button 
                        @click="show = !show" 
                        type="button" 
                        class="absolute right-2 top-1/2 -translate-y-1/2
                            text-text-secondary-light hover:text-primary transition-colors"
                    >
                        <span class="material-symbols-outlined text-lg" x-text="show ? 'visibility_off' : 'visibility'"></span>
                    </button>
                </div>

                @error('password') 
                    <span class="text-red-500 text-xs font-medium">{{ $message }}</span> 
                @enderror
            </label>

            <!-- CONFIRM PASSWORD -->
            <label class="flex flex-col gap-1" x-data="{ show: false }">
                <span class="text-sm font-medium text-text-secondary-light dark:text-text-secondary-dark">
                    Confirmar Contraseña
                </span>

                <div class="relative">
                    <input 
                        wire:model="password_confirmation"
                        :type="show ? 'text' : 'password'"
                        placeholder="Repite tu contraseña"
                        class="w-full h-10 pl-3 pr-9 rounded-lg border border-border-light dark:border-border-dark 
                            bg-surface-light dark:bg-surface-dark text-sm focus:ring-2 focus:ring-primary/40 focus:outline-none"
                    >
                    <button 
                        @click="show = !show" 
                        type="button" 
                        class="absolute right-2 top-1/2 -translate-y-1/2
                            text-text-secondary-light hover:text-primary transition-colors"
                    >
                        <span class="material-symbols-outlined text-lg" x-text="show ? 'visibility_off' : 'visibility'"></span>
                    </button>
                </div>
            </label>

            <!-- SUBMIT -->
            <button
                type="submit"
                wire:loading.attr="disabled"
                class="h-11 w-full flex items-center justify-center rounded-lg bg-primary text-background-dark text-base font-bold 
                    hover:opacity-90 transition shadow-lg shadow-primary/20 mt-2 
                    disabled:opacity-50 disabled:cursor-not-allowed">

                <span wire:loading.remove>
                    Crear Cuenta
                </span>

                <span wire:loading.flex class="items-center gap-2">
                    <svg class="animate-spin h-4 w-4 text-background-dark" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0
                        C5.373 0 0 5.373 0 12h4zm2 5.291
                        A7.962 7.962 0 014 12H0
                        c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    Cargando...
                </span>
            </button>

        </form>

        <!-- FOOT -->
        <div class="text-center text-sm font-medium mt-8">
            <span class="text-text-secondary-light dark:text-text-secondary-dark">
                ¿Ya tienes una cuenta?
            </span>
            <button 
                type="button"
                wire:click="$dispatch('openSidebar', { title: 'Iniciar Sesión', partial: 'login' })"
                class="text-primary hover:underline font-bold bg-transparent border-none cursor-pointer">
                Inicia Sesión
            </button>
        </div>

    </div>
</div>
