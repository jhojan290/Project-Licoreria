<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finalizar Compra - LicUp</title>
    <link rel="icon" href="{{ asset('img/licUp.png') }}" type="image/png">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet"/>
    @livewireStyles
</head>
<body class="bg-background-dark font-display text-white min-h-screen flex flex-col">
    
    <div class="flex-grow">
        @yield('content')
    </div>

    <footer class="py-6 border-t border-white/10 bg-[#121212]">
        <div class="container mx-auto px-4 text-center">
            <p class="text-sm text-gray-500">© 2025 LicUp</p>
        </div>
    </footer>

    @livewireScripts
</body>
</html>