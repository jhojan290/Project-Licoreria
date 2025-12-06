@extends('layouts.user')
@section('title', 'Sobre Nosotros | LicUp')
@section('content')
<main class="flex-grow bg-background-dark font-display overflow-hidden text-gray-300">

    <section class="relative w-full h-[70vh] flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1470337458703-46ad1756a187?q=80&w=2069&auto=format&fit=crop" 
                class="w-full h-full object-cover opacity-40" 
                alt="Bodega de Licores">
            <div class="absolute inset-0 bg-gradient-to-b from-[#121212] via-[#121212]/60 to-[#121212]"></div>
        </div>

        <div class="relative z-10 text-center px-4 max-w-4xl mx-auto">
            <span class="text-[#D4AF37] font-bold tracking-[0.4em] uppercase text-xs md:text-sm mb-4 block animate-fade-in-down">
                Desde 2015
            </span>
            <h1 class="text-5xl md:text-7xl font-black text-white tracking-tight mb-6 leading-tight animate-fade-in-up">
                Guardianes del <br/>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#D4AF37] to-yellow-200">Buen Gusto</span>
            </h1>
            <p class="text-lg md:text-xl text-gray-300 font-light leading-relaxed animate-fade-in-up delay-200">
                No somos solo una tienda de licores. Somos el puente entre las destilerías más antiguas del mundo y tu copa.
            </p>
        </div>
    </section>

    <section class="py-20 container mx-auto px-4 md:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20 items-center">
            
            <div class="relative group order-2 lg:order-1">
                <div class="absolute top-4 -left-4 w-full h-full border-2 border-[#D4AF37]/30 rounded-2xl transition-transform group-hover:translate-x-2 group-hover:-translate-y-2 duration-500"></div>
                <div class="relative rounded-2xl overflow-hidden shadow-2xl">
                    <img src="https://images.unsplash.com/photo-1514362545857-3bc16c4c7d1b?q=80&w=1000&auto=format&fit=crop" 
                        class="w-full h-[500px] object-cover grayscale group-hover:grayscale-0 transition-all duration-700" 
                        alt="Historia">
                </div>
            </div>

            <div class="order-1 lg:order-2">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">El Origen de <span class="text-[#D4AF37]">LicUp</span></h2>
                <div class="space-y-6 text-lg leading-relaxed">
                    <p>
                        Todo comenzó con un viaje a las tierras altas de Escocia. Allí entendimos que el licor no es simplemente una bebida, es **historia líquida**. Es el resultado de generaciones de maestros destiladores perfeccionando un arte.
                    </p>
                    <p>
                        Al regresar, notamos que faltaba algo en el mercado: un lugar que no solo vendiera botellas, sino que **educara y elevara** la experiencia de beber. Así nació LicUp.
                    </p>
                    <p>
                        Lo que empezó como una pequeña colección privada para amigos, hoy se ha convertido en la cava digital más selecta del país, curando más de 500 referencias de los 5 continentes.
                    </p>
                </div>
                
                <div class="mt-8 flex items-center gap-4">
                    <div class="flex -space-x-4">
                        <img class="w-12 h-12 rounded-full border-2 border-[#121212]" src="https://i.pravatar.cc/100?img=33" alt="Fundador">
                        <img class="w-12 h-12 rounded-full border-2 border-[#121212]" src="https://i.pravatar.cc/100?img=12" alt="Fundador">
                        <img class="w-12 h-12 rounded-full border-2 border-[#121212]" src="https://i.pravatar.cc/100?img=59" alt="Fundador">
                    </div>
                    <p class="text-sm text-gray-500 font-medium">Fundado por amantes del licor, <br> para amantes del licor.</p>
                </div>
            </div>

        </div>
    </section>

    <section class="py-24 bg-white/5 border-y border-white/5 relative overflow-hidden">
        <div class="absolute top-0 left-0 w-full h-full opacity-5 bg-[url('https://www.transparenttextures.com/patterns/diagmonds-light.png')]"></div>

        <div class="container mx-auto px-4 relative z-10">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-3xl md:text-5xl font-black text-white mb-4">Nuestra Filosofía</h2>
                <p class="text-xl text-gray-400">Tres pilares que sostienen cada botella que entregamos.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-[#121212] p-8 rounded-2xl border border-white/5 hover:border-[#D4AF37]/50 transition-all duration-300 group hover:-translate-y-2">
                    <div class="w-16 h-16 bg-[#D4AF37]/10 rounded-full flex items-center justify-center mb-6 group-hover:bg-[#D4AF37] transition-colors">
                        <span class="material-symbols-outlined text-3xl text-[#D4AF37] group-hover:text-black">verified_user</span>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-3">Autenticidad Absoluta</h3>
                    <p class="text-gray-400 leading-relaxed">
                        En un mundo de falsificaciones, somos tu refugio seguro. Cada botella proviene directamente del importador oficial o la destilería. Sin intermediarios dudosos.
                    </p>
                </div>

                <div class="bg-[#121212] p-8 rounded-2xl border border-white/5 hover:border-[#D4AF37]/50 transition-all duration-300 group hover:-translate-y-2">
                    <div class="w-16 h-16 bg-[#D4AF37]/10 rounded-full flex items-center justify-center mb-6 group-hover:bg-[#D4AF37] transition-colors">
                        <span class="material-symbols-outlined text-3xl text-[#D4AF37] group-hover:text-black">wine_bar</span>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-3">Curaduría Experta</h3>
                    <p class="text-gray-400 leading-relaxed">
                        No vendemos todo lo que existe. Vendemos lo que vale la pena probar. Nuestro equipo de sommeliers cata y aprueba cada referencia antes de listarla.
                    </p>
                </div>

                <div class="bg-[#121212] p-8 rounded-2xl border border-white/5 hover:border-[#D4AF37]/50 transition-all duration-300 group hover:-translate-y-2">
                    <div class="w-16 h-16 bg-[#D4AF37]/10 rounded-full flex items-center justify-center mb-6 group-hover:bg-[#D4AF37] transition-colors">
                        <span class="material-symbols-outlined text-3xl text-[#D4AF37] group-hover:text-black">rocket_launch</span>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-3">Entrega Impecable</h3>
                    <p class="text-gray-400 leading-relaxed">
                        Entendemos la ansiedad de esperar algo especial. Usamos empaques blindados y logística express para que tu pedido llegue intacto y a tiempo.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-32 container mx-auto px-4 text-center">
        <span class="material-symbols-outlined text-6xl text-[#D4AF37] mb-6 opacity-50">format_quote</span>
        <blockquote class="text-3xl md:text-5xl font-serif font-medium text-white max-w-4xl mx-auto leading-tight italic">
            "El alcohol puede ser el peor enemigo del hombre, pero la Biblia dice que ames a tu enemigo."
        </blockquote>
        <cite class="block mt-8 text-gray-500 font-bold uppercase tracking-widest not-italic text-sm">
            — Frank Sinatra
        </cite>
        <div class="mt-4 text-[#D4AF37] text-xs uppercase tracking-widest font-bold">
            (Y nosotros estamos de acuerdo)
        </div>
    </section>

    <div class="relative py-24 bg-[#D4AF37] text-black overflow-hidden">
        <div class="absolute inset-0 bg-black opacity-5" style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23000000\' fill-opacity=\'1\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>

        <div class="container mx-auto px-4 relative z-10 text-center">
            <h2 class="text-4xl md:text-6xl font-black uppercase tracking-tight mb-6">
                ¿Listo para Brindar?
            </h2>
            <p class="text-xl font-bold mb-10 max-w-2xl mx-auto opacity-80 leading-relaxed">
                Tu próxima botella favorita te está esperando en nuestra cava. <br>
                No dejes para mañana lo que puedes descorchar hoy.
            </p>
            
            <div class="flex justify-center">
                <a href="{{ route('catalog') }}" class="inline-flex h-16 px-12 items-center justify-center rounded-full bg-black text-white font-bold text-xl hover:bg-white hover:text-black transition-all shadow-2xl hover:scale-105 hover:shadow-black/20 gap-3">
                    <span class="material-symbols-outlined text-2xl">storefront</span>
                    Ir al Catálogo
                </a>
            </div>
        </div>
    </div>

</main>
@endsection