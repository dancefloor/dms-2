<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    @livewireStyles

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.0/dist/alpine.js" defer></script>

    {{ $head ?? '' }}

</head>

<body class="font-sans antialiased">

    @if (session()->has('success'))
    <x-partials.flash-message />
    @endif

    <div class="h-screen flex overflow-hidden bg-white"
        x-data="{ showMobileSidebar: false, slideOver:false, openMenu: false, SlideOverMenu: false}">
        <x-layouts.slide-over-sidebar-nav />
        <!-- Off-canvas menu for mobile, show/hide based on off-canvas menu state. -->
        <x-layouts.sidebar />
        <!-- Main column -->
        <div class="flex flex-col w-0 flex-1 overflow-hidden">
            <!-- Search header -->
            <x-layouts.navbar />
            <main class="flex-1 relative z-0 overflow-y-auto focus:outline-none bg-gray-100" tabindex="0">
                {{ $header }}

                {{ $slot }}
            </main>
        </div>
    </div>
    @stack('modals')

    @livewireScripts
</body>

</html>