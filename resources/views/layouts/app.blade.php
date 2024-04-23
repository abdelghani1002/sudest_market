<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js"
        integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script>
    <script>
        // Dark & Light theme
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia(
                '(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>

    @vite(['resources/css/app.css', 'resources/js/theme.js'])
</head>

<body class="font-sans dark:bg-gray-900">
    {{-- Preloader --}}
    <x-preloader />

    @include('components.header')
    <div class="w-full h-14"></div>

    <!-- Cart -->
    <div id="cart" data-dropdown="cart" data-dropdown-hidden="cartbtn" class="hidden z-50 absolute w-2/3 md:w-1/3 lg:w-1/4 right-1 top-16 max-w-xl mx-auto">
        {{-- <x-cart :cart="$cart"/> --}}
    </div>

    <!-- alert -->
    @if (session('success'))
        <p data-icon="success" data-title="Success." class="hidden alert text-green-400 text-center">
            {{ session('success') }}
        </p>
    @elseif (session('error'))
        <p data-icon="error" data-title="Error!" class="hidden alert text-red-400 text-center">
            {{ session('error') }}
        </p>
    @elseif (session('info'))
        <p data-icon="info" data-title="Info!" class="hidden alert text-blue-400 text-center">
            {{ session('info') }}
        </p>
    @endif

    <!-- Page Content -->
    <main class="w-full h-full">
        {{ $slot }}
    </main>

    <x-footer />

    @vite(['resources/js/app.js', 'resources/js/cart.js'])
</body>

</html>
