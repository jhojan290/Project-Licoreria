@extends('layouts.user')

@section('content')
<main class="w-full max-w-5xl mx-auto px-4 py-10">
    <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:gap-12">
        
        <!-- Product Image -->
        <div class="flex items-center justify-center">
            <img
                src="https://lh3.googleusercontent.com/aida-public/AB6AXuAuCui4DuCH0EgXoWSRVYNxBLHvM4SqPXxyZLaB2ZFMrlSIOt6MswU-qppg44VXxuWaiYnsn0lw4VHpgWduBCAHp7NabgzbMCxkr7qg2P13JcqeKSOmO7bZqzEjaVXswEA-PnUGozmbddhm-zxkps6SYQGCSFbFvbiFiXMgjAztNCSP-SQWyD6iG9YhCIAuBevW5KbbS7GRjGJW_3BkXWHE0bp3QNDiRTasxUsDUsTmtUL34uxrO2C-BKgtsfE_gNxq-XLDFrRqAgs"
                alt="Bottle of Ron Diplomático Reserva Exclusiva"
                class="w-auto max-h-[70vh] object-contain"
            />
        </div>

        <!-- Product Details -->
        <div class="flex flex-col justify-center p-6 md:p-8 rounded-xl shadow-lg bg-background-light dark:bg-background-dark dark:shadow-2xl">

            <!-- Title -->
            <div class="flex flex-col gap-2">
                <p class="text-xs font-medium uppercase tracking-wider text-primary">
                    Diplomático
                </p>
                <h1 class="text-2xl md:text-4xl font-black leading-tight tracking-tight text-gray-900 dark:text-white">
                    Ron Diplomático Reserva Exclusiva
                </h1>
            </div>

            <!-- Description -->
            <p class="mt-3 text-sm leading-relaxed text-gray-600 dark:text-gray-300">
                A complex and characterful sipping rum, distilled from molasses in a copper pot still before 12 years of ageing. A favorite of rum connoisseurs.
            </p>

            <!-- Price -->
            <p class="my-5 text-4xl font-bold text-gray-900 dark:text-white">
                $39.99
            </p>

            <!-- Sections -->
            <div class="space-y-4 pt-5 border-t border-gray-200 dark:border-gray-700">

                <!-- Tasting Notes -->
                <div>
                    <h3 class="text-sm font-bold text-gray-900 dark:text-white">Tasting Notes</h3>
                    <p class="mt-1 text-xs text-gray-600 dark:text-gray-300">
                        Opening up with aromas of orange peel, toffee and liquorice, it is smooth on the palate, and follows on with notes of toffee fudge that offers a seductive, long-lasting finish.
                    </p>
                </div>

                <!-- Specifications -->
                <div>
                    <h3 class="text-sm font-bold text-gray-900 dark:text-white">Product Specifications</h3>
                    <ul class="mt-1 list-disc space-y-1 pl-4 text-xs text-gray-600 dark:text-gray-300">
                        <li><strong>ABV:</strong> 40%</li>
                        <li><strong>Volume:</strong> 700ml</li>
                        <li><strong>Origin:</strong> Venezuela</li>
                    </ul>
                </div>
            </div>

            <!-- CTA -->
            <div class="mt-6">
                <button class="flex w-full h-12 items-center justify-center gap-2 px-5 rounded-lg bg-primary text-base font-bold text-gray-900 shadow-sm transition-transform hover:scale-[1.02] active:scale-[0.98]">
                    <span class="material-symbols-outlined">add_shopping_cart</span>
                    Añadir al Carrito
                </button>
            </div>
        </div>
    </div>
</main>

@endsection
