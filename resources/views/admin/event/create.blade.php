@extends('layouts.app')

@section('content')
    <div class="py-8 bg-gray-50 justify-start items-start w-full border-l">
        <!-- head -->
        <div class="flex mx-10 justify-between border-b pb-4">
            <div>
                <p class="text-zinc-700 text-[28px] font-semibold font-['Fredoka'] leading-9">Tambah Kegiatan</p>
                <p class="text-slate-500 text-sm font-normal font-fredokaRegular leading-tight">Manage your team
                    members and their account permissions here</p>
            </div>
        </div>
        <!-- end head -->

        <!-- body -->
        <form action="{{ route('adminEventStore') }}" method="POST" class="mt-6 mx-10 font-fredokaRegular">
            @csrf
            <div class="border-b flex">
                <label for="judulKegiatan" class="w-40">Judul kegiatan</label>
                <input type="text" name="judulKegiatan" id="judulKegiatan"
                    class="w-full ms-24 me-40 outline-none border border-gray-400 p-2 rounded-lg mt-2 mb-4"
                    placeholder="Judul kegiatan">
            </div>
            <div class="border-b mt-3 flex">
                <label for="deskripsi" class="w-40">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" cols="30" rows="3"
                    class="outline-none border border-gray-400 p-2 rounded-lg mt-2 mb-4 w-full ms-24 me-40" placeholder="Deskripsi"></textarea>
            </div>
            <div class="border-b mt-3 flex">
                <label for="penyelenggara" class="w-40">Penyelenggara</label>
                <input type="text" name="penyelenggara" id="penyelenggara"
                    class="w-full ms-24 me-40 outline-none border border-gray-400 p-2 rounded-lg mt-2 mb-4"
                    placeholder="Nama penyelenggara">
            </div>
            <div class="border-b mt-3 flex">
                <label for="lokasi" class="w-40">Lokasi</label>
                <input type="text" name="lokasi" id="lokasi"
                    class="w-full ms-24 me-40 outline-none border border-gray-400 p-2 rounded-lg mt-2 mb-4"
                    placeholder="Lokasi kegiatan">
            </div>
            <div class="border-b mt-3 flex">
                <label for="" class="w-40">Jenis kegiatan</label>
                <div class="flex ms-24 me-40 w-full mb-4">
                    <div class="flex">
                        <input type="radio" name="jenis" id="daring">
                        <label for="daring" class="ms-2">Daring</label>
                    </div>
                    <div class="flex ms-6">
                        <input type="radio" name="jenis" id="luring">
                        <label for="luring" class="ms-2">Luring</label>
                    </div>
                </div>
            </div>
            <div class="border-b mt-3 flex">
                <label for="" class="w-40">Waktu</label>
                <div class="flex ms-24 me-40 w-full">
                    <div>
                        <label for="mulai" class="block">Tanggal mulai</label>
                        <input type="date"
                            class="outline-none text-gray-400 border border-gray-400 p-2 rounded-lg mt-2 mb-4">
                    </div>
                    <div class="ms-6">
                        <label for="selesai" class="block">Tanggal selesai</label>
                        <input type="date"
                            class="outline-none text-gray-400 border border-gray-400 p-2 rounded-lg mt-2 mb-4">
                    </div>
                </div>
            </div>
            <div class="border-b mt-3 flex">
                <label for="dana" class="w-40">Total dana</label>
                <input type="number" name="dana" id="dana"
                    class="w-full ms-24 me-40 outline-none border border-gray-400 p-2 rounded-lg mt-2 mb-4"
                    placeholder="Total dana kegiatan">
            </div>
            <div class="border-b mt-3 flex">
                <label for="gambar" class="w-40">Gambar</label>
                <input type="file" name="gambar" id="gambar"
                    class="w-full ms-24 me-40 outline-none border border-gray-400 p-2 rounded-lg mt-2 mb-4 hidden"
                    placeholder="Total dana kegiatan">
                <label for="gambar"
                    class="w-full ms-24 me-40 border border-gray-400 p-2 rounded-lg mt-2 mb-4 cursor-pointer">
                    <div class="text-center py-4">
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
            <div class="border-b mt-3 flex">
                <label for="file" class="w-[161px]">File pendukung</label>
                <input type="file" name="file" id="file"
                    class="w-full ms-24 me-40 outline-none border border-gray-400 p-2 rounded-lg mt-2 mb-4 hidden"
                    placeholder="Total dana kegiatan">
                <label for="file"
                    class="w-full ms-24 me-40 border border-gray-400 p-2 rounded-lg mt-2 mb-4 cursor-pointer">
                    <div class="text-center py-4">
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
            <div class="flex justify-end mt-4 me-40">
                <a href="{{ route('adminEvent') }}"
                    class="px-2 h-10 rounded-lg border border-gray-400 text-sm font-normal font-fredokaRegular items-center flex text-zinc-700">
                    Batal</a>
                <button
                    class="px-4 h-10 rounded-lg border border-lime-600 bg-lime-600 text-white text-sm font-normal font-fredokaRegular items-center flex ms-3">Simpan</button>
            </div>
        </form>
        <!-- end body -->
    </div>
@endsection
