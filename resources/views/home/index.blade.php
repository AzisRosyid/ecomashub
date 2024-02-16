@extends('layouts.app')

@section('content')
    <header
        class="bg-transparent .max-[1024px]:navbar-fixed absolute top-0 left-0 sm:fixed w-full flex items-center py-3 lg:py-4 sm:px-20 z-10">
        <div class="container">
            <div class="flex item-center justify-between bg-transparent relative">
                <div class="px-2 sm:px-4">
                    <a href="#">
                        <img src="{{ Vite::asset('resources/images/logo-text.png') }}" alt="EcomasHub" class="w-32 sm:w-40">
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
                                    class="sm:text-xl text-green-700 py-2 mx-8 lg:mx-3 flex group-hover:text-green-500 relative">Tentang
                                    <span
                                        class="absolute w-full h-1 bottom-0 rounded-full lg:group-hover:bg-green-700"></span>
                                </a>
                            </li>
                            <li class="group">
                                <a href="#tujuan"
                                    class="sm:text-xl text-green-700 py-2 mx-8 lg:mx-3 flex group-hover:text-green-500 relative">Tujuan
                                    <span
                                        class="absolute w-full h-1 bottom-0 rounded-full lg:group-hover:bg-green-700"></span>
                                </a>
                            </li>
                            <li class="group">
                                <a href="#mitra"
                                    class="sm:text-xl text-green-700 py-2 mx-8 lg:mx-3 flex group-hover:text-green-500 relative">Informasi
                                    Mitra
                                    <span
                                        class="absolute w-full h-1 bottom-0 rounded-full lg:group-hover:bg-green-700"></span>
                                </a>
                            </li>
                            <li class="group">
                                <a href="#publik"
                                    class="sm:text-xl text-green-700 py-2 mx-8 lg:mx-3 flex group-hover:text-green-500 relative">Informasi
                                    Publik
                                    <span
                                        class="absolute w-full h-1 bottom-0 rounded-full lg:group-hover:bg-green-700"></span>
                                </a>
                            </li>
                            <li class="group">
                                <a href="#kegiatan"
                                    class="sm:text-xl text-green-700 py-2 mx-8 lg:mx-3 flex group-hover:text-green-500 relative">Kegiatan
                                    & Produk
                                    <span
                                        class="absolute w-full h-1 bottom-0 rounded-full lg:group-hover:bg-green-700"></span>
                                </a>
                            </li>
                            <li class="group">
                                <a href="#testimoni"
                                    class="sm:text-xl text-green-700 py-2 mx-8 lg:mx-3 flex group-hover:text-green-500 relative">Testimoni
                                    <span
                                        class="absolute w-full h-1 bottom-0 rounded-full lg:group-hover:bg-green-700"></span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- navbar end -->

    <!-- hero section start -->
    <section id="home" class="pt-32 justify-center flex sm:px-20">
        <div class="container">
            <div class="flex flex-wrap">
                <div class="w-full self-center px-4 sm:w-1/2">
                    <h1 class="font-fredokaBold text-green-700 text-2xl mb-5 sm:text-4xl">Selamat Datang !👋</h1>
                    <p class="text-sm mb-10 sm:text-base">EcomasHub adalah sebuah platform yang dapat digunakan untuk
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis perferendis quidem tenetur ad
                        modi reprehenderit eaque veniam inventore placeat laudantium suscipit recusandae, excepturi
                        optio adipisci ullam provident magnam, aspernatur facilis.
                    </p>

                    <a href="#tentang"
                        class="text-sm text-white bg-green-600 py-2 px-4 rounded-lg hover:shadow-lg hover:opacity-80 transition duration-300 ease-in-out">Tentang
                        EcomasHub</a>
                    <div class="mt-10">
                        <div class="flex flex-wrap sm:flex-nowrap gap-3">
                            <img src="{{ Vite::asset('resources/images/chat.png') }}" alt=""
                                class="mx-auto sm:w-20 sm:h-20">
                            <div>
                                <p class="text-sm sm:text-base">“Rorem ipsum dolor sit amet, consectetur adipiscing
                                    elit. Nunc
                                    vulputate libero et
                                    velit
                                    interdum, ac aliquet odio mattis.”</p>
                                <p class="font-thin text-xs sm:text-sm"><span
                                        class="font-semibold sm:text-base text-sm">Filled a Huge
                                        Cap</span> -
                                    Jrobyutk</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full self-end px-4 sm:w-1/2">
                    <div class="mt-10">
                        <img src="{{ Vite::asset('resources/images/char.png') }}" alt="EcomasHub"
                            class="max-w-full mx-auto">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- hero section end -->

    <!-- tentang start -->
    <section id="tentang" class="mt-10 sm:pt-28 pt-20 justify-center flex sm:px-20">
        <div class="container">
            <div class="flex flex-wrap">
                <div class="w-full self-center px-4 sm:w-1/2">
                    <h1 class="font-fredokaBold text-2xl mb-5 sm:text-4xl">Tentang kami</h1>
                    <p class="text-sm mb-10 sm:text-base">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Eligendi minus ipsam porro natus, deserunt nesciunt? Sint, mollitia quasi? Atque repudiandae
                        fugit nihil modi non. Voluptatibus accusantium reiciendis natus quisquam a? Lorem ipsum dolor
                        sit amet, consectetur adipisicing elit. Pariatur alias quasi dicta numquam obcaecati inventore
                        temporibus delectus voluptatibus aspernatur nemo minima illo, necessitatibus commodi esse fugit
                        corrupti deleniti quas. Earum!
                    </p>
                </div>
                <div class="w-full self-end px-4 sm:w-1/2">
                    <div class="sm:mt-10">
                        <img src="{{ Vite::asset('resources/images/logo-text2.png') }}" alt="EcomasHub"
                            class="max-w-full mx-auto sm:w-60 w-40">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- tentang end -->

    <!-- tujuan start -->
    <section id="tujuan" class="mt-10 sm:pt-32 pt-20 justify-center flex sm:px-20 pb-5">
        <div class="container">
            <div class="flex flex-wrap justify-center">
                <h1 class="text-2xl sm:text-4xl font-fredokaBold">Visi Misi</h1>
                <div class="w-full flex justify-center my-5">
                    <div class="flex sm:text-xl w-1/3 font-semibold">
                        <a id="visi-link" class="w-1/2 text-green-600 text-center cursor-pointer">Visi
                            <div id="visi-line" class="h-1 w-full bg-green-600 rounded-s-full"></div>
                        </a>
                        <a id="misi-link" class="w-1/2 text-slate-400 text-center cursor-pointer">Misi
                            <div id="misi-line" class="h-1 w-full bg-slate-400 rounded-e-full"></div>
                        </a>

                    </div>
                </div>
                <!-- isi visi -->
                <div id="visi-content" class="sm:w-1/2 flex flex-wrap gap-2">
                    <div class="flex gap-2">
                        <svg class="min-w-4 min-h-4 w-4 h-4 sm:w-6 sm:h-6" viewBox="0 0 39 36" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M19.5 0L23.878 13.4742H38.0456L26.5838 21.8017L30.9618 35.2758L19.5 26.9483L8.03819 35.2758L12.4162 21.8017L0.954397 13.4742H15.122L19.5 0Z"
                                fill="#359C40" />
                        </svg>
                        <p class="text-xs sm:text-base">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fuga
                            obcaecati
                            vitae, quam, commodi
                            quidem accusantium amet tempore veniam, explicabo suscipit perspiciatis eveniet? Optio esse
                            temporibus sit, enim totam nisi illo?</p>
                    </div>
                    <div class="flex gap-2">
                        <svg class="min-w-4 min-h-4 w-4 h-4 sm:w-6 sm:h-6" viewBox="0 0 39 36" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M19.5 0L23.878 13.4742H38.0456L26.5838 21.8017L30.9618 35.2758L19.5 26.9483L8.03819 35.2758L12.4162 21.8017L0.954397 13.4742H15.122L19.5 0Z"
                                fill="#359C40" />
                        </svg>
                        <p class="text-xs sm:text-base">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fuga
                            obcaecati
                            vitae, quam, commodi
                            quidem accusantium amet tempore veniam, explicabo suscipit perspiciatis eveniet? Optio esse
                            temporibus sit, enim totam nisi illo?</p>
                    </div>
                    <div class="flex gap-2">
                        <svg class="min-w-4 min-h-4 w-4 h-4 sm:w-6 sm:h-6" viewBox="0 0 39 36" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M19.5 0L23.878 13.4742H38.0456L26.5838 21.8017L30.9618 35.2758L19.5 26.9483L8.03819 35.2758L12.4162 21.8017L0.954397 13.4742H15.122L19.5 0Z"
                                fill="#359C40" />
                        </svg>
                        <p class="text-xs sm:text-base">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fuga
                            obcaecati
                            vitae, quam, commodi
                            quidem accusantium amet tempore veniam, explicabo suscipit perspiciatis eveniet? Optio esse
                            temporibus sit, enim totam nisi illo?</p>
                    </div>
                </div>
                <!-- visi end -->

                <!-- isi misi -->
                <div id="misi-content" class="sm:w-1/2 flex flex-wrap gap-2 hidden">
                    <div class="flex gap-2">
                        <svg class="min-w-4 min-h-4 w-4 h-4 sm:w-6 sm:h-6" viewBox="0 0 39 36" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M19.5 0L23.878 13.4742H38.0456L26.5838 21.8017L30.9618 35.2758L19.5 26.9483L8.03819 35.2758L12.4162 21.8017L0.954397 13.4742H15.122L19.5 0Z"
                                fill="#359C40" />
                        </svg>
                        <p class="text-xs sm:text-base">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fuga
                            obcaecati
                            vitae, quam, commodi
                            quidem accusantium amet tempore veniam, explicabo suscipit perspiciatis eveniet? Optio esse
                            temporibus sit, enim totam nisi illo?</p>
                    </div>
                    <div class="flex gap-2">
                        <svg class="min-w-4 min-h-4 w-4 h-4 sm:w-6 sm:h-6" viewBox="0 0 39 36" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M19.5 0L23.878 13.4742H38.0456L26.5838 21.8017L30.9618 35.2758L19.5 26.9483L8.03819 35.2758L12.4162 21.8017L0.954397 13.4742H15.122L19.5 0Z"
                                fill="#359C40" />
                        </svg>
                        <p class="text-xs sm:text-base">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fuga
                            obcaecati
                            vitae, quam, commodi
                            quidem accusantium amet tempore veniam, explicabo suscipit perspiciatis eveniet? Optio esse
                            temporibus sit, enim totam nisi illo?</p>
                    </div>
                </div>
                <!-- misi end -->
            </div>
        </div>
    </section>
    <!-- tujuan end -->

    <!-- mitra start -->
    <section id="mitra" class="justify-center flex mt-10 sm:pt-28 pt-20">
        <div class="w-full bg-lime-100 sm:px-20 pb-5">
            <div class="container">
                <div class="flex flex-wrap justify-center">
                    <p class="font-fredokaBold w-full text-center sm:text-base text-xs my-5">Berkolaborasi dengan lebih
                        dari
                        10+ partner hebat kami
                    </p>
                    <div class="w-full flex justify-center sm:gap-14">
                        <img src="{{ Vite::asset('resources/images/mitra1.png') }}" alt="">
                        <img src="{{ Vite::asset('resources/images/mitra2.png') }}" alt="">
                        <img src="{{ Vite::asset('resources/images/mitra3.png') }}" alt="">
                        <img src="{{ Vite::asset('resources/images/mitra4.png') }}" alt="">
                        <img src="{{ Vite::asset('resources/images/mitra5.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- mitra end -->

    <!-- informasi publik statr -->
    <section id="publik" class="justify-center flex sm:px-20 mt-10 pb-5 sm:pt-28 pt-20">
        <div class="container">
            <div class="flex flex-wrap justify-center">
                <p class="font-fredokaBold w-full text-center sm:text-4xl text-2xl my-5">Informasi Publik
                </p>
                <div class="w-full flex flex-wrap sm:flex-nowrap justify-center gap-3 sm:gap-14">
                    <div class="w-full sm:w-auto flex justify-center sm:block">
                        <div>
                            <h1 class="text-4xl font-fredokaBold">106K<span class="text-green-500">+</span></h1>
                            <p>Anggota</p>
                            <p>hebat</p>
                        </div>
                    </div>
                    <div class="w-full sm:w-auto flex justify-center sm:block">
                        <div>
                            <h1 class="text-4xl font-fredokaBold">99<span class="text-green-500">+</span></h1>
                            <p>Usaha</p>
                            <p>berkembang</p>
                        </div>
                    </div>
                    <div class="w-full sm:w-auto flex justify-center sm:block">
                        <div>
                            <h1 class="text-4xl font-fredokaBold">99Jt<span class="text-green-500">+</span></h1>
                            <p>Profit keuntungan</p>
                            <p>per bulan</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- informasik publik end -->

    <!-- kegiatan & produk start -->
    <section id="kegiatan" class="mt-10 sm:pt-32 pt-20 justify-center flex sm:px-20 pb-5">
        <div class="container">
            <div class="flex flex-wrap justify-center">
                <h1 class="text-2xl sm:text-4xl font-fredokaBold">Apa saja yang kami lakukan</h1>
                <div class="w-full flex justify-center my-5">
                    <div class="flex sm:text-xl w-1/3 font-semibold">
                        <a id="kegiatan-link" class="w-1/2 text-green-600 text-center cursor-pointer">Kegiatan
                            <div id="kegiatan-line" class="h-1 w-full bg-green-600 rounded-s-full"></div>
                        </a>
                        <a id="produk-link" class="w-1/2 text-slate-400 text-center cursor-pointer">Produk
                            <div id="produk-line" class="h-1 w-full bg-slate-400 rounded-e-full"></div>
                        </a>

                    </div>
                </div>
                <!-- isi kegiatan -->
                <div id="kegiatan-content" class="w-full flex gap-5 mt-2 overflow-x-scroll h-[298.4px] pb-3">
                    <div class="border rounded-lg p-1">
                        <div class="w-[200px] h-[200px] rounded-md">
                            <img src="{{ Vite::asset('resources/images/logo.png') }}" alt=""
                                class="w-full h-full">
                        </div>
                        <h1 class="text-lg my-1">Nama Kegiatan</h1>
                        <div class="flex items-center gap-1 mb-1">
                            <svg width="15" height="15" viewBox="0 0 20 21" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M6 1.5V5.5M18 19.5H2C1.73478 19.5 1.48043 19.3946 1.29289 19.2071C1.10536 19.0196 1 18.7652 1 18.5V8.5H19V18.5C19 18.7652 18.8946 19.0196 18.7071 19.2071C18.5196 19.3946 18.2652 19.5 18 19.5ZM19 4.5C19 4.23478 18.8946 3.98043 18.7071 3.79289C18.5196 3.60536 18.2652 3.5 18 3.5H2C1.73478 3.5 1.48043 3.60536 1.29289 3.79289C1.10536 3.98043 1 4.23478 1 4.5V8.5H19V4.5ZM14 1.5V5.5V1.5Z"
                                    stroke="#798999" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>

                            <p class="text-sm text-[#798999]">21-01-2023</p>
                        </div>
                    </div>
                    <div class="border rounded-lg p-1">
                        <div class="w-[200px] h-[200px] rounded-md">
                            <img src="{{ Vite::asset('resources/images/logo.png') }}" alt=""
                                class="w-full h-full">
                        </div>
                        <h1 class="text-lg my-1">Nama Kegiatan</h1>
                        <div class="flex items-center gap-1 mb-1">
                            <svg width="15" height="15" viewBox="0 0 20 21" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M6 1.5V5.5M18 19.5H2C1.73478 19.5 1.48043 19.3946 1.29289 19.2071C1.10536 19.0196 1 18.7652 1 18.5V8.5H19V18.5C19 18.7652 18.8946 19.0196 18.7071 19.2071C18.5196 19.3946 18.2652 19.5 18 19.5ZM19 4.5C19 4.23478 18.8946 3.98043 18.7071 3.79289C18.5196 3.60536 18.2652 3.5 18 3.5H2C1.73478 3.5 1.48043 3.60536 1.29289 3.79289C1.10536 3.98043 1 4.23478 1 4.5V8.5H19V4.5ZM14 1.5V5.5V1.5Z"
                                    stroke="#798999" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>

                            <p class="text-sm text-[#798999]">21-01-2023</p>
                        </div>
                    </div>
                </div>
                <!-- visi end -->

                <!-- isi produk -->
                <div id="produk-content" class="w-full flex gap-5 mt-2 overflow-x-scroll h-[298.4px] pb-3 hidden">
                    <div class="border rounded-lg p-1">
                        <div class="w-[200px] h-[200px] rounded-md">
                            <img src="{{ Vite::asset('resources/images/logo.png') }}" alt=""
                                class="w-full h-full">
                        </div>
                        <h1 class="text-lg my-1">Nama Kegiatan</h1>
                        <div class="flex items-center gap-1 mb-1">
                            <svg width="15" height="15" viewBox="0 0 20 21" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M6 1.5V5.5M18 19.5H2C1.73478 19.5 1.48043 19.3946 1.29289 19.2071C1.10536 19.0196 1 18.7652 1 18.5V8.5H19V18.5C19 18.7652 18.8946 19.0196 18.7071 19.2071C18.5196 19.3946 18.2652 19.5 18 19.5ZM19 4.5C19 4.23478 18.8946 3.98043 18.7071 3.79289C18.5196 3.60536 18.2652 3.5 18 3.5H2C1.73478 3.5 1.48043 3.60536 1.29289 3.79289C1.10536 3.98043 1 4.23478 1 4.5V8.5H19V4.5ZM14 1.5V5.5V1.5Z"
                                    stroke="#798999" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>

                            <p class="text-sm text-[#798999]">21-01-2023</p>
                        </div>
                    </div>
                </div>
                <!-- misi end -->
            </div>
        </div>
    </section>
    <!-- kegiatan & produk end -->

    <!-- testimoni start -->
    <section id="testimoni" class="justify-center flex mt-10 sm:pt-28 pt-20">
        <div class="w-full sm:px-20 pb-5">
            <div class="container">
                <div class="flex flex-wrap">
                    <div class="text-2xl sm:text-4xl font-fredokaBold w-full sm:w-1/2">
                        <h1>Apa yang dikatakan</h1>
                        <h1>anggota <span class="text-green-500">EcomasHub</span></h1>
                    </div>
                    <div class="flex w-full sm:w-1/2 justify-end items-end">
                        <a id="preview" class="cursor-pointer">
                            <svg id="testimoniLeft" width="53" height="53" viewBox="0 0 73 73" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g opacity="0.9">
                                    <path
                                        d="M9.54883 36.5492C9.54883 50.9086 21.1894 62.5492 35.5488 62.5492C49.9082 62.5492 61.5488 50.9086 61.5488 36.5492C61.5488 22.1898 49.9082 10.5492 35.5488 10.5492C21.1894 10.5492 9.54883 22.1898 9.54883 36.5492ZM51.4749 36.5492C51.4749 45.3449 44.3446 52.4753 35.5488 52.4753C26.7531 52.4753 19.6227 45.3449 19.6227 36.5492C19.6227 27.7535 26.7531 20.6231 35.5488 20.6231C44.3446 20.6231 51.4749 27.7535 51.4749 36.5492Z"
                                        fill="#DFDFDF" />
                                    <path
                                        d="M14.6571 27.2857L27.5854 15.0396C33.201 9.72031 39.7199 9.89697 45.0392 15.5126L57.2707 28.4255C62.6046 34.0565 62.428 40.5754 56.8123 45.8947L43.8995 58.1262C38.2838 63.4455 31.7649 63.2688 26.4456 57.6532L14.1996 44.7249C8.86484 39.1239 9.0415 32.605 14.6571 27.2857ZM23.17 39.8573L37.7986 48.0701C41.2784 50.0133 45.1945 46.3916 43.5035 42.7833L41.5585 38.5668C41.0187 37.4098 41.0407 36.0425 41.657 34.9319L43.843 30.8124C45.696 27.3302 41.968 23.4562 38.4173 25.2389L23.3508 32.632C20.4099 34.1006 20.2967 38.2763 23.17 39.8573Z"
                                        fill="#DFDFDF" />
                                </g>
                            </svg>
                        </a>
                        <a id="next" class="cursor-pointer">
                            <svg id="testimoniRight" width="53" height="53" viewBox="0 0 73 73" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g opacity="0.9">
                                    <path
                                        d="M62.6484 36.5492C62.6484 50.9086 51.0078 62.5492 36.6484 62.5492C22.289 62.5492 10.6484 50.9086 10.6484 36.5492C10.6484 22.1898 22.289 10.5492 36.6484 10.5492C51.0078 10.5492 62.6484 22.1898 62.6484 36.5492ZM20.7223 36.5492C20.7223 45.3449 27.8527 52.4753 36.6484 52.4753C45.4442 52.4753 52.5745 45.3449 52.5745 36.5492C52.5745 27.7535 45.4442 20.6231 36.6484 20.6231C27.8527 20.6231 20.7223 27.7535 20.7223 36.5492Z"
                                        fill="#359C40" />
                                    <path
                                        d="M57.5401 27.2857L44.6118 15.0396C38.9962 9.72031 32.4773 9.89697 27.158 15.5126L14.9266 28.4255C9.59264 34.0565 9.7693 40.5754 15.3849 45.8947L28.2978 58.1262C33.9134 63.4455 40.4323 63.2688 45.7516 57.6532L57.9977 44.7249C63.3324 39.1239 63.1558 32.605 57.5401 27.2857ZM49.0272 39.8573L34.3987 48.0701C30.9189 50.0133 27.0027 46.3916 28.6937 42.7833L30.6388 38.5668C31.1786 37.4098 31.1566 36.0425 30.5403 34.9319L28.3543 30.8124C26.5012 27.3302 30.2293 23.4562 33.7799 25.2389L48.8465 32.632C51.7874 34.1006 51.9005 38.2763 49.0272 39.8573Z"
                                        fill="#359C40" />
                                </g>
                            </svg>
                        </a>
                    </div>
                    <div id="testimoni" class="w-full">
                        <div class="isiTestimoni w-full flex gap-4 mt-3">
                            <div class="items-center flex flex-wrap pe-4">
                                <div>
                                    <p class="">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus
                                        sint
                                        repudiandae inventore, voluptatibus, mollitia ut consequuntur libero ea iste
                                        tenetur
                                        esse provident ex sapiente praesentium nam doloremque non odio similique?Lorem
                                        ipsum, dolor sit amet consectetur adipisicing elit. Laboriosam distinctio quam
                                        blanditiis! Doloremque, fugiat optio esse deleniti quis dignissimos blanditiis,
                                        aut
                                        perspiciatis expedita veritatis delectus animi, commodi iste ducimus nemo.</p>
                                    <h1 class="text-2xl mt-4">Sinta 1</h1>
                                </div>
                            </div>
                            <div
                                class="h-10 min-w-10 sm:h-[230px] sm:min-w-[200px] bg-slate-400 rounded-full sm:rounded-lg">
                                <img src="{{ Vite::asset('resources/images/char.png') }}" alt=""
                                    class="w-full h-full">
                            </div>
                        </div>
                        <div class="isiTestimoni w-full flex gap-4 mt-3 hidden">
                            <div class="items-center flex flex-wrap pe-4">
                                <div>
                                    <p class="">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus
                                        sint
                                        repudiandae inventore, voluptatibus, mollitia ut consequuntur libero ea iste
                                        tenetur
                                        esse provident ex sapiente praesentium nam doloremque non odio similique?Lorem
                                        ipsum, dolor sit amet consectetur adipisicing elit. Laboriosam distinctio quam
                                        blanditiis! Doloremque, fugiat optio esse deleniti quis dignissimos blanditiis,
                                        aut
                                        perspiciatis expedita veritatis delectus animi, commodi iste ducimus nemo.</p>
                                    <h1 class="text-2xl mt-4">Sinta 2</h1>
                                </div>
                            </div>
                            <div
                                class="h-10 min-w-10 sm:h-[230px] sm:min-w-[200px] bg-slate-400 rounded-full sm:rounded-lg">
                                <img src="{{ Vite::asset('resources/images/char.png') }}" alt=""
                                    class="w-full h-full">
                            </div>
                        </div>
                        <div class="isiTestimoni w-full flex gap-4 mt-3 hidden">
                            <div class="items-center flex flex-wrap pe-4">
                                <div>
                                    <p class="">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus
                                        sint
                                        repudiandae inventore, voluptatibus, mollitia ut consequuntur libero ea iste
                                        tenetur
                                        esse provident ex sapiente praesentium nam doloremque non odio similique?Lorem
                                        ipsum, dolor sit amet consectetur adipisicing elit. Laboriosam distinctio quam
                                        blanditiis! Doloremque, fugiat optio esse deleniti quis dignissimos blanditiis,
                                        aut
                                        perspiciatis expedita veritatis delectus animi, commodi iste ducimus nemo.</p>
                                    <h1 class="text-2xl mt-4">Sinta 3</h1>
                                </div>
                            </div>
                            <div
                                class="h-10 min-w-10 sm:h-[230px] sm:min-w-[200px] bg-slate-400 rounded-full sm:rounded-lg">
                                <img src="{{ Vite::asset('resources/images/char.png') }}" alt=""
                                    class="w-full h-full">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- testimoni end -->

    <footer>
        <section id="testimoni" class="justify-center flex mt-10 sm:pt-28">
            <div class="w-full sm:px-20 pb-5">
                <div class="container">
                    <div class="flex flex-wrap justify-between">
                        <div class="flex justify-center w-full sm:w-auto">
                            <img src="{{ Vite::asset('resources/images/logo-text.png') }}" alt=""
                                class="h-14">
                        </div>
                        <div class="flex justify-center w-1/2 sm:w-auto">
                            <ul>
                                <li>
                                    <p class="font-bold">Services</p>
                                </li>
                                <li class="my-1"><a href="#tentang">Tentang</a></li>
                                <li class="my-1"><a href="#tujuan">Visi misi</a></li>
                                <li class="my-1"><a href="#testimoni">Testimoni</a></li>
                                <li class="my-1"><a href="#kegiatan">Kegiatan</a></li>
                            </ul>
                        </div>
                        <div class="flex justify-center w-1/2 sm:w-auto">
                            <ul>
                                <li>
                                    <p class="font-bold">Policy</p>
                                </li>
                                <li class="my-1"><a href="">Privacy policy</a></li>
                                <li class="my-1"><a href="">Cookie policy</a></li>
                                <li class="my-1"><a href="">Acceptable use policy</a></li>
                            </ul>
                        </div>
                        <div class="flex justify-center w-full sm:w-auto">
                            <ul>
                                <li>
                                    <p class="font-bold">Let’s talk</p>
                                </li>
                                <li class="my-1"><a href="">hello@ecomushub</a></li>
                                <li class="my-1"><a href="">Sleman, Yogyakarta</a></li>
                                <li class="my-1"><a href="">(+62) 895 3463 3934 </a></li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </footer>
@endsection
