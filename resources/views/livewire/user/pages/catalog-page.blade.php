<main class="flex-grow bg-background-dark min-h-screen">
    <div class="container mx-auto px-4 py-8 md:py-12">

        <div class="flex flex-col lg:flex-row gap-8">

            <aside class="w-full lg:w-64 flex-shrink-0 space-y-8">
                
                <div class="flex items-center justify-between">
                    <h2 class="text-xl font-black text-white tracking-tight">Filtros</h2>
                    @if($category || $brand || $priceRange || $search)
                        <button wire:click="clearFilters" class="text-xs text-red-400 hover:text-red-300 underline">
                            Limpiar todo
                        </button>
                    @endif
                </div>

                <div>
                    <h3 class="text-sm font-bold text-[#D4AF37] uppercase tracking-wider mb-3 border-b border-white/10 pb-2">
                        Categoría
                    </h3>
                    <div class="space-y-2 max-h-60 overflow-y-auto custom-scrollbar pr-2">
                        <label class="flex items-center gap-3 cursor-pointer group">
                            <input type="radio" wire:model.live="category" value="" class="hidden peer">
                            <span class="w-4 h-4 rounded-full border border-gray-600 peer-checked:border-[#D4AF37] peer-checked:bg-[#D4AF37] flex items-center justify-center transition-all"></span>
                            <span class="text-gray-400 group-hover:text-white peer-checked:text-white text-sm">Todas</span>
                        </label>
                        @foreach($this->filterOptions['categories'] as $cat)
                            <label class="flex items-center gap-3 cursor-pointer group">
                                <input type="radio" wire:model.live="category" value="{{ $cat }}" class="hidden peer">
                                <span class="w-4 h-4 rounded-full border border-gray-600 peer-checked:border-[#D4AF37] peer-checked:bg-[#D4AF37] flex items-center justify-center transition-all"></span>
                                <span class="text-gray-400 group-hover:text-white peer-checked:text-white text-sm">{{ $cat }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>

                <div>
                    <h3 class="text-sm font-bold text-[#D4AF37] uppercase tracking-wider mb-3 border-b border-white/10 pb-2">
                        Marca
                    </h3>
                    <div class="space-y-2 max-h-60 overflow-y-auto custom-scrollbar pr-2">
                        <label class="flex items-center gap-3 cursor-pointer group">
                            <input type="radio" wire:model.live="brand" value="" class="hidden peer">
                            <span class="w-4 h-4 rounded-full border border-gray-600 peer-checked:border-[#D4AF37] peer-checked:bg-[#D4AF37]"></span>
                            <span class="text-gray-400 group-hover:text-white peer-checked:text-white text-sm">Todas</span>
                        </label>
                        @foreach($this->filterOptions['brands'] as $br)
                            <label class="flex items-center gap-3 cursor-pointer group">
                                <input type="radio" wire:model.live="brand" value="{{ $br }}" class="hidden peer">
                                <span class="w-4 h-4 rounded-full border border-gray-600 peer-checked:border-[#D4AF37] peer-checked:bg-[#D4AF37]"></span>
                                <span class="text-gray-400 group-hover:text-white peer-checked:text-white text-sm">{{ $br }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>

                <div>
                    <h3 class="text-sm font-bold text-[#D4AF37] uppercase tracking-wider mb-3 border-b border-white/10 pb-2">
                        Precio
                    </h3>
                    <div class="space-y-2">
                        <label class="flex items-center gap-3 cursor-pointer group">
                            <input type="radio" wire:model.live="priceRange" value="" class="hidden peer">
                            <span class="w-4 h-4 rounded-full border border-gray-600 peer-checked:border-[#D4AF37] peer-checked:bg-[#D4AF37]"></span>
                            <span class="text-gray-400 group-hover:text-white peer-checked:text-white text-sm">Todos</span>
                        </label>
                        <label class="flex items-center gap-3 cursor-pointer group">
                            <input type="radio" wire:model.live="priceRange" value="low" class="hidden peer">
                            <span class="w-4 h-4 rounded-full border border-gray-600 peer-checked:border-[#D4AF37] peer-checked:bg-[#D4AF37]"></span>
                            <span class="text-gray-400 group-hover:text-white peer-checked:text-white text-sm">Menos de $50k</span>
                        </label>
                        <label class="flex items-center gap-3 cursor-pointer group">
                            <input type="radio" wire:model.live="priceRange" value="mid" class="hidden peer">
                            <span class="w-4 h-4 rounded-full border border-gray-600 peer-checked:border-[#D4AF37] peer-checked:bg-[#D4AF37]"></span>
                            <span class="text-gray-400 group-hover:text-white peer-checked:text-white text-sm">$50k - $150k</span>
                        </label>
                        <label class="flex items-center gap-3 cursor-pointer group">
                            <input type="radio" wire:model.live="priceRange" value="high" class="hidden peer">
                            <span class="w-4 h-4 rounded-full border border-gray-600 peer-checked:border-[#D4AF37] peer-checked:bg-[#D4AF37]"></span>
                            <span class="text-gray-400 group-hover:text-white peer-checked:text-white text-sm">Más de $150k</span>
                        </label>
                    </div>
                </div>
            </aside>


            <div class="flex-1">
                
                <div class="flex flex-col md:flex-row justify-between items-center gap-4 mb-8">
                    
                    <div class="relative w-full md:max-w-md group">
                        <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-gray-500 group-focus-within:text-[#D4AF37] transition-colors">search</span>
                        <input wire:model.live.debounce.300ms="search" type="text" placeholder="Buscar licor..." 
                            class="w-full h-11 pl-10 pr-4 rounded-lg bg-[#181611] border border-white/10 text-white placeholder:text-gray-600 focus:outline-none focus:border-[#D4AF37] focus:ring-1 focus:ring-[#D4AF37] transition-all">
                    </div>

                    <div class="relative w-full md:w-48">
                        <select wire:model.live="sort" class="w-full h-11 pl-4 pr-10 rounded-lg bg-[#181611] border border-white/10 text-gray-300 text-sm focus:border-[#D4AF37] focus:ring-1 focus:ring-[#D4AF37] appearance-none cursor-pointer">
                            <option value="newest">Más Recientes</option>
                            <option value="price_asc">Precio: Bajo a Alto</option>
                            <option value="price_desc">Precio: Alto a Bajo</option>
                        </select>
                        <span class="material-symbols-outlined absolute right-3 top-1/2 -translate-y-1/2 text-gray-500 pointer-events-none">sort</span>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    @forelse($this->products as $product)
                        <div wire:key="prod-{{ $product->id }}" class="group relative flex flex-col overflow-hidden rounded-xl bg-[#181611] border border-white/5 hover:border-[#D4AF37]/50 transition-all hover:shadow-lg hover:shadow-[#D4AF37]/10">
                            
                            <a href="{{ route('product.detail', $product->id) }}" class="block relative aspect-[3/4] bg-white/5 p-6 flex items-center justify-center overflow-hidden">
                                @if($product->image_path)
                                    <img src="{{ asset('storage/' . $product->image_path) }}" 
                                        alt="{{ $product->name }}" 
                                        class="h-full w-full object-contain transition-transform duration-500 group-hover:scale-110 drop-shadow-xl">
                                @else
                                    <span class="material-symbols-outlined text-6xl text-gray-700">image_not_supported</span>
                                @endif

                                @if($product->stock < 5)
                                    <span class="absolute top-2 right-2 bg-red-500 text-white text-[10px] font-bold px-2 py-0.5 rounded">¡Últimos!</span>
                                @endif
                            </a>

                            <div class="p-4 flex flex-col flex-1">
                                <p class="text-[10px] font-bold uppercase tracking-widest text-[#D4AF37] mb-1">{{ $product->brand }}</p>
                                
                                <h3 class="text-sm font-bold text-white leading-tight mb-1 line-clamp-2 group-hover:text-[#D4AF37] transition-colors">
                                    <a href="{{ route('product.detail', $product->id) }}">{{ $product->name }}</a>
                                </h3>
                                
                                <p class="text-xs text-gray-500 mb-3">{{ $product->category }} {{ $product->volume ? '• ' . $product->volume : '' }}</p>
                                
                                <div class="mt-auto pt-2 flex items-center justify-between border-t border-white/5">
                                    <p class="text-lg font-black text-white">${{ number_format($product->price, 0, ',', '.') }}</p>
                                    
                                    <button 
                                        {{-- CAMBIO: Llamamos a la función PHP addToCart pasando el ID --}}
                                        wire:click="addToCart({{ $product->id }})" 
                                        
                                        wire:loading.attr="disabled" 
                                        wire:target="addToCart({{ $product->id }})"
                                        class="h-8 w-8 flex items-center justify-center rounded-full bg-[#D4AF37] text-black hover:bg-white transition-transform hover:scale-110 shadow-lg disabled:opacity-50 disabled:cursor-wait"
                                        title="Agregar al Carrito"
                                    >
                                        <span wire:loading.remove wire:target="addToCart({{ $product->id }})" class="material-symbols-outlined text-lg">
                                            add_shopping_cart
                                        </span>

                                        <svg wire:loading wire:target="addToCart({{ $product->id }})" class="animate-spin h-4 w-4 text-black" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full py-20 text-center">
                            <h3 class="text-xl font-bold text-white">No se encontraron productos</h3>
                            <p class="text-gray-400 text-sm mt-1">Intenta cambiar los filtros o la búsqueda.</p>
                            <button wire:click="clearFilters" class="mt-6 text-[#D4AF37] hover:underline text-sm font-bold">Limpiar filtros</button>
                        </div>
                    @endforelse
                </div>

                <div class="mt-12">
                    {{ $this->products->links('pagination::tailwind') }}
                </div>

            </div>

        </div>
    </div>
</main>