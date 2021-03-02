@extends('pages.layouts.app')

@section('title','Patient Detail')
@section('pageTitleSection')
    Patient
@endsection

@section('content')
    <div class="button-control mt-4 mb-4" id="acceptRejectBtn" style="display: none;">
        <button type="button" onclick="doaction('1')" class="btn btn-primary btn-view  text-capitalize shadow-sm btn--sm mr-2" data-toggle="tooltip" data-placement="left" title="" data-original-title="Accept">Accept</button>
        <button type="button" onclick="doaction('3')" class="btn btn-danger text-capitalize shadow-sm btn--sm mr-2 reject-item" data-toggle="tooltip" data-placement="left" title="" data-original-title="Reject">Reject</button>
    </div>
    <table class="display responsive nowrap" style="width:100%" id="get_patient-table">
        <input type="hidden" value="{{ $status }}" id="status" name="status" />
        <thead>
        <tr>
            <th><div class="checkbox"><input class="mainchk" type="checkbox"/><span class="checkbtn"></span></div></th>
            <th>Patient Name</th>
            <th>Gender</th>
            <th>SSN</th>
            <th>Home Phone</th>
            <th>Patient Type</th>
            <th>Patient Id</th>
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
    <script src="https://unpkg.com/@google/markerclustererplus@4.0.1/dist/markerclustererplus.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
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
            columns:[
                {data:'id',name:'id'},
                {data: 'full_name', name: 'full_name'},
                {data: 'gender', name: 'gender'},
                {data: 'ssn', name: 'SSN'},
                {data: 'home_phone', name: 'home_phone'},
                {data: 'patient_type', name: 'patient_type'},      
                {data: 'patient_id', name: 'PatientID'},        
                {data: 'city_state', name: 'city_state'},            
                {data: 'action', name: 'action'},
            
            ],
            "order": [[ 1, "desc" ]],
            'columnDefs': [
                {
                    targets: 0,
                    'searchable': false,
                    'orderable': false,
                }
            ],
        });

        $('body').on('click', '.update-status', function () {
            var id = $(this).attr("data-id");
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
                swal(
                    'Warning!',
                    'Please select at least one record to continue.',
                    'warning'
                );
            } else {
                var val = $('.innerallchk:checked').map(function () {
                    return this.value;
                }).get();
                postdataforaction(status, val);
            }
        }
            
        function postdataforaction(status,val) {
            swal({
                title: "Are you sure?",
                text: "Are you sure want to update status of this patient?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
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
                            swal(
                                'Error!',
                                data.message,
                                'error'
                            );
                        } else {
                            swal(
                                'Success!',
                                data.message,
                                'success'
                            );
                            $('#acceptRejectBtn').hide();
                            refresh();
                        }
                        $("#loader-wrapper").hide();
                    },
                    "error":function () {
                        swal("Server Timeout!", "Please try again", "warning");
                        $("#loader-wrapper").hide();
                    }
                    });
                } else {
                    swal('Cancelled', 'Your record is safe :)','error');
                    $(".innerallchk, .mainchk").prop("checked","");
                    $('#acceptRejectBtn').hide();
                }
            });
        }
        function refresh() {
            $("#get_patient-table").DataTable().ajax.reload(null, false);
        }
    </script>
@endpush
