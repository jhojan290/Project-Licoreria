<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Recuperar Contraseña - Liquor Store</title>
        <link rel="icon" href="{{ asset('img/LicUp.png') }}" type="image/png">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet"/>
        @livewireStyles
    </head>
    
    <body 
        class="h-screen w-full bg-cover bg-center bg-no-repeat flex items-center justify-center font-display text-white relative hero-guest"
    >
        
        <div class="absolute inset-0 bg-black/60 backdrop-blur-sm"></div>

        <div class="relative z-10 w-full px-4 flex justify-center">
            @yield('content')
        </div>

        @livewireScripts
    </body>
</html>