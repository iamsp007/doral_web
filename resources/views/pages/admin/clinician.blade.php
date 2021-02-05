@extends('pages.layouts.app')
@section('title','Clinician Lists')
@section('pageTitleSection')
    Clinician Lists
@endsection

@section('content')
    <table class="display responsive nowrap" style="width:100%" id="clinician-table">
        <thead>
        <tr>
            <th></th>
            <th>Applicant Name</th>
            <th>Gender</th>
            <th>DOB</th>
            <th>Phone</th>
            <th>status</th>
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
        var table = $('#clinician-table').DataTable({
            processing: true,
            serverSide: false,
            ajax: "{{  route('admin.clinician-list') }}",
            columns:[
                {
                    data:'id',
                    name:'id'
                },
                {
                    data:'first_name',
                    name:'first_name',
                    "bSortable": true,
                    render:function(data, type, row, meta){
                        data = "<a href={{ url('admin/clinician-detail/') }}/" + row.id + ">" + row.first_name+' '+row.last_name + "</a>";
                        return data;
                    }
                },
                {
                    data:'gender',
                    name:'gender',
                    "bSortable": true,
                    render:function(data, type, row, meta){
                        if (data == 1) {
                            return 'Male';
                        } else if (data == 2) {
                            return 'Female';
                        } else if (data == 3) {
                            return 'Other';
                        }
                    }
                },
                {
                    data:'dob',
                    name:'dob',
                    "bSortable": true
                },
                {
                    data:'phone',
                    name:'phone',
                    "bSortable": true
                },
                {
                    data:'status',
                    name:'status',
                    "bSortable": true,
                    render:function(data, type, row, meta){
                        if (data == 0) {
                            return 'Pending';
                        } else if (data == 1) {
                            return 'Active';
                        } else if (data == 2) {
                            return 'Inactive';
                        } else if (data == 3) {
                            return 'Reject';
                        }
                    }
                }
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
