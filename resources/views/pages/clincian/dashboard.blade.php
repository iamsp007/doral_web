@extends('pages.clincian.layouts.app')

@section('title','Welcome to Doral')
@section('pageTitleSection')
    Dashboard
@endsection

@section('content')
    <div class="row">
        <div class="col col-sm-4">
            <!-- Home Care -->
            <a href="new_request_details.html" class="app-card">
                <div class="app-card-body">
                    <div class="app-left-side">
                        <div class="_t1">Home Care</div>
                        <h1 class="_t2">1000</h1>
                        <button type="submit" class="btn btn-primary btn-pink btn--sm mt-5"
                                name="signup">View More</button>
                    </div>
                    <div class="app-right-side">
                        <img src="../assets/img/icons/stay-home.svg" alt=""
                             srcset="../assets/img/icons/stay-home.svg">
                    </div>
                </div>
            </a>
        </div>
        <div class="col col-sm-4">
            <!-- Insurance -->
            <a href="javsacript:void(0)" class="app-card">
                <div class="app-card-body">
                    <div class="app-left-side">
                        <div class="_t1">Insurance</div>
                        <h1 class="_t2 insurance">500</h1>
                        <button type="submit" class="btn btn-primary btn-pink btn--sm mt-5"
                                name="signup">View More</button>
                    </div>
                    <div class="app-right-side">
                        <img src="../assets/img/icons/health-insurance.svg" alt=""
                             srcset="../assets/img/icons/health-insurance.svg">
                    </div>
                </div>
            </a>
        </div>
        <div class="col col-sm-4">
            <!-- Others -->
            <a href="javsacript:void(0)" class="app-card">
                <div class="app-card-body">
                    <div class="app-left-side">
                        <div class="_t1">Others</div>
                        <h1 class="_t2 others">50</h1>
                        <button type="submit" class="btn btn-primary btn-pink btn--sm mt-5"
                                name="signup">View More</button>
                    </div>
                    <div class="app-right-side">
                        <img src="../assets/img/icons/insurance.svg" alt=""
                             srcset="../assets/img/icons/insurance.svg">
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="card mt-4">
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
            <canvas id="myChart"></canvas>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col col-sm-4">
            <!-- Home Care -->
            <a href="javsacript:void(0)" class="app-card">
                <div class="app-card-body">
                    <div class="app-left-side">
                        <div class="_t1">Home Care (Accepted)</div>
                        <h1 class="_t2">10</h1>
                        <button type="submit" class="btn btn-primary btn-pink btn--sm mt-5"
                                name="signup">View More</button>
                    </div>
                    <div class="app-right-side">
                        <img src="../assets/img/icons/accepted.svg" alt=""
                             srcset="../assets/img/icons/accepted.svg">
                    </div>
                </div>
            </a>
        </div>
        <div class="col col-sm-4">
            <!-- Insurance -->
            <a href="javsacript:void(0)" class="app-card">
                <div class="app-card-body">
                    <div class="app-left-side">
                        <div class="_t1">Home Care (Rejected)</div>
                        <h1 class="_t2 insurance">2</h1>
                        <button type="submit" class="btn btn-primary btn-pink btn--sm mt-5"
                                name="signup">View More</button>
                    </div>
                    <div class="app-right-side">
                        <img src="../assets/img/icons/rejected.svg" alt=""
                             srcset="../assets/img/icons/rejected.svg">
                    </div>
                </div>
            </a>
        </div>
        <div class="col col-sm-4">
            <!-- Others -->
            <a href="javsacript:void(0)" class="app-card">
                <div class="app-card-body">
                    <div class="app-left-side">
                        <div class="_t1">Home Care (Pending)</div>
                        <h1 class="_t2 others">5</h1>
                        <button type="submit" class="btn btn-primary btn-pink btn--sm mt-5"
                                name="signup">View More</button>
                    </div>
                    <div class="app-right-side">
                        <img src="../assets/img/icons/call-pending.svg" alt=""
                             srcset="../assets/img/icons/call-pending.svg">
                    </div>
                </div>
            </a>
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/clincian/daterangepicker.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('js/clincian/Chart.min.js') }}"></script>
    <script src="{{ asset('js/clincian/moment.min.js') }}"></script>
    <script src="{{ asset('js/clincian/datderangepicker.js') }}"></script>
    <script src="{{ asset('js/clincian/app.clinician.new.request.js') }}"></script>
@endpush
