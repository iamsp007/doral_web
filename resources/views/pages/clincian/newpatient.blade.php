@extends('pages.layouts.app')

@section('title','Clinician Patient List')
@section('pageTitleSection')
    New Patient Request
@endsection

@section('content')
<div class="button-control mt-4 mb-4" id="acceptRejectBtn" style="display: none;">
        <button type="button" onclick="allSelectedAccept('1')" class="btn btn-primary btn-view  text-capitalize shadow-sm btn--sm mr-2" data-toggle="tooltip" data-placement="left" title="" data-original-title="Accept">Accept</button>
        <button type="button" onclick="allSelectedAccept('2')" class="btn btn-danger text-capitalize shadow-sm btn--sm mr-2 reject-item" data-toggle="tooltip" data-placement="left" title="" data-original-title="Reject">Reject</button>
    </div>
    <table class="display responsive nowrap" style="width:100%" id="patient-table" >
        <thead>
            <tr> 
              <th></th>
               <th></th>
            <th><select class="patient_name form-control" id="patient_name" name="" data-id='2'>
            </select></th>
           
            <th><select class="item2 form-control" name="item2" data-id='3'>
                    <option value="">select service</option>
                    <option value="VBC">VBC</option>
                    <option value="Md Order">Md Order</option>
                    <option value="Occupational Health">Occupational Health</option>
            </select></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            </tr>
        <tr>
            <th><input name="select_all" value="1" type="checkbox"></th>
            <th>ID</th>
            <th>Patient Name</th>
            <th>Service</th>
            <th>File Type</th>
            <th>Gender</th>
            <th>Date Of Birth</th>
            <th>Zip Code</th>
            <th>City - State</th>
            <th width="280px">Action</th>
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
     <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />


@endpush

@push('scripts')
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/3.0.3/socket.io.js"></script>--}}
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
                    url: '{{ route('clinician.new.patientList.data') }}',
                    type: "POST",
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                          searchTerm : params.term
                        };
                    },
                    processResults: function (data) {
                        var data_array = [];
                        data.data.forEach(function(value,key){
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
                placeholder: "Select Service",
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
        var table = $('#patient-table').DataTable({
            "processing": true,
            "language": {
                processing: '<div id="loader-wrapper"><div class="overlay"></div><div class="pulse"></div></div>'
            },
            "serverSide": false,
            ajax: "{{  route('clinician.new.patientList.ajax') }}",
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
                        if (data == 'MALE') {
                            return 'Male';
                        } else if (data == 'FEMALE') {
                            return 'Female';
                        } else {
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
                {data: 'action',name: 'action','bSortable': false}
            ],
            "order": [[ 1, "desc" ]],
            "pageLength": 10,
            "lengthMenu": [ [10,25,50,100, -1], [10,25, 50,100, "All"] ],
            'columnDefs': [
                {
                    targets: 0,
                    'searchable': false,
                    'orderable': false,
                    'width': '1%',
                    'className': 'dt-body-center',
                    'render': function (data, type, full, meta){
                        return '<input type="checkbox">';
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

        var rows_selected = [];
        // Handle click on checkbox
        $('#patient-table tbody').on('click', 'input[type="checkbox"]', function(e){
            var $row = $(this).closest('tr');

            // Get row data
            var data = table.row($row).data();
            // Get row ID
            var rowId = data;

            // Determine whether row ID is in the list of selected row IDs
            var index = $.inArray(rowId, rows_selected);

            // If checkbox is checked and row ID is not in list of selected row IDs
            if(this.checked && index === -1){
                rows_selected.push(rowId);

                // Otherwise, if checkbox is not checked and row ID is in list of selected row IDs
            } else if (!this.checked && index !== -1){
                rows_selected.splice(index, 1);
            }

            if(this.checked){
                $row.addClass('selected');
            } else {
                $row.removeClass('selected');
            }
            if (rows_selected.length>0){
                $('#acceptRejectBtn').show();
            }else {
                $('#acceptRejectBtn').hide();
            }
            // Prevent click event from propagating to parent
            e.stopPropagation();
        });

        // Handle click on "Select all" control
        $('thead input[name="select_all"]', table.table().container()).on('click', function(e){
            if(this.checked){
                $('#patient-table tbody input[type="checkbox"]:not(:checked)').trigger('click');
            } else {
                $('#patient-table tbody input[type="checkbox"]:checked').trigger('click');
            }

            // Prevent click event from propagating to parent
            e.stopPropagation();
        });

       function changePatientStatus(element,status) {
           $("#loader-wrapper").show();
            var id=$(element).attr('data-id');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url:"{{  route('clinician.changePatientStatus') }}",
                method:'POST',
                dataType:'json',
                data:{
                    id:[id],
                    status:status
                },
                success:function (response) {
                    $("#loader-wrapper").hide();
                    alert(response.message)
                    $('#acceptRejectBtn').hide();
                    table.ajax.reload();
                },
                error:function (error) {
                    table.ajax.reload();
                    $("#loader-wrapper").hide();
                    alert(error)
                }
                
            });
        }

        function allSelectedAccept() {
            $("#loader-wrapper").show();

            // Iterate over all selected checkboxes
            var ids=[];
            $.each(rows_selected, function(index, rowId){
                // Create a hidden element
                ids.push(rowId.id)
            });

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url:"{{  route('clinician.changePatientStatus') }}",
                method:'POST',
                dataType:'json',
                data:{
                    id:ids,
                    status:1
                },
                success:function (response) {
                    $("#loader-wrapper").hide();
                    alert(response.message)
                    table.ajax.reload();
                    $('#acceptRejectBtn').hide();
                },
                error:function (error) {
                    $("#loader-wrapper").hide();
                    alert(error.message)
                }
            });
        }
    </script>
@endpush
