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
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- <link href="{{ asset('css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"> -->
    <link href="{{ asset('css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/datepicker.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet">
    <link href='//fonts.googleapis.com/css?family=ABeeZee' rel='stylesheet'>
    <style>
        body, h1, h2, h3, h4, h5, h6 {
            font-family: 'ABeeZee';
        }
        body {
            font-size: 14px;
        }
    </style>
</head>
<body>

    <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light"> <!-- fixed-top -->
      <a class="navbar-brand" href="{{ URL::to('/') }}"><i class="fa fa-home"></i> {{ config('app.name', 'Laravel') }}</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        @guest
        <ul class="navbar-nav mr-auto">
          <!-- <li><a href="{{ route('register') }}">Register</a></li> -->
        </ul>
        <ul class="nav justify-content-end">
            <li class="nav-item active">
                <a class="nav-link btn btn-primary" href="{{ route('login') }}">Login<span class="sr-only">(current)</span></a>
            </li>
        </ul>
        @else
        <ul class="navbar-nav mr-auto"></ul>
        <ul class="nav justify-content-end">
          <li class="nav-item active">
            <a class="nav-link" href="{{ URL::to('/') }}/contracts"><i class="fa fa-list-alt"></i> Contract<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"><i class="fa fa-database"></i> Data </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="{{ URL::to('/') }}/companys"> Company</a>
                <a class="dropdown-item" href="{{ URL::to('/') }}/banks"> Bank</a>
                <a class="dropdown-item" href="{{ URL::to('/') }}/buyers"> Buyer's</a>
                <a class="dropdown-item" href="{{ URL::to('/') }}/countries"> Countries</a>
                <a class="dropdown-item" href="{{ URL::to('/') }}/deliveryterms"> Delivery Terms</a>
                <a class="dropdown-item" href="{{ URL::to('/') }}/paymentterms"> Payment Terms</a>
                <a class="dropdown-item" href="{{ URL::to('/') }}/dischargeports"> Discharge Ports</a>
                <a class="dropdown-item" href="{{ URL::to('/') }}/finaldestinations"> Final Destinations</a>
                <a class="dropdown-item" href="{{ URL::to('/') }}/packages"> Packages</a>
                <a class="dropdown-item" href="{{ URL::to('/') }}/products"> Products</a>
                <a class="dropdown-item" href="{{ URL::to('/') }}/ports"> Ports</a>
                <a class="dropdown-item" href="{{ URL::to('/') }}/forwarders"> Forwarders</a>
                <a class="dropdown-item" href="{{ URL::to('/') }}/dollorexchanges"> Dollor Exchanges</a>
                <a class="dropdown-item" href="{{ URL::to('/') }}/surveyors"> Surveyors</a>
            </div>
            </li>
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"><i class="fa fa-user"></i>
              {{ Auth::user()->name }}
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                    Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </div>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
        @endguest
      </div>
    </nav>
    @yield('content')

    <!-- Scripts -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/dropzone.js') }}"></script>
    <script src="{{ asset('js/tether.min.js') }}"></script>
    <script src="{{ asset('js/select2.min.js') }}"></script>
    <script src="{{ asset('plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatable/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('plugins/datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <!-- <script src="{{ asset('js/bootstrap-datetimepicker.min.js') }}"></script> -->
    @yield('jquery')
</body>
</html>
