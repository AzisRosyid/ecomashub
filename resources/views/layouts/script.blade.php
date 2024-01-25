@isset($route)
    @if ($route == 'home')
        <script src="{{ Vite::asset('resources/js/home.js') }}"></script>
    @endif

    @if ($route == 'authLogin')
        <script src="{{ Vite::asset('resources/js/login.js') }}"></script>
    @endif

    @if (strpos($route, 'admin') !== false)
        <script src="{{ Vite::asset('resources/js/admin.js') }}"></script>
    @endif
@endisset
