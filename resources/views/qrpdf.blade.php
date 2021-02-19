<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">


    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">


    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous"></script>
</head>

<body class="font-sans antialiased">

    <style type="text/css">
        .punteado {
            border-style: dashed dotted;
            margin: 0 auto;
            text-align: center;
            width: 150px;
            padding: 30px;
        }
        .texto {
            margin: 0 auto;
            text-align: center;
            width: 150px;
            padding: 30px;
            margin-button: 30px;
            display: inline-block;
        }
    
    </style>
    {{-- <div class="logo">
        <img src="http://127.0.0.1:8000/public/image/logoPG.png" width="120" height="72" alt="">
    </div> --}}
    <div class="texto"  width="80%" align="center">
    
        Nombre: {{ $Nombre }}
        Cedula o Rif: {{ $Documento }}
        
    </div>
    <div class="punteado" width="80%" align="center">
        <img src="data:image/svg+xml;base64,{{ base64_encode($qr) }}">
    </div>


    @stack('modals')

    @livewireScripts

    @stack('scripts')

</body>

</html>
