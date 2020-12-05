@extends('pages.clincian.layouts.app')

@section('title','Patient Detail')
@section('pageTitleSection')
    Patient Detail
@endsection
@section('upload-btn')
    <div class="d-flex">
        <a href="javascript:void(0)" class="single-upload-btn mr-2">
            <img src="{{ asset('assets/img/icons/single-upload-icon.svg') }}" class="icon mr-2" />
            SINGLE UPLOAD</a>
        <a href="md_order_upload_bulk_data.html" class="bulk-upload-btn">
            <img src="{{ asset('assets/img/icons/bulk-upload-icon.svg') }}" class="icon mr-2" />
            Bulk Upload</a>
    </div>
@endsection

@section('content')
    <section class="patient_details">
        <section class="patient_details-aside navbar navbar-dark">
            <div class="sidebar" id="collapsibleNavbar">
                <div class="block">
                    <div class="height-83"></div>
                    <img src="{{ asset('assets/img/user/01.png') }}" alt="Welcome to Doral"
                         srcset="{{ asset('assets/img/user/01.png') }}" class="img-fluid img-100">
                </div>
                <div>
                    <h1 class="patient-name mb-1">{{ $patient_detail->first_name }} {!! $patient_detail->last_name !!}</h1>
                    <div class="d-flex justify-content-center">
                        <ul class="pdetail">
                            <li class="nav">Admission ID:&nbsp; <span class="pdata">ABCD1234</span></li>
                            <li class="nav">Gender:&nbsp; <span class="pdata">{!! $patient_detail->gender !!}</span></li>
                            <li class="nav">DOB:&nbsp; <span class="pdata">{!! $patient_detail->dob !!}</span></li>
                        </ul>
                    </div>
                </div>
                <!-- Left Section Start -->
                <div>
                    <ul class="patient_nav nav" >
                        <li class="mb-2">
                            <a href="#demographics" class="active"  data-toggle="pill" role="tab">
                                <img src="{{ asset('assets/img/icons/demographic_icon.svg') }}" alt=""
                                     srcset="{{ asset('assets/img/icons/demographic_icon.svg') }}" class="_icon mr-2">Demographics</a>
                        </li>
                        <li class="mb-2">
                            <a href="#Insurance" data-toggle="pill" role="tab">
                                <img src="{{ asset('assets/img/icons/insurance_icon.svg') }}" alt=""
                                     srcset="{{ asset('assets/img/icons/insurance_icon.svg') }}" class="_icon mr-2">Insurance</a>
                        </li>
                        <li class="mb-2">
                            <a href="#HomeCare" data-toggle="pill" role="tab">
                                <img src="{{ asset('assets/img/icons/homecare_icon.svg') }}"
                                     alt="" srcset="{{ asset('assets/img/icons/homecare_icon.svg') }}"
                                     class="_icon mr-2">Home Care</a>
                        </li>
                        <li class="mb-2">
                            <a href="#Clinical" data-toggle="pill" role="tab">
                                <img src="../assets/img/icons/clinical_icon.svg"
                                     alt=""
                                     srcset="../assets/img/icons/clinical_icon.svg" class="_icon mr-2">Clinical</a></li>
                        <li class="mb-2"><a href="#Physician" data-toggle="pill" role="tab"><img src="../assets/img/icons/physician_icon.svg" alt=""
                                                                                                 srcset="../assets/img/icons/physician_icon.svg" class="_icon mr-2">Physician</a></li>
                        <li class="mb-2"><a href="#Diagnosis" data-toggle="pill" role="tab"><img src="../assets/img/icons/dignosis_icon.svg" alt=""
                                                                                                 srcset="../assets/img/icons/dignosis_icon.svg" class="_icon mr-2">Diagnosis</a></li>
                        <li class="mb-2"><a href="#MedProfile" data-toggle="pill" role="tab"><img src="../assets/img/icons/medprofile_icon.svg" alt=""
                                                                                                  srcset="../assets/img/icons/medprofile_icon.svg" class="_icon mr-2">Med Profile</a></li>
                        <li class="mb-2"><a href="#Pharmacy" data-toggle="pill" role="tab"><img src="../assets/img/icons/pharmacy_icon.svg" alt=""
                                                                                                srcset="../assets/img/icons/pharmacy_icon.svg" class="_icon mr-2">Pharmacy</a></li>
                    </ul>
                </div>
        </section>
        <section class="patient_details_content pl-1">
            <!-- Right section Start-->
            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="demographics" role="tabpanel" aria-labelledby="v-pills-home-tab">
                    <h1 class="demographics_title">Demographics</h1>
                    <div class="demographics_detail">
                        <ul>
                            <li>
                                <div class="demo_border">
                                    <h3 class="_title">First Name</h3>
                                    <h1 class="_detail">{!! $patient_detail->first_name !!}</h1>
                                </div>
                            </li>
                            <li>
                                <div class="demo_border">
                                    <h3 class="_title">Middle Name</h3>
                                    <h1 class="_detail">{!! $patient_detail->first_name !!}</h1>
                                </div>
                            </li>
                            <li>
                                <div class="demo_border">
                                    <h3 class="_title">Last Name</h3>
                                    <h1 class="_detail">{!! $patient_detail->last_name !!}</h1>
                                </div>
                            </li>
                        </ul>
                        <ul>
                            <li>
                                <div class="demo_border">
                                    <h3 class="_title">DOB</h3>
                                    <h1 class="_detail">{!! $patient_detail->dob !!}</h1>
                                </div>
                            </li>
                            <li>
                                <div class="demo_border">
                                    <h3 class="_title">Gender</h3>
                                    <h1 class="_detail">{!! $patient_detail->gender !!}</h1>
                                </div>
                            </li>
                            <li>
                                <div class="demo_border">
                                    <h3 class="_title">Race</h3>
                                    <h1 class="_detail">{!! $patient_detail->race !!}</h1>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="tab-pane fade" id="Insurance" role="tabpanel">MessagesMessagesMessagesMessagesMessages</div>
                <div class="tab-pane fade" id="HomeCare" role="tabpanel" aria-labelledby="v-pills-messages-tab">...</div>
                <div class="tab-pane fade" id="Clinical" role="tabpanel" aria-labelledby="v-pills-settings-tab">...</div>
                <div class="tab-pane fade" id="Physician" role="tabpanel">MessagesMessagesMessagesMessagesMessages</div>
                <div class="tab-pane fade" id="Diagnosis" role="tabpanel" aria-labelledby="v-pills-messages-tab">...</div>
                <div class="tab-pane fade" id="MedProfile" role="tabpanel" aria-labelledby="v-pills-settings-tab">...</div>
                <div class="tab-pane fade" id="Pharmacy" role="tabpanel" aria-labelledby="v-pills-settings-tab">...</div>
            </div>
        </section>
    </section>
@endsection

@push('scripts')

@endpush
