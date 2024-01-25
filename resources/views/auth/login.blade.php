@extends('layouts.app')

@section('content')
    <section class="bg-gradient-to-br from-green-500 to-green-900 min-h-screen flex items-center justify-center">
        <div class="flex rounded-2xl w-[255px] shadow-lg max-w-3xl bg-white sm:w-[523px]">
            <div class="w-1/2 sm:block hidden relative bg-gradient-to-br from-yellow-500 to-green-600 rounded-2xl">
                <div>
                    <img src="{{ Vite::asset('resources/images/formBg.png') }}" alt="" class="opacity-10">
                </div>
                <div class="absolute top-9 ms-14">
                    <div class="bg-white p-2 rounded-[5px]">
                        <img class="w-32" src="{{ Vite::asset('resources/images/logotext-ino.png') }}" alt="">
                    </div>
                </div>
                <div class="absolute top-36 text-white mx-3 text-center">
                    <p class="text-sm font-fredokaRegular">Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                        Ipsa obcaecati libero
                        voluptas esse eum
                        laudantium.</p>
                </div>
            </div>
            <div class="w-full bg-white sm:w-1/2 rounded-2xl relative h-auto">
                <div class="mt-7 mx-4 pb-4">
                    <p class="text-2xl font-bold text-green-700 font-fredokaBold">Selamat Datang Kembali!</p>
                    <p class="text-xs mb-2 font-fredokaRegular">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    </p>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf <!-- {{ csrf_field() }} -->
                        <div class="p-1 flex justify-between mb-3 w-56 rounded-[7px] border-2 border-green-700">
                            <input type="text" class="outline-none" placeholder="Username/email" name="user"
                                value="{{ old('user') }}" autofocus required>
                            <div>
                                <svg width="24" height="24" viewBox="0 0 32 32" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g id="user">
                                        <path id="Path 4"
                                            d="M7.33334 26C7.33334 26 12 24 13.3333 22.6667C14.6667 21.3333 10.6667 21.3333 10.6667 14.6667C10.6667 8 16 8 16 8C16 8 21.3333 8 21.3333 14.6667C21.3333 21.3333 17.3333 21.3333 18.6667 22.6667C20 24 24.6667 26 24.6667 26"
                                            stroke="#007000" stroke-width="2" stroke-linecap="round" />
                                        <path id="Oval" fill-rule="evenodd" clip-rule="evenodd"
                                            d="M16 29.3334C23.3638 29.3334 29.3333 23.3638 29.3333 16C29.3333 8.63622 23.3638 2.66669 16 2.66669C8.63619 2.66669 2.66666 8.63622 2.66666 16C2.66666 23.3638 8.63619 29.3334 16 29.3334Z"
                                            stroke="#007000" stroke-width="2" />
                                    </g>
                                </svg>
                            </div>
                        </div>
                        <div class="mb-1 flex justify-between w-56 rounded-[7px] border-2 border-green-700 p-1">
                            <input id="passwordInput" type="password" name="password" class="outline-none"
                                placeholder="Password" required>
                            <div class="text-green-700 cursor-pointer tampilkan">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                    class="bi bi-eye" viewBox="0 0 16 16">
                                    <path
                                        d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z" />
                                    <path
                                        d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0" />
                                </svg>
                            </div>
                            <div class="text-green-700 cursor-pointer sembunyikan hidden">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                    class="bi bi-eye-slash" viewBox="0 0 16 16">
                                    <path
                                        d="M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7 7 0 0 0-2.79.588l.77.771A6 6 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755q-.247.248-.517.486z" />
                                    <path
                                        d="M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829zm-2.943 1.299.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829" />
                                    <path
                                        d="M3.35 5.47q-.27.24-.518.487A13 13 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7 7 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709zm10.296 8.884-12-12 .708-.708 12 12z" />
                                </svg>
                            </div>
                        </div>

                        @if ($errors->any())
                            <p class="text-red-600 font-fredokaRegular text-sm mb-2 ms-1">{{ $errors->first() }}</p>
                        @endif

                        <div class="flex justify-between pb-3 w-56">
                            <div class="flex">
                                <input type="checkbox" id="ingat" name="remember" class="ms-1">
                                <label for="ingat">
                                    <p for="ingat" class="font-fredokaRegular text-xs ms-1">ingat saya</p>
                                </label>
                            </div>
                            <a href="#" class="text-red-600 me-1 font-fredokaRegular text-xs">Lupa Password?</a>
                        </div>
                        <button type="submit"
                            class="text-white bg-green-700 hover:bg-green-600 active:bg-green-700 w-56 rounded-[7px] py-1">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
