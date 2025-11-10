<!DOCTYPE html>
<html class="dark" lang="es">
    <head>
        <meta charset="utf-8"/>
        <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
        <title>@yield('title', 'Licoreria')</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link href="https://fonts.googleapis.com" rel="preconnect"/>
        <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;700;800&amp;display=swap" rel="stylesheet"/>
        <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet"/>
    </head>
    <body class="bg-background-light dark:bg-background-dark font-display">
        <div class="relative flex min-h-screen w-full flex-col overflow-x-hidden">
            <x-navbar />
            @yield('content')
        </div>
    </body>
</html>
