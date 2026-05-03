<footer class="mt-auto border-t border-white/5 bg-[#121212] py-6">
    <div class="px-4 md:px-10 flex flex-col md:flex-row justify-between items-center gap-6">

        <div class="flex flex-col md:flex-row items-center gap-4 text-center md:text-left">
            <div class="flex items-center gap-2 group cursor-default">
                <img
                    src="{{ asset('img/estanquillo.png') }}"
                    alt="Logo Estanquillo Admin"
                    class="h-10 w-28 object-cover opacity-60 grayscale group-hover:grayscale-0 group-hover:opacity-100 transition-all duration-500"
                    style="object-position: center 45%;"
                >
                {{--
                <img
                    src="{{ asset('img/licUp.png') }}"
                    alt="Estanquillo Fry Admin"
                    class="h-6 w-auto object-contain opacity-50 grayscale group-hover:grayscale-0 group-hover:opacity-100 transition-all duration-500"
                >
                <span class="text-sm font-bold text-gray-600 group-hover:text-[#D4AF37] transition-colors">Estanquillo Fry Admin</span>
                --}}
            </div>

            <span class="hidden md:block text-gray-800">|</span>

            <p class="text-xs text-gray-500">
                &copy; {{ date('Y') }} Estanquillo Fry
                <span class="hidden sm:inline">- Panel de Control</span>
            </p>
        </div>

        <div class="flex flex-col sm:flex-row items-center gap-6">

            <div class="flex gap-6 text-xs font-bold text-gray-500 uppercase tracking-wider">
                <a href="#" class="hover:text-white transition-colors">Soporte</a>
                <a href="#" class="hover:text-white transition-colors">Documentación</a>
            </div>

        </div>

    </div>
</footer>
