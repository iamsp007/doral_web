@extends('pages.layouts.app')

@section('title','Welcome to Doral')
@section('pageTitleSection')
    Dashboard
@endsection

@section('content')
    <div class="app-clinician-dashboard">

        <ul class="clinician-nav nav">
            <li id="tab_blood_pressure"><a href="#bloodPressure" class="active" data-toggle="pill" role="tab">Blood Pressure</a></li>
            <li id="tab_blood_sugar"><a href="#bloodSugar" data-toggle="pill" role="tab">Blood Sugar</a></li>
            <li id="tab_pulse_oxymeter"><a href="#pulseOxymeter" data-toggle="pill" role="tab">Pulse Oxymeter</a></li>
            <li id="tab_weight"><a href="#weight" data-toggle="pill" role="tab">Weight</a></li>
            <li id="tab_ekg"><a href="#EKG" data-toggle="pill" role="tab">EKG</a></li>
        </ul>
        <div class="clinician-content tab-content" id="v-pills-tabContent">
            <div class="tab-pane show active" id="bloodPressure" role="tabpanel" aria-labelledby="v-pills-bloodPressure-tab">
            </div>
            <div class="tab-pane" id="bloodSugar" role="tabpanel" aria-labelledby="v-pills-bloodSugar-tab">
            </div>
            <div class="tab-pane" id="pulseOxymeter" role="tabpanel" aria-labelledby="v-pills-pulseOxymeter-tab">
            </div>
            <div class="tab-pane" id="weight" role="tabpanel" aria-labelledby="v-pills-weight-tab">
            </div>
            <div class="tab-pane" id="EKG" role="tabpanel" aria-labelledby="v-pills-EKG-tab">
            </div>
            <div class="reports">
                <ul class="reports-nav nav">
                    <li>
                        <a href="#bloodPressuredailyupdate" class="active" data-toggle="pill"
                            role="tab">
                            <span>
                                <img src="../assets/img/icons/blood-pressure.svg" alt=""
                                    srcset="../assets/img/icons/blood-pressure.svg" class="img-fluid">
                            </span>
                            Blood Pressure
                        </a>
                    </li>
                    <li>
                        <a href="#bloodSugardailyupdate" data-toggle="pill" role="tab">
                            <span>
                                <img src="../assets/img/icons/blood-sugar.svg" alt=""
                                    srcset="../assets/img/icons/blood-sugar.svg" class="img-fluid">
                            </span>
                            Blood Sugar
                        </a>
                    </li>
                    <li>
                        <a href="#pulseOxymeterdailyupdate" data-toggle="pill" role="tab">
                            <span>
                                <img src="../assets/img/icons/pulse.svg" alt=""
                                    srcset="../assets/img/icons/pulse.svg" class="img-fluid">
                            </span>
                            Pulse Oxymeter
                        </a>
                    </li>
                    <li>
                        <a href="#weightdailyupdate" data-toggle="pill" role="tab">
                            <span>
                                <img src="../assets/img/icons/weight.svg" alt=""
                                    srcset="../assets/img/icons/weight.svg" class="img-fluid">
                            </span>
                            Weight
                        </a>
                    </li>
                    <li>
                        <a href="#EKGdailyupdate" data-toggle="pill" role="tab">
                            <span>
                                <img src="../assets/img/icons/ekg.svg" alt=""
                                    srcset="../assets/img/icons/EKG.svg" class="img-fluid">
                            </span>
                            EKG
                        </a>
                    </li>
                </ul>
                <div class="content tab-content" id="v-pills-tabContent">
                    <!-- Blood Pressure Tab Start -->
                    <div class="tab-pane show active" id="bloodPressuredailyupdate" role="tabpanel"
                        aria-labelledby="bloodPressuredailyupdate">
                    </div>
                    <!-- Blood Sugar Tab Start -->
                    <div class="tab-pane show" id="bloodSugardailyupdate" role="tabpanel"
                        aria-labelledby="v-pills-home-tab">
                    </div>
                    <!-- Pulse Oximeter Tab Start -->
                    <div class="tab-pane show" id="pulseOxymeterdailyupdate" role="tabpanel"
                        aria-labelledby="v-pills-home-tab">
                    </div>
                    <!-- Weight Tab Start -->
                    <div class="tab-pane show" id="weightdailyupdate" role="tabpanel"
                        aria-labelledby="v-pills-home-tab">
                    </div>
                    <!-- EKG Tab Start -->
                    <div class="tab-pane show" id="EKGdailyupdate" role="tabpanel"
                        aria-labelledby="v-pills-home-tab">
                    </div>
                </div>
            </div>
            <div class="appointment">
                <div class="appointment-date-calender">
                    <div id="datepicker"></div>
                </div>
                <input type="hidden" id="sendDate" readonly>
                <div class="content tab-content" id="appointments">
                    
                </div>
            </div>
            <div class="row mt-4">
                <div class="col col-sm-4">
                    <!-- complete televisit -->
                    <div class="complete-televisit effect">
                        <a href="javascript:void(0)" class="app-card">
                            <div class="app-card-body">
                                <div class="left-side">
                                    <div class="_t1">Completed Televisit <span>(Weekly)</span></div>
                                    <h1 class="_t2">100</h1>
                                    <button type="submit" class="view-btn mt-1" name="signup">VIEW
                                        All</button>
                                </div>
                                <div class="right-side">
                                    <div class="bg-circle">
                                        <img src="../assets/img/icons/smartphone.svg" alt=""
                                            srcset="../assets/img/icons/smartphone.svg">
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col col-sm-4 pl-0">
                    <!-- Upcoming Appointment -->
                    <div class="upcoming-apt effect">
                        <a href="javascript:void(0)" class="app-card">
                            <div class="app-card-body">
                                <div class="left-side">
                                    <div class="_t1">Upcoming Appointments <span>(Weekly)</span></div>
                                    <h1 class="_t2">100</h1>
                                    <button type="submit" class="view-btn mt-1" name="signup">VIEW
                                        All</button>
                                </div>
                                <div class="right-side">
                                    <div class="bg-circle">
                                        <img src="../assets/img/icons/appointment.svg" alt=""
                                            srcset="../assets/img/icons/appointment.svg">
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col col-sm-4 pl-0">
                    <!-- Cancel Televisit -->
                    <div class="cnl-televisit effect">
                        <a href="javascript:void(0)" class="app-card">
                            <div class="app-card-body">
                                <div class="left-side">
                                    <div class="_t1">Cancel Televisit</div>
                                    <h1 class="_t2">5</h1>
                                    <button type="submit" class="view-btn mt-1" name="signup">VIEW
                                        All</button>
                                </div>
                                <div class="right-side">
                                    <div class="bg-circle">
                                        <img src="../assets/img/icons/appointment_cal.svg" alt=""
                                            srcset="../assets/img/icons/appointment_cal.svg">
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col col-sm-4">
                    <!-- Case Management: RPM -->
                    <div class="cm-rpm effect">
                        <a href="javascript:void(0)" class="app-card">
                            <div class="app-card-body">
                                <div class="left-side">
                                    <div class="_t1">Case Management: RPM</div>
                                    <h1 class="_t2">50</h1>
                                    <button type="submit" class="view-btn mt-1" name="signup">VIEW
                                        All</button>
                                </div>
                                <div class="right-side">
                                    <div class="bg-circle">
                                        <img src="../assets/img/icons/cm-home.svg" alt=""
                                            srcset="../assets/img/icons/cm-home.svg">
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col col-sm-4 pl-0">
                    <!-- Case Management: CCM -->
                    <div class="cm-ccm effect">
                        <a href="javascript:void(0)" class="app-card">
                            <div class="app-card-body">
                                <div class="left-side">
                                    <div class="_t1">Case Management: CCM</div>
                                    <h1 class="_t2">100</h1>
                                    <button type="submit" class="view-btn mt-1" name="signup">VIEW
                                        All</button>
                                </div>
                                <div class="right-side">
                                    <div class="bg-circle">
                                        <img src="../assets/img/icons/x-ray.svg" alt=""
                                            srcset="../assets/img/icons/x-ray.svg">
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col col-sm-4 pl-0">
                    <!-- Waiting Room -->
                    <div class="waiting-room effect">
                        <a href="javascript:void(0)" class="app-card">
                            <div class="app-card-body">
                                <div class="left-side">
                                    <div class="_t1">Waiting Room</div>
                                    <h1 class="_t2">10</h1>
                                    <button type="submit" class="view-btn mt-1" name="signup">VIEW
                                        All</button>
                                </div>
                                <div class="right-side">
                                    <div class="bg-circle">
                                        <img src="../assets/img/icons/call-waiting.svg" alt=""
                                            srcset="../assets/img/icons/call-waiting.svg">
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col col-sm-4">
                    <!-- Insurance Expired -->
                    <div class="ins-expired effect">
                        <a href="javascript:void(0)" class="app-card">
                            <div class="app-card-body">
                                <div class="left-side">
                                    <div class="_t1">Insurance Expired</div>
                                    <h1 class="_t2">22</h1>
                                    <button type="submit" class="view-btn mt-1" name="signup">VIEW
                                        All</button>
                                </div>
                                <div class="right-side">
                                    <div class="bg-circle">
                                        <img src="../assets/img/icons/house-insurance.svg" alt=""
                                            srcset="../assets/img/icons/house-insurance.svg">
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col col-sm-8 pl-0">
                    <div class="signature effect">
                        <div class="row">
                            <div class="col col-sm-6">
                                <!-- Done Authenticate Signature -->
                                <div class="auth-signature">
                                    <a href="javascript:void(0)" class="app-card">
                                        <div class="app-card-body">
                                            <div class="left-side">
                                                <div class="_t1">Done Authenticate Signature</div>
                                                <h1 class="_t2">100</h1>
                                                <button type="submit" class="view-btn mt-1"
                                                    name="signup">VIEW All</button>
                                            </div>
                                            <div class="right-side">
                                                <div class="bg-circle">
                                                    <img src="../assets/img/icons/contract.svg" alt=""
                                                        srcset="../assets/img/icons/contract.svg">
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col col-sm-6">
                                <!-- New Signature -->
                                <div class="new-signature effect">
                                    <a href="javascript:void(0)" class="app-card">
                                        <div class="app-card-body">
                                            <div class="left-side">
                                                <div class="_t1">New Signature</div>
                                                <h1 class="_t2">5</h1>
                                                <button type="submit" class="view-btn mt-1"
                                                    name="signup">TAKE ACTION</button>
                                            </div>
                                            <div class="right-side">
                                                <div class="bg-circle">
                                                    <img src="../assets/img/icons/contract.svg" alt=""
                                                        srcset="../assets/img/icons/contract.svg">
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/jquery-ui.min.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('assets/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/app.clinician.dashboard.js') }}"></script>
@endpush
