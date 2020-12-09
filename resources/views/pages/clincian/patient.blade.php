@extends('pages.clincian.layouts.app')

@section('title','Clinician Patient List')
@section('pageTitleSection')
    Patient
@endsection

@section('content')
    <table class="table table-bordered data-table" id="patient-table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Patient ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Mobile</th>
            <th>Gender</th>
            <th>Date Of Birth</th>
            <th>Status</th>
            <th>Created At</th>
            <th width="280px">Action</th>
        </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
@endsection

@push('styles')
{{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />--}}
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
{{--    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">--}}
@endpush

@push('scripts')
{{--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/3.0.3/socket.io.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script>
        var table = $('#patient-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{  route('clinician.patientList.ajax') }}",
            columns:[
                {data:'id',name:'id',"bSortable": true},
                {data:'patient_id',name:'patient_id',"bSortable": true},
                {data:'first_name',name:'first_name',"bSortable": true},
                {data:'last_name',name:'last_name',"bSortable": true},
                {data:'detail.email',name:'detail.email',"bSortable": true},
                {data:'detail.phone',name:'detail.phone',"bSortable": true},
                {data:'detail.gender',name:'detail.gender',"bSortable": true},
                {data:'detail.dob',name:'detail.dob',"bSortable": true},
                {data:'detail.status',name:'detail.status',"bSortable": true},
                {data:'detail.created_at',name:'detail.created_at',"bSortable": true}
            ],
            "order": [[ 0, "desc" ]]
        });
        $('#patient-table tbody').on('click', 'tr', function () {
            var rowData = table.row(this).data();
            window.location.href='{{ url('/clinician/patient-detail/') }}/'+rowData.id;
            console.log(rowData.id);
        });
    </script>
@endpush
