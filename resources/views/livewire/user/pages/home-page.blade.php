@extends('layouts.user')

@section('content')
<main class="flex-grow">
<!-- Banner Section -->
    <section class="container mx-auto px-4 py-12 md:py-16 lg:py-20">
        <div class="@container">
            <div class="hero-bg flex min-h-[500px] md:min-h-[600px] flex-col gap-6 items-start justify-end px-6 pb-10 sm:px-10 sm:pb-12 md:px-16 md:pb-16">
                <div class="flex flex-col gap-4 text-left max-w-2xl">
                    <h1 class="text-white text-4xl font-black leading-tight tracking-tighter @[480px]:text-5xl @[768px]:text-6xl">
                    Colecciones Exclusivas de Temporada
                    </h1>

                    <p class="text-white/90 text-base font-normal leading-relaxed @[480px]:text-lg">
                    Descubre selecciones premium para el conocedor exigente.
                    </p>
                </div>

                <button
                    onclick="window.location.href='/productos/catalogo'"
                    class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-12 px-6 bg-primary text-background-dark text-base font-bold leading-normal tracking-wide hover:bg-yellow-400 transition-colors focus:outline-none focus:ring-4 focus:ring-primary/30">
                    <a href="/productos/catalogo"></a>
                    <span class="truncate">Ver Colección</span>
                </button>
            </div>
        </div>
    </section>
</main>

