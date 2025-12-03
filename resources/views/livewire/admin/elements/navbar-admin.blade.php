<header 
    x-data="{ mobileMenuOpen: false, adminUserOpen: false }" 
    class="sticky top-0 z-50 w-full bg-[#121212] border-b border-white/10 shadow-md font-display"
>
    <div class="container mx-auto px-4 md:px-8">
        <div class="flex items-center justify-between h-20">

            <div class="flex items-center gap-3 group">
                <img src="{{ asset('img/licUp.png') }}" alt="Logo LicUp" class="h-10 w-auto object-contain group-hover:scale-105 transition-transform">
                <div class="h-8 w-[2px] bg-[#D4AF37] rounded-full opacity-80 hidden sm:block"></div>
                <h2 class="hidden sm:block text-2xl font-bold tracking-tight font-licup text-[#D4AF37]">LicUp Admin</h2>
            </div>

            <nav class="hidden lg:flex items-center gap-8 absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2">
                <a href="{{ route('admin.products') }}" class="text-sm font-bold uppercase tracking-widest text-gray-400 hover:text-[#D4AF37] transition-colors {{ request()->routeIs('admin.products') ? 'text-white border-b-2 border-[#D4AF37]' : '' }}">
                    Inventario
                </a>
                <a href="{{ route('admin.orders') }}" class="text-sm font-bold uppercase tracking-widest text-gray-400 hover:text-[#D4AF37] transition-colors {{ request()->routeIs('admin.orders') ? 'text-white border-b-2 border-[#D4AF37]' : '' }}">
                    Órdenes
                </a>
            </nav>

            <div class="flex items-center gap-4">

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

                <button 
                    @click="mobileMenuOpen = !mobileMenuOpen" 
                    class="lg:hidden p-2 text-gray-400 hover:text-[#D4AF37] focus:outline-none transition-colors ml-2"
                >
                    <span class="material-symbols-outlined text-3xl" x-text="mobileMenuOpen ? 'close' : 'menu'"></span>
                </button>

            </div>
        </div>
    </div>

    <div 
        x-show="mobileMenuOpen" 
        x-collapse 
        @click.outside="mobileMenuOpen = false"
        class="lg:hidden bg-[#181611] border-t border-white/10 absolute w-full left-0 top-20 z-30 shadow-2xl"
        style="display: none;"
    >
        <div class="flex flex-col p-6 space-y-2">
            <p class="text-xs font-bold text-gray-500 uppercase tracking-widest mb-2 px-4">Gestión</p>
            
            <a href="{{ route('admin.products') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-300 hover:text-white hover:bg-white/5 transition-colors font-medium {{ request()->routeIs('admin.products') ? 'bg-white/5 text-[#D4AF37]' : '' }}">
                <span class="material-symbols-outlined {{ request()->routeIs('admin.products') ? 'text-[#D4AF37]' : 'text-zinc-500' }}">inventory_2</span> Inventario
            </a>
            <a href="{{ route('admin.orders') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-300 hover:text-white hover:bg-white/5 transition-colors font-medium {{ request()->routeIs('admin.orders') ? 'bg-white/5 text-[#D4AF37]' : '' }}">
                <span class="material-symbols-outlined {{ request()->routeIs('admin.orders') ? 'text-[#D4AF37]' : 'text-zinc-500' }}">receipt_long</span> Órdenes
            </a>

            <div class="border-t border-white/10 my-2 pt-4">
                <a href="{{ route('user.home') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg text-[#D4AF37] font-bold hover:bg-white/5 transition-colors border border-[#D4AF37]/30 text-center justify-center">
                    <span class="material-symbols-outlined">storefront</span> Ir a la Tienda
                </a>
            </div>
        </div>
    </div>
</header>