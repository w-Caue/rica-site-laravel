<div>
    <div class="flex flex-col gap-6">
        <x-auth-header title="Crie sua conta" description="Digite suas informações abaixo para criar o seu cadastro." />

        <!-- Session Status -->
        {{-- <x-auth-session-status class="text-center" :status="session('status')" /> --}}

        <form wire:submit="register" class="flex flex-col gap-6">
            <div>
                <x-form.label value="Cnpj" />
                <x-form.input wire:model="cnpj" placeholder="00.000.000/0000-00"
                    x-mask:dynamic=" $input.startsWith('18') ? '99.999.999/9999-99' : '99.999.999/9999-99' " />
            </div>

            <!-- Name -->
            <div class="relative">
                <x-form.label value="Nome" />
                <x-form.input wire:model="nome" type="text" placeholder="Insira seu nome" />
                {{-- <x-password label="Password" hint="Insert your best password" value="TallStackUi" /> --}}
            </div>

            <div class="relative">
                <x-form.label value="Email" />
                <x-form.input wire:model="email" placeholder="Exemplo@gmail.com" />
                {{-- <x-password label="Password" hint="Insert your best password" value="TallStackUi" /> --}}
            </div>

            <!-- Remember Me -->
            {{-- <flux:checkbox wire:model="remember" label="{{ __('Lembre-me') }}" /> --}}


            <div class="flex justify-center">
                {{-- <x-form.button" label="Entrar"/> --}}

                <button wire:click="getRegister()"
                    class="text-sm uppercase flex items-center font-semibold justify-center gap-1 text-gray-600 bg-blue-200 rounded-md p-2 transition-all hover:scale-95 focus:outline-blue-600">
                    Enviar
                </button>
            </div>
        </form>

        <div class="space-x-1 text-center text-sm text-zinc-600 dark:text-zinc-400">
            Já é cliente Rica?
            <a href="{{ route('login') }}" class="hover:text-gray-500 hover:underline">Ir para login</a>
        </div>
    </div>
</div>
