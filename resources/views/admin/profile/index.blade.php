@extends('layouts.app')

@section('content')
    <div class="py-4 sm:py-8 bg-gray-50 justify-start items-start w-full border-l">
        <!-- head -->
        <div class="flex mx-4 sm:mx-10 justify-between border-b pb-4">
            <div>
                <div class="flex gap-2">
                    <p class="text-zinc-700 text-2xl sm:text-[28px] font-semibold font-fredokaBold leading-9">
                        Profil
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
                <div class="col-span-3 bg-white shadow-lg rounded-lg justify-center flex py-8">
                    <img src="https://unyacid-my.sharepoint.com/personal/azisrosyid_2022_student_uny_ac_id/Documents/Pictures/Nitro/Nitro_Wallpaper_01_3840x2400.jpg"
                        alt="" class="h-[200px] w-[200px]">
                </div>
                <div class="col-span-8 bg-white shadow-lg rounded-lg p-4 text-slate-600">
                    <div class="grid grid-cols-4 font-fredokaRegular border-b border-b-lime-600 pb-2 my-2">
                        <p class="col-span-1 font-bold">Nama</p>
                        <p class="col-span-3">{{ $acc->first_name . ' ' . $acc->last_name }}</p>
                    </div>
                    <div class="grid grid-cols-4 font-fredokaRegular border-b border-b-lime-600 pb-2 my-2">
                        <p class="col-span-1 font-bold">Username</p>
                        <p class="col-span-3">{{ $acc->username }}</p>
                    </div>
                    <div class="grid grid-cols-4 font-fredokaRegular border-b border-b-lime-600 pb-2 my-2">
                        <p class="col-span-1 font-bold">Email</p>
                        <p class="col-span-3">{{ $acc->email }}</p>
                    </div>
                    <div class="grid grid-cols-4 font-fredokaRegular border-b border-b-lime-600 pb-2 my-2">
                        <p class="col-span-1 font-bold">Role</p>
                        <p class="col-span-3">{{ $acc->role->name . ' | ' . $acc->role->type }}</p>
                    </div>
                    <div class="grid grid-cols-4 font-fredokaRegular border-b border-b-lime-600 pb-2 my-2">
                        <p class="col-span-1 font-bold">Jenis kelamin</p>
                        <p class="col-span-3">{{ $acc->gender }}</p>
                    </div>
                    <div class="grid grid-cols-4 font-fredokaRegular border-b border-b-lime-600 pb-2 my-2">
                        <p class="col-span-1 font-bold">Tanggal lahir</p>
                        <p class="col-span-3">{{ $acc->formatted_date_of_birth }}</p>
                    </div>
                    <div class="grid grid-cols-4 font-fredokaRegular border-b border-b-lime-600 pb-2 my-2">
                        <p class="col-span-1 font-bold">Nomor telepon</p>
                        <p class="col-span-3">{{ $acc->phone_number }}</p>
                    </div>
                    <div class="grid grid-cols-4 font-fredokaRegular border-b border-b-lime-600 pb-2 my-2">
                        <p class="col-span-1 font-bold">Alamat</p>
                        <p class="col-span-3">{{ $acc->address }}</p>
                    </div>
                    <div class="grid grid-cols-4 font-fredokaRegular border-b border-b-lime-600 pb-2 my-2">
                        <p class="col-span-1 font-bold">Jenis pengguna</p>
                        <p class="col-span-3">{{ $acc->source_type }}</p>
                    </div>
                    <div class="pt-4 flex justify-between w-full">
                        <div class="flex">
                            <a href="{{ route('adminProfileEdit') }}"
                                class="bg-green-600 text-white font-fredokaRegular px-4 py-2 rounded-md me-3">Edit
                                Profil</a>
                            <a href="{{ route('adminProfileEditPassword') }}"
                                class="bg-amber-400 text-white font-fredokaRegular px-4 py-2 rounded-md me-3">Ubah
                                Password</a>
                        </div>
                        <a href="{{ route('logoutUser') }}"
                            class="bg-red-500 text-white font-fredokaRegular px-4 py-2 rounded-md">Logout</a>
                    </div>
                </div>


            </div>
        </div>
        <!-- end body -->
    </div>
@endsection
