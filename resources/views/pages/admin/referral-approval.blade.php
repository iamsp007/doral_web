@extends('pages.layouts.app')
@section('title','Admin - Referrals')
@section('pageTitleSection')
    Admin - Refrrals
@endsection
@section('content')
<div class="app-roles">
    <div class="pt-2">
        <div class="alert alert-success alert-dismissible fade show mt-4" role="alert" style="display: none">
            <strong>Success!</strong> <span id="successResponse"></span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert" style="display: none">
            <strong>Error!</strong> <span id="errorResponse"></span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
        </div>
        <table id="employee-table" class="table">
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
    </div>
</div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(".acceptid").click(function() {

                var company_id = $(this).attr('id');
                var status = "1";
                $.ajax({
                    method: 'POST',
                    url: '{{ route('admin.updateStatus') }}',
                    data: {company_id, status},
                    success: function( response ){
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
                        console.log( response );
                    },
                    error: function( e ) {
                        console.log(e);
                    }
                });

            });

            $(".rejectid").click(function() {
                var company_id = $(this).attr('id');
                var status = "3";
                //alert(company_id);
                $.ajax({
                    method: 'POST',
                    url: '{{ route("admin.updateStatus") }}',
                    data: {company_id, status},
                    success: function( response ){
                        if(response.status == 1) {
                            $(".alert-success").show();
                            $(".alert-danger").hide();
                            $("#successResponse").text(response.message);
                            setTimeout(function(){
                                $(".alert-success").hide();
                            }, 1000);
                        }
                        else {
                            $(".alert-danger").show();
                            $(".alert-success").hide();
                            $("#errorResponse").text(response.message);
                            setTimeout(function(){
                                $(".alert-danger").hide();
                            }, 1000);
                        }
                        console.log( response );
                    },
                    error: function( e ) {
                        console.log(e);
                    }
                });

            });
        });
    </script>
@endpush
