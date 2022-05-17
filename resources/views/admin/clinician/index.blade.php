@extends('pages.layouts.app')
@section('title','Clinician Lists')
@section('pageTitleSection')
    @if($status === 'pending')
        Pending Clinician
    @elseif($status === 'active')
        Active Clinician
    @elseif($status === 'rejected')
        Rejected Clinician
    @endif
@endsection

@section('content')
    <div class="button-control mt-4 mb-4" id="acceptRejectBtn" style="display: none;">
        @include('admin.common.accept_reject_button',['status' => $status])
    </div>
   
    <form id="search_form" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-group">
        <div class="row">
            <div class="col-3 col-sm-3 col-md-3">
                <div class="input-group">
                    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Select a first name">
                    <!-- <select class="form-control" id="first_name" name="first_name" placeholder="Select a first name"></select> -->
                </div>
            </div>
             <div class="col-3 col-sm-3 col-md-3">
                <div class="input-group">
                    <select class="form-control" id="last_name" name="last_name"></select>
                </div>
            </div>
            <div class="col-3 col-sm-3 col-md-3">
                <div class="input-group">
                    <select name="gender" class="form-control form-control-lg">
                        <option value="">Select a gender</option>
                        @foreach (config('select.gender') as $key => $value)
                        <option value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </select>
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
           
        </div>
    </div>
    <div class="form-group">
        <div class="row">
        <div class="col-3 col-sm-3 col-md-3">
                <div class="input-group">
                    <x-text name="email" class="email" id="email" placeholder="Email"/></td>
                </div>
            </div>
            <!-- <div class="col-3 col-sm-3 col-md-3">
                <div class="input-group">
                    <x-text name="date_of_birth" class="date_of_birth" id="date_of_birth" placeholder="Date of birth"/></td>
                </div>
            </div> -->
            <div class="col-3 col-sm-3 col-md-3">
                <div class="input-group">
                    <select name="searchstatus" class="form-control form-control-lg">
                        <option value="">Select a status</option>
                        @foreach (config('select.clinicianstatus') as $key => $value)
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
    <table class="display responsive nowrap" style="width:100%" id="clinician-table">
    <input type="hidden" value="{{ ($status) ? $status : '' }}" id="status" name="status" />
        <thead>
            <tr>
                <th><div class="checkbox"><label><input class="mainchk" type="checkbox" /><span class="checkbtn"></span></label></div></th>
                <th>Applicant Name</th>
                <th>Gender</th>
                <th width="80px">Speciality</th>
                <th>Email</th>
                <th>DOB</th>
                <th>Phone</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
@endsection

@push('styles')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endpush

