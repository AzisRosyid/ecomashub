@isset($route)
    @if ($route == 'home')
        <script src="{{ Vite::asset('resources/js/home.js') }}"></script>
    @endif

    @if ($route == 'authLogin')
        <script src="{{ Vite::asset('resources/js/login.js') }}"></script>
    @endif


    {{-- Dashboard --}}
    @if ($route == 'notadminDashboard')
        <script src="{{ Vite::asset('resources/js/chart.umd.js') }}"></script>
        <script src="{{ Vite::asset('resources/js/kalender.js') }}"></script>
        <script src="{{ Vite::asset('resources/js/chart.js') }}"></script>
    @endif

    {{-- event --}}
    @if ($route == 'adminEventCreate')
        <script src="{{ Vite::asset('resources/js/tambah-kegiatan.js') }}"></script>
    @endif

    @if (strpos($route, 'admin') !== false)
        <script src="{{ Vite::asset('resources/js/admin.js') }}"></script>
    @endif


    {{-- User --}}

    {{-- Search --}}
@endisset
