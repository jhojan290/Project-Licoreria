<div>
    <div
        x-data="{ show: @entangle('showModal') }"
        x-show="show"
        x-cloak
        x-transition.opacity
        class="fixed inset-0 z-[100] flex items-center justify-center bg-black/80 p-4"
    >
        <div
            @click.away="show = false"
            class="relative w-full max-w-4xl overflow-hidden rounded-2xl bg-[#121212] text-white shadow-2xl flex"
        >
            <button wire:click="close" class="absolute top-4 right-4 text-gray-400 hover:text-white z-10">
                <span class="material-symbols-outlined text-2xl">close</span>
            </button>

            <div class="hidden md:block w-1/2 bg-cover bg-center relative hero-password">
                <div class="absolute inset-0 bg-black/30"></div>
            </div>

            <div class="w-full md:w-1/2 p-8 flex flex-col justify-center min-h-[500px]">

                @if($step === 'request')
                    <div class="text-center md:text-left">
                        <h2 class="text-3xl font-bold mb-2">Restablecer Contraseña</h2>
                        <p class="text-gray-400 mb-8 text-sm">Ingresa tu correo para recibir un enlace de restablecimiento.</p>

                        {{-- CORRECCIÓN AQUÍ: Agregado .prevent --}}
                        <form @submit.prevent="$wire.sendLink()" class="flex flex-col gap-4">
            
                            <label class="flex flex-col gap-1">
                                <input
                                    wire:model="email"
                                    type="email"
                                    placeholder="Correo Electrónico"
                                    class="h-12 px-4 rounded-lg border border-white/10 bg-[#181611] text-sm focus:ring-2 focus:ring-primary/40 focus:outline-none text-white placeholder:text-gray-500"
                                >
                                @error('email') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                            </label>

                            <button
                                type="submit"
                                wire:loading.attr="disabled"
                                class="h-12 rounded-lg bg-primary text-[#121212] text-base font-bold hover:opacity-90 transition mt-2 disabled:opacity-50"
                            >
                                <span wire:loading.remove>Enviar Enlace de Restablecimiento</span>
                                <span wire:loading>Enviando...</span>
                            </button>
                        </form>

                        {{-- RECOMENDACIÓN EXTRA: Agrega type="button" aquí para evitar que este botón active el form por error en algunos navegadores --}}
                        <button type="button" wire:click="close" class="w-full text-center text-gray-400 text-sm mt-6 hover:text-white transition">
                            Volver al Inicio de Sesión
                        </button>
                    </div>
                @endif

                @if($step === 'status')
                    <div class="text-center flex flex-col items-center justify-center h-full">
                        <div class="size-16 rounded-full bg-primary/20 flex items-center justify-center mb-6 text-primary">
                            <span class="material-symbols-outlined text-3xl">mark_email_unread</span>
                        </div>
                        <h2 class="text-3xl font-bold mb-4">Revisa tu Correo Electrónico</h2>
                        <p class="text-gray-400 mb-8 text-sm px-8 leading-relaxed">
                            Hemos enviado un enlace para restablecer la contraseña a <strong>{{ $email }}</strong>. Por favor, revisa tu bandeja de entrada y la carpeta de spam.
                        </p>

                        <button
                            wire:click="close"
                            class="px-8 h-12 rounded-lg bg-primary text-[#121212] text-base font-bold hover:opacity-90 transition"
                        >
                            Volver al Inicio de Sesión
                        </button>
                    </div>
                @endif

            </div>
        </div>
    </div>
</div>