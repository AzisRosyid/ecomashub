@if (session('message'))
    <div
        class="border
        @if (strpos(session('message'), 'dihapus')) border-red-500 bg-red-50 @elseif (strpos(session('message'), 'diperbarui'))border-yellow-500 bg-yellow-50 @else border-green-500 bg-green-50 @endif px-4 py-2 text-center rounded-md mt-2">
        <p
            class="@if (strpos(session('message'), 'dihapus')) text-red-500 @elseif (strpos(session('message'), 'diperbarui')) text-yellow-500 @else text-green-500 @endif font-normal font-fredokaRegular leading-tight block">
            {{ session('message') }}
        </p>
    </div>
@endif
