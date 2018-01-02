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
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome/css/font-awesome.min.css') }}"> @yield('css')
    <style>
    /*
* Base structure
*/
    /* Move down content because we have a fixed navbar that is 3.5rem tall */

    body {
        padding-top: 3.5rem;
    }
    /*
* Typography
*/

    h1 {
        padding-bottom: 9px;
        margin-bottom: 20px;
        border-bottom: 1px solid #eee;
    }
    /*
* Sidebar
*/

    .sidebar {
        position: fixed;
        top: 51px;
        bottom: 0;
        left: 0;
        z-index: 1000;
        padding: 20px 0;
        overflow-x: hidden;
        overflow-y: auto;
        /* Scrollable contents if viewport is shorter than content. */
        border-right: 1px solid #eee;
    }

    .sidebar .nav {
        margin-bottom: 20px;
    }

    .sidebar .nav-item {
        width: 100%;
    }

    .sidebar .nav-item+.nav-item {
        margin-left: 0;
    }

    .sidebar .nav-link {
        border-radius: 0;
    }
    /*
* Dashboard
*/
    /* Placeholders */

    .placeholders {
        padding-bottom: 3rem;
    }

    .placeholder img {
        padding-top: 1.5rem;
        padding-bottom: 1.5rem;
    }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <a class="navbar-brand" href="#">Dashboard</a>
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">
                            {{ Route::currentRouteName() }}
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="#">Settings</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Help</a>
                    </li> -->
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}" 
                        onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <div class="container-fluid">
        <div class="row">
            <nav class="col-sm-3 col-md-2 d-none d-sm-block bg-light sidebar">
                <ul class="nav nav-pills flex-column">
                    <li class="nav-item">
                        <a class="nav-link{{ Route::currentRouteName() == 'admin.dashboard' ? ' active' : ''}}" href="{{ route('admin.dashboard') }}">Saran <span class="sr-only">(current)</span><span class="badge badge-warning">baru</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link{{ Route::currentRouteName() == 'admin.saran' ? ' active' : ''}}" href="{{ route('admin.saran') }}">Saran</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link{{ Route::currentRouteName() == 'admin.user' ? ' active' : ''}}" href="{{ url('/admin/users') }}">Pengguna</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link{{ Route::currentRouteName() == 'admin.stats' ? ' active' : ''}}" href="{{ route('admin.stats') }}">Statistics</a>
                    </li> -->
                </ul>
                <!-- <ul class="nav nav-pills flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Nav item</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Nav item again</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">One more nav</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Another nav item</a>
                    </li>
                </ul> -->
                <!-- <ul class="nav nav-pills flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Nav item again</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">One more nav</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Another nav item</a>
                    </li>
                </ul> -->
            </nav>
            <main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
                @yield('content')
        </div>
    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/tether.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/sweetalert2.js') }}"></script>

    @yield('js')

    <script>
        $(document).ready(function() {
            @if (session('sukses'))
                swal({
                    title: "berhasil",
                    text: "{{ session('sukses') }}",
                    type: "success"
                });
            @endif
        });
    </script>
</body>

</html>