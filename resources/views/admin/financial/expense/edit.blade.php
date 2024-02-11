@extends('layouts.app')

@section('content')
    <!-- main -->
    <div class="py-8 bg-gray-50 justify-start items-start w-full border-l">
        <a href="{{ route('adminExpense') }}" class="mx-2 sm:mx-10 text-green-600 text-sm font-medium flex">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M19 11H7.135L10.768 6.64C11.122 6.216 11.064 5.585 10.64 5.232C10.215 4.878 9.585 4.936 9.232 5.36L4.232 11.36C4.193 11.407 4.173 11.462 4.144 11.514C4.12 11.556 4.091 11.592 4.073 11.638C4.028 11.753 4.001 11.874 4.001 11.996C4.001 11.997 4 11.999 4 12C4 12.001 4.001 12.003 4.001 12.004C4.001 12.126 4.028 12.247 4.073 12.362C4.091 12.408 4.12 12.444 4.144 12.486C4.173 12.538 4.193 12.593 4.232 12.64L9.232 18.64C9.43 18.877 9.714 19 10 19C10.226 19 10.453 18.924 10.64 18.768C11.064 18.415 11.122 17.784 10.768 17.36L7.135 13H19C19.552 13 20 12.552 20 12C20 11.448 19.552 11 19 11Z"
                    fill="#359C40" />
                <mask id="mask0_935_11602" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="4" y="5" width="16"
                    height="14">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M19 11H7.135L10.768 6.64C11.122 6.216 11.064 5.585 10.64 5.232C10.215 4.878 9.585 4.936 9.232 5.36L4.232 11.36C4.193 11.407 4.173 11.462 4.144 11.514C4.12 11.556 4.091 11.592 4.073 11.638C4.028 11.753 4.001 11.874 4.001 11.996C4.001 11.997 4 11.999 4 12C4 12.001 4.001 12.003 4.001 12.004C4.001 12.126 4.028 12.247 4.073 12.362C4.091 12.408 4.12 12.444 4.144 12.486C4.173 12.538 4.193 12.593 4.232 12.64L9.232 18.64C9.43 18.877 9.714 19 10 19C10.226 19 10.453 18.924 10.64 18.768C11.064 18.415 11.122 17.784 10.768 17.36L7.135 13H19C19.552 13 20 12.552 20 12C20 11.448 19.552 11 19 11Z"
                        fill="white" />
                </mask>
                <g mask="url(#mask0_935_11602)">
                    <rect width="24" height="24" fill="#359C40" />
                </g>
            </svg>
            Kembali</a>
        <!-- head -->
        <div class="flex mx-2 sm:mx-10 justify-between border-b pb-4 mt-4">
            <div>
                <p class="text-zinc-700 text-[28px] font-semibold font-fredokaBold leading-9">Edit Biaya</p>
                <p class="text-slate-500 text-sm font-normal font-fredokaRegular leading-tight hidden sm:block">
                    Manage your team
                    members and their account permissions here</p>
                @include('admin.alert.error')
            </div>
            <button id="hamburger" name="hamburger" type="button" class="block absolute right-4 lg:hidden">
                <span class="hamburger-line transition duration-300 ease-in-out origin-top-left"></span>
                <span class="hamburger-line transition duration-300 ease-in-out"></span>
                <span class="hamburger-line transition duration-300 ease-in-out origin-bottom-left"></span>
            </button>
        </div>
        <!-- end head -->

        <!-- body -->
        <form action="{{ route('adminExpenseUpdate', $expense) }}" method="POST"
            class="mt-6 sm:mx-10 mx-2 font-fredokaRegular">
            @method('put')
            @csrf
            <div class="border-b sm:flex">
                <label for="judulHutang" class="sm:w-40 block">Nama*</label>
                <input type="text" name="name" id="judulHutang"
                    class="sm:w-[600px] outline-none border border-gray-400 p-2 rounded-lg mt-2 mb-4"
                    placeholder="Nama biaya" value="{{ old('name') ?? $expense->name }}" required>
            </div>
            <div class="border-b mt-3 sm:flex">
                <label for="deskripsi" class="sm:w-40 block">Deskripsi</label>
                <textarea name="description" id="deskripsi" cols="30" rows="3"
                    class="outline-none border border-gray-400 p-2 rounded-lg mt-2 mb-4 sm:w-[600px]" placeholder="Deskripsi">{{ old('description') ?? $expense->description }}</textarea>
            </div>
            <div class="border-b mt-3 sm:flex">
                <label for="" class="sm:w-40 block">Supplier</label>
                <select name="supplier_id" id=""
                    class="outline-none border border-gray-400 p-2 rounded-lg mt-2 mb-4" placeholder="Pilih supplier">
                    <option value="">Pilih supplier</option>
                    @foreach ($suppliers as $st)
                        <option value="{{ $st->id }}"
                            {{ (old('supplier_id') ?? $expense->supplier_id) === $st->id ? 'selected' : '' }}>
                            {{ $st->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="border-b mt-3 sm:flex">
                <label for="nilai" class="sm:w-40 block">Nilai*</label>
                <input type="number" name="value" id="nilai"
                    class="sm:w-[600px] outline-none border border-gray-400 p-2 rounded-lg mt-2 mb-4" placeholder="Nilai"
                    value="{{ old('value') ?? $expense->value }}" required>
            </div>
            <div class="border-b mt-3 sm:flex">
                <label for="" class="sm:w-40 block">Jenis biaya*</label>
                <div class="flex sm:w-[600px] mb-4">
                    @foreach ($types as $index => $st)
                        <div class="flex @if ($index > 0) ms-6 @endif">
                            <input type="radio" name="type" class="expense-type" value="{{ $st }}"
                                id="{{ strtolower($st) }}" @if ($index === 0) required @endif
                                @if ((old('type') ?? $expense->type) === $st) checked @endif>
                            <label for="{{ strtolower($st) }}" class="ms-2">{{ $st }}</label>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="border-b mt-3 sm:flex">
                <label for="interval" id="intervalTitle" class="sm:w-40 block">Interval (bulan)</label>
                <input type="number" name="interval" id="interval"
                    class="sm:w-[600px] outline-none border border-gray-400 p-2 rounded-lg mt-2 mb-4" placeholder="Interval"
                    value="{{ old('interval') ?? $expense->interval }}">
            </div>
            <div class="border-b mt-3 sm:flex">
                <label for="tanggal" class="sm:w-40 block">Tanggal*</label>
                <input type="datetime-local" name="date" id="tanggal"
                    class="outline-none border text-gray-400 border-gray-400 p-2 rounded-lg mt-2 mb-4"
                    placeholder="Tanggal" value="{{ old('date') ?? $expense->date }}" required>
            </div>
            <div class="flex justify-end mt-4">
                <a href="{{ route('adminExpense') }}"
                    class="px-2 h-10 rounded-lg border border-gray-400 text-sm font-normal font-fredokaRegular items-center flex text-zinc-700">
                    Batal</a>
                <button
                    class="px-4 h-10 rounded-lg border border-amber-400 bg-amber-400 text-white text-sm font-normal font-fredokaRegular items-center flex ms-3">Update
                    Biaya</button>
            </div>
        </form>
        <!-- end body -->
    </div>
@endsection
