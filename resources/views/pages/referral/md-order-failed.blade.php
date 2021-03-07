@extends('pages.layouts.app')

@section('title','MD Order - Failed Data')
@section('pageTitleSection')
    MD Order - Failed Data
@endsection
@section('content')
<div class="app-vbc">
<table id="occupational-failed" table class="display responsive nowrap" style="width:100%">
    <thead>
        <tr>
            <th>File Name</th>
            <th>Attribute</th>
            <th>Error</th>
            <th>Row</th>
            <th>View Value</th>
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
       var table =  $('#occupational-failed').DataTable( {
        	"dom": '<"top"<"float-left pb-3"f><"float-right"l>>rt<"bottom"<"float-left"i><"float-right pb-3"p>><"clear">',
            "processing": true,
            "language": {
                processing: '<div id="loader-wrapper">  <div class="overlay"></div> <div class="pulse"></div></div>'
            },
            "serverSide": true,
            ajax: "{{  route('referral.md-order-get-fail-data') }}",
        	columns: [
        		  {data:'file_name',name:'file_name',"bSortable": true,},
        		  {data:'attribute',name:'attribute',"bSortable": true,},
        		  {data:'errors',name:'errors',"bSortable": true,},
        		  {data:'row',name:'row',"bSortable": true,},
        		  {data: 'action',name: 'action',"bSortable": false}
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


        });

         table.on( 'draw', function () {
            $('.dataTables_wrapper .dataTables_paginate .paginate_button').addClass('custompagination');
        });
      </script>
@endpush


