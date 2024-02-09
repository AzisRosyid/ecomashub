@extends('layouts.app')

@section('content')
    <section class="bg-gradient-to-br from-green-500 to-green-900 min-h-screen flex items-center justify-center">
        <div class="flex shadow-lg bg-white mb-24 mt-7 rounded-lg">
            <div class="sm:grid grid-cols-8 gap-4">
                <form action="{{ route('registerUser') }}" method="POST"
                    class="rounded-lg col-span-8 bg-white p-4 text-slate-600">
                    @csrf
                    <div class="sm:grid grid-cols-4 font-fredokaRegular border-b border-b-lime-600 pb-2 my-2">
                        <p class="col-span-1 font-bold">Nama</p>
                        <div class="flex col-span-3">
                            <div>
                                <label for="depan" class="block">Nama depan*</label>
                                <input type="text" id="depan"
                                    class="outline-none border p-1 rounded-md border-gray-400" placeholder="Nama depan"
                                    name="first_name" value="{{ old('first_name') }}" required>
                            </div>
                            <div class="ms-6">
                                <label for="belakang" class="block">Nama belakang*</label>
                                <input type="text" id="belakang"
                                    class="outline-none border p-1 rounded-md border-gray-400" placeholder="Nama belakang"
                                    name="last_name" value="{{ old('last_name') }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="sm:grid grid-cols-4 font-fredokaRegular border-b border-b-lime-600 pb-2 my-2">
                        <p class="col-span-1 font-bold">Username*</p>
                        <input type="text" class="outline-none w-full border p-1 rounded-md col-span-3 border-gray-400"
                            placeholder="Username" name="username" value="{{ old('username') }}" required>
                    </div>
                    <div class="sm:grid grid-cols-4 font-fredokaRegular border-b border-b-lime-600 pb-2 my-2">
                        <p class="col-span-1 font-bold">Email*</p>
                        <input type="email" class="outline-none w-full border p-1 rounded-md col-span-3 border-gray-400"
                            placeholder="Email" name="email" value="{{ old('email') }}" required>
                    </div>
                    <div class="sm:grid grid-cols-4 font-fredokaRegular border-b border-b-lime-600 pb-2 my-2">
                        <p class="col-span-1 font-bold">Password*</p>
                        <input type="password" class="outline-none w-full border p-1 rounded-md col-span-3 border-gray-400"
                            placeholder="Password" name="password" required>
                    </div>
                    <div class="sm:grid grid-cols-4 font-fredokaRegular border-b border-b-lime-600 pb-2 my-2">
                        <p class="col-span-1 font-bold">Konfirmasi<br>password*</p>
                        <input type="password" class="outline-none w-full border p-1 rounded-md col-span-3 border-gray-400"
                            placeholder="Konfirmasi password" name="password_confirmation" required>
                    </div>
                    <div class="sm:grid grid-cols-4 font-fredokaRegular border-b border-b-lime-600 pb-2 my-2">
                        <p class="col-span-1 font-bold">Jenis kelamin*</p>
                        <div class="flex col-span-3">
                            @foreach ($genders as $index => $st)
                                <div class="flex @if ($index > 0) ms-6 @endif">
                                    <input type="radio" name="gender" value="{{ $st }}"
                                        id="{{ strtolower($st) }}" @if ($index === 0) required @endif
                                        @if (old('gender') === $st) checked @endif>
                                    <label for="{{ strtolower($st) }}" class="ms-2">{{ $st }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="sm:grid grid-cols-4 font-fredokaRegular border-b border-b-lime-600 pb-2 my-2">
                        <p class="col-span-1 font-bold">Tanggal lahir*</p>
                        <input type="date" class="outline-none w-full border p-1 rounded-md border-gray-400"
                            placeholder="Tanggal lahir" name="date_of_birth" value="{{ old('date_of_birth') }}" required>
                    </div>
                    <div class="sm:grid grid-cols-4 font-fredokaRegular border-b border-b-lime-600 pb-2 my-2">
                        <p class="col-span-1 font-bold">Nomor telepon*</p>
                        <input type="number" name="phone_number"
                            class="outline-none w-full border p-1 rounded-md col-span-3 border-gray-400"
                            placeholder="Nomor telepon" value="{{ old('phone_number') }}" required>
                    </div>
                    <div class="sm:grid grid-cols-4 font-fredokaRegular border-b border-b-lime-600 pb-2 my-2">
                        <p class="col-span-1 font-bold">Alamat*</p>
                        <textarea name="address" id="" cols="30" rows="5"
                            class="outline-none w-full border p-1 rounded-md col-span-3 border-gray-400" placeholder="Alamat">{{ old('address') }}</textarea>
                    </div>
                    <div class="pt-2 flex">
                        <a href="{{ route('login') }}"
                            class="bg-white text-slate-500 border border-slate-500 font-fredokaRegular px-4 py-2 rounded-md me-3">Batal</a>
                        <button
                            class="bg-green-600 hover:bg-green-500 text-white font-fredokaRegular px-4 py-2 rounded-md">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
