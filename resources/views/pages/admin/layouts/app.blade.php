<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/fonts/Montserrat.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/line-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/daterangepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/calendar/lib/main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    @stack('styles')
    <title>@yield('title','Welcome to Doral')</title>
</head>
<body >
    <div id="loader-wrapper">
        <div class="pulse"></div>
    </div>
<input type="hidden" id="base_url" name="base_url" value="{{ env('APP_URL') }}">
<section class="app">
    <section class="app-aside navbar navbar-dark">
        <div class="sidebar" id="collapsibleNavbar">
            <div class="block">
                <!-- Logo Start -->
                <a href="javascript:void(0)" title="Welcome to Doral">
                    <img src="{{ asset('assets/img/logo-white.svg') }}" alt="Welcome to Doral"
                         srcset="{{ asset('assets/img/logo-white.svg') }}" class="img-fluid">
                </a>
                <!-- Logo End -->
                <i class="las la-times-circle white d-block d-xl-none d-lg-none d-md-none d-sm-none"
                   id="closeMenu"></i>
            </div>
            <ul class="sidenav">
                <li><a class="{{ \Request::is('admin/dashboard')?'nav active':'nav' }}" href="{{ route('admin.dashboard') }}">Dashboard<span class="dot"></span></a></li>
                <li><a class="{{ \Request::is('admin/roles')?'active':'' }} nav" href="{{ route('admin.roles') }}">Roles & Permission <span class="dot"></span></a></li>
                <li><a class="{{ \Request::is('admin/employee')?'active':'' }} nav" href="{{ route('admin.employee') }}">Employee <span class="dot"></span></a></li>
                <li data-toggle="collapse" data-target="#products">
                    <a href="javascript:void(0)" data-target="{{ route('admin.referral.approval') }}" class="{{ (\Request::is('admin/referral-approval') || \Request::is('admin/referral-active') || \Request::is('admin/referral-rejected'))?'active':'' }} nav">
                        Referral <i class="las la-angle-down _arrow"></i>
                    </a>
                    <ul class="sub collapse" id="products">
                        <li>
                            <a class="{{ \Request::is('admin/referral-approval')?'active':'' }} _nav" href="{{ route('admin.referral.approval') }}">Approval Request<span class="dot"></span></a>
                        </li>
                        <li>
                            <a class="{{ \Request::is('admin/referral-active')?'active':'' }} _nav" href="{{ route('admin.referral.active') }}">Active <span class="dot"></span></a>
                        </li>
                        <li>
                            <a class="{{ \Request::is('admin/referral-rejected')?'active':'' }} _nav" href="{{ route('admin.referral.rejected') }}">Rejected <span class="dot"></span></a>
                        </li>
                    </ul>
                </li>
                <li><a class="{{(\Request::is('admin/clinician') || \Request::is('admin/clinician-detail/*')) ?'nav active':'nav' }}" href="{{ route('admin.clinician') }}">Clinician List<span class="dot"></span></a></li>
                <li>
                    <a class="nav" href="{{ url('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form-side').submit();"
                    >Logout <span class="dot"></span></a>
                    <form id="logout-form-side" action="{{ url('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
        <!-- Left Section End -->
    </section>
    <section class="app-content">
        <!-- Right section Start-->
        <header class="app-header-block">
            <div class="app-header">
                <div class="nav">
                    <button class="navbar-toggler d-none" type="button" data-toggle="collapse"
                            data-target="#collapsibleNavbar" aria-controls="collapsibleNavbar" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon">
                                <i class="las la-bars white"></i>
                            </span></button>
                    <h1 class="title">
                        @foreach(Auth::user()->roles->pluck('name') as $key=>$value)
                            {{ ucfirst($value) }}
                        @endforeach
                        </h1>
                </div>
                <div>
                    <ul class="menus">
                        <li>
                            <a href="javascript:void(0)" class="notify">
                                <i class="las la-bell la-3x white"></i>
                                <span class="number">6</span>
                            </a>
                        </li>
                        <li>
                            <div class="dropdown user-dropdown">
                                <div class="user dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown"
                                     aria-haspopup="true" aria-expanded="false">
                                    <span>Hi, {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</span>
                                    <a href="javascript:void(0)">
                                        <i class="las la-user-circle la-3x ml-2"></i>
                                    </a>
                                </div>
                                <div class="dropdown-menu shadow" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="{{ url('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                                    >Logout</a>
                                    <form id="logout-form" action="{{ url('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="app-title-box">
                <div class="app-title">
                    @yield('pageTitleSection')
                </div>
                @yield('upload-btn')
            </div>
        </header>
        <section class="app-body">
            @yield('content')
        </section>
    </section>
</section>
@yield('popup')

<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/moment.min.js') }}"></script>
<script src="{{ asset('assets/js/daterangepicker.min.js') }}"></script>
<script src="{{ asset('assets/js/app.common.js') }}"></script>    
<script src="{{ asset('assets/calendar/lib/main.js') }}"></script>
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/3.0.3/socket.io.js"></script>
{{-- <script src="{{ asset('js/socket.js') }}"></script> --}}
<script>
    var base_url = $('#base_url').val();
</script>
<script>
    $("#loader-wrapper").hide();
</script>
@stack('scripts')
</body>
</html>
