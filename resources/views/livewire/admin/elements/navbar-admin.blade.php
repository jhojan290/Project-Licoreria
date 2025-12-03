<!-- TopNavBar -->
<header class="flex items-center justify-between whitespace-nowrap border-b border-solid border-black/10 dark:border-white/10 px-4 md:px-10 py-3">
    <div class="flex items-center gap-4 text-gray-800 dark:text-white">
        <img 
            src="{{ asset('img/licUp.png') }}" 
            alt="Logo LicUp" 
            class="h-12 w-auto object-contain"
        >
        <div class="h-12 w-[2px] bg-licup rounded-full opacity-80"></div>

        <h2 class="text-2xl font-bold tracking-tight font-licup text-licup">LicUp-Admin</h2>
    </div>
    <div class="flex flex-1 justify-end gap-4 md:gap-8">
        <div class="hidden md:flex items-center gap-9">
            <a class="text-gray-800 dark:text-white text-sm font-medium leading-normal hover:text-primary dark:hover:text-primary transition-colors" href="#">
            Dashboard
            </a>
        </div>
        @auth
            <div x-data="{ open: false }" class="relative">
                
                <button @click="open = !open" 
                    class="flex h-10 w-full items-center gap-2 px-3 rounded-lg bg-primary text-background-dark hover:bg-white/10 hover:text-primary transition-colors cursor-pointer border border-transparent focus:outline-none">
                    
                    <span class="text-sm font-bold capitalize">
                        Bienvenid@, {{ explode(' ', auth()->user()->name)[0] }}
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

                    {{-- ↓↓↓↓↓ LÓGICA DEL BOTÓN CAMBIANTE PARA ADMIN ↓↓↓↓↓ --}}
                    @if(auth()->user()->isAdmin())
                        
                        {{-- CASO 1: Si estoy en rutas de Admin -> Botón para ir a la Tienda --}}
                        @if(request()->routeIs('admin.*'))
                            <a href="{{ route('user.home') }}" 
                            class="flex items-center gap-3 px-4 py-2 text-sm text-yellow-400 hover:bg-white/5 hover:text-yellow-300 transition-colors font-bold">
                                <span class="material-symbols-outlined text-lg">storefront</span>
                                Ir a la Tienda
                            </a>
                        
                        {{-- CASO 2: Si estoy en la Tienda -> Botón para ir a Inventario --}}
                        @else
                            <a href="{{ route('admin.products') }}" 
                            class="flex items-center gap-3 px-4 py-2 text-sm text-yellow-400 hover:bg-white/5 hover:text-yellow-300 transition-colors font-bold">
                                <span class="material-symbols-outlined text-lg">inventory_2</span>
                                Ir a Inventario
                            </a>
                        @endif

                        {{-- NUEVO: Enlace a Órdenes --}}
                        <a href="{{ route('admin.orders') }}" 
                            class="flex items-center gap-3 px-4 py-2 text-sm text-gray-300 hover:bg-white/5 hover:text-primary transition-colors">
                            <span class="material-symbols-outlined text-lg">receipt_long</span>
                            Órdenes
                        </a>

                        {{-- Separador visual --}}
                        <div class="border-t border-white/10 my-1"></div>
                    @endif
                    {{-- ↑↑↑↑↑ FIN DE LA LÓGICA DE ADMIN ↑↑↑↑↑ --}}

                    <a href="{{ route('logout') }}" 
                        class="flex items-center gap-3 px-4 py-2 text-sm text-gray-300 hover:bg-white/5 hover:text-primary transition-colors">
                        <span class="material-symbols-outlined text-lg">logout</span>
                        Cerrar Sesión
                    </a>
                </div>
            </div>
        @endauth
    </div>
</header>