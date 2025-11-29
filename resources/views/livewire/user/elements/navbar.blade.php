<header class="sticky top-0 z-50 w-full backdrop-blur-sm border-b border-white/10">
    <div class="container mx-auto px-4">

        <div class="flex items-center justify-between py-4">

            <div class="flex items-center gap-8">
                <a href="/inicio" class="flex items-center gap-3 text-white hover:opacity-90 transition-opacity">
                    <img 
                        src="{{ asset('img/licUp.png') }}" 
                        alt="Logo LicUp" 
                        class="h-9 w-auto object-contain"
                    >
                    <h2 class="text-xl font-bold tracking-tight">LicUp-Licoreria</h2>
                </a>

                <nav class="hidden md:flex items-center gap-8">
                    <a href="/inicio" class="text-sm font-medium text-zinc-300 hover:text-primary transition-colors">Inicio</a>
                    <a href="/productos/catalogo" class="text-sm font-medium text-zinc-300 hover:text-primary transition-colors">Catálogo</a>
                    <a href="/contact" class="text-sm font-medium text-zinc-300 hover:text-primary transition-colors">Contacto</a>
                </nav>
            </div>

            <div class="flex flex-1 items-center justify-end gap-4">

                <div class="hidden sm:block w-full max-w-[180px]">
                    <label class="relative">
                        <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-zinc-500">
                            search
                        </span>
                        <input
                            type="text"
                            name="buscar"
                            placeholder="Buscar licores..."
                            class="form-input w-full h-10 rounded-lg bg-white/5 border-white/10 pl-10 text-sm text-white placeholder:text-zinc-500 focus:border-primary focus:ring-primary/50"
                        />
                    </label>
                </div>

                <div class="flex items-center gap-2">

                    {{-- ========================================== --}}
                    {{-- A. USUARIO LOGUEADO: Nombre + Dropdown     --}}
                    {{-- ========================================== --}}
                    @auth
                        <div x-data="{ open: false }" class="relative">
                            
                            <button @click="open = !open" 
                                class="flex h-10 w-full items-center gap-2 px-3 rounded-lg bg-primary text-background-dark hover:bg-white/10 hover:text-primary transition-colors cursor-pointer border border-transparent focus:outline-none">
                                
                                <span class="text-sm font-bold capitalize">
                                    Bienvenido, {{ explode(' ', auth()->user()->name)[0] }}
                                </span>
                                
                                <span class="material-symbols-outlined text-xl transition-transform duration-200" 
                                    :class="{'rotate-180': open}">
                                    expand_more
                                </span>
                            </button>

                            <div x-show="open" 
                                x-transition:enter="transition ease-out duration-100"
                                x-transition:enter-start="opacity-0 scale-95"
                                x-transition:enter-end="opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-75"
                                x-transition:leave-start="opacity-100 scale-100"
                                x-transition:leave-end="opacity-0 scale-95"
                                @click.away="open = false"
                                x-cloak
                                class="absolute top-full right-0 mt-2 w-full rounded-lg bg-[#121212] border border-white/10 shadow-xl py-2 z-50">
                                
                                <div class="px-4 py-2 border-b border-white/10 mb-2">
                                    <p class="text-xs text-gray-500">Cuenta</p>
                                    <p class="text-sm font-bold text-white truncate">{{ auth()->user()->email }}</p>
                                </div>

                                <a href="{{ route('logout') }}" 
                                    class="flex items-center gap-3 px-4 py-2 text-sm text-gray-300 hover:bg-white/5 hover:text-primary transition-colors">
                                    <span class="material-symbols-outlined text-lg">logout</span>
                                    Cerrar Sesión
                                </a>
                            </div>
                        </div>
                    @endauth

                    {{-- ========================================== --}}
                    {{-- B. INVITADO: Icono Login                   --}}
                    {{-- ========================================== --}}
                    @guest
                        <button wire:click="$dispatch('openSidebar', { title: 'Iniciar Sesión', partial: 'login' })" 
                            class="flex h-10 w-10 items-center justify-center rounded-lg text-zinc-300 hover:bg-white/10 hover:text-primary transition-colors cursor-pointer"
                            title="Iniciar Sesión">
                            <span class="material-symbols-outlined text-2xl">person</span>
                        </button>
                    @endguest

                    {{-- ========================================== --}}
                    {{-- C. SIEMPRE VISIBLE: Carrito                --}}
                    {{-- ========================================== --}}
                    <button wire:click="$dispatch('openSidebar', { title: 'Tu carrito', partial: 'cart' })" 
                        class="relative flex h-10 w-10 items-center justify-center rounded-lg text-zinc-300 hover:bg-white/10 hover:text-primary transition-colors cursor-pointer"
                        title="Ver Carrito">
                        <span class="material-symbols-outlined text-2xl">shopping_cart</span>
                    </button>

                    {{-- ========================================== --}}
                    {{-- D. INVITADO: Botón Crear Cuenta            --}}
                    {{-- ========================================== --}}
                    @guest
                        <button wire:click="$dispatch('openSidebar', { title: 'Crear Cuenta', partial: 'createUser' })" 
                            class="hidden lg:flex h-10 min-w-[84px] max-w-[480px] items-center justify-center rounded-lg px-4 bg-primary text-background-dark text-sm font-bold tracking-wide leading-normal overflow-hidden truncate hover:bg-yellow-400 transition-colors focus:outline-none focus:ring-4 focus:ring-primary/30 cursor-pointer">
                            Crear Cuenta
                        </button>
                    @endguest

                </div>
            </div>

        </div>
    </div>
</header>