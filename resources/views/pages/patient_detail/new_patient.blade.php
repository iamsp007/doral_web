@extends('pages.layouts.app')

@section('title','Patient Detail')
@section('pageTitleSection')
    Patient
@endsection

@section('content')
    <table class="display responsive nowrap" style="width:100%" id="get_patient-table">
        <thead>
        <tr>
            <th><label><input type="checkbox" /><span></span></label></th>
            <!-- <th>#</th> -->
            <th>Patient Name</th>
            <th>Gender</th>
            <th>SSN</th>
            <th>Home Phone</th>
            <th>Patient Type</th>
            <th>Patient Id</th>
            <th>City - State</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
@endsection

@push('styles')
    <link href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.dataTables.min.css" rel="stylesheet">
    <link type="text/css" href="https://gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/css/dataTables.checkboxes.css" rel="stylesheet" />
@endpush

@push('scripts')
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>
    <script src="https://gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/js/dataTables.checkboxes.min.js"></script>
    <script src="https://unpkg.com/@google/markerclustererplus@4.0.1/dist/markerclustererplus.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $('#get_patient-table').DataTable({
            "processing": true,
            "language": {
                processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>'
            },
            "serverSide": true,
            ajax: "{{ route('clinician.caregiver.ajax') }}",
            columns:[
                {data:'id',name:'id'},
                {data: 'full_name', name: 'full_name'},
                {data: 'gender', name: 'gender'},
                {data: 'ssn', name: 'SSN'},
                {data: 'home_phone', name: 'home_phone'},
                {data: 'patient_type', name: 'patient_type'},      
                {data: 'patient_id', name: 'PatientID'},        
                {data: 'city_state', name: 'city_state'},            
                {data: 'action', name: 'action'},
            
            ],
            "order": [[ 1, "desc" ]],
        });

        $('body').on('click', '.update-status', function () {
            var t = $(this);
            var id = t.attr("data-id");
            var status = t.attr("data-status");
            var patientName = t.attr("patient-name");
            
            swal({
                title: "Are you sure?",
                text: "Are you sure want to reject this " + patientName + "?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    // $("#loader-wrapper").show();
                    $.ajax({
                    'type': 'POST',
                    'url': "{{ route('caregiver.changePatientStatus') }}",
                    'headers': {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    data: {
                        "id": id,
                        "status" : status
                    },
                    'success': function (data) {
                        console(data);
                        if(data.status == 400) {
                            swal(
                                'Error!',
                                data.message,
                                'error'
                            );
                        } else {
                            swal(
                                'Success!',
                                data.message,
                                'success'
                            );
                            $("#get_patient-table").DataTable().ajax.reload(null, false);
                        }
                        // $("#loader-wrapper").hide();
                    },
                    "error":function () {
                        swal("Server Timeout!", "Please try again", "warning");
                        // $("#loader-wrapper").hide();
                    }
                    });
                } else {
                    swal('Cancelled', 'Your record is safe :)','error');
                }
            });
        });

    </script>
@endpush
