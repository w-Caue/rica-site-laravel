<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Rica Informática</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap"
        rel="stylesheet">

    <link rel="icon" href="{{ asset('img/logo.jpeg') }}">

    <style>
        * {
            font-family: "Nunito", sans-serif;
            /* Nunito */
            letter-spacing: 3px;
        }

        [x-cloak] {
            display: none;
        }
    </style>

    @vite('resources/css/app.css')

    @livewireStyles
</head>

<body x-data="sidebar()" class="font-sans antialiased text-gray-600 bg-gray-200">
    <div class="flex h-screen">

        @include('layouts.sidebar')

        <div class="flex flex-col flex-1 ">
            @include('layouts.navbar')
            <main class="h-full w-full pb-16 mt-4 overflow-y-auto">

                <div class="px-6 sm:mx-auto xl:mx-9">
                    {{ $slot }}
                </div>
            </main>
        </div>

    </div>

    @livewireScripts

    <script src=" {{ asset('js/main.js') }}"></script>

</body>

</html>
