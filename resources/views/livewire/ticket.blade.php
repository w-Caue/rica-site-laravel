<div>
    @section('titulo', 'Tickets')

    <div id="informacao-cadastro" class="w-full">
        <div class="h-auto px-5 py-5 bg-white rounded-xl shadow-md">
            <h1 class="text-sm tracking-widest font-semibold uppercase text-gray-400">
                ticket's
            </h1>
            <div class="border border-gray-300 mt-2 mb-6"></div>


            <div class="relative flex md:justify-between flex-wrap items-center gap-4 mx-5 py-3">
                <div class="sm:w-80 w-full">
                    <label>
                        <div class="flex items-end gap-1">
                            <div class="w-full">
                                <span class="text-sm uppercase font-bold tracking-widest text-gray-500 ">
                                    Pesquisando por
                                </span>
                                <x-form.input class="uppercase tracking-widest text-sm" placeholder="Pesquise por"
                                    wire:model.blur="search" wire:keydown.enter='dados()' />
                            </div>

                            {{-- <x-buttons.primary color="blue" light wire:click="dados()">
                                <x-icons.search class="size-5" />
                            </x-buttons.primary> --}}
                        </div>
                    </label>
                </div>

                <div class="relative flex justify-center items-center gap-5">
                    <div>
                        <x-form.label value="Status" />

                        <x-form.select wire:model="status">
                            <option value="">Selecione</A></option>
                            <option value="">Aberto</option>
                            <option value="">Pendente</option>
                            <option value="">Em Densenvolvimento</option>
                            <option value="">Concluido</option>
                        </x-form.select>
                    </div>
                </div>

            </div>

            <div class="border my-4 mx-32 border-gray-200"></div>

            <div class="w-full overflow-hidden hidden md:block">
                <div class="w-full overflow-x-auto border rounded-xl border-gray-200">
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
                                                class="text-xs font-medium leading-4 tracking-wider uppercase">Código</button>
                                            @include('includes.icon-filter', [
                                                'field' => 'ID',
                                            ])
                                        </div>

                                        <div x-cloak x-show="tooltip === 'ticket'" x-transition
                                            x-transition.duration.300ms
                                            class="absolute z-10 p-2 mt-6 text-xs text-blue-500 font-bold bg-gray-100 rounded-xl">
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
                                            class="absolute z-10 p-2 mt-6 text-xs text-blue-500 font-bold bg-gray-100 rounded-xl">
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
                                            class="absolute z-10 p-2 mt-6 text-xs text-blue-500 font-bold bg-gray-100 rounded-xl">
                                            <p>Ordenar pela a Criador</p>
                                        </div>
                                    </div>
                                </th>

                                <th class="px-4 py-3">
                                    <div class="flex justify-center">
                                        <div class="flex justify-center gap-1 items-center cursor-pointer"
                                            wire:click="sortBy('DATA_CRIACAO')" x-on:mouseover="tooltip = 'dt_criacao'"
                                            x-on:mouseleave="tooltip = 'nenhum'">
                                            @include('includes.icon-search', [
                                                'field' => 'DATA_CRIACAO',
                                            ])
                                            <button class="text-xs font-medium leading-4 tracking-wider uppercase">Dt.
                                                Criação</button>
                                            @include('includes.icon-filter', [
                                                'field' => 'DATA_CRIACAO',
                                            ])
                                        </div>

                                        <div x-cloak x-show="tooltip === 'dt_criacao'" x-transition
                                            x-transition.duration.300ms
                                            class="absolute z-10 p-2 mt-6 text-xs text-blue-500 font-bold bg-gray-100 rounded-xl">
                                            <p>Ordenar pela a Dt. Criação</p>
                                        </div>
                                    </div>
                                </th>

                                <th class="px-4 py-3">
                                    <div class="flex justify-center">
                                        <div class="flex justify-center gap-1 items-center cursor-pointer"
                                            wire:click="sortBy('CIDADE')" x-on:mouseover="tooltip = 'status'"
                                            x-on:mouseleave="tooltip = 'nenhum'">
                                            @include('includes.icon-search', [
                                                'field' => 'CIDADE',
                                            ])
                                            <button
                                                class="text-xs font-medium leading-4 tracking-wider uppercase">Status</button>
                                            @include('includes.icon-filter', [
                                                'field' => 'CIDADE',
                                            ])
                                        </div>

                                        <div x-cloak x-show="tooltip === 'cidade'" x-transition
                                            x-transition.duration.300ms
                                            class="absolute z-10 p-2 mt-6 text-xs text-blue-500 font-bold bg-gray-100 rounded-xl">
                                            <p>Ordenar pelo Status</p>
                                        </div>
                                    </div>
                                </th>
                            </tr>
                        </thead>

                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($tickets as $cliente)
                                <tr wire:key="{{ $cliente->ID }}" class="font-semibold text-sm ">
                                    <td class="py-3 text-center ">
                                        {{ $cliente->ID }}
                                    </td>

                                    <td class="py-3 flex justify-center items-center">
                                        {{ $cliente->ASSUNTO }}
                                    </td>

                                    <td class="py-3 text-center">
                                        {{ $cliente->CLIENTE_USUARIO }}
                                    </td>

                                    <td class="py-3 text-xs tracking-wider text-center">
                                        {{ $cliente->DATA_CRIACAO }}
                                    </td>

                                    <td class="py-3 text-center">
                                        {{-- {{ $cliente->BAIRRO }} --}}
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
                    <div
                        class="p-1 text-left border-2 rounded-md hover:text-blue-800 dark:hover:text-blue-500 dark:border-gray-700">
                        <div class="flex items-center cursor-pointer" wire:click="sortBy('CODIGO')">
                            <button class="text-xs font-medium leading-4 tracking-wider uppercase">Código</button>
                            @include('includes.icon-filter', [
                                'field' => 'CODIGO',
                            ])
                        </div>
                    </div>

                    <div
                        class="p-1 text-left border-2 rounded-md hover:text-blue-800 dark:hover:text-blue-500 dark:border-gray-700">
                        <div class="flex items-center cursor-pointer" wire:click="sortBy('NOME')">
                            <button class="text-xs font-medium leading-4 tracking-wider uppercase">Nome</button>
                            @include('includes.icon-filter', ['field' => 'CLIENTES.NOME'])
                        </div>
                    </div>

                    <div
                        class="p-1 text-left border-2 rounded-md hover:text-blue-800 dark:hover:text-blue-500 dark:border-gray-700">
                        <div class="flex items-center cursor-pointer" wire:click="sortBy('FANTASIA')">
                            <button class="text-xs font-medium leading-4 tracking-wider uppercase">Fantasia</button>
                            @include('includes.icon-filter', [
                                'field' => 'CLIENTES.FANTASIA',
                            ])
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Ordenação -->

            <!-- CARD -->
            <div class="flex flex-col gap-4 mt-4 p-3 md:hidden">
                {{-- @foreach ($clientes as $cliente)
                <div wire:key="{{ $cliente->CODIGO }}"
                class="p-2 space-y-0 rounded-xl border-2 transition-all hover:scale-95 dark:text-gray-400 dark:border-gray-700">

                <div class="space-y-1 w-full text-xs">
                    <div class="flex justify-between items-center">
                        <span
                            class="font-bold text-blue-500 text-[15px]">#{{ $cliente->CODIGO }}</span>

                        <h1 class="font-bold text-xs uppercase tracking-widest dark:text-gray-400">
                            {{ convert($cliente->FANTASIA) }}
                        </h1>

                        <div x-data="{ menu: false, tooltip: 'nenhum' }"
                            class="relative py-1 text-center flex justify-center">
                            <div class="flex items-center space-x-2">

                                <button x-on:click="menu = !menu;" @keydown.escape="menu = false"
                                    @click.away="menu = false;"
                                    class="flex items-center justify-between px-2 py-2 font-medium leading-5 text-blue-600 rounded-full hover:bg-gray-200 hover:scale-95 dark:hover:text-white
                                 dark:text-gray-400 dark:hover:bg-gray-700">
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
                                        class="absolute right-7 top-8 z-40 w-40 p-2 mt-4 space-y-2 text-gray-600 bg-white border border-gray-100 rounded-md shadow-md dark:border-gray-700 dark:text-gray-300 dark:bg-gray-800"
                                        aria-label="submenu">

                                        <li class="flex">
                                            <a href="{{ route('tenant.pessoal.pessoas.register', ['prefix' => session()->get('prefix'), 'codigo' => $cliente->CODIGO]) }}"
                                                x-on:mouseover="tooltip = 'cadastro'"
                                                x-on:mouseleave="tooltip = 'nenhum'"
                                                class="inline-flex items-center w-full px-2 py-1 text-xs font-semibold uppercase transition-colors duration-150 rounded-md hover:bg-red-100 hover:text-gray-800 dark:hover:bg-blue-800 dark:hover:text-gray-200">
                                                <svg class="size-5 mr-2"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 24 24" fill="currentColor">
                                                    <path
                                                        d="M18.031 16.6168L22.3137 20.8995L20.8995 22.3137L16.6168 18.031C15.0769 19.263 13.124 20 11 20C6.032 20 2 15.968 2 11C2 6.032 6.032 2 11 2C15.968 2 20 6.032 20 11C20 13.124 19.263 15.0769 18.031 16.6168ZM16.0247 15.8748C17.2475 14.6146 18 12.8956 18 11C18 7.1325 14.8675 4 11 4C7.1325 4 4 7.1325 4 11C4 14.8675 7.1325 18 11 18C12.8956 18 14.6146 17.2475 15.8748 16.0247L16.0247 15.8748ZM12.1779 7.17624C11.4834 7.48982 11 8.18846 11 9C11 10.1046 11.8954 11 13 11C13.8115 11 14.5102 10.5166 14.8238 9.82212C14.9383 10.1945 15 10.59 15 11C15 13.2091 13.2091 15 11 15C8.79086 15 7 13.2091 7 11C7 8.79086 8.79086 7 11 7C11.41 7 11.8055 7.06167 12.1779 7.17624Z">
                                                    </path>
                                                </svg>

                                                <span>cadastro</span>
                                            </a>
                                        </li>

                                        <li class="flex">
                                            <button
                                                wire:click="$dispatchTo('tenant.pessoal.contatos-programados.programar-contato','setContatoCliente', { clienteCod: {{ $cliente->CODIGO }}})"
                                                x-data
                                                x-on:click="$dispatch('open-modal-medium', { name : 'users' })"
                                                class="inline-flex items-center w-full px-2 py-1 text-xs font-semibold uppercase transition-colors duration-150 rounded-md hover:bg-red-100 hover:text-gray-800 dark:hover:bg-blue-800 dark:hover:text-gray-200">
                                                <svg class="size-5 mr-2"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 24 24" fill="currentColor">
                                                    <path
                                                        d="M7 3V1H9V3H15V1H17V3H21C21.5523 3 22 3.44772 22 4V9H20V5H17V7H15V5H9V7H7V5H4V19H10V21H3C2.44772 21 2 20.5523 2 20V4C2 3.44772 2.44772 3 3 3H7ZM17 12C14.7909 12 13 13.7909 13 16C13 18.2091 14.7909 20 17 20C19.2091 20 21 18.2091 21 16C21 13.7909 19.2091 12 17 12ZM11 16C11 12.6863 13.6863 10 17 10C20.3137 10 23 12.6863 23 16C23 19.3137 20.3137 22 17 22C13.6863 22 11 19.3137 11 16ZM16 13V16.4142L18.2929 18.7071L19.7071 17.2929L18 15.5858V13H16Z">
                                                    </path>
                                                </svg>

                                                <span>Programar Contato</span>
                                            </button>

                                        </li>

                                        <li class="flex">
                                            <button
                                                wire:click="$dispatchTo('tenant.movimentacao.pedidos.criar-pedido','setClienteList', { codigo: {{ $cliente->CODIGO }}})"
                                                x-on:click="$dispatch('open-novo-pedido')"
                                                class="inline-flex items-center w-full px-2 py-1 text-xs font-semibold uppercase transition-colors duration-150 rounded-md hover:bg-red-100 hover:text-gray-800 dark:hover:bg-blue-800 dark:hover:text-gray-200">
                                                <svg class="size-5 mr-2"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 24 24" fill="currentColor">
                                                    <path
                                                        d="M7.00488 7.99966V5.99966C7.00488 3.23824 9.24346 0.999664 12.0049 0.999664C14.7663 0.999664 17.0049 3.23824 17.0049 5.99966V7.99966H20.0049C20.5572 7.99966 21.0049 8.44738 21.0049 8.99966V20.9997C21.0049 21.5519 20.5572 21.9997 20.0049 21.9997H4.00488C3.4526 21.9997 3.00488 21.5519 3.00488 20.9997V8.99966C3.00488 8.44738 3.4526 7.99966 4.00488 7.99966H7.00488ZM7.00488 9.99966H5.00488V19.9997H19.0049V9.99966H17.0049V11.9997H15.0049V9.99966H9.00488V11.9997H7.00488V9.99966ZM9.00488 7.99966H15.0049V5.99966C15.0049 4.34281 13.6617 2.99966 12.0049 2.99966C10.348 2.99966 9.00488 4.34281 9.00488 5.99966V7.99966Z">
                                                    </path>
                                                </svg>

                                                <span>Criar Pedido</span>
                                            </button>

                                        </li>
                                    </ul>
                                </template>
                            </div>
                        </div>
                    </div>

                    <div class="font-bold text-[16px] uppercase text-blue-500">
                        {{ convert($cliente->NOME) }}
                    </div>

                    <div class="flex justify-between items-center flex-wrap">
                        <div
                            class="flex flex-wrap text-xs uppercase tracking-widest dark:text-neutral-200">
                            {{ convert($cliente->ENDERECO) }}, {{ convert($cliente->BAIRRO) }} -
                            {{ convert($cliente->CIDADE) }}, {{ convert($cliente->ESTADO) }}
                        </div>

                        <div class="py-3 text-xs tracking-wider text-center">
                            @if ($cliente->SOMA_SALDO_DEVEDOR_ATRASO != null)
                                <span
                                    class="px-2 py-1 font-semibold uppercase leading-tight text-red-700 bg-red-100 rounded-full dark:bg-red-100 dark:text-red-500">
                                    Contas em Atraso
                                </span>
                            @endif

                        </div>
                    </div>

                </div>
            </div>
        @endforeach --}}
            </div>
            <!--./CARD -->
        </div>
    </div>
</div>
