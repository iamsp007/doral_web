@extends('pages.layouts.app')

@section('title','Patient Detail')
@section('pageTitleSection')
    <img src="{{ asset('assets/img/icons/computer-icon.svg') }}" class="vbcIcon mr-2"> Patient Detail
@endsection

@section('content')
    <section class="details">
        <section class="details-aside navbar navbar-dark">
            <div class="sidebar mb-2" id="collapsibleNavbar">
                <div class="block">
                    <div class="height-83"></div>
                    @if(isset($details->avatar))
                        <img src="{{ asset('assets/img/user/01.png') }}" alt="Welcome to Doral" srcset="{{ asset('assets/img/user/01.png') }}"
                             class="img-fluid img-100">
                    @else
                        <img src="{{ asset('assets/img/user/01.png') }}" alt="Welcome to Doral" srcset="{{ asset('assets/img/user/01.png') }}"
                             class="img-fluid img-100">
                    @endif

                </div>
                <div>
                    <h1 class="patient-name mb-1">{!! $details->first_name !!} {!! $details->last_name !!}</h1>
                    <div class="d-flex justify-content-center">
                        <ul class="pdetail">
                            <li class="nav">Admission ID:&nbsp; <span class="pdata">{!! $details->detail?$details->detail->ssn:'' !!}</span></li>
                            <li class="nav">Gender:&nbsp; <span class="pdata">{!! $details->gender_name !!}</span></li>
                            <li class="nav">DOB:&nbsp; <span class="pdata">{!! $details->dob !!}</span></li>
                        </ul>
                    </div>
                </div>
                <!-- Left Section Start -->
                <div>
                    <ul class="patient-nav nav">
                        <li class="mb-2">
                            <a href="#demographics" class="active" data-toggle="pill" role="tab">
                                <img src="{{ asset('assets/img/icons/demographic_icon.svg') }}" alt=""
                                     srcset="{{ asset('assets/img/icons/demographic_icon.svg') }}"
                                     class="_icon mr-2">Demographics</a>
                        </li>
                        <li class="mb-2">
                            <a href="#Insurance" data-toggle="pill" role="tab">
                                <img src="{{ asset('assets/img/icons/insurance_icon.svg') }}" alt=""
                                     srcset="{{ asset('assets/img/icons/insurance_icon.svg') }}" class="_icon mr-2">Insurance</a>
                        </li>
                        <li class="mb-2"><a href="#HomeCare" data-toggle="pill" role="tab"><img
                                    src="{{ asset('assets/img/icons/homecare_icon.svg') }}" alt=""
                                    srcset="{{ asset('assets/img/icons/homecare_icon.svg') }}" class="_icon mr-2">Home Care</a></li>
                        <li class="mb-2"><a href="#Clinical" data-toggle="pill" role="tab"><img
                                    src="{{ asset('assets/img/icons/clinical_icon.svg') }}" alt=""
                                    srcset="{{ asset('assets/img/icons/clinical_icon.svg') }}" class="_icon mr-2">Clinical</a></li>
                        <li class="mb-2"><a href="#Physician" data-toggle="pill" role="tab"><img
                                    src="{{ asset('assets/img/icons/physician_icon.svg') }}" alt=""
                                    srcset="{{ asset('assets/img/icons/physician_icon.svg') }}" class="_icon mr-2">Physician</a>
                        </li>
                        <li class="mb-2"><a href="#Diagnosis" data-toggle="pill" role="tab"><img
                                    src="{{ asset('assets/img/icons/dignosis_icon.svg') }}" alt=""
                                    srcset="{{ asset('assets/img/icons/dignosis_icon.svg') }}" class="_icon mr-2">Diagnosis</a></li>
                        <li class="mb-2"><a href="#MedProfile" data-toggle="pill" role="tab"><img
                                    src="{{ asset('assets/img/icons/medprofile_icon.svg') }}" alt=""
                                    srcset="{{ asset('assets/img/icons/medprofile_icon.svg') }}" class="_icon mr-2">Med Profile</a>
                        </li>
                        <li class="mb-2"><a href="#Pharmacy" data-toggle="pill" role="tab"><img
                                    src="{{ asset('assets/img/icons/pharmacy_icon.svg') }}" alt=""
                                    srcset="{{ asset('assets/img/icons/pharmacy_icon.svg') }}" class="_icon mr-2">Pharmacy</a></li>
                    </ul>
                </div>
        </section>
        <section class="details-content scrollbar-detail scrollbar">
            <!-- Right section Start-->
            <div class="tab-content" id="v-pills-tabContent">
                <!-- Demographics Start -->
                <div class="tab-pane fade show active" id="demographics" role="tabpanel"
                     aria-labelledby="v-pills-home-tab">
                    <div class="app-card" style="min-height: auto;">
                        <div class="card-header" id="step2">
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('assets/img/icons/demographic_icon.svg') }}" alt=""
                                     srcset="{{ asset('assets/img/icons/demographic_icon.svg') }}" class="_icon mr-2"></a>
                                Demographics
                            </div>
                            <hr>
                        </div>
                        <div class="card-body collapse show" id="collapseWork" aria-labelledby="collapseWork"
                             data-parent="#profileAccordion">
                            <div class="row">
                                <div class="col-12 col-sm-12">
                                    <div class="row mb-3">
                                        <div class="col-12 col-sm-4">
                                            <div class="d-flex align-items-center">
                                                <div>
                                                    <i class="las la-phone circle-icon"></i>
                                                </div>
                                                <div>
                                                    <h3 class="_title">Phone</h3>
                                                    <h1 class="_detail">{!! $details->phone !!}</h1>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="d-flex align-items-center">
                                                <div>
                                                    <i class="las la-envelope circle-icon"></i>
                                                </div>
                                                <div>
                                                    <h3 class="_title">Email</h3>
                                                    <h1 class="_detail">{!! $details->detail?$details->detail->email:$details->email !!}</h1>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div>
                                                <div class="d-flex align-items-center">
                                                    <div>
                                                        <i class="las la-calendar circle-icon"></i>
                                                    </div>
                                                    <div>
                                                        <h3 class="_title">Start Date</h3>
                                                        <h1 class="_detail">{!! $details->detail?$details->detail->start_date:'' !!}</h1>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-12 col-sm-4">
                                            <div class="d-flex align-items-center ">
                                                <div>
                                                    <i class="las la-angle-double-right circle-icon"></i>
                                                </div>
                                                <div>
                                                    <h3 class="_title">Ethnicity</h3>
                                                    <h1 class="_detail">lorem ipus</h1>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div>
                                                <div class="d-flex align-items-center">
                                                    <div>
                                                        <i class="las la-angle-double-right circle-icon"></i>
                                                    </div>
                                                    <div>
                                                        <h3 class="_title">SSN#</h3>
                                                        <h1 class="_detail">{!! $details->detail?$details->detail->ssn:'' !!}</h1>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div>
                                                <div class="d-flex align-items-center">
                                                    <div>
                                                        <i class="las la-angle-double-right circle-icon"></i>
                                                    </div>
                                                    <div>
                                                        <h3 class="_title">Admission ID:</h3>
                                                        <h1 class="_detail">{!! $details->detail?$details->detail->ssn:'' !!}</h1>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-12 col-sm-4">
                                            <div class="d-flex align-items-center ">
                                                <div>
                                                    <i class="las la-angle-double-right circle-icon"></i>
                                                </div>
                                                <div>
                                                    <h3 class="_title">Nurse</h3>
                                                    <h1 class="_detail">lorem ipus</h1>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div>
                                                <div class="d-flex align-items-center">
                                                    <div>
                                                        <i class="las la-angle-double-right circle-icon"></i>
                                                    </div>
                                                    <div>
                                                        <h3 class="_title">Patient ID</h3>
                                                        <h1 class="_detail">{!! $details->detail?$details->detail->ssn:'' !!}</h1>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div>
                                                <div class="d-flex align-items-center">
                                                    <div>
                                                        <i class="las la-angle-double-right circle-icon"></i>
                                                    </div>
                                                    <div>
                                                        <h3 class="_title">Coordinator</h3>
                                                        <h1 class="_detail">lorem ipus</h1>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-12 col-sm-4">
                                            <div>
                                                <div class="d-flex align-items-center">
                                                    <div>
                                                        <i class="las la-angle-double-right circle-icon"></i>
                                                    </div>
                                                    <div>
                                                        <h3 class="_title">HI Claim Number</h3>
                                                        <h1 class="_detail">75443</h1>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-8">
                                            <div class="d-flex align-items-center mb-3">
                                                <div>
                                                    <i class="las la-map-marker circle-icon"></i>
                                                </div>
                                                <div>
                                                    <h3 class="_title">Address 1</h3>
                                                    <h1 class="_detail">{!! $details->detail?$details->detail->address_1:'' !!},
                                                        <span>{!! $details->detail?$details->detail->Zip:'' !!}</span>
                                                        <a class="btn btn-info btn-sm ml-2" data-toggle="collapse"
                                                           data-lat="{{ $details->latitude }}"
                                                           data-lng="{{ $details->longitude }}"
                                                           id="view-map"
                                                           href="#collapseExample"><i class="las la-map-marker"></i>View
                                                            Map</a>
                                                    </h1>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="collapse mb-4" id="collapseExample">
                                        <div class="card card-body">
                                            <div id="map" style="height: 200px; width: 100%;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="_card">
                                <div class="_card_header">
                                    <div class="title-head">Emergency contact Detail</div>
                                </div>
                                <div class="_card_body">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-12 col-sm-4">
                                                <div>
                                                    <div class="d-flex align-items-center">
                                                        <div>
                                                            <i class="las la-user-nurse circle-icon"></i>
                                                        </div>
                                                        <div>
                                                            <h3 class="_title">Contact Name</h3>
                                                            <h1 class="_detail">{!! $details->detail?$details->detail->eng_name:'' !!}</h1>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-4">
                                                <div>
                                                    <div class="d-flex align-items-center">
                                                        <div>
                                                            <i class="las la-phone  circle-icon"></i>
                                                        </div>
                                                        <div>
                                                            <h3 class="_title">Home Phone</h3>
                                                            <h1 class="_detail">{!! $details->detail?$details->detail->emg_phone:'-' !!}</h1>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-4">
                                                <div>
                                                    <div class="d-flex align-items-center">
                                                        <div>
                                                            <i class="las la-user-nurse circle-icon"></i>
                                                        </div>
                                                        <div>
                                                            <h3 class="_title">Relation</h3>
                                                            <h1 class="_detail">{!! $details->detail?$details->detail->emg_relationship:'' !!}</h1>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-sm-4">
                                            <div>
                                                <div class="d-flex align-items-center">
                                                    <div>
                                                        <i class="las la-phone  circle-icon"></i>
                                                    </div>
                                                    <div>
                                                        <h3 class="_title">Address</h3>
                                                        <h1 class="_detail">{!! $details->detail?$details->detail->eng_addres:'' !!}</h1>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="_card mt-3">
                                <div class="_card_header">
                                    <div class="title-head">If unavailable (2nd) contact Detail</div>
                                </div>
                                <div class="_card_body">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-12 col-sm-4">
                                                <div>
                                                    <div class="d-flex align-items-center">
                                                        <div>
                                                            <i class="las la-user-nurse circle-icon"></i>
                                                        </div>
                                                        <div>
                                                            <h3 class="_title">Contact Name</h3>
                                                            <h1 class="_detail">{!! $details->detail?$details->detail->phone1:'' !!}</h1>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-4">
                                                <div>
                                                    <div class="d-flex align-items-center">
                                                        <div>
                                                            <i class="las la-phone  circle-icon"></i>
                                                        </div>
                                                        <div>
                                                            <h3 class="_title">Home Phone</h3>
                                                            <h1 class="_detail">{!! $details->detail?$details->detail->phone2:'' !!}</h1>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-4">
                                                <div>
                                                    <div class="d-flex align-items-center">
                                                        <div>
                                                            <i class="las la-phone  circle-icon"></i>
                                                        </div>
                                                        <div>
                                                            <h3 class="_title">Cell Phone</h3>
                                                            <h1 class="_detail">985471236</h1>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-sm-4">
                                            <div>
                                                <div class="d-flex align-items-center">
                                                    <div>
                                                        <i class="las la-phone  circle-icon"></i>
                                                    </div>
                                                    <div>
                                                        <h3 class="_title">Work Phone</h3>
                                                        <h1 class="_detail">985471236</h1>
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
                <!-- Demographics End -->
                <!-- Insurance Start -->
                <div class="tab-pane fade" id="Insurance" role="tabpanel">
                    <div class="app-card" style="min-height: auto;">
                        <div class="card-header" id="step2">
                            <div class="d-flex align-items-center">
                                <img src="../assets/img/icons/insurance_icon.svg" alt=""
                                     srcset="../assets/img/icons/insurance_icon.svg" class="_icon mr-2"></a>
                                Insurance
                            </div>
                            <hr>
                        </div>
                        <div class="card-body collapse show" id="collapseWork" aria-labelledby="collapseWork"
                             data-parent="#profileAccordion">
                            <div class="_card">
                                <div class="_card_header">
                                    <div class="title-head">Medicaid</div>
                                    <button type="button" class="btn btn-sm btn-info">Verify Recertification
                                        Date</button>
                                </div>
                                <div class="_card_body">
                                    <div class="row">
                                        <div class="col-12 col-sm-12">
                                            <div>
                                                <div class="row">
                                                    <div class="col-12 col-sm-4">
                                                        <div>
                                                            <div class="d-flex align-items-center">
                                                                <div>
                                                                    <i class="las la-angle-double-right circle-icon"></i>
                                                                </div>
                                                                <div>
                                                                    <h3 class="_title">Madicaid No</h3>
                                                                    <h1 class="_detail">ABCD1234</h1>
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
                            <div class="_card mt-3">
                                <div class="_card_header">
                                    <div class="title-head">Medicare</div>
                                    <button type="button" class="btn btn-sm btn-info">Verify Recertification
                                        Date</button>
                                </div>
                                <div class="_card_body">
                                    <div class="row">
                                        <div class="col-12 col-sm-12">
                                            <div>
                                                <div class="row">
                                                    <div class="col-12 col-sm-4">
                                                        <div>
                                                            <div class="d-flex align-items-center">
                                                                <div>
                                                                    <i class="las la-angle-double-right circle-icon"></i>
                                                                </div>
                                                                <div>
                                                                    <h3 class="_title">Medicare No</h3>
                                                                    <h1 class="_detail">ABCD1234</h1>
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
                            <div class="_card _add_new_company mt-3">
                                <div class="_card_header">
                                    <div class="title-head">Croley Insurance and Financial</div>
                                    <a class="add_new_company" href="javascript:void(0)" data-toggle="tooltip"
                                       data-placement="left" title="Add New Insurance Company"><i
                                            class="las la-plus-circle la-2x"></i></a>
                                </div>
                                <div class="_card_body">
                                    <div class="row">
                                        <div class="col-12 col-sm-12">
                                            <div>
                                                <div class="row">
                                                    <div class="col-12 col-sm-4">
                                                        <div>
                                                            <div class="d-flex align-items-center">
                                                                <div>
                                                                    <i class="las la-angle-double-right circle-icon"></i>
                                                                </div>
                                                                <div>
                                                                    <h3 class="_title">Payer Id</h3>
                                                                    <h1 class="_detail">13162</h1>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-4">
                                                        <div class="d-flex align-items-center">
                                                            <div>
                                                                <i class="las la-phone circle-icon"></i>
                                                            </div>
                                                            <div>
                                                                <h3 class="_title">Phone</h3>
                                                                <h1 class="_detail">9855665324</h1>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-4">
                                                        <div class="d-flex align-items-center ">
                                                            <div>
                                                                <i class="las la-angle-double-right circle-icon"></i>
                                                            </div>
                                                            <div>
                                                                <h3 class="_title">Policy Number</h3>
                                                                <h1 class="_detail">ABCD123456</h1>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="_card mt-3 insurance_company">
                                <div class="_card_header d-block">
                                    <div class="title-head">
                                        <div>
                                            <input type="text" class="form-control form-control-lg" id="comapnyName"
                                                   name="comapnyName" aria-describedby="comapnyNameHelp"
                                                   placeholder="Enter Insurance Company Name">
                                        </div>
                                    </div>
                                </div>
                                <div class="_card_body">
                                    <div class="row">
                                        <div class="col-12 col-sm-12">
                                            <div>
                                                <div class="row">
                                                    <div class="col-12 col-sm-4">
                                                        <div>
                                                            <div class="d-flex align-items-center">
                                                                <div>
                                                                    <i class="las la-angle-double-right circle-icon"></i>
                                                                </div>
                                                                <div>
                                                                    <h3 class="_title">Payer Id</h3>
                                                                    <div class="_detail">
                                                                        <input type="text" class="form-control form-control-lg"
                                                                               id="payerId" name="payerId"
                                                                               aria-describedby="payerIdHelp"
                                                                               placeholder="Enter Payer ID">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-4">
                                                        <div class="d-flex align-items-center">
                                                            <div>
                                                                <i class="las la-phone circle-icon"></i>
                                                            </div>
                                                            <div>
                                                                <h3 class="_title">Phone</h3>
                                                                <div class="_detail">
                                                                    <input type="text" class="form-control form-control-lg"
                                                                           id="phoneNo" name="phoneNo"
                                                                           aria-describedby="phoneNoHelp"
                                                                           placeholder="Enter Phone No">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-4">
                                                        <div class="d-flex align-items-center ">
                                                            <div>
                                                                <i class="las la-angle-double-right circle-icon"></i>
                                                            </div>
                                                            <div>
                                                                <h3 class="_title">Policy Number</h3>
                                                                <div class="_detail">
                                                                    <input type="text" class="form-control form-control-lg"
                                                                           id="policyNo" name="policyNo"
                                                                           aria-describedby="policyNoHelp"
                                                                           placeholder="Enter Policy No">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="col-12 col-sm-4"></div>
                                                    <div class="col-12 col-sm-4"></div>
                                                    <div class="col-12 col-sm-4">
                                                        <div class=" d-flex justify-content-end">
                                                            <button type="button"
                                                                    class="btn btn-info btn-sm save_item">Save</button>
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
                <!-- Insurance End -->
                <!-- HomeCare Start -->
                <div class="tab-pane fade" id="HomeCare" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                    <div class="app-card" style="min-height: auto;">
                        <div class="card-header" id="step2">
                            <div class="d-flex align-items-center">
                                <img src="../assets/img/icons/homecare_icon.svg" alt=""
                                     srcset="../assets/img/icons/homecare_icon.svg" class="_icon mr-2"></a>
                                Home Care
                            </div>
                            <hr>
                        </div>
                        <div class="card-body collapse show" id="collapseWork" aria-labelledby="collapseWork"
                             data-parent="#profileAccordion">
                            <div class="row">
                                <div class="col-12 col-sm-12">
                                    <div class="row mb-3">
                                        <div class="col-12 col-sm-4">
                                            <div class="d-flex align-items-center ">
                                                <div>
                                                    <i class="las la-user-nurse circle-icon"></i>
                                                </div>
                                                <div>
                                                    <h3 class="_title">Name</h3>
                                                    <h1 class="_detail">Lorem Ipsum</h1>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="d-flex align-items-center ">
                                                <div>
                                                    <i class="las la-user-nurse circle-icon"></i>
                                                </div>
                                                <div>
                                                    <h3 class="_title">Coordinator</h3>
                                                    <h1 class="_detail">Lorem Ipsum</h1>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div>
                                                <div class="d-flex align-items-center">
                                                    <div>
                                                        <i class="las la-phone  circle-icon"></i>
                                                    </div>
                                                    <div>
                                                        <h3 class="_title">Phone</h3>
                                                        <h1 class="_detail">(555) 555-5555</h1>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center mb-3">
                                        <div>
                                            <i class="las la-map-marker circle-icon"></i>
                                        </div>
                                        <div>
                                            <h3 class="_title">Address</h3>
                                            <h1 class="_detail">4009 Heron Way, Portland OR Oregon, <span>97232</span>
                                            </h1>
                                        </div>
                                    </div>
                                    <div class="_card">
                                        <div class="_card_header">
                                            <div class="title-head">Administrator Detail</div>
                                        </div>
                                        <div class="_card_body">
                                            <div>
                                                <div class="row">
                                                    <div class="col-12 col-sm-4">
                                                        <div class="d-flex align-items-center ">
                                                            <div>
                                                                <i class="las la-user-nurse circle-icon"></i>
                                                            </div>
                                                            <div>
                                                                <h3 class="_title">Name</h3>
                                                                <h1 class="_detail">Ara lus</h1>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-4">
                                                        <div>
                                                            <div class="d-flex align-items-center">
                                                                <div>
                                                                    <i class="las la-phone  circle-icon"></i>
                                                                </div>
                                                                <div>
                                                                    <h3 class="_title">Phone</h3>
                                                                    <h1 class="_detail">13162</h1>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="_card mt-3">
                                        <div class="_card_header">
                                            <div class="title-head">Caregiver Detail</div>
                                            <button type="button" class="btn btn-sm btn-info">Check Update</button>
                                        </div>
                                        <div class="_card_body">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-12 col-sm-6">
                                                        <div class="d-flex align-items-center ">
                                                            <div>
                                                                <i class="las la-user-nurse circle-icon"></i>
                                                            </div>
                                                            <div>
                                                                <h3 class="_title">Caregiver Name</h3>
                                                                <h1 class="_detail">Ara lus</h1>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-6">
                                                        <div>
                                                            <div class="d-flex align-items-center">
                                                                <div>
                                                                    <i class="las la-phone  circle-icon"></i>
                                                                </div>
                                                                <div>
                                                                    <h3 class="_title">Phone</h3>
                                                                    <h1 class="_detail">13162</h1>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="row">
                                                    <div class="col-12 col-sm-6">
                                                        <div class="d-flex align-items-center ">
                                                            <div>
                                                                <i class="las la-clock circle-icon"></i>
                                                            </div>
                                                            <div>
                                                                <h3 class="_title">Schedule start time</h3>
                                                                <h1 class="_detail">10:00 AM</h1>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-6">
                                                        <div class="d-flex align-items-center">
                                                            <div>
                                                                <i class="las la-clock circle-icon"></i>
                                                            </div>
                                                            <div>
                                                                <h3 class="_title">Schedule End time</h3>
                                                                <h1 class="_detail">8:00 PM</h1>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <h1 class="profile-title">History</h1>
                                    <table class="table table-bordered" style="width: 100%;" id="employee-table">
                                        <thead class="thead-inverse">
                                        <tr>
                                            <th>Name</th>
                                            <th>Phone No</th>
                                            <th>Schedule Start Date Time</th>
                                            <th>Schedule End Date Time</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td class="text-green">Airi Satou</td>
                                            <td><a href="javascript:void(0)" class="patient_phone_no">8866246684</a>
                                            </td>
                                            <td>Sunday, 1 October 2020</td>
                                            <td>Wednesday, 4 October 2020</td>
                                        </tr>
                                        <tr>
                                            <td class="text-green">Airi Satou</td>
                                            <td><a href="javascript:void(0)" class="patient_phone_no">8866246684</a>
                                            </td>
                                            <td>Sunday, 1 October 2020</td>
                                            <td>Wednesday, 4 October 2020</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <h1 class="profile-title">Caregiver Interaction Detail</h1>
                                    <div>
                                        <table class="table table-bordered" style="width: 100%;" id="employee-table">
                                            <thead class="thead-inverse">
                                            <tr>
                                                <th>Infraction</th>
                                                <th>Sent Date and Time</th>
                                                <th>Response Date and Time</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td class="text-green"><a href="javascript:void(0)">Infraction</a></td>
                                                <td>Sunday, 1 October 2020</td>
                                                <td>Wednesday, 4 October 2020</td>
                                                <td>
                                                    <a href="referral_user_profile.html"
                                                       class="btn btn-info btn-sm btn-block">Action Taken</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-green"><a href="javascript:void(0)">Infraction</a> </td>
                                                <td>Sunday, 1 October 2020</td>
                                                <td>Wednesday, 4 October 2020</td>
                                                <td>
                                                    <a href="referral_user_profile.html"
                                                       class="btn btn-info btn-sm btn-block">Action Taken</a>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <h1 class="profile-title">Value base care Detail</h1>
                                    <div class="_card mt-3">
                                        <div class="_card_header">
                                            <div class="title-head"><span style="font-weight: bold;">Q:</span>
                                                Lorem Ipsum is simply dummy text of the printing and typesetting industry?
                                            </div>
                                        </div>
                                        <div class="_card_body">
                                            <h1 class="_title"><span style="font-weight: bold;">Ans:</span> Lorem Ipsum
                                                has been the industry's standard dummy text ever since the 1500s.
                                            </h1>
                                        </div>
                                    </div>
                                    <div class="_card mt-3">
                                        <div class="_card_header">
                                            <div class="title-head"><span style="font-weight: bold;">Q:</span>
                                                Lorem Ipsum is simply dummy text of the printing and typesetting industry?
                                            </div>
                                        </div>
                                        <div class="_card_body">
                                            <h1 class="_title"><span style="font-weight: bold;">Ans:</span> Lorem Ipsum
                                                has been the industry's standard dummy text ever since the 1500s.
                                            </h1>
                                        </div>
                                    </div>
                                    <div class="_card mt-3">
                                        <div class="_card_header">
                                            <div class="title-head"><span style="font-weight: bold;">Q:</span>
                                                Lorem Ipsum is simply dummy text of the printing and typesetting industry?
                                            </div>
                                        </div>
                                        <div class="_card_body">
                                            <h1 class="_title"><span style="font-weight: bold;">Ans:</span> Lorem Ipsum
                                                has been the industry's standard dummy text ever since the 1500s.
                                            </h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- HomeCare End -->
                <!-- Clinical Start -->
                <div class="tab-pane fade" id="Clinical" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                    <div class="app-card" style="min-height: auto;">
                        <div class="card-header" id="step2">
                            <div class="d-flex align-items-center">
                                <img src="../assets/img/icons/clinical_icon.svg" alt=""
                                     srcset="../assets/img/icons/clinical_icon.svg" class="_icon mr-2"></a>
                                Clinical
                            </div>
                            <hr>
                        </div>
                        <div class="card-body collapse show" id="collapseWork" aria-labelledby="collapseWork"
                             data-parent="#profileAccordion">
                            <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="Details-tab" data-toggle="tab" href="#SOCIAL-PRO" role="tab" aria-controls="SOCIAL-PRO" aria-selected="true">SOCIAL PRO</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="Address-tab" data-toggle="tab" href="#MD-MED-PROFILE" role="tab" aria-controls="MD-MED-PROFILE" aria-selected="false">MD MED PROFILE</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="Address-tab" data-toggle="tab" href="#BEHAVIOR-PROFILE" role="tab" aria-controls="BEHAVIOR-PROFILE" aria-selected="false">BEHAVIOR PROFILE</a>
                                </li>
                                <!-- <li class="nav-item">
                                   <a class="nav-link" id="Address-tab" data-toggle="tab" href="#ASSESSMENT" role="tab" aria-controls="Address" aria-selected="false">ASSESSMENT</a>
                                </li>
                                <li class="nav-item">
                                   <a class="nav-link" id="Address-tab" data-toggle="tab" href="#PROGRESS-NOTE-ENCOUNTER" role="tab" aria-controls="Address" aria-selected="false">PROGRESS NOTE > ENCOUNTER</a>
                                </li>
                                <li class="nav-item">
                                   <a class="nav-link" id="Address-tab" data-toggle="tab" href="#PLANOFCARE" role="tab" aria-controls="Address" aria-selected="false">PLAN OF CARE</a>
                                </li>
                                <li class="nav-item">
                                   <a class="nav-link" id="Address-tab" data-toggle="tab" href="#COVER-NOTE" role="tab" aria-controls="Address" aria-selected="false">COVER NOTE</a>
                                </li> -->
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                                    <div class="dropdown-menu drop">
                                        <a class="nav-link border-0" id="Address-tab" data-toggle="tab" href="#ASSESSMENT" role="tab" aria-controls="ASSESSMENT" aria-selected="false">ASSESSMENT</a>
                                        <a class="nav-link border-0" id="Address-tab" data-toggle="tab" href="#PROGRESS-NOTE-ENCOUNTER" role="tab" aria-controls="PROGRESS-NOTE-ENCOUNTER" aria-selected="false">PROGRESS NOTE > ENCOUNTER</a>
                                        <a class="nav-link border-0" id="Address-tab" data-toggle="tab" href="#PLANOFCARE" role="tab" aria-controls="PLANOFCARE" aria-selected="false">PLAN OF CARE</a>
                                        <a class="nav-link border-0" id="Address-tab" data-toggle="tab" href="#COVER-NOTE" role="tab" aria-controls="COVER-NOTE" aria-selected="false">COVER NOTE</a>
                                    </div>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade" id="SOCIAL-PRO" role="tabpanel" aria-labelledby="SOCIAL-PRO-tab">
                                    <div class="row">
                                        <div class="col-12 col-sm-12">
                                            <div class="_card">
                                                <div class="_card_header">
                                                    <div class="title-head">Case Manager Instructions</div>
                                                    <a class="add_new_instruction" href="javascript:void(0)" data-toggle="tooltip"
                                                       data-placement="left" title="Add New Instruction"><i
                                                            class="las la-plus-circle la-2x"></i></a>
                                                </div>
                                                <div class="_card_body">
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-12 col-sm-12">
                                                                <div class="d-flex align-items-center">
                                                                    <div>
                                                                        <i class="las la-angle-double-right circle-icon"></i>
                                                                    </div>
                                                                    <div>
                                                                        <h3 class="_title">Magna vel volutpat pretium</h3>
                                                                        <h1 class="_detail">Etiam eu nulla vitae nibh luctus pretium at
                                                                            id orci</h1>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-12 col-sm-12">
                                                                <div class="d-flex align-items-center">
                                                                    <div>
                                                                        <i class="las la-angle-double-right circle-icon"></i>
                                                                    </div>
                                                                    <div>
                                                                        <h3 class="_title">Magna vel volutpat pretium</h3>
                                                                        <h1 class="_detail">Etiam eu nulla vitae nibh luctus pretium at
                                                                            id orci</h1>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="row">
                                                            <div class="col-12 col-sm-12">
                                                                <div class="d-flex align-items-center">
                                                                    <div>
                                                                        <i class="las la-angle-double-right circle-icon"></i>
                                                                    </div>
                                                                    <div>
                                                                        <h3 class="_title">Magna vel volutpat pretium</h3>
                                                                        <h1 class="_detail">Etiam eu nulla vitae nibh luctus pretium at
                                                                            id orci</h1>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="_card mt-3 _add_case_manager">
                                                <div class="_card_header">
                                                    <div class="title-head">Add Case Manager Instructions</div>
                                                </div>
                                                <div class="_card_body">
                                                    <div class="row">
                                                        <div class="col-12 col-sm-12">
                                                            <div>
                                                                <div class="d-flex align-items-center">
                                                                    <div>
                                                                        <h3 class="_title">Add Instruction</h3>
                                                                        <div class="_detail">
                                                                            <input type="text" class="form-control form-control-lg"
                                                                                   id="instructionId" name="instructionId"
                                                                                   aria-describedby="instructionIdHelp"
                                                                                   placeholder="Enter Instruction">
                                                                        </div>
                                                                    </div>
                                                                    <div>
                                                                        <h3 class="_title">&nbsp;</h3>
                                                                        <button type="button"
                                                                                class="btn btn-info ml-2 _save_items">Save</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="_card mt-3">
                                                <div class="_card_header">
                                                    <div class="title-head">Alergy</div>
                                                    <a class="add_new_alergy" href="javascript:void(0)" data-toggle="tooltip"
                                                       data-placement="left" title="Add New Alergy"><i
                                                            class="las la-plus-circle la-2x"></i></a>
                                                </div>
                                                <div class="_card_body">
                                                    <div>
                                                        <div class="row">
                                                            <div class="col-12 col-sm-12">
                                                                <select class="form-control alergy select" multiple
                                                                        name="referralType" id="referralType">
                                                                    <option value="Absorption">Absorption</option>
                                                                    <option value="Acellular">Acellular</option>
                                                                    <option value="Acellular vaccine">Acellular vaccine</option>
                                                                    <option value="Active immunity">Active immunity</option>
                                                                    <option value="Allegra Hives">Allegra Hives</option>
                                                                    <option value="Bacillus anthracis">Bacillus anthracis</option>
                                                                    <option value="Bee and Wasp Sting">Bee and Wasp Sting</option>
                                                                    <option value="Causes Chronic Sinusitis">Causes Chronic Sinusitis
                                                                    </option>
                                                                    <option value="Children's Allegra">Children's Allegra</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="alergy_box row mt-3"></div>
                                                </div>
                                            </div>
                                            <div class="_card mt-3 _add_alergy">
                                                <div class="_card_header">
                                                    <div class="title-head">Add Alergy</div>
                                                </div>
                                                <div class="_card_body">
                                                    <div class="row">
                                                        <div class="col-12 col-sm-12">
                                                            <div>
                                                                <div class="d-flex align-items-center">
                                                                    <div>
                                                                        <h3 class="_title">Add Alergy</h3>
                                                                        <div class="_detail">
                                                                            <input type="text" class="form-control form-control-lg"
                                                                                   id="alergyId" name="alergyId"
                                                                                   aria-describedby="alergyHelp" placeholder="Enter Alergy">
                                                                        </div>
                                                                    </div>
                                                                    <div>
                                                                        <h3 class="_title">&nbsp;</h3>
                                                                        <button type="button"
                                                                                class="btn btn-info ml-2 _save_alergy">Save</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="_card mt-3">
                                                <div class="_card_header">
                                                    <div class="title-head">CCM Details</div>
                                                </div>
                                                <div class="_card_body">
                                                    <div class="row">
                                                        <div class="col-12 col-sm-12">
                                                            <div class="d-flex align-items-center">
                                                                <div>
                                                                    <i class="las la-angle-double-right circle-icon"></i>
                                                                </div>
                                                                <div>
                                                                    <h3 class="_title">Blood Pressure</h3>
                                                                    <h1 class="_detail">Lastest Reading Diastolic: 120-150 High</h1>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-3">
                                                        <div class="col-12 col-sm-12">
                                                            <div class="d-flex align-items-center">
                                                                <div>
                                                                    <i class="las la-angle-double-right circle-icon"></i>
                                                                </div>
                                                                <div>
                                                                    <h3 class="_title">Glucometer</h3>
                                                                    <h1 class="_detail">Postprandial Blood Glucose : 180 mg/dL
                                                                    </h1>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-3">
                                                        <div class="col-12 col-sm-12">
                                                            <div class="d-flex align-items-center">
                                                                <div>
                                                                    <i class="las la-angle-double-right circle-icon"></i>
                                                                </div>
                                                                <div>
                                                                    <h3 class="_title">Digital Weight Machine</h3>
                                                                    <h1 class="_detail">Avg Reading: SpO2:
                                                                        98%, Pulse: 72bpm</h1>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-3">
                                                        <div class="col-12 col-sm-12">
                                                            <div class="d-flex align-items-center">
                                                                <div>
                                                                    <i class="las la-angle-double-right circle-icon"></i>
                                                                </div>
                                                                <div>
                                                                    <h3 class="_title">Pulse Oximetry</h3>
                                                                    <h1 class="_detail">Avg Reading: SaO2:
                                                                        89%</h1>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="_card mt-3">
                                                <div class="_card_header">
                                                    <div class="title-head">RPM Details</div>
                                                </div>
                                                <div class="_card_body">
                                                    <div class="row">
                                                        <div class="col-12 col-sm-12">
                                                            <div class="d-flex align-items-center">
                                                                <div>
                                                                    <i class="las la-angle-double-right circle-icon"></i>
                                                                </div>
                                                                <div>
                                                                    <h3 class="_title">Blood Pressure</h3>
                                                                    <h1 class="_detail">Lastest Reading Diastolic: 120-150 High</h1>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="_card mt-3">
                                                <div class="_card_header">
                                                    <div class="title-head">MD orders</div>
                                                </div>
                                                <div class="_card_body">
                                                    <div class="row">
                                                        <div class="col-12 col-sm-4">
                                                            <div class="d-flex align-items-center">
                                                                <div>
                                                                    <i class="las la-angle-double-right circle-icon"></i>
                                                                </div>
                                                                <div>
                                                                    <a href="#" class="_detail"
                                                                       style="text-decoration: underline;">m_11q</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-4">
                                                            <div class="d-flex align-items-center">
                                                                <div>
                                                                    <i class="las la-angle-double-right circle-icon"></i>
                                                                </div>
                                                                <div>
                                                                    <a href="#" class="_detail"
                                                                       style="text-decoration: underline;">DOH-4359(2010)</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="_card mt-3">
                                                <div class="_card_header">
                                                    <div class="title-head">Upload Document</div>
                                                </div>
                                                <div class="_card_body">
                                                    <div class="row">
                                                        <div class="col-12 col-sm-12">
                                                            <input type="file" class="form-control" style="height: inherit;"
                                                                   id="uploadphoto" value="" name="uploadphoto"
                                                                   aria-describedby="uploadphoto">
                                                            <div class="invalid-feedback d-none"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="MD-MED-PROFILE" role="tabpanel" aria-labelledby="MD-MED-PROFILE-tab">
                                </div>
                                <div class="tab-pane fade" id="BEHAVIOR-PROFILE" role="tabpanel" aria-labelledby="BEHAVIOR-PROFILE-tab">
                                </div>
                                <div class="tab-pane fade" id="ASSESSMENT" role="tabpanel" aria-labelledby="ASSESSMENT-tab">1
                                </div>
                                <div class="tab-pane fade" id="PROGRESS-NOTE-ENCOUNTER" role="tabpanel" aria-labelledby="PROGRESS-NOTE-ENCOUNTER-tab">2
                                </div>
                                <div class="tab-pane fade" id="PLANOFCARE" role="tabpanel" aria-labelledby="PLANOFCARE-tab">3
                                </div>
                                <div class="tab-pane fade" id="COVER-NOTE" role="tabpanel" aria-labelledby="COVER-NOTE-tab">4
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Clinical End -->
                <!-- Physician Start -->
                <div class="tab-pane fade" id="Physician" role="tabpanel">
                    <div class="app-card" style="min-height: auto;">
                        <div class="card-header" id="step2">
                            <div class="d-flex align-items-center">
                                <img src="../assets/img/icons/physician_icon.svg" alt=""
                                     srcset="../assets/img/icons/physician_icon.svg" class="_icon mr-2"></a>
                                Physicians
                            </div>
                            <hr>
                        </div>
                        <div class="card-body collapse show" id="collapseWork" aria-labelledby="collapseWork"
                             data-parent="#profileAccordion">
                            <div class="_card">
                                <div class="_card_header">
                                    <div class="title-head">Primary Care Physician</div>
                                </div>
                                <div class="_card_body">
                                    <div class="row">
                                        <div class="col-12 col-sm-12">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-12 col-sm-4">
                                                        <div>
                                                            <div class="d-flex align-items-center">
                                                                <div>
                                                                    <i class="las la-angle-double-right circle-icon"></i>
                                                                </div>
                                                                <div>
                                                                    <h3 class="_title">Name</h3>
                                                                    <h1 class="_detail">Akshita Dariyani</h1>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-4">
                                                        <div class="d-flex align-items-center">
                                                            <div>
                                                                <i class="las la-phone circle-icon"></i>
                                                            </div>
                                                            <div>
                                                                <h3 class="_title">Address</h3>
                                                                <h1 class="_detail">1797 Pitkin Avenue Brooklyn, NY 11212</h1>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-4">
                                                        <div class="d-flex align-items-center ">
                                                            <div>
                                                                <i class="las la-angle-double-right circle-icon"></i>
                                                            </div>
                                                            <div>
                                                                <h3 class="_title">Phone Number With Ext</h3>
                                                                <h1 class="_detail">(555) 555-5555</h1>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="row">
                                                    <div class="col-12 col-sm-4">
                                                        <div>
                                                            <div class="d-flex align-items-center">
                                                                <div>
                                                                    <i class="las la-angle-double-right circle-icon"></i>
                                                                </div>
                                                                <div>
                                                                    <h3 class="_title">Email</h3>
                                                                    <h1 class="_detail">akshita@dariyani.com</h1>
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
                            <div class="_card mt-3">
                                <div class="_card_header">
                                    <div class="title-head">Specialist Physician</div>
                                </div>
                                <div class="_card_body">
                                    <div class="row">
                                        <div class="col-12 col-sm-12">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-12 col-sm-4">
                                                        <div>
                                                            <div class="d-flex align-items-center">
                                                                <div>
                                                                    <i class="las la-angle-double-right circle-icon"></i>
                                                                </div>
                                                                <div>
                                                                    <h3 class="_title">Name</h3>
                                                                    <h1 class="_detail">Akshita Dariyani</h1>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-4">
                                                        <div class="d-flex align-items-center">
                                                            <div>
                                                                <i class="las la-phone circle-icon"></i>
                                                            </div>
                                                            <div>
                                                                <h3 class="_title">Address</h3>
                                                                <h1 class="_detail">1797 Pitkin Avenue Brooklyn, NY 11212</h1>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-4">
                                                        <div class="d-flex align-items-center ">
                                                            <div>
                                                                <i class="las la-angle-double-right circle-icon"></i>
                                                            </div>
                                                            <div>
                                                                <h3 class="_title">Phone Number With Ext</h3>
                                                                <h1 class="_detail">(555) 555-5555</h1>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="row">
                                                    <div class="col-12 col-sm-4">
                                                        <div>
                                                            <div class="d-flex align-items-center">
                                                                <div>
                                                                    <i class="las la-angle-double-right circle-icon"></i>
                                                                </div>
                                                                <div>
                                                                    <h3 class="_title">Email</h3>
                                                                    <h1 class="_detail">akshita@dariyani.com</h1>
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
                            <div class="_card mt-3">
                                <div class="_card_header">
                                    <div class="title-head">Case Manager</div>
                                </div>
                                <div class="_card_body">
                                    <div class="row">
                                        <div class="col-12 col-sm-12">
                                            <div>
                                                <div class="row">
                                                    <div class="col-12 col-sm-4">
                                                        <div>
                                                            <div class="d-flex align-items-center">
                                                                <div>
                                                                    <i class="las la-angle-double-right circle-icon"></i>
                                                                </div>
                                                                <div>
                                                                    <h3 class="_title">Name</h3>
                                                                    <h1 class="_detail">Akshita Dariyani</h1>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-4">
                                                        <div>
                                                            <div class="d-flex align-items-center">
                                                                <div>
                                                                    <i class="las la-angle-double-right circle-icon"></i>
                                                                </div>
                                                                <div>
                                                                    <h3 class="_title">Employement Type</h3>
                                                                    <h1 class="_detail">Nurse Practitioner</h1>
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
                    </div>
                </div>
                <!-- Physician End -->
                <!-- Diagnosis Start -->
                <div class="tab-pane fade" id="Diagnosis" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                    <div class="app-card" style="min-height: auto;">
                        <div class="card-header" id="step2">
                            <div class="d-flex align-items-center">
                                <img src="../assets/img/icons/physician_icon.svg" alt=""
                                     srcset="../assets/img/icons/physician_icon.svg" class="_icon mr-2"></a>
                                Diagnosis
                            </div>
                            <hr>
                        </div>
                        <div class="card-body collapse show" id="collapseWork" aria-labelledby="collapseWork"
                             data-parent="#profileAccordion">
                            <div>
                                <table class="table table-bordered" style="width: 100%;" id="employee-table">
                                    <thead class="thead-inverse">
                                    <tr>
                                        <th>sr_no</th>
                                        <th>ICD10_code</th>
                                        <th>desc </th>
                                        <th>date_of_diagnosis</th>
                                        <th>historical_as_of</th>
                                        <th width="33%">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr class="table-success">
                                        <td>1</td>
                                        <td class="text-green">56745</td>
                                        <td>Lorem Ipsum</td>
                                        <td>Sunday, 1 October 2020</td>
                                        <td>Lorem Ipsum</td>
                                        <td>
                                            <a href="#" class="btn btn-info btn-sm btn-block">Set as a Primary
                                                Diagnosis Code</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>4365</td>
                                        <td>Lorem Ipsum</td>
                                        <td>Sunday, 1 October 2020</td>
                                        <td>Lorem Ipsum</td>
                                        <td>
                                            <a href="#" class="btn btn-info btn-sm btn-block">Set as a Primary
                                                Diagnosis Code</a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Diagnosis End -->
                <!-- MedProfile Start -->
                <div class="tab-pane fade" id="MedProfile" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                    <div class="app-card" style="min-height: auto;">
                        <div class="card-header" id="step2">
                            <div class="d-flex align-items-center">
                                <img src="../assets/img/icons/medprofile_icon.svg" alt=""
                                     srcset="../assets/img/icons/medprofile_icon.svg" class="_icon mr-2"></a>
                                Med Profile
                            </div>
                            <hr>
                        </div>
                        <div class="card-body collapse show" id="collapseWork" aria-labelledby="collapseWork"
                             data-parent="#profileAccordion">
                            <div class="row">
                                <div class="col-12 col-sm-12">
                                    <div class="row mb-3">
                                        <div class="col-4 col-sm-4">
                                            <div class="d-flex align-items-center ">
                                                <div>
                                                    <i class="las la-angle-double-right circle-icon"></i>
                                                </div>
                                                <div>
                                                    <h3 class="_title">Vital</h3>
                                                    <h1 class="_detail">Lorem Ipsum</h1>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4 col-sm-4">
                                            <div>
                                                <div class="d-flex">
                                                    <div>
                                                        <i class="las la-angle-double-right circle-icon"></i>
                                                    </div>
                                                    <div>
                                                        <h3 class="_title">Medical(Hx) History</h3>
                                                        <h1 class="_detail">Hx-235 </h1>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <h1 class="profile-title">Medicines</h1>
                                    <div>
                                        <table class="table table-bordered" style="width: 100%;" id="employee-table">
                                            <thead class="thead-inverse">
                                            <tr>
                                                <th>Medicine Name</th>
                                                <th>Dose </th>
                                                <th>Type </th>
                                                <th>Frequency </th>
                                                <th>Time</th>
                                                <th>Monthly Pending Doses</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td class="text-green">Combiflame</td>
                                                <td>200</td>
                                                <td>Tablet</td>
                                                <td>ONCE Daily</td>
                                                <td>12:00 PM</td>
                                                <td>30 Tablet</td>
                                            </tr>
                                            <tr>
                                                <td class="text-green">Dispring</td>
                                                <td>200</td>
                                                <td>Tablet</td>
                                                <td>ONCE Daily</td>
                                                <td>12:00 PM</td>
                                                <td>30 Tablet</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- MedProfile End -->
                <!-- Pharmacy Start -->
                <div class="tab-pane fade" id="Pharmacy" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                    <div class="app-card" style="min-height: auto;">
                        <div class="card-header" id="step2">
                            <div class="d-flex align-items-center">
                                <img src="../assets/img/icons/pharmacy_icon.svg" alt=""
                                     srcset="../assets/img/icons/pharmacy_icon.svg" class="_icon mr-2"></a>
                                Pharmacy
                            </div>
                            <hr>
                        </div>
                        <div class="card-body collapse show" id="collapseWork" aria-labelledby="collapseWork"
                             data-parent="#profileAccordion">
                            <div class="row">
                                <div class="col-12 col-sm-12">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-12 col-sm-4">
                                                <div class="d-flex align-items-center ">
                                                    <div>
                                                        <i class="las la-angle-double-right circle-icon"></i>
                                                    </div>
                                                    <div>
                                                        <h3 class="_title">Name</h3>
                                                        <h1 class="_detail">Era Plus</h1>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-4">
                                                <div>
                                                    <div class="d-flex align-items-center">
                                                        <div>
                                                            <i class="las la-angle-double-right circle-icon"></i>
                                                        </div>
                                                        <div>
                                                            <h3 class="_title">NCPDPID</h3>
                                                            <h1 class="_detail">13162</h1>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-4">
                                                <div class="d-flex align-items-center">
                                                    <div>
                                                        <i class="las la-phone circle-icon"></i>
                                                    </div>
                                                    <div>
                                                        <h3 class="_title">Phone</h3>
                                                        <h1 class="_detail">9855665324</h1>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-sm-12">
                                            <div class="d-flex align-items-center">
                                                <div>
                                                    <i class="las la-map-marker circle-icon"></i>
                                                </div>
                                                <div>
                                                    <h3 class="_title">Address 1</h3>
                                                    <h1 class="_detail">4009 Heron Way, Portland OR Oregon,
                                                        <span>97232</span>
                                                        <a class="btn btn-info btn-sm ml-2" data-toggle="collapse"
                                                           href="#collapseExample1"><i class="las la-map-marker"></i>View
                                                            Map</a>
                                                    </h1>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="collapse mt-4" id="collapseExample1">
                                        <div class="card card-body">
                                            <iframe style="border-radius: 15px;border: 1px solid #e2dcdc;" width="100%"
                                                    height="200" frameborder="0" scrolling="no" marginheight="0"
                                                    marginwidth="0"
                                                    src="https://maps.google.com/maps?width=100%25&amp;height=200&amp;hl=en&amp;q=Malet%20St,%20London%20WC1E%207HU,%20United%20Kingdom+(Your%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Pharmacy End -->
            </div>
        </section>
    </section>
