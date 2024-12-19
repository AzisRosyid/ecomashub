@isset($route)
    <script src="{{ Vite::asset('resources/js/firebase.js') }}" type="module"></script>
    <script src="{{ Vite::asset('resources/js/script.js') }}" type="module"></script>

    @if ($route == 'home')
        <script src="{{ Vite::asset('resources/js/home.js') }}" type="module"></script>
    @endif

    @if (strpos($route, 'auth') !== false)
        <script src="{{ Vite::asset('resources/js/auth.js') }}" type="module"></script>
    @endif

    {{-- Dashboard --}}
    @if ($route == 'adminDashboard')
        <script src="{{ Vite::asset('resources/js/chart.umd.js') }}" type="module"></script>
        <script src="{{ Vite::asset('resources/js/admin-dashboard.js') }}" type="module"></script>
    @elseif ($route == 'userDashboard')
        <script src="{{ Vite::asset('resources/js/chart.umd.js') }}" type="module"></script>
        <script src="{{ Vite::asset('resources/js/user-dashboard.js') }}" type="module"></script>
    @endif

    {{-- Content --}}
    @if (strpos($route, 'admin') !== false)
        <script src="{{ Vite::asset('resources/js/admin.js') }}" type="module"></script>
    @elseif (strpos($route, 'user') !== false)
        <script src="{{ Vite::asset('resources/js/user.js') }}" type="module"></script>
    @endif

    {{-- Modal --}}
    @if ($route == 'adminOrderCreate' || $route == 'adminOrderEdit')
        <script src="{{ Vite::asset('resources/js/product.modal.js') }}" type="module"></script>
    @endif

    @if (strpos($route, 'admin') !== false || strpos($route, 'user') !== false)
        <script src="{{ Vite::asset('resources/js/eco-chat.js') }}" type="module"></script>
    @endif


@endisset
