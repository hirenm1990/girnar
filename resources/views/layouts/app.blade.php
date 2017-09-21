<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/datepicker.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/semantic.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet">
    <!-- <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet"> -->
</head>
<body>

<div id="app">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
            </div>
            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    &nbsp;
                </ul>
                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @guest
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <!-- <li><a href="{{ route('register') }}">Register</a></li> -->
                    @else
                        <li><a href="{{ URL::to('/') }}/contracts"> Contracts</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                Data<span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ URL::to('/') }}/companys"> Company</a></li>
                                <li><a href="{{ URL::to('/') }}/banks"> Bank</a></li>
                                <li><a href="{{ URL::to('/') }}/buyers"> Buyer's</a></li>
                                <li><a href="{{ URL::to('/') }}/countries"> Countries</a></li>
                                <li><a href="{{ URL::to('/') }}/deliveryterms"> Delivery Terms</a></li>
                                <li><a href="{{ URL::to('/') }}/paymentterms"> Payment Terms</a></li>
                                <li><a href="{{ URL::to('/') }}/dischargeports"> Discharge Ports</a></li>
                                <li><a href="{{ URL::to('/') }}/finaldestinations"> Final Destinations</a></li>
                                <li><a href="{{ URL::to('/') }}/packages"> Packages</a></li>
                                <li><a href="{{ URL::to('/') }}/products"> Products</a></li>
                                <li><a href="{{ URL::to('/') }}/ports"> Ports</a></li>
                                <li><a href="{{ URL::to('/') }}/forwarders"> Forwarders</a></li>
                                <li><a href="{{ URL::to('/') }}/dollorexchanges"> Dollor Exchanges</a></li>
                                <li><a href="{{ URL::to('/') }}/surveyors"> Surveyors</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    @yield('content')
</div>
    <!-- Scripts -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/dropzone.js') }}"></script>
    <script src="{{ asset('js/tether.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/select2.min.js') }}"></script>
    <script src="{{ asset('plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('plugins/datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('js/datepicker.min.js') }}"></script>
    @yield('jquery')
</body>
</html>
