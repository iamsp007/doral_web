@extends('pages.layouts.app')

@section('content')
    <!-- added on import -->

    <div class="app-video">
        <div class="app-video-body">
            <div class="app-video-left">
                <div class="app-video-header">
                    <div class="pt-3 pb-0 pl-3">
                        <div class="row">
                            <div class="col-12 col-sm-3">
                                <div class="d-flex">
                                    <div class="mr-2">
                                        <img src="{{ asset('assets/img/user/avatar.jpg') }}" class="user_photo" alt=""
                                             srcset="{{ asset('assets/img/user/avatar.jpg') }}">
                                    </div>
                                    <div>
                                        <h1 class="title text-info">Alex Doe</h1>
                                        <p class="mt-1">Gender: Male</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-3">
                                <p><span class="font-weight-bold text-info">Cause Of Appointment:</span> MD Order Form</p>
                                <p class="mt-2"><span class="font-weight-bold text-info">Date & Time:</span> 02/22/2020 12:00PM</p>
                            </div>
                            <div class="col-12 col-sm-3">
                                <div class="d-flex align-items-center">
                                    <p><span class="font-weight-bold text-info">Duration:</span></p>
                                    <div class="blink_me ml-1">
                                        <div id='countdown3'></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-3">
                                <p><span class="font-weight-bold text-info">Cause Of Appointment:</span> MD Order Form
                                </p>
                                <p class="mt-2"><span class="font-weight-bold text-info">Date & Time:</span> 02/22/2020
                                    12:00PM</p>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
            </div>
            <div class="app-video-middle" id="pills-tab" role="tablist">
                <ul class="app-video-nav">
                    <li class="active" data-toggle="tooltip" title="View Patient Detial">
                        <a href="javascript:void(0)">
                            <img src="../assets/img/icons/icon_patients_detail.svg" alt="View Patient Detial">
                        </a>
                    </li>
                    <li data-toggle="tooltip" title="View Forms">
                        <a href="javascript:void(0)">
                            <img src="../assets/img/icons/icon_md_form.svg" alt="">
                        </a>
                    </li>
                    <li data-toggle="tooltip" title="Signature">
                        <a href="javascript:void(0)">
                            <img src="../assets/img/icons/icon_signature.svg" alt="">
                        </a>
                    </li>
                    <li data-toggle="tooltip" title="Stamp">
                        <a href="javascript:void(0)">
                            <img src="../assets/img/icons/icon_approve.svg" alt="">
                        </a>
                    </li>
                    <li data-toggle="tooltip" title="Generate PDF">
                        <a href="javascript:void(0)">
                            <img src="../assets/img/icons/icon_pdf.svg" alt="">
                        </a>
                    </li>
                    <li data-toggle="tooltip" title="Send">
                        <a href="javascript:void(0)">
                            <img src="../assets/img/icons/icon_send.svg" alt="">
                        </a>
                    </li>
                    <li data-toggle="tooltip" title="Close" class="closeAppointment">
                        <a href="javascript:void(0)">
                            <i class="las la-times la-4x"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="app-video-right">
                <div id="zmmtg-root"></div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <link href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.dataTables.min.css" rel="stylesheet">
    <link type="text/css" href="https://gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/css/dataTables.checkboxes.css" rel="stylesheet" />
    <link type="text/css" rel="stylesheet" href="https://source.zoom.us/1.8.5/css/bootstrap.css" />
    <link type="text/css" rel="stylesheet" href="https://source.zoom.us/1.8.5/css/react-select.css" />

@endpush

@push('scripts')
    <!-- import ZoomMtg dependencies -->
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>
    <script src="https://gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/js/dataTables.checkboxes.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://source.zoom.us/1.8.3/lib/vendor/react.min.js"></script>
    <script src="https://source.zoom.us/1.8.3/lib/vendor/react-dom.min.js"></script>
    <script src="https://source.zoom.us/1.8.3/lib/vendor/redux.min.js"></script>
    <script src="https://source.zoom.us/1.8.3/lib/vendor/redux-thunk.min.js"></script>
{{--    <script src="https://source.zoom.us/1.8.3/lib/vendor/jquery.min.js"></script>--}}
    <script src="https://source.zoom.us/1.8.3/lib/vendor/lodash.min.js"></script>

    <script src="https://source.zoom.us/zoom-meeting-1.8.3.min.js"></script>
    <!-- import local .js file -->
    <script src="{{ asset('js/Zoom/tool.js') }}"></script>
{{--    <script src="{{ asset('js/Zoom/vconsole.min.js') }}"></script>--}}
    <script src="{{ asset('js/Zoom/index.js') }}"></script>
    <script src="{{ asset('js/clincian/app.clinician.appointment.scheduled.js') }}"></script>
    <script>
        startMeeting('9601725156}');
    </script>
    <script>

    </script>
@endpush
