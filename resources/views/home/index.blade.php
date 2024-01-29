@extends('layouts.app')

@section('content')
    <header class="bg-transparent sm:fixed absolute w-full flex items-center pt-3 sm:pt-6 sm:px-20">
        <div class="container">
            <div
                class="flex item-center justify-between sm:shadow-2xl shadow-green-200 sm:border-4 border-green-900 sm:rounded-[20px] p-2 bg-white relative">
                <div class="px-2 sm:px-4">
                    <a href="#">
                        <img src="{{ Vite::asset('resources/images/logo.png') }}" alt="EcomasHub" class="w-32">
                    </a>
                </div>
                <div class="flex items-center">
                    <button id="hamburger" name="hamburger" type="button" class="block absolute right-4 lg:hidden">
                        <span class="hamburger-line transition duration-300 ease-in-out origin-top-left"></span>
                        <span class="hamburger-line transition duration-300 ease-in-out"></span>
                        <span class="hamburger-line transition duration-300 ease-in-out origin-bottom-left"></span>
                    </button>

                    <nav id="nav-menu"
                        class="hidden absolute py-5 lg:py-0 bg-white shadow-lg rounded-lg max-w-[250px] w-full right-4 top-full lg:block lg:static lg:bg-transparent lg:max-w-full lg:shadow-none lg:rounded-none">
                        <ul class="block lg:flex">
                            <li class="group">
                                <a href="#tentang"
                                    class="text-base text-green-900 py-2 mx-8 lg:mx-4 flex group-hover:text-green-500">Tentang</a>
                            </li>
                            <li class="group">
                                <a href="#tujuan"
                                    class="text-base text-green-900 py-2 mx-8 lg:mx-4 flex group-hover:text-green-500">Tujuan</a>
                            </li>
                            <li class="group">
                                <a href="#mitra"
                                    class="text-base text-green-900 py-2 mx-8 lg:mx-4 flex group-hover:text-green-500">Informasi
                                    Mitra</a>
                            </li>
                            <li class="group">
                                <a href="#publik"
                                    class="text-base text-green-900 py-2 mx-8 lg:mx-4 flex group-hover:text-green-500">Informasi
                                    Publik</a>
                            </li>
                            <li class="group">
                                <a href="#lainnya"
                                    class="text-base text-green-900 py-2 mx-8 lg:mx-4 flex group-hover:text-green-500">Lainnya</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>
@endsection
