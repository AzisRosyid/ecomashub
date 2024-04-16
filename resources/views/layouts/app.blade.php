<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @isset($route)
            @if (strpos($route, 'admin') !== false)
                {{ ucwords(str_replace('admin', 'Admin ', $route)) }}
            @elseif (strpos($route, 'auth') !== false)
                {{ ucwords(str_replace('auth', '', $route)) }}
            @elseif ($route == 'home')
                Home
            @else
                {{ ucwords(str_replace('home', '', $route)) }}
            @endif |
        @endisset
        {{ config('app.name', 'Laravel') }}
    </title>
    <link rel="icon" type="image/x-icon" href="{{ Vite::asset('resources/images/logo.png') }}">

    <!-- Scripts -->
    @vite('resources/js/app.js')
</head>

<body id="body" class="font-fredokaRegular">
    @isset($route)
        @if (strpos($route, 'admin') !== false)
            @isset($pick)
                <form id="searchForm" action="{{ route($route) }}" method="get">
                @endisset
                <section class="flex">
                    <a id="chat"
                                class="w-14 h-14 rounded-full border text-sm font-normal font-fredokaRegular items-center justify-center flex bg-lime-600 cursor-pointer fixed bottom-9 right-8">
                                <div class="items-center justify-center flex">
                                    <svg width="35" height="35" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M11.6667 18.3324C11.6667 17.4124 12.4133 16.6658 13.3333 16.6658C14.2533 16.6658 15 17.4124 15 18.3324C15 19.2524 14.2533 19.9991 13.3333 19.9991C12.4133 19.9991 11.6667 19.2524 11.6667 18.3324ZM20 16.6658C19.08 16.6658 18.3333 17.4124 18.3333 18.3324C18.3333 19.2524 19.08 19.9991 20 19.9991C20.92 19.9991 21.6667 19.2524 21.6667 18.3324C21.6667 17.4124 20.92 16.6658 20 16.6658ZM26.6667 16.6658C25.7467 16.6658 25 17.4124 25 18.3324C25 19.2524 25.7467 19.9991 26.6667 19.9991C27.5867 19.9991 28.3333 19.2524 28.3333 18.3324C28.3333 17.4124 27.5867 16.6658 26.6667 16.6658ZM33.164 20.4906C32.319 25.9139 27.9473 30.4123 22.5323 31.4273C19.9173 31.9206 17.254 31.6389 14.8373 30.6156C14.1523 30.3256 13.444 30.1789 12.749 30.1789C12.4323 30.1789 12.119 30.2089 11.8107 30.2706L7.12401 31.2073L8.06234 26.5123C8.25901 25.5373 8.13901 24.4939 7.71734 23.4956C6.69401 21.0789 6.41401 18.4173 6.90567 15.8006C7.92067 10.3856 12.4173 6.01394 17.8423 5.16894C22.159 4.49728 26.3807 5.85728 29.4273 8.90394C32.4757 11.9523 33.8373 16.1756 33.164 20.4906ZM31.7857 6.54728C27.9773 2.74061 22.7107 1.04228 17.329 1.87394C10.534 2.93394 4.90067 8.40728 3.62901 15.1856C3.01567 18.4489 3.36901 21.7723 4.64734 24.7939C4.80901 25.1789 4.85901 25.5373 4.79567 25.8589L3.36567 33.0056C3.25567 33.5523 3.42734 34.1173 3.82234 34.5106C4.13734 34.8273 4.56234 34.9989 5.00067 34.9989C5.10901 34.9989 5.21734 34.9889 5.32734 34.9673L12.4657 33.5389C12.8757 33.4606 13.2723 33.5756 13.5373 33.6856C16.5623 34.9639 19.8857 35.3156 23.1457 34.7039C29.9257 33.4323 35.399 27.7989 36.459 21.0039C37.2957 15.6256 35.594 10.3556 31.7857 6.54728Z" fill="white"/>
                                        <mask id="mask0_1631_17769" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="3" y="1" width="34" height="34">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M11.6667 18.3324C11.6667 17.4124 12.4133 16.6658 13.3333 16.6658C14.2533 16.6658 15 17.4124 15 18.3324C15 19.2524 14.2533 19.9991 13.3333 19.9991C12.4133 19.9991 11.6667 19.2524 11.6667 18.3324ZM20 16.6658C19.08 16.6658 18.3333 17.4124 18.3333 18.3324C18.3333 19.2524 19.08 19.9991 20 19.9991C20.92 19.9991 21.6667 19.2524 21.6667 18.3324C21.6667 17.4124 20.92 16.6658 20 16.6658ZM26.6667 16.6658C25.7467 16.6658 25 17.4124 25 18.3324C25 19.2524 25.7467 19.9991 26.6667 19.9991C27.5867 19.9991 28.3333 19.2524 28.3333 18.3324C28.3333 17.4124 27.5867 16.6658 26.6667 16.6658ZM33.164 20.4906C32.319 25.9139 27.9473 30.4123 22.5323 31.4273C19.9173 31.9206 17.254 31.6389 14.8373 30.6156C14.1523 30.3256 13.444 30.1789 12.749 30.1789C12.4323 30.1789 12.119 30.2089 11.8107 30.2706L7.12401 31.2073L8.06234 26.5123C8.25901 25.5373 8.13901 24.4939 7.71734 23.4956C6.69401 21.0789 6.41401 18.4173 6.90567 15.8006C7.92067 10.3856 12.4173 6.01394 17.8423 5.16894C22.159 4.49728 26.3807 5.85728 29.4273 8.90394C32.4757 11.9523 33.8373 16.1756 33.164 20.4906ZM31.7857 6.54728C27.9773 2.74061 22.7107 1.04228 17.329 1.87394C10.534 2.93394 4.90067 8.40728 3.62901 15.1856C3.01567 18.4489 3.36901 21.7723 4.64734 24.7939C4.80901 25.1789 4.85901 25.5373 4.79567 25.8589L3.36567 33.0056C3.25567 33.5523 3.42734 34.1173 3.82234 34.5106C4.13734 34.8273 4.56234 34.9989 5.00067 34.9989C5.10901 34.9989 5.21734 34.9889 5.32734 34.9673L12.4657 33.5389C12.8757 33.4606 13.2723 33.5756 13.5373 33.6856C16.5623 34.9639 19.8857 35.3156 23.1457 34.7039C29.9257 33.4323 35.399 27.7989 36.459 21.0039C37.2957 15.6256 35.594 10.3556 31.7857 6.54728Z" fill="white"/>
                                        </mask>
                                        <g mask="url(#mask0_1631_17769)">
                                        <rect width="40" height="40" fill="white"/>
                                        </g>
                                        </svg>
                                </div>
                            </a>
    <!-- chatbot -->
    <div class="h-full w-96 bg-white fixed z-20 top-0 right-0 hidden" id="menuChat">
        <div class="relative h-full">
            <div class="border-b py-2 px-2">
                <a id="closeChat" class="">
                    <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M20.1214 18L26.5609 11.5605C27.1474 10.974 27.1474 10.026 26.5609 9.43951C25.9744 8.85301 25.0264 8.85301 24.4399 9.43951L18.0004 15.879L11.5609 9.43951C10.9744 8.85301 10.0264 8.85301 9.43988 9.43951C8.85337 10.026 8.85337 10.974 9.43988 11.5605L15.8794 18L9.43988 24.4395C8.85337 25.026 8.85337 25.974 9.43988 26.5605C9.73237 26.853 10.1164 27 10.5004 27C10.8844 27 11.2684 26.853 11.5609 26.5605L18.0004 20.121L24.4399 26.5605C24.7324 26.853 25.1164 27 25.5004 27C25.8844 27 26.2684 26.853 26.5609 26.5605C27.1474 25.974 27.1474 25.026 26.5609 24.4395L20.1214 18Z"
                            fill="#231F20" />
                        <mask id="mask0_668_63" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="9" y="8"
                            width="19" height="19">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M20.1214 18L26.5609 11.5605C27.1474 10.974 27.1474 10.026 26.5609 9.43951C25.9744 8.85301 25.0264 8.85301 24.4399 9.43951L18.0004 15.879L11.5609 9.43951C10.9744 8.85301 10.0264 8.85301 9.43988 9.43951C8.85337 10.026 8.85337 10.974 9.43988 11.5605L15.8794 18L9.43988 24.4395C8.85337 25.026 8.85337 25.974 9.43988 26.5605C9.73237 26.853 10.1164 27 10.5004 27C10.8844 27 11.2684 26.853 11.5609 26.5605L18.0004 20.121L24.4399 26.5605C24.7324 26.853 25.1164 27 25.5004 27C25.8844 27 26.2684 26.853 26.5609 26.5605C27.1474 25.974 27.1474 25.026 26.5609 24.4395L20.1214 18Z"
                                fill="white" />
                        </mask>
                        <g mask="url(#mask0_668_63)">
                            <rect width="36" height="36" fill="#0D1C2E" />
                        </g>
                    </svg>
                </a>
            </div>
            <!-- chat field -->
            <div id="chat-messages" class="px-2 py-2 w-full overflow-y-scroll overflow-hidden h-[577.6px]">
            </div>
            <!-- end chat field -->
            <!-- ask field -->
            <div class="py-3 px-2 w-full fixed bottom-0 border-t">
                <div class="flex gap-2 items-end max-w-full">
                    <input type="file" class="hidden" name="fileChat" id="fileChat">
                    <div class="bg-lime-600 min-h-10 min-w-10 w-10 h-10 flex items-center justify-center rounded-full">
                        <label for="fileChat" class="cursor-pointer w-14 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#ffffff"
                                class="bi bi-file-earmark-fill" viewBox="0 0 16 16">
                                <path
                                    d="M4 0h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2m5.5 1.5v2a1 1 0 0 0 1 1h2z" />
                            </svg>
                        </label>
                    </div>
                    <div class="flex items-center justify-center">
                        <textarea id="user-input"
                            class="w-[17rem] h-auto max-h-48 overflow-auto border rounded-md outline-none resize-none p-2"
                            rows="1" placeholder="Tulis pertanyaan Anda di sini..."
                            ></textarea>
                    </div>
                    <div>
                        <a id="sendMessage"
                            class="bg-lime-600 cursor-pointer min-h-10 min-w-10 w-10 h-10 flex items-center justify-center rounded-full">
                            <svg
                                xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#ffffff"
                                class="bi bi-send" viewBox="0 0 16 16">
                                <path
                                    d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576zm6.787-8.201L1.591 6.602l4.339 2.76z" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <!-- end ask field -->
        </div>
    </div>
    <!-- end chatbot -->
                    @include('layouts.sidebar')
                    @yield('content')
                </section>
                @yield('filter')
                @yield('modal')
                @isset($pick)
                </form>
            @endisset
        @else
            @yield('content')
        @endif
    @endisset


    @include('layouts.footer')
    @include('layouts.script')
</body>

</html>
