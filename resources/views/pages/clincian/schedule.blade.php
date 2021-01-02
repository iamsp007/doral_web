@extends('pages.layouts.app')

@section('title','Schedule Appointment List')
@section('pageTitleSection')
    Schedule Appointment List
@endsection

@section('content')
    <table class="display responsive nowrap" style="width:100%" id="appointment-table" >
        <thead>
        <tr>
            <th></th>
            <th>Patient Name</th>
            <th>Gender</th>
            <th>Cause Of Appointment</th>
            <th>Date Of Birth</th>
            <th>Remaining Time</th>
            <th>Appointment Date</th>
            <th width="280px">Action</th>
        </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
@endsection
@section('app-video')
    <div class="app-video">
        <div class="app-video-body">
            <div class="app-video-left">
                <div class="app-video-header">
                    <div class="pt-3 pb-0 pl-3" id="patient-information">

                    </div>
                </div>
                <hr>
            </div>
            <div class="app-video-middle" id="pills-tab" role="tablist">
                <ul class="app-video-nav">
                    <li class="active" data-toggle="tooltip" title="View Patient Detial">
                        <a href="javascript:void(0)" id="patient_detail_url">
                            <img src="{{ asset('assets/img/icons/icon_patients_detail.svg') }}" alt="View Patient Detial">
                        </a>
                    </li>
                    <li data-toggle="tooltip" title="View Forms">
                        <a href="javascript:void(0)">
                            <img src="{{ asset('assets/img/icons/icon_md_form.svg') }}" alt="">
                        </a>
                    </li>
                    <li data-toggle="tooltip" title="Signature">
                        <a href="javascript:void(0)">
                            <img src="{{ asset('assets/img/icons/icon_signature.svg') }}" alt="">
                        </a>
                    </li>
                    <li data-toggle="tooltip" title="Stamp">
                        <a href="javascript:void(0)">
                            <img src="{{ asset('assets/img/icons/icon_approve.svg') }}" alt="">
                        </a>
                    </li>
                    <li data-toggle="tooltip" title="Generate PDF">
                        <a href="javascript:void(0)">
                            <img src="{{ asset('assets/img/icons/icon_pdf.svg') }}" alt="">
                        </a>
                    </li>
                    <li data-toggle="tooltip" title="Send">
                        <a href="javascript:void(0)">
                            <img src="{{ asset('assets/img/icons/icon_send.svg') }}" alt="">
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
                <div id="aria-notify-area"></div>

                <!-- added on meeting init -->
                <div class="ReactModalPortal"></div>
                <div class="ReactModalPortal"></div>
                <div class="ReactModalPortal"></div>
                <div class="ReactModalPortal"></div>
                <div class="global-pop-up-box"></div>
                <div class="sharer-controlbar-container sharer-controlbar-container--hidden"></div>
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
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/3.0.3/socket.io.js"></script>--}}
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>
{{--    <script src="https://gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/js/dataTables.checkboxes.min.js"></script>--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<!-- import ZoomMtg dependencies -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-zoom/1.7.21/jquery.zoom.min.js"></script>
<script src="https://source.zoom.us/1.8.5/lib/vendor/react.min.js"></script>
<script src="https://source.zoom.us/1.8.5/lib/vendor/react-dom.min.js"></script>
<script src="https://source.zoom.us/1.8.5/lib/vendor/redux.min.js"></script>
<script src="https://source.zoom.us/1.8.5/lib/vendor/redux-thunk.min.js"></script>
<script src="https://source.zoom.us/1.8.5/lib/vendor/lodash.min.js"></script>

<!-- import ZoomMtg -->
<script src="https://source.zoom.us/zoom-meeting-1.8.5.min.js"></script>

<!-- import local .js file -->
<script src="{{ asset('js/Zoom/tool.js') }}"></script>
    <script src="{{ asset('js/Zoom/vconsole.min.js') }}"></script>
<script src="{{ asset('js/Zoom/index.js') }}"></script>
    <script>
       var scheduleAppointmentAjax = "{{  route('clinician.scheduleAppoimentList.ajax') }}";
       var patient_detail_url = "{{  url('/patient-detail/') }}";
    </script>
<script src="{{ asset('js/clincian/app.clinician.appointment.scheduled.js') }}"></script>
@endpush
