<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700">

    <title>{{settings()->company_name}} | @yield('title', '') </title>

    <link rel="icon" href="{{asset(settings()->fav_icon)}}" />
    <style>
        .nav-wrapper {
            background: var(--cyan);
        }
        body, html {
            height: 100%;
            margin: 0;
            padding: 0;
            font-size: 13px!important;
            font-weight: 400;
            font-family: Poppins,Helvetica,sans-serif;
            -ms-text-size-adjust: 100%;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }
    </style>

    @yield('style')

</head>
<body>
    <div id="app">
        <div class="nav-wrapper">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-dark">
                    <a class="navbar-brand" href="{{ url('/') }}">{{settings()->company_name}}</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarText">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item {{Route::is('user.customer.all') ? 'active' : ''}}">
                                <a class="nav-link" href="{{route('user.customer.all')}}">Customers</a>
                            </li>

                            <li class="nav-item {{Route::is('user.file') ? 'active' : ''}}">
                                <a class="nav-link" href="{{route('user.file')}}">File</a>
                            </li>

                            <li class="nav-item {{Route::is('user.movements') ? 'active' : ''}}">
                                <a class="nav-link" href="{{route('user.movements')}}">Movements</a>
                            </li>
                        </ul>

                        <div class="navbar-text p-0">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item">
                                    <a class="nav-link" href="#">{{Auth::user()->name}}</a>
                                </li>

                                <li class="nav-item dropdown">
                                    <a class="nav-link" href="{{route('user.logout')}}">Logout</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>


        <div class="container">
            @yield('content')
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    @yield('script')
</body>
</html>
