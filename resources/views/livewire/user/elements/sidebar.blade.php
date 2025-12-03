<div 
    x-data="{ partial: @entangle('partial'), open: @entangle('open') }"
    x-cloak
    class="relative z-[60]" {{-- Z-Index alto para tapar el Navbar sticky --}}
>
    <div
        x-show="open"
        x-transition:enter="transform transition ease-out duration-300"
        x-transition:enter-start="translate-x-full"
        x-transition:enter-end="translate-x-0"
        x-transition:leave="transform transition ease-in duration-200"
        x-transition:leave-start="translate-x-0"
        x-transition:leave-end="translate-x-full"
        
        {{-- 
            CLASES RESPONSIVAS ACTUALIZADAS:
            1. w-full: En celular ocupa el 100% (mejor UX táctil).
            2. sm:w-[450px]: En tablet/PC es fijo de 450px (ideal para el carrito).
            3. border-l: Separación sutil en escritorio.
        --}}
        class="fixed top-0 right-0 h-full w-full sm:w-[450px] bg-background-dark border-l border-white/10 text-white shadow-2xl flex flex-col z-[60]"
    >
        
        <div class="flex items-center justify-between px-6 py-5 border-b border-white/10 flex-shrink-0 bg-[#121212]">
            
            <div class="flex items-center gap-3">
                <span class="material-symbols-outlined text-[#D4AF37] text-2xl" x-text="$wire.icon"></span>
                <h2 class="text-xl font-bold tracking-tight text-white" x-text="$wire.title"></h2>
            </div>

            <button wire:click="close" class="group p-1 rounded-full hover:bg-white/10 transition-colors focus:outline-none">
                <span class="material-symbols-outlined text-gray-400 group-hover:text-white text-2xl block">close</span>
            </button>
        </div>

        <div x-show="partial === 'login'" class="flex-1 h-full overflow-hidden relative">
            <livewire:user.elements.sidebar.login :status="$statusMessage" keep-alive />
        </div>

        <div x-show="partial === 'cart'" class="flex-1 h-full overflow-hidden relative">
            <livewire:user.elements.sidebar.cart keep-alive />
        </div>

        <div x-show="partial === 'createUser'" class="flex-1 h-full overflow-hidden relative">
            <livewire:user.elements.sidebar.create-user keep-alive />
        </div>
        
        </div>

    <div 
        x-show="open"
        x-transition:enter="transition-opacity ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition-opacity ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        @click="$wire.close()"
        class="fixed inset-0 bg-black/80 backdrop-blur-sm z-[55]" 
    ></div>
</div>