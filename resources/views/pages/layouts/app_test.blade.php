<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link rel="stylesheet" href="{{ asset('new/assets/css/fonts/Montserrat.css') }}">
    <link rel="stylesheet" href="{{ asset('new/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('new/assets/css/line-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('new/assets/css/tail.select-teal.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('new/assets/css/sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('new/assets/css/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('new/assets/css/bootstrap-datepicker3.css') }}">
    <link rel="stylesheet" href="{{ asset('new/assets/css/daterangepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('new/assets/css/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('new/assets/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('new/assets/css/style.min.css') }}">
    <link rel="stylesheet" href="{{ asset('new/assets/css/responsive.min.css') }}">

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
                    <h5 class="modal-title">Referral Request</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closeReferralPopup()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="broadcast_form" >
                        <div class="form-group">
                            <div class="row">
                                <div class="col-12">
                                    <input type="hidden" id="patient_id" name="patient_id" class="input-skin" >
                                    <select name="type_id" id="type_id">
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
    <!-- Add Permission Start Here -->
    <div class="permissonControl">
        <a href="javascript:void(0)" class="permission_icon _addpermission" id="addPatientToggle">
            <img src="{{ asset('new/assets/img/icons/permission_icon.svg') }}" class="active" alt="">
            <img src="{{ asset('new/assets/img/icons/permission_icon_hover.svg') }}" class="hover" alt="">
        </a>
        <a href="javascript:void(0)" class="permission_icon mt-2" id="doralPatientToggle">
            <img src="{{ asset('new/assets/img/icons/search_patients.svg') }}" class="active" alt="">
            <img src="{{ asset('new/assets/img/icons/search_patients_hover.svg') }}" class="hover" alt="">
        </a>
    </div>
    <section id="slider" class="addPermission _addPermission slideout d-none">
        <div class="permissonControl _open">
            <a href="javascript:void(0)" class="close_menu_icon close_add_permission">
                <img src="{{ asset('new/assets/img/icons/closed_icon.svg') }}" alt="">
            </a>
            <a href="javascript:void(0)" class="permission_icon mt-2 _open_search_patient">
                <img src="{{ asset('new/assets/img/icons/search_patients.svg') }}" class="active" alt="">
                <img src="{{ asset('new/assets/img/icons/search_patients_hover.svg') }}" class="hover" alt="">
            </a>
        </div>
        <div class="p-4 custom-shadow custom-border bg-white">
            <div class="_title4 mb-3"><span>Add</span> Permission</div>
            <p class="text-justify">It is a long established fact that a reader will be
                distracted by the readable
                content of a page when looking at its layout. </p>
            <div class="row mt-4 nogutter">
                <div class="col-12 col-sm-9">
                    <div class="searchItem">
                        <input type="search" class="search--control" placeholder="Global Search">
                        <i class="icon la la-search"></i>
                    </div>
                </div>
                <div class="col-12 col-sm-3">
                    <button class="btn btn--search btn-lg">Search</button>
                </div>
            </div>
            <div class="form-group mt-4">
                <div class="row">
                    <div class="col-12">
                        <label for="selectRole" class="label-custom"><span>Select</span>
                            Role</label>
                        <!-- <input type="text" class="input-skin" id="selectRole1"> -->
                        <span class="autocomplete-selectrole"></span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-12">
                        <label for="permission" class="label-custom">Permission</label>
                        <!-- <input type="text" class="input-skin multi-select" id="permission"> -->
                        <span class="autocomplete-permission"></span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <a href="javascript:void(0)" class="addSubpermission">
                    <!-- <i class="las la-plus-circle icon mr-2"></i> -->
                    <img src="../assets/img/icons/add_permission.svg" class="inactive mr-2" alt="">
                    <img src="../assets/img/icons/add_permission_active.svg" class="active mr-2" alt="">
                    Add Subpermission
                </a>
            </div>
            <div class="_subpermission">
                <div class="sleft">
                    <label>
                        <input type="checkbox" id="checkAll">
                        <span></span>
                    </label>
                </div>
                <div class="rleft">
                    <div class="symbol">
                        <div class="okay-green">
                            <i class="las la-check"></i>
                        </div>
                    </div>
                    <input type="text" placeholder="Patient Profile........" class="input-custom-skin input-green"
                           id="selectRole">
                    <a href="javascript:void(0)" class="trash">
                        <i class="las la-trash"></i>
                    </a>
                </div>
            </div>
            <div class="_subpermission mt-3">
                <div class="sleft">
                    <label>
                        <input type="checkbox" id="checkAll">
                        <span></span>
                    </label>
                </div>
                <div class="rleft">
                    <div class="symbol">
                        <div class="okay-orange">
                            <i class="las la-check"></i>
                        </div>
                    </div>
                    <input type="text" placeholder="Patient Profile........" class="input-custom-skin input-orange"
                           id="selectRole2">
                    <a href="javascript:void(0)" class="trash">
                        <i class="las la-trash"></i>
                    </a>
                </div>
            </div>
            <div class="_subpermission mt-3">
                <div class="sleft">
                    <label>
                        <input type="checkbox" id="checkAll">
                        <span></span>
                    </label>
                </div>
                <div class="rleft">
                    <div class="symbol">
                        <div class="okay-purple">
                            <i class="las la-check"></i>
                        </div>
                    </div>
                    <input type="text" placeholder="Patient Profile........" class="input-custom-skin input-purple"
                           id="selectRole3">
                    <a href="javascript:void(0)" class="trash">
                        <i class="las la-trash"></i>
                    </a>
                </div>
            </div>
            <div>
                <div class="d-flex mt-4">
                    <input type="submit" value="Submit" class="btn btn--submit btn-lg">
                    <input type="reset" value="Reset" class="btn btn--reset btn-lg ml-4">
                </div>
            </div>
        </div>
    </section>
    <!-- Add Permission End Here -->
    <!-- Search Doral Patient Start Here -->
    <section id="slider1" class="addPermission doralPatient _searchDoralPatients slideout d-none ">
        <section>
            <div class="permissonControl _open doralOpen">
                <a href="javascript:void(0)" class="close_menu_icon close_search_doral_patient">
                    <img src="{{ asset('new/assets/img/icons/closed_icon.svg') }}" alt="">
                </a>
                <a href="javascript:void(0)" class="permission_icon mt-2 _open_add_permission">
                    <img src="{{ asset('new/assets/img/icons/permission_icon.svg') }}" class="active" alt="">
                    <img src="{{ asset('new/assets/img/icons/permission_icon_hover.svg') }}" class="hover" alt="">
                </a>
            </div>
        </section>
        <section class="p-4 custom-shadow custom-border bg-white">
            <div>
                <div class="_title4 mb-3 color-green">Doral Patient</div>
                <div class="bg-gray">
                    <div class="p-4">
                        <h1 class="_title4">Filter List</h1>
                        <form action="#" class="formCSS mt-4" id="doralPatientSearchForm" novalidate>
                            <div class="f-group">
                                <div class="f-column">
                                    <input type="text" class="input-skin" placeholder="Patient Name" name="patientName"
                                           id="patientName" required>
                                    <div class="invalid-feedback">
                                        Please provide a patient name.
                                    </div>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="f-column">
                                    <input type="text" class="input-skin" placeholder="123-45-6789" name="ssn" id="ssn"
                                           onkeypress="return isNumber(event)" onBlur="SSNumber('ssn')" required>
                                    <div class="invalid-feedback">
                                        Please provide a SSN No.
                                    </div>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="f-column">
                                    <input type="text" class="input-skin dob" name="dob" placeholder="DOB" value=""
                                           id="dob" required>
                                    <div class="invalid-feedback">
                                        Please provide a DOB.
                                    </div>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="f-column">
                                    <select class="input-skin" name="city" id="city" required>
                                        <option value="">Select City</option>
                                        <option value="City 1">City 1</option>
                                        <option value="City 2">City 2</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Please select city.
                                    </div>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="f-column">
                                    <select class="input-skin" name="state" id="state" required>
                                        <option value="">Select State</option>
                                        <option value="State 1">State 1</option>
                                        <option value="State 2">State 2</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Please select state.
                                    </div>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="f-column d-flex align-items-center">
                                    <label>
                                        <input class="with-gap" name="group3" type="radio" checked />
                                        <span>Male</span>
                                    </label>
                                    <label>
                                        <input class="with-gap" name="group3" type="radio" checked />
                                        <span>Female</span>
                                    </label>
                                </div>
                            </div>
                            <div class="f-group mt-3">
                                <div class="f-column">
                                    <select class="input-skin" name="statuss" id="statuss" required>
                                        <option value="">Select Status</option>
                                        <option value="Status 1">Status 1</option>
                                        <option value="Status 2">Status 2</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Please select status.
                                    </div>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="f-column">
                                    <select class="input-skin" name="servicess" id="servicess" required>
                                        <option value="">Select Services</option>
                                        <option value="Services 1">Services 1</option>
                                        <option value="Services 2">Services 2</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Please select service.
                                    </div>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="f-column">
                                    <input type="text" class="input-skin" placeholder="Zip Code"
                                           onkeypress="return isNumber(event)" value="" name="zipp" id="zipp" required>
                                    <div class="invalid-feedback">
                                        Please provide a zip code.
                                    </div>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="f-column">
                                    <input type="text" class="input-skin" placeholder="Other" name="others" id="others"
                                           required>
                                    <div class="invalid-feedback">
                                        Please enter others.
                                    </div>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="f-column">
                                    <input type="submit" value="Submit" class="btn btn--submit-dark btn-lg">
                                </div>
                                <div class="f-column">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <section class="mt-3 custom-shadow custom-border bg-white">
            <div class="p-4">
                <div class="scrollbar scrollbar8">
                    <table class="table " style="width: 100%;" id="patientResult">
                        <thead>
                        <tr>
                            <th>
                                <label>
                                    <input type="checkbox" class="selectall" />
                                    <span></span>
                                </label>
                            </th>
                            <th width="2%">Sr.No</th>
                            <th width="15%">Patient Name</th>
                            <th width="10%">SSN No.</th>
                            <th width="8%">DOB</th>
                            <th width="8%">Service Name</th>
                            <th width="8%">Gender</th>
                            <th width="10%">Address</th>
                            <th width="8%">City-State</th>
                            <th width="8%">Zip Code</th>
                            <th width="23%">
                                <div class="d-flex justify-content-end">
                                    <button type="button" class="btn btn--active btn--fixed--w mr-2">Active</button>
                                    <button type="button" class="btn btn--InActive btn--fixed--w">InActive</button>
                                </div>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                <label>
                                    <input type="checkbox" />
                                    <span></span>
                                </label>
                            </td>
                            <td>1</td>
                            <td>John Willams Doe</td>
                            <td>xxx-xx-1515</td>
                            <td>06-17-1995</td>
                            <td>Value Base Care</td>
                            <td>Male</td>
                            <td>1797 Pitkin Avenue</td>
                            <td>Brooklyn-NY</td>
                            <td>1212</td>
                            <td>
                                <div class="d-flex justify-content-end">
                                    <button type="button" class="btn btn--active btn--fixed--w mr-2">Active</button>
                                    <button type="button" class="btn btn--call mr-2">
                                        <img src="../assets/img/icons/call.svg" class="actives" alt="" srcset="">
                                        <img src="../assets/img/icons/active_call.svg" class="inactives" alt=""
                                             srcset="">
                                    </button>
                                    <button type="button" class="btn btn--video mr-2">
                                        <img src="../assets/img/icons/video.svg" class="actives" alt="" srcset="">
                                        <img src="../assets/img/icons/active_video.svg" class="inactives" alt=""
                                             srcset=""></button>
                                    <button type="button" class="btn btn--dark">Rodal Start</button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>
                                    <input type="checkbox" />
                                    <span></span>
                                </label>
                            </td>
                            <td>2</td>
                            <td>John Willams Doe</td>
                            <td>xxx-xx-1515</td>
                            <td>06-17-1995</td>
                            <td>Value Base Care</td>
                            <td>Male</td>
                            <td>1797 Pitkin Avenue</td>
                            <td>Brooklyn-NY</td>
                            <td>1212</td>
                            <td>
                                <div class="d-flex justify-content-end">
                                    <button type="button"
                                            class="btn btn--InActive btn--fixed--w mr-2">InActive</button>
                                    <button type="button" class="btn btn--call mr-2">
                                        <img src="../assets/img/icons/call.svg" class="actives" alt="" srcset="">
                                        <img src="../assets/img/icons/active_call.svg" class="inactives" alt=""
                                             srcset="">
                                    </button>
                                    <button type="button" class="btn btn--video mr-2">
                                        <img src="../assets/img/icons/video.svg" class="actives" alt="" srcset="">
                                        <img src="../assets/img/icons/active_video.svg" class="inactives" alt=""
                                             srcset=""></button>
                                    <button type="button" class="btn btn--dark">Rodal Start</button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>
                                    <input type="checkbox" />
                                    <span></span>
                                </label>
                            </td>
                            <td>3</td>
                            <td>John Willams Doe</td>
                            <td>xxx-xx-1515</td>
                            <td>06-17-1995</td>
                            <td>Value Base Care</td>
                            <td>Male</td>
                            <td>1797 Pitkin Avenue</td>
                            <td>Brooklyn-NY</td>
                            <td>1212</td>
                            <td>
                                <div class="d-flex justify-content-end">
                                    <button type="button" class="btn btn--active btn--fixed--w mr-2">Active</button>
                                    <button type="button" class="btn btn--call mr-2">
                                        <img src="../assets/img/icons/call.svg" class="actives" alt="" srcset="">
                                        <img src="../assets/img/icons/active_call.svg" class="inactives" alt=""
                                             srcset="">
                                    </button>
                                    <button type="button" class="btn btn--video mr-2">
                                        <img src="../assets/img/icons/video.svg" class="actives" alt="" srcset="">
                                        <img src="../assets/img/icons/active_video.svg" class="inactives" alt=""
                                             srcset=""></button>
                                    <button type="button" class="btn btn--dark">Rodal Start</button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>
                                    <input type="checkbox" />
                                    <span></span>
                                </label>
                            </td>
                            <td>4</td>
                            <td>John Willams Doe</td>
                            <td>xxx-xx-1515</td>
                            <td>06-17-1995</td>
                            <td>Value Base Care</td>
                            <td>Male</td>
                            <td>1797 Pitkin Avenue</td>
                            <td>Brooklyn-NY</td>
                            <td>1212</td>
                            <td>
                                <div class="d-flex justify-content-end">
                                    <button type="button"
                                            class="btn btn--InActive btn--fixed--w mr-2">InActive</button>
                                    <button type="button" class="btn btn--call mr-2">
                                        <img src="../assets/img/icons/call.svg" class="actives" alt="" srcset="">
                                        <img src="../assets/img/icons/active_call.svg" class="inactives" alt=""
                                             srcset="">
                                    </button>
                                    <button type="button" class="btn btn--video mr-2">
                                        <img src="../assets/img/icons/video.svg" class="actives" alt="" srcset="">
                                        <img src="../assets/img/icons/active_video.svg" class="inactives" alt=""
                                             srcset=""></button>
                                    <button type="button" class="btn btn--dark">Rodal Start</button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>
                                    <input type="checkbox" />
                                    <span></span>
                                </label>
                            </td>
                            <td>5</td>
                            <td>John Willams Doe</td>
                            <td>xxx-xx-1515</td>
                            <td>06-17-1995</td>
                            <td>Value Base Care</td>
                            <td>Male</td>
                            <td>1797 Pitkin Avenue</td>
                            <td>Brooklyn-NY</td>
                            <td>1212</td>
                            <td>
                                <div class="d-flex justify-content-end">
                                    <button type="button"
                                            class="btn btn--InActive btn--fixed--w mr-2">InActive</button>
                                    <button type="button" class="btn btn--call mr-2">
                                        <img src="../assets/img/icons/call.svg" class="actives" alt="" srcset="">
                                        <img src="../assets/img/icons/active_call.svg" class="inactives" alt=""
                                             srcset="">
                                    </button>
                                    <button type="button" class="btn btn--video mr-2">
                                        <img src="../assets/img/icons/video.svg" class="actives" alt="" srcset="">
                                        <img src="../assets/img/icons/active_video.svg" class="inactives" alt=""
                                             srcset=""></button>
                                    <button type="button" class="btn btn--dark">Rodal Start</button>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </section>
    <!-- Search Doral Patient End Here -->
