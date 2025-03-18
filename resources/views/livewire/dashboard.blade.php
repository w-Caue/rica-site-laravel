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

            <a title="Total de clientes que você tem acesso">
                <x-card.icon-card title="Financeiro" subtitle="Verifique suas contas">
                    <div class="p-3 mr-4 text-purple-500 bg-purple-100 rounded-full">
                        <x-icons.tickets />
                    </div>
                </x-card.icon-card>
            </a>

        </div>
        <!--./Cards-->
    </div>

    <div class="relative grid gap-4 md:grid-cols-5">
        <div class="col-span-2 space-y-7">
            <div id="informacao-cadastro" class="w-full">
                <div class="h-auto px-5 py-5 bg-white rounded-xl shadow-md">
                    <h1 class="text-sm tracking-widest font-semibold uppercase text-gray-400">
                        Último ticket criado
                    </h1>
                    <div class="border border-gray-300 mt-2 mb-6"></div>

                    <!-- CARD -->
                    <div class="flex flex-col gap-4 mt-4 p-3">
                        <div wire:key="{{ $ticket->ID }}"
                            x-on:click="$dispatch('open-modal-main', { name : 'clientes' })"
                            wire:click="$dispatchTo('ticket-detalhe','dados', { codigo: {{ $ticket->ID }}})"
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
                                        {{ $ticket->DATA_CRIACAO }}
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
                </div>
            </div>

        </div>

        <div class="w-full">

        </div>
    </div>

    @livewire('ticket.ticket-detalhe')
</div>
