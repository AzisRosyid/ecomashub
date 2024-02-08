@extends('layouts.app')

@section('content')
    <!-- main dashboard -->
    <div class="py-4 sm:py-8 bg-gray-50 justify-start items-start w-full border-l">
        <!-- head -->
        <div class="flex mx-4 sm:mx-10 justify-between border-b pb-4">
            <div>
                <div class="">
                    <p class="text-zinc-700 text-2xl sm:text-[28px] font-semibold font-fredokaBold leading-9">
                        Edit Profil
                    </p>
                </div>
            </div>
            <div class=" w-1/2">
                <button id="hamburger" name="hamburger" type="button" class="block absolute right-4 lg:hidden">
                    <span class="hamburger-line transition duration-300 ease-in-out origin-top-left"></span>
                    <span class="hamburger-line transition duration-300 ease-in-out"></span>
                    <span class="hamburger-line transition duration-300 ease-in-out origin-bottom-left"></span>
                </button>
            </div>
        </div>

        <!-- end head -->

        <!-- body -->
        <div class="mx-2 sm:mx-10 pt-4 lg:pt-8">
            <div class="sm:grid grid-cols-12 gap-4">
                <form action="{{ route('adminProfileUpdate') }}" method="POST"
                    class="col-span-8 bg-white shadow-lg rounded-lg p-4 text-slate-600">
                    @method('put')
                    @csrf
                    <div class="sm:grid grid-cols-4 font-fredokaRegular border-b border-b-lime-600 pb-2 my-2">
                        <p class="col-span-1 font-bold">Nama</p>
                        <div class="flex sm:w-[600px]">
                            <div>
                                <label for="depan" class="block">Nama depan*</label>
                                <input type="text" id="depan"
                                    class="outline-none w-full border p-1 rounded-md col-span-3 mt-1 border-gray-400"
                                    placeholder="Nama depan" name="first_name"
                                    value="{{ old('first_name') ?? $acc->first_name }}" required>
                            </div>
                            <div class="ms-6">
                                <label for="belakang" class="block">Nama belakang*</label>
                                <input type="text" id="belakang"
                                    class="outline-none w-full border p-1 rounded-md col-span-3 mt-1 border-gray-400"
                                    placeholder="Nama belakang" name="last_name"
                                    value="{{ old('last_name') ?? $acc->last_name }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="sm:grid grid-cols-4 font-fredokaRegular border-b border-b-lime-600 pb-2 my-2">
                        <p class="col-span-1 font-bold">Username*</p>
                        <input type="text" class="outline-none w-full border p-1 rounded-md col-span-3 border-gray-400"
                            placeholder="Username" name="username" value="{{ old('username') ?? $acc->username }}" required>
                    </div>
                    <div class="sm:grid grid-cols-4 font-fredokaRegular border-b border-b-lime-600 pb-2 my-2">
                        <p class="col-span-1 font-bold">Email*</p>
                        <input type="email" class="outline-none w-full border p-1 rounded-md col-span-3 border-gray-400"
                            placeholder="Email" name="email" value="{{ old('email') ?? $acc->email }}" required>
                    </div>
                    <div class="sm:grid grid-cols-4 font-fredokaRegular border-b border-b-lime-600 pb-2 my-2">
                        <p class="col-span-1 font-bold">Jenis kelamin*</p>
                        <div class="flex sm:w-[600px]">
                            @foreach ($genders as $index => $st)
                                <div class="flex @if ($index > 0) ms-6 @endif">
                                    <input type="radio" name="gender" value="{{ $st }}"
                                        id="{{ strtolower($st) }}" @if ($index === 0) required @endif
                                        @if ((old('gender') ?? $acc->gender) === $st) checked @endif>
                                    <label for="{{ strtolower($st) }}" class="ms-2">{{ $st }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="sm:grid grid-cols-4 font-fredokaRegular border-b border-b-lime-600 pb-2 my-2">
                        <p class="col-span-1 font-bold">Tanggal lahir*</p>
                        <input type="date" class="outline-none w-full border p-1 rounded-md border-gray-400"
                            placeholder="Tanggal lahir" name="date_of_birth"
                            value="{{ old('date_of_birth') ?? $acc->date_of_birth }}" required>
                    </div>
                    <div class="sm:grid grid-cols-4 font-fredokaRegular border-b border-b-lime-600 pb-2 my-2">
                        <p class="col-span-1 font-bold">Nomor telepon*</p>
                        <input type="number" name="phone_number"
                            class="outline-none w-full border p-1 rounded-md col-span-3 border-gray-400"
                            placeholder="Nomor telepon" value="{{ old('phone_number') ?? $acc->phone_number }}" required>
                    </div>
                    <div class="sm:grid grid-cols-4 font-fredokaRegular border-b border-b-lime-600 pb-2 my-2">
                        <p class="col-span-1 font-bold">Alamat*</p>
                        <textarea name="address" id="" cols="30" rows="5"
                            class="outline-none w-full border p-1 rounded-md col-span-3 border-gray-400" placeholder="Alamat">{{ old('address') ?? $acc->address }}</textarea>
                    </div>
                    <div class="sm:grid grid-cols-4 font-fredokaRegular border-b border-b-lime-600 pb-2 my-2">
                        <p class="col-span-1 font-bold">Jenis pengguna*</p>
                        <div class="flex sm:w-[600px]">
                            @foreach ($types as $index => $st)
                                <div class="flex @if ($index > 0) ms-6 @endif">
                                    <input type="radio" name="source_type" value="{{ $st }}"
                                        id="{{ strtolower($st) }}" @if ($index === 0) required @endif
                                        @if ((old('source_type') ?? $acc->source_type) === $st) checked @endif>
                                    <label for="{{ strtolower($st) }}" class="ms-2">{{ $st }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="border-b mt-3 sm:flex">
                        <label for="gambar" class="sm:w-60 font-bold font-fredokaRegular">Gambar</label>
                        <input type="file" name="gambar" id="gambar"
                            class="w-full outline-none border p-2 rounded-lg mt-2 mb-4 hidden"
                            placeholder="Total dana kegiatan">
                        <label for="gambar"
                            class="w-full sm:border border-gray-400 p-2 rounded-lg mt-2 mb-4 cursor-pointer">
                            <div class="text-center py-4 border border-gray-400 p-2 rounded-lg sm:border-none">
                                <svg class="mx-auto" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M21 13L18 4" stroke="#798999" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M3 13L6 4" stroke="#798999" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path
                                        d="M12 11V3M21 13V20C21 20.2652 20.8946 20.5196 20.7071 20.7071C20.5196 20.8946 20.2652 21 20 21H4C3.73478 21 3.48043 20.8946 3.29289 20.7071C3.10536 20.5196 3 20.2652 3 20V13H8C8 14.0609 8.42143 15.0783 9.17157 15.8284C9.92172 16.5786 10.9391 17 12 17C13.0609 17 14.0783 16.5786 14.8284 15.8284C15.5786 15.0783 16 14.0609 16 13H21Z"
                                        stroke="#798999" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M15 6L12 3L9 6" stroke="#798999" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                                <p class="text-sm font-fredokaRegular"><span class="text-green-600">Klik untuk
                                        upload</span>
                                    atau tarik dan
                                    taruh di sini.</p>
                                <p class="text-gray-400 text-xs font-fredokaRegular">JPEG, PNG, atau SVG (Masimal
                                    2mb)</p>
                                <p class="px-3 py-1 mt-3 border border-gray-400 rounded-lg inline-block">Cari foto
                                </p>
                            </div>
                        </label>
                    </div>
                    <div class="pt-2 flex">
                        <a href="{{ route('adminProfile') }}"
                            class="bg-white text-slate-500 border border-slate-500 font-fredokaRegular px-4 py-2 rounded-md me-3">Batal</a>
                        <button
                            class="bg-green-600 hover:bg-green-500 text-white font-fredokaRegular px-4 py-2 rounded-md">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- end body -->
    </div>
@endsection
