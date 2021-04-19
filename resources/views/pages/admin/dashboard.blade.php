@extends('pages.layouts.app')
@section('title', 'Admin Dashboard')
@section('pageTitleSection')
    Dashboard
@endsection
@section('content')
    <section class="app-body pt-rem">
        <div class="app-admin-dashboard m-0">
            <div class="pt-2 pl-3 pr-3 pb-3">
                <div class="row">
                    <div class="col-12 col-sm-9">
                        <div class="app-card no-minHeight">
                            <div class="p-3">
                                <div class="row">
                                    <div class="col-12 col-sm-9">
                                        <div class="titleBlock">
                                            <div class="_title">Registered Referral Company</div>
                                            <div>
                                                <select class="form-control select" name="" id="mmwwyy">
                                                </select>
                                            </div>
                                        </div>
                                        <div id="registeredReferralCompanyChart"></div>
                                    </div>
                                    <div class="col-12 col-sm-3">
                                        <ul class="statistics mt-2">
                                            <li>
                                                <a href="javascript:void(0)"><span
                                                        class="dot green"></span>Total Home Care</a>
                                                <h1 class="counting">842.180.00</h1>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)"><span class="dot blue"></span>Total
                                                    Insurance</a>
                                                <h1 class="counting">842.180.00</h1>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)"><span
                                                        class="dot orange"></span>Total Others</a>
                                                <h1 class="counting">842.180.00</h1>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-12 col-sm-4">
                                <div class="app-card no-minHeight">
                                    <div class="p-3">
                                        <div class="titleBlock">
                                            <div class="_title">Homecare <span>Referral</span></div>
                                            <div>
                                                <select class="form-control select" name=""
                                                    id="HomecareReferral">
                                                </select>
                                            </div>
                                        </div>
                                        <div id="HomecareReferralChart" class="mt-3"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="app-card no-minHeight">
                                    <div class="p-3">
                                        <div class="titleBlock">
                                            <div class="_title">Insurance <span>Referral</span></div>
                                            <div>
                                                <select class="form-control select" name=""
                                                    id="InsuranceReferral">
                                                </select>
                                            </div>
                                        </div>
                                        <div id="InsuranceReferralChart" class="mt-3"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="app-card no-minHeight">
                                    <div class="p-3">
                                        <div class="titleBlock">
                                            <div class="_title">Other <span>Referral</span></div>
                                            <div>
                                                <select class="form-control select" name="" id="OhterRequest">
                                                </select>
                                            </div>
                                        </div>
                                        <div id="OhterRequestChart" class="mt-3"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-3">
                        <div class="app-card no-minHeight">
                            <div class="p-3 dpicker">
                                <div id="datepicker" class="c-datepicker" data-date="02/17/2021"></div>
                                <img src="../assets/img/icons/calendar-green.svg" alt="" srcset="" class="dpic">
                                <input type="hidden" id="my_hidden_input">
                            </div>
                        </div>
                        <div class="app-card no-minHeight mt-4">
                            <div class="p-3">
                                <div class="titleBlock">
                                    <div class="_title">Schedule <span>Visit</span></div>
                                    <div>
                                        <select class="form-control select" name="" id="ScheduleVisit">
                                        </select>
                                    </div>
                                </div>
                                <div class="card mt-4">
                                    <!-- Nav tabs -->
                                    <div class="p-0">
                                        <ul class="nav nav-pills nav-justified nav-new-custom-tab"
                                            role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link active" id="Weekly-tab" data-toggle="tab"
                                                    href="#Weekly" role="tab" aria-controls="Weekly"
                                                    aria-selected="true">Weekly</a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link" id="Monthly-tab" data-toggle="tab"
                                                    href="#Monthly" role="tab" aria-controls="Monthly"
                                                    aria-selected="false">Monthly</a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link" id="Yearly-tab" data-toggle="tab"
                                                    href="#Yearly" role="tab" aria-controls="Yearly"
                                                    aria-selected="true">Yearly</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div class="tab-pane active show" id="Weekly" role="tabpanel"
                                            aria-labelledby="Weekly-tab">
                                            <div id="ScheduleVisitChart"></div>
                                        </div>
                                        <div class="tab-pane" id="Monthly" role="tabpanel"
                                            aria-labelledby="Monthly-tab">
                                        </div>
                                        <div class="tab-pane" id="Yearly" role="tabpanel"
                                            aria-labelledby="Yearly-tab">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-12 col-sm-6">
                        <div class="app-card no-minHeight">
                            <!-- Nav tabs -->
                            <div class="">
                                <ul class="nav nav-pills nav-justified nav-custom-tab" id="myTab"
                                    role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active" id="total-employee-tab" data-toggle="tab"
                                            href="#total_emp" role="tab" aria-controls="Total Employee"
                                            aria-selected="true">Total Employee</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link no-left-radius" id="total-clinician-tab"
                                            data-toggle="tab" href="#total_clinician" role="tab"
                                            aria-controls="Total Clinician" aria-selected="false">Total
                                            Clinician</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link no-left-radius" id="total-coordinator-tab"
                                            data-toggle="tab" href="#total_coordinator" role="tab"
                                            aria-controls="Total Coordinator" aria-selected="true">Total
                                            Coordinator</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link no-left-radius" id="total-supervisor-tab"
                                            data-toggle="tab" href="#total_supervisor" role="tab"
                                            aria-controls="Total Supervisor" aria-selected="true">Total
                                            Coordinator</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link no-left-radius last-raduis" id="total-patients-tab"
                                            data-toggle="tab" href="#total_patients" role="tab"
                                            aria-controls="Total Patients" aria-selected="true">Total
                                            Patients</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade active show" id="total_emp" role="tabpanel"
                                    aria-labelledby="total-employee-tab">
                                    <div class="p-3">
                                        <div class="row">
                                            <div class="col-12 col-sm-4"></div>
                                            <div class="col-12 col-sm-4"></div>
                                            <div class="col-12 col-sm-4">
                                                <div class="d-flex justify-content-end">
                                                    <select class="form-control select" name="" id="scope">
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 col-sm-4">
                                                <div id="_totalEmployeeActiveChart"></div>
                                                <h1 class="chartStatus">Active</h1>
                                            </div>
                                            <div class="col-12 col-sm-4">
                                                <div id="_totalEmployeePendingChart"></div>
                                                <h1 class="chartStatus">Active</h1>
                                            </div>
                                            <div class="col-12 col-sm-4">
                                                <div id="_totalEmployeeRejectedChart"></div>
                                                <h1 class="chartStatus">Active</h1>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="total_clinician" role="tabpanel"
                                    aria-labelledby="total-clinician-tab">
                                </div>
                                <div class="tab-pane fade" id="total_coordinator" role="tabpanel"
                                    aria-labelledby="total-coordinator-tab">
                                </div>
                                <div class="tab-pane fade" id="total_supervisor" role="tabpanel"
                                    aria-labelledby="total-supervisor-tab">
                                </div>
                                <div class="tab-pane fade" id="total_patients" role="tabpanel"
                                    aria-labelledby="total-patients-tab">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <div class="app-card no-minHeight">
                            <div class="p-3">
                                <div class="titleBlock">
                                    <div class="_title">Partners <span>Details</span></div>
                                    <div>
                                        <select class="form-control select" name="" id="partnerDetails">
                                        </select>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-12 col-sm-4">
                                        <div class="card partnersDetailsChart"
                                            style="border: 1px solid rgba(196, 196, 196, 0.5);">
                                            <div id="partnersDetailsChart"></div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-8">
                                        <div class="progressReport">
                                            <div style="width: 100%;">
                                                <div>
                                                    <div class="partner_progress">
                                                        <div>Accepted</div>
                                                        <div>50%</div>
                                                    </div>
                                                    <div class="progress"
                                                        style="height: 15px;border-radius: 50px;">
                                                        <div class="progress-bar" role="progressbar"
                                                            style="width: 50%;border-radius: 50px;background: #74C846;"
                                                            aria-valuenow="25" aria-valuemin="0"
                                                            aria-valuemax="100">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mt-4">
                                                    <div class="partner_progress">
                                                        <div>Completed</div>
                                                        <div>80%</div>
                                                    </div>
                                                    <div class="progress"
                                                        style="height: 15px;border-radius: 50px;">
                                                        <div class="progress-bar" role="progressbar"
                                                            style="width: 80%;border-radius: 50px;background: #1665D8;"
                                                            aria-valuenow="25" aria-valuemin="0"
                                                            aria-valuemax="100">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mt-4">
                                                    <div class="partner_progress">
                                                        <div>Cancel</div>
                                                        <div>30%</div>
                                                    </div>
                                                    <div class="progress"
                                                        style="height: 15px;border-radius: 50px;">
                                                        <div class="progress-bar" role="progressbar"
                                                            style="width: 30%;border-radius: 50px;background: #F6AB2F;"
                                                            aria-valuenow="25" aria-valuemin="0"
                                                            aria-valuemax="100">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-12 col-sm-3">
                        <div class="app-card no-minHeight">
                            <div class="p-3">
                                <div class="titleBlock">
                                    <div class="_title">Lab <span>Request</span></div>
                                    <div>
                                        <select class="form-control select" name="" id="labRequest">
                                        </select>
                                    </div>
                                </div>
                                <div id="labRequestChart" class="mt-3"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-3">
                        <div class="app-card no-minHeight">
                            <div class="p-3">
                                <div class="titleBlock">
                                    <div class="_title">X-Ray <span>Request</span></div>
                                    <div>
                                        <select class="form-control select" name="" id="XRayRequest">
                                        </select>
                                    </div>
                                </div>
                                <div id="XRayRequestChart" class="mt-3"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-3">
                        <div class="app-card no-minHeight">
                            <div class="p-3">
                                <div class="titleBlock">
                                    <div class="_title">CHHA <span>Request</span></div>
                                    <div>
                                        <select class="form-control select" name="" id="CHHARequest">
                                        </select>
                                    </div>
                                </div>
                                <div id="CHHARequestChart" class="mt-3"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-3">
                        <div class="app-card no-minHeight">
                            <div class="p-3">
                                <div class="titleBlock">
                                    <div class="_title">Home Oxygen <span>Request</span></div>
                                    <div>
                                        <select class="form-control select" name=""
                                            id="HomeOxygenRequest"></select>
                                    </div>
                                </div>
                                <div id="HomeOxygenRequestChart" class="mt-3"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <!-- Home Infusion Request Start -->
                    <div class="col-12 col-sm-3">
                        <div class="app-card no-minHeight">
                            <div class="p-3">
                                <div class="titleBlock">
                                    <div class="_title">Home Infusion <span>Request</span></div>
                                    <div>
                                        <select class="form-control select" name="" id="HomeInfusionRequest">
                                        </select>
                                    </div>
                                </div>
                                <div id="HomeInfusionRequestChart" class="mt-3"></div>
                            </div>
                        </div>
                    </div>
                    <!-- Home Infusion Request End -->
                    <!-- Wound Care Request Start -->
                    <div class="col-12 col-sm-3">
                        <div class="app-card no-minHeight">
                            <div class="p-3">
                                <div class="titleBlock">
                                    <div class="_title">Wound Care <span>Request</span></div>
                                    <div>
                                        <select class="form-control select" name="" id="WoundcareRequest">
                                        </select>
                                    </div>
                                </div>
                                <div id="WoundcareRequestChart" class="mt-3"></div>
                            </div>
                        </div>
                    </div>
                    <!-- Wound Care Request End -->
                    <!-- DME Request Start -->
                    <div class="col-12 col-sm-3">
                        <div class="app-card no-minHeight">
                            <div class="p-3">
                                <div class="titleBlock">
                                    <div class="_title">DME <span>Request</span></div>
                                    <div>
                                        <select class="form-control select" name="" id="DMERequest">
                                        </select>
                                    </div>
                                </div>
                                <div id="DMERequestChart" class="mt-3"></div>
                            </div>
                        </div>
                    </div>
                    <!-- DME Request End -->
                    <!-- Total LAB Request Start -->
                    <div class="col-12 col-sm-3">
                        <div class="app-card no-minHeight">
                            <div class="p-3">
                                <div class="titleBlock">
                                    <div class="_title">Total <span>LAB Request</span></div>
                                    <div>
                                        <select class="form-control select" name=""
                                            id="TotalLabRequest"></select>
                                    </div>
                                </div>
                                <div id="TotalLabRequestChart" class="mt-3"></div>
                            </div>
                        </div>
                    </div>
                    <!-- Total LAB Request End -->
                </div>
            </div>
        </div>
    </section>
