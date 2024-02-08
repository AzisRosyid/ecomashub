@extends('layouts.app')

@section('content')
    <!-- main -->
    <div class="py-8 bg-gray-50 justify-start items-start w-full border-l">
        <a href="{{ route('adminOrder') }}" class="mx-2 sm:mx-10 text-green-600 text-sm font-medium flex">
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
                <p class="text-zinc-700 text-[28px] font-semibold font-fredokaBold leading-9">Edit Pesanan</p>
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
        <form action="{{ route('adminOrderUpdate', $order) }}" method="POST"
            class="mt-6 sm:mx-10 mx-2 font-fredokaRegular">
            @method('put')
            @csrf
            <div class="border-b mt-3 sm:flex">
                <label for="nama" class="sm:w-40 block">Nama*</label>
                <input type="text" name="name" id="nama"
                    class="sm:w-[600px] outline-none border border-gray-400 p-2 rounded-lg mt-2 mb-4"
                    placeholder="Nama pemesan" value="{{ old('name') ?? $order->name }}" required>
            </div>
            <div class="border-b mt-3 sm:flex">
                <label for="deskripsi" class="sm:w-40 block">Deskripsi</label>
                <textarea name="description" id="deskripsi" cols="30" rows="3"
                    class="outline-none border border-gray-400 p-2 rounded-lg mt-2 mb-4 sm:w-[600px]" placeholder="Deskripsi">{{ old('description') ?? $order->description }}</textarea>
            </div>
            <div class="border-b mt-3 sm:flex">
                <label for="uangMuka" class="sm:w-40 block">Uang Muka*</label>
                <input type="number" name="down_payment" id="uangMuka"
                    class="sm:w-[600px] outline-none border border-gray-400 p-2 rounded-lg mt-2 mb-4" placeholder="0"
                    value="{{ old('down_payment') ?? $order->down_payment }}" required>
            </div>
            <div class="border-b mt-3 sm:flex">
                <label for="" class="sm:w-40 block">Waktu</label>
                <div class="flex sm:w-[600px]">
                    <div>
                        <label for="mulai" class="block">Tanggal mulai</label>
                        <input type="datetime-local" name="date_start"
                            class="outline-none border border-gray-400 p-2 rounded-lg mt-2 mb-4"
                            value="{{ old('date_start') ?? $order->date_start }}">
                    </div>
                    <div class="ms-6">
                        <label for="selesai" class="block">Tanggal selesai</label>
                        <input type="datetime-local" name="date_end"
                            class="outline-none border border-gray-400 p-2 rounded-lg mt-2 mb-4"
                            value="{{ old('date_end') ?? $order->date_end }}">
                    </div>
                </div>
            </div>
            <div class="border-b mt-3 sm:flex">
                <label for="" class="sm:w-40 block">Status*</label>
                <div class="flex sm:w-[600px] mb-4">
                    @foreach ($status as $index => $st)
                        <div class="flex @if ($index > 0) ms-6 @endif">
                            <input type="radio" name="status" value="{{ $st }}" id="{{ strtolower($st) }}"
                                @if ($index === 0) required @endif
                                @if ((old('status') ?? $order->status) == $st) checked @endif>
                            <label for="{{ strtolower($st) }}" class="ms-2">{{ $st }}</label>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="mt-3 sm:flex">
                <label for="" class="sm:w-40 block">Produk*</label>
                <div id="detail">
                    <a
                        class="relative px-2 h-10 rounded-lg border border-gray-400 bg-white text-sm font-normal font-fredokaRegular items-center cursor-pointer inline-flex">
                        <div class="border-black border-2 me-1 p-1 rounded-full">
                            <svg class="" width="12" height="12" viewBox="0 0 16 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M15 7H9V1C9 0.447 8.552 0 8 0C7.448 0 7 0.447 7 1V7H1C0.448 7 0 7.447 0 8C0 8.553 0.448 9 1 9H7V15C7 15.553 7.448 16 8 16C8.552 16 9 15.553 9 15V9H15C15.552 9 16 8.553 16 8C16 7.447 15.552 7 15 7Z"
                                    fill="#111111" />
                            </svg>
                        </div>
                        <p>Tambah Produk</p>
                        <div class="product-modal-show w-full h-full absolute left-0 rounded-lg"></div>
                    </a>
                    <div class="sm:flex sm:w-[600px] mt-2"></div>
                    <div id="productInput" oldid="{{ json_encode(old('product_id') ?? $order->old_detail_id) }}"
                        oldname="{{ json_encode(old('product_name') ?? $order->old_detail_name) }}"
                        oldquantity="{{ json_encode(old('product_quantity') ?? $order->old_detail_quantity) }}"></div>
                    <div class="grid grid-cols-8 sm:grid-cols-12">
                        <div class="col-span-3 items-center flex">
                            <hr class="border border-gray-400 w-full">
                        </div>
                        <div class="col-span-2 flex justify-center">
                            <div class="border border-gray-400 p-2 rounded-lg cursor-pointer relative">
                                <a class="">
                                    <svg class="" width="16" height="16" viewBox="0 0 16 16"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M15 7H9V1C9 0.447 8.552 0 8 0C7.448 0 7 0.447 7 1V7H1C0.448 7 0 7.447 0 8C0 8.553 0.448 9 1 9H7V15C7 15.553 7.448 16 8 16C8.552 16 9 15.553 9 15V9H15C15.552 9 16 8.553 16 8C16 7.447 15.552 7 15 7Z"
                                            fill="#111111" />
                                    </svg>
                                </a>
                                <div class="product-modal-show w-full h-full absolute left-0 rounded-lg top-0">
                                </div>
                            </div>
                        </div>
                        <div class="col-span-3 items-center flex">
                            <hr class="border border-gray-400 w-full">
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex justify-end mt-4">
                <a href="{{ route('adminOrder') }}"
                    class="px-2 h-10 rounded-lg border border-gray-400 text-sm font-normal font-fredokaRegular items-center flex text-zinc-700">
                    Batal</a>
                <button
                    class="px-4 h-10 rounded-lg border border-amber-400 bg-amber-400 text-white text-sm font-normal font-fredokaRegular items-center flex ms-3">Update
                    Pesanan</button>
            </div>
        </form>
        <!-- end body -->
    </div>
    <!-- end main -->
