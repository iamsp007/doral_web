@extends('pages.layouts.app')

@section('title','Patient Detail')
@section('pageTitleSection')
    <img src="{{ asset('assets/img/icons/computer-icon.svg') }}" class="vbcIcon mr-2"> Patient Detail
@endsection

@section('content')
    <div class="app-body-custom">
        <div class="app-clinician-patient-chart">
            <header class="patient-chart-header">
                <div class="leftItem">
                    <div class="userIcon">
                        <div class="icon">
                            <img src="{{ $details->avatar_image }}" alt="" srcset="{{ $details->avatar_image }}"
                                 class="img-fluid">
                        </div>
                        <div class="name">
                            {{ $details->first_name }} {{ $details->last_name }}
                        </div>
                    </div>
                    <div>
                        <ul class="shortdesc">
                            <li>Admission ID: <span>{{ $details->detail?$details->detail->patient_id:'-' }}</span></li>
                            <li>Gender: <span>{{ $details->gender_name }}</span></li>
                            <li>DOB: <span>{{ $details->dob }}</span></li>
                        </ul>
                    </div>
                </div>
                <div class="rightItem">
                </div>
            </header>
            <div class="p-4 app-pdetail">
                <div class="row nogutter">
                    <div class="col-12 col-sm-2">
                        <ul class="nav flex-column nav-pills nav-patient-profile" id="v-pills-tab" role="tablist"
                            aria-orientation="vertical">
                            <li>
                                <a class="nav-link active d-flex align-items-center" id="demographic-tab" data-toggle="pill"
                                   href="#demographic" role="tab" aria-controls="demographic" aria-selected="true">
                                    <img src="{{ asset('assets/img/icons/icons_demographics.svg') }}" alt="" class="mr-2 inactiveIcon">
                                    <img src="{{ asset('assets/img/icons/icons_demographics_active.svg') }}" alt=""
                                         class="mr-2 activeIcon">Demographics
                                </a>
                            </li>
                            <li>
                                <a class="nav-link d-flex align-items-center" id="insurance-tab" data-toggle="pill"
                                   href="#insurance" role="tab" aria-controls="insurance" aria-selected="false">
                                    <img src="{{ asset('assets/img/icons/icons_demographics_active.svg') }}" alt="" class="mr-2 inactiveIcon">
                                    <img src="{{ asset('assets/img/icons/icons_insurance_active.svg') }}" alt=""
                                         class="mr-2 activeIcon">Insurance</a>
                            </li>
                            <li>
                                <a class="nav-link d-flex align-items-center" id="homecare-tab" data-toggle="pill"
                                   href="#homecare" role="tab" aria-controls="homecare" aria-selected="false">
                                    <img src="{{ asset('assets/img/icons/icons_home_care.svg') }}" alt="" class="mr-2 inactiveIcon">
                                    <img src="{{ asset('assets/img/icons/icons_home_care.svg') }}" alt=""
                                         class="mr-2 activeIcon">Home
                                    Care</a>
                            </li>
                            <li>
                                <a class="nav-link d-flex align-items-center" id="clinical-tab" data-toggle="pill"
                                   href="#clinical" role="tab" aria-controls="clinical" aria-selected="false">
                                    <img src="{{ asset('assets/img/icons/icons_clinical.svg') }}" alt="" class="mr-2 inactiveIcon">
                                    <img src="{{ asset('assets/img/icons/icons_clinical_active.svg') }}" alt=""
                                         class="mr-2 activeIcon">
                                    Clinical</a>
                            </li>
                            <li>
                                <a class="nav-link d-flex align-items-center" id="physican-tab" data-toggle="pill"
                                   href="#physican" role="tab" aria-controls="physican" aria-selected="false">
                                    <img src="{{ asset('assets/img/icons/icons_physician.svg') }}" alt="" class="mr-2 inactiveIcon">
                                    <img src="{{ asset('assets/img/icons/icons_physician_active.svg') }}" alt=""
                                         class="mr-2 activeIcon">Physician</a>
                            </li>
                            <li>
                                <a class="nav-link d-flex align-items-center" id="diagnosis-tab" data-toggle="pill"
                                   href="#diagnosis" role="tab" aria-controls="diagnosis" aria-selected="false">
                                    <img src="{{ asset('assets/img/icons/icons_daignosis.svg') }}" alt="" class="mr-2 inactiveIcon">
                                    <img src="{{ asset('assets/img/icons/icons_daignosis_active.svg') }}" alt=""
                                         class="mr-2 activeIcon">Diagnosis</a>
                            </li>
                            <li>
                                <a class="nav-link d-flex align-items-center" id="medProfile-tab" data-toggle="pill"
                                   href="#medProfile" role="tab" aria-controls="medProfile" aria-selected="false">
                                    <img src="{{ asset('assets/img/icons/icons_medprofile.svg') }}" alt="" class="mr-2 inactiveIcon">
                                    <img src="{{ asset('assets/img/icons/icons_medprofile_active.svg') }}" alt=""
                                         class="mr-2 activeIcon">Med Profile</a>
                            </li>
                            <li>
                                <a class="nav-link d-flex align-items-center" id="pharmacy-tab" data-toggle="pill"
                                   href="#pharmacy" role="tab" aria-controls="pharmacy" aria-selected="false">
                                    <img src="{{ asset('assets/img/icons/icons_pharmacy.svg') }}" alt="" class="mr-2 inactiveIcon">
                                    <img src="{{ asset('assets/img/icons/icons_pharmacy_active.svg') }}" alt=""
                                         class="mr-2 activeIcon">Pharmacy</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-12 col-sm-10">
                        <div class="tab-content" id="v-pills-tabContent">
                            <!-- Demographics Start -->
                            <div class="tab-pane fade active show" id="demographic" role="tabpanel" aria-labelledby="demographic">
                                <!-- Demographics Start -->
                                <div class="app-card app-card-custom" data-name="demographics">
                                    <div class="app-card-header">
                                        <h1 class="title">Demographics</h1>
                                        <!-- <a href="javascript:void(0)" data-toggle="tooltip" data-placement="left" title="Add More">
                                           <img src="../assets/img/icons/add_more_item.svg" alt="">
                                        </a> -->
                                        <img src="{{ asset('assets/img/icons/edit-field.svg') }}" data-toggle="tooltip"
                                             data-placement="bottom" title="Edit" class="cursor-pointer d-block edit-icon" alt=""
                                             onclick="editAllField('demographic')">
                                        <img src="{{ asset('assets/img/icons/update-icon.svg') }}" data-toggle="tooltip"
                                             data-placement="bottom" title="Update" class="cursor-pointer d-none update-icon" alt=""
                                             onclick="updateAllField('demographic')">
                                    </div>
                                    <div class="head scrollbar scrollbar4">
                                        <form id="demographic_form">
                                            <input type="hidden" name="patient_id" value="{{ $details->id }}">
                                            <div class="p-3">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-12 col-sm-3 col-md-3">
                                                            <div class="d-flex align-items-center">
                                                                <div>
                                                                    <i class="las la-phone circle"></i>
                                                                </div>
                                                                <div>
                                                                    <h3 class="_title">Phone</h3>
                                                                    <!-- <h1 class="_detail">9855665324</h1> -->
                                                                    <div>
                                                                        <input type="tel"
                                                                               class="form-control-plaintext _detail no-height" readonly
                                                                               name="phoneno" data-id="phoneno"
                                                                               onclick="editableField('phoneno')" id="phoneno"
                                                                               placeholder="{{ $details->detail?($details->detail->phone1?$details->detail->phone1:'-'):'-' }}" value="{{ $details->detail?$details->detail->phone1:'-' }}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-3 col-md-3">
                                                            <div class="d-flex align-items-center">
                                                                <div>
                                                                    <i class="las la-envelope circle"></i>
                                                                </div>
                                                                <div>
                                                                    <h3 class="_title">Email</h3>
                                                                    <input type="text"
                                                                           class="form-control-plaintext _detail no-height" readonly
                                                                           name="emailId" onclick="editableField('emailId')"
                                                                           data-id="emailId" id="emailId"
                                                                           placeholder="{{ $details->detail?$details->detail->email:'-' }}" value="{{ $details->detail?$details->detail->email:'-' }}">
                                                                    <!-- <a href="mailto:abcinsurance@gmail.com"
                                                                       class="_detail">abcinsurance@gmail.com</a> -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-3 col-md-3">
                                                            <div class="d-flex align-items-center">
                                                                <div>
                                                                    <i class="las la-calendar circle"></i>
                                                                </div>
                                                                <div>
                                                                    <h3 class="_title">Start Date</h3>
                                                                    <!-- <h1 class="_detail">1/1/2020</h1> -->
                                                                    <input type="date"
                                                                           class="form-control-plaintext _detail no-height" readonly
                                                                           name="start_date" onclick="editableField('start_date')"
                                                                           data-id="start_date" id="start_date" placeholder="{{ $details->detail?$details->detail->start_date:'-' }}"
                                                                           value="{{ $details->detail?$details->detail->start_date:'-' }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-3 col-md-3">
                                                            <div class="d-flex align-items-center ">
                                                                <div>
                                                                    <i class="las la-angle-double-right circle"></i>
                                                                </div>
                                                                <div>
                                                                    <h3 class="_title">Ethnicity</h3>
                                                                    <!-- <h1 class="_detail">lorem ipus</h1> -->
                                                                    <input type="text"
                                                                           class="form-control-plaintext _detail no-height" readonly
                                                                           name="ethnicity" onclick="editableField('ethnicity')"
                                                                           data-id="ethnicity" id="ethnicity" placeholder="{{ $details->detail?(isset($details->detail->ethnicity)?$details->detail->ethnicity:'-'):'-' }}"
                                                                           value="{{ $details->detail?(isset($details->detail->ethnicity)?$details->detail->ethnicity:'-'):'-' }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-12 col-sm-3">
                                                            <div class="d-flex align-items-center">
                                                                <div>
                                                                    <i class="las la-angle-double-right circle"></i>
                                                                </div>
                                                                <div>
                                                                    <h3 class="_title">SSN#</h3>
                                                                    <!-- <h1 class="_detail">8454</h1> -->
                                                                    <input type="text"
                                                                           class="form-control-plaintext _detail no-height" readonly
                                                                           name="SSN" onclick="editableField('SSN')" data-id="SSN"
                                                                           id="SSN" placeholder="{{ $details->detail?(isset($details->detail->ssn)?$details->detail->ssn:'-'):'-' }}#" value="{{ $details->detail?$details->detail->ssn:'-' }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-3">
                                                            <div class="d-flex align-items-center">
                                                                <div>
                                                                    <i class="las la-angle-double-right circle"></i>
                                                                </div>
                                                                <div>
                                                                    <h3 class="_title">Admission ID:</h3>
                                                                    <!-- <h1 class="_detail">8965465</h1> -->
                                                                    <input type="text"
                                                                           class="form-control-plaintext _detail no-height" readonly
                                                                           name="admissionId" onclick="editableField('admissionId')"
                                                                           data-id="admissionId" id="admissionId"
                                                                           placeholder="{{ $details->detail?$details->detail->patient_id:'-' }}" value="{{ $details->detail?$details->detail->patient_id:'-' }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-3">
                                                            <div class="d-flex align-items-center ">
                                                                <div>
                                                                    <i class="las la-angle-double-right circle"></i>
                                                                </div>
                                                                <div>
                                                                    <h3 class="_title">Nurse</h3>
                                                                    <!-- <h1 class="_detail">lorem ipus</h1> -->
                                                                    <input type="text"
                                                                           class="form-control-plaintext _detail no-height" readonly
                                                                           name="nurse" onclick="editableField('nurse')" data-id="nurse"
                                                                           id="nurse" placeholder="{{ $details->detail?(isset($details->detail->nurse)?$details->detail->nurse:'-'):'-' }}" value="{{ $details->detail?(isset($details->detail->nurse)?$details->detail->nurse:'-'):'-' }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-12 col-sm-3">
                                                            <div class="d-flex align-items-center">
                                                                <div>
                                                                    <i class="las la-angle-double-right circle"></i>
                                                                </div>
                                                                <div>
                                                                    <h3 class="_title">Coordinator</h3>
                                                                    <!-- <h1 class="_detail">lorem ipus</h1> -->
                                                                    <input type="text"
                                                                           class="form-control-plaintext _detail no-height" readonly
                                                                           name="coordinator" onclick="editableField('coordinator')"
                                                                           data-id="coordinator" id="coordinator" placeholder="{{ $details->detail?(isset($details->detail->coordinator)?$details->detail->coordinator:''):'-' }}"
                                                                           value="{{ $details->detail?(isset($details->detail->coordinator)?$details->detail->coordinator:''):'-' }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-3">
                                                            <div class="d-flex align-items-center">
                                                                <div>
                                                                    <i class="las la-angle-double-right circle"></i>
                                                                </div>
                                                                <div>
                                                                    <h3 class="_title">HI Claim Number</h3>
                                                                    <!-- <h1 class="_detail">75443</h1> -->
                                                                    <input type="number"
                                                                           class="form-control-plaintext _detail no-height" readonly
                                                                           name="claim_no" onclick="editableField('claim_no')"
                                                                           data-id="claim_no" id="claim_no" placeholder="{{ $details->detail?(isset($details->detail->coordinator)?$details->detail->coordinator:''):'-' }}"
                                                                           value="{{ $details->detail?(isset($details->detail->coordinator)?$details->detail->coordinator:''):'-' }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-6">
                                                            <div class="d-flex align-items-center">
                                                                <div>
                                                                    <i class="las la-map-marker circle"></i>
                                                                </div>
                                                                <div>
                                                                    <h3 class="_title">Address 1</h3>
                                                                    <div class="d-flex align-items-center">
                                                                        <!-- <h1 class="_detail">4009 Heron Way, Portland OR Oregon,
                                                                           <span>97232</span>
                                                                        </h1> -->
                                                                        <input type="text"
                                                                               class="form-control-plaintext _detail no-height" readonly
                                                                               name="address" onclick="editableField('address')"
                                                                               data-lat="{{ $details->detail?(isset($details->detail->address_latlng->lat)?$details->detail->address_latlng->lat:'25.145262'):'25.145262' }}"
                                                                               data-lng="{{ $details->detail?(isset($details->detail->address_latlng->lng)?$details->detail->address_latlng->lng:'70.152484'):'70.145262' }}"
                                                                               data-id="address" id="address" placeholder="{{ $details->detail?$details->detail->address_full:'-' }}"
                                                                               value="{{ $details->detail?$details->detail->address_full:'-' }}">
                                                                        <a class="ml-2" data-toggle="collapse" href="#collapseExample">
                                                                            <img src="{{ asset('assets/img/icons/location.svg') }}" alt=""
                                                                                 srcset="{{ asset('assets/img/icons/location.svg') }}"
                                                                                 data-toggle="tooltip" data-placement="top"
                                                                                 title="View Map">
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="collapse mt-4" id="collapseExample" >
                                                    <div id="map" style="height: 116px;position: relative;overflow: scroll"></div>
                                                </div>
                                                <!-- Emergency contact Detail -->
                                                <div class="app-card app-card-custom no-minHeight mb-3 box-shadow-none"
                                                     data-name="emergency_contact_detail">
                                                    <div class="app-card-header">
                                                        <h1 class="title">Emergency Contact Detail</h1>
                                                        <!-- <a href="javascript:void(0)" data-toggle="tooltip" data-placement="left" title="Add More">
                                                           <img src="../assets/img/icons/add_more_item.svg" alt="">
                                                        </a> -->
                                                    </div>
                                                    <div>
                                                        <div class="p-3">
                                                            <div class="">
                                                                <div class="row">
                                                                    <div class="col-12 col-sm-3 col-md-3">
                                                                        <div class="d-flex align-items-center">
                                                                            <div>
                                                                                <i class="las la-user-nurse circle"></i>
                                                                            </div>
                                                                            <div>
                                                                                <h3 class="_title">Contact Name</h3>
                                                                                <!-- <h1 class="_detail">Ara lus</h1> -->
                                                                                <input type="text"
                                                                                       class="form-control-plaintext _detail no-height"
                                                                                       readonly name="eng_name"
                                                                                       onclick="editableField('eng_name')"
                                                                                       data-id="eng_name" id="eng_name"
                                                                                       placeholder="{{ $details->detail?$details->detail->eng_name:'' }}"
                                                                                       value="{{ $details->detail?$details->detail->eng_name:'' }}">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 col-sm-3 col-md-3">
                                                                        <div class="d-flex align-items-center">
                                                                            <div>
                                                                                <i class="las la-map-marker circle"></i>
                                                                            </div>
                                                                            <div>
                                                                                <h3 class="_title">Home Address</h3>
                                                                                <!-- <h1 class="_detail">985471236</h1> -->
                                                                                <input type="tel"
                                                                                       class="form-control-plaintext _detail no-height"
                                                                                       readonly name="eng_address"
                                                                                       onclick="editableField('eng_address')"
                                                                                       data-id="eng_address" id="eng_address"
                                                                                       placeholder="{{ $details->detail?$details->detail->eng_addres:'' }}"
                                                                                       value="{{ $details->detail?$details->detail->eng_addres:'' }}">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 col-sm-3 col-md-3">
                                                                        <div class="d-flex align-items-center">
                                                                            <div>
                                                                                <i class="las la-phone circle"></i>
                                                                            </div>
                                                                            <div>
                                                                                <h3 class="_title">Cell Phone</h3>
                                                                                <!-- <h1 class="_detail">985471236</h1> -->
                                                                                <input type="tel"
                                                                                       class="form-control-plaintext _detail no-height"
                                                                                       readonly name="emg_phone"
                                                                                       onclick="editableField('emg_phone')"
                                                                                       data-id="emg_phone" id="emg_phone"
                                                                                       placeholder="{{ $details->detail?$details->detail->emg_phone:'' }}"
                                                                                       value="{{ $details->detail?$details->detail->emg_phone:'' }}">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 col-sm-3 col-md-3">
                                                                        <div class="d-flex align-items-center">
                                                                            <div>
                                                                                <i class="las la-address-book circle"></i>
                                                                            </div>
                                                                            <div>
                                                                                <h3 class="_title">Contact Relationship</h3>
                                                                                <!-- <h1 class="_detail">985471236</h1> -->
                                                                                <input type="tel"
                                                                                       class="form-control-plaintext _detail no-height"
                                                                                       readonly name="emg_relationship"
                                                                                       onclick="editableField('emg_relationship')"
                                                                                       data-id="emg_relationship" id="emg_relationship"
                                                                                       placeholder="{{ $details->detail?$details->detail->emg_relationship:'' }}" value="{{ $details->detail?$details->detail->emg_relationship:'' }}">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Emergency contact Detail -->
                                                <!-- If Unavailable (2nd) Contact Detail -->
                                                <div class="app-card app-card-custom no-minHeight box-shadow-none"
                                                     data-name="emergency_contact_detail">
                                                    <div class="app-card-header">
                                                        <h1 class="title">If Available (2nd) Contact Detail</h1>
                                                        <!-- <a href="javascript:void(0)" data-toggle="tooltip" data-placement="left" title="Add More">
                                                           <img src="../assets/img/icons/add_more_item.svg" alt="">
                                                        </a> -->
                                                    </div>
                                                    <div>
                                                        <div class="p-3">
                                                            <div class="">
                                                                <div class="row">
                                                                    <div class="col-12 col-sm-3 col-md-3">
                                                                        <div class="d-flex align-items-center">
                                                                            <div>
                                                                                <i class="las la-user-nurse circle"></i>
                                                                            </div>
                                                                            <div>
                                                                                <h3 class="_title">Contact Name</h3>
                                                                                <!-- <h1 class="_detail">Ara lus</h1> -->
                                                                                <input type="tel"
                                                                                       class="form-control-plaintext _detail no-height"
                                                                                       readonly name="work_name"
                                                                                       onclick="editableField('work_name')"
                                                                                       data-id="work_name" id="work_name"
                                                                                       placeholder="{{ $details->detail?$details->detail->work_name:'' }}"
                                                                                       value="{{ $details->detail?$details->detail->work_name:'' }}">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 col-sm-3 col-md-3">
                                                                        <div class="d-flex align-items-center">
                                                                            <div>
                                                                                <i class="las la-phone circle"></i>
                                                                            </div>
                                                                            <div>
                                                                                <h3 class="_title">Home Phone</h3>
                                                                                <!-- <h1 class="_detail">985471236</h1> -->
                                                                                <input type="tel"
                                                                                       class="form-control-plaintext _detail no-height"
                                                                                       readonly name="home_phone1"
                                                                                       onclick="editableField('home_phone1')"
                                                                                       data-id="home_phone1" id="home_phone1"
                                                                                       placeholder="{{ $details->detail?$details->detail->home_phone1:'-' }}"
                                                                                       value="{{ $details->detail?$details->detail->home_phone1:'-' }}">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 col-sm-3 col-md-3">
                                                                        <div class="d-flex align-items-center">
                                                                            <div>
                                                                                <i class="las la-phone circle"></i>
                                                                            </div>
                                                                            <div>
                                                                                <h3 class="_title">Cell Phone</h3>
                                                                                <!-- <h1 class="_detail">985471236</h1> -->
                                                                                <input type="tel"
                                                                                       class="form-control-plaintext _detail no-height"
                                                                                       readonly name="cell_phone1"
                                                                                       onclick="editableField('home_phone2')"
                                                                                       data-id="cell_phone1" id="cell_phone1"
                                                                                       placeholder="{{ $details->detail?$details->detail->cell_phone1:'-' }}" value="{{ $details->detail?$details->detail->cell_phone1:'-' }}">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 col-sm-3 col-md-3">
                                                                        <div class="d-flex align-items-center">
                                                                            <div>
                                                                                <i class="las la-map-marker circle"></i>
                                                                            </div>
                                                                            <div>
                                                                                <h3 class="_title">Address</h3>
                                                                                <!-- <h1 class="_detail">985471236</h1> -->
                                                                                <input type="tel"
                                                                                       class="form-control-plaintext _detail no-height"
                                                                                       readonly name="work_phone3"
                                                                                       onclick="editableField('work_phone3')"
                                                                                       data-id="work_phone3" id="work_phone3"
                                                                                       placeholder="{{ $details->detail?$details->detail->work_phone3:'' }}"
                                                                                       value="{{ $details->detail?$details->detail->work_phone3:'-' }}">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- If Unavailable (2nd) Contact Detail -->
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- Demographics End -->
                            </div>
                            <!-- Demographics End -->
                            <!-- Insurance Start -->
                            <div class="tab-pane fade" id="insurance" role="tabpanel" aria-labelledby="insurance-tab">

                                    <div class="app-card app-card-custom" data-name="demographics">
                                        <div class="app-card-header">
                                            <h1 class="title">Insurance</h1>
                                            <img src="{{ asset('assets/img/icons/edit-field.svg') }}" data-toggle="tooltip"
                                                 data-placement="bottom" title="Edit" class="cursor-pointer d-block edit-icon" alt=""
                                                 onclick="editAllField('insurance')">
                                            <img src="{{ asset('assets/img/icons/update-icon.svg') }}" data-toggle="tooltip"
                                                 data-placement="bottom" title="Update" class="cursor-pointer d-none update-icon" alt=""
                                                 onclick="updateAllField('insurance')">
                                            <!-- <a href="javascript:void(0)" data-toggle="tooltip" data-placement="left" title="Add More">
                                               <img src="../assets/img/icons/add_more_item.svg" alt="">
                                            </a> -->
                                        </div>
                                        <div class="head scrollbar scrollbar4">
                                            <div class="p-3">
                                                <form id="insurance_form">
                                                    <input type="hidden" name="patient_id" value="{{ $details->id }}">
                                                    <!-- Medicade Start -->
                                                    <div class="app-card app-card-custom no-minHeight box-shadow-none mb-3"
                                                         data-name="medicaid">
                                                        <div class="app-card-header">
                                                            <h1 class="title mr-2">Medicaid</h1>
                                                            <!-- <a href="javascript:void(0)" data-toggle="tooltip" data-placement="left" title="Add More">
                                                                <img src="../assets/img/icons/add_more_item.svg" alt="">
                                                             </a> -->
                                                            <button type="button" class="btn btn-sm btn-info">Verify Recertification
                                                                Date</button>
                                                        </div>
                                                        <div class="head">
                                                            <div class="p-3">
                                                                <div class="row">
                                                                    <div class="col-12 col-sm-3">
                                                                        <div class="d-flex align-items-center">
                                                                            <div>
                                                                                <i class="las la-angle-double-right circle"></i>
                                                                            </div>
                                                                            <div>
                                                                                <h3 class="_title">Madicaid No</h3>
                                                                                <!-- <h1 class="_detail">ABCD1234</h1> -->
                                                                                <input type="text"
                                                                                       class="form-control-plaintext _detail no-height" readonly
                                                                                       name="medicaid_number" data-id="medicaid_number"
                                                                                       onclick="editableField('medicaid_number')" id="medicaid_number"
                                                                                       placeholder="{{ $details->detail?$details->detail->medicaid_number:'-' }}" value="{{ $details->detail?$details->detail->medicaid_number:'-' }}">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 col-sm-3"></div>
                                                                    <div class="col-12 col-sm-3"></div>
                                                                    <div class="col-12 col-sm-3"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Medicade End -->
                                                    <!-- Medicare Start -->
                                                    <div class="app-card app-card-custom no-minHeight box-shadow-none mb-3"
                                                         data-name="medicare">
                                                        <div class="app-card-header">
                                                            <h1 class="title mr-2">Medicare</h1>
                                                            <!-- <a href="javascript:void(0)" data-toggle="tooltip" data-placement="left" title="Add More">
                                                            <img src="../assets/img/icons/add_more_item.svg" alt="">
                                                         </a> -->
                                                            <button type="button" class="btn btn-sm btn-info">Verify Recertification
                                                                Date</button>
                                                        </div>
                                                        <div class="head">
                                                            <div class="p-3">
                                                                <div class="row">
                                                                    <div class="col-12 col-sm-3">
                                                                        <div class="d-flex align-items-center">
                                                                            <div>
                                                                                <i class="las la-angle-double-right circle"></i>
                                                                            </div>
                                                                            <div>
                                                                                <h3 class="_title">Medicare No</h3>
                                                                                <!-- <h1 class="_detail">ABCD1234</h1> -->
                                                                                <input type="text"
                                                                                       class="form-control-plaintext _detail no-height" readonly
                                                                                       name="medicare_number" data-id="medicare_number"
                                                                                       onclick="editableField('medicare_number')" id="medicare_number"
                                                                                       placeholder="{{ $details->detail?$details->detail->medicare_number:'-' }}" value="{{ $details->detail?$details->detail->medicare_number:'-' }}">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 col-sm-3"></div>
                                                                    <div class="col-12 col-sm-3"></div>
                                                                    <div class="col-12 col-sm-3"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Medicare End -->
                                                    <!-- Croley Insurance and Financial Start -->
                                                    @if(count($details->insurance))
                                                        @foreach($details->insurance as $key=>$value)
                                                                <input type="hidden" name="insurance_id[]" id="insurance_id" value="{{ $value->id }}">
                                                                <input type="hidden" name="name_{{ $key }}" id="name" value="{{ $value->name }}">
                                                                <div class="app-card app-card-custom no-minHeight box-shadow-none _add_new_company"
                                                                     data-name="croley_insurance_and_financial">
                                                                    <div class="app-card-header">
                                                                        <h1 class="title mr-2">{{ $value->name }}</h1>
                                                                        <!-- <a href="javascript:void(0)" data-toggle="tooltip" data-placement="left" title="Add More">
                                                                        <img src="../assets/img/icons/add_more_item.svg" alt="">
                                                                     </a> -->
                                                                        <a class="add_new_company" href="javascript:void(0)" data-toggle="tooltip"
                                                                           data-placement="left" title="Add New Insurance Company"><i
                                                                                class="las la-plus-circle la-2x"></i></a>
                                                                    </div>
                                                                    <div class="head">
                                                                        <div class="p-3">
                                                                            <div class="row">
                                                                                <div class="col-12 col-sm-3">
                                                                                    <div class="d-flex align-items-center">
                                                                                        <div>
                                                                                            <i class="las la-angle-double-right circle"></i>
                                                                                        </div>
                                                                                        <div>
                                                                                            <h3 class="_title">Payer Id</h3>
                                                                                            <!-- <h1 class="_detail">13162</h1> -->
                                                                                            <input type="text"
                                                                                                   class="form-control-plaintext _detail no-height" readonly
                                                                                                   name="payerId_{{ $key }}" data-id="payerId_{{ $key }}"
                                                                                                   onclick="editableField('payerId_{{ $key }}')" id="payerId_{{ $key }}"
                                                                                                   placeholder="{{ $value->payer_id }}" value="{{ $value->payer_id }}">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-12 col-sm-3">
                                                                                    <div class="d-flex align-items-center">
                                                                                        <div>
                                                                                            <i class="las la-angle-double-right circle"></i>
                                                                                        </div>
                                                                                        <div>
                                                                                            <h3 class="_title">Phone</h3>
                                                                                            <!-- <h1 class="_detail">9855665324</h1> -->
                                                                                            <input type="tel"
                                                                                                   class="form-control-plaintext _detail no-height" readonly
                                                                                                   name="Phone_{{ $key }}" data-id="Phone_{{ $key }}"
                                                                                                   onclick="editableField('Phone_{{ $key }}')" id="Phone_{{ $key }}"
                                                                                                   placeholder="{{ $value->phone }}" value="{{ $value->phone }}">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-12 col-sm-3">
                                                                                    <div class="d-flex align-items-center">
                                                                                        <div>
                                                                                            <i class="las la-angle-double-right circle"></i>
                                                                                        </div>
                                                                                        <div>
                                                                                            <h3 class="_title">Policy Number</h3>
                                                                                            <!-- <h1 class="_detail">ABCD123456</h1> -->
                                                                                            <input type="number"
                                                                                                   class="form-control-plaintext _detail no-height" readonly
                                                                                                   name="policy_no_{{ $key }}" data-id="policy_no_{{ $key }}"
                                                                                                   onclick="editableField('policy_no_{{ $key }}')" id="policy_no_{{ $key }}"
                                                                                                   placeholder="{{ $value->policy_no }}" value="{{ $value->policy_no }}">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-12 col-sm-3"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                        @endforeach
                                                    @else
                                                        <div class="app-card app-card-custom no-minHeight box-shadow-none _add_new_company" data-name="croley_insurance_and_financial">
                                                            <div class="app-card-header">
                                                                <h1 class="title mr-2">Add New Insurance</h1>
                                                                <!-- <a href="javascript:void(0)" data-toggle="tooltip" data-placement="left" title="Add More">
                                                                <img src="../assets/img/icons/add_more_item.svg" alt="">
                                                             </a> -->
                                                                <a class="add_new_company" href="javascript:void(0)" data-toggle="tooltip"
                                                                   data-placement="left" title="Add New Insurance Company"><i
                                                                        class="las la-plus-circle la-2x"></i></a>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </form>

                                            <!-- Insurance Company Form Start -->
                                                <div class="app-card app-card-custom no-minHeight box-shadow-none mt-3 insurance_company">
                                                    <form id="insurance_company_form">
                                                        <div class="app-card-header">
                                                            <input type="hidden" name="patient_id" id="patient_id" value="{{ $details->id }}">
                                                            <input type="text" class="form-control form-control-lg" id="name"
                                                                   name="name" aria-describedby="comapnyNameHelp"
                                                                   placeholder="Enter Insurance Company Name">
                                                        </div>
                                                        <div class="head">
                                                            <div class="p-3">
                                                                <div class="row">
                                                                    <div class="col-12 col-sm-4">
                                                                        <div class="d-flex align-items-center">
                                                                            <div>
                                                                                <i class="las la-angle-double-right circle"></i>
                                                                            </div>
                                                                            <div>
                                                                                <h3 class="_title">Payer Id</h3>
                                                                                <div class="_detail">
                                                                                    <input type="text" class="form-control form-control-lg"
                                                                                           id="payer_id" name="payer_id"
                                                                                           aria-describedby="payerIdHelp"
                                                                                           placeholder="Enter Payer ID">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 col-sm-4">
                                                                        <div class="d-flex align-items-center">
                                                                            <div>
                                                                                <i class="las la-phone circle"></i>
                                                                            </div>
                                                                            <div>
                                                                                <h3 class="_title">Phone</h3>
                                                                                <div class="_detail">
                                                                                    <input type="text" class="form-control form-control-lg"
                                                                                           id="phone" name="phone"
                                                                                           aria-describedby="phoneNoHelp"
                                                                                           placeholder="Enter Phone No">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 col-sm-4">
                                                                        <div class="d-flex align-items-center">
                                                                            <div>
                                                                                <i class="las la-angle-double-right circle"></i>
                                                                            </div>
                                                                            <div>
                                                                                <h3 class="_title">Policy Number</h3>
                                                                                <div class="_detail">
                                                                                    <input type="text" class="form-control form-control-lg"
                                                                                           id="policy_no" name="policy_no"
                                                                                           aria-describedby="policyNoHelp"
                                                                                           placeholder="Enter Policy No">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class=" d-flex justify-content-end">
                                                                    <button type="button"
                                                                            class="btn btn-info btn-sm save_item">Save</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <!-- Insurance Company Form end -->
                                                <!-- Croley Insurance and Financial End -->
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- Insurance End -->
                            <!-- Home Care Start -->
                            <div class="tab-pane fade" id="homecare" role="tabpanel" aria-labelledby="homecare-tab">
                                <form id="homecare-form">
                                    <div class="app-card app-card-custom" data-name="home_care">
                                    <div class="app-card-header">
                                        <h1 class="title mr-2">{{ isset($details->detail->referral->referral->name) && $details->detail->referral->referral->name==='Home Care'?$details->detail->referral->referral->name:'ADD Home Care' }}</h1>
                                        <img src="{{ asset('assets/img/icons/edit-field.svg') }}" data-toggle="tooltip"
                                             data-placement="bottom" title="Edit" class="cursor-pointer d-block edit-icon" alt=""
                                             onclick="editAllField('homecare')">
                                        <img src="{{ asset('assets/img/icons/update-icon.svg') }}" data-toggle="tooltip"
                                             data-placement="bottom" title="Update" class="cursor-pointer d-none update-icon" alt=""
                                             onclick="updateAllField('homecare')">
                                    </div>
                                    <div class="head scrollbar scrollbar4">
                                        <input type="hidden" name="patient_id" value="{{ $details->id }}">
                                        <div class="p-3">
                                            @if(isset($details->detail->referral->referral->name) && $details->detail->referral->referral->name==='Home Care')
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-12 col-sm-4">
                                                            <div class="d-flex align-items-center">
                                                                <div>
                                                                    <i class="las la-user-nurse circle"></i>
                                                                </div>
                                                                <div>
                                                                    <h3 class="_title">Name</h3>
                                                                    <!-- <h1 class="_detail">Lorem Ipsum</h1> -->
                                                                    <input type="text"
                                                                           class="form-control-plaintext _detail no-height" readonly
                                                                           name="name" data-id="name"
                                                                           onclick="editableField('name')" id="name"
                                                                           placeholder="{{ $details->detail->referral->name }}" value="{{ $details->detail->referral->name }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-4">
                                                            <div class="d-flex align-items-center">
                                                                <div>
                                                                    <i class="las la-user-nurse circle"></i>
                                                                </div>
                                                                <div>
                                                                    <h3 class="_title">Coordinator</h3>
                                                                    <!-- <h1 class="_detail">Lorem Ipsum</h1> -->
                                                                    <input type="text"
                                                                           class="form-control-plaintext _detail no-height" readonly
                                                                           name="coordinator" data-id="coordinator"
                                                                           onclick="editableField('coordinator')" id="coordinator"
                                                                           placeholder="" value="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-4">
                                                            <div class="d-flex align-items-center">
                                                                <div>
                                                                    <i class="las la-user-nurse circle"></i>
                                                                </div>
                                                                <div>
                                                                    <h3 class="_title">Phone</h3>
                                                                    <!-- <h1 class="_detail">(555) 555-5555</h1> -->
                                                                    <input type="tel"
                                                                           class="form-control-plaintext _detail no-height" readonly
                                                                           name="hc_phone" data-id="hc_phone"
                                                                           onclick="editableField('hc_phone')" id="hc_phone"
                                                                           placeholder="{{ $details->detail->referral->phone }}" value="{{ $details->detail->referral->phone }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="col-12 col-sm-12">
                                                        <div class="d-flex align-items-center mb-3">
                                                            <div>
                                                                <i class="las la-map-marker circle"></i>
                                                            </div>
                                                            <div>
                                                                <h3 class="_title">Address</h3>
                                                                <!-- <h1 class="_detail">4009 Heron Way, Portland OR Oregon,
                                                                   <span>97232</span>
                                                                </h1> -->
                                                                <textarea id="hc_address" name="hc_address" rows="4" cols="62" class="form-control-plaintext _detail no-height" readonly onclick="editableField('hc_address')"
                                                                          placeholder=""
                                                                          value="">

                                                          </textarea>
                                                                <!-- <a class="btn btn-info btn-sm ml-2 collapsed" data-toggle="collapse" href="#collapseExample11" aria-expanded="false"><i class="las la-map-marker"></i>View
                                                                   Map</a> -->

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-12 col-sm-4">
                                                            <div class="d-flex align-items-center">
                                                                <div>
                                                                    <i class="las la-user-nurse circle"></i>
                                                                </div>
                                                                <div>
                                                                    <h3 class="_title">Name</h3>
                                                                    <!-- <h1 class="_detail">Lorem Ipsum</h1> -->
                                                                    <input type="text"
                                                                           class="form-control-plaintext _detail no-height" readonly
                                                                           name="name" data-id="name"
                                                                           onclick="editableField('name')" id="name"
                                                                           placeholder="" value="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-4">
                                                            <div class="d-flex align-items-center">
                                                                <div>
                                                                    <i class="las la-user-nurse circle"></i>
                                                                </div>
                                                                <div>
                                                                    <h3 class="_title">Coordinator</h3>
                                                                    <!-- <h1 class="_detail">Lorem Ipsum</h1> -->
                                                                    <input type="text"
                                                                           class="form-control-plaintext _detail no-height" readonly
                                                                           name="coordinator" data-id="coordinator"
                                                                           onclick="editableField('coordinator')" id="coordinator"
                                                                           placeholder="" value="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-4">
                                                            <div class="d-flex align-items-center">
                                                                <div>
                                                                    <i class="las la-user-nurse circle"></i>
                                                                </div>
                                                                <div>
                                                                    <h3 class="_title">Phone</h3>
                                                                    <!-- <h1 class="_detail">(555) 555-5555</h1> -->
                                                                    <input type="tel"
                                                                           class="form-control-plaintext _detail no-height" readonly
                                                                           name="hc_phone" data-id="hc_phone"
                                                                           onclick="editableField('hc_phone')" id="hc_phone"
                                                                           placeholder="" value="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="col-12 col-sm-12">
                                                        <div class="d-flex align-items-center mb-3">
                                                            <div>
                                                                <i class="las la-map-marker circle"></i>
                                                            </div>
                                                            <div>
                                                                <h3 class="_title">Address</h3>
                                                                <!-- <h1 class="_detail">4009 Heron Way, Portland OR Oregon,
                                                                   <span>97232</span>
                                                                </h1> -->
                                                                <textarea id="hc_address" name="hc_address" rows="4" cols="62" class="form-control-plaintext _detail no-height" readonly onclick="editableField('hc_address')"
                                                                          placeholder=""
                                                                          value="">

                                                          </textarea>
                                                                <!-- <a class="btn btn-info btn-sm ml-2 collapsed" data-toggle="collapse" href="#collapseExample11" aria-expanded="false"><i class="las la-map-marker"></i>View
                                                                   Map</a> -->

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                            <div class="app-card app-card-custom box-shadow-none no-minHeight mt-3"
                                                 data-name="administrator_detail">
                                                <div class="app-card-header">
                                                    <h1 class="title">Administrator Detail</h1>
                                                    <!-- <a href="javascript:void(0)" data-toggle="tooltip" data-placement="left" title="Add More">
                                                       <img src="../assets/img/icons/add_more_item.svg" alt="">
                                                    </a> -->
                                                </div>
                                                <div class="head">
                                                    <div class="p-3">
                                                        <div class="row">
                                                            <div class="col-12 col-sm-4">
                                                                <div class="d-flex align-items-center">
                                                                    <div>
                                                                        <i class="las la-user-nurse circle"></i>
                                                                    </div>
                                                                    <div>
                                                                        <h3 class="_title">Name</h3>
                                                                        <!-- <h1 class="_detail">Ara lus</h1> -->
                                                                        <input type="text"
                                                                               class="form-control-plaintext _detail no-height" readonly
                                                                               name="a_name" data-id="a_name"
                                                                               onclick="editableField('a_name')" id="a_name"
                                                                               placeholder="Lorem Ipsum" value="Lorem Ipsum">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-sm-4">
                                                                <div class="d-flex align-items-center">
                                                                    <div>
                                                                        <i class="las la-user-nurse circle"></i>
                                                                    </div>
                                                                    <div>
                                                                        <h3 class="_title">Phone</h3>
                                                                        <!-- <h1 class="_detail">(555) 555-5555</h1> -->
                                                                        <input type="tel"
                                                                               class="form-control-plaintext _detail no-height" readonly
                                                                               name="a_phone" data-id="a_phone"
                                                                               onclick="editableField('a_phone')" id="a_phone"
                                                                               placeholder="(555) 555-5555" value="(555) 555-5555">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-sm-4">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="app-card app-card-custom box-shadow-none no-minHeight mt-3"
                                                 data-name="caregiver_detail">
                                                <div class="app-card-header">
                                                    <h1 class="title">Caregiver Detail</h1>
                                                    <!-- <a href="javascript:void(0)" data-toggle="tooltip" data-placement="left" title="Add More">
                                                    <img src="../assets/img/icons/add_more_item.svg" alt="">
                                                 </a> -->
                                                    <button type="button" class="btn btn-sm btn-info">Check Update</button>
                                                </div>
                                                <div class="head">
                                                    <div class="p-3">
                                                        <div class="row">
                                                            <div class="col-12 col-sm-3">
                                                                <div class="d-flex align-items-center">
                                                                    <div>
                                                                        <i class="las la-user-nurse circle"></i>
                                                                    </div>
                                                                    <div>
                                                                        <h3 class="_title">Caregiver Name</h3>
                                                                        <input type="hidden" name="caregiver_id" value="{{ $details->caregivers?$details->caregivers->id:'' }}">
                                                                        <!-- <h1 class="_detail">Ara lus</h1> -->
                                                                        <input type="text"
                                                                               class="form-control-plaintext _detail no-height" readonly
                                                                               name="c_name" data-id="c_name"
                                                                               onclick="editableField('c_name')" id="c_name"
                                                                               placeholder="{{ $details->caregivers?$details->caregivers->name:'' }}"
                                                                               value="{{ $details->caregivers?$details->caregivers->name:'' }}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-sm-3">
                                                                <div class="d-flex align-items-center">
                                                                    <div>
                                                                        <i class="las la-user-nurse circle"></i>
                                                                    </div>
                                                                    <div>
                                                                        <h3 class="_title">Phone</h3>
                                                                        <!-- <h1 class="_detail">(555) 555-5555</h1> -->
                                                                        <input type="tel"
                                                                               class="form-control-plaintext _detail no-height" readonly
                                                                               name="c_phone" data-id="c_phone"
                                                                               onclick="editableField('c_phone')" id="c_phone"
                                                                               placeholder="{{ $details->caregivers?$details->caregivers->phone:'' }}"
                                                                               value="{{ $details->caregivers?$details->caregivers->phone:'' }}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-sm-3">
                                                                <div class="d-flex align-items-center">
                                                                    <div>
                                                                        <i class="las la-user-nurse circle"></i>
                                                                    </div>
                                                                    <div>
                                                                        <h3 class="_title">Schedule start time</h3>
                                                                        <!-- <h1 class="_detail">10:00 AM</h1> -->
                                                                        <input type="time"
                                                                               class="form-control-plaintext _detail no-height" readonly
                                                                               name="start_time" data-id="start_time"
                                                                               onclick="editableField('start_time')" id="start_time"
                                                                               placeholder="{{ $details->caregivers?$details->caregivers->start_time:'' }}"
                                                                               value="{{ $details->caregivers?$details->caregivers->start_time:'' }}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-sm-3">
                                                                <div class="d-flex align-items-center">
                                                                    <div>
                                                                        <i class="las la-user-nurse circle"></i>
                                                                    </div>
                                                                    <div>
                                                                        <h3 class="_title">Schedule End time</h3>
                                                                        <!-- <h1 class="_detail">8:00 PM</h1> -->
                                                                        <input type="time"
                                                                               class="form-control-plaintext _detail no-height" readonly
                                                                               name="end_time" data-id="end_time"
                                                                               onclick="editableField('end_time')" id="end_time"
                                                                               placeholder="{{ $details->caregivers?$details->caregivers->end_time:'' }}"
                                                                               value="{{ $details->caregivers?$details->caregivers->end_time:'' }}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="app-card app-card-custom box-shadow-none no-minHeight mt-3"
                                                 data-name="history">
                                                <div class="app-card-header">
                                                    <h1 class="title">History</h1>
                                                    <!-- <a href="javascript:void(0)" data-toggle="tooltip" data-placement="left" title="Add More">
                                                    <img src="../assets/img/icons/add_more_item.svg" alt="">
                                                 </a> -->
                                                </div>
                                                <div class="head">
                                                    <div class="p-3">
                                                        <table class="table table-bordered" style="width: 100%;"
                                                               id="employee-table">
                                                            <thead class="thead-inverse">
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>Phone No</th>
                                                                <th>Schedule Start Date Time</th>
                                                                <th>Schedule End Date Time</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @if(count($details->caregiver_history)>0)

                                                                @foreach($details->caregiver_history as $key=>$value)
                                                                    <tr>
                                                                        <td class="text-green">{{ $value->name }}</td>
                                                                        <td><a href="javascript:void(0)"
                                                                               class="patient_phone_no">{{ $value->phone }}</a>
                                                                        </td>
                                                                        <td>{{ $value->start_time }}</td>
                                                                        <td>{{ $value->end_time }}</td>
                                                                    </tr>
                                                                @endforeach
                                                            @endif
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="app-card app-card-custom box-shadow-none no-minHeight mt-3"
                                                 data-name="caregiver_interaction_detail">
                                                <div class="app-card-header">
                                                    <h1 class="title">Caregiver Interaction Detail</h1>
                                                    <!-- <a href="javascript:void(0)" data-toggle="tooltip" data-placement="left" title="Add More">
                                                 <img src="../assets/img/icons/add_more_item.svg" alt="">
                                              </a> -->
                                                </div>
                                                <div class="head">
                                                    <div class="p-3">
                                                        <table class="table table-bordered mb-0" style="width: 100%;"
                                                               id="employee-table">
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
                                                                <td class="text-green"><a
                                                                        href="javascript:void(0)">Infraction</a></td>
                                                                <td>Sunday, 1 October 2020</td>
                                                                <td>Wednesday, 4 October 2020</td>
                                                                <td>
                                                                    <a href="referral_user_profile.html"
                                                                       class="btn btn-info btn-sm btn-block">Action Taken</a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-green"><a
                                                                        href="javascript:void(0)">Infraction</a> </td>
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
                                                </div>
                                            </div>
                                            <div class="app-card app-card-custom box-shadow-none no-minHeight mt-3"
                                                 data-name="value_base_care_detail">
                                                <div class="app-card-header">
                                                    <h1 class="title">Value Base Care Detail</h1>
                                                    <!-- <a href="javascript:void(0)" data-toggle="tooltip" data-placement="left" title="Add More">
                                                       <img src="../assets/img/icons/add_more_item.svg" alt="">
                                                    </a> -->
                                                </div>
                                                <div class="head">
                                                    <div class="p-3">
                                                        <div class="_card">
                                                            <div class="_card_header">
                                                                <div class="title-head"><span style="font-weight: bold;">Q:</span>
                                                                    Lorem Ipsum is simply dummy text of the printing and
                                                                    typesetting industry?
                                                                </div>
                                                            </div>
                                                            <div class="_card_body">
                                                                <h1 class="_title"><span style="font-weight: bold;">Ans:</span>
                                                                    Lorem Ipsum
                                                                    has been the industry's standard dummy text ever since the
                                                                    1500s.
                                                                </h1>
                                                            </div>
                                                        </div>
                                                        <div class="_card mt-3">
                                                            <div class="_card_header">
                                                                <div class="title-head"><span style="font-weight: bold;">Q:</span>
                                                                    Lorem Ipsum is simply dummy text of the printing and
                                                                    typesetting industry?
                                                                </div>
                                                            </div>
                                                            <div class="_card_body">
                                                                <h1 class="_title"><span style="font-weight: bold;">Ans:</span>
                                                                    Lorem Ipsum
                                                                    has been the industry's standard dummy text ever since the
                                                                    1500s.
                                                                </h1>
                                                            </div>
                                                        </div>
                                                        <div class="_card mt-3">
                                                            <div class="_card_header">
                                                                <div class="title-head"><span style="font-weight: bold;">Q:</span>
                                                                    Lorem Ipsum is simply dummy text of the printing and
                                                                    typesetting industry?
                                                                </div>
                                                            </div>
                                                            <div class="_card_body">
                                                                <h1 class="_title"><span style="font-weight: bold;">Ans:</span>
                                                                    Lorem Ipsum
                                                                    has been the industry's standard dummy text ever since the
                                                                    1500s.
                                                                </h1>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </form>
                            </div>
                            <!-- Home Care End -->
                            <!-- Clinical Start -->
                            <div class="tab-pane fade" id="clinical" role="tabpanel"
                                 aria-labelledby="clinical-tab">
                                <div class="app-card app-card-custom" data-name="clinical">
                                    <div class="app-card-header">
                                        <h1 class="title">Clinical</h1>
                                        <!-- <a href="javascript:void(0)" data-toggle="tooltip" data-placement="left" title="Add More">
                                           <img src="../assets/img/icons/add_more_item.svg" alt="">
                                        </a> -->
                                    </div>
                                    <div class="head scrollbar scrollbar4">
                                        <div class="patient_detail"></div>
                                        <div class="shadow-sm">
                                            <ul class="nav nav-pills nav-clinical mb-3" id="pills-tab" role="tablist">
                                                <li class="nav-item" role="presentation">
                                                    <a class="nav-link rounded-0 active" id="social-pro-tab" data-toggle="pill"
                                                       href="#social-pro" role="tab" aria-controls="social-pro"
                                                       aria-selected="true">Social Pro</a>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <a class="nav-link rounded-0" id="md-med-profile-tab" data-toggle="pill"
                                                       href="#md-med-profile" role="tab" aria-controls="md-med-profile"
                                                       aria-selected="false">MD Med Profile</a>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <a class="nav-link rounded-0" id="behaviour-profile-tab" data-toggle="pill"
                                                       href="#behaviour-profile" role="tab" aria-controls="behaviour-profile"
                                                       aria-selected="false">Behaviour Profile</a>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <a class="nav-link rounded-0" id="assessment-tab" data-toggle="pill"
                                                       href="#assessment" role="tab" aria-controls="assessment"
                                                       aria-selected="false">Assessment</a>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <a class="nav-link rounded-0" id="progress-note-encounter-tab"
                                                       data-toggle="pill" href="#progress-note-encounter" role="tab"
                                                       aria-controls="progress-note-encounter" aria-selected="false">Progress
                                                        Note Encounter</a>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <a class="nav-link rounded-0" id="plan-of-care-tab" data-toggle="pill"
                                                       href="#plan-of-care" role="tab" aria-controls="plan-of-care"
                                                       aria-selected="false">Plan Of Care</a>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <a class="nav-link rounded-0" id="cover-note-tab" data-toggle="pill"
                                                       href="#cover-note" role="tab" aria-controls="cover-note"
                                                       aria-selected="false">Cover Note</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="p-3">
                                            <div class="tab-content" id="pills-tabContent">
                                                <!-- Social Pro Start-->
                                                <div class="tab-pane fade show active" id="social-pro" role="tabpanel"
                                                     aria-labelledby="social-pro-tab">
                                                    <ul class="nav nav-pills nav-clinical-new mb-3" id="pills-tab"
                                                        role="tablist">
                                                        <li class="nav-item" role="presentation">
                                                            <a class="nav-link rounded-0" id="sd-tab" data-toggle="pill"
                                                               href="#sd" role="tab" aria-controls="sd"
                                                               aria-selected="true">SD</a>
                                                        </li>
                                                        <li class="nav-item" role="presentation">
                                                            <a class="nav-link rounded-0" id="msw-tab" data-toggle="pill"
                                                               href="#msw" role="tab" aria-controls="msw"
                                                               aria-selected="false">MSW</a>
                                                        </li>
                                                        <li class="nav-item" role="presentation">
                                                            <a class="nav-link active rounded-0" id="aide-tab" data-toggle="pill"
                                                               href="#aide" role="tab" aria-controls="aide"
                                                               aria-selected="false">Aide</a>
                                                        </li>
                                                    </ul>
                                                    <div class="tab-content" id="pills-tabContent">
                                                        <!-- SD Start Here -->
                                                        <div class="tab-pane fade" id="sd" role="tabpanel"
                                                             aria-labelledby="sd-tab">
                                                            <div class="alert alert-info">
                                                                <span class="font-weight-bold">Frequency</span>: Frequency will be
                                                                specified in units. 1 hour is 1 unit. 30 minutes is 0.50 units.
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <div class="col-12 col-sm-1">
                                                                        <label for="range" class="label">&nbsp;</label>
                                                                        <div class="custom-control custom-checkbox mb-3">
                                                                            <input type="checkbox" id="range" name="range"
                                                                                   class="custom-control-input">
                                                                            <label class="custom-control-label"
                                                                                   for="range">Range</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 col-sm-2">
                                                                        <label for="from1" class="label">From</label>
                                                                        <input type="text" class="form-control form-control-lg"
                                                                               id="from1" name="from1" aria-describedby="fromHelp1">
                                                                    </div>
                                                                    <div class="col-12 col-sm-2">
                                                                        <label for="to" class="label">To</label>
                                                                        <input type="text" class="form-control form-control-lg"
                                                                               id="to" name="to" aria-describedby="toHelp">
                                                                    </div>
                                                                    <div class="col-12 col-sm-1">
                                                                        <label for="amount" class="label">Amount</label>
                                                                        <input type="text" class="form-control form-control-lg"
                                                                               id="amount" name="amount" aria-describedby="amountHelp">
                                                                    </div>
                                                                    <div class="col-12 col-sm-1">
                                                                        <label for="medication" class="label">Frequency</label>
                                                                        <select name="frequency" id="frequency"
                                                                                class="form-control">
                                                                            <option value="">Select</option>
                                                                            <option value="Sun">Sun</option>
                                                                            <option value="Mon">Mon</option>
                                                                            <option value="Tue">Tue</option>
                                                                            <option value="Wed">Wed</option>
                                                                            <option value="Thu">Thu</option>
                                                                            <option value="Fri">Fri</option>
                                                                            <option value="Sat">Sat</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-12 col-sm-1">
                                                                        <label for="duration1" class="label">Duration</label>
                                                                        <input type="text" class="form-control form-control-lg"
                                                                               id="duration1" name="duration1"
                                                                               aria-describedby="durationHelp1">
                                                                    </div>
                                                                    <div class="col-12 col-sm-1">
                                                                        <label for="type" class="label">Type</label>
                                                                        <select name="type" id="type" class="form-control">
                                                                            <option value="">Select</option>
                                                                            <option value="Visit">Visit</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-12 col-sm-1">
                                                                        <label for="hours" class="label">Hours</label>
                                                                        <input type="text" class="form-control form-control-lg"
                                                                               id="hours" name="hours" aria-describedby="hoursHelp">
                                                                    </div>
                                                                    <div class="col-12 col-sm-2">
                                                                        <label for="dates1" class="label">Dates</label>
                                                                        <input type="text" class="form-control form-control-lg"
                                                                               id="dates1" name="dates1" aria-describedby="datesHelp1">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <label for="additional_orders" class="label">Additional
                                                                            Order</label>
                                                                        <textarea name="additional_orders" id="additional_orders"
                                                                                  cols="30" rows="8"
                                                                                  class="form-control">Home Care Services:  PCA- Bathing, Dressing, Toileting, Skin, and Hair Care, Grooming, Assist with ADL/ Ambulation, Light Housekeeping/Dusting/Patient's Laundry/Bed Change and Shopping/Errands, Medication Reminder, Fluids Encouragement  PCA  8_ hours per day x _7_ days per week RN for Assessment q 6 months, PRN RN visit for change in patient status, --Aide Supervision every 6 months</textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="">
                                                                        <label for="addtional_goals" class="label">Additional
                                                                            Goals/Rehabilitation Potential/Discharge Plans</label>
                                                                        <textarea name="addtional_goals" id="addtional_goals"
                                                                                  cols="30" rows="8" class="form-control">The patient will remain safely in the home and have ADLs and personal care needs met. The patient will improve in the current level of functionality. No discharge plan at this time or until the patient no longer qualifies for home care services.
                                                            </textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12"></div>
                                                            </div>
                                                        </div>
                                                        <!-- SD Start End -->
                                                        <!-- MSW Start Here -->
                                                        <div class="tab-pane fade" id="msw" role="tabpanel"
                                                             aria-labelledby="msw-tab">
                                                            Content goes here....
                                                        </div>
                                                        <!-- MSW Start End -->
                                                        <!-- AIDE Start Start -->
                                                        <div class="tab-pane fade show active" id="aide" role="tabpanel"
                                                             aria-labelledby="aide-tab">
                                                            <div class="alert alert-info">
                                                                <span class="font-weight-bold">Frequency</span>: Frequency will be
                                                                specified in units. 1 hour is 1 unit. 30 minutes is 0.50 units.
                                                            </div>
                                                            <div class="app-card frequency_tab mb-3" id="frequency_tab"
                                                                 style="min-height: inherit;">
                                                                <div class="app-card-body">
                                                                    <div class="p-3">
                                                                        <div>
                                                                            <div class="row">
                                                                                <div class="col-12 col-sm-1">
                                                                                    <label for="range"
                                                                                           class="label pb-2">&nbsp;</label>
                                                                                    <div class="custom-control custom-checkbox">
                                                                                        <input type="checkbox" id="range1" name="range1"
                                                                                               class="custom-control-input">
                                                                                        <label class="custom-control-label"
                                                                                               for="range1">Range</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-12 col-sm-2">
                                                                                    <label for="from" class="label">From</label>
                                                                                    <input type="text"
                                                                                           class="form-control form-control-lg" id="from"
                                                                                           name="from" aria-describedby="fromHelp">
                                                                                </div>
                                                                                <div class="col-12 col-sm-2">
                                                                                    <label for="to1" class="label">To</label>
                                                                                    <input type="text"
                                                                                           class="form-control form-control-lg" id="to1"
                                                                                           name="to1" aria-describedby="toHelp1">
                                                                                </div>
                                                                                <div class="col-12 col-sm-1">
                                                                                    <label for="amount1" class="label">Amount</label>
                                                                                    <input type="text"
                                                                                           class="form-control form-control-lg"
                                                                                           id="amount1" name="amount1"
                                                                                           aria-describedby="amountHelp1">
                                                                                </div>
                                                                                <div class="col-12 col-sm-1">
                                                                                    <label for="frequency1"
                                                                                           class="label">Frequency</label>
                                                                                    <select name="frequency1" id="frequency1"
                                                                                            class="form-control" multiple>
                                                                                        <option value="Sun">Sun</option>
                                                                                        <option value="Mon">Mon</option>
                                                                                        <option value="Tue">Tue</option>
                                                                                        <option value="Wed">Wed</option>
                                                                                        <option value="Thu">Thu</option>
                                                                                        <option value="Fri">Fri</option>
                                                                                        <option value="Sat">Sat</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="col-12 col-sm-1">
                                                                                    <label for="duration"
                                                                                           class="label">Duration</label>
                                                                                    <input type="text"
                                                                                           class="form-control form-control-lg"
                                                                                           id="duration" name="duration"
                                                                                           aria-describedby="durationHelp">
                                                                                </div>
                                                                                <div class="col-12 col-sm-1">
                                                                                    <label for="type1" class="label">Type</label>
                                                                                    <select name="type1" id="type1"
                                                                                            class="form-control">
                                                                                        <option value="Visit">Visit</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="col-12 col-sm-1">
                                                                                    <label for="hours1" class="label">Hours</label>
                                                                                    <input type="text"
                                                                                           class="form-control form-control-lg" id="hours1"
                                                                                           name="hours1" aria-describedby="hoursHelp1">
                                                                                </div>
                                                                                <div class="col-12 col-sm-1">
                                                                                    <label for="dates" class="label">Dates</label>
                                                                                    <input type="text"
                                                                                           class="form-control form-control-lg" id="dates"
                                                                                           name="dates" aria-describedby="datesHelp">
                                                                                </div>
                                                                                <div class="col-12 col-sm-1">
                                                                                    <label for="dates" class="label">&nbsp;</label>
                                                                                    <div class="d-flex align-items-center">
                                                                                        <a href="javascript:void(0)"
                                                                                           class="mt-1 mr-2 add_frequency"
                                                                                           onclick="addMore('frequency_tab')"
                                                                                           data-toggle="tooltip" data-placement="left"
                                                                                           title="" data-original-title="Add Row">
                                                                                            <img
                                                                                                src="../assets/img/icons/add_more_item.svg"
                                                                                                alt="">
                                                                                        </a>
                                                                                        <a href="javascript:void(0)" class="mt-1 d-none"
                                                                                           data-toggle="tooltip" data-placement="left"
                                                                                           title="" data-original-title="Remove Row">
                                                                                            <img src="../assets/img/icons/remove_row.svg"
                                                                                                 alt="">
                                                                                        </a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <label for="poc_note" class="label">POC Note</label>
                                                                        <textarea name="poc_note" id="poc_note" cols="30" rows="8"
                                                                                  class="form-control"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="">
                                                                        <label for="other" class="label">Other</label>
                                                                        <textarea name="other" id="other" cols="30" rows="8"
                                                                                  class="form-control"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12"></div>
                                                            </div>
                                                        </div>
                                                        <!-- AIDE Start End -->
                                                    </div>
                                                </div>
                                                <!-- Social Pro End-->
                                                <!-- MD Med Profile Start-->
                                                <div class="tab-pane fade" id="md-med-profile" role="tabpanel"
                                                     aria-labelledby="md-med-profile-tab">
                                                    Content goes here..
                                                </div>
                                                <!-- MD Med Profile End-->
                                                <!-- Behaviour Profile Start-->
                                                <div class="tab-pane fade" id="behaviour-profile" role="tabpanel"
                                                     aria-labelledby="behaviour-profile-tab">
                                                    Content goes here..
                                                </div>
                                                <!-- Behaviour Profile End-->
                                                <!-- Assessment Start-->
                                                <div class="tab-pane fade" id="assessment" role="tabpanel"
                                                     aria-labelledby="assessment-tab">
                                                    Content goes here..
                                                </div>
                                                <!-- Assessment End-->
                                                <!-- Progress Note Encounter Start-->
                                                <div class="tab-pane fade" id="progress-note-encounter" role="tabpanel"
                                                     aria-labelledby="progress-note-encounter-tab">
                                                    Content goes here..
                                                </div>
                                                <!-- Progress Note Encounter End-->
                                                <!-- Plan Of Care Start-->
                                                <div class="tab-pane fade" id="plan-of-care" role="tabpanel"
                                                     aria-labelledby="plan-of-care-tab">
                                                    Content goes here..
                                                </div>
                                                <!-- Plan Of Care End-->
                                                <!-- Cover Note Start-->
                                                <div class="tab-pane fade" id="cover-note" role="tabpanel"
                                                     aria-labelledby="cover-note-tab">
                                                    Content goes here..
                                                </div>
                                                <!-- Cover Note End-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Clinical End -->
                            <!-- Physician Start -->
                            <div class="tab-pane fade" id="physican" role="tabpanel" aria-labelledby="physican-tab">
                                <div class="app-card app-card-custom" data-name="physician">
                                    <div class="app-card-header">
                                        <h1 class="title">Physician</h1>
                                        <!-- <a href="javascript:void(0)" data-toggle="tooltip" data-placement="left" title="Add More">
                                           <img src="../assets/img/icons/add_more_item.svg" alt="">
                                        </a> -->
                                    </div>
                                    <div class="head scrollbar scrollbar4">
                                        <div class="p-3">
                                            @if($details->primary_physician)
                                                <div class="app-card app-card-custom box-shadow-none"
                                                     data-name="primary_care_physician">
                                                    <div class="app-card-header">
                                                        <h1 class="title">Primary Care Physician</h1>
                                                        <!-- <a href="javascript:void(0)" data-toggle="tooltip" data-placement="left" title="Add More">
                                                           <img src="../assets/img/icons/add_more_item.svg" alt="">
                                                        </a> -->
                                                    </div>
                                                    <div class="head">
                                                        <div class="p-3">
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <div class="col-12 col-sm-4">
                                                                        <div class="d-flex align-items-center">
                                                                            <div>
                                                                                <i class="las la-angle-double-right circle"></i>
                                                                            </div>
                                                                            <div>
                                                                                <h3 class="_title">Name</h3>
                                                                                <h1 class="_detail">{{ isset($details->primary_physician->clinician)?$details->primary_physician->clinician->first_name.' '.$details->primary_physician->clinician->last_name:'-' }}</h1>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 col-sm-4">
                                                                        <div class="d-flex align-items-center">
                                                                            <div>
                                                                                <i class="las la-angle-double-right circle"></i>
                                                                            </div>
                                                                            <div>
                                                                                <h3 class="_title">Email</h3>
                                                                                <a href="mailto:{{ isset($details->primary_physician->clinician)?$details->primary_physician->clinician->email:'-' }}"
                                                                                   class="_detail">{{ isset($details->primary_physician->clinician)?$details->primary_physician->clinician->email:'-' }}</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 col-sm-4">
                                                                        <div class="d-flex align-items-center">
                                                                            <div>
                                                                                <i class="las la-angle-double-right circle"></i>
                                                                            </div>
                                                                            <div>
                                                                                <h3 class="_title">Phone Number With Ext</h3>
                                                                                <h1 class="_detail">{{ isset($details->primary_physician->clinician)?$details->primary_physician->clinician->phone_format:'-' }}</h1>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="d-flex align-items-center">
                                                                        <div>
                                                                            <i class="las la-angle-double-right circle"></i>
                                                                        </div>
                                                                        <div>
                                                                            <h3 class="_title">Address</h3>
                                                                            <h1 class="_detail">-
                                                                            </h1>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                            @if($details->specialist_physician)
                                                <div class="app-card app-card-custom box-shadow-none mt-3"
                                                 data-name="specialist_physician">
                                                <div class="app-card-header">
                                                    <h1 class="title">Specialist Physician</h1>
                                                    <!-- <a href="javascript:void(0)" data-toggle="tooltip" data-placement="left" title="Add More">
                                                       <img src="../assets/img/icons/add_more_item.svg" alt="">
                                                    </a> -->
                                                </div>
                                                <div class="head">
                                                    <div class="p-3">
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-12 col-sm-4">
                                                                    <div class="d-flex align-items-center">
                                                                        <div>
                                                                            <i class="las la-angle-double-right circle"></i>
                                                                        </div>
                                                                        <div>
                                                                            <h3 class="_title">Name</h3>
                                                                            <h1 class="_detail">{{ isset($details->specialist_physician->clinician)?$details->specialist_physician->clinician->first_name.' '.$details->specialist_physician->clinician->last_name:'-' }}</h1>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-sm-4">
                                                                    <div class="d-flex align-items-center">
                                                                        <div>
                                                                            <i class="las la-angle-double-right circle"></i>
                                                                        </div>
                                                                        <div>
                                                                            <h3 class="_title">Email</h3>
                                                                            <a href="mailto:{{ isset($details->specialist_physician->clinician)?$details->specialist_physician->clinician->email:'-' }}"
                                                                               class="_detail">{{ isset($details->specialist_physician->clinician)?$details->specialist_physician->clinician->email:'-' }}</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-sm-4">
                                                                    <div class="d-flex align-items-center">
                                                                        <div>
                                                                            <i class="las la-angle-double-right circle"></i>
                                                                        </div>
                                                                        <div>
                                                                            <h3 class="_title">Phone Number With Ext</h3>
                                                                            <h1 class="_detail">{{ isset($details->specialist_physician->clinician)?$details->specialist_physician->clinician->phone_format:'-' }}</h1>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="d-flex align-items-center">
                                                                    <div>
                                                                        <i class="las la-angle-double-right circle"></i>
                                                                    </div>
                                                                    <div>
                                                                        <h3 class="_title">Address</h3>
                                                                        <h1 class="_detail">-
                                                                        </h1>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                            @if($details->case_manager)
                                                <div class="app-card app-card-custom box-shadow-none no-minHeight mt-3"
                                                 data-name="case_manager">
                                                <div class="app-card-header">
                                                    <h1 class="title">Case Manager</h1>
                                                    <!-- <a href="javascript:void(0)" data-toggle="tooltip" data-placement="left" title="Add More">
                                                       <img src="../assets/img/icons/add_more_item.svg" alt="">
                                                    </a> -->
                                                </div>
                                                <div class="head">
                                                    <div class="p-3">
                                                        <div class="">
                                                            <div class="row">
                                                                <div class="col-12 col-sm-4">
                                                                    <div class="d-flex align-items-center">
                                                                        <div>
                                                                            <i class="las la-angle-double-right circle"></i>
                                                                        </div>
                                                                        <div>
                                                                            <h3 class="_title">Name</h3>
                                                                            <h1 class="_detail">{{ isset($details->case_manager->clinician)?$details->case_manager->clinician->first_name.' '.$details->case_manager->clinician->last_name:'-' }}</h1>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-sm-4">
                                                                    <div class="d-flex align-items-center">
                                                                        <div>
                                                                            <i class="las la-angle-double-right circle"></i>
                                                                        </div>
                                                                        <div>
                                                                            <h3 class="_title">Employement Type</h3>
                                                                            <h1 class="_detail">-</h1>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-sm-4">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Physician End -->
                            <!-- Diagnosis Start -->
                            <div class="tab-pane fade" id="diagnosis" role="tabpanel" aria-labelledby="diagnosis-tab">
                                <div class="app-card app-card-custom" data-name="diagnosis">
                                    <div class="app-card-header">
                                        <h1 class="title">Diagnosis</h1>
                                        <!-- <a href="javascript:void(0)" data-toggle="tooltip" data-placement="left" title="Add More">
                                           <img src="../assets/img/icons/add_more_item.svg" alt="">
                                        </a> -->
                                    </div>
                                    <div class="head scrollbar scrollbar4">
                                        <div class="p-3">
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
                            <!-- Med Profile Start -->
                            <div class="tab-pane fade" id="medProfile" role="tabpanel" aria-labelledby="medProfile-tab">
                                <div class="app-card app-card-custom" data-name="med_profile">
                                    <div class="app-card-header">
                                        <h1 class="title">Med Profile</h1>
                                    </div>
                                    <div class="head scrollbar scrollbar4">
                                        <div class="p-3">
                                            <div>
                                                <div class="table-responsive">
                                                    <table class="table" id="med-profile-table">
                                                        <thead>
                                                            <tr>
                                                                <th>Medication</th>
                                                                <th>Dose</th>
                                                                <th>Amount</th>
                                                                <th>Form</th>
                                                                <th>Route</th>
                                                                <th>Freq.</th>
                                                                <th>Order Date</th>
                                                                <th>Start Date</th>
                                                                <th>Date Taught</th>
                                                                <th>Disc. Date</th>
                                                                <th>Comments</th>
                                                                <th>Status</th>
                                                                <th>Doc</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Med Profile End -->
                            <!-- Pharmacy Start -->
                            <div class="tab-pane fade" id="pharmacy" role="tabpanel" aria-labelledby="pharmacy-tab">
                                <div class="app-card app-card-custom" data-name="pharmacy">
                                    <div class="app-card-header">
                                        <h1 class="title">Pharmacy</h1>
                                        <!-- <a href="javascript:void(0)" data-toggle="tooltip" data-placement="left" title="Add More">
                                           <img src="../assets/img/icons/add_more_item.svg" alt="">
                                        </a> -->
                                    </div>
                                    <div class="head scrollbar scrollbar4">
                                    </div>
                                </div>
                            </div>
                            <!-- Pharmacy End -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('app-video')
    <div class="modal" tabindex="-1" id="patientMedicateInfo">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Patient Medication Info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="patient-medication-info">
                        <input type="hidden" name="patient_id" value="{{ $details->id }}">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-12 col-sm-4">
                                    <div class="form-group">
                                        <label for="status" class="label">Status</label>
                                        <div class="d-flex">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="new" name="status" class="custom-control-input" value="1">
                                                <label class="custom-control-label" for="new">New</label>
                                            </div>
                                            <div class="custom-control custom-radio ml-2">
                                                <input type="radio" id="existing" name="status" class="custom-control-input" value="0">
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
                                        <option value="">Select</option>
                                        @foreach(\App\Models\DoseMaster::where('status','=','active')->get() as $key=>$value)
                                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <label for="form" class="label">Form</label>
                                    <select class="form-control" name="form" id="form">
                                        <option value="Select">Select</option>
                                        @foreach(\App\Models\MedicineFromMaster::where('status','=','active')->get() as $key=>$value)
                                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <label for="route" class="label">Route</label>
                                    <select class="form-control" name="route" id="route">
                                        <option value="Select">Select</option>
                                        @foreach(\App\Models\MedicineMaster::where('status','=','active')->get() as $key=>$value)
                                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-12 col-sm-4">
                                    <label for="amount2" class="label">Amount</label>
                                    <input type="number" class="form-control form-control-lg" id="amount2" name="amount"
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
                                        @foreach(\App\Models\FrequencyMaster::where('status','=','active')->get() as $key=>$value)
                                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-12 col-sm-4">
                                    <label for="startdate" class="label">Start Date</label>
                                    <input type="date" class="form-control form-control-lg" id="startdate" name="startdate"
                                           aria-describedby="startdateHelp">
                                </div>
                                <div class="col-12 col-sm-4">
                                    <label for="orderdate" class="label">Order Date</label>
                                    <input type="date" class="form-control form-control-lg" id="orderdate" name="orderdate"
                                           aria-describedby="orderdateHelp">
                                </div>
                                <div class="col-12 col-sm-4">
                                    <label for="taughtdate" class="label">Taught Date</label>
                                    <input type="date" class="form-control form-control-lg" id="taughtdate" name="taughtdate"
                                           aria-describedby="taughtdateHelp">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-12 col-sm-4">
                                    <label for="discontinuedate" class="label">Discontinue Date</label>
                                    <input type="date" class="form-control form-control-lg" id="discontinuedate"
                                           name="discontinuedate" aria-describedby="discontinuedateHelp">
                                </div>
                                <div class="col-12 col-sm-4">
                                    <label for="discountinueorderdate" class="label">Discontinue Order Date</label>
                                    <input type="date" class="form-control form-control-lg" id="discountinueorderdate"
                                           name="discountinueorderdate" aria-describedby="discountinueorderdateHelp">
                                </div>
                                <div class="col-12 col-sm-4">
                                    <label for="preferredPharmacy" class="label">Preferred Pharmacy</label>
                                    <select class="form-control" name="preferredPharmacy" id="preferredPharmacy">
                                        <option value="Select">Select</option>
                                        @foreach(\App\Models\PreferredPharmacyMaster::where('status','=','active')->get() as $key=>$value)
                                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                                        @endforeach
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
                                <input type="checkbox" id="customCheckbox1" name="is_md_order" class="custom-control-input">
                                <label class="custom-control-label" for="customCheckbox1">Include new medication in the MD
                                    Order</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" id="customCheckbox2" name="is_medication" class="custom-control-input">
                                <label class="custom-control-label" for="customCheckbox2">Create an interim order for the new
                                    medication</label>
                            </div>
                        </div>
                        <div>
                            Note: The 'Include New Medication in the MD Order' checkbox will add the medication in 'New' MD
                            only.
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-gray mr-3" data-dismiss="modal">Save</button>
                    <button type="button" class="btn btn-outline-green" onclick="addPatientMedication({{ $details->id }})">Submit</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/js/dataTables.fixedColumns.min.js') }}"></script>
    <script src="https://unpkg.com/@google/markerclustererplus@4.0.1/dist/markerclustererplus.min.js"></script>
    <script>
        var patient_id='{{ $details->id }}';
        var map;
        function initMap() {
            var lat = $('#address').attr('data-lat');
            var lng = $('#address').attr('data-lng');
            const iconBase =
                base_url+"assets/img/icons/patient-icon.svg";
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
    <script src="{{ asset('assets/js/app.clinician.patient.details.js') }}"></script>


@endpush

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/fixedColumns.dataTables.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/dataTables.bootstrap4.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/buttons.bootstrap4.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/datatables.min.css') }}">
@endpush
