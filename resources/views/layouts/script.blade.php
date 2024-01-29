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

    {{-- Kegiatan --}}
    @if ($route == 'adminEventCreate')
        <script src="{{ Vite::asset('resources/js/tambah-kegiatan.js') }}"></script>
    @endif
@endisset
