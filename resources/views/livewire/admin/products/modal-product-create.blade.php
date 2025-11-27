<div 
    x-data="{ open: @entangle('open') }" 
    x-cloak
    x-show="open" 
    class="relative z-50" 
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
        class="fixed inset-0 bg-black/80 transition-opacity"
    ></div>

    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-0">
            
            <div 
                x-show="open"
                x-transition:enter="ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                class="relative transform overflow-hidden rounded-xl bg-white dark:bg-[#181611] text-left shadow-xl transition-all sm:my-8 w-full sm:max-w-4xl border border-white/10"
                @click.away="open = false; $wire.closeModal()" 
            >
                
                <div class="absolute right-0 top-0 pr-4 pt-4 z-20">
                    <button @click="open = false; $wire.closeModal()" type="button" class="rounded-md bg-transparent text-gray-400 hover:text-red-500 focus:outline-none transition-colors">
                        <span class="sr-only">Close</span>
                        <span class="text-3xl font-bold">×</span>
                    </button>
                </div>

                <div class="px-6 pb-6 pt-8">
                    @if($view === 'create-prod')
                        <livewire:admin.products.modal.create-prod />
                    @endif

                    @if($view === 'edit-prod')
                        <livewire:admin.products.modal.edit-prod />
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>