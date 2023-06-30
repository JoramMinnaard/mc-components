<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{$pageTitle}} {{config('app.name', 'Millennium Computers')}}</title>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
        <link rel="icon" type="image/png" href="{{ asset('imgs/millennium-logo.png') }}">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="text-neutral-700 bg-neutral-900 font-nunito">
        <a href="#main-content" class="absolute px-3 py-2 text-white duration-150 -translate-y-full rounded-b focus:-translate-y-0 bg-mc-blue-500 left-2">Skip to main content</a>
        <x-navigation.menu />
        <main id="main-content" class="pt-4 pb-12 bg-neutral-200">
            <div class="container max-w-screen-xl">
                {{ $slot }}
            </div>
        </main>
    </body>
</html>