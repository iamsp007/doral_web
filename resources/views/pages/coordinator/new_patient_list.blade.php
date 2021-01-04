@extends('pages.layouts.app')
@section('title','New Patient Lists')
@section('pageTitleSection')
    New Patient Lists
@endsection

@section('content')
<table class="display responsive nowrap" style="width:100%" id="patient-table">
    <thead>
        <tr>
            <th></th>
            <th>Patient Name</th>
            <th>Last Name</th>
            <th>Service</th>
            <th>File Type</th>
            <th>Gender</th>
            <th>Date Of Birth</th>
            <th>Zip Code</th>
            <th>City - State</th>
            <th>Action</th>
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
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>
<script src="https://gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/js/dataTables.checkboxes.min.js"></script>
<script>
    var table = $('#patient-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{  route('coordinator.getNewPatientList') }}",
        columns: [{
                data: 'id',
                name: 'id'
            },
            {
                data:'first_name',
                name:'first_name',
                "bSortable": true,
                render:function(data, type, row, meta){
                    data = '<a href={{ url('/patient-detail/') }}/' + row.user_id + '>' + row.first_name +' '+ row.last_name + '</a>';
                    return data;
                }
            },
            {
                data: 'last_name',
                name: 'last_name',
                "bSortable": true
            },
            {
                data: 'service.name',
                name: 'service.name',
                "bSortable": true
            },
            {
                data: 'filetype.name',
                name: 'filetype.name',
                "bSortable": true
            },
            {
                data: 'gender',
                name: 'gender',
                "bSortable": true
            },
            {
                data: 'dob',
                name: 'dob',
                "bSortable": true
            },
            {
                data: 'Zip',
                name: 'Zip',
                "bSortable": true
            },
            {
                data: 'city',
                name: 'city',
                "bSortable": true,
                render: function(data, type, row, meta) {

                    return row.city + ' - ' + row.state;
                }
            },
            {
                data: 'status',
                name: 'status',
                "bSortable": true,
                render: function(data, type, row, meta) {
                    var appointment_booking_url = '{{ url("/co-ordinator/appointment/") }}/'+row.user_id;
                    var html = '<div class="d-flex">' +
                        '<a href="'+appointment_booking_url+'" class="single-upload-btn mr-2">' +
                        '<img src="'+base_url+'assets/img/icons/appo-btn.svg" class="icon mr-2">Book Appointment</a>' +
                        '</div>';
                    return html;
                }
            }
        ],
        "order": [
            [0, "desc"]
        ],
        'columnDefs': [{
            'targets': 0,
            'visible': false,
            'checkboxes': {
                'selectRow': true
            }
        }, {
            'targets': 2,
            'visible': false,
        }, {
            'targets': 4,
            'visible': false,
        }],
    });
</script>
@endpush
