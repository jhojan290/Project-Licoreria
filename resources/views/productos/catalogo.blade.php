@extends('layouts.app')
@section('content')

<!-- Main Content -->
<main class="flex-grow">
    <div class="container mx-auto px-4 py-8 md:py-12">

        <!-- PageHeading -->
        <div class="mb-8">
            <h1 class="text-4xl font-black tracking-tighter text-gray-900 dark:text-white">
                Catálogo de Productos
            </h1>
        </div>

        <!-- Chips / Filters -->
        <div class="mb-8 flex flex-wrap items-center gap-3">
            <button class="flex h-10 shrink-0 items-center justify-center gap-x-2 rounded-lg bg-gray-100 dark:bg-white/5 px-4 text-sm font-medium text-gray-900 dark:text-white hover:bg-gray-200 dark:hover:bg-white/10">
                <span>Tipo de Licor</span>
                <span class="material-symbols-outlined text-base">expand_more</span>
            </button>
            <button class="flex h-10 shrink-0 items-center justify-center gap-x-2 rounded-lg bg-gray-100 dark:bg-white/5 px-4 text-sm font-medium text-gray-900 dark:text-white hover:bg-gray-200 dark:hover:bg-white/10">
                <span>Marca</span>
                <span class="material-symbols-outlined text-base">expand_more</span>
            </button>
            <button class="flex h-10 shrink-0 items-center justify-center gap-x-2 rounded-lg bg-gray-100 dark:bg-white/5 px-4 text-sm font-medium text-gray-900 dark:text-white hover:bg-gray-200 dark:hover:bg-white/10">
                <span>Rango de Precio</span>
                <span class="material-symbols-outlined text-base">expand_more</span>
            </button>
            <div class="ml-auto hidden md:block">
                <button class="flex h-10 shrink-0 items-center justify-center gap-x-2 rounded-lg bg-gray-100 dark:bg-white/5 px-4 text-sm font-medium text-gray-900 dark:text-white hover:bg-gray-200 dark:hover:bg-white/10">
                <span>Ordenar por: Popularidad</span>
                <span class="material-symbols-outlined text-base">expand_more</span>
                </button>
            </div>
        </div>

        <!-- ImageGrid -->
        <div class="grid grid-cols-2 gap-4 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 md:gap-6">

            <!-- Hendrick's Gin -->
            <div class="group relative flex flex-col overflow-hidden rounded-lg border border-transparent bg-background-light dark:bg-white/5 transition-all hover:border-gray-200 dark:hover:border-white/10 hover:shadow-lg">
                <a class="block" href="/productos/details">
                <div class="aspect-[3/4] w-full bg-cover bg-center bg-no-repeat img-hendricks-gin"></div>
                </a>
                <div class="flex flex-1 flex-col p-4">
                    <h3 class="text-base font-bold text-gray-900 dark:text-white">Hendrick's Gin</h3>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Gin</p>
                    <p class="mt-auto pt-2 text-base font-semibold text-gray-800 dark:text-gray-200">$34.99</p>
                </div>
                <button class="absolute bottom-4 right-4 flex h-10 w-10 items-center justify-center rounded-full bg-primary text-background-dark opacity-0 transition-opacity group-hover:opacity-100 hover:bg-yellow-400">
                <span class="material-symbols-outlined text-xl">add_shopping_cart</span>
                </button>
            </div>

            <!-- Jameson -->
            <div class="group relative flex flex-col overflow-hidden rounded-lg border border-transparent bg-background-light dark:bg-white/5 transition-all hover:border-gray-200 dark:hover:border-white/10 hover:shadow-lg">
                <a class="block" href="#">
                <div class="aspect-[3/4] w-full bg-cover bg-center bg-no-repeat img-jameson"></div>
                </a>
                <div class="flex flex-1 flex-col p-4">
                    <h3 class="text-base font-bold text-gray-900 dark:text-white">Jameson Irish Whiskey</h3>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Whiskey</p>
                    <p class="mt-auto pt-2 text-base font-semibold text-gray-800 dark:text-gray-200">$29.99</p>
                </div>
                <button class="absolute bottom-4 right-4 flex h-10 w-10 items-center justify-center rounded-full bg-primary text-background-dark opacity-0 transition-opacity group-hover:opacity-100 hover:bg-yellow-400">
                <span class="material-symbols-outlined text-xl">add_shopping_cart</span>
                </button>
            </div>

            <!-- Casamigos -->
            <div class="group relative flex flex-col overflow-hidden rounded-lg border border-transparent bg-background-light dark:bg-white/5 transition-all hover:border-gray-200 dark:hover:border-white/10 hover:shadow-lg">
                <a class="block" href="#">
                <div class="aspect-[3/4] w-full bg-cover bg-center bg-no-repeat img-casamigos"></div>
                </a>
                <div class="flex flex-1 flex-col p-4">
                    <h3 class="text-base font-bold text-gray-900 dark:text-white">Casamigos Blanco Tequila</h3>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Tequila</p>
                    <p class="mt-auto pt-2 text-base font-semibold text-gray-800 dark:text-gray-200">$49.99</p>
                </div>
                <button class="absolute bottom-4 right-4 flex h-10 w-10 items-center justify-center rounded-full bg-primary text-background-dark opacity-0 transition-opacity group-hover:opacity-100 hover:bg-yellow-400">
                <span class="material-symbols-outlined text-xl">add_shopping_cart</span>
                </button>
            </div>

            <!-- Ketel One -->
            <div class="group relative flex flex-col overflow-hidden rounded-lg border border-transparent bg-background-light dark:bg-white/5 transition-all hover:border-gray-200 dark:hover:border-white/10 hover:shadow-lg">
                <a class="block" href="#">
                <div class="aspect-[3/4] w-full bg-cover bg-center bg-no-repeat img-ketelone"></div>
                </a>
                <div class="flex flex-1 flex-col p-4">
                    <h3 class="text-base font-bold text-gray-900 dark:text-white">Ketel One Vodka</h3>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Vodka</p>
                    <p class="mt-auto pt-2 text-base font-semibold text-gray-800 dark:text-gray-200">$24.99</p>
                </div>
                <button class="absolute bottom-4 right-4 flex h-10 w-10 items-center justify-center rounded-full bg-primary text-background-dark opacity-0 transition-opacity group-hover:opacity-100 hover:bg-yellow-400">
                <span class="material-symbols-outlined text-xl">add_shopping_cart</span>
                </button>
            </div>

            <!-- Bulleit -->
            <div class="group relative flex flex-col overflow-hidden rounded-lg border border-transparent bg-background-light dark:bg-white/5 transition-all hover:border-gray-200 dark:hover:border-white/10 hover:shadow-lg">
                <a class="block" href="#">
                <div class="aspect-[3/4] w-full bg-cover bg-center bg-no-repeat img-bulleit"></div>
                </a>
                <div class="flex flex-1 flex-col p-4">
                    <h3 class="text-base font-bold text-gray-900 dark:text-white">Bulleit Bourbon</h3>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Bourbon</p>
                    <p class="mt-auto pt-2 text-base font-semibold text-gray-800 dark:text-gray-200">$31.99</p>
                </div>
                <button class="absolute bottom-4 right-4 flex h-10 w-10 items-center justify-center rounded-full bg-primary text-background-dark opacity-0 transition-opacity group-hover:opacity-100 hover:bg-yellow-400">
                <span class="material-symbols-outlined text-xl">add_shopping_cart</span>
                </button>
            </div>

            <!-- Don Julio -->
            <div class="group relative flex flex-col overflow-hidden rounded-lg border border-transparent bg-background-light dark:bg-white/5 transition-all hover:border-gray-200 dark:hover:border-white/10 hover:shadow-lg">
                <a class="block" href="#">
                <div class="aspect-[3/4] w-full bg-cover bg-center bg-no-repeat img-donjulio"></div>
                </a>
                <div class="flex flex-1 flex-col p-4">
                    <h3 class="text-base font-bold text-gray-900 dark:text-white">Don Julio 1942</h3>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Tequila</p>
                    <p class="mt-auto pt-2 text-base font-semibold text-gray-800 dark:text-gray-200">$149.99</p>
                </div>
                <button class="absolute bottom-4 right-4 flex h-10 w-10 items-center justify-center rounded-full bg-primary text-background-dark opacity-0 transition-opacity group-hover:opacity-100 hover:bg-yellow-400">
                <span class="material-symbols-outlined text-xl">add_shopping_cart</span>
                </button>
            </div>

            <!-- Macallan -->
            <div class="group relative flex flex-col overflow-hidden rounded-lg border border-transparent bg-background-light dark:bg-white/5 transition-all hover:border-gray-200 dark:hover:border-white/10 hover:shadow-lg">
                <a class="block" href="#">
                <div class="aspect-[3/4] w-full bg-cover bg-center bg-no-repeat img-macallan"></div>
                </a>
                <div class="flex flex-1 flex-col p-4">
                    <h3 class="text-base font-bold text-gray-900 dark:text-white">The Macallan 12 Year</h3>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Scotch Whisky</p>
                    <p class="mt-auto pt-2 text-base font-semibold text-gray-800 dark:text-gray-200">$79.99</p>
                </div>
                <button class="absolute bottom-4 right-4 flex h-10 w-10 items-center justify-center rounded-full bg-primary text-background-dark opacity-0 transition-opacity group-hover:opacity-100 hover:bg-yellow-400">
                <span class="material-symbols-outlined text-xl">add_shopping_cart</span>
                </button>
            </div>

            <!-- Patrón -->
            <div class="group relative flex flex-col overflow-hidden rounded-lg border border-transparent bg-background-light dark:bg-white/5 transition-all hover:border-gray-200 dark:hover:border-white/10 hover:shadow-lg">
                <a class="block" href="#">
                <div class="aspect-[3/4] w-full bg-cover bg-center bg-no-repeat img-patron"></div>
                </a>
                <div class="flex flex-1 flex-col p-4">
                    <h3 class="text-base font-bold text-gray-900 dark:text-white">Patrón Silver</h3>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Tequila</p>
                    <p class="mt-auto pt-2 text-base font-semibold text-gray-800 dark:text-gray-200">$45.99</p>
                </div>
                <button class="absolute bottom-4 right-4 flex h-10 w-10 items-center justify-center rounded-full bg-primary text-background-dark opacity-0 transition-opacity group-hover:opacity-100 hover:bg-yellow-400">
                <span class="material-symbols-outlined text-xl">add_shopping_cart</span>
                </button>
            </div>

            <!-- Grey Goose -->
            <div class="group relative flex flex-col overflow-hidden rounded-lg border border-transparent bg-background-light dark:bg-white/5 transition-all hover:border-gray-200 dark:hover:border-white/10 hover:shadow-lg">
                <a class="block" href="#">
                <div class="aspect-[3/4] w-full bg-cover bg-center bg-no-repeat img-greygoose"></div>
                </a>
                <div class="flex flex-1 flex-col p-4">
                    <h3 class="text-base font-bold text-gray-900 dark:text-white">Grey Goose Vodka</h3>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Vodka</p>
                    <p class="mt-auto pt-2 text-base font-semibold text-gray-800 dark:text-gray-200">$29.99</p>
                </div>
                <button class="absolute bottom-4 right-4 flex h-10 w-10 items-center justify-center rounded-full bg-primary text-background-dark opacity-0 transition-opacity group-hover:opacity-100 hover:bg-yellow-400">
                <span class="material-symbols-outlined text-xl">add_shopping_cart</span>
                </button>
            </div>

            <!-- Johnnie Walker -->
            <div class="group relative flex flex-col overflow-hidden rounded-lg border border-transparent bg-background-light dark:bg-white/5 transition-all hover:border-gray-200 dark:hover:border-white/10 hover:shadow-lg">
                <a class="block" href="#">
                <div class="aspect-[3/4] w-full bg-cover bg-center bg-no-repeat img-johnniewalker"></div>
                </a>
                <div class="flex flex-1 flex-col p-4">
                    <h3 class="text-base font-bold text-gray-900 dark:text-white">Johnnie Walker Black Label</h3>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Scotch Whisky</p>
                    <p class="mt-auto pt-2 text-base font-semibold text-gray-800 dark:text-gray-200">$39.99</p>
                </div>
                <button class="absolute bottom-4 right-4 flex h-10 w-10 items-center justify-center rounded-full bg-primary text-background-dark opacity-0 transition-opacity group-hover:opacity-100 hover:bg-yellow-400">
                <span class="material-symbols-outlined text-xl">add_shopping_cart</span>
                </button>
            </div>

        </div>

        <!-- Pagination -->
        <div class="mt-12 flex items-center justify-center text-gray-900 dark:text-white">
            <a class="flex h-10 w-10 items-center justify-center rounded-lg hover:bg-gray-100 dark:hover:bg-white/5" href="#">
                <span class="material-symbols-outlined">chevron_left</span>
            </a>
            <a class="flex h-10 w-10 items-center justify-center rounded-lg bg-primary text-sm font-bold text-background-dark" href="#">1</a>
            <a class="flex h-10 w-10 items-center justify-center rounded-lg text-sm font-normal hover:bg-gray-100 dark:hover:bg-white/5" href="#">2</a>
            <a class="flex h-10 w-10 items-center justify-center rounded-lg text-sm font-normal hover:bg-gray-100 dark:hover:bg-white/5" href="#">3</a>
            <span class="flex h-10 w-10 items-center justify-center text-sm font-normal">...</span>
            <a class="flex h-10 w-10 items-center justify-center rounded-lg text-sm font-normal hover:bg-gray-100 dark:hover:bg-white/5" href="#">10</a>
            <a class="flex h-10 w-10 items-center justify-center rounded-lg hover:bg-gray-100 dark:hover:bg-white/5" href="#">
                <span class="material-symbols-outlined">chevron_right</span>
            </a>
        </div>

    </div>
</main>


@endsection