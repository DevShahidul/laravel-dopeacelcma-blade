<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />

        <script src="{{asset('assets/js/alpine.min.js')}}" defer></script>
        <script src="{{asset('assets/js/init-alpine.js')}}"></script>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body x-data="data()" class="font-sans antialiased">
        <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
            <!-- Sidebar -->
            @include('layouts.sidebar')

            <div class="flex flex-col flex-1 w-full">
            <!-- Page Heading -->
            @include('layouts.header')

            <!-- Page Content -->
            <main class="h-full overflow-y-auto">
                <div class="px-6 grid">
                    @if (isset($header))
                        {{ $header }}
                    @endif
                    <!-- Beginning contents -->
                    {{ $slot }}
                </div>
            </main>
        </div>
        </div>
    </body>
</html>
