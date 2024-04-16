@if ($errors->any())
    <div class="border border-red-500 bg-red-50 px-4 py-2 text-center rounded-md mt-2">
        <p class="text-red-500 font-normal font-fredokaRegular leading-tight block">
            Error: {{ $errors->first() }}</p>
    </div>
@endif
