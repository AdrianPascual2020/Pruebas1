<!DOCTYPE html>
<html lang="es">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta charset="UTF-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('titlePage', trans('common.home'))</title>
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
        @stack('extraStyles')
    </head>
    <body>
        <div class="container lg:container mx-auto">
            @yield('content')
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/d5d6126c34.js" crossorigin="anonymous"></script>
        <script type="text/javascript" src="{{ mix('js/app.js') }}"></script>
        @stack('extraScripts')
    </body>
</html>
