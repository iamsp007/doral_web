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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
@endpush

@push('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $('#patient-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{  route('clinician.patientList.ajax') }}",
            columns:[
                {data:'id',name:'id',"bSortable": true},
                {data:'first_name',name:'first_name',"bSortable": true},
                {data:'last_name',name:'last_name',"bSortable": true},
                {data:'email',name:'email',"bSortable": true},
                {data:'phone',name:'phone',"bSortable": true},
                {data:'gender',name:'gender',"bSortable": true},
                {data:'dob',name:'dob',"bSortable": true},
                {data:'status',name:'status',"bSortable": true},
                {data:'created_at',name:'created_at',"bSortable": true},
                {data:'action',name:'action'},
            ],
            "order": [[ 0, "desc" ]]
        });
    </script>
@endpush
