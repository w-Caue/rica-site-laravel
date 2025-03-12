<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Rica Informática</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <link rel="icon" href="{{ asset('img/logo.jpeg') }}">

    <style>
        * {
            font-family: "Poppins", serif;
            letter-spacing: 3px;
        }
    </style>

    @livewireStyles

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-white antialiased dark:bg-linear-to-b">
    <div
        class="relative grid h-dvh flex-col items-center justify-center px-8 sm:px-0 lg:max-w-none lg:grid-cols-2 lg:px-0">
        <div
            class="bg-muted relative hidden h-full flex-col p-10 text-white lg:flex dark:border-r dark:border-neutral-800">
            <div class="absolute inset-0 bg-neutral-900"></div>
            <a href="" class="relative z-20 flex items-center text-lg font-medium" wire:navigate>
                <span class="flex h-10 w-10 items-center justify-center rounded-md">
                    <img class="mr-2 h-7 fill-current text-white" src="{{ asset('img/logorica.png') }}"
                        alt="logo rica informática">
                </span>
                Rica Informática
            </a>

            {{-- @php
                [$message, $author] = str(Illuminate\Foundation\Inspiring::quotes()->random())->explode('-');
            @endphp

            <div class="relative z-20 mt-auto">
                <blockquote class="space-y-2">
                    <p class="text-lg">&ldquo;{{ trim($message) }}&rdquo;</p>
                    <footer class="text-sm">{{ trim($author) }}</footer>
                </blockquote>
            </div> --}}
        </div>
        <div class="w-full lg:p-8">
            <div class="mx-auto flex w-full flex-col justify-center space-y-6 sm:w-[350px]">
                <a href="" class="z-20 flex flex-col items-center gap-2 font-medium lg:hidden" wire:navigate>
                    <span class="flex h-9 w-9 items-center justify-center rounded-md">
                        {{-- <x-app-logo-icon class="size-9 fill-current text-black dark:text-white" /> --}}
                    </span>

                    {{-- <span class="sr-only">{{ config('app.name', 'Laravel') }}</span> --}}
                </a>
                {{ $slot }}
            </div>
        </div>
    </div>
    
    @livewireScripts
</body>

</html>
