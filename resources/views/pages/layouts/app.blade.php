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
    <!-- Add Permission Start Here -->
    <div class="permissonControl">
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
                    <img src="{{ asset('new/assets/img/icons/add_permission.svg') }}" class="inactive mr-2" alt="">
                    <img src="{{ asset('new/assets/img/icons/add_permission_active.svg') }}" class="active mr-2" alt="">
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
    <section id="slider1" class="addPermission doralPatient _searchDoralPatients slideout d-none" style="width: 97% !important;">
        <section style="margin-top: -1.5% !important;">
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
                                        
                                    </div>
                                </div>
                                <div class="f-column">
                                    <input type="text" class="input-skin" placeholder="123-45-6789" name="ssn" id="ssn"
                                           onkeypress="return isNumber(event)" onBlur="SSNumber('ssn')" required>
                                    <div class="invalid-feedback">
                                        Please provide a SSN No.
                                    </div>
                                    <div class="valid-feedback">
                                        
                                    </div>
                                </div>
                                <div class="f-column">
                                    <input type="text" class="input-skin dob" name="dob" placeholder="DOB" value=""
                                           id="dob" required>
                                    <div class="invalid-feedback">
                                        Please provide a DOB.
                                    </div>
                                    <div class="valid-feedback">
                                        
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
                                        
                                    </div>
                                </div>
                                <div class="f-column">
                                    <input type="text" class="input-skin" placeholder="Zip Code"
                                           onkeypress="return isNumber(event)" value="" name="zipp" id="zipp" required>
                                    <div class="invalid-feedback">
                                        Please provide a zip code.
                                    </div>
                                    <div class="valid-feedback">
                                        
                                    </div>
                                </div>
                                <div class="f-column">
                                    <input type="text" class="input-skin" placeholder="Other" name="others" id="others"
                                           required>
                                    <div class="invalid-feedback">
                                        Please enter others.
                                    </div>
                                    <div class="valid-feedback">
                                        
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
                    <table class="table " style="width: 100%;" id="patientResultTable">
                        <thead>
                            <tr>
<!--                                <th>
                                    <label>
                                        <input type="checkbox" class="selectall" />
                                        <span></span>
                                    </label>
                                </th>-->
                                <th width="1%">Sr.No</th>
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
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </section>
    <!-- Search Doral Patient End Here -->
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
        var save_token_url = '{{ route("save-token") }}';
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

    <script src="{{ asset('assets/js/sidebar.js') }}"></script>
    <script src="{{ asset('js/toastr.js') }}"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('assets/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('new/assets/js/bootstrap-datepicker.js') }}"></script>
    <script src="https://www.gstatic.com/firebasejs/4.1.3/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/4.1.3/firebase-database.js"></script>
    <script src="https://www.gstatic.com/firebasejs/4.1.3/firebase-messaging.js"></script>

    <script src="{{ asset('js/clincian/app.clinician.broadcast.js') }}"></script>
    <script src="{{ asset('js/new/apexcharts.js') }}"></script>
    <script src="{{ asset('js/new/validation.js') }}"></script>
    <script src="{{ asset('js/new/selectpure.min.js') }}"></script>
    <script src="{{ asset('js/global.js') }}"></script>
    <script>
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

    </script>
@stack('scripts')
</body>
</html>