@stop
@section('permissonControl')
    <!-- Add Permission Start Here -->
    <div class="permissonControl">
        <a href="javascript:void(0)" class="permission_icon _addpermission" id="addPatientToggle">
            <img src="../assets/img/icons/permission_icon.svg" class="active" alt="">
            <img src="../assets/img/icons/permission_icon_hover.svg" class="hover" alt="">
        </a>
        <a href="javascript:void(0)" class="permission_icon mt-2" id="doralPatientToggle">
            <img src="../assets/img/icons/search_patients.svg" class="active" alt="">
            <img src="../assets/img/icons/search_patients_hover.svg" class="hover" alt="">
        </a>
    </div>
    <section id="slider" class="addPermission _addPermission slideout d-none">
        <div class="permissonControl _open">
            <a href="javascript:void(0)" class="close_menu_icon close_add_permission">
                <img src="../assets/img/icons/closed_icon.svg" alt="">
            </a>
            <a href="javascript:void(0)" class="permission_icon mt-2 _open_search_patient">
                <img src="../assets/img/icons/search_patients.svg" class="active" alt="">
                <img src="../assets/img/icons/search_patients_hover.svg" class="hover" alt="">
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
                    <img src="../assets/img/icons/closed_icon.svg" alt="">
                </a>
                <a href="javascript:void(0)" class="permission_icon mt-2 _open_add_permission">
                    <img src="../assets/img/icons/permission_icon.svg" class="active" alt="">
                    <img src="../assets/img/icons/permission_icon_hover.svg" class="hover" alt="">
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
@stop
@push('styles')
@endpush
<link rel="stylesheet" href="../assets/css/tail.select-teal.min.css" />
<link rel="stylesheet" href="../assets/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="../assets/css/bootstrap-datepicker3.css">
@push('scripts')
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
@endpush