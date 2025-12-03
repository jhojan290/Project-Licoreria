<div
    x-data="{ open: @entangle('open') }"
    x-show="open"
    x-cloak
    class="relative z-50"
>
    <div 
        x-show="open"
        x-transition.opacity
        class="fixed inset-0 bg-black/80 backdrop-blur-sm transition-opacity"
    ></div>

    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full items-center justify-center p-4 text-center">
            
            <div 
                x-show="open"
                x-transition:enter="ease-out duration-300"
                x-transition:enter-start="opacity-0 scale-95"
                x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-95"
                @click.away="open = false"
                class="relative transform overflow-hidden rounded-2xl bg-[#121212] border border-white/10 text-left shadow-2xl transition-all sm:my-8 w-full max-w-md p-6"
            >
                
                <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-full bg-red-500/10 mb-4">
                    <span class="material-symbols-outlined text-red-500 text-2xl">warning</span>
                </div>

                <div class="text-center">
                    <h3 class="text-xl font-bold text-white">¿Estás seguro?</h3>
                    <div class="mt-2">
                        <p class="text-sm text-gray-400">
                            Estás a punto de eliminar 
                            
                            {{-- LÓGICA DINÁMICA --}}
                            @if(count($itemIds) > 1)
                                <strong class="text-white">{{ count($itemIds) }} productos</strong>
                            @else
                                este producto
                            @endif

                            permanentemente. Esta acción no se puede deshacer.
                        </p>
                    </div>
                </div>

                <div class="mt-6 flex justify-center gap-3">
                    <button 
                        @click="open = false" 
                        type="button" 
                        class="inline-flex w-full justify-center rounded-lg border border-white/10 bg-white/5 px-4 py-2 text-sm font-bold text-white shadow-sm hover:bg-white/10 transition-colors sm:w-auto"
                    >
                        Cancelar
                    </button>
                    
                    <button 
                        wire:click="confirmDelete" 
                        type="button" 
                        class="inline-flex w-full justify-center rounded-lg bg-red-500 px-4 py-2 text-sm font-bold text-white shadow-sm hover:bg-red-600 transition-colors sm:w-auto"
                    >
                        Sí, Eliminar
                    </button>
                </div>
                
            </div>
        </div>
    </div>
</div>