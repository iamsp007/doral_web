@extends('pages.layouts.app')
@if(Request::is('admin/referral-approval'))
   @php $title =  'Pending Referral'; @endphp
@elseif(Request::is('admin/referral-active'))
   @php $title =  'Active Referral'; @endphp
@elseif(Request::is('admin/referral-rejected'))
   @php $title =  'Reject Referral'; @endphp
@endif
@section('title',$title)
@section('pageTitleSection')
{{ $title }}
@endsection
@section('content')
    <table id="referral-table" class="display responsive nowrap" style="width:100%">
        <thead>
            <tr> 
                <th colspan="2"><select class="item1 form-control" id="item1" name="item1" data-id='2'>
                </select></th>
                <th><select class="item2 form-control" name="item2" data-id='3'>
                </select></th>
                <th></th>
                <th></th>
            </tr>
            <tr>
                <th><input value="1" type="checkbox"></th>
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
    if("{{Request::is('admin/referral-approval')}}"){
        var referralurl = '{{  route('admin.referral.approval.list') }}';
        var referral_type = 1;
    } else if("{{Request::is('admin/referral-active')}}"){
        var referralurl = '{{  route('admin.referral.active.list') }}';
        var referral_type = 2;
    } else if("{{Request::is('admin/referral-rejected')}}") {
        var referralurl = '{{  route('admin.referral.rejected.list') }}';
        var referral_type = 3;
    }

    $(document).ready(function () {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(".acceptid").click(function() {
            $("#loader-wrapper").show();
            var company_id = $(this).attr('id');
            var status = "1";
            $.ajax({
                method: 'POST',
                url: "{{ route('admin.updateStatus') }}",
                data: {company_id, status},
                success: function( response ){
                    $("#loader-wrapper").hide();
                    if(response.status == 1) {
                        $(".alert-success").show();
                        $(".alert-danger").hide();
                        $("#successResponse").text(response.message);
                        setTimeout(function(){
                            window.location.reload();
                        }, 1000);
                    }
                    else {
                        $(".alert-danger").show();
                        $(".alert-success").hide();
                        $("#errorResponse").text(response.message);
                        setTimeout(function(){
                            window.location.reload();
                        }, 1000);
                    }
                   
                },
                error: function( e ) {
                    $("#loader-wrapper").hide();
                    alert('Something went wrong!');
                }
            });
        });
        
        table.on( 'draw', function () {
            $('.dataTables_wrapper .dataTables_paginate .paginate_button').addClass('custompagination');
        });

        $(".rejectid").click(function() {
            $("#loader-wrapper").show();
            var company_id = $(this).attr('id');
            var status = "3";

            $.ajax({
                method: 'POST',
                url: '{{ route("admin.updateStatus") }}',
                data: {company_id, status},
                success: function( response ){
                    $("#loader-wrapper").hide();
                    if(response.status == 1) {
                        $(".alert-success").show();
                        $(".alert-danger").hide();
                        $("#successResponse").text(response.message);
                        setTimeout(function(){
                            $(".alert-success").hide();
                            window.location.reload();
                        }, 1000);
                    }
                    else {
                        $(".alert-danger").show();
                        $(".alert-success").hide();
                        $("#errorResponse").text(response.message);
                        setTimeout(function(){
                            $(".alert-danger").hide();
                            window.location.reload();
                        }, 1000);
                    }
                },
                error: function( e ) {
                    $("#loader-wrapper").hide();
                    alert('error');
                }
            });

        });

        $(".item1").select2({
            ajax: { 
                url: '{{ route('admin.referral.data') }}',
                type: "POST",
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                      searchTerm : params.term,
                      type :  referral_type,
                      searchField : 'name'
                    };
                },
                processResults: function (data) {
                    var data_array = [];
                    data.data.forEach(function(value,key){
                        data_array.push({id:value.name,text:value.name})
                    });
                    return {
                        results: data_array
                    };
                },
            },
            placeholder: "Search company name",
            allowClear: true,
            width : '15rem'
        });

        $(".item2").select2({
            ajax: { 
                url: '{{ route('admin.referral.data') }}',
                type: "POST",
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                      searchTerm : params.term,
                      type :  referral_type,
                      searchField : 'email'
                    };
                },
                processResults: function (data) {
                    var data_array = [];
                    data.data.forEach(function(value,key){
                        data_array.push({id:value.email,text:value.email})
                    });
                    return {
                        results: data_array
                    };
                },
            },
            placeholder: "Search email",
            allowClear: true,
            width : '15rem'
        });

        $('.item1').on('change', function () {
            table
                .columns( $(this).attr('data-id'))
                .search( this.value )
                .draw();
        });

        $('.item2').on('change', function () {
            table
                .columns( $(this).attr('data-id'))
                .search( this.value )
                .draw();
        });

    });

    
    var table = $('#referral-table').DataTable({
        "processing": true,
        "language": {
            processing: '<div id="loader-wrapper">  <div class="overlay"></div> <div class="pulse"></div></div>'
        },
        "serverSide": true,
        ajax: referralurl,
        columns:[
            {data:'id',name:'id',"bSortable": false},
            {
                data:'referal_id',
                name:'referal_id',
                "bSortable": true,
            },
           {data:'name',name:'name',"bSortable": true,

                render:function(data, type, row, meta){
                    data = "<a href={{ url('/admin/referral-profile/') }}/" + row.id + ">" + row.name+"</a>";
                    return data;
                }
           
            },
            {
                data:'email',
                name:'email',
                "bSortable": true
            },
            {data: 'action',name: 'action',"bSortable": false}
        ],
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

    function changeReferralStatus(id,status) {
        $("#loader-wrapper").show();
        var company_id = id;
        var status = status;
        $.ajax({
            method: 'POST',
            url: '{{ route('admin.updateStatus') }}',
            data: {company_id, status},
            success: function( response ){
                $("#loader-wrapper").hide();
                if(response.status == 1) {
                    $(".alert-success").show();
                    $(".alert-danger").hide();
                    $("#successResponse").text(response.message);
                    setTimeout(function(){
                        window.location.reload();
                    }, 1000);
                }
                else {
                    $(".alert-danger").show();
                    $(".alert-success").hide();
                    $("#errorResponse").text(response.message);
                    setTimeout(function(){
                        window.location.reload();
                    }, 1000);
                }
               
            },
            error: function( e ) {
                $("#loader-wrapper").hide();
                alert('Something went wrong!');
            }
        });
    }

</script>
@endpush
