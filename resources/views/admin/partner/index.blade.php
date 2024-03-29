@extends('pages.layouts.app')

@section('title','Partner List')
@section('pageTitleSection')
    All Partner Lists
@endsection

@section('content')
    <div class="button-control mt-4 mb-4" id="acceptRejectBtn" style="display: none;">  
        @include('admin.common.accept_reject_button',['status' => $partnerstatus])
    </div>
  
    <form id="search_form" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <div class="row">
                <div class="col-3 col-sm-3 col-md-3">
                    <select class="form-control form-control-lg" name="role" id="role">
                        <option value="">Select Role</option>
                        @foreach ($roles as $role)
                            <option value="{{$role->id}}">{{$role->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-3 col-sm-3 col-md-3">
                    <select class="form-control-plaintext _detail" name="company_id" id="company_id">
                        <option value="">Select Company</option>
                        @foreach ($companies as $company)
                            <option value="{{$company->id}}">{{$company->full_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-3 col-sm-3 col-md-3">
                    <div class="input-group">
                        <x-text name="email" class="email" id="email" placeholder="Email"/></td>
                    </div>
                </div>
                <div class="col-3 col-sm-3 col-md-3">
                    <button class="btn btn-primary" type="button" id="filter_btn">Apply</button>
                    <button class="btn btn-primary reset_btn" type="button" id="reset_btn">Reset</button>
                </div>
            </div>
        </div>
    </form>
    <table class="display responsive nowrap data-table" style="width:100%">
        <input type="hidden" value="{{ $partnerstatus }}" id="partnerstatus" name="partnerstatus" />
        <thead>
            <tr>
                <th><div class="checkbox"><label><input class="mainchk" type="checkbox" /><span class="checkbtn"></span></label></div></th>
                <th>Partner Type</th>
                <th>Company Name</th>
                <th>Email</th>
                <th>Phone Number</th>
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
        // $(document).ready(function () {
            $('.data-table').DataTable({
                "processing": true,
                "serverSide": true,
                "language": {
                    processing: '<div id="loader-wrapper"><div class="overlay"></div><div class="pulse"></div></div>'
                },
                ajax: {
                    'type': 'POST',
                    'url': "{{ route('partner.getList') }}",
                    'headers': {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    data: function (d) {
                        d.role = $('select[name="role"]').val();
                        d.email = $('input[name="email"]').val();
                        d.status = $('select[name="status"]').val();
                        d.company_id = $('select[name="company_id"]').val();
                        d.partnerstatus = $('input[name="partnerstatus"]').val();
                    },
                    'headers': {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                },
                columns:[
                    {data:'checkbox_id',"className": "text-center","bSortable": false},
                    {data:'partner_type', "bSortable": true},
                    {data:'first_name', "bSortable": true},
                    {data:'email', "bSortable": true},
                    {data:'phone', "bSortable": true},
                    {data: 'action', name: 'action'}
                ],
                "pageLength": 50,
                "lengthMenu": [ [10, 20, 50, 100, -1], [10, 20, 50, 100, "All"] ],
                // 'columnDefs': [
                //     {
                //         "order": [ 1, "desc"],
                //     }
                // ],
            });

            $('#role').select2();
            $('#company_id').select2();
            
            /*table reload at filter time*/
            $("#filter_btn").click(function () {
                refresh();
            });

            $("#reset_btn").click(function () {
                $('#search_form').trigger("reset");
                refresh();
            })
              /*@ Resend email */
              $("body").on('click', '.resendEmail', function (event) {
                var t = $(this);
                var id = t.attr("id");

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
                text: "Are you sure want to resend verification email?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, change it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        $("#loader-wrapper").show();
                        $.ajax({
                            'type': 'get',
                            'url': '{{url("admin/partner/resend")}}/' + id,
                            'headers': {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            'success': function (data) {
                                if (data.status == 400) {
                                    alertText(data.message,'error');
                                } else {
                                    refresh()
                                    alertText(data.message,'success');
                                }
                                $("#loader-wrapper").hide();
                            },
                            "error": function () {
                                swal("Server Timeout!", "Please try again", "warning");
                                $("#loader-wrapper").hide();
                            }
                        });
                    } else if (result.dismiss === 'cancel') {
                        alertText("Your record is safe :)",'cancelled');
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
                    text: "Are you sure want to update status of this patient? 1",
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
                                'url': '{{route("partner.status")}}',
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
            $(".data-table").DataTable().ajax.reload(null, false);
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
