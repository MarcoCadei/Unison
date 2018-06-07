<!doctype html>
<html lang="it">
    <head>
        <!-- Meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Fonts -->
        <link href='//fonts.googleapis.com/css?family=Montserrat:thin,extra-light,light,regular,medium,bold,100,200,300,400,500,600,700,800' rel='stylesheet' type='text/css'>

        <!-- Fogli di stile -->
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="./css/bootstrap.css"> <!-- Modificato con i colori del tema Pulse -->
        <!-- Nostri CSS -->
        <link rel="stylesheet" href="./css/style.css">

        <!-- Script (1) -->
        @yield('script_header');
        <!-- FontAwesome -->
        <script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>

        <!-- Per altri script vedi in coda al body -->

        <title>Progetto Programmazione web</title>

        <!-- Token usato da Laravel per proteggere l'utente rispetto a determinati tipi di attacchi -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <body class="generalFont bg-light">
        @include('layouts.navbar')
        @yield('content')
        @include('layouts.footer')
        <!-- Script (2) -->
            <!-- Bootstrap: jQuery first, then Popper.js, then Bootstrap JS -->
            <script src="https://code.jquery.com/jquery-3.3.1.min.js"
                    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
                    crossorigin="anonymous"></script>
            {{--<script src="./js/jquery-3.3.1.min.js"></script> <!-- Lo stesso in locale -->--}}
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"
                    integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ"
                    crossorigin="anonymous"></script>
            {{--<script src="./js/popper.min.js"></script> <!-- Lo stesso in locale -->--}}
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"
                    integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm"
                    crossorigin="anonymous"></script>
            {{--<script src="./js/bootstrap.min.js"></script> <!-- Lo stesso in locale -->--}}

        <!-- Sezione per script specifici della pagina -->
        @yield('script_footer')
    </body>
</html>