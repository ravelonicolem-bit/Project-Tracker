<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard') — {{ config('app.name', 'Project Tracker') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/tracker.js'])
    @stack('scripts')
</head>
<body class="min-h-full bg-gray-50 font-sans text-gray-900 antialiased dark:bg-gray-950 dark:text-gray-100">
    <div class="flex min-h-screen">
        @include('layouts::partials.sidebar')

        <div class="flex flex-1 flex-col lg:pl-64">
            @include('layouts::partials.header')

            <main class="flex-1 p-4 sm:p-6 lg:p-8">
                @include('layouts::partials.toast')

                @yield('content')
            </main>
        </div>
    </div>

    <x-components::delete-modal />

    @include('layouts::partials.mobile-nav')
</body>
</html>
