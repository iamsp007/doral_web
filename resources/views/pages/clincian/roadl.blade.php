@extends('pages.layouts.app')
@section('title','Patient RoadL Request')
@section('pageTitleSection','Roadl')
@section('upload-btn')
    <div class="form-group">
        <div class="row">
            <div class="col-3 col-sm-3 col-md-3">
                <div class="input-group">
                    <select style="width:300px;" class="form-control select2_dropdown filter" id="user_name" name="user_name"></select>
                </div>
            </div>
            <div class="col-3 col-sm-3 col-md-3">
                <div class="input-group">
                    <select style="width:300px;" class="form-control select2_dropdown filter" id="clinician_name" name="clinician_name"></select>
                </div>
            </div>
            <div class="col-3 col-sm-3 col-md-3">
                <select class="form-control filter" name="filter" id="filter">
                    <option value="0" {{ request()->type==="0"?"selected":"" }}>All</option>
                    <option value="1" {{ request()->type==="1"?"selected":"" }}>Pending</option>
                    <option value="2" {{ request()->type==="2"?"selected":"" }}>Accepted</option>
                    <option value="3" {{ request()->type==="3"?"selected":"" }}>Arrive</option>
                    <option value="4" {{ request()->type==="4"?"selected":"" }}>Complete</option>
                    <option value="5" {{ request()->type==="5"?"selected":"" }}>Cancel</option>
                </select>
            </div>
            <div class="col-3 col-sm-3 col-md-3">
            <button class="btn btn-primary reset_btn" type="button" id="reset_btn"><i class="las la-undo-alt"></i></button>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <ul class="boradcast-list">
        @if(count($patientRequestList)>0)
            @foreach($patientRequestList as $key=>$value)
           
                <li class="mt-3">
                    <span class="badge rounded-pill bg-danger _ccm">C</span>
                    <div class="app-card app-card-broadcast raduis_5">
                        <div class="app-broadcasting">
                            <div class="lside">
                                <div>
                                    <img src="{{ isset($value->patient_detail) ? $value->patient_detail->avatar_image : '' }}" class="user_photo" alt=""
                                         srcset="{{ isset($value->patient_detail) ? $value->patient_detail->avatar_image : '' }}">
                                </div>
                                <div class="content">
                                    <h1 class="_t11">
                                        <a href="{{ route('patient.details',['patient_id'=>$value->patient_detail->id]) }}">
                                            {{ $value->patient_detail->first_name }} {{ $value->patient_detail->last_name }}
                                        </a>
                                        <span class="contact"><a href="tel:8866246684" class="secondary_tel"></a>
                                            </span>
                                    </h1>
                                    <p class="address">
                                        @if(isset($value->patient_detail->demographic) && !empty($value->patient_detail->demographic->address) && !empty($value->patient_detail->demographic->address->address1))
                                           Address 1: {{ $value->patient_detail->demographic->address->address1 }}
                                        @endif
                                    </p>
                                    <p class="address">
                                        @if(isset($value->patient_detail->demographic) && !empty($value->patient_detail->demographic->address) && !empty($value->patient_detail->demographic->address->address2))
                                            Address 2: {{ $value->patient_detail->demographic->address->address2 }}
                                        @endif
                                    </p>
                                    <p class="address">
                                        @if(isset($value->patient_detail->demographic) && !empty($value->patient_detail->demographic->address) && !empty($value->patient_detail->demographic->address->apt_building))
                                            Apt#/Building: {{ $value->patient_detail->demographic->address->apt_building }}
                                        @endif
                                    </p>
                                    <p class="address">
                                        @if(isset($value->patient_detail->demographic) && !empty($value->patient_detail->demographic->address) && !empty($value->patient_detail->demographic->address->city))
                                            City: {{ $value->patient_detail->demographic->address->city }}
                                        @endif
                                    </p>
                                    <p class="address">
                                        @if(isset($value->patient_detail->demographic) && !empty($value->patient_detail->demographic->address) && !empty($value->patient_detail->demographic->address->state))
                                            City: {{ $value->patient_detail->demographic->address->state }}
                                        @endif
                                    </p>
                                    <p class="address">
                                        @if(isset($value->patient_detail->demographic) && !empty($value->patient_detail->demographic->address) && !empty($value->patient_detail->demographic->address->zip_code))
                                            City: {{ $value->patient_detail->demographic->address->zip_code }}
                                        @endif
                                    </p>
                                    <p class="address">
                                        @if(isset($value->patient_detail->demographic) && isset($value->patient_detail->demographic->address_latlng))
                                            latitude: {{ $value->patient_detail->demographic->address_latlng->lat }} 
                                        @endif
                                    </p>
                                    <p class="address">
                                        @if(isset($value->patient_detail->demographic) && isset($value->patient_detail->demographic->address_latlng))
                                            longitude : {{ $value->patient_detail->demographic->address_latlng->lng }}
                                        @endif
                                    </p>
                                    <p class="emergency_contact mb-2 d-none"> Emergency Contact
                                        <a href="tel:{{$value->patient_detail->phone}}" class="primary_tel d-none">{{ $value->patient_detail->phone }}</a>
                                    </p>
                                </div>
                            </div>
                            <div class="rside">
                                <div class="_lside">
                                    <ul class="specification">
                                        @if(count($value->ccrm))
                                                @foreach($value->ccrm as $ckey=>$cvalue)
                                                @if($cvalue->reading_type==='1')
                                                    <li class="blood">
                                                        <img src="{{ asset('assets/img/icons/pressure.svg') }}"
                                                             class="mr-2"  alt="">Blood Pressure : {{ $cvalue->reading_value }}</li>
                                                @elseif($cvalue->reading_type==='2')
                                                    <li class="sugar"><img src="{{ asset('assets/img/icons/sugar.svg') }}" class="mr-2" alt="">Blood Sugar : {{ $cvalue->reading_value }}</li>
                                                @elseif($cvalue->reading_type==='3')
                                                    <li class="caregiver" data-container="body" data-toggle="popover"
                                                        data-placement="top"
                                                        data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">
                                                        <img src="{{ asset('assets/img/icons/caregiver.svg') }}" class="mr-2"
                                                             alt="">Caregiver :&nbsp;<a title="{{ $value->patient_detail->phone }}"
                                                                                        href="javascript:void(0)" class="secondary_tel">{{ $cvalue->reading_value }}</a>
                                                    </li>
                                                @endif
                                            @endforeach
                                        @else
                                            <li class="blood">
                                                <img src="{{ asset('assets/img/icons/pressure.svg') }}"
                                                     class="mr-2"  alt="">Blood Pressure : --</li>
                                            <li class="sugar"><img src="{{ asset('assets/img/icons/sugar.svg') }}" class="mr-2"
                                                                   alt="">Blood Sugar : --</li>
                                            <li class="caregiver" data-container="body" data-toggle="popover"
                                                data-placement="top"
                                                data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">
                                                <img src="{{ asset('assets/img/icons/caregiver.svg') }}" class="mr-2"
                                                     alt="">Caregiver :&nbsp;<a title="{{ $value->patient_detail->phone }}"
                                                                                href="javascript:void(0)" class="secondary_tel">--</a>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                                <div class="_rside">
                                    <ul class="actionBar">
                                        @if(isset($value->patient_detail->detail->referral) && !empty($value->patient_detail->detail->referral))
                                            <li>
                                                <ul class="specification">
                                                    <li class="referralCompany"><img src="{{ asset('assets/img/icons/sugar.svg') }}" class="mr-2" alt="">Referral Company:&nbsp;&nbsp;<span>{{ $value->patient_detail->detail->referral->name }}</span></li>
                                                    <li class="referralCompany"><img src="{{ asset('assets/img/icons/sugar.svg') }}" class="mr-2" alt="">Request Type:&nbsp;&nbsp;<span>{{ isset($value->request_type->name)?$value->request_type->name:'Default' }}</span></li>
                                                </ul>
                                            </li>
                                        @else
                                            <li>
                                                <ul class="specification">
                                                    <li class="referralCompany"><img src="{{ asset('assets/img/icons/sugar.svg') }}" class="mr-2" alt="">Referral Company:&nbsp;&nbsp;<span>Doral</span></li>
                                                    <li class="referralCompany"><img src="{{ asset('assets/img/icons/sugar.svg') }}" class="mr-2" alt="">Request Type:&nbsp;&nbsp;<span>{{ isset($value->request_type->name)?$value->request_type->name:'Default' }}</span></li>
                                                </ul>
                                            </li>
                                        @endif
                                            <li>
                                                <button type="button"
                                                    onclick="window.location.href = '{{ route('start.call',['patient_request_id'=>$value->id]) }}'"
                                                    class="btn btn-start-call ml-5">Start
                                                Call<span></span></button>
                                            </li>
                                            <li>
                                                <div class="broadcast_box">
                                                 <button class="btn btn-broadcast btn-block" type="button" data-toggle="collapse" data-target="#collapseExample{{ $key }}" aria-expanded="false" aria-controls="collapseExample">
                                                        BroadCast <span></span>
                                                    </button>
                                                
                                                    
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="collapse" id="collapseExample{{ $key }}">
                        @foreach($value->requests as $rkey=>$rval)
  <div class="row mt-3">
                                <div class="col-9">
                                    <div class="col-3">
                                        <span>Name : {{ isset($rval->detail->first_name)?$rval->detail->first_name:'Not Accepted' }}</span>
                                    </div>
                                    <div class="col-3">
                                        <span>Service Type : {{ isset($rval->request_type)?$rval->request_type->name:'Default' }}</span>
                                    </div>
                                    <div class="col-3">
                                        <span>Status : {{ isset($rval->status)?$rval->status:'Default' }}</span>
                                    </div>
                                </div>
                                <div class="col-3">                             
       @if($rval->status==='1')
                                        <button type="button"
                                                onclick="window.location.href = '{{ route('clinician.start.roadl',['patient_request_id'=>$rval->id]) }}'"
                                                {{--                                                            onclick="sendLocation(1,'sdfdsfds')"--}}
                                                class="btn btn-broadcast btn-block ">Pending<span></span>
                                        </button>
                                    @elseif($rval->status==='2')
                                        <button type="button"
                                                onclick="window.location.href = '{{ route('clinician.start.running',['patient_request_id'=>$rval->parent_id]) }}'"
                                                class="btn btn-broadcast">Accepted<span></span>
                                        </button>
                                    @elseif($rval->status==='6')
                                        <button type="button"
                                                onclick="window.location.href = '{{ route('clinician.start.running',['patient_request_id'=>$rval->parent_id]) }}'"
                                                class="btn btn-broadcast">Prepare Time : {{ $rval->prepare_time }}<span></span>
                                        </button>
                                    @elseif($rval->status==='7')
                                        <button type="button"
                                                onclick="window.location.href = '{{ route('clinician.start.running',['patient_request_id'=>$rval->parent_id]) }}'"
                                                class="btn btn-broadcast">On The Way<span></span>
                                        </button>
                                    @elseif($rval->status==='3')
                                        <button type="button"
                                                onclick="window.location.href = '{{ route('clinician.start.running',['patient_request_id'=>$rval->parent_id]) }}'"
                                                class="btn btn-broadcast">Arrived<span></span>
                                        </button>
                                    @elseif($rval->status==='4')
                                        <button type="button"
                                                onclick="window.location.href = '{{ route('clinician.start.running',['patient_request_id'=>$rval->parent_id]) }}'"
                                                class="btn btn-broadcast">Complete<span></span>
                                        </button>
                                    @elseif($rval->status==='5')
                                        <button type="button"
                                        onclick="window.location.href = '{{ route('clinician.start.running',['patient_request_id'=>$rval->parent_id]) }}'"
                                                class="btn btn-broadcast btn-danger">Cancel<span></span>
                                        </button>
                                    @else
                                        <button type="button"
                                                class="btn btn-broadcast btn-info">Searching<span></span>
                                        </button>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                            <button type="button" onclick="onBroadCastOpen({{ $value->patient_detail->id }})"
                                    class="btn btn-broadcast btn-info">Add New Request <span></span>
                            </button>
                    </div>
                </li>
            @endforeach
        @else
            <li>
                <h1>No Roadl Request Found</h1>
            </li>
        @endif
    </ul>
