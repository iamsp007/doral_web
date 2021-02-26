@extends('pages.layouts.app')

@section('title','Welcome to Doral')
@section('pageTitleSection')
    VBC - Patient Data
@endsection

@section('upload-btn')
    <div class="d-flex">
        {{--        <a href="javascript:void(0)" class="single-upload-btn mr-2">--}}
        {{--            <img src="../assets/img/icons/single-upload-icon.svg" class="icon mr-2" />--}}
        {{--            New Patient</a>--}}
         <a href="{{ route('referral.vbc-failed-data') }}" class="bulk-upload-btn">
            <img src="{{ asset('assets/img/icons/bulk-upload-icon.svg') }}" class="icon mr-2" />
            Pending Recode</a>
        <a href="{{ route('referral.vbc-upload-bulk-data') }}" class="bulk-upload-btn" style="margin-left: 10px;">
            <img src="{{ asset('assets/img/icons/bulk-upload-icon.svg') }}" class="icon mr-2" />
            Import Patients</a>
    </div>
@endsection
@section('content')
<div class="app-vbc">
<table id="vbc" table class="display responsive nowrap" style="width:100%">
    <thead>
        <tr>
          <th></th>
          <th><select class="patient_name form-control" id="patient_name" name="" data-id='1'>
            </select></th>
          <th><select class="item2 form-control" name="item2" data-id='8'>
                    <option value="">select status</option>
                    <option value="pending">pending</option>
                    <option value="accept">accept</option>
                    <option value="running">running</option>
                    <option value="completed">completed</option>
                    <option value="reject">reject</option>
                    <option value="finish">finish</option>
            </select></th>
          <th></th>
          <th></th>
          <th></th>
          <th></th>
          <th></th>
          <th></th>
        </tr>
        <tr>
            <th></th>
            <th>Patient Name</th>
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
              $("#patient_name").select2({

                ajax: { 
                    url: '{{ route('occupational-health-get-data-search') }}',
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
                            data_array.push({id:value.first_name,text:value.first_name+ ' '+ value.last_name})
                        });
                        return {
                            results: data_array
                        };
                    },
                },
                placeholder: "Search name",
                allowClear: true,
                width : '15rem'
            });
              $('.item2').select2({
                placeholder: "Select Status",
                allowClear: true,
                width : '15rem'
            });
            $('.item2').on('change', function () {
                table
                    .columns( $(this).attr('data-id'))
                    .search( this.value )
                    .draw();
            }); 

             $('.patient_name').on('change', function () {
                table
                    .columns( $(this).attr('data-id'))
                    .search( this.value )
                    .draw();
            });
             
          });
        var table = $('#vbc').DataTable( {
            "dom": '<"top"<"float-left pb-3"f><"float-right"l>>rt<"bottom"<"float-left"i><"float-right pb-3"p>><"clear">',
            "processing": true,
            "language": {
                processing: '<div id="loader-wrapper"><div class="overlay"></div> <div class="pulse"></div></div>'
            },
            "serverSide": true,
            ajax: "{{  route('referral.vbc-get-data') }}",
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
            "pageLength": 10,
             "lengthMenu": [ [10,25,50,100, -1], [10,25, 50,100, "All"] ],
            'columnDefs': [
                {
                    'targets': [0],
                    "orderable": false,
                    'checkboxes': {
                        'selectRow': true
                    }
                }
            ],
            'select': {
                'style': 'multi'
            },
        } );

         table.on( 'draw', function () {
            $('.dataTables_wrapper .dataTables_paginate .paginate_button').addClass('custompagination');
        });
    </script>
@endpush
