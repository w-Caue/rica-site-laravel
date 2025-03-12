<div>
    <div class="flex flex-col gap-6">
        <x-auth-header title="Entre na sua conta" description="Digite seu cnpj e senha abaixo para efetuar login" />

        <form wire:submit="login" class="flex flex-col gap-6">
            <!-- Cnpj -->
            <div>
                <x-form.label value="Cnpj" />
                <x-form.input placeholder="00.000.000/0000-00"
                    x-mask:dynamic="
                $input.startsWith('18') ? '99.999.999/9999-99' : '99.999.999/9999-99'" />
            </div>

            <!-- Password -->
            <div class="relative">
                <x-form.label value="Senha" />
                <x-form.input type="password" placeholder="********" />
            </div>

            <div class="flex justify-center">
                {{-- <x-form.button" label="Entrar"/> --}}

                <button
                    class="flex items-center font-semibold justify-center gap-1 text-blue-400 bg-blue-200 rounded-xl p-2 transition-all hover:scale-95 focus:outline-blue-600">
                    Entrar
                </button>
            </div>
        </form>

        <div class="space-x-1 text-center text-sm text-zinc-600 dark:text-zinc-400">
            Não é cliente Rica?
            {{-- <flux:link href="{{ route('register') }}" wire:navigate>Inscreva-se</flux:link> --}}
            <a href="" wire:navigate class="hover:text-gray-500 hover:underline">Inscreva-se</a>
        </div>
    </div>
</div>
