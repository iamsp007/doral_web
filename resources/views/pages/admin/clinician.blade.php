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
            <th>SSN</th>
            <th>Phone</th>
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
            serverSide: true,
            ajax: "{{  route('admin.clinician-list') }}",
            columns:[
                {
                    data:'id',
                    name:'id'
                },
                {
                    data:'applicant_name',
                    name:'applicant_name',
                    "bSortable": true,
                    render:function(data, type, row, meta){
                        data = "<a href={{ url('admin/clinician-detail/') }}/" + row.user_id + ">" + data + "</a>";
                        return data;
                    }
                },
                {
                    data:'ssn',
                    name:'ssn',
                    "bSortable": true
                },
                {
                    data:'phone',
                    name:'phone',
                    "bSortable": true
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
