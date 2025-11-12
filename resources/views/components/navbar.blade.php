<header class="sticky top-0 z-50 w-full backdrop-blur-sm border-b border-white/10">
    <div class="container mx-auto px-4">

        <div class="flex items-center justify-between py-4">

            <!-- Logo + Nav -->
            <div class="flex items-center gap-8">
                <a href="/inicio" class="flex items-center gap-2.5 text-white">
                    <span class="material-symbols-outlined text-primary text-3xl">sports_bar</span>
                    <h2 class="text-xl font-bold tracking-tight">Liquor Store</h2>
                </a>

                <nav class="hidden md:flex items-center gap-8">
                    <a href="/inicio" class="text-sm font-medium text-zinc-300 hover:text-primary transition-colors">Inicio</a>
                    <a href="/productos/catalogo" class="text-sm font-medium text-zinc-300 hover:text-primary transition-colors">Catálogo</a>
                    <a href="/contact" class="text-sm font-medium text-zinc-300 hover:text-primary transition-colors">Contacto</a>
                </nav>
            </div>

            <!-- Search + Actions -->
            <div class="flex flex-1 items-center justify-end gap-4">

                <!-- Search -->
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

                <!-- Profile + Cart + CTA -->
                <div class="flex items-center gap-2">

                    <button class="flex h-10 w-10 items-center justify-center rounded-lg text-zinc-300 hover:bg-white/10 hover:text-primary transition-colors cursor-pointer">
                        <span class="material-symbols-outlined text-2xl">person</span>
                    </button>

                    <button id="openSidebar" class="relative flex h-10 w-10 items-center justify-center rounded-lg text-zinc-300 hover:bg-white/10 hover:text-primary transition-colors cursor-pointer">
                        <span class="material-symbols-outlined text-2xl">shopping_cart</span>
                    </button>

                    <button class="hidden lg:flex h-10 min-w-[84px] max-w-[480px] items-center justify-center rounded-lg px-4 bg-primary text-background-dark text-sm font-bold tracking-wide leading-normal overflow-hidden truncate hover:bg-yellow-400 transition-colors focus:outline-none focus:ring-4 focus:ring-primary/30 cursor-pointer">
                        Crear Cuenta
                    </button>
                </div>
            </div>
        </div>
    </div>
</header>
