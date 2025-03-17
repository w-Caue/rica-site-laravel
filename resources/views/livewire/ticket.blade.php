<div>
    @section('titulo', 'Tickets')

    <!-- Loading -->
    @include('includes.loading')
    <!-- ./Loading -->

    <div id="informacao-cadastro" class="w-full">
        <div class="h-auto px-5 py-5 bg-white rounded-xl shadow-md">
            <h1 class="text-sm tracking-widest font-semibold uppercase text-gray-400">
                ticket's
            </h1>
            <div class="border border-gray-300 mt-2 mb-6"></div>


            <div class="relative flex md:justify-between flex-wrap items-center gap-4 py-3">
                <div class="sm:w-80 w-full">
                    <label>
                        <div class="flex items-end gap-1">
                            <div class="w-full">
                                <span class="text-sm uppercase font-bold tracking-widest text-gray-500 ">
                                    Pesquisando por {{ $sortField }}
                                </span>
                                <x-form.input class="uppercase tracking-widest text-sm"
                                    placeholder="Pesquise por {{ str_replace('.', '>', $sortField) }}"
                                    wire:model.blur="search" wire:keydown.enter='dados()' />
                            </div>

                            <button
                                class=" text-gray-600 bg-blue-200 rounded-md p-2 transition-all hover:scale-95 hover:cursor-pointer focus:outline-blue-600"
                                wire:click="dados()">
                                <x-icons.search class="size-5" />
                            </button>
                        </div>
                    </label>
                </div>

                <div class="relative flex justify-center items-center gap-5">
                    <div>
                        <x-form.label value="Status" />

                        <x-form.select wire:model.live="filterStatus">
                            <option value="">Todos</option>
                            <option value="A">Aberto</option>
                            <option value="P">Pendente</option>
                            <option value="D">Em Densenvolvimento</option>
                            <option value="C">Concluido</option>
                        </x-form.select>
                    </div>
                </div>

            </div>

            <div class="w-full overflow-hidden hidden lg:block">
                <div class="w-full overflow-x-auto rounded-xl">
                    <table class="w-full rounded-xl bg-gray-100 shadow-xs">
                        <thead class="">
                            <tr x-cloak x-data="{ tooltip: 'nenhum' }"
                                class="relative text-xs font-semibold tracking-wide text-center text-gray-500 uppercase border-b border-gray-200">
                                <th class="px-4 py-3">
                                    <div class="flex justify-center">
                                        <div class="flex justify-center gap-1 items-center cursor-pointer"
                                            wire:click="sortBy('ID')" x-on:mouseover="tooltip = 'ticket'"
                                            x-on:mouseleave="tooltip = 'nenhum'">
                                            @include('includes.icon-search', [
                                                'field' => 'ID',
                                            ])
                                            <button
                                                class="text-xs font-medium leading-4 tracking-wider uppercase">ID</button>
                                            @include('includes.icon-filter', [
                                                'field' => 'ID',
                                            ])
                                        </div>

                                        <div x-cloak x-show="tooltip === 'ticket'" x-transition
                                            x-transition.duration.300ms
                                            class="absolute z-10 p-2 mt-6 text-xs text-blue-500 font-bold bg-gray-50 border border-gray-200 rounded-xl">
                                            <p>Ordenar pelo o Código</p>
                                        </div>
                                    </div>
                                </th>

                                <th class="px-4 py-3">
                                    <div class="flex justify-center">
                                        <div class="flex justify-center gap-1 items-center cursor-pointer"
                                            wire:click="sortBy('ASSUNTO')" x-on:mouseover="tooltip = 'assunto'"
                                            x-on:mouseleave="tooltip = 'nenhum'">
                                            @include('includes.icon-search', [
                                                'field' => 'ASSUNTO',
                                            ])
                                            <button
                                                class="text-xs font-medium leading-4 tracking-wider uppercase">assunto</button>
                                            @include('includes.icon-filter', [
                                                'field' => 'ASSUNTO',
                                            ])
                                        </div>

                                        <div x-cloak x-show="tooltip === 'assunto'" x-transition
                                            x-transition.duration.300ms
                                            class="absolute z-10 p-2 mt-6 text-xs text-blue-500 font-bold bg-gray-50 border border-gray-200 rounded-xl">
                                            <p>Ordenar pelo o Assunto</p>
                                        </div>
                                    </div>
                                </th>

                                <th class="px-4 py-3">
                                    <div class="flex justify-center">
                                        <div class="flex justify-center gap-1 items-center cursor-pointer"
                                            wire:click="sortBy('CLIENTE_USUARIO')" x-on:mouseover="tooltip = 'usuario'"
                                            x-on:mouseleave="tooltip = 'nenhum'">
                                            @include('includes.icon-search', [
                                                'field' => 'CLIENTE_USUARIO',
                                            ])
                                            <button
                                                class="text-xs font-medium leading-4 tracking-wider uppercase">Criador</button>
                                            @include('includes.icon-filter', [
                                                'field' => 'CLIENTE_USUARIO',
                                            ])
                                        </div>

                                        <div x-cloak x-show="tooltip === 'usuario'" x-transition
                                            x-transition.duration.300ms
                                            class="absolute z-10 p-2 mt-6 text-xs text-blue-500 font-bold bg-gray-50 border border-gray-200 rounded-xl">
                                            <p>Ordenar pelo o Criador</p>
                                        </div>
                                    </div>
                                </th>

                                <th class="px-4 py-3">
                                    <div class="flex justify-center">
                                        <div class="flex justify-center gap-1 items-center cursor-pointer">
                                            <button class="text-xs font-medium leading-4 tracking-wider uppercase">
                                                Dt. Criação
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
                            @forelse ($tickets as $ticket)
                                <tr wire:key="{{ $ticket->ID }}" x-data
                                    x-on:click="$dispatch('open-modal-main', { name : 'clientes' })"
                                    wire:click="$dispatchTo('ticket-detalhe','dados', { codigo: {{ $ticket->ID }}})"
                                    class="font-semibold text-sm hover:text-orange-500 hover:cursor-pointer hover:bg-gray-50">
                                    <td class="py-4 text-center ">
                                        #{{ $ticket->ID }}
                                    </td>

                                    <td class="py-4 flex justify-center items-center">
                                        {{ convert($ticket->ASSUNTO) }}
                                    </td>

                                    <td class="py-4 text-center">
                                        {{ convert($ticket->CLIENTE_USUARIO) }}
                                    </td>

                                    <td class="py-4 text-xs tracking-wider text-center">
                                        {{ formataData($ticket->DATA_CRIACAO) }}
                                    </td>

                                    <td class="py-4 text-center">
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

            <!-- Ordenação -->
            <div class="block md:hidden mx-4">
                <div class="flex flex-wrap gap-2 mb-2 text-xs">
                    <div class="p-1 text-left border border-gray-300 rounded-md hover:text-blue-800">
                        <div class="flex items-center gap-1 cursor-pointer" wire:click="sortBy('ID')">
                            @include('includes.icon-search', ['field' => 'ID'])
                            <button class="text-xs font-medium leading-4 tracking-wider uppercase">ID</button>
                            @include('includes.icon-filter', [
                                'field' => 'ID',
                            ])
                        </div>
                    </div>

                    <div class="p-1 text-left border border-gray-300 rounded-md hover:text-blue-800">
                        <div class="flex items-center gap-1 cursor-pointer" wire:click="sortBy('ASSUNTO')">
                            @include('includes.icon-search', ['field' => 'ASSUNTO'])
                            <button class="text-xs font-medium leading-4 tracking-wider uppercase">Assunto</button>
                            @include('includes.icon-filter', ['field' => 'ASSUNTO'])
                        </div>
                    </div>

                    <div class="p-1 text-left border border-gray-300 rounded-md hover:text-blue-800">
                        <div class="flex items-center gap-1 cursor-pointer" wire:click="sortBy('CLIENTE_USUARIO')">
                            @include('includes.icon-search', ['field' => 'CLIENTE_USUARIO'])
                            <button class="text-xs font-medium leading-4 tracking-wider uppercase">Criador</button>
                            @include('includes.icon-filter', [
                                'field' => 'CLIENTE_USUARIO',
                            ])
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Ordenação -->

            <!-- CARD -->
            <div class="flex flex-col gap-4 mt-4 p-3 lg:hidden">
                @foreach ($tickets as $ticket)
                    <div wire:key="{{ $ticket->ID }}"
                        x-on:click="$dispatch('open-modal-main', { name : 'clientes' })"
                        wire:click="$dispatchTo('ticket-detalhe','dados', { codigo: {{ $ticket->ID }}})"
                        class="p-2 space-y-0 rounded-xl border border-gray-300 transition-all hover:scale-95 hover:cursor-pointer">

                        <div class="space-y-1 w-full text-xs">
                            <div class="flex justify-between items-center">
                                <span class="font-bold text-xs">{{ $ticket->ID }}</span>

                                <h1 class="font-bold text-xs uppercase text-gray-500">
                                    {{ convert($ticket->CLIENTE_USUARIO) }}
                                </h1>
                            </div>

                            <div class="font-bold text-xs uppercase">
                                {{ convert($ticket->ASSUNTO) }}
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
                @endforeach
            </div>
            <!--./CARD -->

            <div class="border my-4 mx-32 border-gray-200"></div>

            <div class="flex justify-between gap-2 items-center mx-4 my-2 py-1">
                @include('includes.porPagina')

                {{ $tickets->onEachSide(1)->links('components.pagination', ['is_livewire' => true]) }}
            </div>
        </div>
    </div>

    @livewire('ticket-detalhe')
</div>