@endsection

@section('modal')
    <div class="hidden w-full h-full bg-[rgba(0,0,0,0.5)] fixed z-10 top-0 left-0 justify-end" id="productModal"
        {{-- id="bgDetail" --}}></div>
    <div {{-- id="isiDetail" --}} id="productModalContent"
        class="hidden lg:w-[900px] h-auto p-8 bg-white rounded-2xl grid sm:grid-cols-6 fixed z-20 top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-full overflow-x-scroll sm:overflow-auto">
        <div class="col-span-6">
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

                    <input id="productModalSearch" type="text" class="outline-none ms-2 w-full"
                        placeholder="Cari produk">
                </div>
            </div>
        </div>
        <div class="border rounded-lg mt-4 py-3 col-span-6">
            <div class="flex justify-between px-6">
                <div class="flex gap-2">
                    <p class="text-zinc-700 text-lg font-semibold font-fredokaBold leading-9">Semua Produk</p>
                    <div class="items-center inline-flex">
                        <div id="productModalTotal"
                            class="rounded-full bg-lime-50 border border-green-600 items-center inline-flex text-xs font-fredokaRegular text-green-600 h-5 px-2 mx-auto">
                        </div>
                    </div>
                </div>
                <div class="justify-end items-center inline-flex">
                    <p class="hidden sm:block">Tampilkan</p>
                    <div>
                        <select name="" id="productModalPick"
                            class="outline-none border border-slate-500 rounded-lg mx-3">
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                    </div>
                    <p class="hidden sm:block">data</p>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table id="detail" class="font-fredokaRegular text-zinc-700 w-full mt-2 text-sm font-normal">

                    <div class="">
                        <tr>
                            <th class="bg-gray-200 py-3 text-start px-3">Nama</th>
                            <th class="bg-gray-200 py-3 text-start px-3">Kategori</th>
                            <th class="bg-gray-200 py-3 text-start px-3">Berat</th>
                            <th class="bg-gray-200 py-3 text-start px-3">Harga</th>
                            <th class="bg-gray-200 py-3 text-start px-3">Stok</th>
                            <th class="bg-gray-200 py-3 text-start px-3"></th>
                        </tr>
                    </div>

                    <tbody id="productModalTable" defaultImg='{{ Vite::asset('resources/images/logo.png') }}'>

                    </tbody>
                </table>
            </div>
            <div class="flex justify-between mt-4 px-4">
                <button id="productModalPrev"
                    class="px-2 h-10 rounded-lg border border-gray-400 text-sm font-normal font-fredokaRegular items-center flex text-zinc-700 product-modal-navigator">
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
                </button>
                <div id="productModalPages" class="flex"></div>
                <button id="productModalNext"
                    class="px-2 h-10 rounded-lg border border-gray-400 text-sm font-normal font-fredokaRegular items-center flex text-zinc-700 product-modal-navigator">
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
                </button>
            </div>
        </div>
        <div class="col-span-6 gap-3 flex justify-end mt-3">
            <a id="productModalCancel"
                class="px-3 py-2 border border-gray-400 rounded-lg right-8 cursor-pointer top-4 sm:top-8 product-modal-close">Batal
            </a>
            <button id="productModalSave"
                class="px-3 py-2 bg-lime-600 text-white rounded-lg right-8 cursor-pointer flex gap-2 items-center product-modal-close">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-floppy" viewBox="0 0 16 16">
                    <path d="M11 2H9v3h2z" />
                    <path
                        d="M1.5 0h11.586a1.5 1.5 0 0 1 1.06.44l1.415 1.414A1.5 1.5 0 0 1 16 2.914V14.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 14.5v-13A1.5 1.5 0 0 1 1.5 0M1 1.5v13a.5.5 0 0 0 .5.5H2v-4.5A1.5 1.5 0 0 1 3.5 9h9a1.5 1.5 0 0 1 1.5 1.5V15h.5a.5.5 0 0 0 .5-.5V2.914a.5.5 0 0 0-.146-.353l-1.415-1.415A.5.5 0 0 0 13.086 1H13v4.5A1.5 1.5 0 0 1 11.5 7h-7A1.5 1.5 0 0 1 3 5.5V1H1.5a.5.5 0 0 0-.5.5m3 4a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5V1H4zM3 15h10v-4.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5z" />
                </svg>
                Simpan
            </button>
        </div>
        <!-- filter -->
        <div class="w-full h-full bg-[rgba(0,0,0,0.5)] fixed z-10 top-0 left-0 justify-end hidden" id="bgFilter"></div>
        <div class="h-full w-80 bg-white py-4 px-4 fixed z-20 top-0 right-0 hidden" id="menuFilter">
            <a id="closeFilter">
                <svg width="36" height="36" viewBox="0 0 36 36" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
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
            <div>
                <div class="border-b">
                    <label for="tipe" class="block">Jenis</label>
                    <select name="tipe" id="tipe" class="w-full outline-none border p-2 rounded-lg mt-2 mb-4">
                        <option value="semuaJenis">Semua Jenis</option>
                    </select>
                </div>
                <div class="border-b mt-4">
                    <label for="pelaksanaan" class="block">Urutkan</label>
                    <div class="flex">
                        <select name="pelaksanaan id=" pelaksanaan class=" outline-none border p-2 rounded-lg mt-2 mb-4">
                            <option value="rutin">Jumlah</option>
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
        </div>
        <!-- end filter -->
    </div>
    <!-- akhir detail -->
@endsection
