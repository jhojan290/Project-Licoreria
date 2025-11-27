@extends('layouts.user')

@section('content')
<main class="flex-grow">
    <div class="container mx-auto px-4 py-16 sm:py-24">

        <!-- Título de la página -->
        <div class="text-center mb-16">
            <h2 class="text-4xl sm:text-5xl font-black tracking-tighter text-gray-900 dark:text-white">
                Página de Contacto
            </h2>
            <p class="mt-4 max-w-2xl mx-auto text-lg text-gray-600 dark:text-[#bbb39b]">
                Estamos aquí para ayudarte. Encuentra toda nuestra información de contacto a continuación.
            </p>
        </div>

        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-5 gap-12 lg:gap-16 items-start">

            <!-- Información de contacto -->
            <div class="lg:col-span-3">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">

                    <!-- Teléfonos -->
                    <div class="bg-white/5 border border-white/10 rounded-xl p-6 flex flex-col items-start text-left">
                        <div class="bg-primary/10 text-primary p-3 rounded-lg mb-4">
                            <span class="material-symbols-outlined text-3xl">call</span>
                        </div>
                        <h3 class="text-lg font-bold text-white mb-2">Teléfonos</h3>
                        <p class="text-gray-300">(123) 456-7890</p>
                        <p class="text-gray-300">(123) 456-7891</p>
                    </div>

                    <!-- WhatsApp -->
                    <a href="https://wa.me/11234567892" target="_blank"
                        class="bg-white/5 border border-white/10 rounded-xl p-6 flex flex-col items-start text-left hover:border-primary/50 transition-colors group">
                        <div class="bg-primary/10 text-primary p-3 rounded-lg mb-4">
                            <svg class="h-8 w-8" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12.04 2C6.58 2 2.15 6.43 2.15 11.89c0 1.79.46 3.48 1.34 4.95L2 22l5.3-1.48c1.43.8 3.06 1.25 4.74 1.25c5.46 0 9.89-4.43 9.89-9.89C21.93 6.43 17.5 2 12.04 2zM12.04 20.38c-1.53 0-3-.38-4.32-1.09l-.31-.18l-3.21.89l.9-3.12l-.2-.33c-.8-1.35-1.22-2.91-1.22-4.57c0-4.54 3.69-8.23 8.23-8.23c2.23 0 4.31.86 5.82 2.37c1.51 1.51 2.37 3.59 2.37 5.82c0 4.54-3.69 8.23-8.23 8.23zm4.52-6.55c-.25-.12-1.47-.72-1.7-.82c-.22-.09-.38-.12-.54.12c-.16.25-.64.82-.79.98c-.15.16-.3.18-.54.06c-.25-.12-1.06-.39-2.02-1.25c-.75-.67-1.25-1.5-1.4-1.75c-.15-.25-.02-.38.11-.51c.11-.11.25-.29.37-.43c.12-.15.16-.25.25-.41c.09-.16.04-.3-.02-.43c-.06-.12-.54-1.3-.74-1.78c-.2-.48-.4-.42-.54-.42h-.52c-.16 0-.43.06-.64.3c-.22.25-.82.81-.82 1.98c0 1.17.85 2.29 1 2.44c.15.16 1.66 2.54 4.03 3.55c.59.25 1.05.4 1.41.51c.59.19 1.13.16 1.56.1c.48-.06 1.47-.6 1.68-1.18c.21-.58.21-1.08.15-1.18c-.06-.1-.22-.16-.47-.28z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-white mb-2">WhatsApp</h3>
                        <p class="text-gray-300 group-hover:text-primary transition-colors">+1 (123) 456-7892</p>
                    </a>

                    <!-- Correos electrónicos -->
                    <div class="bg-white/5 border border-white/10 rounded-xl p-6 flex flex-col items-start text-left">
                        <div class="bg-primary/10 text-primary p-3 rounded-lg mb-4">
                            <span class="material-symbols-outlined text-3xl">mail</span>
                        </div>
                        <h3 class="text-lg font-bold text-white mb-2">Correos Electrónicos</h3>
                        <p class="text-gray-300">ventas@spiritshelf.com</p>
                        <p class="text-gray-300">soporte@spiritshelf.com</p>
                    </div>

                    <!-- Horario de atención -->
                    <div class="bg-white/5 border border-white/10 rounded-xl p-6 flex flex-col items-start text-left">
                        <div class="bg-primary/10 text-primary p-3 rounded-lg mb-4">
                            <span class="material-symbols-outlined text-3xl">schedule</span>
                        </div>
                        <h3 class="text-lg font-bold text-white mb-2">Horario de Atención</h3>
                        <p class="text-gray-300">Lunes - Sábado: 10am - 9pm</p>
                        <p class="text-gray-300">Domingo: 12pm - 6pm</p>
                    </div>

                    <!-- Dirección -->
                    <div class="sm:col-span-2 bg-white/5 border border-white/10 rounded-xl p-6 flex flex-col items-start text-left">
                        <div class="bg-primary/10 text-primary p-3 rounded-lg mb-4">
                            <span class="material-symbols-outlined text-3xl">location_on</span>
                        </div>
                        <h3 class="text-lg font-bold text-white mb-2">Dirección</h3>
                        <p class="text-gray-300">123 Whiskey Lane, Vineyard Valley, CA 90210</p>
                    </div>

                    <!-- Redes sociales -->
                    <div class="sm:col-span-2 bg-white/5 border border-white/10 rounded-xl p-6 flex flex-col items-start text-left">
                        <div class="bg-primary/10 text-primary p-3 rounded-lg mb-4">
                            <span class="material-symbols-outlined text-3xl">group</span>
                        </div>
                        <h3 class="text-lg font-bold text-white mb-2">Encuéntranos en nuestras redes sociales</h3>
                        <div class="flex space-x-4 mt-2">
                            <a href="#" class="text-gray-400 hover:text-primary transition-colors">
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                                </svg>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-primary transition-colors">
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <rect height="20" rx="5" ry="5" width="20" x="2" y="2"></rect>
                                    <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                    <line x1="17.5" x2="17.51" y1="6.5" y2="6.5"></line>
                                </svg>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-primary transition-colors">
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-2 flex flex-col gap-8 h-full">
                <!-- Mapa -->
                <div class="bg-white/5 border border-white/10 rounded-xl p-6 flex flex-col h-[437.5px]">
                    <h3 class="text-lg font-bold mb-2 text-gray-900 dark:text-white">Esta es nuestra ubicación</h3>
                    <div class="flex-grow w-full overflow-hidden rounded-lg border border-white/10">
                        <iframe allowfullscreen="" class="w-full h-full" data-location="Beverly Hills, CA" loading="lazy" referrerpolicy="no-referrer-when-downgrade" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3305.719702951593!2d-118.4015703847867!3d34.0513259806066!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c2bc04d6425b7b%3A0x2569f16a08c2a382!2sBeverly%20Hills%2C%20CA%2C%20USA!5e0!3m2!1sen!2suk!4v1678886400000!5m2!1sen!2suk" style="border:0;"></iframe>
                    </div>
                </div>
                <!-- Logo empresa -->
                <div class="flex flex-col items-center justify-center p-8 bg-white/5 border border-white/10 rounded-xl text-center h-[398px]">
                    <svg class="w-32 h-32 text-primary" fill="currentColor" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_6_319_2)"><path d="M8.57829 8.57829C5.52816 11.6284 3.451 15.5145 2.60947 19.7452C1.76794 23.9758 2.19984 28.361 3.85056 32.3462C5.50128 36.3314 8.29667 39.7376 11.8832 42.134C15.4698 44.5305 19.6865 45.8096 24 45.8096C28.3135 45.8096 32.5302 44.5305 36.1168 42.134C39.7033 39.7375 42.4987 36.3314 44.1494 32.3462C45.8002 28.361 46.2321 23.9758 45.3905 19.7452C44.549 15.5145 42.4718 11.6284 39.4217 8.57829L24 24L8.57829 8.57829Z"></path></g><defs><clipPath id="clip0_6_319_2"><rect fill="white" height="48" width="48"></rect></clipPath></defs></svg>
                    <h3 class="text-2xl font-bold mt-4 text-white">The Spirit Shelf</h3>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection