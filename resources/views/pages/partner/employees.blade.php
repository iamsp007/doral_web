@extends('pages.layouts.app')

@section('title','Employee List')
@section('pageTitleSection')
    All Employee Lists
@endsection

@section('content')
<div class="button-control mt-4 mb-4" id="acceptRejectBtn" style="display: none;">
        <button type="button" onclick="allSelectedAccept('1')" class="btn btn-primary btn-view  text-capitalize shadow-sm btn--sm mr-2" data-toggle="tooltip" data-placement="left" title="" data-original-title="Accept">Accept</button>
        <button type="button" onclick="allSelectedAccept('2')" class="btn btn-danger text-capitalize shadow-sm btn--sm mr-2 reject-item" data-toggle="tooltip" data-placement="left" title="" data-original-title="Reject">Reject</button>
    </div>
    <table class="display responsive nowrap" style="width:100%" id="patient-table" >
        <thead>
        <tr>
            <th><input name="select_all" value="1" type="checkbox"></th>
            <th>ID</th>
            <th>Employee Name</th>
            <th>Employee ID</th>
            <th>Date Of Birth</th>
            <th>Phone Number</th>
            <th>Email</th>
            <th>Licence Number</th>
            <!--<th width="280px">Action</th>-->
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
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/3.0.3/socket.io.js"></script>--}}
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
            ajax: "{{  route('partner.employees.ajax') }}",
            columns:[
                {data:'id',name:'id'},
                {data:'id',name:'id'},
                {
                    data:'first_name',
                    name:'first_name',
                    "bSortable": true,
                    render:function(data, type, row, meta){
                        data = '<a href="">' + row.first_name +' '+ row.last_name + '</a>';
                        return data;
                    }
                },
                {
                    data:'gender',
                    name:'gender',
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
                }
//                {data: 'action',name: 'action'}
            ],
            "order": [[ 1, "desc" ]],
            "pageLength": 5,
            "lengthMenu": [ [5, 10,20, 25,100, -1], [5, 10,20, 25,100, "All"] ],
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
                    console.log(error)
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
                    console.log(error.message)
                }
            });
        }
    </script>
@endpush
