@extends('layouts.user')
@section('content')
<main class="flex-1 px-4 sm:px-6 lg:px-8 py-10 sm:py-16">
    <div class="mx-auto max-w-3xl flex flex-col gap-8 sm:gap-12">

        <div class="@container">
            <div
                class="bg-cover bg-center flex flex-col justify-end overflow-hidden rounded-xl min-h-[320px] sm:min-h-[400px]"
                data-alt="Una disposición artística de botellas de licor premium en estantes de madera oscura, suavemente iluminadas para resaltar sus colores ámbar."
                style='background-image: linear-gradient(0deg, rgba(0,0,0,0.5) 0%, rgba(0,0,0,0) 40%), url("https://lh3.googleusercontent.com/aida-public/AB6AXuCFCNCk2q5UDNGsogI78KIGWdd3ewV5w4jpEHn-6OZIPN-jjWq6xCtx68x-F-bwk1BuFVQ3R1tZWzGPdEdWGSsZ9vzScEAmNyYzSFOv7JUL2zFEasZM6MSKulEl2NVgsJ5R0Q-JqPumuWHTWht3dTGmVu1BpCort-SBK-R4JsbsDM9jWpQKLR8lCf618Z4662J4rROMaQ6A-LfAr6BAFCMWfvd5jZV0p3Bmht2RGpyncsZix6JmwJpzye5diwadD3VU60KqfC8KjJ4");'>
                <div class="p-6 sm:p-8">
                    <h1 class="text-white text-4xl sm:text-5xl font-bold leading-tight tracking-tight">
                        Nuestra Herencia en Cada Botella
                    </h1>
                </div>
            </div>
        </div>

        <div class="space-y-4">
            <p class="text-base font-normal leading-relaxed">
                Bienvenido a LicUp, donde la pasión por la artesanía y la dedicación a la calidad convergen.
                Nuestro viaje comenzó con una idea simple: crear un espacio donde conocedores y principiantes por igual puedan
                descubrir los mejores licores del mundo, cada uno con una historia que contar. Creemos que detrás de cada gran botella
                hay una historia de tradición, innovación y arte esperando ser explorada.
            </p>
        </div>

        <div class="space-y-4">
            <h2 class="text-2xl sm:text-3xl font-bold tracking-tight text-stone-900 dark:text-white">
                Nuestra Misión
            </h2>
            <p class="text-base font-normal leading-relaxed">
                Nuestra misión es curar una colección inigualable de licores de todo el mundo. Viajamos,
                probamos y conectamos con destilerías para traerte una selección que es tanto excepcional como auténtica.
                Estamos comprometidos a compartir la herencia única de cada botella con nuestra comunidad, fomentando una cultura
                de apreciación, descubrimiento y disfrute responsable.
            </p>
        </div>

        <div class="flex flex-col items-center gap-6 py-8 sm:py-12 border-y border-stone-200 dark:border-stone-800">
            <img
                class="aspect-[3/2] w-full max-w-lg rounded-xl object-cover"
                data-alt="Una fotografía histórica en tono sepia de la fachada original de la tienda a principios del siglo XX."
                src="https://lh3.googleusercontent.com/aida-public/AB6AXuBg-uXTqETIomKgHEAf_3HPceGlrhTf9XcOml0ilg9P0W6fxUkSNTMX0GtTCoDIWqSdPju7UDxdEPrS6gLPTd2DA1JfnAW0kuaPb0geKBovITiboft1GfrKeH9erH77v8R4Abt0v2zEBFeJKFOaDr4c-FwkqI10fSMmC8N9HEeGHNtILCvT1dNGPAQ1SMfBA-XBRzYYNzHW4jUzCeNuqnOv3V7C06ZAQHU0wAf1x_Tq06ruh-OPbzWaEQwRtbEncF_cN4U3HkrAmR8"
            />
        </div>

        <div class="space-y-8">
                <div class="space-y-4">
                    <h2 class="text-2xl sm:text-3xl font-bold tracking-tight text-stone-900 dark:text-white">
                    Nuestros Valores
                    </h2>
                    <p class="text-base font-normal leading-relaxed">
                    Nuestros principios guían cada decisión que tomamos, desde los licores que seleccionamos hasta el servicio que brindamos.
                    Son la base de nuestra identidad y nuestra promesa hacia ti.
                    </p>
                </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 sm:gap-8">
                <div class="flex flex-col gap-2 p-6 rounded-xl bg-stone-200/40 dark:bg-white/5">
                    <h3 class="font-bold text-lg text-stone-900 dark:text-white">Calidad</h3>
                    <p class="text-sm leading-relaxed">
                        Buscamos licores del más alto calibre, priorizando la artesanía sobre la producción en masa.
                    </p>
                </div>

                <div class="flex flex-col gap-2 p-6 rounded-xl bg-stone-200/40 dark:bg-white/5">
                    <h3 class="font-bold text-lg text-stone-900 dark:text-white">Comunidad</h3>
                    <p class="text-sm leading-relaxed">
                        Aspiramos a construir un espacio acogedor para que los entusiastas conecten, aprendan y compartan su pasión.
                    </p>
                </div>

                <div class="flex flex-col gap-2 p-6 rounded-xl bg-stone-200/40 dark:bg-white/5">
                    <h3 class="font-bold text-lg text-stone-900 dark:text-white">Experiencia</h3>
                    <p class="text-sm leading-relaxed">
                        Nuestro equipo experto está dedicado a ayudarte a encontrar la botella perfecta para cualquier ocasión.
                    </p>
                </div>
            </div>

            <blockquote class="border-l-4 border-primary pl-6 sm:pl-8 italic text-lg sm:text-xl text-stone-700 dark:text-stone-400">
                "No solo vendemos licores; compartimos historias.
                Cada botella es un capítulo, y nosotros somos sus bibliotecarios."
            </blockquote>
        </div>

        <div class="flex flex-col items-center gap-4 pt-8 text-center">
            <h3 class="text-2xl font-bold tracking-tight text-stone-900 dark:text-white">
                Comienza Tu Viaje
            </h3>
            <p class="max-w-md text-base leading-relaxed">
                Ya seas un coleccionista experimentado o nuevo en el mundo de los licores,
                te invitamos a explorar nuestra selección curada y descubrir tu próxima botella favorita.
            </p>

            <a
                href="/productos/catalogo"
                class="mt-4 flex max-w-xs items-center justify-center h-12 px-8 rounded-full
                    bg-primary text-black text-base font-bold tracking-wide
                    hover:opacity-90 transition-opacity cursor-pointer">
                Explora Nuestra Colección
            </a>
        </div>

    </div>
</main>
@endsection