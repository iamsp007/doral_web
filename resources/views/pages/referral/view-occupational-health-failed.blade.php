@extends('pages.layouts.app')

@section('title','Welcome to Doral')
@section('pageTitleSection')
    view - Failed Data
@endsection
@section('content')
<div class="app-vbc">
<table id="view-occupational-failed" table class="display responsive nowrap" style="width:100%">
    <thead>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Middle Name</th>
            <th>Date of Birth</th>
            <th>Caregiver Code</th>
            <th>SSN</th>
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
       var table = $('#view-occupational-failed').DataTable( {
        	"dom": '<"top"<"float-left pb-3"f><"float-right"l>>rt<"bottom"<"float-left"i><"float-right pb-3"p>><"clear">',
            "processing": true,
            "language": {
                processing: '<div id="loader-wrapper"><div class="overlay"></div> <div class="pulse"></div></div>'
            },
            "serverSide": true,
            ajax: "{{  route('referral.occupational-health-view-fail-data',$id) }}",

        	columns: [
        		  {data:'first_name',name:'first_name',"bSortable": true},
                  {data:'last_name',name:'last_name',"bSortable": true},
                  {data:'middle_name',name:'middle_name',"bSortable": true},
                  {data:'date_of_birth',name:'date_of_birth',"bSortable": true},
                  {data:'caregiver_code',name:'caregiver_code',"bSortable": true},
                  {data:'ssn',name:'ssn',"bSortable": true},

        	],
        	"order": [],
             "pageLength": 10,
            "lengthMenu": [ [10,25,50,100, -1], [10,25, 50,100, "All"] ],
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


        });

        table.on( 'draw', function () {
            $('.dataTables_wrapper .dataTables_paginate .paginate_button').addClass('custompagination');
        });
      </script>
@endpush