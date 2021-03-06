@extends('pages.layouts.app')

@section('title','Patient Detail')
@section('pageTitleSection')
    Patient
@endsection
@hasrole('referral')
    @section('upload-btn')
        <div class="d-flex">
            <a href="{{ url('referral/service/initial') }}" class="bulk-upload-btn">
                <img src="{{ asset('assets/img/icons/bulk-upload-icon.svg') }}" class="icon mr-2" />
                Pending Record</a>
            <a href="{{ route('referral.md-order-upload-bulk-data') }}" class="bulk-upload-btn" style="margin-left: 10px;">
                <img src="{{ asset('assets/img/icons/bulk-upload-icon.svg') }}" class="icon mr-2" />
                Import Patients</a>
        </div>
    @endsection
@endrole

@section('content')
    <div class="button-control mt-4 mb-4" id="acceptRejectBtn" style="display: none;">
        <button type="button" onclick="doaction('1')" class="btn btn-primary btn-view  text-capitalize shadow-sm btn--sm mr-2" data-toggle="tooltip" data-placement="left" title="" data-original-title="Accept">Accept</button>
        <button type="button" onclick="doaction('3')" class="btn btn-danger text-capitalize shadow-sm btn--sm mr-2 reject-item" data-toggle="tooltip" data-placement="left" title="" data-original-title="Reject">Reject</button>
    </div>
    <table class="display responsive nowrap" style="width:100%" id="get_patient-table">
        <input type="hidden" value="{{ $status }}" id="status" name="status" />
        <thead>
       
        <tr>
            @if($status === 'pending')
            <th><div class="checkbox"><input class="mainchk" type="checkbox"/><span class="checkbtn"></span></div></th>
            @endif
            <th>ID</th>
            <th>Patient Name</th>
            <th>Gender</th>
            <th>SSN</th>
            <th>Home Phone</th>
            <th>Services</th>
            <th>Doral Id</th>
            <th>City - State</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
  
    <div class="modal fade messageViewModel" id="modal" role="dialog"></div>
@endsection

@push('styles')
    <link href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.dataTables.min.css" rel="stylesheet">
    <link type="text/css" href="https://gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/css/dataTables.checkboxes.css" rel="stylesheet" />
    <style>
    input, .label {
        color: black;
    }
    .phone-text, .while_edit {
        display: none;
    }
</style>
@endpush

