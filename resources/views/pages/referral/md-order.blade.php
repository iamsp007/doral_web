@extends('pages.layouts.app')

@section('title','Welcome to Doral')
@section('pageTitleSection')
    Md order - Total Patient Data
@endsection

@section('upload-btn')
    <div class="d-flex">
{{--        <a href="javascript:void(0)" class="single-upload-btn mr-2">--}}
{{--            <img src="../assets/img/icons/single-upload-icon.svg" class="icon mr-2" />--}}
{{--            New Patient</a>--}}
        <a href="{{ route('referral.md-order-upload-bulk-data') }}" class="bulk-upload-btn">
            <img src="{{ asset('assets/img/icons/bulk-upload-icon.svg') }}" class="icon mr-2" />
            Import Patients</a>
    </div>
@endsection

@section('content')
<div class="app-vbc">

    <table id="md" table class="display responsive nowrap" style="width:100%">
        <thead>
            <tr>
                <th></th>
                <th>Patient Name</th>
                <th>Form</th>
                <th>SSN</th>
                <th>Gender</th>
                <th>City</th>
                <th>DOB</th>
                <th>Due Date</th>
                <th>Created Date</th>
                <th>Status</th>
            </tr>
        </thead>
    </table>
</div>
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
        $('#md').DataTable( {
            "dom": '<"top"<"float-left pb-3"f><"float-right"l>>rt<"bottom"<"float-left"i><"float-right pb-3"p>><"clear">',
            processing: true,
            "language": {
                processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span>'
            },
            serverSide: true,
            ajax: "{{  route('referral.md-order-get-data') }}",
            columns: [
                {data:'id',name:'id'},
                {
                    data:'first_name',
                    name:'first_name',
                    "bSortable": true,
                    render:function(data, type, row, meta){
                        data = '<a href={{ url('/referral/patient-detail/') }}/' + row.user_id + '>' + data + '</a>';
                        return data;
                    }
                },
                {data:'mdforms.name',name:'mdforms.name',"bSortable": true},
                {data:'ssn',name:'ssn',"bSortable": true},
                {data:'gender',name:'gender',"bSortable": true},
                {
                    data:'city',
                    name:'city',
                    "bSortable": true,
                    render:function (data, type, row, meta) {

                        return row.city+ ' - '+row.state;
                    }
                },
                {data:'dob',name:'dob',"bSortable": true},
                {
                    data:'cert_next_date',
                    name:'cert_next_date',
                    "bSortable": true
                },
                {
                    data:'created_at',
                    name:'created_at',
                    "bSortable": true
                },
                {
                    data:'status',
                    name:'status',
                    "bSortable": true,
                    render:function (data, type, row, meta) {
                        if (row.status==="pending"){

                            return '<span class="status-pending">'+row.status+'</span>';
                        }else if (row.status==="accept"){

                            return '<span class="status-accepted">'+row.status+'</span>'
                        }else if (row.status==="rescheduled"){

                            return '<span class="status-rescheduled">'+row.status+'</span>';
                        }
                        return row.status;
                    }
                }
            ],
            "order": [],
            'columnDefs': [
                {
                    'targets': [0],
                    "orderable": false,
                    /*'checkboxes': {
                        'selectRow': true
                    }*/
                }
            ],
            'select': {
                'style': 'multi'
            },
        } );
    </script>
@endpush
