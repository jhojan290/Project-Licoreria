@extends('layouts.user')
@section('title', 'Contacto | LicUp')
@section('content')
<main class="flex-grow bg-background-dark min-h-screen font-display">
    
    <div class="relative bg-[#0f0f0f] border-b border-white/5 py-16 md:py-24 overflow-hidden">
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-5"></div>
        <div class="absolute top-0 right-0 w-96 h-96 bg-[#D4AF37]/5 rounded-full blur-[120px] translate-x-1/2 -translate-y-1/2 pointer-events-none"></div>

        <div class="container mx-auto px-4 relative z-10 text-center">
            <span class="text-[#D4AF37] font-bold uppercase tracking-[0.3em] text-xs mb-3 block animate-fade-in-down">
                Visítanos
            </span>
            <h1 class="text-4xl md:text-6xl font-black text-white tracking-tight mb-4 animate-fade-in-up">
                Nuestra Ubicación
            </h1>
            <p class="text-gray-400 max-w-xl mx-auto text-lg animate-fade-in-up delay-100">
                Descubre nuestra boutique de licores premium. Un espacio diseñado para los amantes del buen beber.
            </p>
        </div>
    </div>

    <div class="container mx-auto px-4 py-12 md:py-16">
        
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            <div class="space-y-6 lg:col-span-1 h-fit">
                
                <a href="https://wa.me/573001234567" target="_blank" class="group block bg-gradient-to-br from-[#1E1E1E] to-[#181611] border border-white/10 rounded-2xl p-6 hover:border-[#25D366]/50 transition-all hover:-translate-y-1 relative overflow-hidden shadow-lg">
                    <div class="absolute top-0 right-0 w-20 h-20 bg-[#25D366]/10 rounded-full blur-xl -mr-4 -mt-4 group-hover:bg-[#25D366]/20 transition-colors"></div>
                    <div class="relative z-10 flex items-center gap-4">
                        <div class="w-12 h-12 bg-[#25D366]/10 rounded-full flex items-center justify-center text-[#25D366] group-hover:bg-[#25D366] group-hover:text-white transition-all">
                            <img src="{{ asset('img/wp.png') }}">
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-white mb-0.5">WhatsApp</h3>
                            <p class="text-gray-400 text-xs">Atención inmediata</p>
                            <p class="text-green-400 text-sm font-mono font-bold mt-1">+57 312 743 0067</p>
                        </div>
                    </div>
                </a>

                <div class="bg-[#181611] border border-white/10 rounded-2xl p-6">
                    <div class="flex items-center gap-3 mb-4">
                        <span class="material-symbols-outlined text-[#D4AF37]">schedule</span>
                        <h3 class="text-lg font-bold text-white">Horarios de Atención</h3>
                    </div>
                    <ul class="space-y-3 text-sm text-gray-400">
                        <li class="flex justify-between border-b border-white/5 pb-2">
                            <span>Lunes - Jueves</span>
                            <span class="text-white font-medium">10:00 AM - 8:00 PM</span>
                        </li>
                        <li class="flex justify-between border-b border-white/5 pb-2">
                            <span>Viernes - Sábado</span>
                            <span class="text-white font-medium">10:00 AM - 10:00 PM</span>
                        </li>
                        <li class="flex justify-between">
                            <span>Domingos y Festivos</span>
                            <span class="text-white font-medium">11:00 AM - 6:00 PM</span>
                        </li>
                    </ul>
                </div>

                <div class="bg-[#181611] border border-white/10 rounded-2xl p-6">
                    <div class="flex items-center gap-3 mb-4">
                        <span class="material-symbols-outlined text-[#D4AF37]">business_center</span>
                        <h3 class="text-lg font-bold text-white">Ventas Corporativas</h3>
                    </div>
                    <p class="text-sm text-gray-400 mb-4 leading-relaxed">
                        Para eventos, bodas o pedidos al por mayor, contáctanos directamente a nuestro correo especializado.
                    </p>
                    <a class="flex items-center gap-2 text-white hover:text-[#D4AF37] transition-colors font-medium text-sm">
                        <span class="material-symbols-outlined text-lg">mail</span>
                        jdagudeloadm@gmail.com
                    </a>
                </div>

            </div>

            <div class="lg:col-span-2 space-y-8 flex flex-col">
                
                <div class="bg-[#181611] border border-white/10 rounded-2xl p-8 relative overflow-hidden">
                    <div class="relative z-10 flex flex-col md:flex-row items-center gap-6">
                        <div class="flex-1 text-center md:text-left">
                            <span class="text-[#D4AF37] text-xs font-bold uppercase tracking-widest mb-2 block">Showroom</span>
                            <h2 class="text-2xl font-bold text-white mb-3">Vive la Experiencia LicUp</h2>
                            <p class="text-gray-400 text-sm leading-relaxed mb-4">
                                No somos solo una tienda online. Visita nuestra boutique en Bogotá y disfruta de asesoría personalizada por sommeliers expertos. Contamos con una zona de catas privada y una cava climatizada con las mejores referencias del mundo.
                            </p>
                            <div class="flex flex-wrap gap-4 justify-center md:justify-start">
                                <div class="flex items-center gap-2 text-xs text-gray-300 bg-white/5 px-3 py-1.5 rounded-full">
                                    <span class="material-symbols-outlined text-[#D4AF37] text-sm">wifi</span> Zona WiFi
                                </div>
                                <div class="flex items-center gap-2 text-xs text-gray-300 bg-white/5 px-3 py-1.5 rounded-full">
                                    <span class="material-symbols-outlined text-[#D4AF37] text-sm">local_parking</span> Valet Parking
                                </div>
                                <div class="flex items-center gap-2 text-xs text-gray-300 bg-white/5 px-3 py-1.5 rounded-full">
                                    <span class="material-symbols-outlined text-[#D4AF37] text-sm">wine_bar</span> Zona de Cata
                                </div>
                            </div>
                        </div>
                        <div class="w-full md:w-1/3 h-48 rounded-xl overflow-hidden relative border border-white/10">
                            <img src="https://images.unsplash.com/photo-1569529465841-dfecdab7503b?q=80&w=800&auto=format&fit=crop" class="w-full h-full object-cover opacity-80 hover:scale-110 transition-transform duration-700">
                        </div>
                    </div>
                </div>

                <div class="bg-[#181611] border border-white/10 rounded-2xl p-2 flex-grow min-h-[400px] relative group">
                    <div class="w-full h-full rounded-xl overflow-hidden grayscale hover:grayscale-0 transition-all duration-700 relative">
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3976.812730300718!2d-74.0549276857367!3d4.649735243577853!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3f9a450919f16d%3A0x16196b305d25d2e3!2sZona%20G%2C%20Bogot%C3%A1!5e0!3m2!1ses!2sco!4v1629485928475!5m2!1ses!2sco" 
                            width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                        
                        <div class="absolute top-4 left-4 bg-[#121212]/90 backdrop-blur-md border border-[#D4AF37]/30 px-4 py-2 rounded-lg shadow-xl z-10 pointer-events-none">
                            <p class="text-[#D4AF37] text-[10px] font-bold uppercase tracking-widest">Ubicación Principal</p>
                            <p class="text-white text-sm font-bold">Zona G, Bogotá</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</main>
@endsection