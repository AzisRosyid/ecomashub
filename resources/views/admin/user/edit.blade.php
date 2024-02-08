@extends('layouts.app')

@section('content')
    <!-- main -->
    <div class="py-8 bg-gray-50 justify-start items-start w-full border-l">
        <a href="{{ route('adminUser') }}" class="mx-2 sm:mx-10 text-green-600 text-sm font-medium flex">
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
                <p class="text-zinc-700 text-[28px] font-semibold font-fredokaBold leading-9">Update Pengguna</p>
                <p class="text-slate-500 text-sm font-normal font-fredokaRegular leading-tight hidden sm:block">
                    Manage your team
                    members and their account permissions here</p>
            </div>
            <button id="hamburger" name="hamburger" type="button" class="block absolute right-4 lg:hidden">
                <span class="hamburger-line transition duration-300 ease-in-out origin-top-left"></span>
                <span class="hamburger-line transition duration-300 ease-in-out"></span>
                <span class="hamburger-line transition duration-300 ease-in-out origin-bottom-left"></span>
            </button>
        </div>
        <!-- end head -->

        <!-- body -->
        <form action="{{ route('adminUserUpdate', $user) }}" method="POST" class="mt-6 sm:mx-10 mx-2 font-fredokaRegular">
            @method('put')
            @csrf
            <div class="border-b mt-3 sm:flex">
                <label for="" class="sm:w-40 block">Nama</label>
                <div class="flex sm:w-[600px]">
                    <div>
                        <label for="mulai" class="block">Nama depan*</label>
                        <input type="text"
                            class="outline-none text-gray-400 border border-gray-400 p-2 rounded-lg mt-2 mb-4"
                            placeholder="Nama depan" name="first_name" value="{{ old('first_name') ?? $user->first_name }}"
                            required>
                    </div>
                    <div class="ms-6">
                        <label for="selesai" class="block">Nama belakang*</label>
                        <input type="text"
                            class="outline-none text-gray-400 border border-gray-400 p-2 rounded-lg mt-2 mb-4"
                            placeholder="Nama belakang" name="last_name" value="{{ old('last_name') ?? $user->last_name }}"
                            required>
                    </div>
                </div>
            </div>
            <div class="border-b mt-3 sm:flex">
                <label for="email" class="sm:w-40 block">Email*</label>
                <input type="email" name="email" id="email"
                    class="sm:w-[600px] outline-none border border-gray-400 p-2 rounded-lg mt-2 mb-4" placeholder="Email"
                    value="{{ old('email') ?? $user->email }}" required>
            </div>
            <div class="border-b mt-3 sm:flex">
                <label for="username" class="sm:w-40 block">Username*</label>
                <input type="text" name="username" id="username"
                    class="sm:w-[600px] outline-none border border-gray-400 p-2 rounded-lg mt-2 mb-4" placeholder="Username"
                    value="{{ old('username') ?? $user->username }}" required>
            </div>
            <div class="border-b mt-3 sm:flex">
                <label for="" class="sm:w-40 block">Peran*</label>
                <select name="role_id" id="" class="outline-none border border-gray-400 p-2 rounded-lg mt-2 mb-4"
                    required>
                    <option value="">Pilih peran</option>
                    @foreach ($roles as $st)
                        <option value="{{ $st->id }}"
                            {{ (old('role_id') ?? $user->role_id) === $st->id ? 'selected' : '' }}>
                            {{ $st->name . ' | ' . $st->type }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="border-b mt-3 sm:flex">
                <label for="" class="sm:w-40 block">Jenis kelamin*</label>
                <div class="flex sm:w-[600px] mb-4">
                    @foreach ($genders as $index => $st)
                        <div class="flex @if ($index > 0) ms-6 @endif">
                            <input type="radio" name="gender" value="{{ $st }}" id="{{ strtolower($st) }}"
                                @if ($index === 0) required @endif
                                @if ((old('gender') ?? $user->gender) === $st) checked @endif>
                            <label for="{{ strtolower($st) }}" class="ms-2">{{ $st }}</label>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="border-b mt-3 sm:flex">
                <label for="birth" class="sm:w-40 block">Tanggal lahir*</label>
                <input type="date" name="date_of_birth" id="birth"
                    class="outline-none border text-gray-400 border-gray-400 p-2 rounded-lg mt-2 mb-4"
                    placeholder="Tanggal lahir" value="{{ old('date_of_birth') ?? $user->date_of_birth }}" required>
            </div>
            <div class="border-b mt-3 sm:flex">
                <label for="nomor" class="sm:w-40 block">Nomor telepon*</label>
                <input type="number" id="nomor"
                    class="sm:w-[600px] outline-none border border-gray-400 p-2 rounded-lg mt-2 mb-4"
                    placeholder="Nomor telepon" name="phone_number"
                    value="{{ old('phone_number') ?? $user->phone_number }}" required>
            </div>
            <div class="border-b mt-3 sm:flex">
                <label for="alamat" class="sm:w-40 block">Alamat*</label>
                <textarea name="address" id="alamat" cols="30" rows="3"
                    class="outline-none border border-gray-400 p-2 rounded-lg mt-2 mb-4 sm:w-[600px]" placeholder="Alamat">{{ old('address') ?? $user->address }}</textarea>
            </div>
            <div class="border-b mt-3 sm:flex">
                <label for="" class="sm:w-40 block">Jenis pengguna*</label>
                <div class="flex sm:w-[600px] mb-4">
                    @foreach ($types as $index => $st)
                        <div class="flex @if ($index > 0) ms-6 @endif">
                            <input type="radio" name="source_type" value="{{ $st }}"
                                id="{{ strtolower($st) }}" @if ($index === 0) required @endif
                                @if ((old('source_type') ?? $user->source_type) === $st) checked @endif>
                            <label for="{{ strtolower($st) }}" class="ms-2">{{ $st }}</label>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="border-b mt-3 sm:flex">
                <label for="gambar" class="sm:w-40">Gambar</label>
                <input type="file" name="gambar" id="gambar"
                    class="w-full outline-none border border-gray-400 p-2 rounded-lg mt-2 mb-4 hidden"
                    placeholder="Total dana kegiatan">
                <label for="gambar"
                    class="sm:w-[600px] sm:border border-gray-400 p-2 rounded-lg mt-2 mb-4 cursor-pointer">
                    <div class="text-center py-4 border border-gray-400 p-2 rounded-lg sm:border-none">
                        <svg class="mx-auto" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M21 13L18 4" stroke="#798999" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M3 13L6 4" stroke="#798999" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path
                                d="M12 11V3M21 13V20C21 20.2652 20.8946 20.5196 20.7071 20.7071C20.5196 20.8946 20.2652 21 20 21H4C3.73478 21 3.48043 20.8946 3.29289 20.7071C3.10536 20.5196 3 20.2652 3 20V13H8C8 14.0609 8.42143 15.0783 9.17157 15.8284C9.92172 16.5786 10.9391 17 12 17C13.0609 17 14.0783 16.5786 14.8284 15.8284C15.5786 15.0783 16 14.0609 16 13H21Z"
                                stroke="#798999" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M15 6L12 3L9 6" stroke="#798999" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                        <p class="text-sm font-fredokaRegular"><span class="text-green-600">Klik untuk upload</span>
                            atau tarik dan
                            taruh di sini.</p>
                        <p class="text-gray-400 text-xs font-fredokaRegular">JPEG, PNG, atau SVG (Masimal 2mb)</p>
                        <p class="px-3 py-1 mt-3 border border-gray-400 rounded-lg inline-block">Cari foto</p>
                    </div>
                </label>
            </div>
            <div class="border-b mt-3 sm:flex">
                <label for="" class="sm:w-40 block">Status*</label>
                <div class="flex sm:w-[600px] mb-4">
                    @foreach ($status as $index => $st)
                        <div class="flex @if ($index > 0) ms-6 @endif">
                            <input type="radio" name="status" value="{{ $st }}"
                                id="{{ strtolower($st) }}" @if ($index === 0) required @endif
                                @if ((old('status') ?? $user->status) === $st) checked @endif>
                            <label for="{{ strtolower($st) }}" class="ms-2">{{ $st }}</label>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="flex justify-end mt-4">
                <a href="{{ route('adminUser') }}"
                    class="px-2 h-10 rounded-lg border border-gray-400 text-sm font-normal font-fredokaRegular items-center flex text-zinc-700">
                    Batal</a>
                <button
                    class="px-4 h-10 rounded-lg border border-amber-400 bg-amber-400 text-white text-sm font-normal font-fredokaRegular items-center flex ms-3">Update
                    Pengguna</button>
            </div>
        </form>
        <!-- end body -->
    </div>
    <!-- end main -->
@endsection
