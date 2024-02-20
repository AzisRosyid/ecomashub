@isset($route)
    @if (strpos($route, 'admin') !== false)
        <div id="nav-menu"
            class="w-[250px] sm:w-[330px] overflow-y-auto h-full py-8 bg-white items-end fixed lg:static top-0 left-0 hidden lg:block">
            <a href="" class="flex justify-center mb-8">
                <img src="{{ Vite::asset('resources/images/logo.png') }}" alt="" class="w-[40px]">
                <img src="{{ Vite::asset('resources/images/logo-text.png') }}" alt="EchoMashub" class="h-[35px] ms-2">
            </a>
            <ul class="ps-10 border-b pb-3">
                <li>
                    <a href="{{ route('adminDashboard') }}"
                        class="flex py-4 px-6 rounded-s-2xl text-zinc-700 hover:text-green-600 sidebar-list @if ($route == 'adminDashboard') sidebar-active @endif">
                        <svg width="18" height="21" viewBox="0 0 18 21" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path id="Mask" fill-rule="evenodd" clip-rule="evenodd"
                                d="M9.71482 0.845024L17.4238 8.72902C17.7898 9.10503 17.9998 9.62902 17.9998 10.168V18.544C17.9998 19.647 17.1528 20.544 16.1118 20.544H12.9998V11.544C12.9998 10.992 12.5528 10.544 11.9998 10.544H5.99982C5.44682 10.544 4.99982 10.992 4.99982 11.544V20.544H1.88882C0.847817 20.544 -0.000183105 19.647 -0.000183105 18.544V10.168C-0.000183105 9.62902 0.209817 9.10502 0.574817 8.73002L8.28482 0.845024C8.66182 0.460024 9.33782 0.460024 9.71482 0.845024ZM11 19.5444H7.00002V12.5444H11V19.5444Z"
                                fill="#394149" />
                        </svg>
                        <p class="ms-2">Dashboard</p>
                    </a>
                </li>
                <li>
                    <a href="{{ route('adminEvent') }}"
                        class="flex py-4 px-5 rounded-s-2xl text-zinc-700 hover:text-green-600 sidebar-list @if ($route == 'adminEvent') sidebar-active @endif">
                        <svg width="24" height="25" viewBox="0 0 24 25" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M19 16.9467L13 18.2947V8.14172L19 6.79472V16.9467ZM5 6.79472L11 8.14172V18.2947L5 16.9467V6.79472ZM20.625 4.76272C20.387 4.57372 20.077 4.50172 19.78 4.56872L12 6.31672L4.22 4.56872C3.922 4.50072 3.613 4.57372 3.375 4.76272C3.138 4.95372 3 5.24072 3 5.54472V17.7467C3 18.2147 3.324 18.6197 3.78 18.7217L11.78 20.5197C11.854 20.5367 11.927 20.5447 12 20.5447C12.073 20.5447 12.146 20.5367 12.22 20.5197L20.22 18.7217C20.676 18.6197 21 18.2147 21 17.7467V5.54472C21 5.24072 20.862 4.95372 20.625 4.76272Z"
                                fill="#394149" />
                            <mask id="mask0_659_1137" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="3" y="4"
                                width="18" height="17">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M19 16.9467L13 18.2947V8.14172L19 6.79472V16.9467ZM5 6.79472L11 8.14172V18.2947L5 16.9467V6.79472ZM20.625 4.76272C20.387 4.57372 20.077 4.50172 19.78 4.56872L12 6.31672L4.22 4.56872C3.922 4.50072 3.613 4.57372 3.375 4.76272C3.138 4.95372 3 5.24072 3 5.54472V17.7467C3 18.2147 3.324 18.6197 3.78 18.7217L11.78 20.5197C11.854 20.5367 11.927 20.5447 12 20.5447C12.073 20.5447 12.146 20.5367 12.22 20.5197L20.22 18.7217C20.676 18.6197 21 18.2147 21 17.7467V5.54472C21 5.24072 20.862 4.95372 20.625 4.76272Z"
                                    fill="white" />
                            </mask>
                            <g mask="url(#mask0_659_1137)">
                                <rect y="0.544434" width="24" height="24" fill="#394149" />
                            </g>
                        </svg>
                        <p class="ms-2">Kegiatan</p>
                    </a>
                </li>
                <li>
                    <a href="{{ route('adminUser') }}"
                        class="flex py-4 px-5 rounded-s-2xl text-zinc-700 hover:text-green-600 sidebar-list @if ($route == 'adminUser') sidebar-active @endif">
                        <svg width="24" height="25" viewBox="0 0 24 25" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M18 10.5444C18 9.99343 17.552 9.54443 17 9.54443C16.448 9.54443 16 9.99343 16 10.5444C16 11.0954 16.448 11.5444 17 11.5444C17.552 11.5444 18 11.0954 18 10.5444ZM20 10.5444C20 12.1984 18.654 13.5444 17 13.5444C15.346 13.5444 14 12.1984 14 10.5444C14 8.89043 15.346 7.54443 17 7.54443C18.654 7.54443 20 8.89043 20 10.5444ZM11 7.54443C11 6.44143 10.103 5.54443 9 5.54443C7.897 5.54443 7 6.44143 7 7.54443C7 8.64743 7.897 9.54443 9 9.54443C10.103 9.54443 11 8.64743 11 7.54443ZM13 7.54443C13 9.75043 11.206 11.5444 9 11.5444C6.794 11.5444 5 9.75043 5 7.54443C5 5.33843 6.794 3.54443 9 3.54443C11.206 3.54443 13 5.33843 13 7.54443ZM13.94 15.5904C14.809 14.9184 15.879 14.5444 17 14.5444C19.757 14.5444 22 16.7874 22 19.5444C22 20.0964 21.553 20.5444 21 20.5444C20.447 20.5444 20 20.0964 20 19.5444C20 17.8904 18.654 16.5444 17 16.5444C16.317 16.5444 15.668 16.7784 15.144 17.1934C15.688 18.1894 16 19.3314 16 20.5444C16 21.0964 15.553 21.5444 15 21.5444C14.447 21.5444 14 21.0964 14 20.5444C14 17.7874 11.757 15.5444 9 15.5444C6.243 15.5444 4 17.7874 4 20.5444C4 21.0964 3.553 21.5444 3 21.5444C2.447 21.5444 2 21.0964 2 20.5444C2 16.6844 5.141 13.5444 9 13.5444C10.927 13.5444 12.673 14.3274 13.94 15.5904Z"
                                fill="#394149" />
                            <mask id="mask0_659_1157" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="2" y="3"
                                width="20" height="19">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M18 10.5444C18 9.99343 17.552 9.54443 17 9.54443C16.448 9.54443 16 9.99343 16 10.5444C16 11.0954 16.448 11.5444 17 11.5444C17.552 11.5444 18 11.0954 18 10.5444ZM20 10.5444C20 12.1984 18.654 13.5444 17 13.5444C15.346 13.5444 14 12.1984 14 10.5444C14 8.89043 15.346 7.54443 17 7.54443C18.654 7.54443 20 8.89043 20 10.5444ZM11 7.54443C11 6.44143 10.103 5.54443 9 5.54443C7.897 5.54443 7 6.44143 7 7.54443C7 8.64743 7.897 9.54443 9 9.54443C10.103 9.54443 11 8.64743 11 7.54443ZM13 7.54443C13 9.75043 11.206 11.5444 9 11.5444C6.794 11.5444 5 9.75043 5 7.54443C5 5.33843 6.794 3.54443 9 3.54443C11.206 3.54443 13 5.33843 13 7.54443ZM13.94 15.5904C14.809 14.9184 15.879 14.5444 17 14.5444C19.757 14.5444 22 16.7874 22 19.5444C22 20.0964 21.553 20.5444 21 20.5444C20.447 20.5444 20 20.0964 20 19.5444C20 17.8904 18.654 16.5444 17 16.5444C16.317 16.5444 15.668 16.7784 15.144 17.1934C15.688 18.1894 16 19.3314 16 20.5444C16 21.0964 15.553 21.5444 15 21.5444C14.447 21.5444 14 21.0964 14 20.5444C14 17.7874 11.757 15.5444 9 15.5444C6.243 15.5444 4 17.7874 4 20.5444C4 21.0964 3.553 21.5444 3 21.5444C2.447 21.5444 2 21.0964 2 20.5444C2 16.6844 5.141 13.5444 9 13.5444C10.927 13.5444 12.673 14.3274 13.94 15.5904Z"
                                    fill="white" />
                            </mask>
                            <g mask="url(#mask0_659_1157)">
                                <rect y="0.544434" width="24" height="24" fill="#394149" />
                            </g>
                        </svg>

                        <p class="ms-2">Pengguna</p>
                    </a>
                </li>
                <li>
                    <a href="{{ route('adminAsset') }}"
                        class="flex py-4 px-5 rounded-s-2xl text-zinc-700 hover:text-green-600 sidebar-list @if ($route == 'adminAsset') sidebar-active @endif">
                        <svg width="24" height="25" viewBox="0 0 24 25" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M7 19.5444C6.449 19.5444 6 19.0954 6 18.5444C6 17.9934 6.449 17.5444 7 17.5444H18V19.5444H7ZM7 5.54443H18V15.5444H7C6.647 15.5444 6.314 15.6164 6 15.7284V6.54443C6 5.99343 6.449 5.54443 7 5.54443ZM19 3.54443H7C5.346 3.54443 4 4.89043 4 6.54443V18.5444C4 20.1984 5.346 21.5444 7 21.5444H18H19C19.552 21.5444 20 21.0964 20 20.5444V19.5444V17.5444V4.54443C20 3.99243 19.552 3.54443 19 3.54443Z"
                                fill="#394149" />
                            <mask id="mask0_659_1183" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="4" y="3"
                                width="16" height="19">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M7 19.5444C6.449 19.5444 6 19.0954 6 18.5444C6 17.9934 6.449 17.5444 7 17.5444H18V19.5444H7ZM7 5.54443H18V15.5444H7C6.647 15.5444 6.314 15.6164 6 15.7284V6.54443C6 5.99343 6.449 5.54443 7 5.54443ZM19 3.54443H7C5.346 3.54443 4 4.89043 4 6.54443V18.5444C4 20.1984 5.346 21.5444 7 21.5444H18H19C19.552 21.5444 20 21.0964 20 20.5444V19.5444V17.5444V4.54443C20 3.99243 19.552 3.54443 19 3.54443Z"
                                    fill="white" />
                            </mask>
                            <g mask="url(#mask0_659_1183)">
                                <rect y="0.544434" width="24" height="24" fill="#394149" />
                            </g>
                        </svg>

                        <p class="ms-2">Aset</p>
                    </a>
                </li>
                <li>
                    <a href="{{ route('adminCollaboration') }}"
                        class="flex py-4 px-5 rounded-s-2xl text-zinc-700 hover:text-green-600 sidebar-list @if ($route == 'adminCollaboration') sidebar-active @endif">
                        <svg width="24" height="25" viewBox="0 0 24 25" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M15 11.5444H13V9.54443C13 8.99443 12.55 8.54443 12 8.54443C11.45 8.54443 11 8.99443 11 9.54443V11.5444H9C8.45 11.5444 8 11.9944 8 12.5444C8 13.0944 8.45 13.5444 9 13.5444H11V15.5444C11 16.0944 11.45 16.5444 12 16.5444C12.55 16.5444 13 16.0944 13 15.5444V13.5444H15C15.55 13.5444 16 13.0944 16 12.5444C16 11.9944 15.55 11.5444 15 11.5444ZM19 18.5444C19 19.0954 18.552 19.5444 18 19.5444H6C5.448 19.5444 5 19.0954 5 18.5444V6.54443C5 5.99343 5.448 5.54443 6 5.54443H18C18.552 5.54443 19 5.99343 19 6.54443V18.5444ZM18 3.54443H6C4.346 3.54443 3 4.89043 3 6.54443V18.5444C3 20.1984 4.346 21.5444 6 21.5444H18C19.654 21.5444 21 20.1984 21 18.5444V6.54443C21 4.89043 19.654 3.54443 18 3.54443Z"
                                fill="#394149" />
                            <mask id="mask0_659_1203" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="3" y="3"
                                width="18" height="19">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M15 11.5444H13V9.54443C13 8.99443 12.55 8.54443 12 8.54443C11.45 8.54443 11 8.99443 11 9.54443V11.5444H9C8.45 11.5444 8 11.9944 8 12.5444C8 13.0944 8.45 13.5444 9 13.5444H11V15.5444C11 16.0944 11.45 16.5444 12 16.5444C12.55 16.5444 13 16.0944 13 15.5444V13.5444H15C15.55 13.5444 16 13.0944 16 12.5444C16 11.9944 15.55 11.5444 15 11.5444ZM19 18.5444C19 19.0954 18.552 19.5444 18 19.5444H6C5.448 19.5444 5 19.0954 5 18.5444V6.54443C5 5.99343 5.448 5.54443 6 5.54443H18C18.552 5.54443 19 5.99343 19 6.54443V18.5444ZM18 3.54443H6C4.346 3.54443 3 4.89043 3 6.54443V18.5444C3 20.1984 4.346 21.5444 6 21.5444H18C19.654 21.5444 21 20.1984 21 18.5444V6.54443C21 4.89043 19.654 3.54443 18 3.54443Z"
                                    fill="white" />
                            </mask>
                            <g mask="url(#mask0_659_1203)">
                                <rect y="0.544434" width="24" height="24" fill="#394149" />
                            </g>
                        </svg>
                        <p class="ms-2">Kolaborasi</p>
                    </a>
                </li>
                <li>
                    <a href="{{ route('adminProduct') }}"
                        class="flex py-4 px-5 rounded-s-2xl text-zinc-700 hover:text-green-600 sidebar-list @if ($route == 'adminProduct') sidebar-active @endif">
                        <svg width="24" height="25" viewBox="0 0 24 25" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M18.6904 16.5073L13.0004 19.1513V12.4353L19.0004 9.64833V16.0833C19.0004 16.2573 18.8824 16.4193 18.6904 16.5073ZM5.30339 16.5083C5.11439 16.4203 4.99839 16.2583 5.00039 16.0763V9.64833L11.0004 12.4353V19.1533L5.30339 16.5083ZM11.7074 5.60833C11.7984 5.56533 11.8994 5.54433 12.0004 5.54433C12.1004 5.54433 12.2014 5.56533 12.2924 5.60833L17.6214 8.08233L12.0004 10.6943L6.37839 8.08233L11.7074 5.60833ZM20.6564 7.80333C20.6534 7.79533 20.6544 7.78633 20.6504 7.77833C20.6474 7.77033 20.6394 7.76533 20.6344 7.75733C20.5884 7.68133 20.5324 7.61433 20.4794 7.54433C20.4484 7.51033 20.4234 7.47233 20.3894 7.44333C20.1544 7.16733 19.8774 6.92433 19.5334 6.76533L13.1334 3.79233C13.1324 3.79233 13.1314 3.79233 13.1314 3.79133C12.4124 3.45933 11.5874 3.46033 10.8664 3.79233L4.46939 6.76433C4.12539 6.92333 3.84739 7.16533 3.61239 7.44133C3.57539 7.47233 3.54839 7.51433 3.51539 7.55133C3.46339 7.61833 3.41039 7.68333 3.36639 7.75533C3.36139 7.76433 3.35339 7.77033 3.34939 7.77833C3.34539 7.78733 3.34639 7.79633 3.34239 7.80533C3.13139 8.16733 3.00039 8.57433 3.00039 9.00233V16.0693C2.99239 17.0193 3.56439 17.9033 4.45839 18.3213L10.8574 21.2933C11.2194 21.4623 11.6074 21.5463 11.9964 21.5463C12.3844 21.5463 12.7724 21.4623 13.1334 21.2943L19.5304 18.3223C20.4224 17.9103 20.9994 17.0323 21.0004 16.0843V9.00133C20.9994 8.57333 20.8684 8.16633 20.6564 7.80333Z"
                                fill="#394149" />
                            <mask id="mask0_659_1271" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="3" y="3"
                                width="19" height="19">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M18.6904 16.5073L13.0004 19.1513V12.4353L19.0004 9.64833V16.0833C19.0004 16.2573 18.8824 16.4193 18.6904 16.5073ZM5.30339 16.5083C5.11439 16.4203 4.99839 16.2583 5.00039 16.0763V9.64833L11.0004 12.4353V19.1533L5.30339 16.5083ZM11.7074 5.60833C11.7984 5.56533 11.8994 5.54433 12.0004 5.54433C12.1004 5.54433 12.2014 5.56533 12.2924 5.60833L17.6214 8.08233L12.0004 10.6943L6.37839 8.08233L11.7074 5.60833ZM20.6564 7.80333C20.6534 7.79533 20.6544 7.78633 20.6504 7.77833C20.6474 7.77033 20.6394 7.76533 20.6344 7.75733C20.5884 7.68133 20.5324 7.61433 20.4794 7.54433C20.4484 7.51033 20.4234 7.47233 20.3894 7.44333C20.1544 7.16733 19.8774 6.92433 19.5334 6.76533L13.1334 3.79233C13.1324 3.79233 13.1314 3.79233 13.1314 3.79133C12.4124 3.45933 11.5874 3.46033 10.8664 3.79233L4.46939 6.76433C4.12539 6.92333 3.84739 7.16533 3.61239 7.44133C3.57539 7.47233 3.54839 7.51433 3.51539 7.55133C3.46339 7.61833 3.41039 7.68333 3.36639 7.75533C3.36139 7.76433 3.35339 7.77033 3.34939 7.77833C3.34539 7.78733 3.34639 7.79633 3.34239 7.80533C3.13139 8.16733 3.00039 8.57433 3.00039 9.00233V16.0693C2.99239 17.0193 3.56439 17.9033 4.45839 18.3213L10.8574 21.2933C11.2194 21.4623 11.6074 21.5463 11.9964 21.5463C12.3844 21.5463 12.7724 21.4623 13.1334 21.2943L19.5304 18.3223C20.4224 17.9103 20.9994 17.0323 21.0004 16.0843V9.00133C20.9994 8.57333 20.8684 8.16633 20.6564 7.80333Z"
                                    fill="white" />
                            </mask>
                            <g mask="url(#mask0_659_1271)">
                                <rect y="0.544434" width="24" height="24" fill="#394149" />
                            </g>
                        </svg>

                        <p class="ms-2">Produk</p>
                    </a>
                </li>

                <li>
                    <a href="#"
                        class="flex py-4 px-5 rounded-s-2xl text-zinc-700 hover:text-green-600 sidebar-list @if ($route == 'adminEntrust') sidebar-active @endif">
                        <svg width="24" height="25" viewBox="0 0 24 25" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M12 16.5444C11.448 16.5444 11 16.0964 11 15.5444C11 14.9924 11.448 14.5444 12 14.5444C12.552 14.5444 13 14.9924 13 15.5444C13 16.0964 12.552 16.5444 12 16.5444ZM12 12.5444C10.346 12.5444 9 13.8904 9 15.5444C9 17.1984 10.346 18.5444 12 18.5444C13.654 18.5444 15 17.1984 15 15.5444C15 13.8904 13.654 12.5444 12 12.5444ZM18 19.5444C18 20.0964 17.552 20.5444 17 20.5444H7C6.448 20.5444 6 20.0964 6 19.5444V11.5444C6 10.9924 6.448 10.5444 7 10.5444H8H10H14H16H17C17.552 10.5444 18 10.9924 18 11.5444V19.5444ZM10 6.65543C10 5.49143 10.897 4.54443 12 4.54443C13.103 4.54443 14 5.49143 14 6.65543V8.54443H10V6.65543ZM17 8.54443H16V6.65543C16 4.38943 14.206 2.54443 12 2.54443C9.794 2.54443 8 4.38943 8 6.65543V8.54443H7C5.346 8.54443 4 9.89043 4 11.5444V19.5444C4 21.1984 5.346 22.5444 7 22.5444H17C18.654 22.5444 20 21.1984 20 19.5444V11.5444C20 9.89043 18.654 8.54443 17 8.54443Z"
                                fill="#394149" />
                            <mask id="mask0_659_1247" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="4" y="2"
                                width="16" height="21">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M12 16.5444C11.448 16.5444 11 16.0964 11 15.5444C11 14.9924 11.448 14.5444 12 14.5444C12.552 14.5444 13 14.9924 13 15.5444C13 16.0964 12.552 16.5444 12 16.5444ZM12 12.5444C10.346 12.5444 9 13.8904 9 15.5444C9 17.1984 10.346 18.5444 12 18.5444C13.654 18.5444 15 17.1984 15 15.5444C15 13.8904 13.654 12.5444 12 12.5444ZM18 19.5444C18 20.0964 17.552 20.5444 17 20.5444H7C6.448 20.5444 6 20.0964 6 19.5444V11.5444C6 10.9924 6.448 10.5444 7 10.5444H8H10H14H16H17C17.552 10.5444 18 10.9924 18 11.5444V19.5444ZM10 6.65543C10 5.49143 10.897 4.54443 12 4.54443C13.103 4.54443 14 5.49143 14 6.65543V8.54443H10V6.65543ZM17 8.54443H16V6.65543C16 4.38943 14.206 2.54443 12 2.54443C9.794 2.54443 8 4.38943 8 6.65543V8.54443H7C5.346 8.54443 4 9.89043 4 11.5444V19.5444C4 21.1984 5.346 22.5444 7 22.5444H17C18.654 22.5444 20 21.1984 20 19.5444V11.5444C20 9.89043 18.654 8.54443 17 8.54443Z"
                                    fill="white" />
                            </mask>
                            <g mask="url(#mask0_659_1247)">
                                <rect y="0.544434" width="24" height="24" fill="#394149" />
                            </g>
                        </svg>

                        <p class="ms-2">Penitipan</p>
                    </a>
                </li>
                <li>
                    <a href="{{ route('adminOrder') }}"
                        class="flex py-4 px-5 rounded-s-2xl text-zinc-700 hover:text-green-600 sidebar-list @if ($route == 'adminOrder') sidebar-active @endif">
                        <svg width="24" height="25" viewBox="0 0 24 25" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M16.3818 14.5444H8.76382L7.12682 8.54443H19.3818L16.3818 14.5444ZM21.0828 7.49243C20.7158 6.89843 20.0798 6.54443 19.3818 6.54443H6.58182L5.96482 4.28143C5.84582 3.84643 5.45082 3.54443 4.99982 3.54443H2.99982C2.44682 3.54443 1.99982 3.99243 1.99982 4.54443C1.99982 5.09643 2.44682 5.54443 2.99982 5.54443H4.23582L7.03482 15.8074C7.15382 16.2424 7.54882 16.5444 7.99982 16.5444H16.9998C17.3788 16.5444 17.7248 16.3304 17.8948 15.9914L21.1708 9.43843C21.4838 8.81343 21.4498 8.08643 21.0828 7.49243ZM7.50002 18.5444C6.67202 18.5444 6.00002 19.2154 6.00002 20.0444C6.00002 20.8734 6.67202 21.5444 7.50002 21.5444C8.32802 21.5444 9.00002 20.8734 9.00002 20.0444C9.00002 19.2154 8.32802 18.5444 7.50002 18.5444ZM16 20.0444C16 19.2154 16.672 18.5444 17.5 18.5444C18.328 18.5444 19 19.2154 19 20.0444C19 20.8734 18.328 21.5444 17.5 21.5444C16.672 21.5444 16 20.8734 16 20.0444Z"
                                fill="#394149" />
                            <mask id="mask0_659_1223" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="1" y="3"
                                width="21" height="19">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M16.3818 14.5444H8.76382L7.12682 8.54443H19.3818L16.3818 14.5444ZM21.0828 7.49243C20.7158 6.89843 20.0798 6.54443 19.3818 6.54443H6.58182L5.96482 4.28143C5.84582 3.84643 5.45082 3.54443 4.99982 3.54443H2.99982C2.44682 3.54443 1.99982 3.99243 1.99982 4.54443C1.99982 5.09643 2.44682 5.54443 2.99982 5.54443H4.23582L7.03482 15.8074C7.15382 16.2424 7.54882 16.5444 7.99982 16.5444H16.9998C17.3788 16.5444 17.7248 16.3304 17.8948 15.9914L21.1708 9.43843C21.4838 8.81343 21.4498 8.08643 21.0828 7.49243ZM7.50002 18.5444C6.67202 18.5444 6.00002 19.2154 6.00002 20.0444C6.00002 20.8734 6.67202 21.5444 7.50002 21.5444C8.32802 21.5444 9.00002 20.8734 9.00002 20.0444C9.00002 19.2154 8.32802 18.5444 7.50002 18.5444ZM16 20.0444C16 19.2154 16.672 18.5444 17.5 18.5444C18.328 18.5444 19 19.2154 19 20.0444C19 20.8734 18.328 21.5444 17.5 21.5444C16.672 21.5444 16 20.8734 16 20.0444Z"
                                    fill="white" />
                            </mask>
                            <g mask="url(#mask0_659_1223)">
                                <rect y="0.544434" width="24" height="24" fill="#394149" />
                            </g>
                        </svg>


                        <p class="ms-2">Pesanan</p>
                    </a>
                </li>
                <li>
                    <a id="echo"
                        class="flex py-4 px-5 rounded-s-2xl text-zinc-700 hover:text-green-600 sidebar-list cursor-pointer @if ($route == 'adminWaste') sidebar-active @endif">
                        <svg width="24" height="25" viewBox="0 0 24 25" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M16.8887 18.8628C16.7167 18.4298 16.4727 18.0518 16.2587 17.7288C16.1507 17.5668 16.0397 17.4018 15.9427 17.2318C15.5537 16.5558 15.6877 16.2818 16.3187 15.2248L16.4207 15.0518C16.9317 14.1908 16.9597 13.3648 16.9857 12.6368C16.9977 12.2788 17.0097 11.9418 17.0787 11.6248C17.2397 10.8928 18.7867 10.6978 19.7457 10.5828C19.9067 11.2118 19.9997 11.8668 19.9997 12.5448C19.9997 15.1138 18.7777 17.3978 16.8887 18.8628ZM4.96169 16.3438C5.59769 16.5058 6.28669 16.6178 6.98769 16.6178C8.06769 16.6178 9.17069 16.3538 10.1247 15.6068C11.8407 14.2648 11.8407 12.5488 11.8407 11.1688C11.8407 10.2768 11.8407 9.50783 12.2127 8.82483C12.4127 8.45883 12.8387 8.20483 13.3317 7.90983C13.6337 7.72883 13.9467 7.54283 14.2467 7.30683C14.8897 6.80383 15.3677 6.15683 15.6637 5.44083C17.0637 6.16583 18.2237 7.28883 18.9897 8.66383C17.5617 8.86183 15.5347 9.32983 15.1257 11.1968C15.0177 11.6908 15.0007 12.1558 14.9877 12.5668C14.9667 13.1498 14.9507 13.6108 14.7007 14.0328L14.6007 14.2008C13.9537 15.2838 13.2217 16.5118 14.2087 18.2288C14.3277 18.4368 14.4607 18.6368 14.5917 18.8358C14.9357 19.3518 15.1047 19.6368 15.1057 19.9168C14.1507 20.3208 13.1007 20.5448 11.9997 20.5448C8.9627 20.5448 6.31669 18.8428 4.96169 16.3438ZM11.9997 4.54483C12.6157 4.54483 13.2107 4.62083 13.7867 4.75283C13.6177 5.12483 13.3567 5.46383 13.0127 5.73283C12.7947 5.90483 12.5497 6.04783 12.3067 6.19283C11.6557 6.58083 10.9187 7.02083 10.4567 7.86683C9.84069 8.99683 9.84069 10.1508 9.84069 11.1688C9.84069 12.5238 9.79669 13.3248 8.89269 14.0318C7.52369 15.1048 5.42869 14.5058 4.13269 13.9608C4.05069 13.4998 3.99969 13.0278 3.99969 12.5448C3.99969 8.13383 7.5887 4.54483 11.9997 4.54483ZM11.9997 2.54483C6.48569 2.54483 1.99969 7.03083 1.99969 12.5448C1.99969 18.0578 6.48569 22.5448 11.9997 22.5448C17.5137 22.5448 21.9997 18.0578 21.9997 12.5448C21.9997 7.03083 17.5137 2.54483 11.9997 2.54483Z"
                                fill="#394149" />
                            <mask id="mask0_659_1293" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="1" y="2"
                                width="21" height="21">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M16.8887 18.8628C16.7167 18.4298 16.4727 18.0518 16.2587 17.7288C16.1507 17.5668 16.0397 17.4018 15.9427 17.2318C15.5537 16.5558 15.6877 16.2818 16.3187 15.2248L16.4207 15.0518C16.9317 14.1908 16.9597 13.3648 16.9857 12.6368C16.9977 12.2788 17.0097 11.9418 17.0787 11.6248C17.2397 10.8928 18.7867 10.6978 19.7457 10.5828C19.9067 11.2118 19.9997 11.8668 19.9997 12.5448C19.9997 15.1138 18.7777 17.3978 16.8887 18.8628ZM4.96169 16.3438C5.59769 16.5058 6.28669 16.6178 6.98769 16.6178C8.06769 16.6178 9.17069 16.3538 10.1247 15.6068C11.8407 14.2648 11.8407 12.5488 11.8407 11.1688C11.8407 10.2768 11.8407 9.50783 12.2127 8.82483C12.4127 8.45883 12.8387 8.20483 13.3317 7.90983C13.6337 7.72883 13.9467 7.54283 14.2467 7.30683C14.8897 6.80383 15.3677 6.15683 15.6637 5.44083C17.0637 6.16583 18.2237 7.28883 18.9897 8.66383C17.5617 8.86183 15.5347 9.32983 15.1257 11.1968C15.0177 11.6908 15.0007 12.1558 14.9877 12.5668C14.9667 13.1498 14.9507 13.6108 14.7007 14.0328L14.6007 14.2008C13.9537 15.2838 13.2217 16.5118 14.2087 18.2288C14.3277 18.4368 14.4607 18.6368 14.5917 18.8358C14.9357 19.3518 15.1047 19.6368 15.1057 19.9168C14.1507 20.3208 13.1007 20.5448 11.9997 20.5448C8.9627 20.5448 6.31669 18.8428 4.96169 16.3438ZM11.9997 4.54483C12.6157 4.54483 13.2107 4.62083 13.7867 4.75283C13.6177 5.12483 13.3567 5.46383 13.0127 5.73283C12.7947 5.90483 12.5497 6.04783 12.3067 6.19283C11.6557 6.58083 10.9187 7.02083 10.4567 7.86683C9.84069 8.99683 9.84069 10.1508 9.84069 11.1688C9.84069 12.5238 9.79669 13.3248 8.89269 14.0318C7.52369 15.1048 5.42869 14.5058 4.13269 13.9608C4.05069 13.4998 3.99969 13.0278 3.99969 12.5448C3.99969 8.13383 7.5887 4.54483 11.9997 4.54483ZM11.9997 2.54483C6.48569 2.54483 1.99969 7.03083 1.99969 12.5448C1.99969 18.0578 6.48569 22.5448 11.9997 22.5448C17.5137 22.5448 21.9997 18.0578 21.9997 12.5448C21.9997 7.03083 17.5137 2.54483 11.9997 2.54483Z"
                                    fill="white" />
                            </mask>
                            <g mask="url(#mask0_659_1293)">
                                <rect y="0.544434" width="24" height="24" fill="#394149" />
                            </g>
                        </svg>

                        <p class="ms-2">Eco Friendly</p>

                        <svg id="echoRight" class="mt-1 ms-11" width="16" height="16" viewBox="0 0 24 24"
                            fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M9.9995 19C9.7735 19 9.5465 18.924 9.3595 18.768C8.9355 18.415 8.8785 17.784 9.2315 17.36L13.7075 11.989L9.3925 6.627C9.0465 6.197 9.1145 5.567 9.5445 5.221C9.9755 4.875 10.6045 4.943 10.9515 5.373L15.7795 11.373C16.0775 11.744 16.0735 12.274 15.7685 12.64L10.7685 18.64C10.5705 18.877 10.2865 19 9.9995 19Z"
                                fill="#231F20" />
                            <mask id="mask0_497_180" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="9" y="5"
                                width="8" height="14">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M9.9995 19C9.7735 19 9.5465 18.924 9.3595 18.768C8.9355 18.415 8.8785 17.784 9.2315 17.36L13.7075 11.989L9.3925 6.627C9.0465 6.197 9.1145 5.567 9.5445 5.221C9.9755 4.875 10.6045 4.943 10.9515 5.373L15.7795 11.373C16.0775 11.744 16.0735 12.274 15.7685 12.64L10.7685 18.64C10.5705 18.877 10.2865 19 9.9995 19Z"
                                    fill="white" />
                            </mask>
                            <g mask="url(#mask0_497_180)">
                                <rect width="24" height="24" fill="#0D1C2E" />
                            </g>
                        </svg>
                        <svg id="echoDown" class="mt-1 ms-11 hidden" width="16" height="16" viewBox="0 0 24 24"
                            fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M11.9999 16C11.7719 16 11.5449 15.923 11.3599 15.768L5.35991 10.768C4.93591 10.415 4.87791 9.784 5.23191 9.36C5.58491 8.936 6.21491 8.879 6.63991 9.232L12.0109 13.708L17.3729 9.393C17.8029 9.047 18.4329 9.115 18.7789 9.545C19.1249 9.975 19.0569 10.604 18.6269 10.951L12.6269 15.779C12.4439 15.926 12.2219 16 11.9999 16Z"
                                fill="#231F20" />
                            <mask id="mask0_497_1803" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="5" y="9"
                                width="14" height="7">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M11.9999 16C11.7719 16 11.5449 15.923 11.3599 15.768L5.35991 10.768C4.93591 10.415 4.87791 9.784 5.23191 9.36C5.58491 8.936 6.21491 8.879 6.63991 9.232L12.0109 13.708L17.3729 9.393C17.8029 9.047 18.4329 9.115 18.7789 9.545C19.1249 9.975 19.0569 10.604 18.6269 10.951L12.6269 15.779C12.4439 15.926 12.2219 16 11.9999 16Z"
                                    fill="white" />
                            </mask>
                            <g mask="url(#mask0_497_1803)">
                                <rect width="24" height="24" fill="#0D1C2E" />
                            </g>
                        </svg>
                    </a>

                    <ul class="ms-6 @if ($route != 'adminWaste') hidden @endif" id="menuEcho">
                        <li
                            class="py-2 px-5 rounded-s-2xl text-zinc-700 hover:text-green-600 @if ($route == 'adminWaste') list-active @endif">
                            <a href="{{ route('adminWaste') }}" class="">Sampah</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <ul class="ps-10 pt-3">
                <li class="mb-6">
                    <a id="keuangan"
                        class="flex py-4 px-5 rounded-s-2xl text-zinc-700 hover:text-green-600 sidebar-list @if ($route == 'adminTransaction' || $route == 'adminExpense' || $route == 'adminDebt' || $route == 'adminCash') sidebar-active @endif cursor-pointer">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M11 15H7C6.45 15 6 14.55 6 14C6 13.45 6.45 13 7 13H11C11.55 13 12 13.45 12 14C12 14.55 11.55 15 11 15ZM17 15H15C14.45 15 14 14.55 14 14C14 13.45 14.45 13 15 13H17C17.55 13 18 13.45 18 14C18 14.55 17.55 15 17 15ZM20 16C20 16.551 19.552 17 19 17H5C4.448 17 4 16.551 4 16V11H20V16ZM4 8C4 7.449 4.448 7 5 7H19C19.552 7 20 7.449 20 8V9H4V8ZM19 5H5C3.346 5 2 6.346 2 8V16C2 17.654 3.346 19 5 19H19C20.654 19 22 17.654 22 16V8C22 6.346 20.654 5 19 5Z"
                                fill="#231F20" />
                            <mask id="mask0_497_18394" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="2" y="5"
                                width="20" height="14">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M11 15H7C6.45 15 6 14.55 6 14C6 13.45 6.45 13 7 13H11C11.55 13 12 13.45 12 14C12 14.55 11.55 15 11 15ZM17 15H15C14.45 15 14 14.55 14 14C14 13.45 14.45 13 15 13H17C17.55 13 18 13.45 18 14C18 14.55 17.55 15 17 15ZM20 16C20 16.551 19.552 17 19 17H5C4.448 17 4 16.551 4 16V11H20V16ZM4 8C4 7.449 4.448 7 5 7H19C19.552 7 20 7.449 20 8V9H4V8ZM19 5H5C3.346 5 2 6.346 2 8V16C2 17.654 3.346 19 5 19H19C20.654 19 22 17.654 22 16V8C22 6.346 20.654 5 19 5Z"
                                    fill="white" />
                            </mask>
                            <g mask="url(#mask0_497_18394)">
                                <rect width="24" height="24" fill="#0D1C2E" />
                            </g>
                        </svg>

                        <p class="ms-2">Keuangan</p>

                        <svg id="keuanganRight" class="mt-1 ms-16" width="16" height="16" viewBox="0 0 24 24"
                            fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M9.9995 19C9.7735 19 9.5465 18.924 9.3595 18.768C8.9355 18.415 8.8785 17.784 9.2315 17.36L13.7075 11.989L9.3925 6.627C9.0465 6.197 9.1145 5.567 9.5445 5.221C9.9755 4.875 10.6045 4.943 10.9515 5.373L15.7795 11.373C16.0775 11.744 16.0735 12.274 15.7685 12.64L10.7685 18.64C10.5705 18.877 10.2865 19 9.9995 19Z"
                                fill="#231F20" />
                            <mask id="mask0_497_18047" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="9" y="5"
                                width="8" height="14">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M9.9995 19C9.7735 19 9.5465 18.924 9.3595 18.768C8.9355 18.415 8.8785 17.784 9.2315 17.36L13.7075 11.989L9.3925 6.627C9.0465 6.197 9.1145 5.567 9.5445 5.221C9.9755 4.875 10.6045 4.943 10.9515 5.373L15.7795 11.373C16.0775 11.744 16.0735 12.274 15.7685 12.64L10.7685 18.64C10.5705 18.877 10.2865 19 9.9995 19Z"
                                    fill="white" />
                            </mask>
                            <g mask="url(#mask0_497_18047)">
                                <rect width="24" height="24" fill="#0D1C2E" />
                            </g>
                        </svg>
                        <svg id="keuanganDown" class="mt-1 ms-16 hidden" width="16" height="16"
                            viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M11.9999 16C11.7719 16 11.5449 15.923 11.3599 15.768L5.35991 10.768C4.93591 10.415 4.87791 9.784 5.23191 9.36C5.58491 8.936 6.21491 8.879 6.63991 9.232L12.0109 13.708L17.3729 9.393C17.8029 9.047 18.4329 9.115 18.7789 9.545C19.1249 9.975 19.0569 10.604 18.6269 10.951L12.6269 15.779C12.4439 15.926 12.2219 16 11.9999 16Z"
                                fill="#231F20" />
                            <mask id="mask0_497_18037" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="5" y="9"
                                width="14" height="7">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M11.9999 16C11.7719 16 11.5449 15.923 11.3599 15.768L5.35991 10.768C4.93591 10.415 4.87791 9.784 5.23191 9.36C5.58491 8.936 6.21491 8.879 6.63991 9.232L12.0109 13.708L17.3729 9.393C17.8029 9.047 18.4329 9.115 18.7789 9.545C19.1249 9.975 19.0569 10.604 18.6269 10.951L12.6269 15.779C12.4439 15.926 12.2219 16 11.9999 16Z"
                                    fill="white" />
                            </mask>
                            <g mask="url(#mask0_497_18037)">
                                <rect width="24" height="24" fill="#0D1C2E" />
                            </g>
                        </svg>


                    </a>
                    <ul class="ms-6 @if ($route != 'adminTransaction' && $route != 'adminExpense' && $route != 'adminDebt' && $route != 'adminCash') hidden @endif" id="menuKeuangan">
                        <li
                            class="py-2 px-5 rounded-s-2xl text-zinc-700 hover:text-green-600 @if ($route == 'adminCash') list-active @endif">
                            <a href="{{ route('adminCash') }}" class="">Kas</a>
                        </li>
                        <li
                            class="py-2 px-5 rounded-s-2xl text-zinc-700 hover:text-green-600 @if ($route == 'adminExpense') list-active @endif">
                            <a href="{{ route('adminExpense') }}" class="">Biaya</a>
                        </li>
                        <li
                            class="py-2 px-5 rounded-s-2xl text-zinc-700 hover:text-green-600 @if ($route == 'adminDebt') list-active @endif">
                            <a href="{{ route('adminDebt') }}" class="">Hutang</a>
                        </li>
                        <li
                            class="py-2 px-5 rounded-s-2xl text-zinc-700 hover:text-green-600 @if ($route == 'adminTransaction') list-active @endif">
                            <a href="{{ route('adminTransaction') }}" class="">Transaksi</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('adminProfile') }}"
                        class="flex py-4 px-5 rounded-s-2xl text-zinc-700 hover:text-green-600 sidebar-list {{ $route == 'adminProfile' ? 'sidebar-active' : '' }}">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M14 7C14 5.897 13.103 5 12 5C10.897 5 10 5.897 10 7C10 8.103 10.897 9 12 9C13.103 9 14 8.103 14 7ZM16 7C16 9.206 14.206 11 12 11C9.794 11 8 9.206 8 7C8 4.794 9.794 3 12 3C14.206 3 16 4.794 16 7ZM5 20C5 16.14 8.141 13 12 13C15.859 13 19 16.14 19 20C19 20.552 18.553 21 18 21C17.447 21 17 20.552 17 20C17 17.243 14.757 15 12 15C9.243 15 7 17.243 7 20C7 20.552 6.553 21 6 21C5.447 21 5 20.552 5 20Z"
                                fill="#231F20" />
                            <mask id="mask0_497_18072" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="5" y="3"
                                width="14" height="18">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M14 7C14 5.897 13.103 5 12 5C10.897 5 10 5.897 10 7C10 8.103 10.897 9 12 9C13.103 9 14 8.103 14 7ZM16 7C16 9.206 14.206 11 12 11C9.794 11 8 9.206 8 7C8 4.794 9.794 3 12 3C14.206 3 16 4.794 16 7ZM5 20C5 16.14 8.141 13 12 13C15.859 13 19 16.14 19 20C19 20.552 18.553 21 18 21C17.447 21 17 20.552 17 20C17 17.243 14.757 15 12 15C9.243 15 7 17.243 7 20C7 20.552 6.553 21 6 21C5.447 21 5 20.552 5 20Z"
                                    fill="white" />
                            </mask>
                            <g mask="url(#mask0_497_18072)">
                                <rect width="24" height="24" fill="#0D1C2E" />
                            </g>
                        </svg>

                        <div class="w-full overflow-hidden">
                            <p class="ms-2">{{ $acc->first_name . ' ' . $acc->last_name }}</p>
                            <p class="ms-2 text-sm text-slate-500 w-full h-5">{{ $acc->email }}</p>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    @endif

@endisset
