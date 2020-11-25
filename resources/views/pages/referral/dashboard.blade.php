@extends('layouts.referral.default')
@section('content')
<div class="app-referral-dashboard">
    <!-- Total No Of Uploaded Files Start -->
    <div class="card">
        <div class="card-header card-header-1">
            <div>
                Services Base Request
            </div>
            <div>
                <a href="javascript:void(0)"><img src="../assets/img/icons/fullscreen_1.svg" alt=""
                        class="fullscreen" srcset="../assets/img/icons/fullscreen_1.svg"></a>
            </div>
        </div>
        <div class="card-body">
            <div class="card_head">
                <div>
                    Total 71,52,225
                </div>
                <div>
                    <div id="reportrange" data-bind="daterangepicker: dateRange"
                        class="form-control rangepicker">
                        <span></span>
                        <i class="las la-calendar cal la-2x p-0 pl-2 m-0"></i>
                    </div>
                </div>
            </div>
            <canvas class="myChart" height="25vh" width="80vw"></canvas>
        </div>
    </div>
    <!-- Total No Of Uploaded Files End -->
    <div class="row mt-4">
        <div class="col-12 col-sm-6">
            <!-- Total No Of Accepted Patients Files Start -->
            <div class="card">
                <div class="card-header card-header-1">
                    <div>
                        Total No Of Accepted Patients Files
                    </div>
                    <div>
                        <a href="javascript:void(0)"><img src="../assets/img/icons/fullscreen_1.svg"
                                alt="" class="fullscreen"
                                srcset="../assets/img/icons/fullscreen_1.svg"></a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="card_head">
                        <div>
                            Total 71,52,225
                        </div>
                        <div>
                            <div id="reportrange" data-bind="daterangepicker: dateRange"
                                class="form-control rangepicker">
                                <span></span>
                                <i class="las la-calendar cal la-2x p-0 pl-2 m-0"></i>
                            </div>
                        </div>
                    </div>
                    <canvas class="accepted" height="40vh" width="80vw"></canvas>
                </div>
            </div>
            <!-- Total No Of Accepted Patients Files End -->
        </div>
        <div class="col-12 col-sm-6">
            <!-- Total No Of Pending Patients Files Start -->
            <div class="card">
                <div class="card-header card-header-1">
                    <div>
                        Total No Of Pending Patients Files
                    </div>
                    <div>
                        <a href="javascript:void(0)"><img src="../assets/img/icons/fullscreen_1.svg"
                                alt="" class="fullscreen"
                                srcset="../assets/img/icons/fullscreen_1.svg"></a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="card_head">
                        <div>
                            Total 71,52,225
                        </div>
                        <div>
                            <div id="reportrange" data-bind="daterangepicker: dateRange"
                                class="form-control rangepicker">
                                <span></span>
                                <i class="las la-calendar cal la-2x p-0 pl-2 m-0"></i>
                            </div>
                        </div>
                    </div>
                    <canvas class="pending" height="40vh" width="80vw"></canvas>
                </div>
            </div>
            <!-- Total No Of Pending Patients Files End -->
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-12 col-sm-6">
            <!-- Total No Of Accepted Patients Files Start -->
            <div class="card">
                <div class="card-header card-header-1">
                    <div>
                        Total No Of Cancel Patients Files
                    </div>
                    <div>
                        <a href="javascript:void(0)"><img src="../assets/img/icons/fullscreen_1.svg"
                                alt="" class="fullscreen"
                                srcset="../assets/img/icons/fullscreen_1.svg"></a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="card_head">
                        <div>
                            Total 71,52,225
                        </div>
                        <div>
                            <div id="reportrange" data-bind="daterangepicker: dateRange"
                                class="form-control rangepicker">
                                <span></span>
                                <i class="las la-calendar cal la-2x p-0 pl-2 m-0"></i>
                            </div>
                        </div>
                    </div>
                    <canvas class="cancel" height="40vh" width="80vw"></canvas>
                </div>
            </div>
            <!-- Total No Of Accepted Patients Files End -->
        </div>
        <div class="col-12 col-sm-6">
            <!-- Total No Of Scheduled Patients Files Start -->
            <div class="card">
                <div class="card-header card-header-1">
                    <div>
                        Total No Of Scheduled Patients Files
                    </div>
                    <div>
                        <a href="javascript:void(0)"><img src="../assets/img/icons/fullscreen_1.svg"
                                alt="" class="fullscreen"
                                srcset="../assets/img/icons/fullscreen_1.svg"></a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="card_head">
                        <div>
                            Total 71,52,225
                        </div>
                        <div>
                            <div id="reportrange" data-bind="daterangepicker: dateRange"
                                class="form-control rangepicker">
                                <span></span>
                                <i class="las la-calendar cal la-2x p-0 pl-2 m-0"></i>
                            </div>
                        </div>
                    </div>
                    <canvas class="scheduled" height="40vh" width="80vw"></canvas>
                </div>
            </div>
            <!-- Total No Of Scheduled Patients Files End -->
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-12">
            <!-- Total No Of On Call Patients Files Start -->
            <div class="card">
                <div class="card-header card-header-1">
                    <div>
                        Total No Of On Call Patients Files
                    </div>
                    <div>
                        <a href="javascript:void(0)"><img src="../assets/img/icons/fullscreen_1.svg"
                                alt="" class="fullscreen"
                                srcset="../assets/img/icons/fullscreen_1.svg"></a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="card_head">
                        <div>
                            Total 71,52,225
                        </div>
                        <div>
                            <div id="reportrange" data-bind="daterangepicker: dateRange"
                                class="form-control rangepicker">
                                <span></span>
                                <i class="las la-calendar cal la-2x p-0 pl-2 m-0"></i>
                            </div>
                        </div>
                    </div>
                    <canvas class="oncall" height="25vh" width="80vw"></canvas>
                </div>
            </div>
            <!-- Total No Of Accepted Patients Files End -->
        </div>
    </div>
</div>
@stop