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
                            <img src="" alt="" srcset=""
                                 class="img-fluid">
                        </div>
                        <div class="name">
                            {{ $patient->first_name }} {{ $patient->last_name }}
                        </div>
                    </div>
                    <div>
                        <ul class="shortdesc">
                            <li>Patient ID: <span>{{ $patient->patient_id }}</span></li>
                            <li>Gender: <span>{{ $patient->gender }}</span></li>
                            <li>DOB: <span>{{ $patient->birth_date }}</span></li>
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
                                             data-placement="bottom" title="Update ADSD" class="cursor-pointer d-none update-icon" alt=""
                                             onclick="updateAllField('demographic')">
                                    </div>
                                    <div class="head scrollbar scrollbar4">
                                        <form id="demographic_form">
                                            <input type="hidden" name="patient_id" value="{{ $patient->id }}">
                                            <div class="p-3">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-12 col-sm-3 col-md-3">
                                                            <div class="d-flex align-items-center">
                                                                <div>
                                                                    <!-- <i class="las la-phone circle"></i> -->
                                                                </div>
                                                                <div>
                                                                    <h3 class="_title">AgencyID</h3>
                                                                    <div>
                                                                        <p>{{ $patient->agency_id }}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-3 col-md-3">
                                                            <div class="d-flex align-items-center">
                                                                <div>
                                                                    <!-- <i class="las la-phone circle"></i> -->
                                                                </div>
                                                                <div>
                                                                    <h3 class="_title">OfficeID</h3>
                                                                    <div>
                                                                        <p>{{ $patient->office_id }}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-3 col-md-3">
                                                            <div class="d-flex align-items-center">
                                                                <div>
                                                                    <!-- <i class="las la-phone circle"></i> -->
                                                                </div>
                                                                <div>
                                                                    <h3 class="_title">PriorityCode</h3>
                                                                    <div>
                                                                        <p>{{ $patient->priority_code }}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-3 col-md-3">
                                                            <div class="d-flex align-items-center">
                                                                <div>
                                                                    <!-- <i class="las la-phone circle"></i> -->
                                                                </div>
                                                                <div>
                                                                    <h3 class="_title">ServiceRequestStartDate</h3>
                                                                    <div>
                                                                        <p>{{ $patient->service_request_start_date }}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-12 col-sm-3 col-md-3">
                                                            <div class="d-flex align-items-center">
                                                                <div>
                                                                    <!-- <i class="las la-phone circle"></i> -->
                                                                </div>
                                                                <div>
                                                                    <h3 class="_title">AdmissionID</h3>
                                                                    <div>
                                                                        <p>{{ $patient->admission_id }}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-3 col-md-3">
                                                            <div class="d-flex align-items-center">
                                                                <div>
                                                                    <!-- <i class="las la-phone circle"></i> -->
                                                                </div>
                                                                <div>
                                                                    <h3 class="_title">MedicaidNumber</h3>
                                                                    <div>
                                                                        <p>{{ $patient->medica_id_number }}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-3 col-md-3">
                                                            <div class="d-flex align-items-center">
                                                                <div>
                                                                    <!-- <i class="las la-phone circle"></i> -->
                                                                </div>
                                                                <div>
                                                                    <h3 class="_title">MedicareNumber</h3>
                                                                    <div>
                                                                        <p>{{ $patient->medicare_number }}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-3 col-md-3">
                                                            <div class="d-flex align-items-center">
                                                                <div>
                                                                    <!-- <i class="las la-phone circle"></i> -->
                                                                </div>
                                                                <div>
                                                                    <h3 class="_title">SSN</h3>
                                                                    <div>
                                                                        <p>{{ $patient->ssn }}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-12 col-sm-3 col-md-3">
                                                            <div class="d-flex align-items-center">
                                                                <div>
                                                                    <!-- <i class="las la-phone circle"></i> -->
                                                                </div>
                                                                <div>
                                                                    <h3 class="_title">PayerName</h3>
                                                                    <div>
                                                                        <p>{{ ($patient->payer) ? $patient->payer->payer_name : '' }}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-3 col-md-3">
                                                            <div class="d-flex align-items-center">
                                                                <div>
                                                                    <!-- <i class="las la-phone circle"></i> -->
                                                                </div>
                                                                <div>
                                                                    <h3 class="_title">PayerCoordinatorID</h3>
                                                                    <div>
                                                                        <p>{{ ($patient->payer) ? $patient->payer->payer_coordinator_id : '' }}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-3 col-md-3">
                                                            <div class="d-flex align-items-center">
                                                                <div>
                                                                    <!-- <i class="las la-phone circle"></i> -->
                                                                </div>
                                                                <div>
                                                                    <h3 class="_title">PayerCoordinatorName</h3>
                                                                    <div>
                                                                        <p>{{ ($patient->payer) ? $patient->payer->payer_coordinator_name : '' }}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-3 col-md-3">
                                                            <div class="d-flex align-items-center">
                                                                <div>
                                                                    <!-- <i class="las la-phone circle"></i> -->
                                                                </div>
                                                                <div>
                                                                    <h3 class="_title">PatientStatusID</h3>
                                                                    <div>
                                                                        <p>{{ ($patient->payer) ? $patient->payer->patient_status_id : '' }}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-12 col-sm-3 col-md-3">
                                                            <div class="d-flex align-items-center">
                                                                <div>
                                                                    <!-- <i class="las la-phone circle"></i> -->
                                                                </div>
                                                                <div>
                                                                    <h3 class="_title">PatientStatusName</h3>
                                                                    <div>
                                                                        <p>{{ ($patient->payer) ? $patient->payer->patient_status_name : '' }}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- Demographics End -->
                            </div>
                            <!-- Demographics End -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection