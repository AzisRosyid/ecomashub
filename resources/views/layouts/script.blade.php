@isset($route)
    @if ($route == 'login')
        <script src="{{ Vite::asset('resources/js/login.js') }}"></script>
    @endif

    @if (strpos($route, 'admin') !== false)
        <script src="{{ Vite::asset('resources/js/admin.js') }}"></script>
    @endif
@endisset
