<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
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


    <!-- Page Content -->
    <main class="w-full h-full">
        {{ $slot }}
    </main>

    @vite(['resources/js/app.js'])
</body>

</html>
