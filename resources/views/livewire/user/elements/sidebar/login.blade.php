<div class="w-full min-h-full flex flex-col items-center justify-center px-6 py-12">

    <div class="w-full max-w-md animate-fade-in-up">

        <div class="flex flex-col items-center text-center gap-6 mb-8">

            {{-- MENSAJE DE ÉXITO --}}
            @if ($status)
                <div x-data="{ show: true }" x-show="show"
                    x-transition:enter="transition ease-out duration-500"
                    x-transition:enter-start="opacity-0 transform -translate-y-2 scale-95"
                    x-transition:enter-end="opacity-100 transform translate-y-0 scale-100"
                    class="w-full bg-green-500/10 border border-green-500/20 text-green-400 px-4 py-3 rounded-lg text-sm font-bold mb-4 shadow-[0_0_15px_rgba(34,197,94,0.2)] flex items-center gap-3">
                    <span class="material-symbols-outlined text-lg">check_circle</span>
                    <span class="flex-1 text-left">{{ $status }}</span>
                    <button @click="show = false" class="text-green-600 hover:text-green-300 focus:outline-none">
                        <span class="material-symbols-outlined text-base">close</span>
                    </button>
                </div>
            @endif

            <div class="flex items-center gap-3 group">
                <img src="{{ asset('img/licUp.png') }}" alt="LicUp" class="h-12 w-auto object-contain drop-shadow-lg group-hover:scale-105 transition-transform duration-500">
                <div class="h-10 w-[2px] bg-[#D4AF37] rounded-full opacity-80"></div>
                <h2 class="text-4xl font-black tracking-tighter font-licup text-[#D4AF37]">
                    LicUp
                </h2>
            </div>

            <div>
                <h1 class="text-3xl md:text-4xl font-black text-white tracking-tight mb-2">
                    Bienvenido de Nuevo
                </h1>
                <p class="text-gray-400 text-base">
                    Inicia sesión para continuar tu experiencia.
                </p>
            </div>

        </div>

        <form wire:submit="login" class="flex flex-col gap-6">

            <div class="flex flex-col gap-5">

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
                        />
                    </div>
                    @error('email')
                        <span class="text-red-400 text-xs mt-1 font-bold flex items-center gap-1">
                            <span class="material-symbols-outlined text-sm">error</span> {{ $message }}
                        </span>
                    @enderror
                </label>

                <label class="flex flex-col group" x-data="{ show: false }">
                    <div class="flex justify-between items-center mb-2">
                        <span class="text-xs font-bold uppercase tracking-widest text-gray-500 group-focus-within:text-[#D4AF37] transition-colors">
                            Contraseña
                        </span>
                        <button type="button" wire:click="$dispatch('open-reset-modal')" class="text-xs font-bold text-[#D4AF37] hover:text-white transition-colors focus:outline-none">
                            ¿Olvidaste tu contraseña?
                        </button>
                    </div>
                    
                    <div class="relative">
                        <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-gray-500 group-focus-within:text-[#D4AF37] transition-colors">lock</span>
                        
                        <input
                            wire:model="password"
                            :type="show ? 'text' : 'password'"
                            placeholder="••••••••"
                            class="w-full h-12 pl-10 pr-10 rounded-xl bg-[#121212] border border-white/10 text-white placeholder:text-gray-600 focus:outline-none focus:border-[#D4AF37] focus:ring-1 focus:ring-[#D4AF37] transition-all"
                        />
                        
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

            </div>

            <button
                type="submit"
                wire:loading.attr="disabled"
                wire:target="login"
                class="w-full h-14 mt-2 rounded-xl bg-[#D4AF37] text-[#121212] text-lg font-black uppercase tracking-wide hover:bg-white hover:scale-[1.02] active:scale-[0.98] transition-all shadow-lg shadow-yellow-900/20 disabled:opacity-50 disabled:cursor-not-allowed flex items-center justify-center gap-2 group"
            >
                <span wire:loading.remove wire:target="login" class="flex items-center gap-2">
                    Ingresar <span class="material-symbols-outlined text-xl group-hover:translate-x-1 transition-transform">login</span>
                </span>

                <span wire:loading.flex wire:target="login" class="items-center gap-2">
                    <svg class="animate-spin h-5 w-5 text-[#121212]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    <span>Verificando...</span>
                </span>
            </button>

        </form>

        <div class="text-center mt-8 pt-6 border-t border-white/10">
            <p class="text-gray-500 text-sm mb-3">¿Aún no eres parte del club?</p>
            <button
                type="button"
                wire:click="$dispatch('openSidebar', { title: 'Crear Cuenta', partial: 'createUser' })"
                class="text-white font-bold border border-white/20 hover:border-[#D4AF37] hover:text-[#D4AF37] px-6 py-2.5 rounded-full transition-all text-sm focus:outline-none"
            >
                Crear Cuenta Gratis
            </button>
        </div>

    </div>
</div>