<header class="py-2 border-b-2 mx-5 mt-7 border-gray-300 ">
    <div class="flex items-center justify-between">
        <div class="flex my-1 space-x-3">
            <button x-on:click="sidebar.navOpen = !sidebar.navOpen" class="block sm:hidden focus:outline-none ">
                <!-- Menu Icon -->
                <svg class="w-6 h-6" x-bind:class="sidebar.navOpen ? 'hidden' : ''" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24" fill="currentColor">
                    <path d="M3 4H21V6H3V4ZM3 11H21V13H3V11ZM3 18H21V20H3V18Z"></path>
                </svg>

                <!-- Close Icon -->
                <svg x-cloak xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6" x-bind:class="sidebar.navOpen ? '' : 'hidden'">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>

            </button>

            <div>
                @hasSection('titulo')
                    <h1 class="text-lg uppercase tracking-widest font-bold text-blue-500">@yield('titulo')</h1>
                    <span class="text-sm uppercase tracking-widest font-bold text-orange-500">@yield('subtitulo')</span>
                @endif
            </div>
        </div>

        <ul class="flex justify-center items-center flex-shrink-0 space-x-10">
            <li>
                {{-- <button x-data x-on:click="$dispatch('open-modal', { name : 'pesquisaGeral' })" class="text-blue-500 p-2 hover:bg-gray-300 rounded-full dark:hover:bg-gray-700">
                    <x-icons.search class="size-6"></x-icons.search>
                </button> --}}
            </li>

            <!-- news -->
            <li x-title="NavBar:dropdownSuporte" x-data="{ news: false }" class="relative hidden sm:block"
                wfd-id="105">
                <button class="flex items-center gap-2 text-blue-500" x-on:click="news = !news;"
                    @keydown.escape="news = false" @click.away="news = false;" aria-label="Account" aria-haspopup="true"
                    wfd-id="146">

                    <svg class="size-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M4.848 2.771A49.144 49.144 0 0 1 12 2.25c2.43 0 4.817.178 7.152.52 1.978.292 3.348 2.024 3.348 3.97v6.02c0 1.946-1.37 3.678-3.348 3.97a48.901 48.901 0 0 1-3.476.383.39.39 0 0 0-.297.17l-2.755 4.133a.75.75 0 0 1-1.248 0l-2.755-4.133a.39.39 0 0 0-.297-.17 48.9 48.9 0 0 1-3.476-.384c-1.978-.29-3.348-2.024-3.348-3.97V6.741c0-1.946 1.37-3.68 3.348-3.97ZM6.75 8.25a.75.75 0 0 1 .75-.75h9a.75.75 0 0 1 0 1.5h-9a.75.75 0 0 1-.75-.75Zm.75 2.25a.75.75 0 0 0 0 1.5H12a.75.75 0 0 0 0-1.5H7.5Z"
                            clip-rule="evenodd" />
                    </svg>

                    <span class="text-sm uppercase tracking-widest font-bold">Suporte</span>

                    <svg class="size-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path
                            d="M11.9999 13.1714L16.9497 8.22168L18.3639 9.63589L11.9999 15.9999L5.63599 9.63589L7.0502 8.22168L11.9999 13.1714Z">
                        </path>
                    </svg>
                </button>

                <template x-if="news">
                    <div x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0" @keydown.escape="news = false; "
                        class="absolute right-0 z-40 flex items-center p-5 mt-4 text-gray-600 bg-white shadow-lg rounded-md"
                        aria-label="submenu">

                        <div>
                            <span class="text-xs uppercase font-bold">Tire sua dúvida</span>

                            <div>
                                <a href="https://api.whatsapp.com/send?phone=558532235533&text=" target="_blank"
                                    class="flex items-center gap-2 w-44 text-blue-400 p-2 hover:underline underline-offset-4 decoration-2 transition-all">
                                    <svg class="size-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                        fill="currentColor">
                                        <path
                                            d="M7.25361 18.4944L7.97834 18.917C9.18909 19.623 10.5651 20 12.001 20C16.4193 20 20.001 16.4183 20.001 12C20.001 7.58172 16.4193 4 12.001 4C7.5827 4 4.00098 7.58172 4.00098 12C4.00098 13.4363 4.37821 14.8128 5.08466 16.0238L5.50704 16.7478L4.85355 19.1494L7.25361 18.4944ZM2.00516 22L3.35712 17.0315C2.49494 15.5536 2.00098 13.8345 2.00098 12C2.00098 6.47715 6.47813 2 12.001 2C17.5238 2 22.001 6.47715 22.001 12C22.001 17.5228 17.5238 22 12.001 22C10.1671 22 8.44851 21.5064 6.97086 20.6447L2.00516 22ZM8.39232 7.30833C8.5262 7.29892 8.66053 7.29748 8.79459 7.30402C8.84875 7.30758 8.90265 7.31384 8.95659 7.32007C9.11585 7.33846 9.29098 7.43545 9.34986 7.56894C9.64818 8.24536 9.93764 8.92565 10.2182 9.60963C10.2801 9.76062 10.2428 9.95633 10.125 10.1457C10.0652 10.2428 9.97128 10.379 9.86248 10.5183C9.74939 10.663 9.50599 10.9291 9.50599 10.9291C9.50599 10.9291 9.40738 11.0473 9.44455 11.1944C9.45903 11.25 9.50521 11.331 9.54708 11.3991C9.57027 11.4368 9.5918 11.4705 9.60577 11.4938C9.86169 11.9211 10.2057 12.3543 10.6259 12.7616C10.7463 12.8783 10.8631 12.9974 10.9887 13.108C11.457 13.5209 11.9868 13.8583 12.559 14.1082L12.5641 14.1105C12.6486 14.1469 12.692 14.1668 12.8157 14.2193C12.8781 14.2457 12.9419 14.2685 13.0074 14.2858C13.0311 14.292 13.0554 14.2955 13.0798 14.2972C13.2415 14.3069 13.335 14.2032 13.3749 14.1555C14.0984 13.279 14.1646 13.2218 14.1696 13.2222V13.2238C14.2647 13.1236 14.4142 13.0888 14.5476 13.097C14.6085 13.1007 14.6691 13.1124 14.7245 13.1377C15.2563 13.3803 16.1258 13.7587 16.1258 13.7587L16.7073 14.0201C16.8047 14.0671 16.8936 14.1778 16.8979 14.2854C16.9005 14.3523 16.9077 14.4603 16.8838 14.6579C16.8525 14.9166 16.7738 15.2281 16.6956 15.3913C16.6406 15.5058 16.5694 15.6074 16.4866 15.6934C16.3743 15.81 16.2909 15.8808 16.1559 15.9814C16.0737 16.0426 16.0311 16.0714 16.0311 16.0714C15.8922 16.159 15.8139 16.2028 15.6484 16.2909C15.391 16.428 15.1066 16.5068 14.8153 16.5218C14.6296 16.5313 14.4444 16.5447 14.2589 16.5347C14.2507 16.5342 13.6907 16.4482 13.6907 16.4482C12.2688 16.0742 10.9538 15.3736 9.85034 14.402C9.62473 14.2034 9.4155 13.9885 9.20194 13.7759C8.31288 12.8908 7.63982 11.9364 7.23169 11.0336C7.03043 10.5884 6.90299 10.1116 6.90098 9.62098C6.89729 9.01405 7.09599 8.4232 7.46569 7.94186C7.53857 7.84697 7.60774 7.74855 7.72709 7.63586C7.85348 7.51651 7.93392 7.45244 8.02057 7.40811C8.13607 7.34902 8.26293 7.31742 8.39232 7.30833Z">
                                        </path>
                                    </svg>

                                    <span class="text-xs uppercase tracking-widest font-bold">Abrir WhatsApp</span>
                                </a>

                            </div>
                        </div>

                        <div class="border h-20 mx-6 border-gray-200"></div>

                        <div class="w-56">
                            <span class="text-xs uppercase font-bold">Faça uma solicitação</span>

                            <div>
                                <a href=""
                                    class="flex items-center gap-2 w-44 text-white bg-orange-500 rounded-lg p-2 transition-all hover:scale-95">
                                    <x-icons.ticket />

                                    <span class="text-xs uppercase tracking-widest font-bold">Criar Ticket</span>
                                </a>

                            </div>
                        </div>
                    </div>
                </template>
            </li>
            <!-- news -->

            <!-- Profile menu -->
            <li x-title="NavBar:ProfileMenu" x-data="{ isProfileMenuOpen: false }" class="relative" wfd-id="105">
                <button class="flex items-center gap-3 text-blue-500"
                    x-on:click="isProfileMenuOpen = !isProfileMenuOpen;" @keydown.escape="isProfileMenuOpen = false"
                    @click.away="isProfileMenuOpen = false;" aria-label="Account" aria-haspopup="true" wfd-id="146">

                    <div class=" rounded-full text-blue-500">
                        <svg class="size-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                            <path
                                d="M20 22H4V20C4 17.2386 6.23858 15 9 15H15C17.7614 15 20 17.2386 20 20V22ZM12 13C8.68629 13 6 10.3137 6 7C6 3.68629 8.68629 1 12 1C15.3137 1 18 3.68629 18 7C18 10.3137 15.3137 13 12 13Z">
                            </path>
                        </svg>
                    </div>

                    <span class="text-sm font-bold tracking-widest uppercase hidden sm:block">
                        Conta
                    </span>

                    <svg class="size-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path
                            d="M11.9999 13.1714L16.9497 8.22168L18.3639 9.63589L11.9999 15.9999L5.63599 9.63589L7.0502 8.22168L11.9999 13.1714Z">
                        </path>
                    </svg>
                </button>

                <template x-if="isProfileMenuOpen">
                    <ul x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0" @keydown.escape="isProfileMenuOpen = false; "
                        class="absolute right-0 z-40 w-56 p-5 mt-4 space-y-4 text-gray-600 bg-white shadow-lg rounded-md "
                        aria-label="submenu">

                        <li>
                            <div class="uppercase tracking-widest">
                                <span class="text-xs text-gray-400">Acessando como:</span>
                                <h1 class="text-xs">{{ auth()->user()->NOME ?? '' }}</h1>
                            </div>
                        </li>

                        <div class="border border-gray-200"></div>

                        <li class="flex">
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                class="inline-flex items-center w-full p-1 text-xs font-semibold uppercase transition-colors duration-150 rounded-md hover:bg-red-100 hover:text-gray-800">
                                <svg class="w-5 h-5 mr-3" aria-hidden="true" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path
                                        d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1">
                                    </path>
                                </svg>
                                <span>Sair</span>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="GET"
                                style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </template>
            </li>
            <!-- Profile menu -->
        </ul>
    </div>

    {{-- @livewire('tenant.pesquisa-geral') --}}
</header>
