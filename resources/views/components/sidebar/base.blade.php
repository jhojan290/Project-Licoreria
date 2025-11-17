<div 
    id="sidebar"
    class="fixed top-0 right-0 h-full w-[22vw] bg-background-dark text-white shadow-lg
    transition-transform duration-300 ease-in-out z-50 flex flex-col translate-x-full"
>

    <div class="flex items-center justify-between px-4 py-4 border-b border-white/10 shrink-0">
        <h2 id="sidebarTitle" class="text-lg font-semibold mt-3">{{ $title }}</h2>
        <button id="closeSidebar" class="text-gray-400 hover:text-white text-2xl leading-none">&times;</button>
    </div>

    <div id="sidebarContent">
        {{ $slot }}
    </div>

</div>

<div 
    id="overlay"
    class="fixed inset-0 bg-black/50 opacity-0 pointer-events-none transition-opacity duration-300 ease-in-out z-40">
</div>
