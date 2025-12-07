<header 
    x-data="{ mobileMenuOpen: false }" 
    class="sticky top-0 z-50 w-full bg-[#121212]/95 backdrop-blur-md border-b border-white/10 transition-all duration-300"
>
    <div class="container mx-auto px-4">

        <div class="flex items-center justify-between py-4">

            <div class="flex items-center gap-8">
                <a href="/inicio" class="flex items-center gap-4 text-white hover:opacity-90 transition-opacity group">
                    <img 
                        src="{{ asset('img/LicUp.png') }}" 
                        alt="Logo LicUp" 
                        class="h-12 w-auto object-contain group-hover:scale-105 transition-transform duration-300"
                    >
                    <div class="h-12 w-[2px] bg-licup rounded-full opacity-80 hidden sm:block"></div>

                    <h2 class="hidden sm:block text-2xl font-bold tracking-tight font-licup text-licup">LicUp</h2>
                </a>

                <nav class="hidden md:flex items-center gap-6 lg:gap-8">
                    <a href="/inicio" class="text-sm font-bold uppercase tracking-wider text-zinc-400 hover:text-[#D4AF37] transition-colors {{ request()->is('inicio') ? 'text-white' : '' }}">
                        Inicio
                    </a>
                    <a href="{{ route('catalog') }}" class="text-sm font-bold uppercase tracking-wider text-zinc-400 hover:text-[#D4AF37] transition-colors {{ request()->routeIs('catalog') ? 'text-white' : '' }}">
                        Catálogo
                    </a>
                    <a href="/contact" class="text-sm font-bold uppercase tracking-wider text-zinc-400 hover:text-[#D4AF37] transition-colors">
                        Contacto
                    </a>
                    <a href="/about" class="text-sm font-bold uppercase tracking-wider text-zinc-400 hover:text-[#D4AF37] transition-colors">
                        Sobre Nosotros
                    </a>
                </nav>
            </div>

            <div class="flex flex-1 items-center justify-end gap-3 md:gap-4">

                <div class="flex items-center gap-2">

                    {{-- LÓGICA DE USUARIO LOGUEADO (INTACTA) --}}
                    @auth
                        <div x-data="{ open: false }" class="relative">
                            <button @click="open = !open" @click.outside="open = false"
                                class="flex h-10 w-full items-center gap-2 px-3 rounded-lg bg-primary text-background-dark hover:bg-white/10 hover:text-primary transition-colors cursor-pointer border border-transparent focus:outline-none">
                                <span class="text-sm font-bold capitalize hidden sm:block">
                                    Bienvenid@, {{ explode(' ', auth()->user()->name)[0] }}
                                </span>
                                <span class="sm:hidden material-symbols-outlined text-xl">person</span>
                                
                                <span class="material-symbols-outlined text-xl transition-transform duration-200" :class="{'rotate-180': open}">
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
                                class="absolute top-full right-0 mt-2 w-56 rounded-lg bg-[#121212] border border-white/10 shadow-xl py-2 z-50"
                                style="display: none;">
                                
                                <div class="px-4 py-2 border-b border-white/10 mb-2">
                                    <p class="text-xs text-gray-500">Cuenta</p>
                                    <p class="text-sm font-bold text-white truncate">{{ auth()->user()->email }}</p>
                                </div>

                                @if(auth()->user()->isAdmin())
                                    @if(request()->routeIs('admin.*'))
                                        <a href="{{ route('user.home') }}" class="flex items-center gap-3 px-4 py-2 text-sm text-yellow-400 hover:bg-white/5 hover:text-yellow-300 transition-colors font-bold">
                                            <span class="material-symbols-outlined text-lg">storefront</span> Ir a la Tienda
                                        </a>
                                    @else
                                        <a href="{{ route('admin.products') }}" class="flex items-center gap-3 px-4 py-2 text-sm text-yellow-400 hover:bg-white/5 hover:text-yellow-300 transition-colors font-bold">
                                            <span class="material-symbols-outlined text-lg">inventory_2</span> Ir a Inventario
                                        </a>
                                    @endif
                                    <div class="border-t border-white/10 my-1"></div>
                                @endif

                                <a href="{{ route('logout') }}" class="flex items-center gap-3 px-4 py-2 text-sm text-gray-300 hover:bg-white/5 hover:text-primary transition-colors">
                                    <span class="material-symbols-outlined text-lg">logout</span> Cerrar Sesión
                                </a>
                            </div>
                        </div>
                    @endauth

                    {{-- INVITADO (Icono Login) --}}
                    @guest
                        <button wire:click="$dispatch('openSidebar', { title: 'Iniciar Sesión', partial: 'login' })" 
                            class="flex h-10 w-10 items-center justify-center rounded-lg text-zinc-300 hover:bg-white/10 hover:text-[#D4AF37] transition-colors cursor-pointer"
                            title="Iniciar Sesión">
                            <span class="material-symbols-outlined text-2xl">person</span>
                        </button>
                    @endguest

                    {{-- CARRITO (Siempre Visible) --}}
                    <button wire:click="$dispatch('openSidebar', { title: 'Tu carrito', partial: 'cart' })" 
                        class="relative flex h-10 w-10 items-center justify-center rounded-lg text-zinc-300 hover:bg-white/10 hover:text-[#D4AF37] transition-colors cursor-pointer"
                        title="Ver Carrito">
                        <span class="material-symbols-outlined text-2xl">shopping_cart</span>
                    </button>

                    {{-- INVITADO (Botón Crear Cuenta - Solo Desktop) --}}
                    @guest
                        <button wire:click="$dispatch('openSidebar', { title: 'Crear Cuenta', partial: 'createUser' })" 
                            class="hidden lg:flex h-10 items-center justify-center rounded-lg px-4 bg-[#D4AF37] text-[#121212] text-sm font-bold hover:bg-white transition-all shadow-lg shadow-[#D4AF37]/10 ml-2">
                            Crear Cuenta
                        </button>
                    @endguest

                    <button 
                        @click="mobileMenuOpen = !mobileMenuOpen" 
                        class="md:hidden flex items-center justify-center h-10 w-10 text-gray-300 hover:text-[#D4AF37] focus:outline-none ml-2"
                    >
                        <span class="material-symbols-outlined text-3xl" x-text="mobileMenuOpen ? 'close' : 'menu'"></span>
                    </button>

                </div>
            </div>
        </div>
    </div>

    <div 
        x-show="mobileMenuOpen" 
        x-collapse 
        @click.outside="mobileMenuOpen = false"
        class="md:hidden bg-[#121212] border-t border-white/10 shadow-2xl overflow-hidden"
        style="display: none;"
    >
        <div class="flex flex-col p-4 space-y-2">
            <a href="/inicio" class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-300 hover:text-white hover:bg-white/5 transition-colors font-medium">
                <span class="material-symbols-outlined text-[#D4AF37]">home</span> Inicio
            </a>
            <a href="{{ route('catalog') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-300 hover:text-white hover:bg-white/5 transition-colors font-medium">
                <span class="material-symbols-outlined text-[#D4AF37]">storefront</span> Catálogo
            </a>
            <a href="/contact" class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-300 hover:text-white hover:bg-white/5 transition-colors font-medium">
                <span class="material-symbols-outlined text-[#D4AF37]">mail</span> Contacto
            </a>
            <a href="/about" class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-300 hover:text-white hover:bg-white/5 transition-colors font-medium">
                <span class="material-symbols-outlined text-[#D4AF37]">info</span> Sobre Nosotros
            </a>
            
            @guest
                <div class="border-t border-white/10 my-2 pt-4 px-2">
                    <button wire:click="$dispatch('openSidebar', { title: 'Crear Cuenta', partial: 'createUser' }); mobileMenuOpen = false" 
                        class="w-full py-3 rounded-xl bg-[#D4AF37] text-[#121212] font-bold hover:bg-white transition-colors text-center shadow-lg">
                        Crear Cuenta
                    </button>
                </div>
            @endguest
        </div>
    </div>
</header>