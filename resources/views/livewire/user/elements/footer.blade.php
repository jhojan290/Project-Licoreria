<footer class="bg-[#0a0a0a] border-t border-white/5 mt-auto relative overflow-hidden">
    
    <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-[#D4AF37]/50 to-transparent"></div>

    <div class="container mx-auto px-4 pt-16 pb-8">
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-12">

            <div class="flex flex-col gap-6">
                <a href="/" class="flex items-center gap-3 group w-fit">
                    <img src="{{ asset('img/licUp.png') }}" alt="Logo" class="h-10 w-auto object-contain grayscale group-hover:grayscale-0 transition-all duration-500">
                    <div class="h-8 w-[2px] bg-[#D4AF37] rounded-full opacity-50 group-hover:opacity-100 transition-opacity"></div>
                    <h2 class="text-2xl font-bold tracking-tight font-licup text-white group-hover:text-[#D4AF37] transition-colors">LicUp</h2>
                </a>
                <p class="text-gray-500 text-sm leading-relaxed max-w-xs">
                    Tu destino premium para licores del mundo. Curaduría experta y momentos inolvidables en cada botella.
                </p>
                <div class="flex gap-4">
                    @foreach(['facebook', 'instagram', 'X'] as $social)
                        <a href="#" class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center text-gray-400 hover:bg-[#D4AF37] hover:text-black transition-all hover:-translate-y-1">
                            <img src="https://cdn.simpleicons.org/{{ $social }}/currentColor" class="w-4 h-4 fill-current" alt="{{ $social }}">
                        </a>
                    @endforeach
                </div>
            </div>

            <div>
                <h3 class="text-white font-bold uppercase tracking-widest text-sm mb-6 border-l-2 border-[#D4AF37] pl-3">Explorar</h3>
                <ul class="space-y-3 text-sm text-gray-400">
                    <li><a href="/" class="hover:text-[#D4AF37] transition-colors flex items-center gap-2"><span class="h-px w-3 bg-white/20"></span> Inicio</a></li>
                    <li><a href="{{ route('catalog') }}" class="hover:text-[#D4AF37] transition-colors flex items-center gap-2"><span class="h-px w-3 bg-white/20"></span> Catálogo</a></li>
                    <li><a href="/about" class="hover:text-[#D4AF37] transition-colors flex items-center gap-2"><span class="h-px w-3 bg-white/20"></span> Sobre Nosotros</a></li>
                    <li><a href="/contact" class="hover:text-[#D4AF37] transition-colors flex items-center gap-2"><span class="h-px w-3 bg-white/20"></span> Contacto</a></li>
                </ul>
            </div>

            <div>
                <h3 class="text-white font-bold uppercase tracking-widest text-sm mb-6 border-l-2 border-[#D4AF37] pl-3">Soporte</h3>
                <ul class="space-y-3 text-sm text-gray-400">
                    <li><a href="#" class="hover:text-white transition-colors">Política de Envíos</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Devoluciones</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Términos y Condiciones</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Privacidad</a></li>
                </ul>
            </div>

            <div>
                <h3 class="text-white font-bold uppercase tracking-widest text-sm mb-6 border-l-2 border-[#D4AF37] pl-3">Contacto</h3>
                <ul class="space-y-4 text-sm text-gray-400">
                    <li class="flex items-start gap-3">
                        <span class="material-symbols-outlined text-[#D4AF37] text-lg mt-0.5">location_on</span>
                        <span>Zona G, Bogotá<br>Calle 69a # 4-40</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <span class="material-symbols-outlined text-[#D4AF37] text-lg">call</span>
                        <span>+57 300 123 4567</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <span class="material-symbols-outlined text-[#D4AF37] text-lg">mail</span>
                        <span>soporte@licup.com</span>
                    </li>
                </ul>
            </div>

        </div>

        <div class="border-t border-white/5 my-8"></div>

        <div class="flex flex-col items-center gap-6 text-center">
            
            <div class="inline-flex items-center gap-3 text-gray-500 opacity-60 hover:opacity-100 transition-opacity select-none">
                <span class="material-symbols-outlined text-2xl text-[#D4AF37]">18_up_rating</span>
                <p class="text-[10px] md:text-xs uppercase tracking-widest font-bold max-w-lg leading-relaxed">
                    El exceso de alcohol es perjudicial para la salud. <br class="hidden md:block"> 
                    Prohíbase el expendio de bebidas embriagantes a menores de edad.
                </p>
            </div>

            <p class="text-xs text-gray-600">
                © {{ date('Y') }} LicUp. Todos los derechos reservados. Creado con pasión.
            </p>
        </div>

    </div>
</footer>