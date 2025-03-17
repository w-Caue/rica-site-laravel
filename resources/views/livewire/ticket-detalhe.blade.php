<div>
    <!-- Loading -->
    @include('includes.loading')
    <!-- ./Loading -->

    <x-modal.modal-main name="clientes" title="Detalhe do" subtitle="Ticket">
        @slot('body')
            <div class="text-sm uppercase font-semibold">
                @if ($ticket)
                    <div class="bg-gray-100 rounded-md p-3 space-y-2">
                        <div class="flex justify-between items-center">
                            <div class="flex items-center">
                                <x-form.label value="Ticket:" />
                                <h1>{{ $ticket->ID }}</h1>
                            </div>

                            <div class="flex items-center">
                                <x-form.label value="DT. Criação:" />
                                <h1>{{ formataData($ticket->DATA_CRIACAO) }}</h1>
                            </div>
                        </div>

                        <div class="flex justify-between items-center">
                            <div class="flex items-center">
                                <x-form.label value="Criador:" />
                                <h1>{{ convert($ticket->CLIENTE_USUARIO) }}</h1>
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

                        <div>
                            <x-form.label value="Assunto:" />
                            <div class="bg-white rounded-md p-2">{{ convert($ticket->ASSUNTO) }}</div>
                        </div>
                    </div>

                    {{-- MENSAGENS --}}
                    <div class="p-3 h-96 overflow-y-auto">
                        @foreach ($ticket->mensagens() as $mensagem)
                            <div class="my-2">
                                @if ($mensagem->REMETENTE == 'C')
                                    <li class="flex justify-end">
                                        <div class="relative max-w-xl px-4 py-2 bg-orange-200 rounded shadow">
                                            <!-- Anexo -->
                                            @if ($mensagem->ANEXO_ID != null && $mensagem->anexo() != null)
                                                <span class="block">
                                                    <div class="flex justify-end h-32 md:h-auto md:w-1/2">
                                                        <img aria-hidden="true" class="object-cover h-full md:p-2"
                                                            src="data:image/jpeg;base64,{{ base64_encode($mensagem->anexo()->ANEXO) }}" />
                                                    </div>
                                                </span>
                                            @endif
                                            <!-- Anexo -->

                                            <span class="block text-orange-500">
                                                {{ convert($mensagem->MENSAGEM) }}
                                            </span>

                                            <div class="flex flex-row justify-between text-xs">
                                                <span class="block font-semibold">
                                                    {{ convert($ticket->CLIENTE_USUARIO ?? '') }}
                                                </span>
                                                <div class="flex ml-2 text-xs">
                                                    {{ formataData($mensagem->DATA_CRIACAO) }}
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-1"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endif
                                @if ($mensagem->REMETENTE == 'S')
                                    <li class="flex justify-start">
                                        <div class="relative max-w-xl px-4 py-2 bg-blue-200 rounded shadow">
                                            <!-- Anexo -->
                                            @if ($mensagem->ANEXO_ID != null && $mensagem->anexo() != null)
                                                <span class="block">
                                                    <h1>#{{ $mensagem->anexo()->ID }}</h1>

                                                    <div class="flex justify-center h-32 md:h-auto md:w-1/2">
                                                        <img aria-hidden="true"
                                                            class="object-cover h-full md:p-2 dark:hidden"
                                                            src="data:image/jpeg;base64,{{ base64_encode($mensagem->anexo()->ANEXO) }}" />
                                                    </div>

                                                    <a download="{{ convert($mensagem->anexo()->DESCRICAO) }}"
                                                        class="text-blue-500"
                                                        href="data:image/jpeg;base64,{{ base64_encode($mensagem->anexo()->ANEXO) }}">
                                                        <div class="flex flex-row">
                                                            {{ convert($mensagem->anexo()->DESCRICAO) }}
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                                class="w-4 h-4">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                                                            </svg>
                                                        </div>
                                                    </a>
                                                </span>
                                            @endif
                                            <!-- Anexo -->

                                            <span class="block text-blue-500">
                                                {{ convert($mensagem->MENSAGEM) }}
                                            </span>

                                            <div class="flex flex-row justify-between text-xs">
                                                <span class="block font-semibold">
                                                    {{ $mensagem->operador()->NOME ?? '' }}
                                                </span>
                                                <div class="flex ml-2 text-xs">
                                                    {{ formataData($mensagem->DATA_CRIACAO) }}
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-1"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                    </svg>
                                                </div>
                                            </div>

                                        </div>
                                    </li>
                                @endif
                            </div>
                        @endforeach
                    </div>
                    {{-- /MENSAGENS --}}

                    <div class="bg-gray-100 rounded-md p-3 space-y-2">
                        {{-- @if ($ticket->STATUS != 'C')
                            <div class="relative flex items-center justify-between w-full p-3">
                                <button class="p-2 text-orange-500 hover:scale-95 transition-all cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-paperclip">
                                        <path d="M13.234 20.252 21 12.3" />
                                        <path
                                            d="m16 6-8.414 8.586a2 2 0 0 0 0 2.828 2 2 0 0 0 2.828 0l8.414-8.586a4 4 0 0 0 0-5.656 4 4 0 0 0-5.656 0l-8.415 8.585a6 6 0 1 0 8.486 8.486" />
                                    </svg>
                                </button>

                                <x-form.input wire:model.defer="novaMensagem" id="mensagem" placeholder="Inserir mensagem"
                                    class="w-full" class="bg-white" />

                                <button type="submit"
                                    class="p-2 text-blue-500 hover:scale-95 transition-all cursor-pointer"
                                    wire:click="salvarMensagem">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="size-6 ">
                                        <path
                                            d="M3.478 2.404a.75.75 0 0 0-.926.941l2.432 7.905H13.5a.75.75 0 0 1 0 1.5H4.984l-2.432 7.905a.75.75 0 0 0 .926.94 60.519 60.519 0 0 0 18.445-8.986.75.75 0 0 0 0-1.218A60.517 60.517 0 0 0 3.478 2.404Z" />
                                    </svg>

                                </button>
                            </div>
                        @endif --}}
                    </div>
                @endif
            </div>
        @endslot
    </x-modal.modal-main>
</div>
