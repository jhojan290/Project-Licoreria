<main class="flex-grow bg-background-dark font-display overflow-hidden">

    <section class="relative w-full h-[85vh] overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1569529465841-dfecdab7503b?q=80&w=1974&auto=format&fit=crop" 
                 class="w-full h-full object-cover object-center opacity-50 scale-105 animate-pulse-slow" alt="Banner">
            <div class="absolute inset-0 bg-gradient-to-t from-[#121212] via-[#121212]/60 to-transparent"></div>
            <div class="absolute inset-0 bg-gradient-to-r from-[#121212]/90 via-transparent to-transparent"></div>
        </div>

        <div class="relative z-10 container mx-auto h-full flex flex-col justify-center px-6 md:px-12 gap-6">
            <span class="text-[#D4AF37] uppercase tracking-[0.3em] text-sm font-bold animate-in fade-in slide-in-from-left-8 duration-700 delay-100">Premium Selection</span>
            <h1 class="text-white text-5xl md:text-7xl lg:text-8xl font-black leading-tight tracking-tighter max-w-4xl animate-in fade-in slide-in-from-left-8 duration-1000 delay-200">
                El Arte del <br/> <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#D4AF37] to-[#FCEEA6]">Buen Beber</span>
            </h1>
            <p class="text-gray-300 text-lg md:text-xl font-light max-w-xl leading-relaxed animate-in fade-in slide-in-from-left-8 duration-1000 delay-300">
                Explora nuestra colección curada de licores nacionales e importados. Calidad garantizada.
            </p>
            <div class="flex flex-wrap gap-4 mt-4 animate-in fade-in slide-in-from-bottom-8 duration-1000 delay-500">
                <a href="{{ route('catalog') }}" class="inline-flex items-center justify-center h-14 px-8 rounded-full bg-[#D4AF37] text-[#121212] text-lg font-bold hover:bg-white hover:scale-105 transition-all shadow-[0_0_40px_rgba(212,175,55,0.4)]">Ver Catálogo</a>
            </div>
        </div>
    </section>

    <section class="py-10 border-b border-white/5 bg-[#0f0f0f]">
        <div class="container mx-auto px-4 overflow-hidden relative">
            <div class="flex items-center gap-12 animate-scroll whitespace-nowrap">
                @foreach(range(1, 10) as $i)
                    <span class="text-2xl font-black text-white/20 uppercase tracking-widest hover:text-[#D4AF37] transition-colors cursor-default">JOHNNIE WALKER</span>
                    <span class="text-2xl font-black text-white/20 uppercase tracking-widest hover:text-[#D4AF37] transition-colors cursor-default">BUCHANAN'S</span>
                    <span class="text-2xl font-black text-white/20 uppercase tracking-widest hover:text-[#D4AF37] transition-colors cursor-default">DON JULIO</span>
                    <span class="text-2xl font-black text-white/20 uppercase tracking-widest hover:text-[#D4AF37] transition-colors cursor-default">MACALLAN</span>
                @endforeach
            </div>
            <div class="absolute inset-y-0 left-0 w-20 bg-gradient-to-r from-[#121212] to-transparent pointer-events-none"></div>
            <div class="absolute inset-y-0 right-0 w-20 bg-gradient-to-l from-[#121212] to-transparent pointer-events-none"></div>
        </div>
    </section>

    <section class="py-20 container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-3">Explora por Categoría</h2>
            <div class="h-1 w-20 bg-[#D4AF37] mx-auto rounded-full"></div>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
            @php
                $categories = [
                    ['name' => 'Whiskey', 'img' => 'https://images.unsplash.com/photo-1527281400683-1aae777175f8?auto=format&fit=crop&w=400'],
                    ['name' => 'Ron', 'img' => 'https://images.unsplash.com/photo-1614313511387-1436a4480ebb?auto=format&fit=crop&w=400'],
                    ['name' => 'Gin', 'img' => 'https://images.unsplash.com/photo-1514362545857-3bc16c4c7d1b?auto=format&fit=crop&w=400'],
                    ['name' => 'Tequila', 'img' => 'https://images.unsplash.com/photo-1516535794938-6063878f08cc?auto=format&fit=crop&w=400'],
                    ['name' => 'Vino', 'img' => 'https://images.unsplash.com/photo-1510812431401-41d2bd2722f3?auto=format&fit=crop&w=400'],
                    ['name' => 'Cerveza', 'img' => 'https://images.unsplash.com/photo-1618885472179-5e474019f2a9?auto=format&fit=crop&w=400&q=80'],
                ];
            @endphp
            @foreach($categories as $cat)
                <a href="{{ route('catalog', ['category' => $cat['name']]) }}" class="group relative h-64 rounded-2xl overflow-hidden cursor-pointer">
                    <img src="{{ $cat['img'] }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110 opacity-70 group-hover:opacity-100">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/20 to-transparent"></div>
                    <div class="absolute bottom-0 w-full p-4 text-center">
                        <p class="text-white text-lg font-bold uppercase tracking-widest group-hover:text-[#D4AF37] transition-colors transform translate-y-2 group-hover:translate-y-0 duration-300">{{ $cat['name'] }}</p>
                    </div>
                </a>
            @endforeach
        </div>
    </section>

    <section class="py-16 bg-white/5 border-y border-white/5">
        <div class="container mx-auto px-4 grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
            <div class="p-6 rounded-2xl bg-[#121212] border border-white/5 hover:border-[#D4AF37]/30 transition-all group">
                <div class="w-16 h-16 mx-auto bg-[#D4AF37]/10 rounded-full flex items-center justify-center mb-4 group-hover:bg-[#D4AF37] transition-colors">
                    <span class="material-symbols-outlined text-3xl text-[#D4AF37] group-hover:text-black">local_shipping</span>
                </div>
                <h3 class="text-white text-xl font-bold mb-2">Envíos Seguros</h3>
                <p class="text-gray-400 text-sm">Empaquetado especial anti-roturas y entrega rápida a nivel nacional.</p>
            </div>
            <div class="p-6 rounded-2xl bg-[#121212] border border-white/5 hover:border-[#D4AF37]/30 transition-all group">
                <div class="w-16 h-16 mx-auto bg-[#D4AF37]/10 rounded-full flex items-center justify-center mb-4 group-hover:bg-[#D4AF37] transition-colors">
                    <span class="material-symbols-outlined text-3xl text-[#D4AF37] group-hover:text-black">verified</span>
                </div>
                <h3 class="text-white text-xl font-bold mb-2">100% Original</h3>
                <p class="text-gray-400 text-sm">Garantizamos la autenticidad y procedencia de cada botella.</p>
            </div>
            <div class="p-6 rounded-2xl bg-[#121212] border border-white/5 hover:border-[#D4AF37]/30 transition-all group">
                <div class="w-16 h-16 mx-auto bg-[#D4AF37]/10 rounded-full flex items-center justify-center mb-4 group-hover:bg-[#D4AF37] transition-colors">
                    <span class="material-symbols-outlined text-3xl text-[#D4AF37] group-hover:text-black">support_agent</span>
                </div>
                <h3 class="text-white text-xl font-bold mb-2">Soporte Premium</h3>
                <p class="text-gray-400 text-sm">Asesoría personalizada para tus eventos y colecciones.</p>
            </div>
        </div>
    </section>

    <section class="py-24 container mx-auto px-4">
        <div class="flex flex-col md:flex-row items-end justify-between mb-12 gap-6">
            <div>
                <span class="text-[#D4AF37] uppercase tracking-widest text-sm font-bold mb-2 block">Inspiración</span>
                <h2 class="text-4xl font-black text-white">¿Para qué es la ocasión?</h2>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 h-[500px] md:h-[400px]">
            <a href="{{ route('catalog') }}" class="group relative rounded-2xl overflow-hidden h-full">
                <img src="https://images.unsplash.com/photo-1513558161293-cdaf765ed2fd?auto=format&fit=crop&w=600" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110 opacity-60 group-hover:opacity-80">
                <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent"></div>
                <div class="absolute bottom-6 left-6">
                    <h3 class="text-2xl font-bold text-white mb-1 group-hover:text-[#D4AF37] transition-colors">Para Regalar</h3>
                    <p class="text-gray-300 text-sm">Detalles que impresionan</p>
                </div>
            </a>
            <a href="{{ route('catalog') }}" class="group relative rounded-2xl overflow-hidden h-full md:col-span-2">
                <img src="{{ asset('img/licores.png') }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110 opacity-60 group-hover:opacity-80">
                <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent"></div>
                <div class="absolute bottom-6 left-6">
                    <h3 class="text-2xl font-bold text-white mb-1 group-hover:text-[#D4AF37] transition-colors">Celebración & Fiesta</h3>
                    <p class="text-gray-300 text-sm">Los infaltables de la noche</p>
                </div>
            </a>
        </div>
    </section>

    <section class="py-20 bg-[#181611] border-y border-white/5">
        <div class="container mx-auto px-4">
            <div class="flex flex-col lg:flex-row gap-12 items-center">
                <div class="lg:w-1/2">
                    <span class="text-[#D4AF37] font-bold uppercase tracking-widest text-sm mb-2 block">LicUp Academy</span>
                    <h2 class="text-4xl md:text-5xl font-black text-white mb-6 leading-tight">
                        Aprende a catar como un <span class="text-[#D4AF37]">Profesional</span>
                    </h2>
                    <p class="text-gray-400 text-lg mb-8">
                        El secreto de un buen trago no solo está en la botella, sino en cómo se sirve. Descubre nuestros consejos para elevar tu experiencia.
                    </p>
                    
                    <div class="space-y-6">
                        <div class="flex gap-4 items-start group">
                            <div class="w-12 h-12 rounded-full bg-white/5 flex items-center justify-center group-hover:bg-[#D4AF37] transition-colors">
                                <span class="material-symbols-outlined text-white group-hover:text-black">thermostat</span>
                            </div>
                            <div>
                                <h4 class="text-white font-bold text-lg">La Temperatura Perfecta</h4>
                                <p class="text-gray-500 text-sm">Cada licor tiene su punto ideal. El whisky, mejor a temperatura ambiente o con una sola roca de hielo.</p>
                            </div>
                        </div>
                        <div class="flex gap-4 items-start group">
                            <div class="w-12 h-12 rounded-full bg-white/5 flex items-center justify-center group-hover:bg-[#D4AF37] transition-colors">
                                <span class="material-symbols-outlined text-white group-hover:text-black">wine_bar</span>
                            </div>
                            <div>
                                <h4 class="text-white font-bold text-lg">La Copa Importa</h4>
                                <p class="text-gray-500 text-sm">Usar el cristal adecuado permite que los aromas se liberen correctamente antes del primer sorbo.</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="lg:w-1/2 relative">
                    <div class="absolute -inset-4 bg-[#D4AF37]/20 blur-2xl rounded-full"></div>
                    <img src="https://images.unsplash.com/photo-1514362545857-3bc16c4c7d1b?auto=format&fit=crop&w=800" class="relative rounded-2xl shadow-2xl border border-white/10 transform rotate-3 hover:rotate-0 transition-transform duration-500">
                </div>
            </div>
        </div>
    </section>

    <section class="py-16">
        <div class="container mx-auto px-4 flex flex-col md:flex-row items-center gap-12">
            <div class="w-full md:w-1/2 flex justify-center relative">
                <div class="absolute inset-0 bg-[#D4AF37]/10 blur-[100px] rounded-full"></div>
                @if($this->recommendedProducts->first())
                    @php $featured = $this->recommendedProducts->first(); @endphp
                    <img src="{{ asset('storage/' . $featured->image_path) }}" class="relative z-10 h-[400px] md:h-[500px] object-contain drop-shadow-2xl animate-float" alt="Destacado">
                @else
                    <span class="material-symbols-outlined text-9xl text-gray-800">liquor</span>
                @endif
            </div>
            <div class="w-full md:w-1/2 text-center md:text-left">
                <span class="text-[#D4AF37] font-bold uppercase tracking-widest text-sm mb-2 block">Selección del Mes</span>
                <h2 class="text-4xl md:text-6xl font-black text-white mb-6 leading-none">{{ $featured->name ?? 'Producto Destacado' }}</h2>
                <p class="text-gray-400 text-lg mb-8 leading-relaxed">{{ $featured->description ?? 'Calidad excepcional.' }}</p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center md:justify-start items-center">
                    <p class="text-3xl font-bold text-white">${{ number_format($featured->price ?? 0, 0) }}</p>
                    <button wire:click="addToCart({{ $featured->id ?? 0 }})" class="h-12 px-8 rounded-full bg-white text-black font-bold hover:bg-[#D4AF37] transition-colors flex items-center gap-2">
                        <span class="material-symbols-outlined">add_shopping_cart</span> Comprar
                    </button>
                </div>
            </div>
        </div>
    </section>

    <section class="py-20 container mx-auto px-4 overflow-hidden relative" 
        x-data="{ 
            timer: null,
            startAutoScroll() {
                this.timer = setInterval(() => this.scroll('right'), 3000); // Se mueve cada 3 segundos
            },
            stopAutoScroll() {
                clearInterval(this.timer);
            },
            scroll(direction) {
                const container = $refs.slider;
                const cardWidth = 280; // Ancho tarjeta + gap
                
                // Calculamos si ya llegamos al final
                // (scrollLeft + anchoVisible >= anchoTotal - pequeño margen de error)
                const maxScroll = container.scrollWidth - container.clientWidth;
                
                if (direction === 'left') {
                    container.scrollBy({ left: -cardWidth, behavior: 'smooth' });
                } else {
                    // Lógica de Loop: Si estamos al final, volver al principio
                    if (container.scrollLeft >= maxScroll - 10) {
                        container.scrollTo({ left: 0, behavior: 'smooth' });
                    } else {
                        container.scrollBy({ left: cardWidth, behavior: 'smooth' });
                    }
                }
            }
        }"
        x-init="startAutoScroll()"
        @mouseenter="stopAutoScroll()"
        @mouseleave="startAutoScroll()"
    >
        <div class="flex justify-between items-end mb-8 px-2">
            <div>
                <h2 class="text-3xl font-bold text-white">Recomendados</h2>
                <p class="text-gray-500 mt-1">Tendencias actuales</p>
            </div>
            
            <div class="flex gap-2">
                <button @click="scroll('left')" class="h-10 w-10 rounded-full border border-white/10 bg-white/5 text-white hover:bg-[#D4AF37] hover:text-black hover:border-[#D4AF37] flex items-center justify-center transition-all active:scale-95">
                    <span class="material-symbols-outlined">arrow_back</span>
                </button>
                <button @click="scroll('right')" class="h-10 w-10 rounded-full border border-white/10 bg-white/5 text-white hover:bg-[#D4AF37] hover:text-black hover:border-[#D4AF37] flex items-center justify-center transition-all active:scale-95">
                    <span class="material-symbols-outlined">arrow_forward</span>
                </button>

                <a href="{{ route('catalog') }}" class="hidden sm:flex text-[#D4AF37] hover:text-white transition-colors text-sm font-bold items-center gap-1 ml-4">
                    Ver Todo <span class="material-symbols-outlined text-lg">arrow_forward</span>
                </a>
            </div>
        </div>

        <div class="flex overflow-x-auto gap-6 pb-8 snap-x snap-mandatory scroll-smooth no-scrollbar" 
            x-ref="slider"
            style="scrollbar-width: none; -ms-overflow-style: none;">
            
            <style>
                div[x-ref="slider"]::-webkit-scrollbar { display: none; }
            </style>

            @foreach($this->recommendedProducts as $product)
                <div class="flex-shrink-0 w-64 snap-center">
                    <div class="group/card relative flex flex-col h-full bg-[#121212] border border-white/5 rounded-2xl overflow-hidden hover:border-[#D4AF37]/30 transition-all hover:shadow-xl hover:-translate-y-2 duration-300">
                        
                        <a href="{{ route('product.detail', $product->id) }}" class="relative h-64 bg-white/5 p-6 flex items-center justify-center overflow-hidden">
                            @if($product->image_path)
                                <img src="{{ asset('storage/' . $product->image_path) }}" class="h-full w-full object-contain transition-transform duration-500 group-hover/card:scale-110 drop-shadow-lg">
                            @else
                                <span class="material-symbols-outlined text-6xl text-gray-700">image</span>
                            @endif
                        </a>

                        <div class="p-5 flex flex-col gap-1">
                            <p class="text-[10px] text-[#D4AF37] font-bold uppercase tracking-wider">{{ $product->category }}</p>
                            <h3 class="text-white font-bold leading-tight line-clamp-2 min-h-[2.5rem]">
                                {{ $product->name }}
                            </h3>
                            <div class="mt-4 flex items-center justify-between">
                                <span class="text-lg font-black text-white">${{ number_format($product->price, 0) }}</span>
                                <button wire:click="addToCart({{ $product->id }})" class="h-8 w-8 rounded-full bg-[#D4AF37] text-black flex items-center justify-center hover:bg-white transition-transform hover:scale-110 shadow-lg">
                                    <span class="material-symbols-outlined text-base">add</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
                
    <section class="relative py-24 bg-[#0a0a0a] overflow-hidden border-t border-white/5">
    
        <div class="absolute top-0 left-0 w-full h-full overflow-hidden pointer-events-none">
            <div class="absolute top-1/2 left-1/4 w-96 h-96 bg-[#D4AF37]/5 rounded-full blur-[120px] -translate-y-1/2"></div>
            <div class="absolute bottom-0 right-0 w-64 h-64 bg-purple-900/10 rounded-full blur-[100px]"></div>
        </div>

        <div class="container mx-auto px-4 relative z-10 text-center">
            <span class="inline-block py-1 px-3 rounded-full bg-white/5 border border-white/10 text-[#D4AF37] text-xs font-bold uppercase tracking-widest mb-6">
                Experiencia LicUp
            </span>
            
            <h2 class="text-4xl md:text-6xl font-black text-white mb-6 leading-tight">
                Más que una Botella,<br/>
                <span class="text-gray-500">Un Momento Inolvidable.</span>
            </h2>
            
            <p class="text-gray-400 text-lg max-w-2xl mx-auto mb-10 leading-relaxed">
                Desde los clásicos atemporales hasta las joyas ocultas de la destilería moderna. 
                Encuentra el acompañante perfecto para tus celebraciones más importantes.
            </p>
            
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('catalog') }}" class="h-14 px-10 rounded-full bg-white text-black font-bold text-lg hover:bg-[#D4AF37] transition-colors flex items-center justify-center gap-2 shadow-xl shadow-white/5">
                    Ver Colección Completa
                </a>
            </div>
        </div>
    </section>

</main>

