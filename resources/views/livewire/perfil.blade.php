<div>
    @section('titulo', 'Seu cadastro')

    <div class="relative grid gap-4 md:grid-cols-5">
        <div class="col-span-4 space-y-7">
            <!-- CADASTRO -->
            <div id="informacao-cadastro" class="w-full">
                <div class="h-auto px-5 py-5 bg-white rounded-xl shadow-md">
                    <h1 class="text-sm tracking-widest font-semibold uppercase text-gray-400">
                        Informações
                    </h1>
                    <div class="border border-gray-300 mt-2 mb-6"></div>

                    <div class="space-y-6">
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

                            <div class="w-72">
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
                    </div>
                </div>
            </div>
            <!-- /CADASTRO -->

            <!-- CONTATO -->
            <div id="informacao-cadastro" class="w-full">
                <div class="h-auto px-5 py-5 bg-white rounded-xl shadow-md">
                    <h1 class="text-sm tracking-widest font-semibold uppercase text-gray-400">
                        Informações Para Contato
                    </h1>
                    <div class="border border-gray-300 mt-2 mb-6"></div>

                    <div class="space-y-6">
                        <div class="w-full flex flex-col flex-wrap sm:flex-row gap-4">
                            <div class="">
                                <x-form.label value="Telefone" />
                                <div class=" w-44">
                                    <x-form.input id="telefone" wire:model="form.telefone"
                                        x-mask:dynamic="
                                        $input.startsWith('18') ? '(99) 9 9999-9999' : '(99) 9 9999-9999'"
                                        disabled />
                                </div>
                            </div>

                            <div class="">
                                <x-form.label value="Contato" />
                                <div class=" w-44">
                                    <x-form.input id="contato" wire:model="form.contato" disabled />
                                </div>
                            </div>

                            <div class="">
                                <x-form.label value="Email" />
                                <div class="w-80">
                                    <x-form.input id="email" wire:model="form.email" disabled />
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- /CONTATO -->

            <!-- LIMITES -->
            <div id="informacao-cadastro" class="w-full">
                <div class="h-auto px-5 py-5 bg-white rounded-xl shadow-md">
                    <h1 class="text-sm tracking-widest font-semibold uppercase text-gray-400">
                        Limites
                    </h1>
                    <div class="border border-gray-300 mt-2 mb-6"></div>

                    <div class="space-y-6">
                        <div class="w-full flex flex-col flex-wrap gap-4">
                            <div class="flex gap-4">
                                <div class="">
                                    <x-form.label value="Data Vencimento" />
                                    <div class=" w-36">
                                        <x-form.input id="vencimento" wire:model="form.dtVencimento" type="date"
                                            disabled />
                                    </div>
                                </div>

                                {{-- <div class="">
                                    <x-form.label value="Data Limite" />
                                    <div class=" w-36">
                                        <x-form.input id="limite" wire:model="form.dtLimite" type="date"
                                            disabled />
                                    </div>
                                </div> --}}

                                <div class="">
                                    <x-form.label value="N° Terminais" />
                                    <div class="w-16">
                                        <x-form.input id="terminais" wire:model="form.terminais" disabled />
                                    </div>
                                </div>

                                <div class="">
                                    <x-form.label value="Versão Rcfin" />
                                    <div class="w-26">
                                        <x-form.input id="versaoRcfin" wire:model="form.versaoRcfin" disabled />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /LIMITES -->

            <!-- PROCESSOS MOBILE -->
            <div class="w-full block md:hidden">
                <div class="h-auto px-5 py-5 bg-white rounded-xl shadow-md">
                    <h1 class="text-sm tracking-widest font-semibold uppercase text-gray-400">
                        Ações
                    </h1>
                    <div class="border border-gray-300 mt-2 mb-6"></div>

                    <div class="flex items-center gap-3">
                        {{-- <x-buttons.primary class="uppercase tracking-widest" color="blue" text="Salvar" light
                            loading wire:click="update()">
                            Salvar
                        </x-buttons.primary> --}}
                    </div>

                </div>
            </div>
            <!-- /PROCESSOS MOBILE -->

        </div>

        <div class="w-full">
            <div class="sticky top-0 space-y-7 hidden sm:block">

                {{-- <x-title-page title="Pessoa" nome="{{ $form->nome }}" codigo="{{ $form->codigo }}"></x-title-page> --}}

                <!-- NESTA PAGINA -->
                <div class="text-sm font-semibold bg-white rounded-xl w-full px-5 py-5 shadow-md">
                    <h1 class="text-sm tracking-widest font-semibold uppercase text-gray-400 mb-2">Nesta Página</h1>
                    <div class="border border-gray-300 mt-2 mb-2"></div>

                    <ol class="font-semibold tracking-widest uppercase text-gray-600 space-y-3 dark:text-gray-600">
                        <li>
                            <a href="#informacao-cadastro"
                                class="text-gray-400 hover:text-blue-500 hover:underline underline-offset-4 decoration-2">Informações</a>
                        </li>
                    </ol>
                </div>
                <!-- NESTA PAGINA -->

                <!-- PROCESSOS -->
                <div class="h-auto px-5 py-5 bg-white rounded-xl shadow-md">
                    <h1 class="text-sm tracking-widest font-semibold uppercase text-gray-400">
                        Ações
                    </h1>
                    <div class="border border-gray-300 mt-2 mb-6"></div>

                    <div class="flex items-center gap-3">
                        {{-- <x-buttons.primary class="uppercase tracking-widest" color="blue" text="Salvar" light loading
                            wire:click="update()">
                            Salvar
                        </x-buttons.primary> --}}
                    </div>

                </div>
                <!-- /PROCESSOS -->
            </div>

        </div>
    </div>
</div>
