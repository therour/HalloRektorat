<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <link rel="icon" href="{{ asset('logo.png') }}" type="image/png" sizes="16x16">

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <!-- <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}"> -->
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">

    <link rel="stylesheet" href="{{ asset('css/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/kirim-saran-baru.css') }}">

    @yield('css')

    <style>
    body {
        overflow-y:scroll;
    }
     .navbar-layout {
        padding-top: 13px;
        background: white;
    }

    .nav-link {
        font-family: 'Circular Std Book';
        color: black;
        margin: 0px 0px 0px 13px;
    }
/* footer style
----------------------------------------------------
*/
    .footer {
        background: white;
        margin-top: 50px;
        padding-top: 60px;   
        height: 250px;
    }

    .footer-link {
        font-family: 'Roboto';
        font-weight: 300;
        font-size: 15px;
        margin: 0px 10px 0px 10px;
    }

    .footer-copyright {
        font-family: 'Roboto';
        font-weight: 300;
        font-size: 15px;
        color: grey;
    }
    </style>
</head>
<body>
    <div id="app">
        @include('layouts.navbar')
        @yield('content')

        
        <!-- footer -->
        <div class="footer">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-sm-12 text-center">
                        <img src="{{ asset('logo.png') }}" style="width: 50px; margin-right: 20px;">
                        <img src="{{ asset('logo3.png') }}" style="width: 200px;">
                    </div>
                </div>
                <div class="row justify-content-center" style="margin-top: 20px;">
                    <div class="col-sm-12 text-center">
                        <a class="footer-link" href="{{ route('home') }}"> Home </a>
                        <a class="footer-link" href="{{ url('/about') }}"> Tentang Kami </a>
                        <a class="footer-link" href="{{ url('/kontak') }}"> Kontak </a>
                        <a class="footer-link" href="{{ url('/faq') }}"> FAQ </a>
                    </div>
                </div>
                <div class="row justify-content-center" style="margin-top: 10px;">
                    <div class="col-sm-12 text-center">
                       <p class="footer-copyright">
                           &copy; 2017 HalloRektorat All rights reserved. Made with First Blood.
                       </p>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.kirimsaran')

    </div>

    <!-- Scripts -->
    <!-- <script src="{{ asset('js/jquery-3.1.1.slim.min.js') }}"></script> -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <!-- <script src="{{ asset('js/tether.min.js') }}"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>

    <!-- <script src="{{ asset('js/bootstrap.min.js') }}"></script> -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/kirim-saran.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/sweetalert2.js') }}"></script>
    @yield('js')
    <script>        
    $(document).ready(function () {

    @if (session('success'))
        swal({
            title:"Berhasil!" ,
            text :"{{ session('success') }}",
            type :"success" 
        });
    @endif

    @if (count($errors->all()) > 0)
        swal({
            title:"Gagal!", 
            text :"{{ $errors->first() }}", 
            type :"warning"
        }
        @if (count($errors->kirimsaran->all()) > 0)
            ,function () {
                $('#kirimsaran').modal('show');
            }
        @endif
        );
    @endif
       
    });

    </script>
</body>
</html>
