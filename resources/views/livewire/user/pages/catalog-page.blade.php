@section('title', 'Catalogo | LicUp')

<main class="flex-grow bg-background-dark min-h-screen font-display">
    
    <div class="relative bg-[#0f0f0f] border-b border-white/5 py-12 md:py-16">
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-5"></div>
        <div class="container mx-auto px-4 relative z-10 text-center">
            <span class="text-[#D4AF37] font-bold uppercase tracking-[0.3em] text-xs mb-3 block animate-fade-in-down">Nuestra Colección</span>
            <h1 class="text-4xl md:text-6xl font-black text-white tracking-tight mb-4 animate-fade-in-up">
                Catálogo <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#D4AF37] to-yellow-200">Premium</span>
            </h1>
            <p class="text-gray-400 max-w-xl mx-auto text-sm md:text-base animate-fade-in-up delay-100">
                Explora nuestra selección exclusiva de licores del mundo. Calidad garantizada en cada botella.
            </p>
        </div>
    </div>

    <div class="container mx-auto px-4 py-8 md:py-12">
        <div class="flex flex-col lg:flex-row gap-8 items-start">

            <aside class="w-full lg:w-72 flex-shrink-0 space-y-8 lg:sticky lg:top-24 transition-all duration-300" x-data="{ mobileFiltersOpen: false }">
                
                <button @click="mobileFiltersOpen = !mobileFiltersOpen" class="lg:hidden w-full flex items-center justify-between bg-[#181611] border border-white/10 rounded-xl p-4 text-white font-bold">
                    <span class="flex items-center gap-2"><span class="material-symbols-outlined text-[#D4AF37]">tune</span> Filtros</span>
                    <span class="material-symbols-outlined transition-transform duration-300" :class="{'rotate-180': mobileFiltersOpen}">expand_more</span>
                </button>

                <div class="space-y-8 lg:block" :class="mobileFiltersOpen ? 'block mt-4' : 'hidden'">
                    
                    <div class="hidden lg:flex items-center justify-between border-b border-white/10 pb-4">
                        <h2 class="text-xl font-bold text-white flex items-center gap-2">
                            <span class="material-symbols-outlined text-[#D4AF37]">filter_list</span> Filtros
                        </h2>
                        @if($category || $brand || $priceRange || $search)
                            <button wire:click="clearFilters" class="text-xs text-red-400 hover:text-red-300 underline transition-colors">Limpiar</button>
                        @endif
                    </div>

                    <div class="relative group">
                        <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-gray-500 group-focus-within:text-[#D4AF37] transition-colors">search</span>
                        <input wire:model.live.debounce.300ms="search" type="text" placeholder="Buscar licor..." 
                            class="w-full h-12 pl-10 pr-4 rounded-xl bg-[#181611] border border-white/10 text-white placeholder:text-gray-600 focus:outline-none focus:border-[#D4AF37] focus:ring-1 focus:ring-[#D4AF37] transition-all text-sm">
                    </div>

                    <div>
                        <h3 class="text-sm font-bold text-[#D4AF37] uppercase tracking-widest mb-4">Categoría</h3>
                        <div class="space-y-2 max-h-60 overflow-y-auto custom-scrollbar pr-2">
                            <label class="flex items-center gap-3 cursor-pointer group p-2 rounded-lg hover:bg-white/5 transition-colors">
                                <div class="relative flex items-center">
                                    <input type="radio" wire:model.live="category" value="" class="peer h-4 w-4 cursor-pointer appearance-none rounded-full border border-gray-600 checked:border-[#D4AF37] checked:bg-[#D4AF37] transition-all">
                                    <div class="pointer-events-none absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-2 h-2 rounded-full bg-[#121212] opacity-0 peer-checked:opacity-100 transition-opacity"></div>
                                </div>
                                <span class="text-gray-400 group-hover:text-white peer-checked:text-white peer-checked:font-bold text-sm">Todas</span>
                            </label>
                            @foreach($this->filterOptions['categories'] as $cat)
                                <label class="flex items-center gap-3 cursor-pointer group p-2 rounded-lg hover:bg-white/5 transition-colors">
                                    <div class="relative flex items-center">
                                        <input type="radio" wire:model.live="category" value="{{ $cat }}" class="peer h-4 w-4 cursor-pointer appearance-none rounded-full border border-gray-600 checked:border-[#D4AF37] checked:bg-[#D4AF37] transition-all">
                                        <div class="pointer-events-none absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-2 h-2 rounded-full bg-[#121212] opacity-0 peer-checked:opacity-100 transition-opacity"></div>
                                    </div>
                                    <span class="text-gray-400 group-hover:text-white peer-checked:text-white peer-checked:font-bold text-sm">{{ $cat }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <div>
                        <h3 class="text-sm font-bold text-[#D4AF37] uppercase tracking-widest mb-4">Precio</h3>
                        <div class="space-y-2">
                            @foreach([
                                '' => 'Todos',
                                'low' => 'Menos de $50k',
                                'mid' => '$50k - $150k',
                                'high' => 'Más de $150k'
                            ] as $val => $label)
                                <label class="flex items-center gap-3 cursor-pointer group p-2 rounded-lg hover:bg-white/5 transition-colors">
                                    <div class="relative flex items-center">
                                        <input type="radio" wire:model.live="priceRange" value="{{ $val }}" class="peer h-4 w-4 cursor-pointer appearance-none rounded-full border border-gray-600 checked:border-[#D4AF37] checked:bg-[#D4AF37] transition-all">
                                        <div class="pointer-events-none absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-2 h-2 rounded-full bg-[#121212] opacity-0 peer-checked:opacity-100 transition-opacity"></div>
                                    </div>
                                    <span class="text-gray-400 group-hover:text-white peer-checked:text-white peer-checked:font-bold text-sm">{{ $label }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <div>
                        <h3 class="text-sm font-bold text-[#D4AF37] uppercase tracking-widest mb-4">Marca</h3>
                        <div class="space-y-2 max-h-48 overflow-y-auto custom-scrollbar pr-2">
                            <label class="flex items-center gap-3 cursor-pointer group p-2 rounded-lg hover:bg-white/5 transition-colors">
                                <input type="radio" wire:model.live="brand" value="" class="hidden peer">
                                <span class="text-gray-400 group-hover:text-white peer-checked:text-[#D4AF37] peer-checked:font-bold text-sm transition-colors">Todas</span>
                            </label>
                            @foreach($this->filterOptions['brands'] as $br)
                                <label class="flex items-center gap-3 cursor-pointer group p-2 rounded-lg hover:bg-white/5 transition-colors">
                                    <input type="radio" wire:model.live="brand" value="{{ $br }}" class="hidden peer">
                                    <span class="text-gray-400 group-hover:text-white peer-checked:text-[#D4AF37] peer-checked:font-bold text-sm transition-colors">{{ $br }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>

                </div>
            </aside>


            <div class="flex-1 min-w-0">
                
                <div class="flex flex-col sm:flex-row justify-between items-center gap-4 mb-8 pb-4 border-b border-white/5">
                    <p class="text-gray-400 text-sm">
                        Mostrando <span class="text-white font-bold">{{ $this->products->firstItem() ?? 0 }}-{{ $this->products->lastItem() ?? 0 }}</span> de <span class="text-white font-bold">{{ $this->products->total() }}</span> resultados
                    </p>

                    <div class="relative w-full sm:w-48">
                        <select wire:model.live="sort" class="w-full h-10 pl-4 pr-10 rounded-lg bg-[#181611] border border-white/10 text-gray-300 text-sm focus:border-[#D4AF37] focus:ring-1 focus:ring-[#D4AF37] appearance-none cursor-pointer transition-all hover:border-white/20">
                            <option value="newest">Más Recientes</option>
                            <option value="price_asc">Precio: Bajo a Alto</option>
                            <option value="price_desc">Precio: Alto a Bajo</option>
                        </select>
                        <span class="material-symbols-outlined absolute right-3 top-1/2 -translate-y-1/2 text-gray-500 pointer-events-none text-lg">sort</span>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-6">
                    @forelse($this->products as $product)
                        <div wire:key="prod-{{ $product->id }}" class="group relative flex flex-col bg-[#181611] border border-white/5 rounded-2xl overflow-hidden hover:border-[#D4AF37]/30 transition-all duration-300 hover:shadow-[0_10px_40px_-10px_rgba(0,0,0,0.5)] hover:-translate-y-1">
                            
                            <a href="{{ route('product.detail', $product->id) }}" class="block relative aspect-[4/5] bg-gradient-to-b from-white/5 to-[#121212] p-6 flex items-center justify-center overflow-hidden">
                                @if($product->image_path)
                                    <img src="{{ asset('storage/' . $product->image_path) }}" 
                                        alt="{{ $product->name }}" 
                                        class="h-full w-full object-contain transition-transform duration-700 group-hover:scale-110 drop-shadow-2xl">
                                @else
                                    <div class="flex flex-col items-center text-gray-700">
                                        <span class="material-symbols-outlined text-6xl mb-2">image_not_supported</span>
                                    </div>
                                @endif

                                @if($product->stock > 0 && $product->stock < 5)
                                    <span class="absolute top-3 right-3 bg-red-500/90 text-white text-[10px] font-bold px-2 py-1 rounded uppercase tracking-wider shadow-sm z-10">
                                        ¡Últimos!
                                    </span>
                                @endif
                            </a>

                            <div class="p-5 flex flex-col flex-1 border-t border-white/5 bg-[#181611] relative z-20">
                                <div class="flex justify-between items-start mb-2">
                                    <p class="text-[10px] font-bold uppercase tracking-widest text-[#D4AF37]">{{ $product->category }}</p>
                                    <p class="text-[10px] text-gray-500 font-medium">{{ $product->volume ?? '' }}</p>
                                </div>
                                
                                <h3 class="text-base font-bold text-white leading-tight mb-1 line-clamp-2 group-hover:text-[#D4AF37] transition-colors min-h-[2.5rem]">
                                    <a href="{{ route('product.detail', $product->id) }}">{{ $product->name }}</a>
                                </h3>
                                <p class="text-xs text-gray-500 mb-4">{{ $product->brand }}</p>
                                
                                <div class="mt-auto flex items-center justify-between">
                                    <div class="flex flex-col">
                                        <span class="text-xl font-black text-white tracking-tight">${{ number_format($product->price, 0, ',', '.') }}</span>
                                    </div>
                                    
                                    <button 
                                        wire:click="addToCart({{ $product->id }})" 
                                        wire:loading.attr="disabled"
                                        wire:target="addToCart({{ $product->id }})"
                                        class="h-10 w-10 rounded-full bg-[#D4AF37] text-[#121212] flex items-center justify-center hover:bg-white transition-all hover:scale-110 shadow-lg shadow-yellow-900/20 focus:outline-none group/btn disabled:opacity-50 disabled:cursor-not-allowed"
                                        title="Agregar al Carrito"
                                    >
                                        <span wire:loading.remove wire:target="addToCart({{ $product->id }})" class="material-symbols-outlined text-xl group-hover/btn:rotate-12 transition-transform">
                                            add_shopping_cart
                                        </span>
                                        <svg wire:loading wire:target="addToCart({{ $product->id }})" class="animate-spin h-5 w-5 text-[#121212]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full flex flex-col items-center justify-center py-32 text-center border border-dashed border-white/10 rounded-2xl bg-white/5">
                            <div class="p-4 rounded-full bg-[#181611] mb-4 border border-white/5">
                                <span class="material-symbols-outlined text-5xl text-gray-600">liquor_off</span>
                            </div>
                            <h3 class="text-2xl font-bold text-white mb-2">No se encontraron productos</h3>
                            <p class="text-gray-400 text-sm max-w-xs mx-auto mb-6">Intenta ajustar los filtros de búsqueda o busca por otra categoría.</p>
                            <button wire:click="clearFilters" class="px-6 py-2.5 rounded-full bg-white/10 text-white font-bold hover:bg-[#D4AF37] hover:text-[#121212] transition-all text-sm border border-white/10">
                                Limpiar filtros
                            </button>
                        </div>
                    @endforelse
                </div>

                <div class="mt-16 border-t border-white/5 pt-8">
                    {{ $this->products->links('pagination::tailwind') }}
                </div>

            </div>

        </div>
    </div>
</main>