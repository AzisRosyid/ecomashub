@extends('layouts.app')

@section('content')
    <!-- main dashboard -->
    <div class="py-4 sm:py-8 bg-gray-50 justify-start items-start w-full border-l">
        <!-- head -->
        <div class="flex mx-4 sm:mx-10 justify-between border-b pb-4">
            <div>
                <div class="">
                    <p class="text-zinc-700 text-2xl sm:text-[28px] font-semibold font-fredokaBold leading-9">
                        Edit Password
                    </p>
                </div>
                @include('admin.alert.error')
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
                <form action="{{ route('adminProfileUpdatePassword') }}" method="POST"
                    class="col-span-8 bg-white shadow-lg rounded-lg p-4 text-slate-600">
                    @method('put')
                    @csrf
                    <div class="sm:grid grid-cols-4 font-fredokaRegular border-b border-b-lime-600 pb-2 my-2">
                        <p class="col-span-1 font-bold">Password lama*</p>
                        <input type="password" class="outline-none w-full border p-1 rounded-md col-span-3 border-gray-400"
                            placeholder="Password lama" name="old_password" required>
                    </div>
                    <div class="sm:grid grid-cols-4 font-fredokaRegular border-b border-b-lime-600 pb-2 my-2">
                        <p class="col-span-1 font-bold">Password baru*</p>
                        <input type="password" class="outline-none w-full border p-1 rounded-md col-span-3 border-gray-400"
                            placeholder="Password baru" name="new_password" required>
                    </div>
                    <div class="sm:grid grid-cols-4 font-fredokaRegular border-b pb-2 my-2">
                        <p class="col-span-1 font-bold">Konfirmasi password baru*</p>
                        <input type="password" class="outline-none w-full border p-1 rounded-md col-span-3 border-gray-400"
                            placeholder="Konfirmasi password baru" name="new_password_confirmation" required>
                    </div>
                    <div class="pt-2 flex">
                        <a href="{{ route('adminProfile') }}"
                            class="bg-white text-slate-500 border border-slate-500 font-fredokaRegular px-4 py-2 rounded-md me-3">Batal</a>
                        <button
                            class="bg-amber-400 hover:bg-green-500 text-white font-fredokaRegular px-4 py-2 rounded-md">Update</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- end body -->
    </div>
@endsection
