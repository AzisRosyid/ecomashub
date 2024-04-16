@extends('layouts.app')

@section('content')
    <!-- main -->
    <div class="py-4 sm:py-8 bg-gray-50 justify-start items-start w-full border-l">
        <!-- head -->
        <div class="flex mx-4 sm:mx-10 justify-between border-b pb-4">
            <div>
                <p class="text-zinc-700 text-2xl sm:text-[28px] font-semibold font-fredokaBold leading-9">
                    Kas
                </p>
                <p class="text-slate-500 text-sm font-normal font-fredokaRegular leading-tight hidden sm:block">
                    Manage your team
                    members and their account permissions here</p>
                @include('user.alert.message')
            </div>
            <div class="justify-between hidden lg:flex">
                <form action="{{ route('userCashCreate') }}" class="">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button
                        class="px-2 h-10 rounded-lg border border-gray-400 text-sm font-normal font-fredokaRegular items-center flex text-zinc-700">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M11.0028 12.0759C11.001 12.0508 11 12.0255 11 12V4C11 3.448 11.447 3 12 3C12.553 3 13 3.448 13 4V11.9998L15.4 10.2C15.842 9.867 16.469 9.958 16.8 10.4C17.132 10.842 17.042 11.469 16.6 11.8L12.6 14.8C12.423 14.933 12.211 15 12 15C11.799 15 11.598 14.939 11.425 14.818L7.425 12.004C6.973 11.686 6.864 11.062 7.182 10.611C7.5 10.159 8.123 10.05 8.575 10.368L11.0028 12.0759ZM6 17V18H18V17C18 16.45 18.45 16 19 16C19.55 16 20 16.45 20 17V19C20 19.55 19.55 20 19 20H5C4.45 20 4 19.55 4 19V17C4 16.45 4.45 16 5 16C5.55 16 6 16.45 6 17Z"
                                fill="#A7B0B9" />
                            <mask id="mask0_703_94" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="4" y="3"
                                width="16" height="17">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M11.0028 12.0759C11.001 12.0508 11 12.0255 11 12V4C11 3.448 11.447 3 12 3C12.553 3 13 3.448 13 4V11.9998L15.4 10.2C15.842 9.867 16.469 9.958 16.8 10.4C17.132 10.842 17.042 11.469 16.6 11.8L12.6 14.8C12.423 14.933 12.211 15 12 15C11.799 15 11.598 14.939 11.425 14.818L7.425 12.004C6.973 11.686 6.864 11.062 7.182 10.611C7.5 10.159 8.123 10.05 8.575 10.368L11.0028 12.0759ZM6 17V18H18V17C18 16.45 18.45 16 19 16C19.55 16 20 16.45 20 17V19C20 19.55 19.55 20 19 20H5C4.45 20 4 19.55 4 19V17C4 16.45 4.45 16 5 16C5.55 16 6 16.45 6 17Z"
                                    fill="white" />
                            </mask>
                            <g mask="url(#mask0_703_94)">
                                <rect width="24" height="24" fill="#394149" />
                            </g>
                        </svg>
                        Export</button>
                </form>
                <a href="{{ route('userCashCreate') }}"
                    class="px-2 h-10 rounded-lg border border-lime-600 bg-lime-600 text-white text-sm font-normal font-fredokaRegular items-center flex ms-3">
                    <svg class="me-1" width="16" height="16" viewBox="0 0 16 16" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M15 7H9V1C9 0.447 8.552 0 8 0C7.448 0 7 0.447 7 1V7H1C0.448 7 0 7.447 0 8C0 8.553 0.448 9 1 9H7V15C7 15.553 7.448 16 8 16C8.552 16 9 15.553 9 15V9H15C15.552 9 16 8.553 16 8C16 7.447 15.552 7 15 7Z"
                            fill="#ffffff" />
                    </svg> Tambah
                    Kas</a>
            </div>
            <button id="hamburger" name="hamburger" type="button" class="block absolute right-4 lg:hidden">
                <span class="hamburger-line transition duration-300 ease-in-out origin-top-left"></span>
                <span class="hamburger-line transition duration-300 ease-in-out"></span>
                <span class="hamburger-line transition duration-300 ease-in-out origin-bottom-left"></span>
            </button>
        </div>
        <!-- end head -->

        <!-- body -->
        <div class="mx-2 sm:mx-10 pt-4 lg:pt-8">

            <div class="flex justify-between">
                <div class="flex p-2 w-1/2 sm:w-auto bg-white rounded-md border border-gray-400">
                    <label for="search">
                        <svg class="hidden sm:block" width="20" height="20" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M20 20L15 15M17 10C17 11.3845 16.5895 12.7378 15.8203 13.889C15.0511 15.0401 13.9579 15.9373 12.6788 16.4672C11.3997 16.997 9.99224 17.1356 8.63437 16.8655C7.2765 16.5954 6.02922 15.9287 5.05026 14.9497C4.07129 13.9708 3.4046 12.7235 3.13451 11.3656C2.86441 10.0078 3.00303 8.6003 3.53285 7.32122C4.06266 6.04213 4.95987 4.94888 6.11101 4.17971C7.26216 3.41054 8.61553 3 10 3C11.8565 3 13.637 3.7375 14.9497 5.05025C16.2625 6.36301 17 8.14348 17 10V10Z"
                                stroke="#798999" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M20.5 20.5L17 17" stroke="#A7B0B9" stroke-width="3" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </label>

                    <input id="search" type="text" class="outline-none ms-2 w-full" name="search"
                        value="{{ request()->input('search') }}" placeholder="Cari kas">
                </div>
                <div class="w-1/2 flex justify-end">
                    <div class="justify-end flex lg:hidden">
                        <form action="" method="post" class="">
                            <button
                                class="px-2 h-10 rounded-lg border border-gray-400 text-sm font-normal font-fredokaRegular items-center flex text-zinc-700">
                                <img src="{{ Vite::asset('resources/images/event-file.png') }}" alt="">
                            </button>
                        </form>
                        <a href="{{ route('userCashCreate') }}"
                            class="px-3 h-10 rounded-lg border border-lime-600 bg-lime-600 text-white text-sm font-normal font-fredokaRegular items-center flex mx-1">
                            <svg class="" width="16" height="16" viewBox="0 0 16 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M15 7H9V1C9 0.447 8.552 0 8 0C7.448 0 7 0.447 7 1V7H1C0.448 7 0 7.447 0 8C0 8.553 0.448 9 1 9H7V15C7 15.553 7.448 16 8 16C8.552 16 9 15.553 9 15V9H15C15.552 9 16 8.553 16 8C16 7.447 15.552 7 15 7Z"
                                    fill="#ffffff" />
                            </svg>
                        </a>
                    </div>
                    <a id="filter"
                        class="px-2 h-10 rounded-lg border border-gray-400 text-sm font-normal font-fredokaRegular items-center flex text-zinc-700 cursor-pointer">
                        <svg class="" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M11 19C10.448 19 10 18.552 10 18C10 17.448 10.448 17 11 17C11.552 17 12 17.448 12 18C12 18.552 11.552 19 11 19ZM21 17H13.815C13.401 15.839 12.302 15 11 15C9.698 15 8.599 15.839 8.185 17H3C2.447 17 2 17.447 2 18C2 18.553 2.447 19 3 19H8.185C8.599 20.161 9.698 21 11 21C12.302 21 13.401 20.161 13.815 19H21C21.553 19 22 18.553 22 18C22 17.447 21.553 17 21 17ZM19 13C18.448 13 18 12.552 18 12C18 11.448 18.448 11 19 11C19.552 11 20 11.448 20 12C20 12.552 19.552 13 19 13ZM19 9C17.698 9 16.599 9.839 16.185 11H3C2.447 11 2 11.447 2 12C2 12.553 2.447 13 3 13H16.185C16.599 14.161 17.698 15 19 15C20.654 15 22 13.654 22 12C22 10.346 20.654 9 19 9ZM7 5C7.552 5 8 5.448 8 6C8 6.552 7.552 7 7 7C6.448 7 6 6.552 6 6C6 5.448 6.448 5 7 5ZM3 7H4.185C4.599 8.161 5.698 9 7 9C8.302 9 9.401 8.161 9.815 7H21C21.553 7 22 6.553 22 6C22 5.447 21.553 5 21 5H9.815C9.401 3.839 8.302 3 7 3C5.698 3 4.599 3.839 4.185 5H3C2.447 5 2 5.447 2 6C2 6.553 2.447 7 3 7Z"
                                fill="#394149" />
                            <mask id="mask0_734_2012" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="2" y="3"
                                width="20" height="18">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M11 19C10.448 19 10 18.552 10 18C10 17.448 10.448 17 11 17C11.552 17 12 17.448 12 18C12 18.552 11.552 19 11 19ZM21 17H13.815C13.401 15.839 12.302 15 11 15C9.698 15 8.599 15.839 8.185 17H3C2.447 17 2 17.447 2 18C2 18.553 2.447 19 3 19H8.185C8.599 20.161 9.698 21 11 21C12.302 21 13.401 20.161 13.815 19H21C21.553 19 22 18.553 22 18C22 17.447 21.553 17 21 17ZM19 13C18.448 13 18 12.552 18 12C18 11.448 18.448 11 19 11C19.552 11 20 11.448 20 12C20 12.552 19.552 13 19 13ZM19 9C17.698 9 16.599 9.839 16.185 11H3C2.447 11 2 11.447 2 12C2 12.553 2.447 13 3 13H16.185C16.599 14.161 17.698 15 19 15C20.654 15 22 13.654 22 12C22 10.346 20.654 9 19 9ZM7 5C7.552 5 8 5.448 8 6C8 6.552 7.552 7 7 7C6.448 7 6 6.552 6 6C6 5.448 6.448 5 7 5ZM3 7H4.185C4.599 8.161 5.698 9 7 9C8.302 9 9.401 8.161 9.815 7H21C21.553 7 22 6.553 22 6C22 5.447 21.553 5 21 5H9.815C9.401 3.839 8.302 3 7 3C5.698 3 4.599 3.839 4.185 5H3C2.447 5 2 5.447 2 6C2 6.553 2.447 7 3 7Z"
                                    fill="white" />
                            </mask>
                            <g mask="url(#mask0_734_2012)">
                                <rect width="24" height="24" fill="#394149" />
                            </g>
                        </svg>
                        <p class="lg:block cursor-pointer hidden ms-1">Filter</p>
                    </a>
                </div>
            </div>
        </div>
        <div class="border rounded-lg mt-4 py-3 sm:mx-10">
            <div class="flex justify-between px-6">
                <div class="flex gap-2">
                    <p class="text-zinc-700 text-lg font-semibold font-fredokaBold leading-9">Semua Kas</p>
                    <div class="items-center inline-flex">
                        <div
                            class="rounded-full bg-lime-50 border border-green-600 items-center inline-flex text-xs font-fredokaRegular text-green-600 h-5 px-2 mx-auto">
                            {{ $total }} kas
                        </div>
                    </div>
                </div>
                <div class="justify-end items-center inline-flex">
                    <p class="hidden sm:block">Tampilkan</p>
                    <select name="pick" id="pick" class="outline-none border border-slate-500 rounded-lg mx-3">
                        <option value="10" {{ $pick == 10 ? 'selected' : '' }}>10</option>
                        <option value="25" {{ $pick == 25 ? 'selected' : '' }}>25</option>
                        <option value="50" {{ $pick == 50 ? 'selected' : '' }}>50</option>
                        <option value="100" {{ $pick == 100 ? 'selected' : '' }}>100</option>
                    </select>
                    <p class="hidden sm:block">data</p>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="font-fredokaRegular text-zinc-700 w-full mt-2 text-sm font-normal">

                    <head class="">
                        <tr>
                            <th class="bg-gray-200 py-3 text-start px-3">Nama</th>
                            <th class="bg-gray-200 py-3 text-start px-3">Mitra</th>
                            <th class="bg-gray-200 py-3 text-start px-3">Nilai</th>
                            <th class="bg-gray-200 py-3 text-start px-3">Tipe</th>
                            <th class="bg-gray-200 py-3 text-start px-3">Tanggal</th>
                            <th class="bg-gray-200 py-3 text-start px-3">Interval</th>
                            <th class="bg-gray-200 py-3 text-start px-3"></th>
                        </tr>
                    </head>

                    <body>
                        @foreach ($cashes as $index => $st)
                            <tr class="border-b">
                                <td class="py-3 text-start px-3 flex">
                                    <div id="" class="ms-2 cursor-pointer detail-item">
                                        {{ $st->name }}
                                        <p class="w-24 text-xs text-slate-500 overflow-hidden h-4">
                                            {{ $st->description ?? 'Tidak Ada' }}
                                        </p>
                                    </div>
                                </td>
                                <td class="py-3 text-start px-3">{{ $st->collaboration->name ?? 'Tidak Ada' }}</td>
                                <td class="py-3 text-start px-3">{{ $st->formatted_value }}</td>
                                <td class="py-3 text-start px-3 items-center">
                                    <div
                                        class="rounded-full bg-lime-50 border px-2 mx-auto items-center inline-flex font-fredokaRegular {{ $st->type == 'Rutin' ? 'text-green-600 border-green-600' : ($st->type == 'Sekali' ? 'text-amber-400 border-amber-400' : '') }}">
                                        {{ $st->type }}
                                    </div>
                                </td>
                                <td class="py-3 text-start px-3">
                                    {!! $st->formatted_date_start . ($st->date_end ? '<br>' . $st->formatted_date_end : '') !!}
                                </td>
                                <td class="py-3 text-start px-3">
                                    {{ $st->interval == null ? 'Tidak Ada' : $st->interval . ' bulan' }}</td>
                                <td class="py-3 text-start px-3 min-w-[150px]">
                                    <div class="flex">
                                        <a href="{{ route('userCashEdit', $st) }}"
                                            class="w-[54px] px-3.5 py-2 hover:bg-amber-400 rounded-lg shadow border border-amber-400 justify-center items-center gap-2 inline-flex group">
                                            <div
                                                class="group-hover:text-white text-amber-400 text-sm font-normal font-fredokaRegular leading-none">
                                                Edit</div>
                                        </a>
                                        <form action="{{ route('userCashDestroy', $st) }}" method="POST"
                                            class="px-1">
                                            @method('delete')
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <button
                                                class="w-[68px] px-3.5 py-2 hover:bg-red-500 rounded-lg shadow border border-red-500 justify-center items-center gap-2 inline-flex group">
                                                <div
                                                    class="group-hover:text-white text-red-500 text-sm font-normal font-fredokaRegular leading-none">
                                                    Hapus</div>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </body>
                </table>
            </div>

            {{-- Make navigator working --}}
            <div class="flex justify-between mt-4 px-4">
                <a href="{{ $cashes->previousPageUrl() }}"
                    class="px-2 h-10 rounded-lg border border-gray-400 text-sm font-normal font-fredokaRegular items-center flex text-zinc-700">
                    <svg class="me-2" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M19 11H7.135L10.768 6.64C11.122 6.216 11.064 5.585 10.64 5.232C10.215 4.878 9.585 4.936 9.232 5.36L4.232 11.36C4.193 11.407 4.173 11.462 4.144 11.514C4.12 11.556 4.091 11.592 4.073 11.638C4.028 11.753 4.001 11.874 4.001 11.996C4.001 11.997 4 11.999 4 12C4 12.001 4.001 12.003 4.001 12.004C4.001 12.126 4.028 12.247 4.073 12.362C4.091 12.408 4.12 12.444 4.144 12.486C4.173 12.538 4.193 12.593 4.232 12.64L9.232 18.64C9.43 18.877 9.714 19 10 19C10.226 19 10.453 18.924 10.64 18.768C11.064 18.415 11.122 17.784 10.768 17.36L7.135 13H19C19.552 13 20 12.552 20 12C20 11.448 19.552 11 19 11Z"
                            fill="#394149" />
                        <mask id="mask0_891_4759" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="4" y="5"
                            width="16" height="14">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M19 11H7.135L10.768 6.64C11.122 6.216 11.064 5.585 10.64 5.232C10.215 4.878 9.585 4.936 9.232 5.36L4.232 11.36C4.193 11.407 4.173 11.462 4.144 11.514C4.12 11.556 4.091 11.592 4.073 11.638C4.028 11.753 4.001 11.874 4.001 11.996C4.001 11.997 4 11.999 4 12C4 12.001 4.001 12.003 4.001 12.004C4.001 12.126 4.028 12.247 4.073 12.362C4.091 12.408 4.12 12.444 4.144 12.486C4.173 12.538 4.193 12.593 4.232 12.64L9.232 18.64C9.43 18.877 9.714 19 10 19C10.226 19 10.453 18.924 10.64 18.768C11.064 18.415 11.122 17.784 10.768 17.36L7.135 13H19C19.552 13 20 12.552 20 12C20 11.448 19.552 11 19 11Z"
                                fill="white" />
                        </mask>
                        <g mask="url(#mask0_891_4759)">
                            <rect width="24" height="24" fill="#394149" />
                        </g>
                    </svg>
                    <p class="hidden sm:block">Sebelumnya</p>
                </a>
                <div class="flex">
                    @for ($i = 1; $i <= $pages; $i++)
                        <a href="{{ $cashes->url($i) }}"
                            class="w-8 p-2.5 bg-gray-50 rounded-lg flex-col justify-center items-center gap-2.5 inline-flex @if ($page == $i) bg-lime-600 text-white @endif">
                            <div class="text-sm font-normal font-fredokaRegular leading-tight">
                                {{ $i }}</div>
                        </a>
                    @endfor
                </div>
                <a href="{{ $cashes->nextPageUrl() }}"
                    class="px-2 h-10 rounded-lg border border-gray-400 text-sm font-normal font-fredokaRegular items-center flex text-zinc-700">
                    <p class="hidden sm:block">Selanjutnya</p>
                    <svg class="ms-2" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M5 13H16.865L13.232 17.36C12.878 17.784 12.936 18.415 13.36 18.768C13.785 19.122 14.415 19.064 14.769 18.64L19.769 12.64C19.808 12.593 19.827 12.538 19.856 12.486C19.88 12.444 19.909 12.408 19.927 12.362C19.972 12.247 19.999 12.126 19.999 12.004C19.999 12.003 20 12.001 20 12C20 11.999 19.999 11.997 19.999 11.996C19.999 11.874 19.972 11.753 19.927 11.638C19.909 11.592 19.88 11.556 19.856 11.514C19.827 11.462 19.808 11.407 19.769 11.36L14.769 5.36C14.57 5.123 14.286 5 14 5C13.774 5 13.547 5.076 13.36 5.232C12.936 5.585 12.878 6.216 13.232 6.64L16.865 11H5C4.448 11 4 11.448 4 12C4 12.552 4.448 13 5 13Z"
                            fill="#394149" />
                        <mask id="mask0_891_5404" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="4" y="5"
                            width="16" height="14">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M5 13H16.865L13.232 17.36C12.878 17.784 12.936 18.415 13.36 18.768C13.785 19.122 14.415 19.064 14.769 18.64L19.769 12.64C19.808 12.593 19.827 12.538 19.856 12.486C19.88 12.444 19.909 12.408 19.927 12.362C19.972 12.247 19.999 12.126 19.999 12.004C19.999 12.003 20 12.001 20 12C20 11.999 19.999 11.997 19.999 11.996C19.999 11.874 19.972 11.753 19.927 11.638C19.909 11.592 19.88 11.556 19.856 11.514C19.827 11.462 19.808 11.407 19.769 11.36L14.769 5.36C14.57 5.123 14.286 5 14 5C13.774 5 13.547 5.076 13.36 5.232C12.936 5.585 12.878 6.216 13.232 6.64L16.865 11H5C4.448 11 4 11.448 4 12C4 12.552 4.448 13 5 13Z"
                                fill="white" />
                        </mask>
                        <g mask="url(#mask0_891_5404)">
                            <rect width="24" height="24" fill="#394149" />
                        </g>
                    </svg>
                </a>
            </div>
        </div>
    </div>
    <!-- end body -->
    </div>
    <!-- end main -->