@endsection

@section('app-video')
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
        {{--        <section class="p-4 custom-shadow custom-border bg-white">--}}
        {{--            <div>--}}
        {{--                <div class="_title4 mb-3 color-green">Doral Patient</div>--}}
        {{--                <div class="bg-gray">--}}
        {{--                    <div class="p-4">--}}
        {{--                        <h1 class="_title4">Filter List</h1>--}}
        {{--                        <form action="#" class="formCSS mt-4" id="doralPatientSearchForm" novalidate>--}}
        {{--                            <div class="f-group">--}}
        {{--                                <div class="f-column">--}}
        {{--                                    <input type="text" class="input-skin" placeholder="Patient Name" name="patientName"--}}
        {{--                                           id="patientName" required>--}}
        {{--                                    <div class="invalid-feedback">--}}
        {{--                                        Please provide a patient name.--}}
        {{--                                    </div>--}}
        {{--                                    <div class="valid-feedback">--}}
        {{--                                        Looks good!--}}
        {{--                                    </div>--}}
        {{--                                </div>--}}
        {{--                                <div class="f-column">--}}
        {{--                                    <input type="text" class="input-skin" placeholder="123-45-6789" name="ssn" id="ssn"--}}
        {{--                                           onkeypress="return isNumber(event)" onBlur="SSNumber('ssn')" required>--}}
        {{--                                    <div class="invalid-feedback">--}}
        {{--                                        Please provide a SSN No.--}}
        {{--                                    </div>--}}
        {{--                                    <div class="valid-feedback">--}}
        {{--                                        Looks good!--}}
        {{--                                    </div>--}}
        {{--                                </div>--}}
        {{--                                <div class="f-column">--}}
        {{--                                    <input type="text" class="input-skin dob" name="dob" placeholder="DOB" value=""--}}
        {{--                                           id="dob" required>--}}
        {{--                                    <div class="invalid-feedback">--}}
        {{--                                        Please provide a DOB.--}}
        {{--                                    </div>--}}
        {{--                                    <div class="valid-feedback">--}}
        {{--                                        Looks good!--}}
        {{--                                    </div>--}}
        {{--                                </div>--}}
        {{--                                <div class="f-column">--}}
        {{--                                    <select class="input-skin" name="city" id="city" required>--}}
        {{--                                        <option value="">Select City</option>--}}
        {{--                                        <option value="City 1">City 1</option>--}}
        {{--                                        <option value="City 2">City 2</option>--}}
        {{--                                    </select>--}}
        {{--                                    <div class="invalid-feedback">--}}
        {{--                                        Please select city.--}}
        {{--                                    </div>--}}
        {{--                                    <div class="valid-feedback">--}}
        {{--                                        Looks good!--}}
        {{--                                    </div>--}}
        {{--                                </div>--}}
        {{--                                <div class="f-column">--}}
        {{--                                    <select class="input-skin" name="state" id="state" required>--}}
        {{--                                        <option value="">Select State</option>--}}
        {{--                                        <option value="State 1">State 1</option>--}}
        {{--                                        <option value="State 2">State 2</option>--}}
        {{--                                    </select>--}}
        {{--                                    <div class="invalid-feedback">--}}
        {{--                                        Please select state.--}}
        {{--                                    </div>--}}
        {{--                                    <div class="valid-feedback">--}}
        {{--                                        Looks good!--}}
        {{--                                    </div>--}}
        {{--                                </div>--}}
        {{--                                <div class="f-column d-flex align-items-center">--}}
        {{--                                    <label>--}}
        {{--                                        <input class="with-gap" name="group3" type="radio" checked />--}}
        {{--                                        <span>Male</span>--}}
        {{--                                    </label>--}}
        {{--                                    <label>--}}
        {{--                                        <input class="with-gap" name="group3" type="radio" checked />--}}
        {{--                                        <span>Female</span>--}}
        {{--                                    </label>--}}
        {{--                                </div>--}}
        {{--                            </div>--}}
        {{--                            <div class="f-group mt-3">--}}
        {{--                                <div class="f-column">--}}
        {{--                                    <select class="input-skin" name="statuss" id="statuss" required>--}}
        {{--                                        <option value="">Select Status</option>--}}
        {{--                                        <option value="Status 1">Status 1</option>--}}
        {{--                                        <option value="Status 2">Status 2</option>--}}
        {{--                                    </select>--}}
        {{--                                    <div class="invalid-feedback">--}}
        {{--                                        Please select status.--}}
        {{--                                    </div>--}}
        {{--                                    <div class="valid-feedback">--}}
        {{--                                        Looks good!--}}
        {{--                                    </div>--}}
        {{--                                </div>--}}
        {{--                                <div class="f-column">--}}
        {{--                                    <select class="input-skin" name="servicess" id="servicess" required>--}}
        {{--                                        <option value="">Select Services</option>--}}
        {{--                                        <option value="Services 1">Services 1</option>--}}
        {{--                                        <option value="Services 2">Services 2</option>--}}
        {{--                                    </select>--}}
        {{--                                    <div class="invalid-feedback">--}}
        {{--                                        Please select service.--}}
        {{--                                    </div>--}}
        {{--                                    <div class="valid-feedback">--}}
        {{--                                        Looks good!--}}
        {{--                                    </div>--}}
        {{--                                </div>--}}
        {{--                                <div class="f-column">--}}
        {{--                                    <input type="text" class="input-skin" placeholder="Zip Code"--}}
        {{--                                           onkeypress="return isNumber(event)" value="" name="zipp" id="zipp" required>--}}
        {{--                                    <div class="invalid-feedback">--}}
        {{--                                        Please provide a zip code.--}}
        {{--                                    </div>--}}
        {{--                                    <div class="valid-feedback">--}}
        {{--                                        Looks good!--}}
        {{--                                    </div>--}}
        {{--                                </div>--}}
        {{--                                <div class="f-column">--}}
        {{--                                    <input type="text" class="input-skin" placeholder="Other" name="others" id="others"--}}
        {{--                                           required>--}}
        {{--                                    <div class="invalid-feedback">--}}
        {{--                                        Please enter others.--}}
        {{--                                    </div>--}}
        {{--                                    <div class="valid-feedback">--}}
        {{--                                        Looks good!--}}
        {{--                                    </div>--}}
        {{--                                </div>--}}
        {{--                                <div class="f-column">--}}
        {{--                                    <input type="submit" value="Submit" class="btn btn--submit-dark btn-lg">--}}
        {{--                                </div>--}}
        {{--                                <div class="f-column">--}}
        {{--                                </div>--}}
        {{--                            </div>--}}
        {{--                        </form>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--        </section>--}}
        <section class="mt-3 custom-shadow custom-border bg-white">
            <div class="p-4">
                <div class="scrollbar scrollbar8">
                    <table class="table " style="width: 100%;" id="patientResultTable">
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
                                        <img src="{{ asset('new/assets/img/icons/call.svg') }}" class="actives" alt="" srcset="">
                                        <img src="{{ asset('new/assets/img/icons/active_call.svg') }}" class="inactives" alt=""
                                             srcset="">
                                    </button>
                                    <button type="button" class="btn btn--video mr-2">
                                        <img src="{{ asset('new/assets/img/icons/video.svg') }}" class="actives" alt="" srcset="">
                                        <img src="{{ asset('new/assets/img/icons/active_video.svg') }}" class="inactives" alt=""
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
@endsection

