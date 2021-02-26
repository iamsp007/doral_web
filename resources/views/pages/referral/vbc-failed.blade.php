@extends('pages.layouts.app')

@section('title','Welcome to Doral')
@section('pageTitleSection')
    vbc - Failed Data
@endsection
@section('content')
<div class="app-vbc">
<table id="occupational-failed" table class="display responsive nowrap" style="width:100%">
    <thead>
        <tr>
            <th><select class="file_name form-control" id="file_name" name="" data-id='0'>
        </select></th>
          <th></th>
          <th></th>
          <th></th>
          <th></th>
        </tr>
        <tr>
            <th>File Name</th>
            <th>Attribut</th>
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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
@endpush

@push('scripts')
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>
    <script src="https://gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/js/dataTables.checkboxes.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
     <script>
        $(document).ready(function () {
             $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $("#file_name").select2({

                ajax: { 
                    url: '{{ route('get-fail-data-filename-search') }}',
                    type: "POST",
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                          searchTerm : params.term,
                          id:1
                        };
                    },
                    processResults: function (data) {
                        var data_array = [];
                        data.forEach(function(value,key){
                            data_array.push({id:value.file_name,text:value.file_name})
                        });
                        return {
                            results: data_array
                        };
                    },
                },
                placeholder: "Search File name",
                allowClear: true,
                width : '15rem'
            });
             $('.file_name').on('change', function () {
                table
                    .columns( $(this).attr('data-id'))
                    .search( this.value )
                    .draw();
            });
         });
       var table =  $('#occupational-failed').DataTable( {
        	"dom": '<"top"<"float-left pb-3"f><"float-right"l>>rt<"bottom"<"float-left"i><"float-right pb-3"p>><"clear">',
            "processing": true,
            "language": {
                processing: '<div id="loader-wrapper">  <div class="overlay"></div> <div class="pulse"></div></div>'
            },
            "serverSide": true,
            ajax: "{{  route('referral.vbc-get-fail-data') }}",
        	columns: [
        		  {data:'file_name',name:'file_name',"bSortable": true,},
        		  {data:'attribute',name:'attribute',"bSortable": true,},
        		  {data:'errors',name:'errors',"bSortable": true,},
        		  {data:'row',name:'row',"bSortable": true,},
        		  {data: 'action',name: 'action',"bSortable": false}
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


