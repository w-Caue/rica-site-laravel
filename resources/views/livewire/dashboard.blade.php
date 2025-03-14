<div>
    @section('titulo', 'Início')

    <div>
        <!-- Cards -->
        <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4" wfd-id="87">

            <!-- Card -->
            <a title="Total de clientes que você tem acesso">
                <x-card.icon-card title="ticket's" subtitle="Visualize seus ticket's">
                    <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full">
                        <x-icons.ticket class="size-6" />
                    </div>
                </x-card.icon-card>
            </a>

            <a title="Total de clientes que você tem acesso">
                <x-card.icon-card title="Financeiro" subtitle="Verifique aqui">
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
            <!-- CADASTRO -->
            <div id="informacao-cadastro" class="w-full">
                <div class="h-auto px-5 py-5 bg-white rounded-xl shadow-md">
                    <h1 class="text-sm tracking-widest font-semibold uppercase text-gray-400">
                        Último ticket criado
                    </h1>
                    <div class="border border-gray-300 mt-2 mb-6"></div>

                    {{-- <div class="space-y-6">
                        <div class="w-full flex flex-col flex-wrap sm:flex-row gap-4">
                            <div class="">
                                <x-form.label value="Cód" />
                                <div class="w-22">
                                    <x-form.input id="codigo" wire:model="form.codrcfin" disabled />
                                </div>

                                @error('codrcfin')
                                    <span class="font-semibold text-red-600 error">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class=" w-56">
                                <x-form.label value="Cnpj" />
                                <x-form.input wire:model="form.cnpj" placeholder="00.000.000/0000-00"
                                    x-mask:dynamic="
                                $input.startsWith('18') ? '99.999.999/9999-99' : '99.999.999/9999-99'"
                                    disabled />

                                @error('cnpj')
                                    <span class="font-semibold text-red-600 error">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="w-full">
                                <x-form.label value="Razão Social" />
                                <x-form.input id="razao" wire:model="form.razao" disabled />

                                @error('razao')
                                    <span class="font-semibold text-red-600 error">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="w-full">
                                <x-form.label value="Fantasia" />
                                <x-form.input id="fantasia" wire:model="form.fantasia" disabled />

                                @error('fantasia')
                                    <span class="font-semibold text-red-600 error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
            <!-- /CADASTRO -->

        </div>

        <div class="w-full">
           
        </div>
    </div>
</div>