<div class="layout-container flex h-full grow flex-col">
    <main class="flex flex-1 justify-center py-5">
        <div class="layout-content-container flex flex-col w-full max-w-[83vw] px-4 md:px-8">

            <!-- Section: Categorías Rápidas -->
            <section class="w-full py-8 md:py-12">
                <h2 class="text-slate-900 dark:text-white text-2xl md:text-3xl font-bold leading-tight tracking-tight px-4 pb-6">
                    Categorías Rápidas
                </h2>

                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4 p-4">

                    <!-- Whisky -->
                    <div class="flex flex-col items-center gap-3 group cursor-pointer">
                        <div class="relative w-full aspect-square rounded-full overflow-hidden transition-transform duration-300 group-hover:scale-105">
                            <div class="bg-cat-whisky"
                                data-alt="A close-up of whisky in a glass with ice cubes">
                            </div>
                        </div>
                        <p class="text-slate-900 dark:text-white text-base font-bold leading-tight text-center">
                            Whisky
                        </p>
                    </div>

                    <!-- Ron -->
                    <div class="flex flex-col items-center gap-3 group cursor-pointer">
                        <div class="relative w-full aspect-square rounded-full overflow-hidden transition-transform duration-300 group-hover:scale-105">
                            <div class="bg-cat-ron"
                                data-alt="A bottle of rum next to a glass with a lime wedge">
                            </div>
                        </div>
                        <p class="text-slate-900 dark:text-white text-base font-bold leading-tight text-center">
                            Ron
                        </p>
                    </div>

                    <!-- Gin -->
                    <div class="flex flex-col items-center gap-3 group cursor-pointer">
                        <div class="relative w-full aspect-square rounded-full overflow-hidden transition-transform duration-300 group-hover:scale-105">
                            <div class="bg-cat-gin"
                                data-alt="A gin and tonic cocktail with a sprig of rosemary">
                            </div>
                        </div>
                        <p class="text-slate-900 dark:text-white text-base font-bold leading-tight text-center">
                            Gin
                        </p>
                    </div>

                    <!-- Tequila -->
                    <div class="flex flex-col items-center gap-3 group cursor-pointer">
                        <div class="relative w-full aspect-square rounded-full overflow-hidden transition-transform duration-300 group-hover:scale-105">
                            <div class="bg-cat-tequila"
                                data-alt="A shot of tequila with salt and a lime slice">
                            </div>
                        </div>
                        <p class="text-slate-900 dark:text-white text-base font-bold leading-tight text-center">
                            Tequila
                        </p>
                    </div>

                    <!-- Vino -->
                    <div class="flex flex-col items-center gap-3 group cursor-pointer">
                        <div class="relative w-full aspect-square rounded-full overflow-hidden transition-transform duration-300 group-hover:scale-105">
                            <div class="bg-cat-vino"
                                data-alt="A glass of red wine against a vineyard background">
                            </div>
                        </div>
                        <p class="text-slate-900 dark:text-white text-base font-bold leading-tight text-center">
                            Vino
                        </p>
                    </div>

                    <!-- Cerveza -->
                    <div class="flex flex-col items-center gap-3 group cursor-pointer">
                        <div class="relative w-full aspect-square rounded-full overflow-hidden transition-transform duration-300 group-hover:scale-105">
                            <div class="bg-cat-cerveza"
                                data-alt="A frosty mug of light beer">
                            </div>
                        </div>
                        <p class="text-slate-900 dark:text-white text-base font-bold leading-tight text-center">
                            Cerveza
                        </p>
                    </div>

                </div>
            </section>

            <!--Section: Licores Recomendados-->

            <section class="w-full py-8 md:py-12">
                <h2 class="text-slate-900 dark:text-white text-2xl md:text-3xl font-bold leading-tight tracking-tight px-4 pb-6">
                    Licores Recomendados
                </h2>

                <div class="flex overflow-x-auto [-ms-scrollbar-style:none] [scrollbar-width:none] [&::-webkit-scrollbar]:hidden">
                    <div class="flex items-stretch p-4 gap-4 md:gap-6">
                        <!-- Card 1 -->
                        <div class="flex h-full flex-col gap-4 rounded-xl bg-white/50 dark:bg-white/5 shadow-sm min-w-64 md:min-w-72 group">
                            <div
                            class="w-full bg-center bg-no-repeat aspect-square bg-contain bg-white dark:bg-zinc-800 rounded-lg flex flex-col p-4 transition-transform duration-300 group-hover:scale-105 bg-prod-whisky"
                            data-alt="A bottle of Johnnie Walker Black Label whisky">
                            </div>

                            <div class="flex flex-col flex-1 justify-between p-4 pt-0 gap-4">
                                <div>
                                    <p class="text-slate-900 dark:text-white text-base font-bold leading-normal">
                                    Johnnie Walker Black Label
                                    </p>
                                    <p class="text-slate-600 dark:text-slate-400 text-sm leading-normal">
                                    Scotch Whisky - $55.00
                                    </p>
                                </div>
                                <button class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center rounded-lg h-10 px-4 bg-primary text-slate-900 text-sm font-bold tracking-wide transition-colors hover:bg-primary/90">
                                    <span class="truncate">Add to Cart</span>
                                </button>
                            </div>
                        </div>
                        <!-- Card 2 -->
                        <div class="flex h-full flex-col gap-4 rounded-xl bg-white/50 dark:bg-white/5 shadow-sm min-w-64 md:min-w-72 group">
                            <div
                            class="w-full bg-center bg-no-repeat aspect-square bg-contain bg-white dark:bg-zinc-800 rounded-lg flex flex-col p-4 transition-transform duration-300 group-hover:scale-105 bg-prod-ron"
                            data-alt="A bottle of Havana Club Añejo 7 Años rum">
                            </div>

                            <div class="flex flex-col flex-1 justify-between p-4 pt-0 gap-4">
                                <div>
                                    <p class="text-slate-900 dark:text-white text-base font-bold leading-normal">
                                    Havana Club Añejo 7 Años
                                    </p>
                                    <p class="text-slate-600 dark:text-slate-400 text-sm leading-normal">
                                    Ron - $42.00
                                    </p>
                                </div>

                                <button class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center rounded-lg h-10 px-4 bg-primary text-slate-900 text-sm font-bold tracking-wide transition-colors hover:bg-primary/90">
                                    <span class="truncate">Add to Cart</span>
                                </button>
                            </div>
                        </div>
                        <!-- Card 3 -->
                        <div class="flex h-full flex-col gap-4 rounded-xl bg-white/50 dark:bg-white/5 shadow-sm min-w-64 md:min-w-72 group">
                            <div
                            class="w-full bg-center bg-no-repeat aspect-square bg-contain bg-white dark:bg-zinc-800 rounded-lg flex flex-col p-4 transition-transform duration-300 group-hover:scale-105 bg-prod-gin"
                            data-alt="A bottle of Tanqueray London Dry Gin">
                            </div>

                            <div class="flex flex-col flex-1 justify-between p-4 pt-0 gap-4">
                                <div>
                                    <p class="text-slate-900 dark:text-white text-base font-bold leading-normal">
                                    Tanqueray London Dry Gin
                                    </p>
                                    <p class="text-slate-600 dark:text-slate-400 text-sm leading-normal">
                                    Gin - $38.00
                                    </p>
                                </div>

                                <button class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center rounded-lg h-10 px-4 bg-primary text-slate-900 text-sm font-bold tracking-wide transition-colors hover:bg-primary/90">
                                    <span class="truncate">Add to Cart</span>
                                </button>
                            </div>
                        </div>
                        <!-- Card 4 -->
                        <div class="flex h-full flex-col gap-4 rounded-xl bg-white/50 dark:bg-white/5 shadow-sm min-w-64 md:min-w-72 group">
                            <div
                            class="w-full bg-center bg-no-repeat aspect-square bg-contain bg-white dark:bg-zinc-800 rounded-lg flex flex-col p-4 transition-transform duration-300 group-hover:scale-105 bg-prod-tequila"
                            data-alt="A bottle of Don Julio Reposado tequila">
                            </div>

                            <div class="flex flex-col flex-1 justify-between p-4 pt-0 gap-4">
                                <div>
                                    <p class="text-slate-900 dark:text-white text-base font-bold leading-normal">
                                    Don Julio Reposado
                                    </p>
                                    <p class="text-slate-600 dark:text-slate-400 text-sm leading-normal">
                                    Tequila - $65.00
                                    </p>
                                </div>

                                <button class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center rounded-lg h-10 px-4 bg-primary text-slate-900 text-sm font-bold tracking-wide transition-colors hover:bg-primary/90">
                                    <span class="truncate">Add to Cart</span>
                                </button>
                            </div>
                        </div>
                        <!-- Card 5 -->
                        <div class="flex h-full flex-col gap-4 rounded-xl bg-white/50 dark:bg-white/5 shadow-sm min-w-64 md:min-w-72 group">
                            <div
                            class="w-full bg-center bg-no-repeat aspect-square bg-contain bg-white dark:bg-zinc-800 rounded-lg flex flex-col p-4 transition-transform duration-300 group-hover:scale-105 bg-prod-tequila"
                            data-alt="A bottle of Don Julio Reposado tequila">
                            </div>

                            <div class="flex flex-col flex-1 justify-between p-4 pt-0 gap-4">
                                <div>
                                    <p class="text-slate-900 dark:text-white text-base font-bold leading-normal">
                                    Don Julio Reposado
                                    </p>
                                    <p class="text-slate-600 dark:text-slate-400 text-sm leading-normal">
                                    Tequila - $65.00
                                    </p>
                                </div>

                                <button class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center rounded-lg h-10 px-4 bg-primary text-slate-900 text-sm font-bold tracking-wide transition-colors hover:bg-primary/90">
                                    <span class="truncate">Add to Cart</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Section: Age Restriction -->
            <section class="w-full py-8 md:py-12">
                <div class="flex items-center justify-center gap-4 rounded-xl bg-primary/20 dark:bg-primary/10 p-4 md:p-6">
                    <span class="material-symbols-outlined text-primary text-4xl">error</span>
                    <p class="text-slate-900 dark:text-white text-base md:text-lg font-bold leading-normal text-center">Venta exclusiva para mayores de 18 años.</p>
                </div>
            </section>
        </div>
    </main>
</div>

@endsection
