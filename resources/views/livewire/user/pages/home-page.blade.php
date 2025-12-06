@section('title', 'Inicio | LicUp')

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

    <section class="py-20 container mx-auto px-4 relative" x-data="{ 
        scroll(direction) {
            const container = $refs.catSlider;
            // CAMBIO: Ahora nos movemos el ancho exacto de la pantalla visible menos un margen
            // para que el usuario vea un pedacito del anterior y no se pierda.
            const scrollAmount = container.clientWidth * 0.85; 
            
            if (direction === 'left') {
                container.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
            } else {
                const maxScroll = container.scrollWidth - container.clientWidth;
                
                // Si estamos muy cerca del final (margen de 20px), volvemos al inicio
                if (container.scrollLeft >= maxScroll - 20) {
                    container.scrollTo({ left: 0, behavior: 'smooth' });
                } else {
                    container.scrollBy({ left: scrollAmount, behavior: 'smooth' });
                }
            }
        }
    }">
        <div class="flex justify-between items-end mb-8">
            <div>
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-3">Explora por Categoría</h2>
                <div class="h-1 w-20 bg-[#D4AF37] rounded-full"></div>
            </div>

            <div class="flex gap-2">
                <button @click="scroll('left')" class="h-10 w-10 rounded-full border border-white/10 bg-white/5 text-white hover:bg-[#D4AF37] hover:text-black hover:border-[#D4AF37] flex items-center justify-center transition-all active:scale-95">
                    <span class="material-symbols-outlined">arrow_back</span>
                </button>
                <button @click="scroll('right')" class="h-10 w-10 rounded-full border border-white/10 bg-white/5 text-white hover:bg-[#D4AF37] hover:text-black hover:border-[#D4AF37] flex items-center justify-center transition-all active:scale-95">
                    <span class="material-symbols-outlined">arrow_forward</span>
                </button>
            </div>
        </div>

        <div class="flex overflow-x-auto gap-4 pb-4 snap-x snap-mandatory scroll-smooth no-scrollbar" 
            x-ref="catSlider"
            style="scrollbar-width: none; -ms-overflow-style: none;">
            
            <style>div[x-ref="catSlider"]::-webkit-scrollbar { display: none; }</style>

            @php
                $categories = [
                    ['name' => 'Whiskey', 'img' => 'https://images.unsplash.com/photo-1527281400683-1aae777175f8?auto=format&fit=crop&w=400'],
                    ['name' => 'Ron', 'img' => 'https://images.unsplash.com/photo-1614313511387-1436a4480ebb?auto=format&fit=crop&w=400'],
                    ['name' => 'Ginebra', 'img' => 'https://images.unsplash.com/photo-1583225556361-bba423e3a21c?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D=400'],
                    ['name' => 'Brandy', 'img' => 'https://images.unsplash.com/photo-1734857840011-ce0b78545404?q=80&w=687&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D=400'],
                    ['name' => 'Vodka', 'img' => 'https://images.unsplash.com/photo-1550985543-f47f38aeee65?q=80&w=1935&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D=400'],
                    ['name' => 'Tequila', 'img' => 'https://images.unsplash.com/photo-1516535794938-6063878f08cc?auto=format&fit=crop&w=400'],
                    ['name' => 'Vino', 'img' => 'https://images.unsplash.com/photo-1606657765076-44154cfec14d?q=80&w=1977&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D=400'],
                    ['name' => 'Cerveza', 'img' => 'https://images.unsplash.com/photo-1618885472179-5e474019f2a9?auto=format&fit=crop&w=400&q=80'],
                    ['name' => 'Aguardiente', 'img' => 'https://images.unsplash.com/photo-1635247187043-05ef00152506?fm=jpg&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTF8fHNob3QlMjBnbGFzc3xlbnwwfHwwfHx8MA%3D%3D&ixlib=rb-4.1.0&q=60&w=400'],
                ];
            @endphp

            @foreach($categories as $cat)
                <a href="{{ route('catalog', ['category' => $cat['name']]) }}" class="flex-shrink-0 w-48 md:w-56 group relative h-72 rounded-2xl overflow-hidden cursor-pointer snap-center border border-white/5 hover:border-[#D4AF37]/50 transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                    
                    <img src="{{ $cat['img'] }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110 opacity-70 group-hover:opacity-100">
                    
                    <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/20 to-transparent"></div>
                    
                    <div class="absolute bottom-0 w-full p-4 text-center">
                        <p class="text-white text-lg font-bold uppercase tracking-widest group-hover:text-[#D4AF37] transition-colors transform translate-y-2 group-hover:translate-y-0 duration-300">
                            {{ $cat['name'] }}
                        </p>
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
    
        <div class="mb-12">
            <span class="text-[#D4AF37] uppercase tracking-widest text-sm font-bold mb-2 block">Inspiración</span>
            <h2 class="text-4xl font-black text-white mb-4">¿Para qué es la ocasión?</h2>
            
            <p class="text-gray-400 max-w-2xl text-lg leading-relaxed border-l-2 border-[#D4AF37]/50 pl-4">
                Hemos seleccionado las mejores opciones basándonos en precio y categoría para tu momento especial.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 h-[500px] md:h-[400px]">
            
            <a href="{{ route('catalog', ['occasion' => 'gift']) }}" class="group relative rounded-2xl overflow-hidden h-full cursor-pointer border border-white/5 hover:border-[#D4AF37]/50 transition-all">
                <img src="https://images.unsplash.com/photo-1513558161293-cdaf765ed2fd?auto=format&fit=crop&w=600" 
                    class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110 opacity-60 group-hover:opacity-80">
                
                <div class="absolute inset-0 bg-gradient-to-t from-black via-black/20 to-transparent"></div>
                
                <div class="absolute bottom-6 left-6 z-10">
                    <div class="w-10 h-1 bg-[#D4AF37] mb-3 rounded-full"></div>
                    <h3 class="text-2xl font-bold text-white mb-1 group-hover:text-[#D4AF37] transition-colors">Para Regalar</h3>
                    <p class="text-gray-300 text-sm font-medium">Selección Premium & Lujo</p>
                </div>
            </a>

            <a href="{{ route('catalog', ['occasion' => 'party']) }}" class="group relative rounded-2xl overflow-hidden h-full md:col-span-2 cursor-pointer border border-white/5 hover:border-[#D4AF37]/50 transition-all">
                <img src="https://images.unsplash.com/photo-1516997121675-4c2d1684aa3e?auto=format&fit=crop&w=1200" 
                    class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110 opacity-60 group-hover:opacity-80">
                
                <div class="absolute inset-0 bg-gradient-to-t from-black via-black/20 to-transparent"></div>
                
                <div class="absolute bottom-6 left-6 z-10">
                    <div class="w-10 h-1 bg-[#D4AF37] mb-3 rounded-full"></div>
                    <h3 class="text-2xl font-bold text-white mb-1 group-hover:text-[#D4AF37] transition-colors">Celebración & Fiesta</h3>
                    <p class="text-gray-300 text-sm font-medium">Los infaltables de la noche</p>
                </div>
            </a>

        </div>
    </section>

    <section class="py-20 bg-[#181611] border-y border-white/5">
        <div class="container mx-auto px-4">
            <div class="flex flex-col lg:flex-row gap-12 items-center">
                <div class="lg:w-1/2">
                    <span class="text-[#D4AF37] font-bold uppercase tracking-widest text-sm mb-2 block">LicUp</span>
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

    <section class="py-20 container mx-auto px-4 overflow-hidden relative group">
    
        <div class="flex justify-between items-end mb-8 px-2">
            <div>
                <h2 class="text-3xl font-bold text-white">Tendencias</h2>
                <p class="text-gray-500 mt-1">Lo que todos están buscando</p>
            </div>
            <a href="{{ route('catalog') }}" class="text-[#D4AF37] hover:text-white transition-colors text-sm font-bold flex items-center gap-1">
                Ver Todo <span class="material-symbols-outlined text-lg">arrow_forward</span>
            </a>
        </div>

        <div class="relative w-full overflow-hidden [mask-image:_linear-gradient(to_right,transparent_0,_black_128px,_black_calc(100%-128px),transparent_100%)]">
            
            <div class="flex gap-6 w-max animate-infinite-scroll hover:[animation-play-state:paused]">
                
                @foreach($this->recommendedProducts as $product)
                    @include('livewire.user.partials.product-card', ['product' => $product])
                @endforeach

                @foreach($this->recommendedProducts as $product)
                    @include('livewire.user.partials.product-card', ['product' => $product])
                @endforeach

            </div>
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