@endsection

@section('filter')
    <div class="w-full h-full bg-[rgba(0,0,0,0.5)] fixed z-10 top-0 left-0 justify-end hidden" id="bgFilter"></div>
    <div class="h-full w-80 bg-white py-4 px-4 fixed z-20 top-0 right-0 hidden" id="menuFilter">
        <a id="closeFilter">
            <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M20.1214 18L26.5609 11.5605C27.1474 10.974 27.1474 10.026 26.5609 9.43951C25.9744 8.85301 25.0264 8.85301 24.4399 9.43951L18.0004 15.879L11.5609 9.43951C10.9744 8.85301 10.0264 8.85301 9.43988 9.43951C8.85337 10.026 8.85337 10.974 9.43988 11.5605L15.8794 18L9.43988 24.4395C8.85337 25.026 8.85337 25.974 9.43988 26.5605C9.73237 26.853 10.1164 27 10.5004 27C10.8844 27 11.2684 26.853 11.5609 26.5605L18.0004 20.121L24.4399 26.5605C24.7324 26.853 25.1164 27 25.5004 27C25.8844 27 26.2684 26.853 26.5609 26.5605C27.1474 25.974 27.1474 25.026 26.5609 24.4395L20.1214 18Z"
                    fill="#231F20" />
                <mask id="mask0_668_6349" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="9" y="8"
                    width="19" height="19">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M20.1214 18L26.5609 11.5605C27.1474 10.974 27.1474 10.026 26.5609 9.43951C25.9744 8.85301 25.0264 8.85301 24.4399 9.43951L18.0004 15.879L11.5609 9.43951C10.9744 8.85301 10.0264 8.85301 9.43988 9.43951C8.85337 10.026 8.85337 10.974 9.43988 11.5605L15.8794 18L9.43988 24.4395C8.85337 25.026 8.85337 25.974 9.43988 26.5605C9.73237 26.853 10.1164 27 10.5004 27C10.8844 27 11.2684 26.853 11.5609 26.5605L18.0004 20.121L24.4399 26.5605C24.7324 26.853 25.1164 27 25.5004 27C25.8844 27 26.2684 26.853 26.5609 26.5605C27.1474 25.974 27.1474 25.026 26.5609 24.4395L20.1214 18Z"
                        fill="white" />
                </mask>
                <g mask="url(#mask0_668_6349)">
                    <rect width="36" height="36" fill="#0D1C2E" />
                </g>
            </svg>
        </a>
        <div class="border-b">
            <label for="kas" class="block">Tipe kas</label>
            <select name="kas" id="kas" class="w-full outline-none border p-2 rounded-lg mt-2 mb-4">
                <option value="semuaTipe">Semua tipe</option>
                <option value="Luring">Luring</option>
                <option value="Daring">Daring</option>
            </select>
        </div>
        <div class="border-b mt-4">
            <label for="harga" class="block">Dana kas</label>
            <input type="number" id="harga" class="w-full outline-none border p-2 rounded-lg mt-2"
                placeholder="Harga minimum">
            <input type="number" id="harga" class="w-full outline-none border p-2 rounded-lg mt-2 mb-4"
                placeholder="Harga maksimum">
        </div>
        <div class="border-b mt-4">
            <label for="kegiatan1" class="block">Tipe kas</label>
            <select name="kegiatan1" id="kegiatan1" class="w-full outline-none border p-2 rounded-lg mt-2 mb-4">
                <option value="semuaTipe">Semua tipe</option>
                <option value="Luring">Luring</option>
                <option value="Daring">Daring</option>
            </select>
        </div>
        <div class="border-b mt-4">
            <label for="pelaksanaan" class="block">Pelaksanaan kas</label>
            <select name="pelaksanaan id=" pelaksanaan class="w-full outline-none border p-2 rounded-lg mt-2 mb-4">
                <option value="semuaWaktu">Semua waktu</option>
                <option value="Luring">Luring</option>
                <option value="Daring">Daring</option>
            </select>
        </div>
        <div class="border-b mt-4">
            <label for="pelaksanaan" class="block">Urutkan</label>
            <div class="flex">
                <select name="pelaksanaan id=" pelaksanaan class=" outline-none border p-2 rounded-lg mt-2 mb-4">
                    <option value="dana">Dana</option>
                    <option value="Luring">Luring</option>
                    <option value="Daring">Daring</option>
                </select>
                <select name="pelaksanaan id=" pelaksanaan
                    class=" outline-none border p-2 rounded-lg mt-2 mb-4 w-1/3 ms-6">
                    <option value="menaik">Menaik</option>
                    <option value="menurun">Menurun</option>
                </select>
            </div>
        </div>
        <div class="text-end">
            <button type="submit" class="py-2 px-10 rounded-lg text-white bg-lime-600 mt-3">Cari</button>
        </div>
    </div>
    <!-- end filter -->
    <!-- detail kas -->
    <div class="hidden w-full h-full bg-[rgba(0,0,0,0.5)] fixed z-10 top-0 left-0 justify-end" id="bgDetail"></div>
    <div id="isiDetail"
        class="hidden sm:w-[900px] h-auto p-8 bg-white rounded-2xl fixed z-20 top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
        <div class="font-fredokaRegular pt-4">
            <p class="text-xl font-fredokaBold">Nama Kas</p>
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Neque officia quisquam blanditiis libero
            perferendis harum illo vel, voluptatum exercitationem necessitatibus ipsam voluptates, amet possimus
            voluptas enim ea. Ipsam, quisquam commodi?
        </div>
        <a id="closeDetail"
            class="px-3 py-1 bg-red-500 rounded-lg absolute text-white right-8 cursor-pointer top-4 sm:top-8">Tutup</a>
    </div>
@endsection
