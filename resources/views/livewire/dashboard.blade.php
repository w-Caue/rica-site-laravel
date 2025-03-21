<div>
    @section('titulo', 'Início')

    <div>
        <!-- Cards -->
        <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4" wfd-id="87">

            <!-- Card -->
            <a href="{{ route('rica.ticket') }}" title="Total de clientes que você tem acesso">
                <x-card.icon-card title="ticket's" subtitle="Visualize seus ticket's">
                    <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full">
                        <x-icons.ticket class="size-6" />
                    </div>
                </x-card.icon-card>
            </a>

            <a href="{{ route('rica.contas') }}" title="Total de clientes que você tem acesso">
                <x-card.icon-card title="Financeiro" subtitle="Verifique suas contas">
                    <div class="p-3 mr-4 text-purple-500 bg-purple-100 rounded-full">
                        <x-icons.tickets />
                    </div>
                </x-card.icon-card>
            </a>

        </div>
        <!--./Cards-->
    </div>

    <div class="relative grid gap-4 lg:grid-cols-5">
        <div class="lg:col-span-2 space-y-7">
            <div class="w-full">
                <div class="px-5 py-5 bg-white rounded-xl shadow-md">
                    <h1 class="text-sm tracking-widest font-semibold uppercase text-gray-400">
                        Último ticket criado
                    </h1>
                    <div class="border border-gray-300 mt-2 mb-6"></div>

                    <div class=" h-48 ">
                        @if ($ticket)
                            <!-- CARD -->
                            <div class="flex flex-col gap-4 mt-4 p-3">
                                <div wire:key="{{ $ticket->ID }}"
                                    x-on:click="$dispatch('open-modal-main', { name : 'clientes' })"
                                    wire:click="$dispatchTo('ticket.ticket-detalhe','dados', { codigo: {{ $ticket->ID }}})"
                                    class="p-2 space-y-0 rounded-xl border border-gray-300 transition-all hover:scale-95 hover:cursor-pointer">

                                    <div class="space-y-1 w-full text-xs">
                                        <div class="flex justify-between items-center">
                                            <span class="font-bold text-xs">{{ $ticket->ID }}</span>

                                            <h1 class="font-bold text-xs uppercase text-gray-500">
                                                {{ $ticket->CLIENTE_USUARIO }}
                                            </h1>
                                        </div>

                                        <div class="font-bold text-xs uppercase">
                                            {{ $ticket->ASSUNTO }}
                                        </div>

                                        <div class="flex justify-between items-center flex-wrap font-semibold">
                                            <div class="text-xs uppercase ">
                                                {{ formataData($ticket->DATA_CRIACAO) }}
                                            </div>

                                            <button
                                                class="p-2 rounded-full text-xs uppercase {{ $ticket->STATUS == 'A' ? 'text-blue-500 bg-blue-200' : '' }} 
                                            {{ $ticket->STATUS == 'D' ? 'text-green-500 bg-green-200' : '' }} 
                                            {{ $ticket->STATUS == 'C' ? 'text-purple-500 bg-purple-200' : '' }}
                                            {{ $ticket->STATUS == 'P' ? 'text-orange-500 bg-orange-200' : '' }}">
                                                {{ $ticket->STATUS == 'A' ? 'Aberto' : '' }}
                                                {{ $ticket->STATUS == 'D' ? 'Desenvolvimento' : '' }}
                                                {{ $ticket->STATUS == 'C' ? 'Concluido' : '' }}
                                                {{ $ticket->STATUS == 'P' ? 'Pendente' : '' }}
                                            </button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!--./CARD -->
                        @else
                            <div class="flex justify-center">
                                <button
                                    class="text-sm uppercase font-semibold bg-green-100 text-green-500 rounded-full p-2">
                                    Nenhum Ticket Registrado
                                </button>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="lg:col-span-2 w-full">
            <div class=" px-5 py-5 bg-white rounded-xl shadow-md">
                <h1 class="text-sm tracking-widest font-semibold uppercase text-gray-400">
                    Conta pendente
                </h1>
                <div class="border border-gray-300 mt-2 mb-6"></div>

                <div class="h-48 overflow-y-auto">
                    @forelse ($contas as $conta)
                        <!-- CARD -->
                        <div class="flex flex-col gap-4 p-3">
                            <div wire:key="{{ $conta->COD_SEQ }}" x-data="{ menu: false }"
                                class="p-2 space-y-0 rounded-xl border border-gray-300 transition-all hover:border-blue-300 hover:cursor-pointer relative">

                                @if ($conta->SALDO_DEVEDOR > 0)
                                    <template x-if="menu">
                                        <ul x-transition:leave="transition ease-in duration-150"
                                            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                                            @keydown.escape="menu = false; "
                                            class="absolute right-7 top-8 z-40 w-44 p-2 mt-4 space-y-2 text-gray-600 bg-white border border-gray-100 rounded-md shadow-md"
                                            aria-label="submenu">

                                            @if ($conta->AGENTE_TIPO == 'B')
                                                <li class="flex">
                                                    <a href="http://54.94.202.117/api/util/v1/1/boleto/{{ $conta->COD_SEQ }}"
                                                        target=”_blank”
                                                        class="inline-flex items-center w-full px-2 py-1 text-xs font-semibold uppercase transition-colors duration-150 rounded-md hover:bg-green-200 hover:text-gray-800">
                                                        <svg class="size-5 mr-2" xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 24 24" fill="currentColor">
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

                                <div class="space-y-1 w-full text-xs" x-on:click="menu = !menu;"
                                    @keydown.escape="menu = false" @click.away="menu = false;">
                                    <div class="flex justify-between items-center mb-2">
                                        <span class="font-bold text-xs">#{{ $conta->N_DOCUMENTO }}</span>

                                        <div class="text-xs uppercase ">
                                            Venci.:{{ formataData($conta->DT_VENCIMENTO) }}
                                        </div>
                                    </div>

                                    <div class="font-bold text-xs uppercase">
                                        {{ convert($conta->HISTORICO) }}
                                    </div>

                                    <div class="flex justify-between items-center flex-wrap font-semibold">
                                        <div class="text-xs">
                                            <span
                                                class="text-xs ">R$</span>{{ number_format($conta->VL_DOCUMENTO, 2, ',', ' ') }}
                                        </div>

                                        <button
                                            class="p-2 rounded-full text-xs uppercase {{ $conta->SALDO_DEVEDOR == 0 ? 'text-blue-500 bg-blue-200' : 'text-orange-500 bg-orange-200' }}">
                                            {{ $conta->SALDO_DEVEDOR == 0 ? 'Pago' : 'A Pagar' }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--./CARD -->
                    @empty
                        <div class="flex justify-center">
                            <button
                                class="text-sm uppercase font-semibold bg-orange-100 text-orange-500 rounded-full p-2">
                                Nenhuma Conta Pendente
                            </button>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    @livewire('ticket.ticket-detalhe')
</div>
