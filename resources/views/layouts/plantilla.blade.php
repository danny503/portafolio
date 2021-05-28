<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Portafolio Daniel Ayala</title>
    <link rel="shortcut icon" href="portafolio/img/alexcgdesign.png" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('portafolio/assets/css/main.css') }}">

    @livewireStyles
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>

<body class="is-preload">
    <header id="header">
        @include('public.ui.nav')
    </header>

    <main id="main">
        @yield('content')

        @livewire('contact-form')

    </main>

    @include('public.ui.footer')

    @livewireScripts

    <script>
        Livewire.on('alert',  function(message){
            Swal.fire(
            'Solicitud exitosa!',
             message,
            'success'
            )
        })
    </script>
    <!-- Scripts -->
    <script src="{{asset('portafolio/assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('portafolio/assets/js/jquery.scrolly.min.js')}}"></script>
    <script src="{{asset('portafolio/assets/js/jquery.scrollex.min.js')}}"></script>
    <script src="{{asset('portafolio/assets/js/browser.min.js')}}"></script>
    <script src="{{asset('portafolio/assets/js/breakpoints.min.js')}}"></script>
    <script src="{{asset('portafolio/assets/js/util.js')}}"></script>
    <script src="{{asset('portafolio/assets/js/main.js')}}"></script>
 </body>
</html>
