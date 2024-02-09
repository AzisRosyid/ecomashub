@isset($route)
    @if (strpos($route, 'auth') !== false)
        <footer class="bg-green-800 fixed bottom-0 w-full text-center py-3 text-white">
            <p>&copy;Copyright Ecomashub. All Rights Reserved</p>
        </footer>
    @endif
@endisset
