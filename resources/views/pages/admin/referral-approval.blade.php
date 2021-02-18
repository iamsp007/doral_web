@extends('pages.layouts.app')
@section('title','Admin - Referrals')
@section('pageTitleSection')
    Admin - Refrrals
@endsection
@section('content')

        <table id="referral-table" class="display responsive nowrap" style="width:100%">
            <thead>
                <tr>
                    <th>
                        <input type="checkbox">
                    </th>
                    <th>Refferral Type</th>
                    <th>Company Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if(isset($record) && count($record) > 0)
                @foreach($record['companies'] as $raw)
                <tr>
                    <td><input type="checkbox"></td>
                    <td>
                        @if($raw['referal_id'] == 1)
                        Insurance
                        @elseif($raw['referal_id'] == 2)
                        Home Care
                        @elseif($raw['referal_id'] == 3)
                        Others
                        @endif
                    </td>
                    <td>{{$raw['name']}}</td>
                    <td>{{$raw['email']}}</td>
                    <td>
                        <div class="d-flex">
                            @if($raw['status'] == '1')
                            <button type="button"
                                class="btn btn-primary btn-blue shadow-sm btn--sm mr-2"
                                data-toggle="tooltip" data-placement="left">Accepted
                            </button>
                            <button type="button" class="btn btn-danger shadow-sm btn--sm mr-2 rejectid"
                                data-toggle="tooltip" data-placement="left"
                                id="{{$raw['id']}}">Reject
                            </button>
                            @endif
                            @if($raw['status'] == '3')
                                <button type="button"
                                class="btn btn-primary btn-green shadow-sm btn--sm mr-2 acceptid"
                                data-toggle="tooltip" data-placement="left" id="{{$raw['id']}}" >Accept
                                </button>
                                <button type="button" class="btn btn-danger shadow-sm btn--sm mr-2"
                                    data-toggle="tooltip" data-placement="left">Rejected
                                </button>
                            @endif
                            @if($raw['status'] == '0')
                                <button type="button"
                                class="btn btn-primary btn-green shadow-sm btn--sm mr-2 acceptid"
                                data-toggle="tooltip" data-placement="left" id="{{$raw['id']}}" >Accept
                                </button>
                                <button type="button" class="btn btn-danger shadow-sm btn--sm mr-2 rejectid"
                                data-toggle="tooltip" data-placement="left"
                                id="{{$raw['id']}}">Reject
                                </button>
                            @endif
                            <a href="{{ url('/admin/referral-profile/'.$raw['id']) }}" class="btn btn-info shadow-sm btn--sm mr-2" data-toggle="tooltip"
                                data-placement="left" title="View Profile">View
                                Profile</a>


                        </div>
                    </td>
                </tr>
                @endforeach
                @endif

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
    <script>

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

            });

            $(".rejectid").click(function() {
                $("#loader-wrapper").show();
                var company_id = $(this).attr('id');
                var status = "3";
                //alert(company_id);
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
        });

        if("{{Request::is('admin/referral-approval')}}"){
            var referralurl = '{{  route('admin.referral.approval.list') }}';
        } else if("{{Request::is('admin/referral-active')}}"){
            var referralurl = '{{  route('admin.referral.active.list') }}';
        } else if("{{Request::is('admin/referral-rejected')}}") {
            var referralurl = '{{  route('admin.referral.rejected.list') }}';
        }
        var table = $('#referral-table').DataTable({
            "processing": true,
            "language": {
                processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span> '
            },
            "serverSide": true,
            ajax: referralurl,
            columns:[
                {data:'id',name:'id'},
                // {data:'id',name:'id'},
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
                {data: 'action',name: 'action'}
            ],
            // "order": [[ 1, "desc" ]],
            // "pageLength": 5,
            // "lengthMenu": [ [5, 10,20, 25,100, -1], [5, 10,20, 25,100, "All"] ],
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
