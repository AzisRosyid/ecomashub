<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @isset($route)
            @if (strpos($route, 'admin') !== false)
                {{ ucwords(str_replace('admin', 'Admin ', $route)) }}
            @elseif (strpos($route, 'auth') !== false)
                {{ ucwords(str_replace('auth', '', $route)) }}
            @elseif ($route == 'home')
                Home
            @else
                {{ ucwords(str_replace('home', '', $route)) }}
            @endif |
        @endisset
        {{ config('app.name', 'EcomaHub') }}
    </title>
    <link rel="icon" type="image/x-icon" href="{{ Vite::asset('resources/images/logo.png') }}">

    <!-- Scripts -->
    @vite('resources/js/app.js')
</head>

<body id="body" class="font-fredokaRegular">
    @isset($route)
        @if (strpos($route, 'admin') !== false || strpos($route, 'user') !== false)
            @isset($pick)
                <form id="searchForm" action="{{ route($route) }}" method="get">
                @endisset
                <section class="flex">

                    @include('layouts.eco-chat')

                    @include('layouts.sidebar')
                    @yield('content')
                </section>
                @yield('filter')
                @yield('modal')
                @isset($pick)
                </form>
            @endisset
        @else
            @yield('content')
        @endif
    @endisset

    @include('layouts.footer')
    @include('layouts.script')
</body>

</html>
