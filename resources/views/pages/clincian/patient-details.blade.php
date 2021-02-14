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
                            <li>Gender: <span><?php if($patient->gender == 1) { echo 'Male'; }else { echo 'Female'; } ?></span></li>
                            <li>DOB: <span><?php echo date('m-d-Y', strtotime($patient->birth_date)) ?></span></li>
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
                              <a class="nav-link d-flex align-items-center" id="homecare-tab" data-toggle="pill"
                                 href="#homecare" role="tab" aria-controls="homecare" aria-selected="false">
                                 <img src="../assets/img/icons/icons_home_care.svg" alt="" class="mr-2 inactiveIcon">
                                 <img src="../assets/img/icons/icons_home_care_active.svg" alt=""
                                    class="mr-2 activeIcon">Home
                                 Care</a>
                           </li>
                        </ul>
                    </div>
                    <div class="col-12 col-sm-10">
                        <div class="tab-content" id="v-pills-tabContent">
                           
                            <!-- Demographics Start -->
                            @include('pages.patient_detail.demographic')
                            <!-- Demographics End -->
                            
                             <!-- Home Care Start -->
                             @include('pages.patient_detail.home_care')
                            <!-- Home Care End -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection