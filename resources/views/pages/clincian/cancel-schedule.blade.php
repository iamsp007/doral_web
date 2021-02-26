@extends('pages.layouts.app')

@section('title','Cancelled Appointments')
@section('pageTitleSection')
    Cancelled Appointments
@endsection

@section('content')
    <div class="app-roles">
        <!-- View Employee List HTML -->
        <div class="pt-2">

            <table id="appointmentScheduled" class="table">
                <thead>
                     <tr>
                        <th></th>
                        <th><select class="patient_name form-control" id="patient_name" name="" data-id='1'>
            </select></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
    <script>
        $(document).ready(function () {
             $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $("#patient_name").select2({

                ajax: { 
                    url: '{{ route('clinician.cancelAppoimentList.ajax-data') }}',
                    type: "POST",
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                          searchTerm : params.term
                        };
                    },
                    processResults: function (data) {
                        var data_array = [];
                        data.data.forEach(function(value,key){
                           if(value.patients) {
                            data_array.push({id:value.patients.first_name,text:value.patients.first_name+ ' '+ value.patients.last_name})
                           }
                        });
                        return {
                            results: data_array
                        };
                    },
                },
                placeholder: "Search name",
                allowClear: true,
                width : '15rem'
            });

        $('.patient_name').on('change', function () {
                table
                    .columns( $(this).attr('data-id'))
                    .search( this.value )
                    .draw();
            });
     });
    </script>
@endpush
