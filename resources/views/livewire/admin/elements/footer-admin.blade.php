<footer class="mt-auto border-t border-white/5 bg-[#121212] py-6">
    <div class="px-4 md:px-10 flex flex-col md:flex-row justify-between items-center gap-6">

        <div class="flex flex-col md:flex-row items-center gap-4 text-center md:text-left">
            <div class="flex items-center gap-2 group cursor-default">
                <img 
                    src="{{ asset('img/licUp.png') }}" 
                    alt="LicUp Admin" 
                    class="h-6 w-auto object-contain opacity-50 grayscale group-hover:grayscale-0 group-hover:opacity-100 transition-all duration-500"
                >
                <span class="text-sm font-bold text-gray-600 group-hover:text-[#D4AF37] transition-colors">LicUp Admin</span>
            </div>

            <span class="hidden md:block text-gray-800">|</span>

            <p class="text-xs text-gray-500">
                &copy; {{ date('Y') }} LicUp Inc. 
                <span class="hidden sm:inline">- Panel de Control</span>
            </p>
        </div>

        <div class="flex flex-col sm:flex-row items-center gap-6">
            
            <div class="flex gap-6 text-xs font-bold text-gray-500 uppercase tracking-wider">
                <a href="#" class="hover:text-white transition-colors">Soporte</a>
                <a href="#" class="hover:text-white transition-colors">Documentación</a>
            </div>

            <div class="flex items-center gap-2 bg-white/5 px-3 py-1.5 rounded-full border border-white/5 hover:border-[#D4AF37]/30 transition-colors cursor-help" title="Conexión Estable">
                <span class="relative flex h-2 w-2">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-green-500"></span>
                </span>
                <span class="text-[10px] font-mono text-gray-400">
                    v2.4.0 <span class="text-[#D4AF37]">PRO</span>
                </span>
            </div>

        </div>

    </div>
</footer>