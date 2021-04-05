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
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>

<body >

    <style type="text/css">
        .punteado {
            border-style: dashed dotted;
            margin: 0 auto;
            text-align: center;
            width: 200px;
            padding: 20px;
        }
        .texto {
            margin: 0 auto;
            text-align: center;
            width: 200px;
            padding: 10px;
            margin-top: 15px;
            display: inline-block;
        }
        .documento {
            margin: 0 auto;
            text-align: center;
            width: 200px;
            padding: 10px;
            margin-button: 15px;
            display: inline-block;
        }
        .imagen{
            margin-bottom: 15px;
            max-width: 30%;
        }
    
    </style>
    <div class="logo" align="center">
        <img class="imagen" src="../public/image/logoPG.png">
    </div>
    <div class="punteado" width="80%" align="center">
        <img src="data:image/svg+xml;base64,{{ base64_encode($qr) }}">
    </div>
    <div class="texto"  width="100%" align="center">
        {{ $nombre }} , {{ $rif }}
    </div>
    <div width="100%" align="center">
        Web: http://pg2015.com.ve/
    </div>

</body>

</html>
