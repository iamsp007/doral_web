@extends('pages.layouts.app')

@section('title','Clinician Patient List')
@section('pageTitleSection')
    Patient
@endsection

@section('content')
    <table class="display responsive nowrap" style="width:100%" id="patient-table">
        <thead>
        <tr>
            <th></th>
            <th>ID</th>
            <th>Patient Name</th>
            <th>Service</th>
            <th>File Type</th>
            <th>Gender</th>
            <th>Date Of Birth</th>
            <th>Zip Code</th>
            <th>City - State</th>
            <th>Status</th>
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
            "processing": true,
            "language": {
                processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span> '
            },
            "serverSide": true,
            ajax: "{{  route('clinician.patientList.ajax') }}",
            columns:[
                {data:'id',name:'id'},
                {data:'id',name:'id'},
                {
                    data:'first_name',
                    name:'first_name',
                    "bSortable": true,
                    render:function(data, type, row, meta){
                        data = '<a href={{ url('/patient-detail/') }}/' + row.id + '>' + row.first_name +' '+ row.last_name + '</a>';
                        return data;
                    }
                },
//                {data:'last_name',name:'last_name',"bSortable": true},
                {
                    data:'patient_detail.service.name',
                    name:'patient_detail.service.name',
                    "bSortable": true,
                    render:function(data, type, row, meta){
                        if (data){
                            return data;
                        }
                        return '--';
                    }
                },
                {
                    data:'patient_detail.filetype.name',
                    name:'patient_detail.filetype.name',
                    "bSortable": true,
                    render:function(data, type, row, meta){
                        if (data){
                            return data;
                        }
                        return '--';
                    }
                },
                {
                    data:'patient_detail.gender',
                    name:'patient_detail.gender',
                    "bSortable": true,
                    render:function(data, type, row, meta){
                        if (data){
                            return data;
                        }
                        return '--';
                    }
                },
                {
                    data:'dob',
                    name:'dob',
                    "bSortable": true
                },
                {
                    data:'patient_detail.Zip',
                    name:'patient_detail.Zip',
                    "bSortable": true,
                    render:function(data, type, row, meta){
                        if (data){
                            return data;
                        }
                        return '--';
                    }
                },
                {
                    data:'patient_detail.city',
                    name:'patient_detail.city',
                    "bSortable": true,
                    render:function (data, type, row, meta) {
                        if (row.patient_detail){
                            return row.patient_detail.city+ ' - '+row.patient_detail.state;
                        }
                        return '-';
                    }
                },
                {
                    data:'patient_detail.status',
                    name:'patient_detail.status',
                    "bSortable": true,
                    render:function (data, type, row, meta) {
                        if (row.patient_detail){
                            if (row.patient_detail.status==="pending"){

                                return '<span class="status-pending">'+row.patient_detail.status+'</span>';
                            }else if (row.patient_detail.status==="accept"){

                                return '<span class="status-accepted">'+row.patient_detail.status+'</span>'
                            }else if (row.patient_detail.status==="rescheduled"){

                                return '<span class="status-rescheduled">'+row.patient_detail.status+'</span>';
                            }
                            return row.patient_detail.status;
                        }
                        return '-';
                    }
                }
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
