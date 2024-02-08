@extends('layouts.app')

@section('content')
    <!-- main dashboard -->
    <div class="py-4 sm:py-8 bg-gray-50 justify-start items-start w-full border-l">
        <!-- head -->
        <div class="flex mx-4 sm:mx-10 justify-between border-b pb-4">
            <div>
                <div class="flex gap-2">
                    <p class="text-zinc-700 text-2xl sm:text-[28px] font-semibold font-fredokaBold leading-9">
                        Dashboard
                    </p>
                    <div class="items-center inline-flex w-auto text-center">
                        <div
                            class="rounded-full bg-lime-50 border border-green-600 items-center inline-flex text-xs font-fredokaRegular text-green-600 h-5 px-2 mx-auto w-[100px] justify-center">
                            10/20 seats
                        </div>
                    </div>
                </div>
                <p class="text-slate-500 text-sm font-normal font-fredokaRegular leading-tight hidden sm:block">
                    Manage your team
                    members and their account permissions here</p>
            </div>
            <div class=" w-1/2">
                <form action="post" class="text-end hidden lg:block">
                    <button
                        class="px-4 py-2.5 rounded-lg border border-gray-400 text-gray-400 text-sm font-normal font-fredokaRegular items-center">secondary</button>
                    <button
                        class="px-4 py-2.5 rounded-lg border border-lime-600 bg-lime-600 text-white text-sm font-normal font-fredokaRegular items-center">primary</button>
                    <input type="text" class="p-2 bg-white rounded-md border border-gray-400" placeholder="search">
                </form>
                <button id="hamburger" name="hamburger" type="button" class="block absolute right-4 lg:hidden">
                    <span class="hamburger-line transition duration-300 ease-in-out origin-top-left"></span>
                    <span class="hamburger-line transition duration-300 ease-in-out"></span>
                    <span class="hamburger-line transition duration-300 ease-in-out origin-bottom-left"></span>
                </button>
            </div>
        </div>
        <!-- akhir head -->
        <!-- body -->
        <div class="mx-4 sm:mx-10 bg-gray-50 mt-4">
            <div class="block lg:hidden mt-2">
                <form action="post" class="flex gap-1">
                    <button
                        class="px-2 py-2 rounded-lg border border-gray-400 text-gray-400 text-xs font-normal font-fredokaRegular items-center">secondary</button>
                    <button
                        class="px-2 py-2 rounded-lg border border-lime-600 bg-lime-600 text-white text-xs font-normal font-fredokaRegular items-center">primary</button>
                    <input type="text" class="p-1 bg-white rounded-md border border-gray-400" placeholder="search">
                </form>
            </div>
            <!-- cart -->
            <div class="sm:grid grid-cols-12 gap-3">
                <div class="col-span-4 p-2 border rounded-lg">
                    <p class="text-slate-600 font-fredokaBold text-2xl">Keuntungan</p>
                    <p class="flex text-green-500 gap-1 items-center">
                        <svg class="" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                            fill="currentColor" class="bi bi-caret-up-fill" viewBox="0 0 16 16">
                            <path
                                d="m7.247 4.86-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z" />
                        </svg>
                        +2.45%
                    </p>
                    <canvas id="keuntungan"></canvas>
                </div>
                <div class="col-span-4 p-2 border rounded-lg">
                    <p class="text-slate-600 font-fredokaBold text-2xl">Pengeluaran</p>
                    <p class="flex text-red-500 gap-1 items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                            <path
                                d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z" />
                        </svg>
                        -2.45%
                    </p>
                    <canvas id="pengeluaran"></canvas>
                </div>
                <div class="col-span-4 p-2 border rounded-lg">
                    <p class="text-slate-600 font-fredokaBold text-2xl">Pesanan</p>
                    <p class="flex text-green-500 gap-1 items-center">
                        <svg class="" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                            fill="currentColor" class="bi bi-caret-up-fill" viewBox="0 0 16 16">
                            <path
                                d="m7.247 4.86-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z" />
                        </svg>
                        +2.45%
                    </p>
                    <canvas id="pesanan"></canvas>
                </div>
            </div>
            <!-- akhir chart -->
            <div class="sm:grid grid-cols-12 gap-3 mt-4">
                <a href="anggota.html" class="col-span-4 flex p-2 border rounded-lg gap-3">
                    <div>
                        <svg width="65" height="65" viewBox="0 0 24 25" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M18 10.5444C18 9.99343 17.552 9.54443 17 9.54443C16.448 9.54443 16 9.99343 16 10.5444C16 11.0954 16.448 11.5444 17 11.5444C17.552 11.5444 18 11.0954 18 10.5444ZM20 10.5444C20 12.1984 18.654 13.5444 17 13.5444C15.346 13.5444 14 12.1984 14 10.5444C14 8.89043 15.346 7.54443 17 7.54443C18.654 7.54443 20 8.89043 20 10.5444ZM11 7.54443C11 6.44143 10.103 5.54443 9 5.54443C7.897 5.54443 7 6.44143 7 7.54443C7 8.64743 7.897 9.54443 9 9.54443C10.103 9.54443 11 8.64743 11 7.54443ZM13 7.54443C13 9.75043 11.206 11.5444 9 11.5444C6.794 11.5444 5 9.75043 5 7.54443C5 5.33843 6.794 3.54443 9 3.54443C11.206 3.54443 13 5.33843 13 7.54443ZM13.94 15.5904C14.809 14.9184 15.879 14.5444 17 14.5444C19.757 14.5444 22 16.7874 22 19.5444C22 20.0964 21.553 20.5444 21 20.5444C20.447 20.5444 20 20.0964 20 19.5444C20 17.8904 18.654 16.5444 17 16.5444C16.317 16.5444 15.668 16.7784 15.144 17.1934C15.688 18.1894 16 19.3314 16 20.5444C16 21.0964 15.553 21.5444 15 21.5444C14.447 21.5444 14 21.0964 14 20.5444C14 17.7874 11.757 15.5444 9 15.5444C6.243 15.5444 4 17.7874 4 20.5444C4 21.0964 3.553 21.5444 3 21.5444C2.447 21.5444 2 21.0964 2 20.5444C2 16.6844 5.141 13.5444 9 13.5444C10.927 13.5444 12.673 14.3274 13.94 15.5904Z"
                                fill="#394149" />
                            <mask id="anggota" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="2" y="3"
                                width="20" height="19">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M18 10.5444C18 9.99343 17.552 9.54443 17 9.54443C16.448 9.54443 16 9.99343 16 10.5444C16 11.0954 16.448 11.5444 17 11.5444C17.552 11.5444 18 11.0954 18 10.5444ZM20 10.5444C20 12.1984 18.654 13.5444 17 13.5444C15.346 13.5444 14 12.1984 14 10.5444C14 8.89043 15.346 7.54443 17 7.54443C18.654 7.54443 20 8.89043 20 10.5444ZM11 7.54443C11 6.44143 10.103 5.54443 9 5.54443C7.897 5.54443 7 6.44143 7 7.54443C7 8.64743 7.897 9.54443 9 9.54443C10.103 9.54443 11 8.64743 11 7.54443ZM13 7.54443C13 9.75043 11.206 11.5444 9 11.5444C6.794 11.5444 5 9.75043 5 7.54443C5 5.33843 6.794 3.54443 9 3.54443C11.206 3.54443 13 5.33843 13 7.54443ZM13.94 15.5904C14.809 14.9184 15.879 14.5444 17 14.5444C19.757 14.5444 22 16.7874 22 19.5444C22 20.0964 21.553 20.5444 21 20.5444C20.447 20.5444 20 20.0964 20 19.5444C20 17.8904 18.654 16.5444 17 16.5444C16.317 16.5444 15.668 16.7784 15.144 17.1934C15.688 18.1894 16 19.3314 16 20.5444C16 21.0964 15.553 21.5444 15 21.5444C14.447 21.5444 14 21.0964 14 20.5444C14 17.7874 11.757 15.5444 9 15.5444C6.243 15.5444 4 17.7874 4 20.5444C4 21.0964 3.553 21.5444 3 21.5444C2.447 21.5444 2 21.0964 2 20.5444C2 16.6844 5.141 13.5444 9 13.5444C10.927 13.5444 12.673 14.3274 13.94 15.5904Z"
                                    fill="white" />
                            </mask>
                            <g mask="url(#anggota)">
                                <rect y="0.544434" width="24" height="24" fill="#394149" />
                            </g>
                        </svg>
                    </div>
                    <div>
                        <p class="font-fredokaRegular">Total anggota</p>
                        <p class="font-fredokaBold text-3xl">100</p>
                    </div>
                </a>
                <a href="aset.html" class="col-span-4 flex p-2 border rounded-lg gap-3">
                    <div>
                        <svg width="65" height="65" viewBox="0 0 24 25" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M7 19.5444C6.449 19.5444 6 19.0954 6 18.5444C6 17.9934 6.449 17.5444 7 17.5444H18V19.5444H7ZM7 5.54443H18V15.5444H7C6.647 15.5444 6.314 15.6164 6 15.7284V6.54443C6 5.99343 6.449 5.54443 7 5.54443ZM19 3.54443H7C5.346 3.54443 4 4.89043 4 6.54443V18.5444C4 20.1984 5.346 21.5444 7 21.5444H18H19C19.552 21.5444 20 21.0964 20 20.5444V19.5444V17.5444V4.54443C20 3.99243 19.552 3.54443 19 3.54443Z"
                                fill="#394149" />
                            <mask id="aset" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="4" y="3"
                                width="16" height="19">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M7 19.5444C6.449 19.5444 6 19.0954 6 18.5444C6 17.9934 6.449 17.5444 7 17.5444H18V19.5444H7ZM7 5.54443H18V15.5444H7C6.647 15.5444 6.314 15.6164 6 15.7284V6.54443C6 5.99343 6.449 5.54443 7 5.54443ZM19 3.54443H7C5.346 3.54443 4 4.89043 4 6.54443V18.5444C4 20.1984 5.346 21.5444 7 21.5444H18H19C19.552 21.5444 20 21.0964 20 20.5444V19.5444V17.5444V4.54443C20 3.99243 19.552 3.54443 19 3.54443Z"
                                    fill="white" />
                            </mask>
                            <g mask="url(#aset)">
                                <rect y="0.544434" width="24" height="24" fill="#394149" />
                            </g>
                        </svg>
                    </div>
                    <div>
                        <p class="font-fredokaRegular">Total aset</p>
                        <p class="font-fredokaBold text-3xl">100</p>
                    </div>
                </a>
                <a href="produk.html" class="col-span-4 flex p-2 border rounded-lg gap-3">
                    <div>
                        <svg width="65" height="65" viewBox="0 0 24 25" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M18.6904 16.5073L13.0004 19.1513V12.4353L19.0004 9.64833V16.0833C19.0004 16.2573 18.8824 16.4193 18.6904 16.5073ZM5.30339 16.5083C5.11439 16.4203 4.99839 16.2583 5.00039 16.0763V9.64833L11.0004 12.4353V19.1533L5.30339 16.5083ZM11.7074 5.60833C11.7984 5.56533 11.8994 5.54433 12.0004 5.54433C12.1004 5.54433 12.2014 5.56533 12.2924 5.60833L17.6214 8.08233L12.0004 10.6943L6.37839 8.08233L11.7074 5.60833ZM20.6564 7.80333C20.6534 7.79533 20.6544 7.78633 20.6504 7.77833C20.6474 7.77033 20.6394 7.76533 20.6344 7.75733C20.5884 7.68133 20.5324 7.61433 20.4794 7.54433C20.4484 7.51033 20.4234 7.47233 20.3894 7.44333C20.1544 7.16733 19.8774 6.92433 19.5334 6.76533L13.1334 3.79233C13.1324 3.79233 13.1314 3.79233 13.1314 3.79133C12.4124 3.45933 11.5874 3.46033 10.8664 3.79233L4.46939 6.76433C4.12539 6.92333 3.84739 7.16533 3.61239 7.44133C3.57539 7.47233 3.54839 7.51433 3.51539 7.55133C3.46339 7.61833 3.41039 7.68333 3.36639 7.75533C3.36139 7.76433 3.35339 7.77033 3.34939 7.77833C3.34539 7.78733 3.34639 7.79633 3.34239 7.80533C3.13139 8.16733 3.00039 8.57433 3.00039 9.00233V16.0693C2.99239 17.0193 3.56439 17.9033 4.45839 18.3213L10.8574 21.2933C11.2194 21.4623 11.6074 21.5463 11.9964 21.5463C12.3844 21.5463 12.7724 21.4623 13.1334 21.2943L19.5304 18.3223C20.4224 17.9103 20.9994 17.0323 21.0004 16.0843V9.00133C20.9994 8.57333 20.8684 8.16633 20.6564 7.80333Z"
                                fill="#394149" />
                            <mask id="produk" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="3" y="3"
                                width="19" height="19">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M18.6904 16.5073L13.0004 19.1513V12.4353L19.0004 9.64833V16.0833C19.0004 16.2573 18.8824 16.4193 18.6904 16.5073ZM5.30339 16.5083C5.11439 16.4203 4.99839 16.2583 5.00039 16.0763V9.64833L11.0004 12.4353V19.1533L5.30339 16.5083ZM11.7074 5.60833C11.7984 5.56533 11.8994 5.54433 12.0004 5.54433C12.1004 5.54433 12.2014 5.56533 12.2924 5.60833L17.6214 8.08233L12.0004 10.6943L6.37839 8.08233L11.7074 5.60833ZM20.6564 7.80333C20.6534 7.79533 20.6544 7.78633 20.6504 7.77833C20.6474 7.77033 20.6394 7.76533 20.6344 7.75733C20.5884 7.68133 20.5324 7.61433 20.4794 7.54433C20.4484 7.51033 20.4234 7.47233 20.3894 7.44333C20.1544 7.16733 19.8774 6.92433 19.5334 6.76533L13.1334 3.79233C13.1324 3.79233 13.1314 3.79233 13.1314 3.79133C12.4124 3.45933 11.5874 3.46033 10.8664 3.79233L4.46939 6.76433C4.12539 6.92333 3.84739 7.16533 3.61239 7.44133C3.57539 7.47233 3.54839 7.51433 3.51539 7.55133C3.46339 7.61833 3.41039 7.68333 3.36639 7.75533C3.36139 7.76433 3.35339 7.77033 3.34939 7.77833C3.34539 7.78733 3.34639 7.79633 3.34239 7.80533C3.13139 8.16733 3.00039 8.57433 3.00039 9.00233V16.0693C2.99239 17.0193 3.56439 17.9033 4.45839 18.3213L10.8574 21.2933C11.2194 21.4623 11.6074 21.5463 11.9964 21.5463C12.3844 21.5463 12.7724 21.4623 13.1334 21.2943L19.5304 18.3223C20.4224 17.9103 20.9994 17.0323 21.0004 16.0843V9.00133C20.9994 8.57333 20.8684 8.16633 20.6564 7.80333Z"
                                    fill="white" />
                            </mask>
                            <g mask="url(#produk)">
                                <rect y="0.544434" width="24" height="24" fill="#394149" />
                            </g>
                        </svg>
                    </div>
                    <div>
                        <p class="font-fredokaRegular">Total produk</p>
                        <p class="font-fredokaBold text-3xl">100</p>
                    </div>
                </a>
                <a href="pemasok.html" class="col-span-4 flex p-2 border rounded-lg gap-3">
                    <div>
                        <svg width="65" height="65" viewBox="0 0 24 25" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M15 11.5444H13V9.54443C13 8.99443 12.55 8.54443 12 8.54443C11.45 8.54443 11 8.99443 11 9.54443V11.5444H9C8.45 11.5444 8 11.9944 8 12.5444C8 13.0944 8.45 13.5444 9 13.5444H11V15.5444C11 16.0944 11.45 16.5444 12 16.5444C12.55 16.5444 13 16.0944 13 15.5444V13.5444H15C15.55 13.5444 16 13.0944 16 12.5444C16 11.9944 15.55 11.5444 15 11.5444ZM19 18.5444C19 19.0954 18.552 19.5444 18 19.5444H6C5.448 19.5444 5 19.0954 5 18.5444V6.54443C5 5.99343 5.448 5.54443 6 5.54443H18C18.552 5.54443 19 5.99343 19 6.54443V18.5444ZM18 3.54443H6C4.346 3.54443 3 4.89043 3 6.54443V18.5444C3 20.1984 4.346 21.5444 6 21.5444H18C19.654 21.5444 21 20.1984 21 18.5444V6.54443C21 4.89043 19.654 3.54443 18 3.54443Z"
                                fill="#394149" />
                            <mask id="pemasok" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="3" y="3"
                                width="18" height="19">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M15 11.5444H13V9.54443C13 8.99443 12.55 8.54443 12 8.54443C11.45 8.54443 11 8.99443 11 9.54443V11.5444H9C8.45 11.5444 8 11.9944 8 12.5444C8 13.0944 8.45 13.5444 9 13.5444H11V15.5444C11 16.0944 11.45 16.5444 12 16.5444C12.55 16.5444 13 16.0944 13 15.5444V13.5444H15C15.55 13.5444 16 13.0944 16 12.5444C16 11.9944 15.55 11.5444 15 11.5444ZM19 18.5444C19 19.0954 18.552 19.5444 18 19.5444H6C5.448 19.5444 5 19.0954 5 18.5444V6.54443C5 5.99343 5.448 5.54443 6 5.54443H18C18.552 5.54443 19 5.99343 19 6.54443V18.5444ZM18 3.54443H6C4.346 3.54443 3 4.89043 3 6.54443V18.5444C3 20.1984 4.346 21.5444 6 21.5444H18C19.654 21.5444 21 20.1984 21 18.5444V6.54443C21 4.89043 19.654 3.54443 18 3.54443Z"
                                    fill="white" />
                            </mask>
                            <g mask="url(#pemasok)">
                                <rect y="0.544434" width="24" height="24" fill="#394149" />
                            </g>
                        </svg>
                    </div>
                    <div>
                        <p class="font-fredokaRegular">Total pemasok</p>
                        <p class="font-fredokaBold text-3xl">100</p>
                    </div>
                </a>
                <a href="penitipan.html" class="col-span-4 flex p-2 border rounded-lg gap-3">
                    <div>
                        <svg width="65" height="65" viewBox="0 0 24 25" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M12 16.5444C11.448 16.5444 11 16.0964 11 15.5444C11 14.9924 11.448 14.5444 12 14.5444C12.552 14.5444 13 14.9924 13 15.5444C13 16.0964 12.552 16.5444 12 16.5444ZM12 12.5444C10.346 12.5444 9 13.8904 9 15.5444C9 17.1984 10.346 18.5444 12 18.5444C13.654 18.5444 15 17.1984 15 15.5444C15 13.8904 13.654 12.5444 12 12.5444ZM18 19.5444C18 20.0964 17.552 20.5444 17 20.5444H7C6.448 20.5444 6 20.0964 6 19.5444V11.5444C6 10.9924 6.448 10.5444 7 10.5444H8H10H14H16H17C17.552 10.5444 18 10.9924 18 11.5444V19.5444ZM10 6.65543C10 5.49143 10.897 4.54443 12 4.54443C13.103 4.54443 14 5.49143 14 6.65543V8.54443H10V6.65543ZM17 8.54443H16V6.65543C16 4.38943 14.206 2.54443 12 2.54443C9.794 2.54443 8 4.38943 8 6.65543V8.54443H7C5.346 8.54443 4 9.89043 4 11.5444V19.5444C4 21.1984 5.346 22.5444 7 22.5444H17C18.654 22.5444 20 21.1984 20 19.5444V11.5444C20 9.89043 18.654 8.54443 17 8.54443Z"
                                fill="#394149" />
                            <mask id="penitipan" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="4" y="2"
                                width="16" height="21">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M12 16.5444C11.448 16.5444 11 16.0964 11 15.5444C11 14.9924 11.448 14.5444 12 14.5444C12.552 14.5444 13 14.9924 13 15.5444C13 16.0964 12.552 16.5444 12 16.5444ZM12 12.5444C10.346 12.5444 9 13.8904 9 15.5444C9 17.1984 10.346 18.5444 12 18.5444C13.654 18.5444 15 17.1984 15 15.5444C15 13.8904 13.654 12.5444 12 12.5444ZM18 19.5444C18 20.0964 17.552 20.5444 17 20.5444H7C6.448 20.5444 6 20.0964 6 19.5444V11.5444C6 10.9924 6.448 10.5444 7 10.5444H8H10H14H16H17C17.552 10.5444 18 10.9924 18 11.5444V19.5444ZM10 6.65543C10 5.49143 10.897 4.54443 12 4.54443C13.103 4.54443 14 5.49143 14 6.65543V8.54443H10V6.65543ZM17 8.54443H16V6.65543C16 4.38943 14.206 2.54443 12 2.54443C9.794 2.54443 8 4.38943 8 6.65543V8.54443H7C5.346 8.54443 4 9.89043 4 11.5444V19.5444C4 21.1984 5.346 22.5444 7 22.5444H17C18.654 22.5444 20 21.1984 20 19.5444V11.5444C20 9.89043 18.654 8.54443 17 8.54443Z"
                                    fill="white" />
                            </mask>
                            <g mask="url(#penitipan)">
                                <rect y="0.544434" width="24" height="24" fill="#394149" />
                            </g>
                        </svg>
                    </div>
                    <div>
                        <p class="font-fredokaRegular">Total penitipan</p>
                        <p class="font-fredokaBold text-3xl">100</p>
                    </div>
                </a>
                <a href="waste.html" class="col-span-4 flex p-2 border rounded-lg gap-3">
                    <div>
                        <svg width="65" height="65" viewBox="0 0 24 25" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M16.8887 18.8628C16.7167 18.4298 16.4727 18.0518 16.2587 17.7288C16.1507 17.5668 16.0397 17.4018 15.9427 17.2318C15.5537 16.5558 15.6877 16.2818 16.3187 15.2248L16.4207 15.0518C16.9317 14.1908 16.9597 13.3648 16.9857 12.6368C16.9977 12.2788 17.0097 11.9418 17.0787 11.6248C17.2397 10.8928 18.7867 10.6978 19.7457 10.5828C19.9067 11.2118 19.9997 11.8668 19.9997 12.5448C19.9997 15.1138 18.7777 17.3978 16.8887 18.8628ZM4.96169 16.3438C5.59769 16.5058 6.28669 16.6178 6.98769 16.6178C8.06769 16.6178 9.17069 16.3538 10.1247 15.6068C11.8407 14.2648 11.8407 12.5488 11.8407 11.1688C11.8407 10.2768 11.8407 9.50783 12.2127 8.82483C12.4127 8.45883 12.8387 8.20483 13.3317 7.90983C13.6337 7.72883 13.9467 7.54283 14.2467 7.30683C14.8897 6.80383 15.3677 6.15683 15.6637 5.44083C17.0637 6.16583 18.2237 7.28883 18.9897 8.66383C17.5617 8.86183 15.5347 9.32983 15.1257 11.1968C15.0177 11.6908 15.0007 12.1558 14.9877 12.5668C14.9667 13.1498 14.9507 13.6108 14.7007 14.0328L14.6007 14.2008C13.9537 15.2838 13.2217 16.5118 14.2087 18.2288C14.3277 18.4368 14.4607 18.6368 14.5917 18.8358C14.9357 19.3518 15.1047 19.6368 15.1057 19.9168C14.1507 20.3208 13.1007 20.5448 11.9997 20.5448C8.9627 20.5448 6.31669 18.8428 4.96169 16.3438ZM11.9997 4.54483C12.6157 4.54483 13.2107 4.62083 13.7867 4.75283C13.6177 5.12483 13.3567 5.46383 13.0127 5.73283C12.7947 5.90483 12.5497 6.04783 12.3067 6.19283C11.6557 6.58083 10.9187 7.02083 10.4567 7.86683C9.84069 8.99683 9.84069 10.1508 9.84069 11.1688C9.84069 12.5238 9.79669 13.3248 8.89269 14.0318C7.52369 15.1048 5.42869 14.5058 4.13269 13.9608C4.05069 13.4998 3.99969 13.0278 3.99969 12.5448C3.99969 8.13383 7.5887 4.54483 11.9997 4.54483ZM11.9997 2.54483C6.48569 2.54483 1.99969 7.03083 1.99969 12.5448C1.99969 18.0578 6.48569 22.5448 11.9997 22.5448C17.5137 22.5448 21.9997 18.0578 21.9997 12.5448C21.9997 7.03083 17.5137 2.54483 11.9997 2.54483Z"
                                fill="#394149" />
                            <mask id="eco" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="1" y="2"
                                width="21" height="21">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M16.8887 18.8628C16.7167 18.4298 16.4727 18.0518 16.2587 17.7288C16.1507 17.5668 16.0397 17.4018 15.9427 17.2318C15.5537 16.5558 15.6877 16.2818 16.3187 15.2248L16.4207 15.0518C16.9317 14.1908 16.9597 13.3648 16.9857 12.6368C16.9977 12.2788 17.0097 11.9418 17.0787 11.6248C17.2397 10.8928 18.7867 10.6978 19.7457 10.5828C19.9067 11.2118 19.9997 11.8668 19.9997 12.5448C19.9997 15.1138 18.7777 17.3978 16.8887 18.8628ZM4.96169 16.3438C5.59769 16.5058 6.28669 16.6178 6.98769 16.6178C8.06769 16.6178 9.17069 16.3538 10.1247 15.6068C11.8407 14.2648 11.8407 12.5488 11.8407 11.1688C11.8407 10.2768 11.8407 9.50783 12.2127 8.82483C12.4127 8.45883 12.8387 8.20483 13.3317 7.90983C13.6337 7.72883 13.9467 7.54283 14.2467 7.30683C14.8897 6.80383 15.3677 6.15683 15.6637 5.44083C17.0637 6.16583 18.2237 7.28883 18.9897 8.66383C17.5617 8.86183 15.5347 9.32983 15.1257 11.1968C15.0177 11.6908 15.0007 12.1558 14.9877 12.5668C14.9667 13.1498 14.9507 13.6108 14.7007 14.0328L14.6007 14.2008C13.9537 15.2838 13.2217 16.5118 14.2087 18.2288C14.3277 18.4368 14.4607 18.6368 14.5917 18.8358C14.9357 19.3518 15.1047 19.6368 15.1057 19.9168C14.1507 20.3208 13.1007 20.5448 11.9997 20.5448C8.9627 20.5448 6.31669 18.8428 4.96169 16.3438ZM11.9997 4.54483C12.6157 4.54483 13.2107 4.62083 13.7867 4.75283C13.6177 5.12483 13.3567 5.46383 13.0127 5.73283C12.7947 5.90483 12.5497 6.04783 12.3067 6.19283C11.6557 6.58083 10.9187 7.02083 10.4567 7.86683C9.84069 8.99683 9.84069 10.1508 9.84069 11.1688C9.84069 12.5238 9.79669 13.3248 8.89269 14.0318C7.52369 15.1048 5.42869 14.5058 4.13269 13.9608C4.05069 13.4998 3.99969 13.0278 3.99969 12.5448C3.99969 8.13383 7.5887 4.54483 11.9997 4.54483ZM11.9997 2.54483C6.48569 2.54483 1.99969 7.03083 1.99969 12.5448C1.99969 18.0578 6.48569 22.5448 11.9997 22.5448C17.5137 22.5448 21.9997 18.0578 21.9997 12.5448C21.9997 7.03083 17.5137 2.54483 11.9997 2.54483Z"
                                    fill="white" />
                            </mask>
                            <g mask="url(#eco)">
                                <rect y="0.544434" width="24" height="24" fill="#394149" />
                            </g>
                        </svg>
                    </div>
                    <div>
                        <p class="font-fredokaRegular">Total eco-friendly</p>
                        <p class="font-fredokaBold text-3xl">100</p>
                    </div>
                </a>
            </div>
            <div class="sm:grid grid-cols-12 gap-3 mt-4" id="dashboardCalendar">
                <div class="col-span-4">
                    <div class="shadow-lg font-fredokaRegular rounded-md">
                        <div class="flex items-center justify-center gap-7 bg-green-600 text-white py-2 rounded-t-md">
                            <i class="prev">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0" />
                                </svg></i>
                            <div class="date text-center">
                                <h1 class="font-bold text-2xl"></h1>
                                <p></p>
                            </div>
                            <i class="next">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708" />
                                </svg>
                            </i>
                        </div>
                        <div class="grid grid-cols-7 text-center py-2 font-bold">
                            <div class="col-span-1">Sun</div>
                            <div class="col-span-1">Mon</div>
                            <div class="col-span-1">Tue</div>
                            <div class="col-span-1">Wed</div>
                            <div class="col-span-1">Thu</div>
                            <div class="col-span-1">Fri</div>
                            <div class="col-span-1">Sat</div>
                        </div>
                        <div class="days grid grid-cols-7"></div>
                    </div>
                </div>
                <div class="col-span-8 rounded-md border">
                    <div class="py-4 bg-slate-200 px-4">
                        <p class="font-fredokaBold text-3xl">Kegiatan</p>
                    </div>
                    <div class="px-4 font-fredokaRegular h-[298px] overflow-y-scroll">
                        <div class="flex py-3 border-b">
                            <img src="{{ Vite::asset('resources/images/logo.png') }}" alt="" class="w-12 h-12">
                            <div class="ms-3">
                                <p class="font-fredokaBold">Judul Kegiatan</p>
                                <p>Sun Feb 04 2024</p>
                            </div>
                        </div>
                        <div class="flex py-3 border-b">
                            <img src="{{ Vite::asset('resources/images/logo.png') }}" alt="" class="w-12 h-12">
                            <div class="ms-3">
                                <p class="font-fredokaBold">Judul Kegiatan</p>
                                <p>Sun Feb 04 2024</p>
                            </div>
                        </div>
                        <div class="flex py-3 border-b">
                            <img src="{{ Vite::asset('resources/images/logo.png') }}" alt="" class="w-12 h-12">
                            <div class="ms-3">
                                <p class="font-fredokaBold">Judul Kegiatan</p>
                                <p>Sun Feb 04 2024</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- akhir body -->
    </div>
    <!-- end main dashboard -->
    </section>

    <script>
        const keuntungan = document.getElementById('keuntungan');
        const pengeluaran = document.getElementById('pengeluaran');
        const pesanan = document.getElementById('pesanan');
        // chart keuntungan
        new Chart(keuntungan, {
            type: 'line',
            data: {
                labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September',
                    'Oktober', 'November', 'Desember'
                ],
                datasets: [{
                    label: 'Keuntungan',
                    data: [300000, 200000, 400000, 500000, 200000, 300000],
                    borderWidth: 2,
                    borderColor: 'green'
                }]
            },
            options: {
                tension: 0.4,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // chart pengeluaran
        new Chart(pengeluaran, {
            type: 'line',
            data: {
                labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September',
                    'Oktober', 'November', 'Desember'
                ],
                datasets: [{
                    label: 'Pengeluaran',
                    data: [12, 19, 3, 5, 2, 3],
                    borderWidth: 2,
                    borderColor: 'green'
                }]
            },
            options: {
                tension: 0.4,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // chart pesanan
        new Chart(pesanan, {
            type: 'line',
            data: {
                labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September',
                    'Oktober', 'November', 'Desember'
                ],
                datasets: [{
                    label: 'Pesanan',
                    data: [12, 19, 3, 5, 2, 3],
                    borderWidth: 2,
                    borderColor: 'green'
                }]
            },
            options: {
                tension: 0.4,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection
