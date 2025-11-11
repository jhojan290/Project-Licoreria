
<header class="w-full bg-background-light dark:bg-background-dark/80 backdrop-blur-sm sticky top-0 z-50">
    <div class="container mx-auto px-4">
        <div class="flex items-center justify-between whitespace-nowrap border-b border-zinc-200 dark:border-white/10 py-4">
            
            <!-- Logo y Navegación Principal -->
            <div class="flex items-center gap-8">
                <!-- Logo -->
                <div class="flex items-center gap-2.5 text-zinc-900 dark:text-white">
                    <div class="text-primary size-7">
                        <svg fill="none" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_6_535)">
                                <path clip-rule="evenodd" 
                                    d="M47.2426 24L24 47.2426L0.757355 24L24 0.757355L47.2426 24ZM12.2426 21H35.7574L24 9.24264L12.2426 21Z" 
                                    fill="currentColor" 
                                    fill-rule="evenodd"/>
                            </g>
                            <defs>
                                <clipPath id="clip0_6_535">
                                    <rect fill="white" height="48" width="48"/>
                                </clipPath>
                            </defs>
                        </svg>
                    </div>
                    <h2 class="text-xl font-bold tracking-tight">The Spirit Cellar</h2>
                </div>

                <!-- Navegación Desktop -->
                <nav class="hidden md:flex items-center gap-8">
                    <a class="text-sm font-medium text-zinc-600 dark:text-zinc-300 hover:text-primary dark:hover:text-primary transition-colors" 
                    href="/inicio">
                        Inicio
                    </a>
                    <a class="text-sm font-medium text-zinc-600 dark:text-zinc-300 hover:text-primary dark:hover:text-primary transition-colors" 
                    href="/productos/catalogo">
                        Catálogo
                    </a>
                    <a class="text-sm font-medium text-zinc-600 dark:text-zinc-300 hover:text-primary dark:hover:text-primary transition-colors" 
                    href="#">
                        Contacto
                    </a>
                </nav>
            </div>

            <!-- Buscador y Acciones de Usuario -->
            <div class="flex flex-1 items-center justify-end gap-4">
                <!-- Buscador -->
                <div class="hidden sm:block w-full max-w-xs">
                    <label class="relative">
                        <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-zinc-400 dark:text-zinc-500">
                            search
                        </span>
                        <input class="form-input w-full rounded-lg border-zinc-200 dark:border-white/10 bg-zinc-100 dark:bg-white/5 h-10 placeholder:text-zinc-400 dark:placeholder:text-zinc-500 pl-10 text-sm text-zinc-900 dark:text-white focus:border-primary focus:ring-primary/50" 
                            placeholder="Buscar vinos, whiskies..." 
                            type="text"/>
                    </label>
                </div>

                <!-- Iconos de Usuario y Carrito -->
                <div class="flex items-center gap-2">
                    <!-- Botón Usuario -->
                    <button class="flex h-10 w-10 cursor-pointer items-center justify-center overflow-hidden rounded-lg text-zinc-600 dark:text-zinc-300 hover:bg-zinc-100 dark:hover:bg-white/10 hover:text-primary dark:hover:text-primary transition-colors">
                        <span class="material-symbols-outlined text-2xl">person</span>
                    </button>

                    <!-- Botón Carrito con Notificación -->
                    <button class="relative flex h-10 w-10 cursor-pointer items-center justify-center overflow-hidden rounded-lg text-zinc-600 dark:text-zinc-300 hover:bg-zinc-100 dark:hover:bg-white/10 hover:text-primary dark:hover:text-primary transition-colors">
                        <span class="material-symbols-outlined text-2xl">shopping_bag</span>
                        <span class="absolute top-1 right-1 flex h-4 w-4 items-center justify-center rounded-full bg-primary text-[10px] font-bold text-background-dark">
                            3
                        </span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</header>
