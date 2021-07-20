@extends('pages.layouts.app')

@section('title','Notification List')
@section('pageTitleSection')
    Notification Lists
@endsection

@section('content')
    <div class="button-control mt-4 mb-4" id="acceptRejectBtn" style="display: none;">  
        <button type="button" onclick="doaction('1')" class="btn btn-primary btn-green shadow-sm btn--sm mr-2" data-toggle="tooltip" data-placement="left" title="" data-original-title="Accept">Read</button>
        <button type="button" onclick="doaction('0')" class="btn btn-danger text-capitalize shadow-sm btn--sm mr-2 reject-item" data-toggle="tooltip" data-placement="left" title="" data-original-title="Reject">Unread</button>
    </div>
    <form id="search_form" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <div class="row">
                <div class="col-3 col-sm-3 col-md-3">
                    <div class="input-group">
                        <select class="user_name form-control select2_dropdown" id="user_name" name="user_name"></select>
                    </div>
                </div>
              
                <div class="col-3 col-sm-3 col-md-3">
                    <button class="btn btn-primary" type="button" id="filter_btn">Apply</button>
                    <button class="btn btn-primary reset_btn" type="button" id="reset_btn">Reset</button>
                </div>
            </div>
        </div>
    </form>
   
    <table class="display responsive nowrap view-notification-history" style="width:100%">
        <thead>
        <tr>
            <th><div class="checkbox"><label><input class="mainchk" type="checkbox" /><span class="checkbtn"></span></label></div></th>
            <th>Patient Name</th>
            <th>Disease</th>
            <th>Test Name</th>
            <th>Symptoms</th>
            <!-- <th>Address</th> -->
            <th>Distance</th>
            <th>Travel Time</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
@endsection

@push('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
@endpush
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script> 
    <script>
        $(document).ready(function () {
            $('.view-notification-history').DataTable({
                "processing": true,
                "serverSide": true,
                ajax: {
                    'type': 'POST',
                    'url': "{{ route('notification.getList') }}",
                    'headers': {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    data: function (d) {
                        d.user_name = $('select[name="user_name"]').val();
                        d.disease_id = $('select[name="disease_id"]').val();
                        d.test_name = $('select[name="test_name"]').val();
                        d.symptom_id = $('select[name="symptom_id"]').val();
                    },
                    'headers': {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                },
                columns:[
                    {data:'checkbox_id',"className": "text-center","bSortable": false},
                    {data:'patient_name', "bSortable": true},
                    {data:'disease', "bSortable": true},
                    {data:'test_name', "bSortable": true},
                    {data:'symptoms', "bSortable": true},
                    //{data:'address', "bSortable": true},
                    {data:'distance', "bSortable": true},
                    {data:'travel_time', "bSortable": true},
                    {data: 'action', name: 'action'}
                ],
        
                "lengthMenu": [ [10, 20, 50, 100, -1], [10, 20, 50, 100, "All"] ],
                'columnDefs': [
                    {
                        "order": [ 1, "desc"],
                    }
                ],
            });

            $('#user_name').select2({
                minimumInputLength: 3,
                placeholder: 'Select a name',
                ajax: {
                    type: "POST",
                    url: "{{ route('clinician.get-user-data') }}",
                    dataType: 'json',
                    delay: 250,
                    processResults: function (data) {
                        return {
                            results:  $.map(data, function (item) {
                                return {
                                    text: item.first_name + ' ' + item.last_name,
                                    id: item.id
                                }
                            })
                        };
                    },
                    cache: true
                }
            });

            /*table reload at filter time*/
            $("#filter_btn").click(function () {
                refresh();
            });

            $("#reset_btn").click(function () {
                $('#search_form').trigger("reset");
                $('#user_name').html('');
                refresh();
            })

            $('body').on('click', '.update-status', function () {
                var is_read = $(this).attr("data-status");
                $(".innerallchk, .mainchk").prop("checked","");
                $(this).parents("tr").find(".innerallchk").prop("checked",true);
                doaction(is_read) 
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

            function doaction(is_read) 
            {
                var len = $(".innerallchk:checked").length;
                if (len == 0) {
                    alertText('Please select at least one record to continue.','warning');
                } else {
                    var val = $('.innerallchk:checked').map(function () {
                        return this.value;
                    }).get();
                    postdataforaction(is_read, val);
                }
            }
            
            function postdataforaction(is_read,val) {
            
                if (is_read === '0'){
                    var status = 'Unread';
                } else {
                    var status = 'Read';
                }
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
                    text: "Are you sure want to "+ status + " notification?",
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
                                'url': '{{route("notification.status")}}',
                                'headers': {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                },
                                data: {
                                    "id": val,
                                    "is_read" : is_read,
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
            $(".view-notification-history").DataTable().ajax.reload(null, false);
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
