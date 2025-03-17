<div class="flex justify-between">

    <div x-cloak x-on:mouseover="sidebar.full = true"
        x-on:mouseleave="sidebar.full = false, dropdown.open = false, dropdownProduto.open = false, dropdownMovimentacao.open = false, dropdownContas.open = false"
        class="flex-shrink-0 bg-white transition-all duration-300 mx-5 my-4 rounded-lg shadow-lg shadow-gray-300 p-4 hidden sm:block"
        x-bind:class="{
            'w-64': sidebar.full,
            'w-64 sm:w-20': !sidebar.full,
            'left-0': sidebar
                .navOpen,
            '-left-64 sm:left-0': !sidebar.navOpen
        }">

        <div class="flex items-center gap-2" x-bind:class="sidebar.full ? 'justify-start' : 'justify-center'">

            <img aria-hidden="true" class="w-10 rounded" src="{{ asset('img/logo.jpeg') }}" alt="Rica Informática" />

            <span class="font-black uppercase text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-orange-600"
                x-bind:class="sidebar.full ? '' : 'hidden'">
                Rica Cliente
            </span>
        </div>
        <div class="relative mt-4 space-y-4 text-xs uppercase font-bold">

            <div class="border border-gray-200"></div>

            {{-- HOME --}}
            <a href="{{ route('rica.dashboard') }}"
                class="relative flex justify-between items-center space-x-2 p-2 cursor-pointer {{ request()->routeIs('rica.dashboard') ? 'text-blue-500 border-l-2 border-blue-500 ' : 'text-gray-400 hover:text-blue-500' }}"
                x-bind:class="{
                    'justify-start': sidebar.full,
                    'sm:justify-center': !sidebar.full,
                }">
                <div class="flex items-center space-x-2">
                    <x-icons.home class="size-6" />

                    <h1 x-clock
                        x-bind:class="!sidebar.full && tooltip.show ? visibleClass : '' || !sidebar.full && !tooltip.show ?
                            'sm:hidden' : ''">
                        Inicio
                    </h1>
                </div>
            </a>

            {{-- PERFIL --}}
            <a href="{{ route('rica.perfil') }}"
                class="relative flex justify-between items-center space-x-2 p-2 cursor-pointer {{ request()->routeIs('rica.perfil') ? 'text-blue-500 border-l-2 border-blue-500 ' : 'text-gray-400 hover:text-blue-500' }}"
                x-bind:class="{
                    'justify-start': sidebar.full,
                    'sm:justify-center': !sidebar.full,
                }">
                <div class="flex items-center space-x-2">
                    <x-icons.user class="size-6" />

                    <h1 x-clock
                        x-bind:class="!sidebar.full && tooltip.show ? visibleClass : '' || !sidebar.full && !tooltip.show ?
                            'sm:hidden' : ''">
                        Cadastro
                    </h1>
                </div>
            </a>

            {{-- TICKET --}}
            <a href="{{ route('rica.ticket') }}"
                class="relative flex justify-between items-center space-x-2 p-2 cursor-pointer {{ request()->routeIs('rica.ticket') ? 'text-blue-500 border-l-2 border-blue-500 ' : 'text-gray-400 hover:text-blue-500' }}"
                x-bind:class="{
                    'justify-start': sidebar.full,
                    'sm:justify-center': !sidebar.full,
                }">
                <div class="flex items-center space-x-2">
                    <x-icons.ticket class="size-6" />

                    <h1 x-clock
                        x-bind:class="!sidebar.full && tooltip.show ? visibleClass : '' || !sidebar.full && !tooltip.show ?
                            'sm:hidden' : ''">
                        Ticket's
                    </h1>
                </div>
            </a>

            <div class="border border-gray-200"></div>
        </div>
    </div>
</div>

<!-- Mobile -->
<div x-cloak class="flex justify-between ">

    <div class="fixed z-50 flex-shrink-0 space-y-2 mx-4 my-4 p-2 h-full rounded-lg transition-all duration-300 bg-white sm:hidden"
        x-bind:class="{
            'top-0 left-0 w-72': sidebar
                .navOpen,
            'top-0 -left-80': !sidebar.navOpen
        }">

        <div class="flex items-center justify-between gap-2">
            <img class="w-10 rounded" src="{{ asset('img/logo.jpeg') }}" alt="logo empresa">

            <span
                class="font-black uppercase text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-orange-600">
                Rica Cliente
            </span>

            <button x-on:click="sidebar.navOpen = !sidebar.navOpen" class="block lg:hidden focus:outline-none">
                <!-- Close Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6" x-bind:class="sidebar.navOpen ? '' : 'hidden'">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <div class="relative mt-4 space-y-4 text-xs uppercase font-bold">

            <div class="border border-gray-300"></div>

            {{-- HOME --}}
            <a href="{{ route('rica.dashboard') }}"
                class="relative flex justify-between items-center space-x-2 p-2 cursor-pointer {{ request()->routeIs('rica.dashboard') ? 'text-blue-500 border-l-2 border-blue-500 ' : 'text-gray-400 hover:text-blue-500' }}"
                x-bind:class="{
                    'justify-start': sidebar.full,
                    'sm:justify-center': !sidebar.full,
                }">
                <div class="flex items-center space-x-2">
                    <x-icons.home class="size-6" />

                    <h1 x-clock
                        x-bind:class="!sidebar.full && tooltip.show ? visibleClass : '' || !sidebar.full && !tooltip.show ?
                            'sm:hidden' : ''">
                        Inicio
                    </h1>
                </div>
            </a>

            {{-- PERFIL --}}
            <a href="{{ route('rica.perfil') }}"
                class="relative flex justify-between items-center space-x-2 p-2 cursor-pointer {{ request()->routeIs('rica.perfil') ? 'text-blue-500 border-l-2 border-blue-500 ' : 'text-gray-400 hover:text-blue-500' }}"
                x-bind:class="{
                    'justify-start': sidebar.full,
                    'sm:justify-center': !sidebar.full,
                }">
                <div class="flex items-center space-x-2">
                    <x-icons.user class="size-6" />

                    <h1 x-clock
                        x-bind:class="!sidebar.full && tooltip.show ? visibleClass : '' || !sidebar.full && !tooltip.show ?
                            'sm:hidden' : ''">
                        Cadastro
                    </h1>
                </div>
            </a>

            {{-- TICKET --}}
            <a href="{{ route('rica.ticket') }}"
                class="relative flex justify-between items-center space-x-2 p-2 cursor-pointer {{ request()->routeIs('rica.ticket') ? 'text-blue-500 border-l-2 border-blue-500 ' : 'text-gray-400 hover:text-blue-500' }}"
                x-bind:class="{
                    'justify-start': sidebar.full,
                    'sm:justify-center': !sidebar.full,
                }">
                <div class="flex items-center space-x-2">
                    <x-icons.ticket class="size-6" />

                    <h1 x-clock
                        x-bind:class="!sidebar.full && tooltip.show ? visibleClass : '' || !sidebar.full && !tooltip.show ?
                            'sm:hidden' : ''">
                        Ticket's
                    </h1>
                </div>
            </a>

            <div class="border border-gray-300"></div>

        </div>
    </div>
</div>
