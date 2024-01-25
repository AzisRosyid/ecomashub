<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

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
        {{ config('app.name', 'Laravel') }}
    </title>
    <link rel="icon" type="image/x-icon" href="{{ Vite::asset('resources/images/logogram-ino 1.png') }}">

    <!-- Scripts -->
    @vite('resources/js/app.js')

    {{-- <style>
        @font-face {
            font-family: 'Fredoka-Regular';
            src: url('../fonts/Fredoka-Regular.woff') format('woff');
        }

        @font-face {
            font-family: 'Fredoka-Bold';
            src: url('../fonts/Fredoka-Bold.woff') format('woff');
        }

        @font-face {
            font-family: 'Fredoka-Medium';
            src: url('../fonts/Fredoka-Medium.woff') format('woff');
        }
    </style> --}}

</head>

<body>
    @isset($route)
        @if (strpos($route, 'admin') !== false)
            <section class="flex">
                @include('layouts.sidebar')
                @yield('content')
            </section>
            @yield('filter')
        @else
            @yield('content')
        @endif


    @endisset


    @include('layouts.footer')
    @include('layouts.script')
</body>

</html>


{{-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav> --}}
