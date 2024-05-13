<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>

    <!-- Fonts -->

    <!-- Styles -->
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="">
    <div
        class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
        @if (Route::has('login'))
            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                @auth
                    <a href="{{ url('/tasks') }}"
                        class="font-semibold dark:text-white">Tasks</a>
                    <a href="{{ url('/calendar') }}" class="ml-4 font-semibold dark:text-white">Calendar</a>
                @else
                    <a href="{{ route('login') }}"
                        class="font-semibold dark:text-white">Login</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="ml-4 font-semibold dark:text-white">Register</a>
                    @endif
                @endauth
            </div>
        @endif

        <div class="max-w-7xl mx-auto p-6 lg:p-8">
            <div class="flex justify-center">
                <div class="text-center">
                    <h1 class="text-4xl font-bold text-gray-800 dark:text-gray-100">Welcome to {{ config('app.name') }}</h1>
                    <p class="text-lg text-gray-600 dark:text-gray-300">Here you can manage your tasks.</p>
                </div>
            </div>

        </div>
    </div>
</body>

</html>
