@extends('pages.layouts.app')

@section('title','Covid 19 Patient List')

@section('content')
    <table class="display responsive nowrap" style="width:100%" id="patient-table" >
        <thead>
            <tr>
                <th>ID</th>
                <th>Clinician Name</th>
                <th>Patient Name</th>
                <th>Phone</th>
                <th>Dose</th>
                <!-- <th width="150px">PDF</th> -->
                <th width="100px">Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
@endsection
<div id="email"></div>
<div id="text"></div>

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

            var email = '<div class="modal" id="emailModal">'+
                        '<div class="modal-dialog">'+
                          '<div class="modal-content">'+
                            '<div class="modal-header">'+
                              '<h4 class="modal-title">Send Email</h4>'+
                              '<button type="button" class="close" data-dismiss="modal">&times;</button>'+
                            '</div>'+
                            '<div class="modal-body">'+
                              '<div class="form-group">'+
                                '<label for="email" class="col-form-label">Email:</label>'+
                                '<input type="email" class="form-control email" id="email" placeholder="abc@example.com" required>'+
                              '</div>'+
                            '</div>'+
                            '<div class="modal-footer">'+
                              '<button type="button" class="btn btn-info mr-2" id="send-email">Send email</button>'+
                              '<button type="button" class="btn btn-warning mr-3" data-dismiss="modal">Cancel</button>'+
                            '</div>'+
                          '</div>'+
                        '</div>'+
                      '</div>';

            var text = '<div class="modal" id="textModal">'+
                        '<div class="modal-dialog">'+
                          '<div class="modal-content">'+
                            '<div class="modal-header">'+
                              '<h4 class="modal-title">Send Text Message</h4>'+
                              '<button type="button" class="close" data-dismiss="modal">&times;</button>'+
                            '</div>'+
                            '<div class="modal-body">'+
                              '<div class="form-group">'+
                                '<label for="phone" class="col-form-label">Phone:</label>'+
                                '<input type="text" class="form-control phone" id="phone" placeholder="+1 123 456 7890" required>'+
                              '</div>'+
                            '</div>'+
                            '<div class="modal-footer">'+
                              '<button type="button" class="btn btn-info mr-2" id="send-message">Send message</button>'+
                              '<button type="button" class="btn btn-warning mr-3" data-dismiss="modal">Cancel</button>'+
                            '</div>'+
                          '</div>'+
                        '</div>'+
                      '</div>';

            $('#email').html(email);
            $('#text').html(text);
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
                {data:'clinician.first_name',name:'clinician.first_name', render: function ( data, type, row, meta ) {
                        return row.clinician.first_name+' '+row.clinician.last_name;
                    }
                },
                {data:'patient_name',name:'patient_name'},
                {data:'phone',name:'phone'},
                {data:'dose',name:'dose'},
                // {
                //     data: 'pdf',name: 'pdf', "render": function ( data, type, row, meta ) {
                //         return '<a href="'+data+'" target="__blank">Download or Print</a>';
                //     }
                // },
                {data: 'action',name: 'action', "bSortable": false}
            ],
            "pageLength": 5,
            "lengthMenu": [ [5, 10,20, 25,100, -1], [5, 10,20, 25,100, "All"] ]
        });

        table.on( 'draw', function () {
            $('.dataTables_wrapper .dataTables_paginate .paginate_button').addClass('custompagination');
        });

        function popEmail(id) {
            $('.email').attr('id', 'email-'+id).val('');
            $('#send-email').attr('onclick', 'return sendEmail('+id+');');
            $('#emailModal').modal("show");
        }

        function popText(id) {
            $('.phone').attr('id', 'phone-'+id).val('');
            $('#send-message').attr('onclick', 'return sendText('+id+');');
            $('#textModal').modal("show");
        }

        function sendEmail(id) {
            var email = $('#email-'+id).val();
            // alert(id+'='+email);
            $("#loader-wrapper").show();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url:"{{ route('clinician.covid-19.send-email') }}",
                method:'POST',
                dataType:'json',
                data:{
                    id:id,
                    email:email
                },
                success:function (response) {
                    $("#loader-wrapper").hide();
                    $('#emailModal').modal("hide");
                },
                error:function (error) {
                    $("#loader-wrapper").hide();
                }
            });
        }

        function sendText(id) {
            var phone = $('#phone-'+id).val();
            // alert(id+'='+phone);
            $("#loader-wrapper").show();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url:"{{ route('clinician.covid-19.send-message') }}",
                method:'POST',
                dataType:'json',
                data:{
                    id:id,
                    phone:phone
                },
                success:function (response) {
                    $("#loader-wrapper").hide();
                    $('#textModal').modal("hide");
                },
                error:function (error) {
                    $("#loader-wrapper").hide();
                }
            });
        }

        function changePatientStatus(element,status) {
            
        }
    </script>
@endpush
