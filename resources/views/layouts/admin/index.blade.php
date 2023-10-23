<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    {{-- <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" /> --}}
     <!-- Scripts -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">
    @vite(['resources/css/app.css', 'resources/sass/app.scss', 'resources/js/app.js', 'resources/js/custom.js'])
</head>
<body>
    <div id="app" class="tinker-pro-pos">
        <header class="border-bottom d-grid">
            @include('layouts.admin.header')
        </header>
        <aside class="border-end">
            @include('layouts.admin.sidebar')
        </aside>
        <main class="py-4 container-fluid">
            @yield('content')
        </main>
        <footer class="border-top bg-white d-flex align-items-center justify-content-between px-3">
            @include('layouts.admin.footer')
        </footer>
    </div>
    @stack('scripts')
</body>
</html>