@yield('app-video')
    <!-- Search Doral Patient End Here -->
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
        var save_token_url = '{{ route("save-token") }}';
    </script>
    <script src="{{ asset('assets/js/sidebar.js') }}"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

    <script src="{{ asset('assets/js/sidebar.js') }}"></script>
    <script src="{{ asset('js/toastr.js') }}"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('assets/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/js/buttons.print.min.js') }}"></script>

    <script src="{{ asset('new/assets/js/apexcharts.js') }}"></script>
    <script src="{{ asset('new/assets/js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('new/assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('new/assets/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('new/assets/js/validation.min.js') }}"></script>
    <script src="{{ asset('new/assets/js/selectpure.min.js') }}"></script>

{{--    Firebase Script --}}
    <script src="https://www.gstatic.com/firebasejs/4.1.3/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/4.1.3/firebase-database.js"></script>
    <script src="https://www.gstatic.com/firebasejs/4.1.3/firebase-messaging.js"></script>
    <script src="{{ asset('js/global.js') }}"></script>
    <script src="{{ asset('js/clincian/app.clinician.broadcast.js') }}"></script>

    <script>
        $('#loader-wrapper').hide();
        var _autocomplete = new SelectPure(".autocomplete-selectrole", {
            options: [
                {
                    label: "Admin",
                    value: "admin",
                },
                {
                    label: "Clinician",
                    value: "clinician",
                },
                {
                    label: "Coordinator",
                    value: "coordinator",
                },
                {
                    label: "Partners",
                    value: "partners",
                },
                {
                    label: "Patient",
                    value: "patient",
                },
                {
                    label: "Referral",
                    value: "referral",
                },
                {
                    label: "Supervisor",
                    value: "supervisor",
                }
            ],
            value: ["admin"],
            multiple: true,
            autocomplete: true,
            icon: "las la-times",
            onChange: value => { console.log(value); },
            classNames: {
                select: "select-pure__select",
                dropdownShown: "select-pure__select--opened",
                multiselect: "select-pure__select--multiple",
                label: "select-pure__label",
                placeholder: "select-pure__placeholder",
                dropdown: "select-pure__options",
                option: "select-pure__option",
                autocompleteInput: "select-pure__autocomplete",
                selectedLabel: "select-pure__selected-label",
                selectedOption: "select-pure__option--selected",
                placeholderHidden: "select-pure__placeholder--hidden",
                optionHidden: "select-pure__option--hidden",
            }
        });
        var autocomplete = new SelectPure(".autocomplete-permission", {
            options: [
                {
                    label: "Add",
                    value: "add",
                },
                {
                    label: "Edit",
                    value: "edit",
                },
                {
                    label: "Delete",
                    value: "delete",
                },
                {
                    label: "Update",
                    value: "update",
                },
                {
                    label: "View",
                    value: "view",
                }
            ],
            value: ["add"],
            multiple: true,
            autocomplete: true,
            icon: "las la-times",
            onChange: value => { console.log(value); },
            classNames: {
                select: "select-pure__select",
                dropdownShown: "select-pure__select--opened",
                multiselect: "select-pure__select--multiple",
                label: "select-pure__label",
                placeholder: "select-pure__placeholder",
                dropdown: "select-pure__options",
                option: "select-pure__option",
                autocompleteInput: "select-pure__autocomplete",
                selectedLabel: "select-pure__selected-label",
                selectedOption: "select-pure__option--selected",
                placeholderHidden: "select-pure__placeholder--hidden",
                optionHidden: "select-pure__option--hidden",
            }
        });
        var resetAutocomplete = function () {
            _autocomplete.reset();
            autocomplete.reset();
        };
        var patientName = $('[name="patientName"]'),
            ssn = $('[name="ssn"]'),
            dobs = $('[name="dob"]'),
            city = $('[name="city"]'),
            state = $('[name="state"]'),
            statuss = $('[name="statuss"]'),
            servicess = $('[name="servicess"]'),
            zipp = $('[name="zipp"]'),
            others = $('[name="others"]')
        patientName.on('keyup', function () {
            if ("" == patientName.val()) {
                patientName.addClass('is-invalid')
                patientName.removeClass('is-valid')
            } else {
                patientName.removeClass('is-invalid')
                patientName.addClass('is-valid')
            }
        })
        ssn.on('keyup', function () {
            if ("" == ssn.val()) {
                ssn.addClass('is-invalid')
                ssn.removeClass('is-valid')
            } else {
                ssn.removeClass('is-invalid')
                ssn.addClass('is-valid')
            }
        })
        dobs.on('keyup', function () {
            if ("" == dobs.val()) {
                dobs.addClass('is-invalid')
                dobs.removeClass('is-valid')
            } else {
                dobs.removeClass('is-invalid')
                dobs.addClass('is-valid')
            }
        })
        dobs.on('change', function () {
            if ("" == dobs.val()) {
                dobs.addClass('is-invalid')
                dobs.removeClass('is-valid')
            } else {
                dobs.removeClass('is-invalid')
                dobs.addClass('is-valid')
            }
        })
        city.on('change', function () {
            if ("" == city.val()) {
                city.addClass('is-invalid')
                city.removeClass('is-valid')
            } else {
                city.removeClass('is-invalid')
                city.addClass('is-valid')
            }
        })
        state.on('change', function () {
            if ("" == state.val()) {
                state.addClass('is-invalid')
                state.removeClass('is-valid')
            } else {
                state.removeClass('is-invalid')
                state.addClass('is-valid')
            }
        })
        statuss.on('change', function () {
            if ("" == statuss.val()) {
                statuss.addClass('is-invalid')
                statuss.removeClass('is-valid')
            } else {
                statuss.removeClass('is-invalid')
                statuss.addClass('is-valid')
            }
        })
        servicess.on('change', function () {
            if ("" == servicess.val()) {
                servicess.addClass('is-invalid')
                servicess.removeClass('is-valid')
            } else {
                servicess.removeClass('is-invalid')
                servicess.addClass('is-valid')
            }
        })
        zipp.on('keyup', function () {
            if ("" == zipp.val()) {
                zipp.addClass('is-invalid')
                zipp.removeClass('is-valid')
            } else {
                zipp.removeClass('is-invalid')
                zipp.addClass('is-valid')
            }
        })
        others.on('keyup', function () {
            if ("" == others.val()) {
                others.addClass('is-invalid')
                others.removeClass('is-valid')
            } else {
                others.removeClass('is-invalid')
                others.addClass('is-valid')
            }
        })
        $("#doralPatientSearchForm").submit(function (event) {
            event.preventDefault()
            if ("" == patientName.val()) {
                patientName.addClass('is-invalid')
            }
            if ("" == ssn.val()) {
                ssn.addClass('is-invalid')
            }
            if ("" == dobs.val()) {
                dobs.addClass('is-invalid')
            }
            if ("" == city.val()) {
                city.addClass('is-invalid')
            }
            if ("" == state.val()) {
                state.addClass('is-invalid')
            }
            if ("" == statuss.val()) {
                statuss.addClass('is-invalid')
            }
            if ("" == servicess.val()) {
                servicess.addClass('is-invalid')
            }
            if ("" == zipp.val()) {
                zipp.addClass('is-invalid')
            }
            if ("" == others.val()) {
                others.addClass('is-invalid')
            }
            if ("" != dobs.val()) {
                dobs.removeClass('is-invalid')
                dobs.addClass('is-valid')
            }
        });
        var datepicker = $('#datepicker'),
            addPatientToggle = $('#addPatientToggle'),
            _addPermission = $('._addPermission'),
            close_add_permission = $('.close_add_permission'),
            doralPatientToggle = $('#doralPatientToggle'),
            _searchDoralPatients = $('._searchDoralPatients'),
            close_search_doral_patient = $('.close_search_doral_patient'),
            _open_search_patient = $('._open_search_patient'),
            _open_add_permission = $('._open_add_permission');
        $('#patientResult').DataTable({
            searching: false,
            ordering: false
        });
        $(".selectall").click(function () {
            $('#patientResult td input:checkbox').not(this).prop('checked', this.checked);
        });
        datepicker.datepicker();
        datepicker.on('changeDate', function () {
            $('#my_hidden_input').val(
                $('#datepicker').datepicker('getFormattedDate')
            );
        });
        $('input[name="dob"]').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            autoUpdateInput: false,
            minYear: 1901,
            maxYear: parseInt(moment().format('YYYY'), 10),
        }, function (start, end, label) {
            $('input[name="dob"]').on('apply.daterangepicker', function (ev, picker) {
                $(this).val(picker.startDate.format('MM/DD/YYYY'));
                $('input[name="dob"]').attr("value", picker.startDate.format('MM/DD/YYYY'));
            });
        });
        // Add Permission Show/Hide Script Start Here
        addPatientToggle.on('click', function () {
            _addPermission.removeClass('d-none')
            _addPermission.removeClass('slidein');
            _addPermission.addClass('slideout');
        })
        close_add_permission.on('click', function () {
            _addPermission.addClass('slidein');
            _addPermission.removeClass('slideout');
        })
        _open_search_patient.on('click', function () {
            _addPermission.addClass('slidein');
            _addPermission.removeClass('slideout');
            setTimeout(() => {
                _searchDoralPatients.removeClass('d-none')
                _searchDoralPatients.removeClass('slidein');
                _searchDoralPatients.addClass('slideout');
            }, 1000);
        })
        // Add Permission Show/Hide Script Start Here
        // Search Doral Patient Show/Hide Script Start Here
        doralPatientToggle.on('click', function () {
            _searchDoralPatients.removeClass('d-none')
            _searchDoralPatients.removeClass('slidein');
            _searchDoralPatients.addClass('slideout');
        })
        close_search_doral_patient.on('click', function () {
            _searchDoralPatients.addClass('slidein');
            _searchDoralPatients.removeClass('slideout');
        })
        _open_add_permission.on('click', function () {
            _searchDoralPatients.addClass('slidein');
            _searchDoralPatients.removeClass('slideout');
            setTimeout(() => {
                _addPermission.removeClass('d-none')
                _addPermission.removeClass('slidein');
                _addPermission.addClass('slideout');
            }, 1000);
        })
        // Search Doral Patient Show/Hide Script End Here
        // Global Setting Start
        window.Apex = {
            chart: {
                height: '100%',
                fontFamily: 'Montserrat,sans-serif'
            },
            dataLabels: {
                enabled: false
            },
            legend: {
                show: false
            },
            tooltip: {
                theme: 'dark'
            }
        }
        // Global Setting End
        // Total Total Lab Request Chart Start
        var _totalLabRequest = {
            series: [{
                name: '',
                data: [5, 50, 5, 80, 8, 1, 100]
            }],
            colors: ['#467509', '#467509', '#467509', '#467509', '#467509', '#467509', '#467509'],
            chart: {
                type: 'area'
            },
            stroke: {
                curve: 'smooth'
            },
            xaxis: {
                type: 'datetime',
                categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"],
                labels: {
                    datetimeFormatter: {
                        year: 'yyyy',
                        month: 'MMM \'yy',
                        day: 'dd MMM',
                        hour: 'HH:mm'
                    }
                }
            },
            tooltip: {
                x: {
                    format: 'dd/MM/yy HH:mm'
                },
            },
        };
        var chart = new ApexCharts(document.querySelector("#TotalLabRequestChart"), _totalLabRequest);
        chart.render();
        // Total Total Lab Request End Start
        // DME Request Chart Start
        var _DMERequest = {
            series: [{
                name: '',
                data: [5, 50, 5, 80, 8, 1, 100]
            }],
            colors: ['#FF9920', '#FF9920', '#467509', '#467509', '#467509', '#467509', '#467509'],
            chart: {
                type: 'area'
            },
            stroke: {
                curve: 'smooth'
            },
            xaxis: {
                type: 'datetime',
                categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"],
                labels: {
                    datetimeFormatter: {
                        year: 'yyyy',
                        month: 'MMM \'yy',
                        day: 'dd MMM',
                        hour: 'HH:mm'
                    }
                }
            },
            tooltip: {
                x: {
                    format: 'dd/MM/yy HH:mm'
                },
            },
        };
        var chart1 = new ApexCharts(document.querySelector("#DMERequestChart"), _DMERequest);
        chart1.render();
        // DME Request End Start
        // Wound Care Request Chart Start
        var _WoundcareRequestChart = {
            series: [{
                name: '',
                data: [5, 50, 5, 80, 8, 1, 100]
            }],
            colors: ['#FB20FF', '#FB20FF', '#FB20FF', '#FB20FF', '#FB20FF', '#FB20FF', '#FB20FF'],
            chart: {
                type: 'area'
            },
            stroke: {
                curve: 'smooth'
            },
            xaxis: {
                type: 'datetime',
                categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"],
                labels: {
                    datetimeFormatter: {
                        year: 'yyyy',
                        month: 'MMM \'yy',
                        day: 'dd MMM',
                        hour: 'HH:mm'
                    }
                }
            },
            tooltip: {
                x: {
                    format: 'dd/MM/yy HH:mm'
                },
            },
        };
        var chart2 = new ApexCharts(document.querySelector("#WoundcareRequestChart"), _WoundcareRequestChart);
        chart2.render();
        // Wound Care Request End Start
        // Home Infusion Request Chart Start
        var _HomeInfusionRequestChart = {
            series: [{
                name: '',
                data: [5, 50, 5, 80, 8, 1, 100]
            }],
            colors: ['#2EC2D0', '#2EC2D0', '#2EC2D0', '#2EC2D0', '#2EC2D0', '#2EC2D0', '#2EC2D0'],
            chart: {
                type: 'area'
            },
            stroke: {
                curve: 'smooth'
            },
            xaxis: {
                type: 'datetime',
                categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"],
                labels: {
                    datetimeFormatter: {
                        year: 'yyyy',
                        month: 'MMM \'yy',
                        day: 'dd MMM',
                        hour: 'HH:mm'
                    }
                }
            },
            tooltip: {
                x: {
                    format: 'dd/MM/yy HH:mm'
                },
            },
        };
        var chart3 = new ApexCharts(document.querySelector("#HomeInfusionRequestChart"), _HomeInfusionRequestChart);
        chart3.render();
        // Home Infusion Request End Start
        // Home Oxygen Request Chart Start
        var _HomeOxygenRequestChart = {
            series: [{
                name: '',
                data: [5, 50, 5, 80, 8, 1, 100]
            }],
            colors: ['#025B63', '#025B63', '#025B63', '#025B63', '#025B63', '#025B63', '#025B63'],
            chart: {
                type: 'area'
            },
            stroke: {
                curve: 'smooth'
            },
            xaxis: {
                type: 'datetime',
                categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"],
                labels: {
                    datetimeFormatter: {
                        year: 'yyyy',
                        month: 'MMM \'yy',
                        day: 'dd MMM',
                        hour: 'HH:mm'
                    }
                }
            },
            tooltip: {
                x: {
                    format: 'dd/MM/yy HH:mm'
                },
            },
        };
        var chart4 = new ApexCharts(document.querySelector("#HomeOxygenRequestChart"), _HomeOxygenRequestChart);
        chart4.render();
        // Home Oxygen Request End Start
        // CHHA Request Chart Start
        var _CHHARequestChart = {
            series: [{
                name: '',
                data: [5, 50, 5, 80, 8, 1, 100]
            }],
            colors: ['#1665D8', '#1665D8', '#1665D8', '#1665D8', '#1665D8', '#1665D8', '#1665D8'],
            chart: {
                type: 'area'
            },
            stroke: {
                curve: 'smooth'
            },
            xaxis: {
                type: 'datetime',
                categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"],
                labels: {
                    datetimeFormatter: {
                        year: 'yyyy',
                        month: 'MMM \'yy',
                        day: 'dd MMM',
                        hour: 'HH:mm'
                    }
                }
            },
            tooltip: {
                x: {
                    format: 'dd/MM/yy HH:mm'
                },
            },
        };
        var chart5 = new ApexCharts(document.querySelector("#CHHARequestChart"), _CHHARequestChart);
        chart5.render();
        // CHHA Request End Start
        // X-Ray Request Chart Start
        var _XRayRequestChart = {
            series: [{
                name: '',
                data: [5, 50, 5, 80, 8, 1, 100]
            }],
            colors: ['#74C846', '#74C846', '#74C846', '#74C846', '#74C846', '#74C846', '#74C846'],
            chart: {
                type: 'area'
            },
            stroke: {
                curve: 'smooth'
            },
            xaxis: {
                type: 'datetime',
                categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"],
                labels: {
                    datetimeFormatter: {
                        year: 'yyyy',
                        month: 'MMM \'yy',
                        day: 'dd MMM',
                        hour: 'HH:mm'
                    }
                }
            },
            tooltip: {
                x: {
                    format: 'dd/MM/yy HH:mm'
                },
            },
        };
        var chart6 = new ApexCharts(document.querySelector("#XRayRequestChart"), _XRayRequestChart);
        chart6.render();
        // X-Ray Request End Start
        // Lab Request Chart Start
        var _labRequestChart = {
            series: [{
                name: '',
                data: [5, 50, 5, 80, 8, 1, 100]
            }],
            colors: ['#6365B7', '#6365B7', '#6365B7', '#6365B7', '#6365B7', '#6365B7', '#6365B7'],
            chart: {
                type: 'area'
            },
            stroke: {
                curve: 'smooth'
            },
            xaxis: {
                type: 'datetime',
                categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"],
                labels: {
                    datetimeFormatter: {
                        year: 'yyyy',
                        month: 'MMM \'yy',
                        day: 'dd MMM',
                        hour: 'HH:mm'
                    }
                }
            },
            tooltip: {
                x: {
                    format: 'dd/MM/yy HH:mm'
                },
            },
        };
        var chart7 = new ApexCharts(document.querySelector("#labRequestChart"), _labRequestChart);
        chart7.render();
        // Lab Request End Start
        // Homecare Referral Chart Start
        var _HomecareReferralChart = {
            series: [{
                name: '',
                data: [5, 10, 20, 40, 60, 80, 100]
            }],
            colors: ['#7466F0', '#7466F0', '#7466F0', '#7466F0', '#7466F0', '#7466F0', '#7466F0'],
            chart: {
                type: 'area'
            },
            stroke: {
                curve: 'smooth'
            },
            xaxis: {
                type: 'datetime',
                categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"],
                labels: {
                    datetimeFormatter: {
                        year: 'yyyy',
                        month: 'MMM \'yy',
                        day: 'dd MMM',
                        hour: 'HH:mm'
                    }
                }
            },
            tooltip: {
                x: {
                    format: 'dd/MM/yy HH:mm'
                },
            },
        };
        var chart8 = new ApexCharts(document.querySelector("#HomecareReferralChart"), _HomecareReferralChart);
        chart8.render();
        // Homecare Referral End Start
        // Insurance Referral Chart Start
        var _InsuranceReferralChart = {
            series: [{
                name: '',
                data: [5, 10, 20, 40, 60, 80, 100]
            }],
            colors: ['#7466F0', '#7466F0', '#7466F0', '#7466F0', '#7466F0', '#7466F0', '#7466F0'],
            chart: {
                type: 'area'
            },
            stroke: {
                curve: 'smooth'
            },
            xaxis: {
                type: 'datetime',
                categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"],
                labels: {
                    datetimeFormatter: {
                        year: 'yyyy',
                        month: 'MMM \'yy',
                        day: 'dd MMM',
                        hour: 'HH:mm'
                    }
                }
            },
            tooltip: {
                x: {
                    format: 'dd/MM/yy HH:mm'
                },
            },
        };
        var chart9 = new ApexCharts(document.querySelector("#InsuranceReferralChart"), _InsuranceReferralChart);
        chart9.render();
        // Insurance Referral End Start
        // Other Referral Chart Start
        var _OhterRequestChart = {
            series: [{
                name: '',
                data: [5, 10, 20, 40, 60, 80, 100]
            }],
            colors: ['#7466F0', '#7466F0', '#7466F0', '#7466F0', '#7466F0', '#7466F0', '#7466F0'],
            chart: {
                type: 'area'
            },
            stroke: {
                curve: 'smooth'
            },
            xaxis: {
                type: 'datetime',
                categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"],
                labels: {
                    datetimeFormatter: {
                        year: 'yyyy',
                        month: 'MMM \'yy',
                        day: 'dd MMM',
                        hour: 'HH:mm'
                    }
                }
            },
            tooltip: {
                x: {
                    format: 'dd/MM/yy HH:mm'
                },
            },
        };
        var chart10 = new ApexCharts(document.querySelector("#OhterRequestChart"), _OhterRequestChart);
        chart10.render();
        // Other Referral End Start
        // Schedule Visit Chart Start
        var _ScheduleVisitChart = {
            series: [50, 75, 95],
            chart: {
                height: 160,
                type: 'radialBar',
            },
            plotOptions: {
                radialBar: {
                    offsetX: -90,
                    offsetY: 0,
                    startAngle: 0,
                    endAngle: 360,
                    hollow: {
                        margin: 5,
                        size: '30%',
                        background: 'transparent',
                        image: undefined,
                    },
                    dataLabels: {
                        name: {
                            show: false,
                        },
                        value: {
                            show: true,
                        }
                    }
                }
            },
            colors: ['#2EC2D0', '#1665D8', '#077883'],
            labels: ['Scheduled', 'Ongoing', 'Completed'],
            legend: {
                show: true,
                floating: true,
                fontSize: '15px',
                position: 'left',
                offsetX: 160,
                offsetY: 15,
                labels: {
                    useSeriesColors: true,
                },
                markers: {
                    size: 0
                },
                formatter: function (seriesName, opts) {
                    return seriesName + ":  " + opts.w.globals.series[opts.seriesIndex]
                },
                itemMargin: {
                    vertical: 3
                }
            },
            responsive: [{
                breakpoint: 480,
                options: {
                    legend: {
                        show: false
                    }
                }
            }]
        };
        var chart11 = new ApexCharts(document.querySelector("#ScheduleVisitChart"), _ScheduleVisitChart);
        chart11.render();
        // Schedule Visit Chart End
        // Total Employee Active Chart Start
        var _totalEmployeeActiveChart = {
            series: [8],
            chart: {
                height: 300,
                type: 'radialBar',
            },
            plotOptions: {
                radialBar: {
                    hollow: {
                        margin: 0,
                        size: '70%',
                    },
                    track: {
                        background: 'rgba(21, 171, 82, 0.2)',
                        strokeWidth: '120%',
                        margin: 0, // margin is in pixels
                    },
                    dataLabels: {
                        name: {
                            show: false,
                        },
                        value: {
                            fontSize: '30px',
                            fontWeight: 700,
                            color: "#15AB52",
                        }
                    },
                }
            },
            fill: {
                type: "solid",
                colors: ['#15AB52']
            },
            stroke: {
                lineCap: 'round'
            }
        };
        var chart12 = new ApexCharts(document.querySelector("#_totalEmployeeActiveChart"), _totalEmployeeActiveChart);
        chart12.render();
        // Total Employee Active Chart End
        // Total Employee Pending Chart Start
        var _totalEmployeePendingChart = {
            series: [14],
            chart: {
                height: 300,
                type: 'radialBar',
            },
            plotOptions: {
                radialBar: {
                    hollow: {
                        margin: 0,
                        size: '70%',
                    },
                    track: {
                        background: 'rgba(46, 194, 208, 0.27)',
                        strokeWidth: '120%',
                        margin: 0, // margin is in pixels
                    },
                    dataLabels: {
                        name: {
                            show: false,
                        },
                        value: {
                            fontSize: '30px',
                            fontWeight: 700,
                            color: "#2EC2D0",
                        }
                    },
                }
            },
            fill: {
                type: "solid",
                colors: ['#2EC2D0']
            },
            stroke: {
                lineCap: 'round'
            }
        };
        var chart13 = new ApexCharts(document.querySelector("#_totalEmployeePendingChart"), _totalEmployeePendingChart);
        chart13.render();
        // Total Employee Pending Chart End
        // Total Employee Rejected Chart Start
        var _totalEmployeeRejectedChart = {
            series: [14],
            chart: {
                height: 300,
                type: 'radialBar',
            },
            plotOptions: {
                radialBar: {
                    hollow: {
                        margin: 0,
                        size: '70%',
                    },
                    track: {
                        background: 'rgba(99, 101, 183, 0.37)',
                        strokeWidth: '120%',
                        margin: 0, // margin is in pixels
                    },
                    dataLabels: {
                        name: {
                            show: false,
                        },
                        value: {
                            fontSize: '30px',
                            fontWeight: 700,
                            color: "#30259F",
                        }
                    },
                }
            },
            fill: {
                type: "solid",
                colors: ['#30259F']
            },
            stroke: {
                lineCap: 'round'
            }
        };
        var chart14 = new ApexCharts(document.querySelector("#_totalEmployeeRejectedChart"), _totalEmployeeRejectedChart);
        chart14.render();
        // Total Employee Rejected Chart End
        // Partner Details Chart Start
        var _partnersDetailsChart = {
            series: [67],
            chart: {
                height: 376,
                type: 'radialBar',
                offsetY: -10
            },
            plotOptions: {
                radialBar: {
                    startAngle: -135,
                    endAngle: 135,
                    dataLabels: {
                        name: {
                            fontSize: '16px',
                            color: '#000',
                            offsetY: 120
                        },
                        value: {
                            offsetY: 0,
                            fontSize: '22px',
                            fontWeight: 700,
                            color: '#000',
                            formatter: function (val) {
                                return val + "%";
                            }
                        }
                    }
                }
            },
            fill: {
                type: 'gradient',
                gradient: {
                    shade: 'dark',
                    shadeIntensity: 0.15,
                    inverseColors: false,
                    opacityFrom: 1,
                    opacityTo: 1,
                    stops: [0, 50, 65, 91],
                    colorStops: [
                        [
                            {
                                offset: 0,
                                color: '#6365B7',
                                opacity: 1
                            },
                            {
                                offset: 25,
                                color: '#6365B7',
                                opacity: 1
                            },
                            {
                                offset: 50,
                                color: '#30BFCF',
                                opacity: 50
                            },
                            {
                                offset: 75,
                                color: '#F6AB2F',
                                opacity: 1
                            }
                        ]
                    ]
                },
            },
            stroke: {
                dashArray: 4
            },
            labels: ['Requested'],
        };
        var chart15 = new ApexCharts(document.querySelector("#partnersDetailsChart"), _partnersDetailsChart);
        chart15.render();
        var _registeredReferralCompanyChart = {
            chart: {
                height: 350,
                type: 'line',
                dropShadow: {
                    enabled: true,
                    color: '#000',
                    top: 18,
                    left: 7,
                    blur: 10,
                    opacity: 0.2
                },
                toolbar: {
                    show: false
                }
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                width: 2
            },
            colors: ['#34AA44', '#1665D8'],
            series: [
                {
                    name: "Income",
                    data: [
                        {
                            x: new Date(2020, 02, 10),
                            y: 5
                        },
                        {
                            x: new Date(2020, 04, 10),
                            y: 10
                        },
                        {
                            x: new Date(2020, 09, 28),
        y: 2
        },
        {
            x: new Date(2020, 10, 30),
                y: 10
        },
        {
            x: new Date(2020, 05, 15),
                y: 30
        },
        {
            x: new Date(2020, 01, 01),
                y: 5
        },
        {
            x: new Date(2020, 12, 30),
                y: 20
        },
        {
            x: new Date(2020, 11, 28),
                y: 25
        },
        {
            x: new Date(2020, 10, 28),
                y: 15
        },
        {
            x: new Date(2020, 09, 28),
            y: 35
        },
        {
            x: new Date(2020, 08, 28),
            y: 22
        },
        {
            x: new Date(2020, 07, 28),
                y: 10
        }
        ]
        },
        {
            name: "Income",
                data: [
            {
                x: new Date(2020, 06, 20),
                y: 15
            },
            {
                x: new Date(2020, 06, 18),
                y: 15
            },
            {
                x: new Date(2020, 06, 16),
                y: 40
            },
            {
                x: new Date(2020, 06, 14),
                y: 21
            },
            {
                x: new Date(2020, 06, 12),
                y: 3
            },
            {
                x: new Date(2020, 06, 10),
                y: 10
            },
            {
                x: new Date(2020, 06, 08),
            y: 5
        },
            {
                x: new Date(2020, 06, 06),
                    y: 10
            },
            {
                x: new Date(2020, 06, 04),
                    y: 30
            },
            {
                x: new Date(2020, 06, 02),
                    y: 40
            },
            {
                x: new Date(2020, 07, 08),
                y: 20
            },
            {
                x: new Date(2020, 10, 08),
                y: 1
            }
        ]
        }
        ],
        grid: {
            borderColor: '#e7e7e7',
                row: {
                colors: ['transparent', 'transparent'], // takes an array which will be repeated on columns
                    opacity: 0.5
            },
        },
        markers: {
            size: 8,
                colors: "#fff",
                strokeColors: "#2698FF",
                radius: 2
        },
        xaxis: {
            type: 'datetime',
                // min: new Date('01 Mar 2012').getTime(),
                // tickAmount: 6,
                labels: {
                style: {
                    colors: [],
                        fontSize: '14px',
                        fontWeight: 600,
                        cssClass: 'apexcharts-xaxis-label',
                }
            }
        },
        yaxis: {
            labels: {
                formatter: function (value) {
                    return value + " K";
                },
                style: {
                    colors: [],
                        fontSize: '14px',
                        fontWeight: 600,
                        cssClass: 'apexcharts-xaxis-label',
                },
            },
            min: 0,
                max: 40,
                lines: {
                show: false,
            }
        },
        tooltip: {
            theme: 'dark',
                followCursor: true,
                fixed: {
                enabled: false,
                    position: 'bottomRight',
                    offsetX: 0,
                    offsetY: 0,
            },
            custom: function ({ series, seriesIndex, dataPointIndex, w }) {
                return (
                    x = w.config.series[seriesIndex].data[dataPointIndex].x,
                        y = moment(x).format('MMMM Y'),
                    '<div class="arrows_box">' +
                    "<span class='d-block'>" + w.config.series[seriesIndex].name + " in " + y + "</span>" +
                    "<span class='d-block'>" + series[seriesIndex][dataPointIndex] + " K </span>" +
                    "<span class='d-block'>" + "Down by 4.9%" + "</span>" +
                    "</div>"
                );
            }
        },
        fill: {
            type: 'gradient',
                gradient: {
                shadeIntensity: 1,
                    opacityFrom: 0.7,
                    opacityTo: 0.9,
                    stops: [0, 100]
            }
        }
        };
        var chart16 = new ApexCharts(document.querySelector("#registeredReferralCompanyChart"), _registeredReferralCompanyChart);
        chart16.render();
        // Registered Referral Company Chart End
        function add_option(select_id, text) {
            var select = document.getElementById(select_id);
            select.options[select.options.length] = new Option(text);
        }
        function load_combo(select_id, option_array) {
            for (var i = 0; i < option_array.length; i++) {
                add_option(select_id, option_array[i]);
            }
        }
        var labRequest = new Array("Completed", "Cancelled", "Ongoing");
        var services = new Array("Value Base Care", "MD Order", "Cronic Care Management");
        var scope = new Array("Monthly", "Weekly", "Yearly");
        var partnerDetails = new Array("Lab Request", "X-Ray Request", "Yearly");
        function clear_combo(select_id) {
            var select = document.getElementById(select_id);
            select.options.length = 0;
        }
        load_combo("TotalLabRequest", labRequest)
        load_combo("DMERequest", labRequest)
        load_combo("WoundcareRequest", labRequest)
        load_combo("HomeInfusionRequest", labRequest)
        load_combo("HomeOxygenRequest", labRequest)
        load_combo("CHHARequest", labRequest)
        load_combo("XRayRequest", labRequest)
        load_combo("labRequest", labRequest)
        load_combo("HomecareReferral", labRequest)
        load_combo("InsuranceReferral", labRequest)
        load_combo("OhterRequest", labRequest)
        load_combo("ScheduleVisit", services)
        load_combo("scope", scope)
        load_combo("mmwwyy", scope)
        load_combo("partnerDetails", partnerDetails)
        tail.select(".select", {
            placeholder: "Select an option",
            search: true
        });
    </script>
@stack('script')
</body>
</html>
