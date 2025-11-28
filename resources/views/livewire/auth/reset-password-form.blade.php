<div class="w-full max-w-4xl rounded-2xl bg-[#121212] text-white shadow-2xl flex overflow-hidden border border-white/10">

    <div class="hidden md:block w-1/2 bg-cover bg-center" 
        style="background-image: url('https://images.unsplash.com/photo-1470337458703-46ad1756a187?q=80&w=1000&auto=format&fit=crop')">
        <div class="h-full w-full bg-black/40"></div> </div>

    <div class="w-full md:w-1/2 p-8 flex flex-col justify-center py-12">

        @if($statusMessage)
            <div class="text-center">
                <div class="size-16 rounded-full bg-green-500/20 flex items-center justify-center mb-6 mx-auto text-green-500">
                    <span class="material-symbols-outlined text-3xl">check_circle</span>
                </div>
                <h2 class="text-2xl font-bold mb-4">¡Contraseña Restablecida!</h2>
                <p class="text-gray-400 mb-8 text-sm">{{ $statusMessage }}</p>
                <a href="/" class="block w-full text-center py-3 rounded-lg bg-primary text-[#121212] font-bold hover:opacity-90 transition">
                    Ir al Inicio de Sesión
                </a>
            </div>
        @else
            <div class="text-center md:text-left">
                <div class="flex justify-center md:justify-start items-center gap-2 mb-6 opacity-70">
                    <span class="material-symbols-outlined text-primary">liquor</span>
                    <span class="font-bold text-sm tracking-widest">LIQUOR STORE</span>
                </div>

                <h2 class="text-2xl font-bold mb-2">Establecer Nueva Contraseña</h2>
                <p class="text-gray-400 mb-6 text-sm">Crea una contraseña nueva y segura para <br> <span class="text-white">{{ $email }}</span>.</p>

                <form wire:submit="resetPassword" class="flex flex-col gap-4">
                    <input type="hidden" wire:model="token">
                    <input type="hidden" wire:model="email">

                    <label class="flex flex-col gap-1 text-left" x-data="{ show: false }">
                        <span class="text-xs font-bold text-gray-500 uppercase ml-1">Nueva Contraseña</span>
                        <div class="relative flex items-center">
                            <input
                                wire:model="password"
                                :type="show ? 'text' : 'password'"
                                class="w-full h-11 pl-4 pr-10 rounded-lg border border-white/10 bg-[#181611] text-sm focus:ring-2 focus:ring-primary/40 focus:outline-none text-white placeholder:text-gray-600"
                                placeholder="Mínimo 8 caracteres"
                            >
                            <button type="button" @click="show = !show" class="absolute right-3 text-gray-400 hover:text-white">
                                <span class="material-symbols-outlined text-lg" x-text="show ? 'visibility_off' : 'visibility'"></span>
                            </button>
                        </div>
                        @error('password') <span class="text-red-500 text-xs ml-1">{{ $message }}</span> @enderror
                    </label>

                    <label class="flex flex-col gap-1 text-left" x-data="{ show: false }">
                        <span class="text-xs font-bold text-gray-500 uppercase ml-1">Confirmar</span>
                        <div class="relative flex items-center">
                            <input
                                wire:model="password_confirmation"
                                :type="show ? 'text' : 'password'"
                                class="w-full h-11 pl-4 pr-10 rounded-lg border border-white/10 bg-[#181611] text-sm focus:ring-2 focus:ring-primary/40 focus:outline-none text-white placeholder:text-gray-600"
                                placeholder="Repite la contraseña"
                            >
                            <button type="button" @click="show = !show" class="absolute right-3 text-gray-400 hover:text-white">
                                <span class="material-symbols-outlined text-lg" x-text="show ? 'visibility_off' : 'visibility'"></span>
                            </button>
                        </div>
                    </label>

                    <button
                        type="submit"
                        wire:loading.attr="disabled"
                        class="h-12 rounded-lg bg-primary text-[#121212] text-base font-bold hover:opacity-90 transition mt-4 disabled:opacity-50 shadow-lg shadow-primary/20"
                    >
                        <span wire:loading.remove>Cambiar Contraseña</span>
                        <span wire:loading>Procesando...</span>
                    </button>
                </form>
            </div>
        @endif
    </div>
</div>