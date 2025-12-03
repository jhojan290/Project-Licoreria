<main class="flex-grow bg-background-dark min-h-screen py-12 px-4 sm:px-6 lg:px-8 flex items-center">
    <div class="max-w-7xl mx-auto w-full">

        <div class="mb-6">
            <a href="{{ route('catalog') }}" class="inline-flex items-center gap-2 text-gray-400 hover:text-[#D4AF37] transition-colors text-sm font-medium">
                <span class="material-symbols-outlined text-base">arrow_back</span>
                Volver al Catálogo
            </a>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">

            <div class="relative w-full aspect-[4/5] lg:aspect-square bg-[#121212] border border-white/5 rounded-2xl flex items-center justify-center p-8 shadow-2xl overflow-hidden group">
                
                <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black/40"></div>
                
                @if($product->image_path)
                    <img 
                        src="{{ asset('storage/' . $product->image_path) }}" 
                        alt="{{ $product->name }}" 
                        class="relative z-10 h-full w-full object-contain drop-shadow-2xl transition-transform duration-700 group-hover:scale-105"
                    >
                @else
                    <div class="flex flex-col items-center text-gray-700">
                        <span class="material-symbols-outlined text-9xl opacity-20">liquor</span>
                        <span class="text-sm mt-2 opacity-50">Sin imagen</span>
                    </div>
                @endif
            </div>

            <div class="flex flex-col h-full justify-center">
                
                <div class="flex items-center gap-3 mb-3">
                    <span class="text-[#D4AF37] font-bold text-sm tracking-widest uppercase border border-[#D4AF37]/30 px-3 py-1 rounded-full bg-[#D4AF37]/10">
                        {{ $product->category }}
                    </span>
                    <span class="text-gray-400 text-sm uppercase tracking-wider font-medium">
                        {{ $product->brand }}
                    </span>
                </div>

                <h1 class="text-4xl sm:text-5xl font-black text-white leading-tight mb-6">
                    {{ $product->name }}
                </h1>

                <div class="flex items-end gap-2 mb-8 border-b border-white/10 pb-8">
                    <span class="text-5xl font-bold text-white tracking-tight">
                        ${{ number_format($product->price, 0, ',', '.') }}
                    </span>
                    <span class="text-gray-500 text-xl mb-1.5">COP</span>
                </div>

                <div class="mb-8">
                    <h3 class="text-white font-bold text-lg mb-3 flex items-center gap-2">
                        <span class="material-symbols-outlined text-[#D4AF37]">description</span>
                        Descripción
                    </h3>
                    <p class="text-gray-400 leading-relaxed text-base">
                        {{ $product->description ?? 'Una selección exclusiva para paladares exigentes. Este producto representa la calidad y tradición que caracteriza a nuestra colección.' }}
                    </p>
                </div>

                <div class="grid grid-cols-2 gap-4 mb-10">
                    <div class="bg-[#181611] p-4 rounded-xl border border-white/5">
                        <span class="block text-xs text-gray-500 uppercase font-bold mb-1">Volumen</span>
                        <span class="text-white font-medium text-lg">{{ $product->volume ?? 'N/A' }}</span>
                    </div>
                    <div class="bg-[#181611] p-4 rounded-xl border border-white/5">
                        <span class="block text-xs text-gray-500 uppercase font-bold mb-1">Alcohol</span>
                        <span class="text-white font-medium text-lg">{{ $product->alcohol_percentage ? $product->alcohol_percentage.'%' : 'N/A' }}</span>
                    </div>
                </div>

                <div class="mt-auto">
                    @if($product->stock > 0)
                        <div class="flex flex-col gap-4">
                            <div class="flex items-center gap-2 text-green-400 text-sm font-bold">
                                <span class="material-symbols-outlined text-base">check_circle</span>
                                Disponible en stock ({{ $product->stock }} unidades)
                            </div>

                            <button 
                                wire:click="addToCart"
                                wire:loading.attr="disabled"
                                class="flex w-full h-12 items-center justify-center gap-2 px-5 rounded-lg bg-[#D4AF37] text-[#121212] text-base font-bold shadow-lg hover:bg-yellow-500 transition-all hover:scale-[1.02] active:scale-[0.98] disabled:opacity-50 disabled:cursor-not-allowed"
                            >
                                <span wire:loading.remove class="flex items-center gap-2">
                                    <span class="material-symbols-outlined text-xl">add_shopping_cart</span>
                                    Añadir al Carrito
                                </span>
                                
                                <span wire:loading.flex class="items-center gap-2">
                                    <svg class="animate-spin h-5 w-5 text-black" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                    </svg>
                                    Agregando...
                                </span>
                            </button>
                        </div>
                    @else
                        <div class="w-full h-14 bg-white/5 border border-white/10 rounded-xl flex items-center justify-center gap-2 text-gray-500 font-bold cursor-not-allowed">
                            <span class="material-symbols-outlined">block</span>
                            Producto Agotado
                        </div>
                    @endif
                </div>

            </div>

        </div>
    </div>
</main>