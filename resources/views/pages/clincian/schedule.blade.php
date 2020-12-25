@extends('pages.clincian.layouts.app')

@section('title','Schedule Appointment List')
@section('pageTitleSection')
    Schedule Appointment List
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
            <th>Patient Name</th>
            <th>Gender</th>
            <th>Cause Of Appointment</th>
            <th>Date Of Birth</th>
            <th>Duration</th>
            <th>Status</th>
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
    <script src="{{ asset('js/clincian/app.clinician.appointment_cancelled.js') }}"></script>
    <script>
       var table = $('#patient-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{  route('clinician.scheduleAppoimentList.ajax') }}",
            columns:[
                {data:'id',name:'id'},
                {
                    data:'patients.first_name',
                    name:'patients.first_name',
                    "bSortable": true,
                    render:function(data, type, row, meta){
                        data = '<a class="text-green" href={{ url('/patient-detail/') }}/' + row.patients.id + '>' + row.patients.first_name +' '+ row.patients.last_name + '</a>';
                        return data;
                    }
                },
                {
                    data:'patients.gender',
                    name:'patients.gender',
                    bSortable: true,
                    render:function(data, type, row, meta){
                        if (data==="1"){
                            return 'Male';
                        }else if (data==="2"){
                            return 'Female';
                        }
                        return 'Other';
                    }
                },
                {data:'service.name',name:'service.name',"bSortable": true},
                {
                    data:'patients.dob',
                    name:'patients.dob',
                    bSortable: true,
                    render:function(data, type, row, meta){
                        if (data){
                            return '<div class="text-info">'
                                +'<i class="las la-clock circle-icon f-15"></i>'+data
                            +'</div>';
                        }
                        return '-';
                    }
                },
                {
                    data:'meeting',
                    name:'meeting',
                    "bSortable": true,
                    render:function (data, type, row, meta) {
                        if (row.meeting){

                            return '<div class="blink_me"><div id="countdown1">'+row.meeting.duration+'!</div></div>';
                        }
                        return '-';
                    }
                },
                {data:'status',name:'status',"bSortable": true},
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
       });

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
