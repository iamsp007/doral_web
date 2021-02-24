@extends('pages.layouts.app')

@section('title','Clinician Patient List')

@section('pageTitleSection', 'Patient')

@section('content')
    <table class="display responsive nowrap" style="width:100%" id="patient-table">
        <thead>
            <tr> 
              <th></th>
               <th></th>
            <th><select class="patient_name form-control" id="patient_name" name="" data-id='2'>
            </select></th>
           
            <th><select class="item2 form-control" name="item2" data-id='9'>
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
                <th>ID</th>
                <th>Patient Name</th>
                <th>Service</th>
                <th>File Type</th>
                <th>Gender</th>
                <th>Date Of Birth</th>
                <th>Zip Code</th>
                <th>City - State</th>
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
                    url: '{{ route('clinician.patientList.data') }}',
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
        var table = $('#patient-table').DataTable({
            "processing": true,
            "language": {
                processing: '<div id="loader-wrapper"><div class="overlay"></div><div class="pulse"></div></div>'
            },
            "serverSide": false,
            ajax: "{{  route('clinician.patientList.ajax') }}",
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
                        } else if (data == '1') {
                            return 'Male';
                        } else if (data == '2') {
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
                {
                    data:'patient_detail.status',
                    name:'patient_detail.status',
                    "bSortable": true,
                    render:function (data, type, row, meta) {
                        if (row.patient_detail){
                            if (row.patient_detail.status==="pending"){

                                return '<span class="status-pending">'+row.patient_detail.status+'</span>';
                            }else if (row.patient_detail.status==="accept"){

                                return '<span class="status-accepted">'+row.patient_detail.status+'</span>'
                            }else if (row.patient_detail.status==="rescheduled"){

                                return '<span class="status-rescheduled">'+row.patient_detail.status+'</span>';
                            }
                            return row.patient_detail.status;
                        }
                        return '-';
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
    </script>
@endpush