@push('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />

    <style>
        .app .app-content .app-body .app-broadcasting .rside ._lside {width: 300px;}
        .app .app-content .app-body .app-broadcasting .rside .specification li.referralCompany{color: #000;font-weight: 600;}
        .app .app-content .app-body .app-broadcasting .rside .specification li.referralCompany span{color: #006c76;font-weight: 600;}
    </style>
@endpush
@push('scripts')
    <script src="{{ asset('new/assets/js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('js/new/apexcharts.js') }}"></script>
    <script src="{{ asset('js/new/validation.js') }}"></script>
    <script src="{{ asset('js/new/selectpure.min.js') }}"></script>
    <script src="{{ asset('js/new/patientSearch.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script> 
    <script>
        var patientRequestList="{{ route('clinician.roadl.patientRequestList') }}";

        var getUrlParameter = function getUrlParameter(sParam) {
        var sPageURL = window.location.search.substring(1),
            sURLVariables = sPageURL.split('&'),
            sParameterName,
            i;

            for (i = 0; i < sURLVariables.length; i++) {
                sParameterName = sURLVariables[i].split('=');

                if (sParameterName[0] === sParam) {
                    return typeof sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
                }
            }
            return false;
        };

        $('#filter').on('change',function (event) {
            event.preventDefault();
            var url = window.location.href;
           
            if (url.indexOf('?') > -1) {
                if (url.indexOf('type') > -1) {
                    var typeUrl = getUrlParameter('type');
                    url = url.replace('type='+typeUrl, 'type='+event.target.value);
                    window.location.href=url;
                } else {
                    url = url + '&';
                    window.location.href=url+'type='+event.target.value;
                }
               
            } else {
                window.location.href=url+'?type='+event.target.value;
            }
        })

        $('#user_name').on('change',function (event) {
            event.preventDefault();
          
            var url = window.location.href;

            if (url.indexOf('?') > -1) {
                if (url.indexOf('user_id') > -1) {
                    var typeUrl = getUrlParameter('user_id');
                    url = url.replace('user_id='+typeUrl, 'user_id='+event.target.value);
                    window.location.href=url;
                } else {
                    url = url + '&';
                    window.location.href=url+'user_id='+event.target.value;
                }
            } else {
                window.location.href=url+'?user_id='+event.target.value;
            }
        })  

        $('#user_name').select2({
            minimumInputLength: 3,
            placeholder: 'Select a patient',
            ajax: {
                type: "POST",
                url: "{{ route('clinician.get-request-user') }}",
                dataType: 'json',
                delay: 250,
                processResults: function (data) {
                    return {
                        results:  $.map(data, function (item) {
                            return {
                                text: item.first_name + ' ' + item.last_name,
                                id: item.id
                            }
                        })
                    };
                },
                cache: true
            }
        });
        
        $('#clinician_name').on('change',function (event) {
            event.preventDefault();
          
            var url = window.location.href;
           
            if (url.indexOf('?') > -1) {
                if (url.indexOf('clinician_id') > -1) {
                    var typeUrl = getUrlParameter('clinician_id');
                    url = url.replace('clinician_id='+typeUrl, 'clinician_id='+event.target.value);
                    window.location.href=url;
                } else {
                    url = url + '&';
                    window.location.href=url+'clinician_id='+event.target.value;
                }
            } else {
                window.location.href=url+'?clinician_id='+event.target.value;
            }
        })

        $('#clinician_name').select2({
            minimumInputLength: 3,
            placeholder: 'Select a clinician',
            ajax: {
                type: "POST",
                url: "{{ route('clinician.get-request-clinician') }}",
                dataType: 'json',
                delay: 250,
                processResults: function (data) {
                    return {
                        results:  $.map(data, function (item) {
                            return {
                                text: item.first_name + ' ' + item.last_name,
                                id: item.id
                            }
                        })
                    };
                },
                cache: true
            }
        });
    </script>
@endpush
