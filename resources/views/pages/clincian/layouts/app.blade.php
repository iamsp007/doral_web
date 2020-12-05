<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/clincian/fonts/Montserrat.css') }}">
    <link rel="stylesheet" href="{{ asset('css/clincian/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/clincian/line-awesome.css') }}">

    <link rel="stylesheet" href="{{ asset('css/clincian/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/clincian/responsive.css') }}">
    @stack('styles')
    <title>@yield('title','Welcome to Doral')</title>
</head>
<body >
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
                <li><a class="{{ \Request::is('clinician')?'nav active':'nav' }}" href="{{ route('clinician.dashboard') }}">Dashboard<span class="dot"></span></a></li>
                <li><a class="{{ \Request::is('clinician/patient-list')?'nav active':'nav' }}" href="{{ route('clinician.patientList') }}">Patient List<span class="dot"></span></a></li>
                <li><a class="{{ \Request::is('clinician/new-patient-list')?'nav active':'nav' }}" href="{{ route('clinician.new.patientList') }}">New Patient List<span class="dot"></span></a></li>
                <li><a class="{{ \Request::is('clinician/start-roadl')?'nav active':'nav' }}" href="{{ route('clinician.start.roadl') }}">RoadL<span class="dot"></span></a></li>
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
                    <h1 class="title">Clinician</h1>
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
<script src="{{ asset('js/clincian/jquery.min.js') }}"></script>
<script src="{{ asset('js/clincian/popper.min.js') }}"></script>
<script src="{{ asset('js/clincian/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/clincian/app.common.js') }}"></script>
@stack('scripts')
</body>
</html>
