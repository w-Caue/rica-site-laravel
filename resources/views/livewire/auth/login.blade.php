<div>
    <div class="flex flex-col gap-6">
        <x-auth-header title="Entre na sua conta" description="Digite seu cnpj e senha abaixo para efetuar login" />

        <!-- Session Status -->
        {{-- <x-auth-session-status class="text-center" :status="session('status')" /> --}}

        <form wire:submit="login" class="flex flex-col gap-6">
            <!-- Cnpj -->
            {{-- <flux:input wire:model="cnpj" label="{{ __('Cnpj') }}" name="cnpj" required autofocus autocomplete="cnpj"
                placeholder="12.3456.678/0009-10"
                x-mask:dynamic="
                $input.startsWith('18') ? '99.999.999/9999-99' : '99.999.999/9999-99'
            " /> --}}

            {{-- <x-input label="Cnpj" class="border-2 border-gray-300 pl-2" placeholder="00.000.000/0000-00"
                x-mask:dynamic="
                $input.startsWith('18') ? '99.999.999/9999-99' : '99.999.999/9999-99'" /> --}}

            <!-- Password -->
            <div class="relative">
                {{-- <x-password label="Password" hint="Insert your best password" value="TallStackUi" /> --}}
            </div>

            <!-- Remember Me -->
            {{-- <flux:checkbox wire:model="remember" label="{{ __('Lembre-me') }}" /> --}}

            <div class="flex items-center justify-end">
                {{-- <flux:button variant="primary" type="submit" class="w-full">{{ __('Entrar') }}</flux:button> --}}
            </div>
        </form>

        <div class="space-x-1 text-center text-sm text-zinc-600 dark:text-zinc-400">
            Não tem uma conta?
            {{-- <flux:link href="{{ route('register') }}" wire:navigate>Inscreva-se</flux:link> --}}
        </div>
    </div>
</div>
