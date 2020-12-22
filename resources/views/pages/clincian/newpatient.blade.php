@extends('pages.clincian.layouts.app')

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
            <th>First Name</th>
            <th>Last Name</th>
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
@endpush

@push('scripts')
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/3.0.3/socket.io.js"></script>--}}
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>
    <script src="https://gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/js/dataTables.checkboxes.min.js"></script>
    <script>
       var table = $('#patient-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{  route('clinician.new.patientList.ajax') }}",
            columns:[
                {data:'id',name:'id'},
                {
                    data:'first_name',
                    name:'first_name',
                    "bSortable": true,
                    render:function(data, type, row, meta){
                        data = '<a href={{ url('/patient-detail/') }}/' + row.id + '>' + data + '</a>';
                        return data;
                    }
                },
                {data:'last_name',name:'last_name',"bSortable": true},
                {data:'service.name',name:'service.name',"bSortable": true},
                {data:'filetype.name',name:'filetype.name',"bSortable": true},
                {data:'gender',name:'gender',"bSortable": true},
                {
                    data:'dob',
                    name:'dob',
                    "bSortable": true
                },
                {data:'Zip',name:'Zip',"bSortable": true},
                {
                    data:'city',
                    name:'city',
                    "bSortable": true,
                    render:function (data, type, row, meta) {

                        return row.city+ ' - '+row.state;
                    }
                },
                {data:'action',name:'action',"bSortable": false}
            ],
            "order": [[ 1, "desc" ]],
           'columnDefs': [
               {
                   'targets': 0,
                   orderable: false,
                   className: 'select-checkbox',
                   'checkboxes': {
                       'selectRow': true
                   }
               }
           ],
           'select': {
               'style': 'multi'
           },
           buttons: [
               { extend: "create"},
               { extend: "edit" },
               { extend: "remove" }
           ]
       });;

       function changePatientStatus(element,status) {
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
                    table.ajax.reload();
                },
                error:function (error) {
                    console.log(error)
                }
            });
        }

        function allSelectedAccept() {
            var rows_selected = table.column(0).checkboxes.selected();
            // Iterate over all selected checkboxes
            var ids=[];
            $.each(rows_selected, function(index, rowId){
                // Create a hidden element
                ids.push(rowId)
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
                    table.ajax.reload();
                },
                error:function (error) {
                    console.log(error.message)
                }
            });
        }
    </script>
@endpush
