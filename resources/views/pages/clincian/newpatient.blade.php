@extends('pages.clincian.layouts.app')

@section('title','Clinician Patient List')
@section('pageTitleSection')
    New Patient Request
@endsection

@section('content')
    <table class="display responsive nowrap" style="width:100%" id="patient-table" >
        <thead>
        <tr>
            <th>ID</th>
            <th>User ID</th>
            <th>First Name</th>
            <th>Middle Name</th>
            <th>Last Name</th>
            <th>Gender</th>
            <th>Address 1</th>
            <th>City</th>
            <th>Status</th>
            <th>Created At</th>
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
    <link href="https://cdn.datatables.net/select/1.3.1/css/select.dataTables.min.css" rel="stylesheet">
@endpush

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/3.0.3/socket.io.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>
    <script>
       var table = $('#patient-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{  route('clinician.new.patientList.ajax') }}",
            columns:[
                {data:'id',name:'id',"bSortable": true},
                {data:'user_id',name:'user_id',"bSortable": true},
                {
                    data:'first_name',
                    name:'first_name',
                    "bSortable": true,
                    render:function(data, type, row, meta){
                        data = '<a href={{ url('/clinician/patient-detail/') }}/' + row.id + '">' + data + '</a>';
                        return data;
                    }
                },
                {data:'middle_name',name:'middle_name',"bSortable": true},
                {data:'last_name',name:'last_name',"bSortable": true},
                {data:'gender',name:'gender',"bSortable": true},
                {data:'address_1',name:'address_1',"bSortable": true},
                {data:'city',name:'city',"bSortable": true},
                {data:'status',name:'status',"bSortable": true},
                {data:'created_at',name:'created_at',"bSortable": true},
                {data:'action',name:'action',"bSortable": true}
            ],
            "order": [[ 0, "desc" ]],
           columnDefs: [ {
               orderable: false,
               className: 'select-checkbox',
               targets:   0
           } ],
           select: {
               style:    'os',
               selector: 'td:first-child'
           },
        });
        {{--$('#patient-table tbody').on('click', 'tr', function () {--}}
        {{--    var rowData = table.row(this).data();--}}
        {{--    window.location.href='{{ url('/clinician/patient-detail/') }}/'+rowData.id;--}}
        {{--    console.log(rowData.id);--}}
        {{--});--}}

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
                    id:id,
                    status:status
                },
                success:function (response) {
                    alert(response.message)
                    window.location.reload();
                },
                error:function (error) {
                    console.log(error)
                }
            });
        }
    </script>
@endpush
