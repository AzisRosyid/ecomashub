@extends('layouts.app')

@section('content')
    <!-- main -->
    <div class="py-8 bg-gray-50 justify-start items-start w-full border-l">
        <!-- head -->
        <div class="flex mx-10 justify-between border-b pb-4">
            <div>
                <p class="text-zinc-700 text-[28px] font-semibold font-['Fredoka'] leading-9">Kegiatan</p>
                <p class="text-slate-500 text-sm font-normal font-fredokaRegular leading-tight">Manage your team
                    members and their account permissions here</p>
            </div>
            <div class="flex justify-between">
                <form action="post" class="">
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
                <a href="{{ route('adminEventCreate') }}"
                    class="px-2 h-10 rounded-lg border border-lime-600 bg-lime-600 text-white text-sm font-normal font-fredokaRegular items-center flex ms-3">
                    <svg class="me-1" width="16" height="16" viewBox="0 0 16 16" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M15 7H9V1C9 0.447 8.552 0 8 0C7.448 0 7 0.447 7 1V7H1C0.448 7 0 7.447 0 8C0 8.553 0.448 9 1 9H7V15C7 15.553 7.448 16 8 16C8.552 16 9 15.553 9 15V9H15C15.552 9 16 8.553 16 8C16 7.447 15.552 7 15 7Z"
                            fill="#ffffff" />
                    </svg> Tambah
                    kegiatan</a>
            </div>
        </div>
        <!-- end head -->

        <!-- body -->
        <div class="mx-10 pt-8">
            <div class="flex justify-between">
                <form action="post">
                    <input type="text" class="p-2 bg-white rounded-md border border-gray-400" placeholder="search">
                </form>
                <button id="filter"
                    class="px-2 h-10 rounded-lg border border-gray-400 text-sm font-normal font-fredokaRegular items-center flex text-zinc-700">
                    <svg class="me-1" width="24" height="24" viewBox="0 0 24 24" fill="none"
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
                    </svg> Filter</button>
            </div>
            <div class="border rounded-lg mt-4 py-3">
                <div class="flex justify-between px-6">
                    <div>
                        <p class="text-zinc-700 text-lg font-semibold font-['Fredoka'] leading-9">Semua kegiatan</p>
                    </div>
                    <div class="justify-end flex">
                        <button
                            class="px-2 h-10 rounded-lg border border-gray-400 text-sm font-normal font-fredokaRegular items-center flex text-zinc-700 border-none">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M12 7C13.104 7 14 6.104 14 5C14 3.896 13.104 3 12 3C10.896 3 10 3.896 10 5C10 6.104 10.896 7 12 7ZM12 10C10.896 10 10 10.896 10 12C10 13.104 10.896 14 12 14C13.104 14 14 13.104 14 12C14 10.896 13.104 10 12 10ZM10 19C10 17.896 10.896 17 12 17C13.104 17 14 17.896 14 19C14 20.104 13.104 21 12 21C10.896 21 10 20.104 10 19Z"
                                    fill="#798999" />
                                <mask id="mask0_608_5274" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="10"
                                    y="3" width="4" height="18">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M12 7C13.104 7 14 6.104 14 5C14 3.896 13.104 3 12 3C10.896 3 10 3.896 10 5C10 6.104 10.896 7 12 7ZM12 10C10.896 10 10 10.896 10 12C10 13.104 10.896 14 12 14C13.104 14 14 13.104 14 12C14 10.896 13.104 10 12 10ZM10 19C10 17.896 10.896 17 12 17C13.104 17 14 17.896 14 19C14 20.104 13.104 21 12 21C10.896 21 10 20.104 10 19Z"
                                        fill="white" />
                                </mask>
                                <g mask="url(#mask0_608_5274)">
                                    <rect width="24" height="24" fill="#798999" />
                                </g>
                            </svg>
                        </button>
                    </div>
                </div>
                <table class="font-fredokaRegular text-zinc-700 w-full mt-2 text-sm font-normal">

                    <head class="">
                        <tr>
                            <th class="bg-gray-200 py-3 text-start px-3">Judul kegiatan</th>
                            <th class="bg-gray-200 py-3 text-start px-3">Penyelenggara</th>
                            <th class="bg-gray-200 py-3 text-start px-3">Dana</th>
                            <th class="bg-gray-200 py-3 text-start px-3">Tipe</th>
                            <th class="bg-gray-200 py-3 text-start px-3">Tanggal</th>
                        </tr>
                    </head>

                    <body>
                        <tr class="border-b">
                            <td class="py-3 text-start px-3">Tanam Ubi</td>
                            <td class="py-3 text-start px-3">Lorem ipsum</td>
                            <td class="py-3 text-start px-3">Rp 302.000,00</td>
                            <td class="py-3 text-start px-3">Luring</td>
                            <td class="py-3 text-start px-3">18 Jan, 2024 - 18 Jan, 2024</td>
                        </tr>
                        <tr class="border-b">
                            <td class="py-3 text-start px-3">Tanam Ubi</td>
                            <td class="py-3 text-start px-3">Lorem ipsum</td>
                            <td class="py-3 text-start px-3">Rp 302.000,00</td>
                            <td class="py-3 text-start px-3">Luring</td>
                            <td class="py-3 text-start px-3">18 Jan, 2024 - 18 Jan, 2024</td>
                        </tr>
                    </body>
                </table>
            </div>
        </div>
        <!-- end body -->
    </div>
@endsection

@section('filter')
    <div class="w-full h-full bg-[rgba(0,0,0,0.5)] fixed z-10 top-0 left-0 flex justify-end hidden" id="bgFilter"></div>
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
        <form action="post" class="mt-6">
            <div class="border-b">
                <label for="kegiatan" class="block">Tipe kegiatan</label>
                <select name="kegiatan" id="kegiatan" class="w-full outline-none border p-2 rounded-lg mt-2 mb-4">
                    <option value="Luring">Luring</option>
                    <option value="Daring">Daring</option>
                </select>
            </div>
            <div class="border-b mt-3">
                <label for="harga" class="block">Dana</label>
                <input type="number" id="harga" class="w-full outline-none border p-2 rounded-lg mt-2"
                    placeholder="Harga minimum">
                <input type="number" id="harga" class="w-full outline-none border p-2 rounded-lg mt-2 mb-4"
                    placeholder="Harga maksimum">
            </div>
        </form>
    </div>
@endsection
