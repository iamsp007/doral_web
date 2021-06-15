@extends('pages.layouts.app')
@section('title','Admin - Referrals')
@section('pageTitleSection')
    @if($status === 'pending')
        Pending Referral
    @elseif($status === 'active')
        Active Referral
    @elseif($status === 'rejected')
        Rejected Referral
    @endif
@endsection
@section('content')
    <div class="button-control mt-4 mb-4" id="acceptRejectBtn" style="display: none;">
        @include('admin.common.accept_reject_button')
    </div>

    @include('admin.referral.search')

    <table id="referral-table" class="display responsive nowrap" style="width:100%">
        <input type="hidden" value="{{ ($status) ? $status : '' }}" id="status" name="status" />
        <thead>
            <tr>
                <th><div class="checkbox"><label><input class="mainchk" type="checkbox" /><span class="checkbtn"></span></label></div></th>
                <th>Referral Type</th>
                <th>Company Name</th>
                <th>Email</th>
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
    $('#referral-table').DataTable({
        "processing": true,
        "serverSide": true,
        "language": {
            processing: '<div id="loader-wrapper"><div class="overlay"></div><div class="pulse"></div></div>'
        },
        ajax: {
            'type': 'POST',
            'url': "{{ route('admin.referral.approval.list') }}",
            'headers': {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            data: function (d) {
                d.status = $('input[name="status"]').val();
                d.company_id = $('select[name="company_id"]').val();
                d.referal_id = $('select[name="referal_id"]').val();
                d.email = $('input[name="email"]').val();
            },
            'headers': {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        },
        columns:[
            {data:'checkbox_id',"className": "text-center","bSortable": false},
            {data:'referal_id', "bSortable": true},
            {data:'name',"bSortable": true},
            {data:'email',"bSortable": true},
            {data: 'action',name: 'action',"bSortable": false}
        ],

        "lengthMenu": [ [10, 20, 50, 100, -1], [10, 20, 50, 100, "All"] ],
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

    $('body').on('click', '.update-status', function (e) {
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

    $('#company_id').select2();

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

    function postdataforaction(status, val) {

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
                    'url': '{{ route("admin.updateStatus") }}',
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
            }
        });
    }

    function refresh() {
        $("#referral-table").DataTable().ajax.reload(null, false);
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
