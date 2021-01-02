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

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css">
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
        <div class="sidebar _shrink sort-sidebar" id="collapsibleNavbar">
            <div>
                <div class="logo">
                    <a href="#" class="icon-logo"></a>
                </div>
                <ul class="cbp-vimenu">
                    @php
                        $file='menu.admin';
                    @endphp
                    @hasrole('clinician')
                        @php
                          $file='menu.clinician';
                        @endphp
                    @endrole
                    @hasrole('referral')
                        @php
                          $file='menu.referral';
                        @endphp
                    @endrole
                    @hasrole('supervisor')
                        @php
                          $file='menu.supervisor';
                        @endphp
                    @endrole
                    @hasrole('co-ordinator')
                        @php
                          $file='menu.co-ordinator';
                        @endphp
                    @endrole
                    @foreach(config($file) as $key=>$value)

                        @if(!isset($value['menu']))
                        <li title="{{ $value['name'] }}" class="{{ \Request::is($value['route'])?'active':'' }}">
                            <a href="{{ $value['url'] }}">
                                <img src="{{ asset('assets/img/icons/'.$value['icon']) }}" alt="{{ $value['name'] }}" class="icon selected">
                                <img src="{{ asset('assets/img/icons/'.$value['icon_hover']) }}" alt="" class="icon noselected">
                            </a>
                        </li>
                        @else
                            <li class="parent">
                                <a href="{{ $value['url'] }}">
                                    <img src="{{ asset('assets/img/icons/'.$value['icon']) }}" alt="{{ $value['name'] }}"
                                        class="icon noselected">
                                    <img src="{{ asset('assets/img/icons/'.$value['icon_hover']) }}" alt="{{ $value['name'] }}" class="icon selected">
                                </a>
                                <ul class="child">
                                    <li class="arrow--4"></li>
                                    @foreach($value['menu'] as $skey=>$svalue)
                                        <li><a href="{{ $svalue['url'] }}">{{ $svalue['name'] }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
<!--                            <li title="{{ $value['name'] }}" class="{{ \Request::is($value['route'])?'active':'' }}">
                                <a href="{{ $value['url'] }}">
                                    <img src="{{ asset('assets/img/icons/'.$value['icon']) }}" alt="{{ $value['name'] }}" class="icon selected">
                                    <img src="{{ asset('assets/img/icons/'.$value['icon_hover']) }}" alt="{{ $value['name'] }}" class="icon noselected">
                                </a>
                            </li>-->
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
        <!-- Left Section End -->
    </section>
    <section class="app-content _new">
        <!-- Right section Start-->
        <header class="app-header-block _fullwidth">
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
                            {{ $value }}
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
                                    @hasrole('referral')
                                        <span>Hi, {{ Auth::user()->name }} {{ Auth::user()->last_name }}</span>
                                    @else
                                        <span>Hi, {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</span>
                                    @endrole
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
            <div class="app-title-box _full">
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
@yield('app-video')
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/app.common.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/3.0.3/socket.io.js"></script>--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>
{{--<script src="{{ asset('js/socket.js') }}"></script>--}}
<script>
    var base_url = $('#base_url').val();
</script>
<script>
    $("#loader-wrapper").hide();
</script>
@stack('scripts')
</body>
</html>
