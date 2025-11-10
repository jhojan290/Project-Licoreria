@extends('layouts.app')

@section('content')
<main class="flex-grow">
<!-- HeroSection Component -->
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
        class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-12 px-6 bg-primary text-background-dark text-base font-bold leading-normal tracking-wide hover:bg-yellow-400 transition-colors focus:outline-none focus:ring-4 focus:ring-primary/30"
    >
        <span class="truncate">Ver Colección</span>
    </button>
    </div>
</div>
</section>
</main>
@endsection
