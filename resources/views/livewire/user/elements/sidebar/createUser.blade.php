<div class="w-full h-full flex flex-col p-6 overflow-y-auto custom-scrollbar">

    <div class="flex flex-col items-center text-center gap-5 pt-4 mb-8 flex-shrink-0">
        
        <div class="flex items-center gap-2 mb-1">
            <img src="{{ asset('img/licUp.png') }}" alt="Logo" class="h-8 w-auto opacity-80">
            <span class="text-xl font-bold tracking-tight font-licup text-licup">LicUp</span>
        </div>

        <h1 class="text-3xl sm:text-4xl font-black leading-tight text-white">
            Crea tu Cuenta
        </h1>

        <p class="text-text-secondary-light dark:text-text-secondary-dark text-sm max-w-[260px]">
            Únete a nosotros para disfrutar de beneficios exclusivos.
        </p>
    </div>

    <div class="w-full max-w-sm mx-auto flex-shrink-0">
        <form wire:submit="register" class="flex flex-col gap-5">

            <label class="flex flex-col group">
                <span class="text-xs font-bold uppercase tracking-widest text-gray-500 mb-2 group-focus-within:text-[#D4AF37] transition-colors">
                    Nombre Completo
                </span>
                <div class="relative">
                    <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-gray-500 group-focus-within:text-[#D4AF37] transition-colors">person</span>
                    <input 
                        wire:model="name"
                        type="text"
                        placeholder="Tu nombre"
                        class="w-full h-12 pl-10 pr-4 rounded-xl bg-[#121212] border border-white/10 text-white placeholder:text-gray-600 focus:outline-none focus:border-[#D4AF37] focus:ring-1 focus:ring-[#D4AF37] transition-all"
                    >
                </div>
                @error('name') 
                    <span class="text-red-400 text-xs mt-1 font-bold flex items-center gap-1">
                        <span class="material-symbols-outlined text-sm">error</span> {{ $message }}
                    </span> 
                @enderror
            </label>

            <label class="flex flex-col group">
                <span class="text-xs font-bold uppercase tracking-widest text-gray-500 mb-2 group-focus-within:text-[#D4AF37] transition-colors">
                    Correo Electrónico
                </span>
                <div class="relative">
                    <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-gray-500 group-focus-within:text-[#D4AF37] transition-colors">mail</span>
                    <input 
                        wire:model="email"
                        type="email"
                        placeholder="tu@ejemplo.com"
                        class="w-full h-12 pl-10 pr-4 rounded-xl bg-[#121212] border border-white/10 text-white placeholder:text-gray-600 focus:outline-none focus:border-[#D4AF37] focus:ring-1 focus:ring-[#D4AF37] transition-all"
                    >
                </div>
                @error('email') 
                    <span class="text-red-400 text-xs mt-1 font-bold flex items-center gap-1">
                        <span class="material-symbols-outlined text-sm">error</span> {{ $message }}
                    </span> 
                @enderror
            </label>

            <label class="flex flex-col group" x-data="{ show: false }">
                <span class="text-xs font-bold uppercase tracking-widest text-gray-500 mb-2 group-focus-within:text-[#D4AF37] transition-colors">
                    Contraseña
                </span>
                <div class="relative">
                    <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-gray-500 group-focus-within:text-[#D4AF37] transition-colors">lock</span>
                    <input 
                        wire:model="password"
                        :type="show ? 'text' : 'password'"
                        placeholder="Crea una contraseña"
                        class="w-full h-12 pl-10 pr-10 rounded-xl bg-[#121212] border border-white/10 text-white placeholder:text-gray-600 focus:outline-none focus:border-[#D4AF37] focus:ring-1 focus:ring-[#D4AF37] transition-all"
                    >
                    <button type="button" @click="show = !show" class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-500 hover:text-white focus:outline-none transition-colors">
                        <span class="material-symbols-outlined text-xl" x-text="show ? 'visibility_off' : 'visibility'"></span>
                    </button>
                </div>
                @error('password') 
                    <span class="text-red-400 text-xs mt-1 font-bold flex items-center gap-1">
                        <span class="material-symbols-outlined text-sm">error</span> {{ $message }}
                    </span> 
                @enderror
            </label>

            <label class="flex flex-col group" x-data="{ show: false }">
                <span class="text-xs font-bold uppercase tracking-widest text-gray-500 mb-2 group-focus-within:text-[#D4AF37] transition-colors">
                    Confirmar Contraseña
                </span>
                <div class="relative">
                    <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-gray-500 group-focus-within:text-[#D4AF37] transition-colors">lock_reset</span>
                    <input 
                        wire:model="password_confirmation"
                        :type="show ? 'text' : 'password'"
                        placeholder="Repite tu contraseña"
                        class="w-full h-12 pl-10 pr-10 rounded-xl bg-[#121212] border border-white/10 text-white placeholder:text-gray-600 focus:outline-none focus:border-[#D4AF37] focus:ring-1 focus:ring-[#D4AF37] transition-all"
                    >
                    <button type="button" @click="show = !show" class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-500 hover:text-white focus:outline-none transition-colors">
                        <span class="material-symbols-outlined text-xl" x-text="show ? 'visibility_off' : 'visibility'"></span>
                    </button>
                </div>
            </label>

            <button
                type="submit"
                wire:loading.attr="disabled"
                class="w-full h-14 mt-4 rounded-xl bg-[#D4AF37] text-[#121212] text-lg font-black uppercase tracking-wide hover:bg-white hover:scale-[1.02] active:scale-[0.98] transition-all shadow-lg shadow-yellow-900/20 disabled:opacity-50 disabled:cursor-not-allowed flex items-center justify-center gap-2 group"
            >
                <span wire:loading.remove class="flex items-center gap-2">
                    Crear Cuenta <span class="material-symbols-outlined text-xl group-hover:translate-x-1 transition-transform">person_add</span>
                </span>

                <span wire:loading.flex class="items-center gap-2">
                    <svg class="animate-spin h-5 w-5 text-[#121212]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    <span>Registrando...</span>
                </span>
            </button>

        </form>
    </div>

    <div class="text-center text-sm font-medium pt-8 pb-4 flex-shrink-0">
        <span class="text-gray-500">¿Ya tienes una cuenta?</span>
        <button 
            type="button"
            wire:click="$dispatch('openSidebar', { title: 'Iniciar Sesión', partial: 'login' })"
            class="text-primary hover:underline font-bold bg-transparent border-none cursor-pointer ml-1 focus:outline-none"
        >
            Inicia Sesión
        </button>
    </div>

</div>