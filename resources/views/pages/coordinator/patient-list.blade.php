@extends('pages.coordinator.layouts.app')

@section('title','Welcome to Doral')
@section('pageTitleSection')
    Patient List
@endsection

@section('content')
    <table class="display responsive nowrap" style="width:100%" id="patient-table">
        <thead>
        <tr>
            <th></th>
            <th>Patient Name</th>
            <th>Phone No</th>
            <th>Due Date</th>
            <th>Services</th>
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
        var table = $('#patient-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{  route('clinician.patientList.ajax') }}",
            columns:[
                {data:'id',name:'id'},
                {
                    data:'first_name',
                    name:'first_name',
                    "bSortable": true,
                    render:function(data, type, row, meta){
                        data = '<a href={{ url('/patient-detail/') }}/' + row.id + '>' + data + ' ' + row.last_name + '</a>';
                        return data;
                    }
                },
                {data:'phone',name:'phone',"bSortable": true},
                {data:'due_date',name:'due_date',"bSortable": true},
                {data:'services',name:'services',"bSortable": true},
                {data:'action',name:'action',"bSortable": false}
            ],
            "order": [[ 0, "desc" ]],
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

