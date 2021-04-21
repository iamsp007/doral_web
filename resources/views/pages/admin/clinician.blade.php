@extends('pages.layouts.app')
@section('title','Clinician Lists')
@section('pageTitleSection')
    @if(Request::is('admin/clinician-approval'))
        Pending Clinician
    @elseif(Request::is('admin/clinician-active'))
        Active Clinician
    @elseif(Request::is('admin/clinician-rejected'))
        Reject Clinician
    @endif
@endsection

@section('content')
    <div class="button-control mt-4 mb-4" id="acceptRejectBtn" style="display: none;">
        <button type="button" onclick="doaction('1')" class="btn btn-primary btn-view  text-capitalize shadow-sm btn--sm mr-2" data-toggle="tooltip" data-placement="left" title="" data-original-title="Accept">Accept</button>
        <button type="button" onclick="doaction('3')" class="btn btn-danger text-capitalize shadow-sm btn--sm mr-2 reject-item" data-toggle="tooltip" data-placement="left" title="" data-original-title="Reject">Reject</button>
    </div>
    
    <table class="display responsive nowrap" style="width:100%" id="clinician-table">
        <thead>
        <!-- <tr> 
            <th colspan="2"><select class="applicant_name form-control" id="applicant_name" name="" data-id='1'>
            </select></th>
            <th><select class="item2 form-control" name="item2" data-id='2'>
                    <option value="">select gender</option>
                    <option value="1">Male</option>
                    <option value="2">Female</option>
                    <option value="3">Other</option>
            </select></th>
            <th></th>
            <th></th>
            <th></th>
        </tr> -->
        <tr>
            <th><div class="checkbox"><label><input class="mainchk" type="checkbox" /><span class="checkbtn"></span></label></div></th>
            <th>Sr No.</th>
            <th>Applicant Name</th>
            <th>Gender</th>
            <th width="80px">Designation</th>
            <th>Email</th>
            <th>DOB</th>
            <th>Phone</th>
            <th>Created At</th>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script> 
    <script>
        if("{{Request::is('admin/clinician-approval')}}"){  
            var clinicianurl = "{{ url('admin/clinician-list/0') }}" ;
            var clinician_status = 0;
        } else if("{{Request::is('admin/clinician-active')}}"){
            var clinicianurl = "{{ url('admin/clinician-list/1') }}" ;
            var clinician_status = 1;
        } else if("{{Request::is('admin/clinician-rejected')}}") {
            var clinicianurl = "{{  url('admin/clinician-list/3') }}";
            var clinician_status = 3;
        }

        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $("#applicant_name").select2({
                ajax: { 
                    url: "{{ route('admin.clinician-data-get') }}",
                    type: "POST",
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                          searchTerm : params.term,
                          status : clinician_status
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

            $('.applicant_name').on('change', function () {
                table
                    .columns( $(this).attr('data-id'))
                    .search( this.value )
                    .draw();
            });

            $('.item2').select2({
                placeholder: "Select gender",
                allowClear: true,
                width : '15rem'
            });

            $('.item3').select2({
                placeholder: "Select status",
                allowClear: true,
                width : '15rem'
            });

            $('.item2').on('change', function () {
                table
                    .columns( $(this).attr('data-id'))
                    .search( this.value )
                    .draw();
            });
          
            $('.item3').on('change', function () {
                table
                    .columns( $(this).attr('data-id'))
                    .search( this.value )
                    .draw();
            });
        });

        var table = $('#clinician-table').DataTable({
            processing: true,
            "language": {
                processing: '<div id="loader-wrapper">  <div class="overlay"></div> <div class="pulse"></div></div>'
            },
            serverSide: true,
            ajax: clinicianurl,
            columns:[
                {data:'checkbox_id',"className": "text-center","bSortable": false, width:"5%"},
                {data: 'DT_RowIndex', orderable: false, searchable: false,"className": "text-center", width:"5%"},
                {
                    data:'first_name',
                    name:'first_name',
                    "bSortable": true,
                    render:function(data, type, row, meta){
                        data = "<a href={{ url('admin/clinician-detail/') }}/" + row.id + ">" + row.first_name+' '+row.last_name + "</a>";
                        return data;
                    },
                    width:"10%"
                },
                {
                    data:'gender',
                    name:'gender',
                    "bSortable": true,
                    render:function(data, type, row, meta){
                        if (data == 1) {
                            return 'Male';
                        } else if (data == 2) {
                            return 'Female';
                        } else if (data == 3) {
                            return 'Other';
                        } else if (data == 'MALE') {
                            return 'Male';
                        } else if (data == 'FEMALE') {
                            return 'Female';
                        }
                    } ,
                    width:"10%"
                },
                {
                    data:'designation_id',
                    name:'designation_id',
                    width:"10%"
                },
                {
                    data:'email',
                    name:'email',
                    width:"15%"
                },
               
                {
                    data:'dob',
                    name:'dob',
                    "bSortable": true,
                    width:"10%"
                },
                {
                    data:'phone',
                    name:'phone',
                    "bSortable": true,
                    width:"10%"
                },
                {
                    data:'created_at',
                    name:'created_at',
                    width:"10%"
                },
                {
                    data:'status',
                    name:'status',
                    width:"10%",
                    "bSortable": false
                    // "bSortable": true,
                    // render:function(data, type, row, meta){
                    //     if (data == 0) {
                    //         return 'Pending';
                    //     } else if (data == 1) {
                    //         return 'Active';
                    //     } else if (data == 2) {
                    //         return 'Inactive';
                    //     } else if (data == 3) {
                    //         return 'Reject';
                    //     }
                    // }
                },
                
            ],
            "order": [[ 1, "desc" ]],
            // 'columnDefs': [
            //     {
            //         'targets': 0,
            //         'checkboxes': {
            //             'selectRow': true
            //         }
            //     }
            // ],
            // 'select': {
            //     'style': 'multi'
            // },
        });

        table.on( 'draw', function () {
            $('.dataTables_wrapper .dataTables_paginate .paginate_button').addClass('custompagination');
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
