@extends('pages.layouts.app')
@section('title','Admin - Referral Profile')
@section('pageTitleSection')
    Referral Profile
@endsection
@section('content')
<div class="row">
    <div class="col-12 col-sm-4">
        <div class="app-card">
            <div class="user-photo">
                <div class="userContent">
                    <div>
                        <img src="{{asset('assets/img/user/01.png')}}" class="user_photo" alt=""
                            srcset="{{asset('assets/img/user/01.png')}}">
                    </div>
                    <div class="user-info">
                        <h1 class="title">{{$record->name}}</h1>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-end align-items-center">
                    @if($record->status == 'active')
                                <button type="button"
                                    class="btn btn-primary btn-blue shadow-sm btn--sm mr-2"
                                    data-toggle="tooltip" data-placement="left">Accepted
                                </button>
                                <button type="button" class="btn btn-danger shadow-sm btn--sm mr-2 rejectid"
                                    data-toggle="tooltip" data-placement="left"
                                    id="{{$record->id}}">Reject
                                </button>
                            @endif
                            @if($record->status == 'reject')
                            <button type="button"
                                class="btn btn-primary btn-green shadow-sm btn--sm mr-2 acceptid"
                                data-toggle="tooltip" data-placement="left" id="{{$record->id}}" >Accept
                            </button>
                            <button type="button" class="btn btn-danger shadow-sm btn--sm mr-2"
                                data-toggle="tooltip" data-placement="left">Rejected
                            </button>
                            @endif
                            @if($record->status == 'pending')
                                <button type="button"
                                class="btn btn-primary btn-green shadow-sm btn--sm mr-2 acceptid"
                                data-toggle="tooltip" data-placement="left" id="{{$record->id}}" >Accept
                                </button>
                                <button type="button" class="btn btn-danger shadow-sm btn--sm mr-2 rejectid"
                                data-toggle="tooltip" data-placement="left"
                                id="{{$record->id}}">Reject
                                </button>
                            @endif
                    <!--<button type="submit" class="btn btn-primary btn-sm btn-green mr-2"
                        name="save_next">Accept</button>
                    <button type="submit" class="btn btn-primary btn-sm btn-pink"
                        name="save_next">Reject</button>-->
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-8">
        <div class="row">
            <div class="col-12">
                <!-- Company Information Start Here -->
                <div class="app-card">
                    <div class="card-header pt-3 pb-3">
                        Company Information
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <ul class="form-data">
                                    <li>
                                        <label class="label">Referral Type:</label>
                                        <p class="t5">
                                            {{ $record->referral?$record->referral->name:'' }}
                                        </p>
                                    </li>
                                    <li>
                                        <label class="label">Company Name:</label>
                                        <p class="t5">{{$record->name}}</p>
                                    </li>
                                    <li>
                                        <label class="label">Phone No:</label>
                                        <p class="t5">{{$record->phone}} </p>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-12 col-sm-6">
                                <ul class="form-data">
                                    <li>
                                        <label class="label">Company Name:</label>
                                        <p class="t5">{{$record->name}}</p>
                                    </li>
                                    <li>
                                        <label class="label">Email:</label>
                                        <p class="t5"><a
                                                href="mailto:{{$record->email}}">{{$record->email}}</a>
                                        </p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Perfosnal Information End Here -->
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(".acceptid").click(function() {
            var company_id = $(this).attr('id');
            var status = "active";

            $.ajax({
                method: 'POST',
                url: '/admin/referral-status',
                data: {company_id, status},
                success: function( response ){
                    if(response.status == 1)
                        alert(response.message)
                    else
                        alert(response.message)
                    console.log( response );
                },
                error: function( e ) {
                    console.log(e);
                }
            });

        });

        $(".rejectid").click(function() {
            var company_id = $(this).attr('id');
            var status = "reject";
            //alert(company_id);
            $.ajax({
                method: 'POST',
                url: '/admin/referral-status',
                data: {company_id, status},
                success: function( response ){
                    if(response.status == 1)
                        alert(response.message)
                    else
                        alert(response.message)
                    console.log( response );
                },
                error: function( e ) {
                    console.log(e);
                }
            });

        });
    });
</script>
@stop
