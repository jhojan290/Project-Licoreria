<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8"/>
        <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
        <title>@yield('title', 'Licoreria')</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link href="https://fonts.googleapis.com" rel="preconnect"/>
        <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
        <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet"/>
        @livewireStyles
    </head>
    <body class="bg-background-dark font-display text-white">
        <div class="relative flex min-h-screen w-full flex-col overflow-x-hidden">
            <livewire:navbar />
            @yield('content')
            <livewire:sidebar />
            <x-footer />
        </div>
        @livewireScripts
    </body>
</html>
