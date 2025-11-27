@extends('layouts.user')
@section('content')
<main class="flex-1 px-4 sm:px-6 lg:px-8 py-10 sm:py-16">
    <div class="mx-auto max-w-3xl flex flex-col gap-8 sm:gap-12">

        <!-- Hero -->
        <div class="@container">
            <div
                class="bg-cover bg-center flex flex-col justify-end overflow-hidden rounded-xl min-h-[320px] sm:min-h-[400px]"
                data-alt="An artful arrangement of premium liquor bottles on dark wooden shelves, softly lit to highlight their amber colors."
                style='background-image: linear-gradient(0deg, rgba(0,0,0,0.5) 0%, rgba(0,0,0,0) 40%), url("https://lh3.googleusercontent.com/aida-public/AB6AXuCFCNCk2q5UDNGsogI78KIGWdd3ewV5w4jpEHn-6OZIPN-jjWq6xCtx68x-F-bwk1BuFVQ3R1tZWzGPdEdWGSsZ9vzScEAmNyYzSFOv7JUL2zFEasZM6MSKulEl2NVgsJ5R0Q-JqPumuWHTWht3dTGmVu1BpCort-SBK-R4JsbsDM9jWpQKLR8lCf618Z4662J4rROMaQ6A-LfAr6BAFCMWfvd5jZV0p3Bmht2RGpyncsZix6JmwJpzye5diwadD3VU60KqfC8KjJ4");'>
                <div class="p-6 sm:p-8">
                    <h1 class="text-white text-4xl sm:text-5xl font-bold leading-tight tracking-tight">
                        Our Heritage in Every Bottle
                    </h1>
                </div>
            </div>
        </div>

        <!-- Text Intro -->
        <div class="space-y-4">
            <p class="text-base font-normal leading-relaxed">
                Welcome to The Spirit House, where a passion for craftsmanship and a dedication to quality converge.
                Our journey began with a simple idea: to create a space where connoisseurs and newcomers alike can
                discover the world's finest spirits, each with a story to tell. We believe that behind every great bottle
                is a history of tradition, innovation, and artistry waiting to be explored.
            </p>
        </div>

        <!-- Mission -->
        <div class="space-y-4">
            <h2 class="text-2xl sm:text-3xl font-bold tracking-tight text-stone-900 dark:text-white">
                Our Mission
            </h2>
            <p class="text-base font-normal leading-relaxed">
                Our mission is to curate an unparalleled collection of spirits from around the globe. We travel,
                we taste, and we connect with distillers to bring you a selection that is both exceptional and authentic.
                We are committed to sharing the unique heritage of every bottle with our community, fostering a culture
                of appreciation, discovery, and responsible enjoyment.
            </p>
        </div>

        <!-- Image -->
        <div class="flex flex-col items-center gap-6 py-8 sm:py-12 border-y border-stone-200 dark:border-stone-800">
            <img
                class="aspect-[3/2] w-full max-w-lg rounded-xl object-cover"
                data-alt="A sepia-toned historical photograph of the original store front from the early 20th century."
                src="https://lh3.googleusercontent.com/aida-public/AB6AXuBg-uXTqETIomKgHEAf_3HPceGlrhTf9XcOml0ilg9P0W6fxUkSNTMX0GtTCoDIWqSdPju7UDxdEPrS6gLPTd2DA1JfnAW0kuaPb0geKBovITiboft1GfrKeH9erH77v8R4Abt0v2zEBFeJKFOaDr4c-FwkqI10fSMmC8N9HEeGHNtILCvT1dNGPAQ1SMfBA-XBRzYYNzHW4jUzCeNuqnOv3V7C06ZAQHU0wAf1x_Tq06ruh-OPbzWaEQwRtbEncF_cN4U3HkrAmR8"
            />
        </div>

        <!-- Values -->
        <div class="space-y-8">
                <div class="space-y-4">
                    <h2 class="text-2xl sm:text-3xl font-bold tracking-tight text-stone-900 dark:text-white">
                    Our Values
                    </h2>
                    <p class="text-base font-normal leading-relaxed">
                    Our principles guide every decision we make, from the spirits we select to the service we provide.
                    They are the foundation of our identity and our promise to you.
                    </p>
                </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 sm:gap-8">
                <div class="flex flex-col gap-2 p-6 rounded-xl bg-stone-200/40 dark:bg-white/5">
                    <h3 class="font-bold text-lg text-stone-900 dark:text-white">Quality</h3>
                    <p class="text-sm leading-relaxed">
                        We seek out spirits of the highest caliber, prioritizing craftsmanship over mass production.
                    </p>
                </div>

                <div class="flex flex-col gap-2 p-6 rounded-xl bg-stone-200/40 dark:bg-white/5">
                    <h3 class="font-bold text-lg text-stone-900 dark:text-white">Community</h3>
                    <p class="text-sm leading-relaxed">
                        We aim to build a welcoming space for enthusiasts to connect, learn, and share their passion.
                    </p>
                </div>

                <div class="flex flex-col gap-2 p-6 rounded-xl bg-stone-200/40 dark:bg-white/5">
                    <h3 class="font-bold text-lg text-stone-900 dark:text-white">Expertise</h3>
                    <p class="text-sm leading-relaxed">
                        Our knowledgeable team is dedicated to helping you find the perfect bottle for any occasion.
                    </p>
                </div>
            </div>

            <blockquote class="border-l-4 border-primary pl-6 sm:pl-8 italic text-lg sm:text-xl text-stone-700 dark:text-stone-400">
                "We don't just sell spirits; we share stories.
                Each bottle is a chapter, and we are its librarians."
            </blockquote>
        </div>

        <!-- CTA -->
        <div class="flex flex-col items-center gap-4 pt-8 text-center">
            <h3 class="text-2xl font-bold tracking-tight text-stone-900 dark:text-white">
                Begin Your Journey
            </h3>
            <p class="max-w-md text-base leading-relaxed">
                Whether you are a seasoned collector or new to the world of spirits,
                we invite you to explore our curated selection and discover your next favorite bottle.
            </p>

            <a
                href="/productos/catalogo"
                class="mt-4 flex max-w-xs items-center justify-center h-12 px-8 rounded-full
                    bg-primary text-black text-base font-bold tracking-wide
                    hover:opacity-90 transition-opacity cursor-pointer">
                Explore Our Collection
            </a>
        </div>

    </div>
</main>
@endsection