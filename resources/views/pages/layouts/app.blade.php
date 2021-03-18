<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link rel="stylesheet" href="{{ asset('assets/css/fonts/Montserrat.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/line-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/sidebar.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/daterangepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/tail.select-default.min.css') }}">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.24.0/apexcharts.min.css"> -->
    <link rel="stylesheet" href="{{ asset('assets/css/fixedColumns.dataTables.min.css') }}" />
    <!-- <link rel="stylesheet" href="{{ asset('assets/css/dataTables.bootstrap4.min.css') }}" /> -->
    <link rel="stylesheet" href="{{ asset('assets/css/buttons.bootstrap4.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/apexcharts.min.css') }}">
    <!-- <link rel="stylesheet" href="{{ asset('assets/css/datatables.min.css') }}"> -->
    <link rel="stylesheet" href="{{ asset('assets/css/assign-modal.css') }}">
    <!-- <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"> -->
    <link rel="stylesheet" href="{{ asset('css/toaster.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/loader.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/developer.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">

    @stack('styles')
    <title>@yield('title','Welcome to Doral')</title>
</head>
<body>
    @if (\Request::is('supervisor/*'))
        @include('pages.supervisor.popup')
    @endif

    <div id="loader-wrapper">
        <div class="overlay"></div>
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
                                    </div>
                                    <p class="i-title">{{ $value['icon_title'] }}</p>
                                </a>
                                <ul class="child">
                                    <li class="arrow--4"></li>
                                    @if($value['name'] == 'Services')
                                        @foreach($value['menu'] as $skey => $value)
                                            @if(in_array($value['name'], explode(",",Auth::guard('referral')->user()->services) ))
                                                @php
                                                    if($value['name'] == '1'):
                                                        $name = 'VBC';
                                                    endif;
                                                    if($value['name'] == '2'):
                                                        $name = 'MD Order';
                                                    endif;
                                                    if($value['name'] == '3'):
                                                        $name = 'Occupational Health';
                                                    endif;
                                                @endphp
                                                <li><a href="{{ $value['url'] }}">{{ $name }}</a></li>
                                            @endif
                                        @endforeach
                                    @else
                                        @foreach($value['menu'] as $skey=>$svalue)
                                            <li><a href="{{ $svalue['url'] }}">{{ $svalue['name'] }}</a></li>
                                        @endforeach
                                    @endif
                                </ul>
                            </li>

                            <!-- <li title="{{ $value['name'] }}" class="{{ \Request::is($value['route'])?'active':'' }}">
                                <a href="{{ $value['url'] }}">
                                    <img src="{{ asset('assets/img/icons/'.$value['icon']) }}" alt="{{ $value['name'] }}" class="icon selected">
                                    <img src="{{ asset('assets/img/icons/'.$value['icon_hover']) }}" alt="{{ $value['name'] }}" class="icon noselected">
                                </a>
                            </li>-->
                        @endif
                    @endforeach
                    <!--  <li title="Sign Out">
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
                                {{ ucfirst($value) }}
                            @endforeach
                        @else
                            @auth
                                @foreach(Auth::user()->roles->pluck('name') as $key=>$value)
                                    {{ ucfirst($value) }}
                                @endforeach
                            @endauth
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
                                            @if(\Illuminate\Support\Facades\Auth::check())
                                                <span>Hi, {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</span>
                                            @else
                                                <span>Hi, {{ Auth::guard('referral')->user()->name }}</span>
                                            @endif

                                        @endrole
                                    @endrole

                                    <a href="javascript:void(0)">
                                        <i class="las la-user-circle la-3x ml-2"></i>
                                    </a>
                                </div>
                                <div class="dropdown-menu shadow" aria-labelledby="dropdownMenuButton">
                                    @hasrole('referral')
                                     <a class="dropdown-item" href="{{ url('referral/profile') }}"
                                    >Profile</a>
                                     @endrole
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
    <div class="modal" id="roadl-request-modal" tabindex="-1" style="top: 80px !important;" >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">RoadL Request</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closeReferralPopup()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="broadcast_form" >
                        <div class="form-group">
                            <div class="row">
                                <div class="col-12">
                                    <input type="hidden" id="patient_id" name="patient_id" class="input-skin">
                                    <select name="type_id" id="type_id" class="input-skin">
                                        <option value="5">LAB</option>
                                        <option value="6">Radiology</option>
                                        <option value="7">CHHA</option>
                                        <option value="8">Clinician</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <input type="text" name="test_name" class="input-skin" id="selectRole1" placeholder="Enter test name...">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <input type="text" name="reason" class="input-skin" placeholder="Enter Reason...">
                                </div>
                            </div>
                        </div>
                        <div class="d-flex mb-4">
                            <input type="button" value="Submit" class="btn btn--submit btn-lg" onclick="onAppointmentBroadCastSubmit(this)">
                            <input type="reset" value="Reset" class="btn btn--reset btn-lg ml-4">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@yield('app-video')
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/moment.min.js') }}"></script>
    <script src="{{ asset('assets/js/daterangepicker.min.js') }}"></script>
    <script src="{{ asset('assets/js/tail.select-full.min.js') }}"></script>
    <script src="{{ asset('assets/js/app.common.min.js') }}"></script>

    <script src="{{ asset('assets/js/app.clinician.patient.details.min.js') }}"></script>
    <script>
        var base_url = $('#base_url').val();
        var socket_url = '{{ env("SOCKET_IO_URL") }}';
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

    <script src="{{ asset('assets/js/sidebar.js') }}"></script>
    <script src="{{ asset('assets/js/tail.select-full.min.js') }}"></script>
    <script src="{{ asset('js/toastr.js') }}"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('assets/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/js/buttons.print.min.js') }}"></script>
    <!-- <script src="{{ asset('assets/js/dataTables.fixedColumns.min.js') }}"></script> -->
    <script src="{{ asset('assets/js/apexcharts.js') }}"></script>
    <script src="https://www.gstatic.com/firebasejs/4.1.3/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/4.1.3/firebase-database.js"></script>
    <script src="https://www.gstatic.com/firebasejs/4.1.3/firebase-messaging.js"></script>
    <script>


        $(document).ready(function(){
            $("#loader-wrapper").hide();

            if ('serviceWorker' in navigator) {
                navigator.serviceWorker.register('{{ asset("js/firebase-messaging-sw.js") }}')
                    .then(function(registration) {
                        // console.log('Registration successful, scope is:', registration.scope);
                        const config = {
                            apiKey: "AIzaSyCRAJgZT7W43PSBlhKIu_0uN58Onqb_o7w",
                            projectId: "doctorapp-b4032",
                            messagingSenderId: "409560615341",
                            appId: "1:409560615341:web:5d352036d35e5a5aed3924"
                        };
                        firebase.initializeApp(config);
                        const messaging = firebase.messaging();
                        messaging.useServiceWorker(registration)
                        messaging
                        .requestPermission()
                        .then(function () {
                            // console.log("Notification permission granted.");

                            // get the token in the form of promise
                            return messaging.getToken()
                        })
                        .then(function(token) {
                            // print the token on the HTML page
                            $("#loader-wrapper").show();
                            $.ajax({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                url:'{{ route("save-token") }}',
                                method:'POST',
                                dataType:'json',
                                data:{
                                    device_token:token
                                },
                                success:function (response) {
                                    $("#loader-wrapper").hide();
                                },
                                error:function (error) {
                                    // console.log(error.responseJSON.status+': '+error.responseJSON.message);
                                    $("#loader-wrapper").hide();
                                }
                            })
                        })
                        .catch(function (err) {
                            // console.log("Unable to get permission to notify.", err);
                        });

                        messaging.onMessage(function(payload) {
                            // var data = JSON.parse(payload.notification.body);
                            const noteTitle = payload.notification.title;
                            const noteOptions = {
                                body: noteTitle,
                                icon: payload.notification.icon,
                            };

                            new Notification(noteTitle, noteOptions).onclick = function (event) {

                                if (payload.data['gcm.notification.notification_type']==='1'){
                                    window.location.href=base_url+'clinician/start-roadl/'+payload.data.id;
                                }else if (payload.data['gcm.notification.notification_type']==="2"){
                                    window.location.href=base_url+'clinician/running-roadl/'+payload.data.id;
                                }else if (payload.data['gcm.notification.notification_type']==="3"){
                                    window.location.href=base_url+'clinician/scheduled-appointment';
                                }else if (payload.data['gcm.notification.notification_type']==="4"){
                                    window.location.href=base_url+'clinician/scheduled-appointment';
                                }
                            };
                        });

                    }).catch(function(err) {
                        // console.log('Service worker registration failed, error:', err);
                    });
            }

        });
    </script>
    <script src="{{ asset('js/clincian/app.clinician.broadcast.js') }}"></script>

@stack('scripts')
</body>
</html>
