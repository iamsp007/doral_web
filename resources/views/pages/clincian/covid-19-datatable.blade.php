@extends('pages.layouts.app')

@section('title','Covid 19 Patient List')

@section('content')
    <table class="display responsive nowrap" style="width:100%" id="patient-table" >
        <thead>
            <tr>
                <th>ID</th>
                <th>Patient Name</th>
                <th>Phone</th>
                <th>Dose</th>
                <th width="280px">PDF</th>
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
        });
        var table = $('#patient-table').DataTable({
            "processing": true,
            "language": {
                processing: '<div id="loader-wrapper"><div class="overlay"></div><div class="pulse"></div></div>'
            },
            "serverSide": false,
            ajax: "{{ route('clinician.covid-19-patient-list') }}",
            columns:[
                {data:'id',name:'id'},
                {data:'patient_name',name:'patient_name'},
                {data:'phone',name:'phone'},
                {data:'dose',name:'dose'},
                {
                    data: 'pdf',name: 'pdf', "render": function ( data, type, row, meta ) {
                        return '<a href="'+data+'" target="__blank">Download or Print</a>';
                    }
                }
            ],
            "pageLength": 5,
            "lengthMenu": [ [5, 10,20, 25,100, -1], [5, 10,20, 25,100, "All"] ]
        });

        table.on( 'draw', function () {
            $('.dataTables_wrapper .dataTables_paginate .paginate_button').addClass('custompagination');
        });
    </script>
@endpush
