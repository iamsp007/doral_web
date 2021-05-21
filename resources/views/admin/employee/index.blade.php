@extends('pages.layouts.app')

@section('title','Employee List')
@section('pageTitleSection')
    All Employee Lists
@endsection

@section('content')
    <div class="button-control mt-4 mb-4" id="acceptRejectBtn" style="display: none;">
        <button type="button" onclick="allSelectedAccept('1')" class="btn btn-primary btn-view  text-capitalize shadow-sm btn--sm mr-2" data-toggle="tooltip" data-placement="left" title="" data-original-title="Accept">Accept</button>
        <button type="button" onclick="allSelectedAccept('2')" class="btn btn-danger text-capitalize shadow-sm btn--sm mr-2 reject-item" data-toggle="tooltip" data-placement="left" title="" data-original-title="Reject">Reject</button>
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
                        <select class="form-control form-control-lg" name="designation_id" id="designation_id">
                            <option value="">Select Designation</option>
                            @foreach ($designations as $designation)
                                <option value="{{$designation->id}}">{{$designation->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-3 col-sm-3 col-md-3">
                        <div class="input-group">
                            <x-text name="date_of_birth" class="date_of_birth" id="date_of_birth" placeholder="Date of birth"/></td>
                        </div>
                    </div>
                    <div class="col-3 col-sm-3 col-md-3">
                        <div class="input-group">
                            <x-text name="email" class="email" id="email" placeholder="Email"/></td>
                        </div>
                    </div>
                    <div class="col-3 col-sm-3 col-md-3">
                        <div class="input-group">
                            <select name="status" class="form-control form-control-lg">
                                <option value="">Select a status</option>
                                @foreach (config('select.status') as $key => $value)
                                <option value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-3 col-sm-3 col-md-3">
                        <button class="btn btn-primary" type="button" id="filter_btn">Apply</button>
                        <button class="btn btn-primary reset_btn" type="button" id="reset_btn">Reset</button>
                    </div>
                </div>
            </div>
            
        </form>
    
    <div class="button-control mt-4 mb-4" id="acceptRejectBtn" style="display: none;">
        <button type="button" onclick="doaction('1')" class="btn btn-primary btn-view  text-capitalize shadow-sm btn--sm mr-2" data-toggle="tooltip" data-placement="left" title="" data-original-title="Accept">Accept</button>
        <button type="button" onclick="doaction('3')" class="btn btn-danger text-capitalize shadow-sm btn--sm mr-2 reject-item" data-toggle="tooltip" data-placement="left" title="" data-original-title="Reject">Reject</button>
    </div>
    <table class="display responsive nowrap data-table" style="width:100%">
        <thead>
        <tr>
            <th>ID</th>
            <th>Employee Name</th>
            <th>Employee ID</th>
            <th>Designation</th>
            <th>Date Of Birth</th>
            <th>Phone Number</th>
            <th>Email</th>
            <th>Licence Number</th>
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
            $('.data-table').DataTable({
                "processing": true,
                "serverSide": true,
                "language": {
                    processing: '<div id="loader-wrapper"><div class="overlay"></div><div class="pulse"></div></div>'
                },
                ajax: {
                    'type': 'POST',
                    'url': "{{ route('employee.getList') }}",
                    'headers': {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    data: function (d) {
                        d.user_name = $('select[name="user_name"]').val();
                        d.designation_id = $('select[name="designation_id"]').val();
                        d.date_of_birth = $('input[name="date_of_birth"]').val();
                        d.email = $('input[name="email"]').val();
                        d.status = $('select[name="status"]').val();
                    },
                    'headers': {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                },
                columns:[
                    {data:'id',"bSortable": true},
                    {data:'full_name', "bSortable": true},
                    {data:'employee_ID', "bSortable": true},
                    {data:'designation_id', "bSortable": true},
                    {data:'dob', "bSortable": true},
                    {data:'phone', "bSortable": true},
                    {data:'email', "bSortable": true},
                    {data:'driving_license', "bSortable": true},
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

            $('input[name="date_of_birth"]').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                minYear: 1901,
                maxYear: parseInt(moment().format('YYYY'), 10)
            });
            
            $('body').on('click', '.deleting', function () {
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
                text: "Are you sure want to delete this record?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, change it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            'type': 'delete',
                            'url': "{{url('partner/employee')}}/" + id,
                            'headers': {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            'success': function (data) {
                                if(data.status == 400) {
                                    alertText(data.message,'error');
                                } else {
                                    t.parents("tr").fadeOut(function () {
                                        $(this).remove();
                                    });
                                    alertText(data.message,'success');
                                }
                            },
                            "error":function () {
                                alertText("Server Timeout! Please try again",'warning');
                            }
                        });
                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                        alertText("Your record is safe :)",'cancelled');
                    }
                });
            });
            
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
                        $.ajax({
                            'type': 'get',
                            'url': '{{url("partner/employee/resend")}}/' + id,
                            'headers': {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            'success': function (data) {
                                if (data.status == 400) {
                                    alertText(data.message,'error');
                                } else {
                                    $(".data-table").DataTable().ajax.reload(null, false);
                                    alertText(data.message,'success');
                                }
                            },
                            "error": function () {
                                swal("Server Timeout!", "Please try again", "warning");
                                unload();
                            }
                        });
                    } else if (result.dismiss === 'cancel') {
                        alertText("Your record is safe :)",'cancelled');
                    }
                });
            });

            /*@ Change admin status */
            $("body").on('click', '.user_status', function (event) {
                var t = $(this);
                var id = t.attr("id");
                var value = t.attr("data-value");
                var status_name = t.attr("data-id");

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
                text: "Are you sure want to "+ status_name +" the record?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, change it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            'type': 'POST',
                            'url': '{{url("partner/employee/status")}}/' + id,
                            'headers': {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            data: {
                                'value': value,
                                'status_name': status_name
                            },
                            'success': function (data) {
                                if (data.status == 400) {
                                    alertText(data.message,'error');
                                } else {
                                    $(".data-table").DataTable().ajax.reload(null, false);
                                    alertText(data.message,'success');
                                }
                            },
                            "error": function () {
                                swal("Server Timeout!", "Please try again", "warning");
                                unload();
                            }
                        });
                    } else if (result.dismiss === 'cancel') {
                        alertText("Your record is safe :)",'cancelled');
                    }
                });
            });
        });
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