@push('scripts')
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>
    <script src="https://gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/js/dataTables.checkboxes.min.js"></script>
    <script src="https://unpkg.com/@google/markerclustererplus@4.0.1/dist/markerclustererplus.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        var columnDaTa = [];
        if ($("#status").val() === 'pending') {
            columnDaTa.push({data:'checkbox_id',name:'checkbox_id'});
        }
        columnDaTa.push(
            {data:'id',name:'id'},
            {data: 'full_name', name: 'full_name'},
            {data: 'gender', name: 'gender'},
            {data: 'ssn', name: 'ssn'},
            {data: 'home_phone', name: 'home_phone', class: 'editable text'},
            {data: 'service_id', name: 'service_id'},      
            {data: 'doral_id', name: 'doral_id'},        
            {data: 'city_state', name: 'city_state'},            
            {data: 'action', name: 'action'}
        );
       
        $('#get_patient-table').DataTable({
            "processing": true,
            "language": {
                processing: '<div id="loader-wrapper"><div class="overlay"></div><div class="pulse"></div></div>'
            },
            "serverSide": true,
            ajax: {
                'type': 'POST',
                'url': "{{ route('clinician.caregiver.ajax') }}",
                'headers': {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                data: {
                    status: $("#status").val(),
                },
            },
            columns:columnDaTa,
            "order": [[ 1, "desc" ]],
            "lengthMenu": [ [10, 20, 50, 100, -1], [10, 20, 50, 100, "All"] ],
            'columnDefs': [
                {
                    targets: [0, 8],
                    'searchable': false,
                    'orderable': false,
                }
            ],
        });
        $("body").on('click','.edit_btn',function () {
               $(this).parents("tr").find(".phone-text, .while_edit").css("display",'block');
               $(this).parents("tr").find("span, .normal").css("display",'none');
            });
            $("body").on('click','.cancel_edit',function () {
               $(this).parents("tr").find(".phone-text, .while_edit").css("display",'none');
               $(this).parents("tr").find("span, .normal").css("display",'block');
            });
            $("body").on('click','.save_btn',function () {
                var val = $(document).find('.phone').val();
                var id = $(this).attr("data-id");
                
                $.ajax({
                    'type': 'POST',
                    'url': "{{ route('referral.updatePhone') }}",
                    'headers': {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    data: {
                        "id": id,
                        "phone" : val
                    },
                    'success': function (data) {
                        if(data.status == 400) {
                            alertText(data.message,'error');
                        } else {
                            alertText(data.message,'success');
                            $('#acceptRejectBtn').hide();
                            refresh();
                        }
                        $("#loader-wrapper").hide();
                    },
                    "error":function () {
                        alertText("Server Timeout! Please try again",'error');
                        $("#loader-wrapper").hide();
                    }
                });
            });
        
        $('body').on('click', '.update-status', function () {
            var status = $(this).attr("data-status");
            $(".innerallchk, .mainchk").prop("checked","");
            $(this).parents("tr").find(".innerallchk").prop("checked",true);
            doaction(status) 
        });

        $(".mainchk").click(function () {
            var ch = $(this).prop("checked");
            if(ch == true) {
                $(".innerallchk").prop("checked","checked");
                $('#acceptRejectBtn').show();
            } else {
                $(".innerallchk").prop("checked","");
                $('#acceptRejectBtn').hide();
            }
        });

        function chkmain() {
            var ch = $(".innerallchk").prop("checked");
            if(ch == true) {
                $('#acceptRejectBtn').show();
                var len = $(".innerallchk:unchecked").length;
                if(len == 0) {
                    $(".mainchk").prop("checked","checked");
                } else {
                    $(".mainchk").prop("checked","");
                }
            } else {
                var len = $(".innerallchk:checked").length;
                if(len == 0) {
                    $('#acceptRejectBtn').hide();
                } else {
                    $('#acceptRejectBtn').show();
                    var len = $(".innerallchk:unchecked").length;
                    if(len == 0) {
                        $(".mainchk").prop("checked","checked");
                    } else {
                        $(".mainchk").prop("checked","");
                    }
                }
            }
        }

        function doaction(status) 
        {
            var len = $(".innerallchk:checked").length;
            if (len == 0) {
                alertText('Please select at least one record to continue.','warning');
            } else {
                var val = $('.innerallchk:checked').map(function () {
                    return this.value;
                }).get();
                postdataforaction(status, val);
            }
        }
            
        function postdataforaction(status,val) {
           
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: true,
                timer: 3000,
                timerProgressBar: true,
                buttonsStyling: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                title: 'Are you sure?',
                text: "Are you sure want to update status of this patient?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, change it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        $("#loader-wrapper").show();
                        $.ajax({
                            'type': 'POST',
                            'url': "{{ route('caregiver.changePatientStatus') }}",
                            'headers': {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            data: {
                                "id": val,
                                "status" : status
                            },
                            'success': function (data) {
                                if(data.status == 400) {
                                    alertText(data.message,'error');
                                } else {
                                    alertText(data.message,'success');
                                    $('#acceptRejectBtn').hide();
                                    refresh();
                                }
                                $("#loader-wrapper").hide();
                            },
                            "error":function () {
                                alertText("Server Timeout! Please try again",'error');
                                $("#loader-wrapper").hide();
                            }
                        });
                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                        alertText("Your file file is safe :)",'warning');
                        $(".innerallchk, .mainchk").prop("checked","");
                        $('#acceptRejectBtn').hide();
                    }
            });
        }

        function refresh() {
            $("#get_patient-table").DataTable().ajax.reload(null, false);
        }

        function alertText(text,status) {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: status,
                title: text
            })
        }
    </script>
@endpush
