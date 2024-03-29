<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
      rel="stylesheet"
    />
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="flex items-center min-h-screen p-6 bg-gray-50 dark:bg-gray-900">

            <div
              class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800"
            >
                <div class="flex flex-col overflow-y-auto md:flex-row">
                    @if (isset($image))
                    <div class="h-32 md:h-auto md:w-1/2">
                        {{ $image }}
                    </div>
                    @endif
                    <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
