<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'FairGround') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../fontawesome/css/fontawesome.min">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
                    
</head>
<body>
    <div id="app2">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}">
                <span>Fair</span><span id="gold">Ground</span>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>

                            @endif
                            
                        @else

                            <li class="nav-item" href="#">
                                <a href="/home" class="nav-link"><i class="fa fa-home"></i></a>
                            </li>
                            <li  class="nav-item" href="#">
                                <a href="/{{ Auth::user()->id }}" class="nav-link"><i class="fa fa-user"></i></a>
                            </li>
                            <li class="nav-item" href="#">
                                <a href="#" class="nav-link"><i class="fa fa-bell"></i></a>
                            </li>

                            @if(Auth::user()->type === 'host')

                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre><i class="fa fa-building"></i>
                                       Company <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        @foreach($companies as $company)
                                            <a class="dropdown-item" href="/company/{{$company->id}}">
                                            <i class="fa fa-building"></i> {{$company->name}}
                                            </a>
                                        @endforeach
                                    </div>
                                </li>
                            @endif

                            
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <img src="../storage/{{ Auth::user()->image }}" alt="" class="rounded-circle" style="width:30px; height:30px"> <span>{{ Auth::user()->name }}</span> <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a href="/{{ Auth::user()->id }}" class="dropdown-item"><i class="fa fa-user"></i> {{ Auth::user()->name }}</a>
                                <hr>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                                        <i class="fa fa-sign-out"></i>
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            <form action="{{ route('search') }}" method="POST" class="form-inline my-2 my-lg-0 mr-3">
                            @csrf
                            <input type="text" name="query" class="form-control mr-3" />
                            <input type="submit" class="btn btn-outline-light my-2 my-sm-0" value="Search" />
                        </form>
                    
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        
        @yield('jumbo')
        

        <main> 
            <!-- message section that shows only when a messagge is passed -->
            @if(session()->has('message'))
                <div class="alert alert-success" role="alert">
                    <strong>Success</strong> {{session()->get('message')}}
                </div>
            @endif
            <!-- message section that shows only when a messagge is passed -->

            @yield('content')
        </main>
    </div>


    
              <!-- Footer -->
              <footer class="pt-4 w-100" style="position:absolute; bottom:0%; margin-left: auto; margin-right: auto;">

                <!-- Footer Links -->
                <div class="container text-center text-md-left">

                <!-- Footer links -->
                <div class="row text-center text-md-left mt-3 pb-3">

                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                        <h6 class="text-uppercase mb-4 font-weight-bold">FAIRGROUND</h6>
                        <p>Fairground connects you to companies and aim at making your opinion to count.
                        </p>
                    </div>
                    <!-- Grid column -->

                    <hr class="w-100 clearfix d-md-none">

                    <!-- Grid column -->
                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
                        <h6 class="text-uppercase mb-4 font-weight-bold">About</h6>
                        <p>
                            <a href="#!">Contact</a>
                        </p>
                        <p>
                            <a href="#!">Community</a>
                        </p>
                        <p>
                            <a href="#!">Log in</a>
                        </p>
                        <p>
                            <a href="#!">Register</a>
                        </p>
                    </div>
                    <!-- Grid column -->

                    <hr class="w-100 clearfix d-md-none">

                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
                        <h6 class="text-uppercase mb-4 font-weight-bold">Useful links</h6>
                        <p>
                            <a href="#!">Your Account</a>
                        </p>
                        <p>
                            <a href="#!">Become an Affiliate</a>
                        </p>
                        <p>
                            <a href="#!">Help</a>
                        </p>
                    </div>

                    <!-- Grid column -->
                    <hr class="w-100 clearfix d-md-none">

                    <!-- Grid column -->
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
                    <h6 class="text-uppercase mb-4 font-weight-bold">Contact</h6>
                    <p>
                        <i class="fa fa-home mr-3"></i> Gbagada, Lagos, Nigeria</p>
                    <p>
                        <i class="fa fa-envelope mr-3"></i> fairground@gmail.com</p>
                    <p>
                        <i class="fa fa-phone mr-3"></i>+2348 137 896 883</p>
                    <p>
                        <i class="fa fa-print mr-3"></i> + 01 549 678 89</p>
                    </div>
                    <!-- Grid column -->

                </div>
                <!-- Footer links -->

                <hr>

                <!-- Grid row -->
                <div class="row d-flex align-items-center">

                    <!-- Grid column -->
                    <div class="col-md-7 col-lg-8">

                    <!--Copyright-->
                    <p class="text-center text-md-left">© 2018 Copyright:
                        <a href="/">
                        <strong>fairground.test</strong>
                        </a>
                    </p>

                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-5 col-lg-4 ml-lg-0">

                    <!-- Social buttons -->
                    <div class="text-center text-md-right">
                        <ul class="list-unstyled list-inline">
                        <li class="list-inline-item">
                            <a class="btn-floating btn-sm rgba-white-slight mx-1">
                            <i class="fa fa-facebook-f"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a class="btn-floating btn-sm rgba-white-slight mx-1">
                            <i class="fa fa-twitter"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a class="btn-floating btn-sm rgba-white-slight mx-1">
                            <i class="fa fa-google-plus-g"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a class="btn-floating btn-sm rgba-white-slight mx-1">
                            <i class="fa fa-linkedin-in"></i>
                            </a>
                        </li>
                        </ul>
                    </div>

                    </div>
                    <!-- Grid column -->

                </div>
                <!-- Grid row -->

                </div>
                <!-- Footer Links -->

                </footer>
                <!-- Footer -->
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</body>
</html>