@push('scripts')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.2/jQuery.print.js" integrity="sha512-BaXrDZSVGt+DvByw0xuYdsGJgzhIXNgES0E9B+Pgfe13XlZQvmiCkQ9GXpjVeLWEGLxqHzhPjNSBs4osiuNZyg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>

       var clinician_status = "<?php echo $status;?>";
       $('#first_name').on('keyup', function(){
          var q = $(this).val();
          console.log(q);
            $.ajax({
                'type': 'POST',
                'url': "{{ route('clinician.get-user-data') }}",
                // 'headers': {
                //     'X-CSRF-TOKEN': '{{ csrf_token() }}'
                // },
                data: {
                    q: q,
                    status: clinician_status,
                    view: 'clinician',
                    field: 'first_name'
                },
                'success': function (data) {
                    if(data.status == 400) {
                        alert('error');
                    } else {
                        alert('success');
                        // $('#acceptRejectBtn').hide();
                        // $(".mainchk").prop("checked","");
                        // refresh();
                        
                    }
                    // $("#loader-wrapper").hide();
                },
                "error":function () {
                    alert("Server Timeout! Please try again",'error');
                    //$("#loader-wrapper").hide();
                }
            });
       });
    //    $('#first_name').select2({
    //         minimumInputLength: 3,
    //         placeholder: 'Select a first name',
    //         ajax: {
    //             type: "POST",
    //             url: "{{ route('clinician.get-user-data') }}",
    //             dataType: 'json',
    //             delay: 250,
    //             data: function (params) {
    //                 var query = {
    //                     q: params.term,
    //                     status: clinician_status,
    //                     view: 'clinician',
    //                     field: 'first_name'
    //                 }
            
    //                 return query;
    //             },
    //             processResults: function (data) {
    //                 return {
    //                     results:  $.map(data, function (item) {
    //                         return {
    //                             text: item.first_name,
    //                             id: item.id
    //                         }
    //                     })
    //                 };
    //             },
    //             cache: true
    //         }
    //     });

        $('#last_name').select2({
            minimumInputLength: 3,
            placeholder: 'Select a last name',
            ajax: {
                type: "POST",
                url: "{{ route('clinician.get-user-data') }}",
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    var query = {
                        q: params.term,
                        status: clinician_status,
                        view: 'clinician',
                        field: 'last_name'
                    }
            
                    return query;
                },
                processResults: function (data) {
                    return {
                        results:  $.map(data, function (item) {
                            return {
                                text: item.last_name,
                                id: item.id
                            }
                        })
                    };
                },
                cache: true
            }
        });

        $('#clinician-table').DataTable({
            "processing": true,
            "serverSide": true,
            "language": {
                processing: '<div id="loader-wrapper"><div class="overlay"></div><div class="pulse"></div></div>'
            },
            ajax: {
                'type': 'POST',
                'url': "{{ route('admin.clinician-list') }}",
                'headers': {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                data: function (d) {
                    d.status = $('input[name="status"]').val();
                    d.first_name = $('input[name="first_name"]').val();
                    d.last_name = $('select[name="last_name"]').val();
                    d.designation_id = $('select[name="designation_id"]').val();
                    d.email = $('input[name="email"]').val();
                    d.gender = $('select[name="gender"]').val();
                    d.searchstatus = $('select[name="searchstatus"]').val();
                },
               
            },
            columns:[
                {data:'checkbox_id',"className": "text-center","bSortable": false},
                {data:'name', "bSortable": true},
                {data:'gender',"bSortable": true},
                {data:'designation_id',"bSortable": true},
                {data:'email',"bSortable":true},
                {data:'dob',"bSortable":true},
                {data:'phone',"bSortable":true},
                {data:'created_at',"bSortable":true},
                {data: 'action',name: 'action',"bSortable": false}
            ],
            "pageLength": 50,
            "lengthMenu": [ [10, 20, 50, 100, -1], [10, 20, 50, 100, "All"] ],
        });

        /*table reload at filter time*/
        $("#filter_btn").click(function () {
            refresh();
        });

        $("#reset_btn").click(function () {
            $('#search_form').trigger("reset");
            $('#first_name').html('');
            $('#last_name').html('');
            refresh();
        });

        $('input[name="date_of_birth"]').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            minYear: 1901,
            maxYear: parseInt(moment().format('YYYY'), 10)
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

        var token = $('input[name="_token"]').val();
       
        $('body').on('click', '#print', function () {
            var id = $(this).attr("data-id");
            var fileType = $(this).attr("data-file");
            var filename = $(this).attr("data-name") + '.pdf';
            var t = $(this);
            if (fileType === 'demograhics' || fileType === 'document') {
                t.parent('.form-group').find('.loader').show();
            } else {
                t.parent('.list-group-item').find('.loader').show();
            }
           
            $.ajax({
                type: 'POST',
                url: "{{ Route('clinician.print')}}",
                data: {
                'id':id,
                'fileType':fileType
                },
                headers: {
                'X-CSRF-Token': token
                },
                xhrFields: {
                responseType: 'blob'
                },
                success: function(response){
                var blob = new Blob([response]);
                
                var link = document.createElement('a');
                link.href = window.URL.createObjectURL(blob);
                link.download = filename;
                link.click();
                //refresh();
                
                if (fileType === 'demograhics' || fileType === 'document') {
                    t.parent('.form-group').find('.loader').hide();
                } else {
                    t.parent('.list-group-item').find('.loader').hide();
                }
                },
                error: function(blob){
                console.log(blob);
                if (fileType === 'demograhics' || fileType === 'document') {
                    t.parent('.form-group').find('.loader').hide();
                } else {
                    t.parent('.list-group-item').find('.loader').hide();
                }
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
                                    $(".mainchk").prop("checked","");
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
                        $("#loader-wrapper").hide();
                    }
            });
        }

        /*Open message in model */
        $("body").on('click','.viewprintOption',function () {
            var log_id = $(this).attr('id');
            var url = '{{url("applicant/getprintoption")}}/' + log_id;
            $("#loader-wrapper").show();
            $.ajax({
                url : url,
                type: 'GET',
                headers: {
                    'X_CSRF_TOKEN':'{{ csrf_token() }}',
                },  
                success:function(data, textStatus, jqXHR){
                    $("#loader-wrapper").hide();
                    $(".messageViewModel").html(data);
                    $(".messageViewModel").modal('show');
                },
                error: function(jqXHR, textStatus, errorThrown){
                    swal("Server Timeout!", "Please try again", "warning");
                    $("#loader-wrapper").hide();
                }
            });
        });
        
        function refresh() {
            $("#clinician-table").DataTable().ajax.reload(null, false);
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
