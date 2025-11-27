<div 
    x-data="{ partial: @entangle('partial'), open: @entangle('open') }"
    x-cloak
>
    <!-- Sidebar -->
    <div
        x-show="open"
        x-transition:enter="transform transition ease-out duration-300"
        x-transition:enter-start="translate-x-full"
        x-transition:enter-end="translate-x-0"
        x-transition:leave="transform transition ease-in duration-200"
        x-transition:leave-start="translate-x-0"
        x-transition:leave-end="translate-x-full"
        class="fixed top-0 right-0 h-full w-[22vw] bg-background-dark text-white shadow-lg z-50 flex flex-col"
    >
        <div class="flex items-center justify-between px-4 py-4">
            <h2 class="text-xl font-semibold mt-2" x-text="$wire.title"></h2>

            <button wire:click="close" class="text-gray-400 hover:text-white text-2xl">
                &times;
            </button>
        </div>

        <div x-show="partial === 'login'">
            <livewire:user.elements.sidebar.login keep-alive />
        </div>

        <div x-show="partial === 'cart'">
            <livewire:user.elements.sidebar.cart keep-alive />
        </div>

        <div x-show="partial === 'createUser'">
            <livewire:user.elements.sidebar.create-user keep-alive />
        </div>


    </div>

    <!-- Overlay -->
    <div 
        x-show="open"
        x-transition.opacity
        @click="$wire.close()"
        class="fixed inset-0 bg-black/50 z-40"
    ></div>
</div>
