<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">

            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <div class="p-12 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                    <div class="w-64 block mx-auto bg-white">
                        <img src="{{asset('assets/Do-peace-logo.svg')}}" alt="" />
                    </div>
                    <h2 class="text-lg xl:text-2xl xl:leading-snug max-w-xl mx-auto text-center mt-6 font-semibold text-gray-700 dark:text-gray-200">Welcome to DoPeace Learning Center Management Application</h2>
                    <div class="mt-6 flex justify-center">
                        <x-primary-button-link href="{{ route('login') }}" class="px-10 py-4 capitalize">
                            {{ __('Log in your dashboard') }}
                        </x-primary-button-link>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
