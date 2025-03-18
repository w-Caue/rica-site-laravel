<div>
    <div class="flex flex-col gap-6">
        <x-auth-header title="Crie sua conta" description="Digite suas informações abaixo para enviar o seu cadastro." />

        <form class="flex flex-col gap-6">
            <div>
                @if ($checkCnpj)
                    <div>
                        <x-form.label value="CPF" />
                        <x-form.input wire:model="cnpj" placeholder="000.000.000-00"
                            x-mask:dynamic=" $input.startsWith('18') ? '999.999.999-99' : '999.999.999-99' " wire:keydown.tab='validaCPF()' wire:keydown.enter='validaCPF()' />
                    </div>
                @else
                    <div>
                        <x-form.label value="Cnpj" />
                        <x-form.input wire:model="cnpj" placeholder="00.000.000/0000-00"
                            x-mask:dynamic=" $input.startsWith('18') ? '99.999.999/9999-99' : '99.999.999/9999-99' " wire:keydown.tab='validaCNPJ()' wire:keydown.enter='validaCNPJ()' />
                    </div>
                @endif

                <div class="flex items-center gap-2 mt-1">
                    <x-form.checkbox wire:model.live="checkCnpj" wire:click="delInput()"/>
                    <x-form.label value="Não tenho CNPJ" />
                </div>

            </div>

            <!-- Name -->
            <div class="relative">
                <x-form.label value="Nome" />
                <x-form.input wire:model="nome" type="text" placeholder="Insira seu nome" />
            </div>

            <div class="relative">
                <x-form.label value="Email" />
                <x-form.input wire:model.live="email" placeholder="Exemplo@gmail.com" />
            </div>

            <div class="flex justify-center">
                @if ($button)
                    <a href="https://api.whatsapp.com/send?phone=558597683479&text=*NOVO+CLIENTE*+🤩%0D%0D👤+Nome+do+Cliente:+{{ strtoupper($nome) }}%0D%0D🏙+CNPJ/CPF:+{{ $cnpj }}%0D%0D✉+E-mail:+{{ $email }}"
                        target="_blank"
                        class="text-sm uppercase flex items-center font-semibold justify-center gap-1 text-gray-600 bg-blue-200 rounded-md p-2 transition-all hover:scale-95 focus:outline-blue-600">
                        Enviar
                    </a>
                @endif

            </div>
        </form>

        <div class="space-x-1 text-center text-sm text-zinc-400">
            Já é cliente Rica?
            <a href="{{ route('login') }}" class="hover:text-gray-500 hover:underline">Ir para login</a>
        </div>
    </div>
</div>
