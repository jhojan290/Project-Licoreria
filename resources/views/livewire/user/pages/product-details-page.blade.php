@section('title', $product->name . ' | LicUp')

<main class="flex-grow bg-background-dark min-h-screen py-12 px-4 sm:px-6 lg:px-8 flex items-center font-display">
    
    <div class="fixed inset-0 z-0 pointer-events-none">
        <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-[#D4AF37]/5 rounded-full blur-[120px] -translate-y-1/2 translate-x-1/2"></div>
        <div class="absolute bottom-0 left-0 w-[400px] h-[400px] bg-purple-900/5 rounded-full blur-[100px] translate-y-1/2 -translate-x-1/2"></div>
    </div>

    <div class="max-w-7xl mx-auto w-full relative z-10">

        <div class="mb-8">
            <a href="{{ route('catalog') }}" class="inline-flex items-center gap-2 text-gray-400 hover:text-[#D4AF37] transition-colors text-sm font-bold tracking-wide group">
                <div class="w-8 h-8 rounded-full bg-white/5 flex items-center justify-center group-hover:bg-[#D4AF37] group-hover:text-black transition-all">
                    <span class="material-symbols-outlined text-base">arrow_back</span>
                </div>
                Volver al Catálogo
            </a>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20 items-start">

            <div class="relative w-full aspect-[4/5] lg:aspect-square bg-[#121212] border border-white/5 rounded-3xl flex items-center justify-center p-8 shadow-2xl overflow-hidden group hover:border-[#D4AF37]/20 transition-all duration-500">
                
                <div class="absolute inset-0 bg-gradient-to-b from-white/5 via-transparent to-black/60 pointer-events-none"></div>
                <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-64 h-64 bg-white/5 blur-3xl rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                
                @if($product->image_path)
                    <img 
                        src="{{ asset('storage/' . $product->image_path) }}" 
                        alt="{{ $product->name }}" 
                        class="relative z-10 h-full w-full object-contain drop-shadow-2xl transition-transform duration-700 group-hover:scale-110 group-hover:-rotate-2"
                    >
                @else
                    <div class="flex flex-col items-center text-gray-700 animate-pulse">
                        <span class="material-symbols-outlined text-9xl opacity-20">liquor</span>
                        <span class="text-sm mt-2 opacity-50 font-mono uppercase tracking-widest">Sin imagen disponible</span>
                    </div>
                @endif

                <div class="absolute top-6 left-6 px-4 py-2 bg-black/40 backdrop-blur-md border border-white/10 rounded-full">
                    <span class="text-[#D4AF37] text-xs font-bold uppercase tracking-widest">{{ $product->category }}</span>
                </div>
            </div>

            <div class="flex flex-col h-full justify-center space-y-8">
                
                <div>
                    <p class="text-[#D4AF37] font-bold text-sm tracking-[0.2em] uppercase mb-3 pl-1 flex items-center gap-2">
                        <span class="w-8 h-[2px] bg-[#D4AF37]"></span>
                        {{ $product->brand }}
                    </p>
                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black text-white leading-[1.1] tracking-tight mb-4">
                        {{ $product->name }}
                    </h1>
                </div>

                <div class="flex items-baseline gap-3 pb-6 border-b border-white/5">
                    <span class="text-5xl font-black text-white tracking-tight">
                        ${{ number_format($product->price, 0, ',', '.') }}
                    </span>
                    <span class="text-xl text-gray-500 font-medium">COP</span>
                </div>

                <div>
                    <h3 class="text-white font-bold text-lg mb-3 flex items-center gap-2">
                        <span class="material-symbols-outlined text-[#D4AF37]">format_quote</span>
                        Nota de Cata
                    </h3>
                    <p class="text-gray-400 leading-relaxed text-lg font-light">
                        {{ $product->description ?? 'Una selección exclusiva para paladares exigentes. Este producto representa la calidad y tradición que caracteriza a nuestra colección.' }}
                    </p>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div class="bg-[#181611] p-5 rounded-2xl border border-white/5 hover:border-[#D4AF37]/30 transition-colors group">
                        <span class="block text-xs text-gray-500 uppercase font-bold tracking-wider mb-1 group-hover:text-[#D4AF37] transition-colors">Volumen</span>
                        <div class="flex items-center gap-2">
                            <span class="material-symbols-outlined text-gray-600 text-xl">local_drink</span>
                            <span class="text-white font-bold text-xl">{{ $product->volume ?? 'N/A' }}</span>
                        </div>
                    </div>
                    <div class="bg-[#181611] p-5 rounded-2xl border border-white/5 hover:border-[#D4AF37]/30 transition-colors group">
                        <span class="block text-xs text-gray-500 uppercase font-bold tracking-wider mb-1 group-hover:text-[#D4AF37] transition-colors">Alcohol</span>
                        <div class="flex items-center gap-2">
                            <span class="material-symbols-outlined text-gray-600 text-xl">science</span>
                            <span class="text-white font-bold text-xl">{{ $product->alcohol_percentage ? $product->alcohol_percentage.'%' : 'N/A' }}</span>
                        </div>
                    </div>
                </div>

                <div class="pt-4">
                    @if($product->stock > 0)
                        <div class="space-y-6">
                            <div class="flex items-center gap-2 text-green-400 text-sm font-bold bg-green-400/5 w-fit px-3 py-1 rounded-full border border-green-400/20">
                                <div class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></div>
                                Disponible ({{ $product->stock }} unds)
                            </div>

                            <button 
                                wire:click="addToCart"
                                wire:loading.attr="disabled"
                                class="w-full h-16 flex items-center justify-center gap-3 bg-[#D4AF37] text-[#121212] text-lg font-black rounded-2xl hover:bg-white hover:scale-[1.02] transition-all shadow-[0_0_30px_rgba(212,175,55,0.2)] disabled:opacity-50 disabled:cursor-not-allowed group"
                            >
                                <span wire:loading.remove class="flex items-center gap-3">
                                    <span class="material-symbols-outlined text-2xl group-hover:-translate-y-1 transition-transform">shopping_bag</span>
                                    Añadir al Carrito
                                </span>
                                <span wire:loading class="flex items-center gap-3">
                                    <svg class="animate-spin h-6 w-6 text-[#121212]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                                    Procesando...
                                </span>
                            </button>
                        </div>
                    @else
                        <div class="w-full h-16 bg-white/5 border border-white/10 rounded-2xl flex items-center justify-center gap-3 text-gray-500 font-bold cursor-not-allowed uppercase tracking-widest">
                            <span class="material-symbols-outlined text-2xl">block</span>
                            Producto Agotado
                        </div>
                    @endif
                </div>

            </div>

        </div>
    </div>
</main>