@extends('pages.layouts.app')

@section('title','Cancel Appointment List')
@section('pageTitleSection')
    Cancel Appointment List
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
    <div id="countdown-example"></div>
@endsection

@push('styles')
    <link href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.dataTables.min.css" rel="stylesheet">
    <link type="text/css" href="https://gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/css/dataTables.checkboxes.css" rel="stylesheet" />
@endpush

@push('scripts')
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/3.0.3/socket.io.js"></script>--}}
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>
    <script src="https://gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/js/dataTables.checkboxes.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script>
       var scheduleAppointmentAjax = "{{  route('clinician.cancelAppoimentList.ajax') }}";
       var patient_detail_url = "{{  url('/patient-detail/') }}";
    </script>
<script src="{{ asset('js/clincian/app.clinician.appointment_cancelled.js') }}"></script>
@endpush
