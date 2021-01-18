@extends('pages.layouts.app')

@section('title','Schedule Appointment List')
@section('pageTitleSection')
    Cancel Appointment List
@endsection

@section('content')
    <div class="app-roles">
        <!-- View Employee List HTML -->
        <div class="pt-2">

            <table id="appointmentScheduled" class="table">
                <thead>
                <tr>
                    <th><input type="checkbox" class="selectall"></th>
                    <th>Patient Name</th>
                    <th>Gender</th>
                    <th>Cause Of Appointment</th>
                    <th>Cancel By</th>
                    <th>Reason</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('styles')
    <link href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.dataTables.min.css" rel="stylesheet">
    <link type="text/css" href="https://gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/css/dataTables.checkboxes.css" rel="stylesheet" />
    {{--    <link type="text/css" rel="stylesheet" href="https://source.zoom.us/1.8.5/css/bootstrap.css" />--}}
    {{--    <link type="text/css" rel="stylesheet" href="https://source.zoom.us/1.8.5/css/react-select.css" />--}}
@endpush

@push('scripts')
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="{{ asset('assets/js/tail.select-full.min.js') }}"></script>

    <script>
        var scheduleAppointmentAjax = "{{  route('clinician.cancelAppoimentList.ajax') }}";
        var patient_detail_url = "{{  url('/patient-detail/') }}";
    </script>
    <script src="{{ asset('js/clincian/app.clinician.appointment_cancelled.js') }}"></script>
@endpush
