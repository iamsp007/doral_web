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
            <th><select class="item1 form-control" name="item1" data-id='1'>
                    <option value="">select applicant name</option>
                @foreach($record as $row)
                    <option value="{{ $row->first_name}}">{{ $row->first_name .' ' . $row->last_name}}</option>
                @endforeach
            </select></th>
            <th><select class="item2 form-control" name="item2" data-id='2'>
                    <option value="">select gender</option>
                    <option value="1">Male</option>
                    <option value="2">Female</option>
            </select></th>
            <th></th>
            <th></th>
            <th><select class="item3 form-control" name="item3" data-id='5'>
                    <option value="">select status</option>
                    <option value="0">Pending</option>
                    <option value="1">Active</option>
                    <option value="2">Inactive</option>
                    <option value="3">Reject</option>
            </select></th>
        </tr>
        <tr>
            <th></th>
            <th>Applicant Name</th>
            <th>Gender</th>
            <th>DOB</th>
            <th>Phone</th>
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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
@endpush

@push('scripts')
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>
    <script src="https://gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/js/dataTables.checkboxes.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script>

         $(document).ready(function () {
            $('.item1').on('change', function () {
                table
                    .columns( $(this).attr('data-id'))
                    .search( this.value )
                    .draw();
            });

            $('.item2').on('change', function () {
                table
                    .columns( $(this).attr('data-id'))
                    .search( this.value )
                    .draw();
            });
          
            $('.item3').on('change', function () {
                table
                    .columns( $(this).attr('data-id'))
                    .search( this.value )
                    .draw();
            });
        });

        var table = $('#clinician-table').DataTable({
            processing: true,
            "language": {
                processing: '<div id="loader-wrapper">  <div class="overlay"></div> <div class="pulse"></div></div>'
            },
            serverSide: true,
             drawCallback: function(dt) {
              console.log("draw() callback; initializing Select2's.");
              $('.item1').select2({tags: true,width : '15rem'});
              $('.item2').select2({tags: true,width : '15rem'});
              $('.item3').select2({tags: true,width : '10rem'});
            },
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
                        } else if (data == 'MALE') {
                            return 'Male';
                        } else if (data == 'FEMALE') {
                            return 'Female';
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

        table.on( 'draw', function () {
            $('.dataTables_wrapper .dataTables_paginate .paginate_button').addClass('custompagination');
        });
    </script>
@endpush
