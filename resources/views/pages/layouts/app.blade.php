<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/fonts/Montserrat.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/line-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/assign-modal.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    @stack('styles')
    <title>@yield('title','Welcome to Doral')</title>
</head>
<body >
    @if (\Request::is('supervisor/*'))
        @include('pages.supervisor.popup')
    @endif
    <div id="loader-wrapper">
        <div class="pulse"></div>
    </div>
<input type="hidden" id="base_url" name="base_url" value="{{ env('APP_URL') }}">
<section class="app">
    <section class="app-aside navbar navbar-dark">
        <div class="sidebar _shrink" id="collapsibleNavbar">
            <div>
                <div class="logo">
                    <a href="#" class="icon-logo"></a>
                </div>
                <ul class="cbp-vimenu">
                    @hasrole('admin', 'partner')
                        @php
                            $file='menu.partner';
                        @endphp
                    @else
                        @php
                            $file='menu.admin';
                        @endphp
                    @endrole

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
                                <div class="notify <?php if($value['name'] == 'RoadL Request') { echo 'd-90'; } ?>">
                                    <img src="{{ asset('assets/img/icons/'.$value['icon']) }}" alt="{{ $value['name'] }}" class="<?php if($value['name'] == 'RoadL Request') { echo 'icon_90'; }else { echo 'icon'; } ?> selected">
                                    <img src="{{ asset('assets/img/icons/'.$value['icon_hover']) }}" alt="" class="<?php if($value['name'] == 'RoadL Request') { echo 'icon_90'; }else { echo 'icon'; } ?> noselected">
                                    <!--<span class="number">6</span>-->
                                </div>
                                <?php if($value['name'] != 'RoadL Request') {  ?>
                                    <p class="i-title">{{ $value['icon_title'] }}</p>
                                <?php } ?>
                            </a>

                        </li>
                        @else
                            <li class="parent">
                                <a href="{{ $value['url'] }}">
                                    <div class="notify">
                                        <img src="{{ asset('assets/img/icons/'.$value['icon']) }}" alt="{{ $value['name'] }}"
                                        class="icon noselected">
                                        <img src="{{ asset('assets/img/icons/'.$value['icon_hover']) }}" alt="{{ $value['name'] }}" class="icon selected">
                                        <!--<span class="number">6</span>-->
                                    </div>
                                    <p class="i-title">{{ $value['icon_title'] }}</p>
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
<!--                    <li title="Sign Out">
                            <a href="">
                                <div class="notify">
                                    <img src="../assets/img/icons/logout-sb.svg" alt="Sign Out" class="icon noselected">
                                    <img src="../assets/img/icons/logout-sb-select.svg" alt="" class="icon selected">
                                    <span class="number">6</span>
                                </div>
                                <p class="i-title">Sign Out</p>
                            </a>
                        </li>-->
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
                        @hasrole('referral')
                            @foreach(Auth::guard('referral')->user()->roles->pluck('name') as $key=>$value)
                                {{ $value }}
                            @endforeach
                        @else
                            @foreach(Auth::user()->roles->pluck('name') as $key=>$value)
                                {{ $value }}
                            @endforeach
                        @endrole
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
                                        @hasrole('admin','partner')
                                            <span>Hi, {{ Auth::guard('partner')->user()->name }}</span>
                                        @else
                                            <span>Hi, {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</span>
                                        @endrole
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
    <script src="{{ asset('assets/js/moment.min.js') }}"></script>
    <script src="{{ asset('assets/js/app.common.min.js') }}"></script>
    <script>
        var base_url = $('#base_url').val();
        var socket_url = '{{ env("SOCKET_IO_URL") }}';
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/3.0.3/socket.io.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="{{ asset('js/socket.js') }}"></script>
    <script src="{{ asset('assets/js/sidebar.js') }}"></script>
    <script src="{{ asset('assets/js/tail.select-full.min.js') }}"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <!-- The core Firebase JS SDK is always required and must be listed first -->
    <script defer src="https://www.gstatic.com/firebasejs/8.2.3/firebase-app.js"></script>

    <script defer src="https://www.gstatic.com/firebasejs/8.2.3/firebase-auth.js"></script>
    <script defer src="https://www.gstatic.com/firebasejs/8.2.3/firebase-messaging.js"></script>

    <script>
        $("#loader-wrapper").hide();
        $(document).ready(function(){
            const config = {
                apiKey: "AIzaSyC5rTr8rSUyQeKlbaAHW1Xo-ezNoQO0dUE",
                authDomain: "doral-roadl.firebaseapp.com",
                databaseURL: "https://doral-roadl.firebaseio.com",
                projectId: "doral-roadl",
                storageBucket: "doral-roadl.appspot.com",
                messagingSenderId: "606071434218",
                appId: "1:606071434218:web:8ba9b96b1af8ff8309a093",
                measurementId: "G-KD0Q9SKM36"
            };
            firebase.initializeApp(config);
            navigator.serviceWorker.register(base_url+"firebase-messaging-sw.js",{scope:"firebase-cloud-messaging-push-scope"})


            const messaging = firebase.messaging();
            messaging
                .requestPermission()
                .then(function () {
                    return messaging.getToken()
                })
                .then(function(token) {
                    console.log(token)
                    {{--$.ajax({--}}
                    {{--    headers: {--}}
                    {{--        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
                    {{--    },--}}
                    {{--    url: '{{ route('save-token') }}',--}}
                    {{--    type: 'POST',--}}
                    {{--    data: {--}}
                    {{--        user_id: {!! json_encode($user_id ?? '') !!},--}}
                    {{--        fcm_token: token--}}
                    {{--    },--}}
                    {{--    dataType: 'JSON',--}}
                    {{--    success: function (response) {--}}
                    {{--        console.log(response)--}}
                    {{--    },--}}
                    {{--    error: function (err) {--}}
                    {{--        console.log(" Can't do because: " + err);--}}
                    {{--    },--}}
                    {{--});--}}
                })
                .catch(function (err) {
                    console.log("Unable to get permission to notify.", err);
                });

            messaging.onMessage(function(payload) {
                const noteTitle = payload.notification.title;
                const noteOptions = {
                    body: payload.notification.body,
                    icon: payload.notification.icon,
                };
                new Notification(noteTitle, noteOptions);
            });
        });
    </script>
@stack('scripts')
</body>
</html>
