<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Fitness74') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link rel="stylesheet" href="{{ ('plugins/sweetalert2/sweetalert2.min.css') }}">
        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="shortcut icon" href="{{ asset('logo.png') }}" type="image/x-icon">
        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
        <script src="{{ ('plugins/sweetalert2/sweetalert2.all.min.js')}}"></script>
        @livewireStyles
    </head>
    <body>

    <div class="min-h-screen bg-gray-700">

        @livewire('navigation-menu')


        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-transparent">
                <div class="max-w-7xl mx-auto py-5 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <x-jet-banner />

        <!-- Page Content -->
        <div class="py-1">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-gray-900  overflow-hidden shadow-xl sm:rounded-lg">
                    <main>
                        {{ $slot }}
                    </main>
                </div>
            </div>
        </div>
    </div>

    @stack('modals')

    @livewireScripts

    @if(Session::has('Error'))
    <script>
            Swal.fire({
            icon: 'error',
            title: '{{ Session::get('Error') }}',
            showConfirmButton: true,
            // timer: 2000
        });
    </script>
    @endif

    <script>
        livewire.on('exito', function(message){
            Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: message,
            showConfirmButton: false,
            timer: 2000
            })
        });

        livewire.on('error', function(message){
            Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: message,
            showConfirmButton: false,
            timer: 2000
            })
        });
    </script>
    </body>
</html>