@endsection

@push('scripts')
    <script src="https://unpkg.com/@google/markerclustererplus@4.0.1/dist/markerclustererplus.min.js"></script>
    <script>
        $(function () {
            $('.insurance_company').hide();
            $('._add_new_company').on('click', function (e) {
                e.preventDefault();
                $('.insurance_company').show();
            });
            $('.save_item').on('click', function (e) {
                e.preventDefault();
                $('.insurance_company').hide();
            });
            $('._add_case_manager').hide();
            $('.add_new_instruction').on('click', function (e) {
                e.preventDefault();
                $('._add_case_manager').show();
            });
            $('._save_items').on('click', function (e) {
                e.preventDefault();
                $('._add_case_manager').hide();
            });
            $('._add_alergy').hide();
            $('.add_new_alergy').on('click', function (e) {
                e.preventDefault();
                $('._add_alergy').show();
            });
            $('._save_alergy').on('click', function (e) {
                e.preventDefault();
                $('._add_alergy').hide();
            });
            var myCallback = tail.select(".alergy", {
                search: true
            })
            $('.alergy').on('change', function () {
                var countries = [];
                $.each($('.alergy option:selected'), function () {
                    countries.push(this.value);
                });
                var text = "";
                var i;
                for (i = 0; i < countries.length; i++) {
                    text +=
                        '<div class="col-12 col-sm-4">' +
                        '<div class="d-flex align-items-center mb-3">' +
                        '<div>' +
                        '<i class="las la-angle-double-right circle-icon-small"></i>' +
                        '</div>' +
                        '<div>' +
                        '<h1 class="_detail">' + countries[i] + '</h1>' +
                        '</div>' +
                        '</div>' +
                        '</div>'
                }
                $('.alergy_box').html(text)
            })
        });

        var map;
        function initMap() {
            var lat = $('#view-map').attr('data-lat');
            var lng = $('#view-map').attr('data-lng');
            const iconBase =
                "http://localhost/doral_web/public/assets/img/icons/patient-icon.svg";
            if (lat){
                map = new google.maps.Map(document.getElementById('map'), {
                    center: new google.maps.LatLng(lat, lng),
                    zoom: 13,
                    mapTypeId: 'roadmap'
                });
                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(lat,lng),
                    icon:iconBase,
                    map: map,
                    title: "{{ $details->first_name }} {{ $details->last_name }}"

                });
            }else {
                map = new google.maps.Map(document.getElementById('map'), {
                    center: {lat: 40.741895, lng: 73.989308},
                    zoom: 8
                });
                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(lat,lng),
                    icon:iconBase,
                    map: map,
                    title: "{{ $details->first_name }} {{ $details->last_name }}"
                });
            }

        }
    </script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key={{env('MAP_API_KEY')}}&callback=initMap&libraries=&v=weekly"
        defer
    ></script>
@endpush

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/detail.css') }}">
@endpush
