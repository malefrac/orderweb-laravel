<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('tittle')</title>
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>
<body>
    <div id="container">
        @include('templates2/banner')
    </div>

    <div>
        <aside>
            @include('templates2/menu')
        </aside>

        <section>
            <!-- aquí se insertan las páginas que heredan de este template 
                (el contenido que va a cambiar)-->
            @yield('content')
        </section>
        <br>
        @include('templates2/footer')
    </div>

    <script src="{{ asset('js/test.js') }}"></script>
    @yield('scripts')
</body>
</html>
