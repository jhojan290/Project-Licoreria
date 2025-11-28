<div class="w-full h-full flex flex-col justify-between p-4">

    <div class="flex flex-col items-center text-center gap-6 pt-12">
        <div class="flex justify-center items-center gap-3">
            <div class="size-8 text-primary">
                <svg fill="none" viewBox="0 0 48 48">
                    <path d="M42.4379 44C42.4379 44 36.0744 33.9038 41.1692 24C46.8624 12.9336 42.2078 4 42.2078 4L7.01134 4C7.01134 4 11.6577 12.932 5.96912 23.9969C0.876273 33.9029 7.27094 44 7.27094 44L42.4379 44Z" fill="currentColor"/>
                </svg>
            </div>
            <h2 class="text-2xl font-bold">Liquor Store</h2>
        </div>

        <h1 class="text-3xl sm:text-4xl font-black leading-tight">
            Bienvenido
        </h1>

        <p class="text-text-secondary-light dark:text-text-secondary-dark text-base pb-6">
            Inicia sesión para realizar una compra.
        </p>
    </div>

    <form wire:submit="login" class="flex flex-col gap-6 px-2">
        
        <div class="flex flex-col gap-4">
            
            <label class="flex flex-col">
                <p class="text-sm font-medium pb-2 text-text-secondary-light dark:text-text-secondary-dark">
                    Correo Electrónico
                </p>
                <input
                    wire:model="email"
                    type="email"
                    placeholder="tu@ejemplo.com"
                    class="form-input flex w-full rounded-lg border border-border-light dark:border-border-dark
                        bg-surface-light dark:bg-surface-dark h-12 px-4 text-base focus:outline-0
                        placeholder:text-text-secondary-light dark:placeholder:text-text-secondary-dark
                        focus:ring-2 focus:ring-primary/50"
                />
                @error('email') 
                    <span class="text-red-500 text-xs mt-1 font-medium">{{ $message }}</span> 
                @enderror
            </label>

            <label class="flex flex-col" x-data="{ show: false }">
                <p class="text-sm font-medium pb-2 text-text-secondary-light dark:text-text-secondary-dark">
                    Contraseña
                </p>
                <div class="relative flex w-full items-center">
                    <input
                        wire:model="password"
                        :type="show ? 'text' : 'password'"
                        placeholder="Introduce tu contraseña"
                        class="form-input flex w-full rounded-lg border border-border-light dark:border-border-dark 
                            bg-surface-light dark:bg-surface-dark h-12 pl-4 pr-10 text-base focus:outline-0
                            placeholder:text-text-secondary-light dark:placeholder:text-text-secondary-dark
                            focus:ring-2 focus:ring-primary/50"
                    />
                    
                    <div 
                        @click="show = !show" 
                        class="absolute right-3 text-text-secondary-light dark:text-text-secondary-dark cursor-pointer select-none hover:text-primary transition-colors"
                    >
                        <span class="material-symbols-outlined text-lg" x-text="show ? 'visibility_off' : 'visibility'"></span>
                    </div>
                </div>
                @error('password') 
                    <span class="text-red-500 text-xs mt-1 font-medium">{{ $message }}</span> 
                @enderror
            </label>
        </div>

        <button
            type="button"
            x-data
            wire:click="$dispatch('open-reset-modal')" class="text-sm text-right font-medium text-text-secondary-light dark:text-text-secondary-dark hover:text-primary transition-colors -mt-2 bg-transparent border-none cursor-pointer"
            >
            ¿Olvidaste tu contraseña?
        </button>

        <button
            type="submit"
            wire:loading.attr="disabled"
            class="flex h-14 w-full items-center justify-center rounded-lg bg-primary text-background-dark text-lg font-bold 
            hover:opacity-90 transition-opacity shadow-lg shadow-primary/20 disabled:opacity-50 disabled:cursor-not-allowed">
    
            <span wire:loading.remove>
                Iniciar Sesión
            </span>

            <span wire:loading.flex class="items-center gap-2">
                
                <svg class="animate-spin h-5 w-5 text-background-dark" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                
                <span>Cargando...</span>
            </span>
        </button>
    </form>

    <div class="text-center text-sm font-medium pt-8">
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