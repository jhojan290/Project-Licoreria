<div 
    x-data="{ open: @entangle('open') }" 
    x-cloak
    x-show="open" 
    class="relative z-[60]" {{-- Z-Index alto para estar encima de todo --}}
    aria-labelledby="modal-title" 
    role="dialog" 
    aria-modal="true"
>
    <div 
        x-show="open"
        x-transition:enter="ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 bg-black/80 backdrop-blur-sm transition-opacity"
    ></div>

    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-6">
            
            <div 
                x-show="open"
                x-transition:enter="ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                
                {{-- CLASES VISUALES MEJORADAS: --}}
                {{-- bg-[#181611]: Fondo oscuro corporativo --}}
                {{-- rounded-2xl: Bordes más suaves --}}
                {{-- border-white/10: Borde sutil elegante --}}
                {{-- shadow-2xl: Sombra profunda para que flote --}}
                class="relative transform overflow-hidden rounded-2xl bg-[#181611] border border-white/10 text-left shadow-2xl transition-all w-full sm:max-w-4xl"
                
                @click.away="open = false; $wire.closeModal()" 
            >
                
                <div class="absolute right-4 top-4 z-20">
                    <button 
                        @click="open = false; $wire.closeModal()" 
                        type="button" 
                        class="group rounded-full bg-black/20 p-2 text-gray-400 hover:bg-white/10 hover:text-white focus:outline-none transition-all"
                        title="Cerrar"
                    >
                        <span class="sr-only">Close</span>
                        <span class="material-symbols-outlined text-xl block group-hover:rotate-90 transition-transform duration-300">close</span>
                    </button>
                </div>

                <div class="px-6 py-8 sm:px-10 sm:py-10">
                    @if($view === 'create-prod')
                        <livewire:admin.products.modal.create-prod 
                            :productId="$productId" 
                            wire:key="prod-{{ $productId ?? 'new' }}" 
                        />
                    @endif
                </div>

            </div>
        </div>
    </div>
</div>