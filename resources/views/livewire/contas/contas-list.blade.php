<div>
    @section('titulo', 'Suas Contas')

    <!-- Loading -->
    @include('includes.loading')
    <!-- ./Loading -->

    <div id="informacao-cadastro" class="w-full">
        <div class="h-auto px-5 py-5 bg-white rounded-xl shadow-md">
            <h1 class="text-sm tracking-widest font-semibold uppercase text-gray-400">
                Contas
            </h1>
            <div class="border border-gray-300 mt-2 mb-6"></div>


            <div class="relative flex md:justify-between flex-wrap items-center gap-4 py-3">
                <div class="">
                    <x-form.label value="Legendas" />

                    <div class="flex items-center gap-2">
                        <div class="bg-red-500 p-1 size-4 rounded-full">
                        </div>

                        <span class="text-xs uppercase font-bold text-red-400">Documento em atraso</span>
                    </div>
                </div>

                <div class="relative flex justify-center items-center gap-5">
                    <div>
                        <x-form.label value="Status" />

                        <x-form.select wire:model.live="filterStatus">
                            <option value="">Todos</option>
                            <option value="A">A pagar</option>
                            <option value="P">pagos</option>
                        </x-form.select>
                    </div>
                </div>

            </div>

            <div class="w-full overflow-hidden hidden lg:block">
                <div class="w-full overflow-x-auto rounded-xl">
                    <table class="w-full rounded-xl bg-gray-100 shadow-xs">
                        <thead class="">
                            <tr x-cloak
                                class="relative text-xs font-semibold tracking-wide text-center text-gray-500 uppercase border-b border-gray-200">
                                <th class="px-4 py-3">
                                    <div class="flex justify-center">
                                        <div class="flex justify-center gap-1 items-center cursor-pointer">
                                            <button class="text-xs font-medium leading-4 tracking-wider uppercase">
                                                N° Doc
                                            </button>
                                        </div>
                                    </div>
                                </th>

                                <th class="px-4 py-3">
                                    <div class="flex justify-center">
                                        <div class="flex justify-center gap-1 items-center cursor-pointer">
                                            <button class="text-xs font-medium leading-4 tracking-wider uppercase">
                                                Histórico
                                            </button>
                                        </div>
                                    </div>
                                </th>

                                <th class="px-4 py-3">
                                    <div class="flex justify-center">
                                        <div class="flex justify-center gap-1 items-center cursor-pointer">
                                            <button class="text-xs font-medium leading-4 tracking-wider uppercase">
                                                Data Venc
                                            </button>
                                        </div>
                                    </div>
                                </th>

                                <th class="px-4 py-3">
                                    <div class="flex justify-center">
                                        <div class="flex justify-center gap-1 items-center cursor-pointer">
                                            <button class="text-xs font-medium leading-4 tracking-wider uppercase">
                                                Valor Doc
                                            </button>
                                        </div>
                                    </div>
                                </th>

                                <th class="px-4 py-3">
                                    <div class="flex justify-center">
                                        <div class="flex justify-center gap-1 items-center cursor-pointer">
                                            <button class="text-xs font-medium leading-4 tracking-wider uppercase">
                                                Status
                                            </button>
                                        </div>
                                    </div>
                                </th>
                            </tr>
                        </thead>

                        <tbody class="bg-white divide-y divide-gray-100">
                            @forelse ($contas as $conta)
                                <tr wire:key="{{ $conta->COD_SEQ }}" x-data
                                    class="font-semibold text-sm hover:cursor-pointer hover:bg-gray-50 @if ($conta->SALDO_DEVEDOR > 0) {{ $dataAtual > $conta->DT_VENCIMENTO ? 'text-red-500 bg-red-100' : '' }} @endif">
                                    <td class="py-4 text-center ">
                                        #{{ $conta->N_DOCUMENTO }}
                                    </td>

                                    <td class="py-4 flex justify-center items-center">
                                        {{ convert($conta->HISTORICO) }}
                                    </td>

                                    <td class="py-4 text-center">
                                        {{ formataData($conta->DT_VENCIMENTO) }}
                                    </td>

                                    <td class="py-4 tracking-wider text-center">
                                        <span
                                            class="text-xs text-gray-500">R$</span>{{ number_format($conta->VL_DOCUMENTO, 2, ',', ' ') }}
                                    </td>

                                    <td class="py-4 text-center">
                                        <button
                                            class="p-2 rounded-full text-xs uppercase {{ $conta->SALDO_DEVEDOR == 0 ? 'text-blue-500 bg-blue-200' : 'text-orange-500 bg-orange-200' }}">
                                            {{ $conta->SALDO_DEVEDOR == 0 ? 'Pago' : 'A Pagar' }}
                                        </button>
                                    </td>

                                    <td x-data="{ menu: false }" class="relative py-3 text-center flex justify-center">
                                        @if ($conta->SALDO_DEVEDOR > 0)
                                            <div class="flex items-center space-x-2">
                                                <button x-on:click="menu = !menu;" @keydown.escape="menu = false"
                                                    @click.away="menu = false;"
                                                    class="flex items-center justify-between px-2 py-2 font-medium leading-5 text-blue-600 rounded-full hover:bg-gray-200 hover:scale-95">
                                                    <svg class="size-5" xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 24 24" fill="currentColor">
                                                        <path
                                                            d="M12 3C10.9 3 10 3.9 10 5C10 6.1 10.9 7 12 7C13.1 7 14 6.1 14 5C14 3.9 13.1 3 12 3ZM12 17C10.9 17 10 17.9 10 19C10 20.1 10.9 21 12 21C13.1 21 14 20.1 14 19C14 17.9 13.1 17 12 17ZM12 10C10.9 10 10 10.9 10 12C10 13.1 10.9 14 12 14C13.1 14 14 13.1 14 12C14 10.9 13.1 10 12 10Z">
                                                        </path>
                                                    </svg>
                                                </button>


                                                <template x-if="menu">
                                                    <ul x-transition:leave="transition ease-in duration-150"
                                                        x-transition:leave-start="opacity-100"
                                                        x-transition:leave-end="opacity-0"
                                                        @keydown.escape="menu = false; "
                                                        class="absolute right-7 top-8 z-40 w-44 p-2 mt-4 space-y-2 text-gray-600 bg-white border border-gray-100 rounded-md shadow-md"
                                                        aria-label="submenu">

                                                        <li class="flex">
                                                            @if ($conta->AGENTE_TIPO == 'B')
                                                                <a href="http://54.94.202.117/api/util/v1/1/boleto/{{ $conta->COD_SEQ }}"
                                                                    target=”_blank”
                                                                    class="inline-flex items-center w-full px-2 py-1 text-xs font-semibold uppercase transition-colors duration-150 rounded-md hover:bg-green-200 hover:text-gray-800">
                                                                    <svg class="size-5 mr-2"
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        viewBox="0 0 24 24" fill="currentColor">
                                                                        <path
                                                                            d="M17 2C17.5523 2 18 2.44772 18 3V7H21C21.5523 7 22 7.44772 22 8V18C22 18.5523 21.5523 19 21 19H18V21C18 21.5523 17.5523 22 17 22H7C6.44772 22 6 21.5523 6 21V19H3C2.44772 19 2 18.5523 2 18V8C2 7.44772 2.44772 7 3 7H6V3C6 2.44772 6.44772 2 7 2H17ZM16 17H8V20H16V17ZM20 9H4V17H6V16C6 15.4477 6.44772 15 7 15H17C17.5523 15 18 15.4477 18 16V17H20V9ZM8 10V12H5V10H8ZM16 4H8V7H16V4Z">
                                                                        </path>
                                                                    </svg>

                                                                    <span>Imprimir</span>
                                                                </a>
                                                            @endif
                                                        </li>

                                                        <li class="flex">
                                                            <button
                                                                x-on:click="$dispatch('open-modal-primary', { name : 'pagamento' })"
                                                                class="inline-flex items-center w-full px-2 py-1 text-xs font-semibold uppercase transition-colors duration-150 rounded-md hover:bg-green-200 hover:text-gray-800">
                                                                <svg class="size-5 mr-2"
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    viewBox="0 0 24 24" fill="currentColor">
                                                                    <path
                                                                        d="M14.4727 1.74514L22.2509 9.52334C23.6177 10.8902 23.6177 13.1063 22.2509 14.4731L14.4727 22.2512C13.1059 23.6181 10.8898 23.6181 9.52303 22.2512L1.74486 14.4731C0.378017 13.1063 0.378017 10.8902 1.74486 9.52334L9.52303 1.74514C10.8898 0.378247 13.1059 0.378247 14.4727 1.74514ZM11.9979 14.8266L9.52301 17.3015C9.14344 17.6811 8.69837 17.9552 8.22419 18.124L10.9372 20.837C11.523 21.4228 12.4727 21.4228 13.0585 20.837L15.7716 18.124C15.2974 17.9552 14.8523 17.6811 14.4727 17.3015L11.9979 14.8266ZM5.98823 8.10835L3.15907 10.9376C2.57328 11.5234 2.57328 12.4731 3.15907 13.0589L5.9875 15.8873C6.57328 16.4731 7.52303 16.4731 8.10882 15.8873L10.5836 13.4124C11.3647 12.6314 12.631 12.6314 13.4121 13.4124L15.8869 15.8873C16.4726 16.4729 17.4224 16.4726 18.0083 15.8873L20.8367 13.0589C21.4225 12.4731 21.4225 11.5234 20.8367 10.9376L18.0083 8.10905C17.4225 7.52435 16.4724 7.52365 15.8869 8.10905L13.4121 10.584C12.631 11.3651 11.3647 11.3651 10.5836 10.584L8.10882 8.10905C7.52328 7.52355 6.57408 7.52335 5.98823 8.10835ZM10.9372 3.15935L8.22419 5.87235C8.69837 6.04115 9.14344 6.31535 9.52301 6.69485L11.9979 9.16975L14.4727 6.69485C14.8523 6.31535 15.2974 6.04115 15.7716 5.87235L13.0585 3.15935C12.4727 2.57355 11.523 2.57355 10.9372 3.15935Z">
                                                                    </path>
                                                                </svg>

                                                                <span>Pagar C/ Pix</span>
                                                            </button>
                                                        </li>
                                                    </ul>
                                                </template>
                                            </div>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <div class="absolute left-[50%] mt-16 flex justify-center">
                                    <h1
                                        class="text-sm font-semibold text-center tracking-widest uppercase bg-red-200 rounded w-44 p-1 dark:text-red-600">
                                        Sem registros
                                    </h1>
                                </div>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- CARD -->
            <div class="flex flex-col gap-4 mt-4 p-3 lg:hidden">
                @foreach ($contas as $conta)
                    <div wire:key="{{ $conta->COD_SEQ }}" x-data="{ menu: false }"
                        class="p-2 space-y-0 rounded-xl border border-gray-300 transition-all hover:scale-95 hover:cursor-pointer @if ($conta->SALDO_DEVEDOR > 0) {{ $dataAtual > $conta->DT_VENCIMENTO ? 'text-red-500 border-red-100' : '' }} @endif">

                        <div class="relative space-y-1 w-full text-xs" x-on:click="menu = !menu;"
                            @keydown.escape="menu = false" @click.away="menu = false;">
                            <div class="flex justify-between items-center mb-2">
                                <span class="font-bold text-xs">#{{ $conta->N_DOCUMENTO }}</span>

                                <div class="">
                                    <button
                                        class="p-1 rounded-full text-xs uppercase {{ $conta->SALDO_DEVEDOR == 0 ? 'text-blue-500 bg-blue-200' : 'text-orange-500 bg-orange-200' }}">
                                        {{ $conta->SALDO_DEVEDOR == 0 ? 'Pago' : 'A Pagar' }}
                                    </button>

                                    @if ($conta->SALDO_DEVEDOR > 0)
                                        <template x-if="menu">
                                            <ul x-transition:leave="transition ease-in duration-150"
                                                x-transition:leave-start="opacity-100"
                                                x-transition:leave-end="opacity-0" @keydown.escape="menu = false; "
                                                class="absolute right-7 top-8 z-40 w-44 p-2 mt-4 space-y-2 text-gray-600 bg-white border border-gray-100 rounded-md shadow-md"
                                                aria-label="submenu">

                                                @if ($conta->AGENTE_TIPO == 'B')
                                                    <li class="flex">
                                                        <a href="http://54.94.202.117/api/util/v1/1/boleto/{{ $conta->COD_SEQ }}"
                                                            target=”_blank”
                                                            class="inline-flex items-center w-full px-2 py-1 text-xs font-semibold uppercase transition-colors duration-150 rounded-md hover:bg-green-200 hover:text-gray-800">
                                                            <svg class="size-5 mr-2"
                                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                                fill="currentColor">
                                                                <path
                                                                    d="M17 2C17.5523 2 18 2.44772 18 3V7H21C21.5523 7 22 7.44772 22 8V18C22 18.5523 21.5523 19 21 19H18V21C18 21.5523 17.5523 22 17 22H7C6.44772 22 6 21.5523 6 21V19H3C2.44772 19 2 18.5523 2 18V8C2 7.44772 2.44772 7 3 7H6V3C6 2.44772 6.44772 2 7 2H17ZM16 17H8V20H16V17ZM20 9H4V17H6V16C6 15.4477 6.44772 15 7 15H17C17.5523 15 18 15.4477 18 16V17H20V9ZM8 10V12H5V10H8ZM16 4H8V7H16V4Z">
                                                                </path>
                                                            </svg>

                                                            <span>Imprimir</span>
                                                        </a>
                                                    </li>
                                                @endif

                                                <li class="flex">
                                                    <button
                                                        x-on:click="$dispatch('open-modal-primary', { name : 'pagamento' })"
                                                        class="inline-flex items-center w-full px-2 py-1 text-xs font-semibold uppercase transition-colors duration-150 rounded-md hover:bg-green-200 hover:text-gray-800">
                                                        <svg class="size-5 mr-2" xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 24 24" fill="currentColor">
                                                            <path
                                                                d="M14.4727 1.74514L22.2509 9.52334C23.6177 10.8902 23.6177 13.1063 22.2509 14.4731L14.4727 22.2512C13.1059 23.6181 10.8898 23.6181 9.52303 22.2512L1.74486 14.4731C0.378017 13.1063 0.378017 10.8902 1.74486 9.52334L9.52303 1.74514C10.8898 0.378247 13.1059 0.378247 14.4727 1.74514ZM11.9979 14.8266L9.52301 17.3015C9.14344 17.6811 8.69837 17.9552 8.22419 18.124L10.9372 20.837C11.523 21.4228 12.4727 21.4228 13.0585 20.837L15.7716 18.124C15.2974 17.9552 14.8523 17.6811 14.4727 17.3015L11.9979 14.8266ZM5.98823 8.10835L3.15907 10.9376C2.57328 11.5234 2.57328 12.4731 3.15907 13.0589L5.9875 15.8873C6.57328 16.4731 7.52303 16.4731 8.10882 15.8873L10.5836 13.4124C11.3647 12.6314 12.631 12.6314 13.4121 13.4124L15.8869 15.8873C16.4726 16.4729 17.4224 16.4726 18.0083 15.8873L20.8367 13.0589C21.4225 12.4731 21.4225 11.5234 20.8367 10.9376L18.0083 8.10905C17.4225 7.52435 16.4724 7.52365 15.8869 8.10905L13.4121 10.584C12.631 11.3651 11.3647 11.3651 10.5836 10.584L8.10882 8.10905C7.52328 7.52355 6.57408 7.52335 5.98823 8.10835ZM10.9372 3.15935L8.22419 5.87235C8.69837 6.04115 9.14344 6.31535 9.52301 6.69485L11.9979 9.16975L14.4727 6.69485C14.8523 6.31535 15.2974 6.04115 15.7716 5.87235L13.0585 3.15935C12.4727 2.57355 11.523 2.57355 10.9372 3.15935Z">
                                                            </path>
                                                        </svg>

                                                        <span>Pagar C/ Pix</span>
                                                    </button>
                                                </li>
                                            </ul>
                                        </template>
                                    @endif
                                </div>
                            </div>

                            <div class="font-bold text-sm uppercase">
                                {{ convert($conta->HISTORICO) }}
                            </div>

                            <div class="flex justify-between items-center flex-wrap font-semibold">
                                <div class="text-xs uppercase ">
                                    Venci.:{{ formataData($conta->DT_VENCIMENTO) }}
                                </div>

                                <div class="text-sm">
                                    <span
                                        class="text-xs ">R$</span>{{ number_format($conta->VL_DOCUMENTO, 2, ',', ' ') }}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!--./CARD -->

            <div class="border my-4 mx-32 border-gray-200"></div>

            <div class="flex justify-between gap-2 items-center mx-4 my-2 py-1">
                @include('includes.porPagina')

                {{ $contas->onEachSide(1)->links('components.pagination', ['is_livewire' => true]) }}
            </div>
        </div>
    </div>

    <x-modal.modal-primary name="pagamento" title="Pagamento Com" subtitle="Pix">
        @slot('body')
            <div class="text-sm uppercase font-semibold bg-gray-100 p-2 rounded-md">

                <h1 class="text-sm uppercase text-gray-500 font-bold text-center">
                    Clique no CNPJ para copiar
                </h1>
                <div class="flex items-center flex-col gap-1 mb-4">
                    <button class="bg-white p-2 rounded-md hover:cursor-pointer" wire:click="copy()"
                        onclick="copiarParaClipboard('04959577000186')">
                        04.959.577/0001-86
                    </button>
                    <span>Rica Desenvolvimento</span>
                </div>

                <h1 class="text-sm uppercase text-red-400 font-bold text-center">
                    para efetuarmos a liberação do sistema, por gentileza enviar comprovante para:
                </h1>

                <div class="flex justify-center mt-2">
                    <a class="flex items-center gap-1 bg-green-100 p-2 rounded-md text-green-500 hover:scale-95 transition-all"
                        href="https://api.whatsapp.com/send?phone=5585996317902" target="_blank"
                        rel="noopener noreferrer">
                        <svg class="size-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                            <path
                                d="M7.25361 18.4944L7.97834 18.917C9.18909 19.623 10.5651 20 12.001 20C16.4193 20 20.001 16.4183 20.001 12C20.001 7.58172 16.4193 4 12.001 4C7.5827 4 4.00098 7.58172 4.00098 12C4.00098 13.4363 4.37821 14.8128 5.08466 16.0238L5.50704 16.7478L4.85355 19.1494L7.25361 18.4944ZM2.00516 22L3.35712 17.0315C2.49494 15.5536 2.00098 13.8345 2.00098 12C2.00098 6.47715 6.47813 2 12.001 2C17.5238 2 22.001 6.47715 22.001 12C22.001 17.5228 17.5238 22 12.001 22C10.1671 22 8.44851 21.5064 6.97086 20.6447L2.00516 22ZM8.39232 7.30833C8.5262 7.29892 8.66053 7.29748 8.79459 7.30402C8.84875 7.30758 8.90265 7.31384 8.95659 7.32007C9.11585 7.33846 9.29098 7.43545 9.34986 7.56894C9.64818 8.24536 9.93764 8.92565 10.2182 9.60963C10.2801 9.76062 10.2428 9.95633 10.125 10.1457C10.0652 10.2428 9.97128 10.379 9.86248 10.5183C9.74939 10.663 9.50599 10.9291 9.50599 10.9291C9.50599 10.9291 9.40738 11.0473 9.44455 11.1944C9.45903 11.25 9.50521 11.331 9.54708 11.3991C9.57027 11.4368 9.5918 11.4705 9.60577 11.4938C9.86169 11.9211 10.2057 12.3543 10.6259 12.7616C10.7463 12.8783 10.8631 12.9974 10.9887 13.108C11.457 13.5209 11.9868 13.8583 12.559 14.1082L12.5641 14.1105C12.6486 14.1469 12.692 14.1668 12.8157 14.2193C12.8781 14.2457 12.9419 14.2685 13.0074 14.2858C13.0311 14.292 13.0554 14.2955 13.0798 14.2972C13.2415 14.3069 13.335 14.2032 13.3749 14.1555C14.0984 13.279 14.1646 13.2218 14.1696 13.2222V13.2238C14.2647 13.1236 14.4142 13.0888 14.5476 13.097C14.6085 13.1007 14.6691 13.1124 14.7245 13.1377C15.2563 13.3803 16.1258 13.7587 16.1258 13.7587L16.7073 14.0201C16.8047 14.0671 16.8936 14.1778 16.8979 14.2854C16.9005 14.3523 16.9077 14.4603 16.8838 14.6579C16.8525 14.9166 16.7738 15.2281 16.6956 15.3913C16.6406 15.5058 16.5694 15.6074 16.4866 15.6934C16.3743 15.81 16.2909 15.8808 16.1559 15.9814C16.0737 16.0426 16.0311 16.0714 16.0311 16.0714C15.8922 16.159 15.8139 16.2028 15.6484 16.2909C15.391 16.428 15.1066 16.5068 14.8153 16.5218C14.6296 16.5313 14.4444 16.5447 14.2589 16.5347C14.2507 16.5342 13.6907 16.4482 13.6907 16.4482C12.2688 16.0742 10.9538 15.3736 9.85034 14.402C9.62473 14.2034 9.4155 13.9885 9.20194 13.7759C8.31288 12.8908 7.63982 11.9364 7.23169 11.0336C7.03043 10.5884 6.90299 10.1116 6.90098 9.62098C6.89729 9.01405 7.09599 8.4232 7.46569 7.94186C7.53857 7.84697 7.60774 7.74855 7.72709 7.63586C7.85348 7.51651 7.93392 7.45244 8.02057 7.40811C8.13607 7.34902 8.26293 7.31742 8.39232 7.30833Z">
                            </path>
                        </svg>

                        Whatsapp Financeiro
                    </a>
                </div>

            </div>
        @endslot
    </x-modal.modal-primary>
</div>
