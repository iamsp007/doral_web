@extends('pages.layouts.app')

@section('title','Clinician Dashboard')
@section('pageTitleSection')
    Dashboard
@endsection

@section('content')
    <div class="app-clinician-dashboard">
        <ul class="clinician-nav nav">
            <li id="tab_blood_pressure"><a href="#bloodPressure" class="active" data-toggle="pill" role="tab">Blood Pressure</a></li>
            <li id="tab_blood_sugar"><a href="#bloodSugar" data-toggle="pill" role="tab">Blood Sugar</a></li>
            <li id="tab_weight"><a href="#weight" data-toggle="pill" role="tab">Weight</a></li>
            <li id="tab_pulse_oxymeter"><a href="#pulseOxymeter" data-toggle="pill" role="tab">Pulse Oxymeter</a></li>
            <li id="tab_ekg"><a href="#EKG" data-toggle="pill" role="tab">EKG</a></li>
        </ul>
        <div class="clinician-content tab-content" id="v-pills-tabContent">
            <div class="tab-pane show active" id="bloodPressure" role="tabpanel" aria-labelledby="v-pills-bloodPressure-tab">
            </div>
            <div class="tab-pane" id="bloodSugar" role="tabpanel" aria-labelledby="v-pills-bloodSugar-tab">
            </div>
            <div class="tab-pane" id="weight" role="tabpanel" aria-labelledby="v-pills-weight-tab">
            </div>
            <div class="tab-pane" id="pulseOxymeter" role="tabpanel" aria-labelledby="v-pills-pulseOxymeter-tab">
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
                        <a href="#weightdailyupdate" data-toggle="pill" role="tab">
                            <span>
                                <img src="../assets/img/icons/weight.svg" alt=""
                                    srcset="../assets/img/icons/weight.svg" class="img-fluid">
                            </span>
                            Weight
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
                        aria-labelledby="bloodSugardailyupdate">
                    </div>
                    <!-- Weight Tab Start -->
                    <div class="tab-pane show" id="weightdailyupdate" role="tabpanel"
                        aria-labelledby="weightdailyupdate">
                    </div>
                    <!-- Pulse Oximeter Tab Start -->
                    <div class="tab-pane show" id="pulseOxymeterdailyupdate" role="tabpanel"
                        aria-labelledby="pulseOxymeterdailyupdate">
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
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/jquery-ui.min.css') }}">
@endpush

@push('scripts')
    <script>
        var user_device_url = "{{ Route('ccm.index') }}";
        var user_device_url = "{{ Route('ccm.index') }}";
    </script>
    <script>
        var auth_user_id = $('.auth_user_id').val();
        var auth_user_name = $('.auth_user_first_name').val() + ' ' + $('.auth_user_last_name').val();
        var auth_user_email = $('.auth_user_email').val();
        console.log('auth_user_id: ' + auth_user_id);
        console.log('auth_user_name: ' + auth_user_name);
        console.log('auth_user_email: ' + auth_user_email);

        (function(apiKey){
            (function(p,e,n,d,o){var v,w,x,y,z;o=p[d]=p[d]||{};o._q=o._q||[];
            v=['initialize','identify','updateOptions','pageLoad','track'];for(w=0,x=v.length;w<x;++w)(function(m){
                o[m]=o[m]||function(){o._q[m===v[0]?'unshift':'push']([m].concat([].slice.call(arguments,0)));};})(v[w]);
                y=e.createElement(n);y.async=!0;y.src='https://cdn.pendo.io/agent/static/'+apiKey+'/pendo.js';
                z=e.getElementsByTagName(n)[0];z.parentNode.insertBefore(y,z);})(window,document,'script','pendo');

                pendo.initialize({
                    visitor: {
                        id: auth_user_id,
                        name: auth_user_name,
                        email: auth_user_email,
                    },

                    account: {
                        id: 'ACCOUNT-UNIQUE-ID'
                    }
                });
        })('71322162-1bf1-4bcd-72de-1d93c59ab919');
    </script>
    <script src="{{ asset('assets/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/app.clinician.dashboard.js') }}"></script>
@endpush
