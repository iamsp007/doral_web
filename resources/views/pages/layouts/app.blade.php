<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/img/fevicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/img/fevicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/img/fevicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('assets/img/fevicon/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('assets/img/fevicon/safari-pinned-tab.svg') }}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <link rel="stylesheet" href="{{ asset('assets/css/fonts/Montserrat.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/line-awesome.css') }}">
  
    <link rel="stylesheet" href="{{ asset('assets/css/sidebar.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/daterangepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/tail.select-default.min.css') }}">
    <link href="{{ asset('css/jqyery_datatable_min_1_10_22.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jqyery_datatable_responsive_1_10_22.css') }}" rel="stylesheet">
    <link type="text/css" href="{{asset('css/datatable_checkboxes.css')}}" rel="stylesheet" />
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
                    @if(\Illuminate\Support\Facades\Auth::guard('partner')->check())
                        @php
                            $file='menu.partner';
                        @endphp
                    @elseif(\Illuminate\Support\Facades\Auth::guard('referral')->check())
                        @php
                            $file='menu.referral';
                        @endphp
                    @else
                        @hasrole('admin')
                            @php
                                $file='menu.admin';
                            @endphp
                        @endrole
                        @hasrole('clinician')
                            @php
                                $file='menu.clinician';
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
                    @endif
                    @foreach(config($file) as $key=>$value)
                        @if(!isset($value['menu']))

                            <li title="{{ $value['name'] }}" class="{{ \Request::is($value['route'])?'active':'' }}">

                                <a href="{{ $value['url'] }}" @if($value['name'] === 'Credentialing') target="_blank" @endif>

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
                                                    if($value['name'] == '6'):
                                                        $name = 'Covid-19';
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
                        @if(\Illuminate\Support\Facades\Auth::guard('partner')->check())
                            @foreach(Auth::guard('partner')->user()->roles->pluck('name') as $key=>$value)
                                {{ ucfirst($value) }}
                            @endforeach
                        @elseif(\Illuminate\Support\Facades\Auth::guard('referral')->check())
                            @foreach(Auth::guard('referral')->user()->roles->pluck('name') as $key=>$value)
                                {{ ucfirst($value) }}
                            @endforeach
                        @else
                            @auth
                                @foreach(Auth::user()->roles->pluck('name') as $key=>$value)
                                    {{ ucfirst($value) }}
                                @endforeach
                            @endauth
                        @endif
                    </h1>
                </div>
                <div>
                    <ul class="menus">
                        <li>
                            <a href="javascript:void(0)" class="notify">
                                <i class="las la-bell la-3x white"></i>
                                <span class="number">{{App\Models\NotificationHistory::where([['is_read','=','0']])->count()}}</span>
                            </a>
                        </li>
                        <li>
                            <div class="dropdown user-dropdown">
                                <div class="user dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown"
                                     aria-haspopup="true" aria-expanded="false">

                                    @if(\Illuminate\Support\Facades\Auth::guard('partner')->check())
                                        <span>Hi, {{ \Illuminate\Support\Facades\Auth::guard('partner')->user()->name }}</span>
                                    @elseif(\Illuminate\Support\Facades\Auth::guard('referral')->check())
                                        <span>Hi, {{ \Illuminate\Support\Facades\Auth::guard('referral')->user()->name }}</span>
                                    @else
                                        <span>Hi, {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</span>
                                    @endif
                                    <a href="javascript:void(0)">
                                        <i class="las la-user-circle la-3x ml-2"></i>
                                    </a>
                                </div>
                                <div class="dropdown-menu shadow" aria-labelledby="dropdownMenuButton">
                                    @if(\Illuminate\Support\Facades\Auth::guard('partner')->check())
                                        <a class="dropdown-item" href="{{ url('partner/profile') }}"
                                        >Profile</a>
                                        <a class="dropdown-item" href="{{ url('partner/logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                                        >Logout</a>

                                        <form id="logout-form" action="{{ route('partner.logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    @elseif(\Illuminate\Support\Facades\Auth::guard('referral')->check())
                                        <a class="dropdown-item" href="{{ url('referral/profile') }}"
                                        >Profile</a>
                                        <a class="dropdown-item" href="{{ url('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                                        >Logout</a>

                                        <form id="logout-form" action="{{ url('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    @else
                                        @php
                                        $authuser = Auth::user();
                                        @endphp
                                        <a class="dropdown-item" href="{{ route('clinician.profile',['id' => $authuser->id]) }}"
                                        >Profile</a>
                                        <a class="dropdown-item" href="{{ url('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                                        >Logout</a>

                                        <form id="logout-form" action="{{ url('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    @endif
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
        <!-- Modal For Med Profile Start -->
        @if (\Request::is('patient-details/*'))
        <div class="modal" tabindex="-1" id="patientMedicateInfo">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Patient Medication Info</h5>
                                <button type="button" class="btn btn-outline-green ml-2">Add New</button>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group">
                                                <label for="status" class="label">Status</label>
                                                <div class="d-flex">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="new" name="customRadio" class="custom-control-input">
                                                        <label class="custom-control-label" for="new">New</label>
                                                    </div>
                                                    <div class="custom-control custom-radio ml-2">
                                                        <input type="radio" id="existing" name="customRadio" class="custom-control-input">
                                                        <label class="custom-control-label" for="existing">Existing</label>
                                                    </div>
                                                </div>
                                                <!-- <small id="usernameHelp" class="form-text text-muted mt-2">Assistive Text</small> -->
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <label for="medication" class="label">Medication</label>
                                            <input type="text" class="form-control form-control-lg" id="medication" name="medication"
                                                   aria-describedby="medicationHelp">
                                        </div>
                                        <div class="col-12 col-sm-4">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12 col-sm-4">
                                            <label for="dose" class="label">Dose</label>
                                            <select class="form-control" name="dose" id="dose">
                                                <option value="Select">Select</option>
                                            </select>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <label for="form" class="label">Form</label>
                                            <select class="form-control" name="form" id="form">
                                                <option value="Select">Select</option>
                                            </select>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <label for="route" class="label">Route</label>
                                            <select class="form-control" name="route" id="route">
                                                <option value="Select">Select</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12 col-sm-4">
                                            <label for="amount2" class="label">Amount</label>
                                            <input type="text" class="form-control form-control-lg" id="amount2" name="amount2"
                                                   aria-describedby="amountHelp2">
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <label for="class" class="label">Class</label>
                                            <input type="text" class="form-control form-control-lg" id="class" name="class"
                                                   aria-describedby="classHelp">
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <label for="frequency" class="label">Frequency</label>
                                            <select class="form-control" name="frequency" id="frequency">
                                                <option value="Select">Select</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12 col-sm-4">
                                            <label for="startdate" class="label">Start Date</label>
                                            <input type="text" class="form-control form-control-lg" id="startdate" name="startdate"
                                                   aria-describedby="startdateHelp">
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <label for="orderdate" class="label">Order Date</label>
                                            <input type="text" class="form-control form-control-lg" id="orderdate" name="orderdate"
                                                   aria-describedby="orderdateHelp">
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <label for="taughtdate" class="label">Taught Date</label>
                                            <input type="text" class="form-control form-control-lg" id="taughtdate" name="taughtdate"
                                                   aria-describedby="taughtdateHelp">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12 col-sm-4">
                                            <label for="discontinuedate" class="label">Discontinue Date</label>
                                            <input type="text" class="form-control form-control-lg" id="discontinuedate"
                                                   name="discontinuedate" aria-describedby="discontinuedateHelp">
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <label for="discountinueorderdate" class="label">Discontinue Order Date</label>
                                            <input type="text" class="form-control form-control-lg" id="discountinueorderdate"
                                                   name="discountinueorderdate" aria-describedby="discountinueorderdateHelp">
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <label for="preferredPharmacy" class="label">Preferred Pharmacy</label>
                                            <select class="form-control" name="preferredPharmacy" id="preferredPharmacy">
                                                <option value="Select">Select</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="comment" class="label">Comment</label>
                                    <textarea class="form-control" id="comment" name="comment" cols="30" rows="5"></textarea>
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox mb-3">
                                        <input type="checkbox" id="customCheckbox1" name="customCheckbox" class="custom-control-input">
                                        <label class="custom-control-label" for="customCheckbox1">Include new medication in the MD
                                            Order</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" id="customCheckbox2" name="customCheckbox" class="custom-control-input">
                                        <label class="custom-control-label" for="customCheckbox2">Create an interim order for the new
                                            medication</label>
                                    </div>
                                </div>
                                <div>
                                    Note: The 'Include New Medication in the MD Order' checkbox will add the medication in 'New' MD
                                    only.
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-gray mr-3" data-dismiss="modal">Save</button>
                                <button type="button" class="btn btn-outline-green">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
        @endif
        <!-- Modal For Med Profile End -->
        <div class="modal" id="roadl-request-modal" tabindex="-1" style="top: 80px !important;" >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><u>RoadL Request (COVID-19)</u></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closeReferralPopup()">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="broadcast_form" >
                            <table class="table table-borderless table-sm patientTable shadow">
                                <thead>
                                    <tr class="table-active">
                                        <td>
                                            RoadL Request:
                                        </td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="p-0">
                                            <table class="table table-borderless table-sm m-0">
                                                <tbody>
                                                    <tr>
                                                        <td colspan="4">
                                                            <table style="width: 100%;">
                                                                <tbody>
                                                            <tr>
                                                                <td style="width: 30%;" class="text-right border-0">
                                                                    Select Role :
                                                                </td>
                                                                <td style="width: 70%;" class="border-0">
                                                                    <input type="hidden" id="patient_id" name="patient_id" class="input-skin">
                                                                    <select onchange="getClinicianList(this.value)" name="type_id" id="type_id" class="input-small-skin select2" tabindex="0" aria-hidden="false">
                                                                    <!--BY AJAX-->
                                                                    </select>
                                                                </td>
                                                            </tr></tbody></table>
                                                        </td>
                                                    </tr>
                                                    <tr id="clinician_role_list_tr" style="display: none;">
                                                        <td colspan="4">
                                                            <table style="width: 100%;">
                                                                <tbody>
                                                            <tr>
                                                                <td style="width: 30%;" class="text-right border-0">
                                                                    Select RN/NP :
                                                                </td>
                                                                <td style="width: 70%;" class="border-0">
                                                                    <select name="clinician_list_id" id="clinician_list_id" class="input-small-skin select2" tabindex="0" aria-hidden="false">
                                                                            
                                                                    </select>
                                                                </td>
                                                            </tr></tbody></table>
                                                        </td>
                                                    </tr>
                                                    <tr id="test_name_list_tr" style="display: none;">
                                                        <td colspan="4">
                                                            <table style="width: 100%;">
                                                                <tbody>
                                                                    <tr>
                                                                        <td style="width: 30%;" class="text-right border-0">
                                                                            Test Name :
                                                                        </td>
                                                                        <td style="width: 70%;" class="border-0">
                                                                        <select onchange="getSubNameList()" name="test_name[]" class="input-small-skin js-example-basic-multiple" multiple>
                                                                        </select>
                                                                      
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr id="sub_test_name_list_tr" style="display: none;">
                                                        <td colspan="4">
                                                            <table style="width: 100%;">
                                                                <tbody>
                                                                    <tr>
                                                                        <td style="width: 30%;" class="text-right border-0">
                                                                            Sub Test Name :
                                                                        </td>
                                                                        <td style="width: 70%;" class="border-0">
                                                                            <select name="sub_test_name[]" class="input-small-skin sub_test_id" multiple>
                                                                               
                                                                            </select>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    
                                                    <input type="hidden" class="input-small-skin" name="patient_roles_name" id="patient_roles_name" value="">
                                                                
                                                    <tr>
                                                        <td colspan="4">
                                                            <table style="width: 100%;">
                                                                <tbody>
                                                            <tr>
                                                                <td style="width: 30%;" class="text-right border-0">
                                                                        Note :
                                                                </td>
                                                                <td style="width: 70%;" class="border-0">
                                                                    <textarea class="input-small-skin" name="reason" placeholder="Enter note (Optional)" id="" cols="30" rows="5" spellcheck="false"></textarea>
                                                                </td>
                                                            </tr></tbody></table>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="d-flex mb-4">
                                <input type="button" value="Submit" class="btn btn--submit btn-lg" onclick="onAppointmentBroadCastSubmit(this)">
                                <input type="reset" value="Reset" class="btn btn--reset btn-lg ml-4">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade messageViewModel" id="modal" role="dialog"></div>

        @yield('modal')
    </section>
</section>

@yield('app-video')
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/moment.min.js') }}"></script>
    <script src="{{ asset('assets/js/daterangepicker.min.js') }}"></script>
    <script src="{{ asset('assets/js/tail.select-full.min.js') }}"></script>
    <script src="{{ asset('assets/js/app.common.min.js') }}"></script>

    <script>
        var base_url = $('#base_url').val();
        var socket_url = '{{ env("SOCKET_IO_URL") }}';
        window.socket_url = '{{ env("SOCKET_IO_URL") }}';
        window.laravel_echo_port='{{env("LARAVEL_ECHO_PORT")}}';
        var save_token_url = '{{ route("save-token") }}';
    </script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script> -->
    <script src="{{ asset('assets/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/js/additional-methods.js') }}"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

    <script src="{{ asset('assets/js/sidebar.js') }}"></script>
    <script src="{{ asset('js/toastr.js') }}"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>
    <script src="https://gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/js/dataTables.checkboxes.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('assets/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/js/dataTables.fixedColumns.min.js') }}"></script>
    <script src="{{ asset('assets/js/apexcharts.js') }}"></script>
    <script src="https://www.gstatic.com/firebasejs/4.1.3/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/4.1.3/firebase-database.js"></script>
    <script src="https://www.gstatic.com/firebasejs/4.1.3/firebase-messaging.js"></script>
    <script src="{{ asset('assets/js/app.clinician.patient.details.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script src="{{ asset('js/clincian/app.clinician.broadcast.js?ver=2') }}"></script>
    <script src="{{ asset('js/global.js') }}"></script>

@stack('scripts')
</body>
</html>
