@extends('pages.layouts.app')

@section('title','Patient Detail')
@section('pageTitleSection')
    Patient
@endsection

@section('content')
    <table class="display responsive nowrap" style="width:100%" id="get_patient-table">
        <thead>
        <tr>
            <th></th>
            <!--<th>ID</th>-->
            <th>FirstName</th>
            <th>LastName</th>
            <th>SSN</th>
            <th>Patient Id</th>
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
    <script>
        var table = $('#get_patient-table').DataTable({
            "processing": true,
            "language": {
                processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span> '
            },
            "serverSide": true,
            ajax: "{{  route('clinician.patientDetail.ajax') }}",
            columns:[
//                {data:'id',name:'id'},
                {data:'id',name:'id'},
                {data: 'first_name', name: 'FirstName'},
                {data: 'last_name', name: 'LastName'},
                {data: 'ssn', name: 'SSN'},
                {data: 'patient_id', name: 'PatientID'},            
                {data: 'action', name: 'action'},
            
            ],
            "order": [[ 1, "desc" ]],
            'columnDefs': [
                {
                    'targets': 0,
                    'checkboxes': {
                        'selectRow': true
                    }
                }
            ],
            'select': {
                'style': 'multi'
            },
        });
    </script>
@endpush
