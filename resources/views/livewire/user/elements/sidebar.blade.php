<div 
    x-data="{ partial: @entangle('partial'), open: @entangle('open') }"
    x-cloak
>
    <div
        x-show="open"
        x-transition:enter="transform transition ease-out duration-300"
        x-transition:enter-start="translate-x-full"
        x-transition:enter-end="translate-x-0"
        x-transition:leave="transform transition ease-in duration-200"
        x-transition:leave-start="translate-x-0"
        x-transition:leave-end="translate-x-full"
        class="fixed top-0 right-0 h-full w-full sm:w-[400px] md:w-[22vw] bg-background-dark text-white shadow-2xl z-50 flex flex-col"
    >
        <div class="flex items-center justify-between px-6 py-4 flex-shrink-0">
            <h2 class="text-xl font-semibold mt-2" x-text="$wire.title"></h2>

            <button wire:click="close" class="text-gray-400 hover:text-white text-3xl focus:outline-none">
                &times;
            </button>
        </div>

        <div x-show="partial === 'login'" class="flex-1 h-full overflow-hidden">
            <livewire:user.elements.sidebar.login :status="$statusMessage" keep-alive />
        </div>

        <div x-show="partial === 'cart'" class="flex-1 h-full overflow-hidden">
            <livewire:user.elements.sidebar.cart keep-alive />
        </div>

        <div x-show="partial === 'createUser'" class="flex-1 h-full overflow-hidden">
            <livewire:user.elements.sidebar.create-user keep-alive />
        </div>

    </div>

    <div 
        x-show="open"
        x-transition.opacity
        @click="$wire.close()"
        class="fixed inset-0 bg-black/60 z-40 backdrop-blur-sm"
    ></div>
</div>