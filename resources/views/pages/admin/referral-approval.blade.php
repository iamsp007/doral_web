@extends('layouts.admin.default')
@section('content')
<div class="app-roles">
    <div class="pt-2">
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
                    <td>{{$raw['referal_id']}}</td>
                    <td>{{$raw['name']}}</td>
                    <td>{{$raw['email']}}</td>
                    <td>
                        <div class="d-flex">
                            <button type="button"
                                class="btn btn-primary btn-green shadow-sm btn--sm mr-2 acceptid"
                                data-toggle="tooltip" data-placement="left" title="View User" id="{{$raw['id']}}" >Accept</button>
                            <button type="button" class="btn btn-danger shadow-sm btn--sm mr-2 rejectid"
                                data-toggle="tooltip" data-placement="left"
                                title="Edit User" id="{{$raw['id']}}">Reject</button>
                            <a href="/admin/referral-profile" 
                                class="btn btn-info shadow-sm btn--sm mr-2" data-toggle="tooltip"
                                data-placement="left" title="Edit User">View
                                Profile</a>
                        </div>
                    </td>
                </tr>
                @endforeach
                @endif
                <!--<tr>
                    <td><input type="checkbox"></td>
                    <td>Home Care</td>
                    <td>Doral Pvt Ltd</td>
                    <td>example@example.com</td>
                    <td>
                        <div class="d-flex">
                            <a href="javascript:void(0)"
                                class="btn btn-primary btn-green shadow-sm btn--sm mr-2"
                                data-toggle="tooltip" data-placement="left" title="View User">Accept</a>
                            <button type="button" class="btn btn-danger shadow-sm btn--sm mr-2"
                                data-toggle="tooltip" data-placement="left"
                                title="Edit User">Reject</button>
                            <a href="referral_user_profile.html"
                                class="btn btn-info shadow-sm btn--sm mr-2" data-toggle="tooltip"
                                data-placement="left" title="Edit User">View
                                Profile</a>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><input type="checkbox"></td>
                    <td>Ohters</td>
                    <td>Doral LLC</td>
                    <td>example@example.com</td>
                    <td>
                        <div class="d-flex">
                            <a href="javascript:void(0)"
                                class="btn btn-primary btn-green shadow-sm btn--sm mr-2"
                                data-toggle="tooltip" data-placement="left" title="View User">Accept</a>
                            <button type="button" class="btn btn-danger shadow-sm btn--sm mr-2"
                                data-toggle="tooltip" data-placement="left"
                                title="Edit User">Reject</button>
                            <a href="referral_user_profile.html"
                                class="btn btn-info shadow-sm btn--sm mr-2" data-toggle="tooltip"
                                data-placement="left" title="Edit User">View
                                Profile</a>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><input type="checkbox"></td>
                    <td>Insurance</td>
                    <td>Doral Corporation</td>
                    <td>example@example.com</td>
                    <td>
                        <div class="d-flex">
                            <a href="javascript:void(0)"
                                class="btn btn-primary btn-green shadow-sm btn--sm mr-2"
                                data-toggle="tooltip" data-placement="left" title="View User">Accept</a>
                            <button type="button" class="btn btn-danger shadow-sm btn--sm mr-2"
                                data-toggle="tooltip" data-placement="left"
                                title="Edit User">Reject</button>
                            <a href="referral_user_profile.html"
                                class="btn btn-info shadow-sm btn--sm mr-2" data-toggle="tooltip"
                                data-placement="left" title="Edit User">View
                                Profile</a>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><input type="checkbox"></td>
                    <td>Home Care</td>
                    <td>Doral Pvt Ltd</td>
                    <td>example@example.com</td>
                    <td>
                        <div class="d-flex">
                            <a href="javascript:void(0)"
                                class="btn btn-primary btn-green shadow-sm btn--sm mr-2"
                                data-toggle="tooltip" data-placement="left" title="View User">Accept</a>
                            <button type="button" class="btn btn-danger shadow-sm btn--sm mr-2"
                                data-toggle="tooltip" data-placement="left"
                                title="Edit User">Reject</button>
                            <a href="referral_user_profile.html"
                                class="btn btn-info shadow-sm btn--sm mr-2" data-toggle="tooltip"
                                data-placement="left" title="Edit User">View
                                Profile</a>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><input type="checkbox"></td>
                    <td>Ohters</td>
                    <td>Doral LLC</td>
                    <td>example@example.com</td>
                    <td>
                        <div class="d-flex">
                            <a href="javascript:void(0)"
                                class="btn btn-primary btn-green shadow-sm btn--sm mr-2"
                                data-toggle="tooltip" data-placement="left" title="View User">Accept</a>
                            <button type="button" class="btn btn-danger shadow-sm btn--sm mr-2"
                                data-toggle="tooltip" data-placement="left"
                                title="Edit User">Reject</button>
                            <a href="referral_user_profile.html"
                                class="btn btn-info shadow-sm btn--sm mr-2" data-toggle="tooltip"
                                data-placement="left" title="Edit User">View
                                Profile</a>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><input type="checkbox"></td>
                    <td>Insurance</td>
                    <td>Doral Corporation</td>
                    <td>example@example.com</td>
                    <td>
                        <div class="d-flex">
                            <a href="javascript:void(0)"
                                class="btn btn-primary btn-green shadow-sm btn--sm mr-2"
                                data-toggle="tooltip" data-placement="left" title="View User">Accept</a>
                            <button type="button" class="btn btn-danger shadow-sm btn--sm mr-2"
                                data-toggle="tooltip" data-placement="left"
                                title="Edit User">Reject</button>
                            <a href="referral_user_profile.html"
                                class="btn btn-info shadow-sm btn--sm mr-2" data-toggle="tooltip"
                                data-placement="left" title="Edit User">View
                                Profile</a>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><input type="checkbox"></td>
                    <td>Home Care</td>
                    <td>Doral Pvt Ltd</td>
                    <td>example@example.com</td>
                    <td>
                        <div class="d-flex">
                            <a href="javascript:void(0)"
                                class="btn btn-primary btn-green shadow-sm btn--sm mr-2"
                                data-toggle="tooltip" data-placement="left" title="View User">Accept</a>
                            <button type="button" class="btn btn-danger shadow-sm btn--sm mr-2"
                                data-toggle="tooltip" data-placement="left"
                                title="Edit User">Reject</button>
                            <a href="referral_user_profile.html"
                                class="btn btn-info shadow-sm btn--sm mr-2" data-toggle="tooltip"
                                data-placement="left" title="Edit User">View
                                Profile</a>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><input type="checkbox"></td>
                    <td>Ohters</td>
                    <td>Doral LLC</td>
                    <td>example@example.com</td>
                    <td>
                        <div class="d-flex">
                            <a href="javascript:void(0)"
                                class="btn btn-primary btn-green shadow-sm btn--sm mr-2"
                                data-toggle="tooltip" data-placement="left" title="View User">Accept</a>
                            <button type="button" class="btn btn-danger shadow-sm btn--sm mr-2"
                                data-toggle="tooltip" data-placement="left"
                                title="Edit User">Reject</button>
                            <a href="referral_user_profile.html"
                                class="btn btn-info shadow-sm btn--sm mr-2" data-toggle="tooltip"
                                data-placement="left" title="Edit User">View
                                Profile</a>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><input type="checkbox"></td>
                    <td>Insurance</td>
                    <td>Doral Corporation</td>
                    <td>example@example.com</td>
                    <td>
                        <div class="d-flex">
                            <a href="javascript:void(0)"
                                class="btn btn-primary btn-green shadow-sm btn--sm mr-2"
                                data-toggle="tooltip" data-placement="left" title="View User">Accept</a>
                            <button type="button" class="btn btn-danger shadow-sm btn--sm mr-2"
                                data-toggle="tooltip" data-placement="left"
                                title="Edit User">Reject</button>
                            <a href="referral_user_profile.html"
                                class="btn btn-info shadow-sm btn--sm mr-2" data-toggle="tooltip"
                                data-placement="left" title="Edit User">View
                                Profile</a>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><input type="checkbox"></td>
                    <td>Home Care</td>
                    <td>Doral Pvt Ltd</td>
                    <td>example@example.com</td>
                    <td>
                        <div class="d-flex">
                            <a href="javascript:void(0)"
                                class="btn btn-primary btn-green shadow-sm btn--sm mr-2"
                                data-toggle="tooltip" data-placement="left" title="View User">Accept</a>
                            <button type="button" class="btn btn-danger shadow-sm btn--sm mr-2"
                                data-toggle="tooltip" data-placement="left"
                                title="Edit User">Reject</button>
                            <a href="referral_user_profile.html"
                                class="btn btn-info shadow-sm btn--sm mr-2" data-toggle="tooltip"
                                data-placement="left" title="Edit User">View
                                Profile</a>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><input type="checkbox"></td>
                    <td>Ohters</td>
                    <td>Doral LLC</td>
                    <td>example@example.com</td>
                    <td>
                        <div class="d-flex">
                            <a href="javascript:void(0)"
                                class="btn btn-primary btn-green shadow-sm btn--sm mr-2"
                                data-toggle="tooltip" data-placement="left" title="View User">Accept</a>
                            <button type="button" class="btn btn-danger shadow-sm btn--sm mr-2"
                                data-toggle="tooltip" data-placement="left"
                                title="Edit User">Reject</button>
                            <a href="referral_user_profile.html"
                                class="btn btn-info shadow-sm btn--sm mr-2" data-toggle="tooltip"
                                data-placement="left" title="Edit User">View
                                Profile</a>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><input type="checkbox"></td>
                    <td>Insurance</td>
                    <td>Doral Corporation</td>
                    <td>example@example.com</td>
                    <td>
                        <div class="d-flex">
                            <a href="javascript:void(0)"
                                class="btn btn-primary btn-green shadow-sm btn--sm mr-2"
                                data-toggle="tooltip" data-placement="left" title="View User">Accept</a>
                            <button type="button" class="btn btn-danger shadow-sm btn--sm mr-2"
                                data-toggle="tooltip" data-placement="left"
                                title="Edit User">Reject</button>
                            <a href="referral_user_profile.html"
                                class="btn btn-info shadow-sm btn--sm mr-2" data-toggle="tooltip"
                                data-placement="left" title="Edit User">View
                                Profile</a>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><input type="checkbox"></td>
                    <td>Home Care</td>
                    <td>Doral Pvt Ltd</td>
                    <td>example@example.com</td>
                    <td>
                        <div class="d-flex">
                            <a href="javascript:void(0)"
                                class="btn btn-primary btn-green shadow-sm btn--sm mr-2"
                                data-toggle="tooltip" data-placement="left" title="View User">Accept</a>
                            <button type="button" class="btn btn-danger shadow-sm btn--sm mr-2"
                                data-toggle="tooltip" data-placement="left"
                                title="Edit User">Reject</button>
                            <a href="referral_user_profile.html"
                                class="btn btn-info shadow-sm btn--sm mr-2" data-toggle="tooltip"
                                data-placement="left" title="Edit User">View
                                Profile</a>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><input type="checkbox"></td>
                    <td>Ohters</td>
                    <td>Doral LLC</td>
                    <td>example@example.com</td>
                    <td>
                        <div class="d-flex">
                            <a href="javascript:void(0)"
                                class="btn btn-primary btn-green shadow-sm btn--sm mr-2"
                                data-toggle="tooltip" data-placement="left" title="View User">Accept</a>
                            <button type="button" class="btn btn-danger shadow-sm btn--sm mr-2"
                                data-toggle="tooltip" data-placement="left"
                                title="Edit User">Reject</button>
                            <a href="referral_user_profile.html"
                                class="btn btn-info shadow-sm btn--sm mr-2" data-toggle="tooltip"
                                data-placement="left" title="Edit User">View
                                Profile</a>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><input type="checkbox"></td>
                    <td>Insurance</td>
                    <td>Doral Corporation</td>
                    <td>example@example.com</td>
                    <td>
                        <div class="d-flex">
                            <a href="javascript:void(0)"
                                class="btn btn-primary btn-green shadow-sm btn--sm mr-2"
                                data-toggle="tooltip" data-placement="left" title="View User">Accept</a>
                            <button type="button" class="btn btn-danger shadow-sm btn--sm mr-2"
                                data-toggle="tooltip" data-placement="left"
                                title="Edit User">Reject</button>
                            <a href="referral_user_profile.html"
                                class="btn btn-info shadow-sm btn--sm mr-2" data-toggle="tooltip"
                                data-placement="left" title="Edit User">View
                                Profile</a>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><input type="checkbox"></td>
                    <td>Home Care</td>
                    <td>Doral Pvt Ltd</td>
                    <td>example@example.com</td>
                    <td>
                        <div class="d-flex">
                            <a href="javascript:void(0)"
                                class="btn btn-primary btn-green shadow-sm btn--sm mr-2"
                                data-toggle="tooltip" data-placement="left" title="View User">Accept</a>
                            <button type="button" class="btn btn-danger shadow-sm btn--sm mr-2"
                                data-toggle="tooltip" data-placement="left"
                                title="Edit User">Reject</button>
                            <a href="referral_user_profile.html"
                                class="btn btn-info shadow-sm btn--sm mr-2" data-toggle="tooltip"
                                data-placement="left" title="Edit User">View
                                Profile</a>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><input type="checkbox"></td>
                    <td>Ohters</td>
                    <td>Doral LLC</td>
                    <td>example@example.com</td>
                    <td>
                        <div class="d-flex">
                            <a href="javascript:void(0)"
                                class="btn btn-primary btn-green shadow-sm btn--sm mr-2"
                                data-toggle="tooltip" data-placement="left" title="View User">Accept</a>
                            <button type="button" class="btn btn-danger shadow-sm btn--sm mr-2"
                                data-toggle="tooltip" data-placement="left"
                                title="Edit User">Reject</button>
                            <a href="referral_user_profile.html"
                                class="btn btn-info shadow-sm btn--sm mr-2" data-toggle="tooltip"
                                data-placement="left" title="Edit User">View
                                Profile</a>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><input type="checkbox"></td>
                    <td>Insurance</td>
                    <td>Doral Corporation</td>
                    <td>example@example.com</td>
                    <td>
                        <div class="d-flex">
                            <a href="javascript:void(0)"
                                class="btn btn-primary btn-green shadow-sm btn--sm mr-2"
                                data-toggle="tooltip" data-placement="left" title="View User">Accept</a>
                            <button type="button" class="btn btn-danger shadow-sm btn--sm mr-2"
                                data-toggle="tooltip" data-placement="left"
                                title="Edit User">Reject</button>
                            <a href="referral_user_profile.html"
                                class="btn btn-info shadow-sm btn--sm mr-2" data-toggle="tooltip"
                                data-placement="left" title="Edit User">View
                                Profile</a>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><input type="checkbox"></td>
                    <td>Home Care</td>
                    <td>Doral Pvt Ltd</td>
                    <td>example@example.com</td>
                    <td>
                        <div class="d-flex">
                            <a href="javascript:void(0)"
                                class="btn btn-primary btn-green shadow-sm btn--sm mr-2"
                                data-toggle="tooltip" data-placement="left" title="View User">Accept</a>
                            <button type="button" class="btn btn-danger shadow-sm btn--sm mr-2"
                                data-toggle="tooltip" data-placement="left"
                                title="Edit User">Reject</button>
                            <a href="referral_user_profile.html"
                                class="btn btn-info shadow-sm btn--sm mr-2" data-toggle="tooltip"
                                data-placement="left" title="Edit User">View
                                Profile</a>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><input type="checkbox"></td>
                    <td>Ohters</td>
                    <td>Doral LLC</td>
                    <td>example@example.com</td>
                    <td>
                        <div class="d-flex">
                            <a href="javascript:void(0)"
                                class="btn btn-primary btn-green shadow-sm btn--sm mr-2"
                                data-toggle="tooltip" data-placement="left" title="View User">Accept</a>
                            <button type="button" class="btn btn-danger shadow-sm btn--sm mr-2"
                                data-toggle="tooltip" data-placement="left"
                                title="Edit User">Reject</button>
                            <a href="referral_user_profile.html"
                                class="btn btn-info shadow-sm btn--sm mr-2" data-toggle="tooltip"
                                data-placement="left" title="Edit User">View
                                Profile</a>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><input type="checkbox"></td>
                    <td>Insurance</td>
                    <td>Doral Corporation</td>
                    <td>example@example.com</td>
                    <td>
                        <div class="d-flex">
                            <a href="javascript:void(0)"
                                class="btn btn-primary btn-green shadow-sm btn--sm mr-2"
                                data-toggle="tooltip" data-placement="left" title="View User">Accept</a>
                            <button type="button" class="btn btn-danger shadow-sm btn--sm mr-2"
                                data-toggle="tooltip" data-placement="left"
                                title="Edit User">Reject</button>
                            <a href="referral_user_profile.html"
                                class="btn btn-info shadow-sm btn--sm mr-2" data-toggle="tooltip"
                                data-placement="left" title="Edit User">View
                                Profile</a>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><input type="checkbox"></td>
                    <td>Home Care</td>
                    <td>Doral Pvt Ltd</td>
                    <td>example@example.com</td>
                    <td>
                        <div class="d-flex">
                            <a href="javascript:void(0)"
                                class="btn btn-primary btn-green shadow-sm btn--sm mr-2"
                                data-toggle="tooltip" data-placement="left" title="View User">Accept</a>
                            <button type="button" class="btn btn-danger shadow-sm btn--sm mr-2"
                                data-toggle="tooltip" data-placement="left"
                                title="Edit User">Reject</button>
                            <a href="referral_user_profile.html"
                                class="btn btn-info shadow-sm btn--sm mr-2" data-toggle="tooltip"
                                data-placement="left" title="Edit User">View
                                Profile</a>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><input type="checkbox"></td>
                    <td>Ohters</td>
                    <td>Doral LLC</td>
                    <td>example@example.com</td>
                    <td>
                        <div class="d-flex">
                            <a href="javascript:void(0)"
                                class="btn btn-primary btn-green shadow-sm btn--sm mr-2"
                                data-toggle="tooltip" data-placement="left" title="View User">Accept</a>
                            <button type="button" class="btn btn-danger shadow-sm btn--sm mr-2"
                                data-toggle="tooltip" data-placement="left"
                                title="Edit User">Reject</button>
                            <a href="referral_user_profile.html"
                                class="btn btn-info shadow-sm btn--sm mr-2" data-toggle="tooltip"
                                data-placement="left" title="Edit User">View
                                Profile</a>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><input type="checkbox"></td>
                    <td>Insurance</td>
                    <td>Doral Corporation</td>
                    <td>example@example.com</td>
                    <td>
                        <div class="d-flex">
                            <a href="javascript:void(0)"
                                class="btn btn-primary btn-green shadow-sm btn--sm mr-2"
                                data-toggle="tooltip" data-placement="left" title="View User">Accept</a>
                            <button type="button" class="btn btn-danger shadow-sm btn--sm mr-2"
                                data-toggle="tooltip" data-placement="left"
                                title="Edit User">Reject</button>
                            <a href="referral_user_profile.html"
                                class="btn btn-info shadow-sm btn--sm mr-2" data-toggle="tooltip"
                                data-placement="left" title="Edit User">View
                                Profile</a>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><input type="checkbox"></td>
                    <td>Home Care</td>
                    <td>Doral Pvt Ltd</td>
                    <td>example@example.com</td>
                    <td>
                        <div class="d-flex">
                            <a href="javascript:void(0)"
                                class="btn btn-primary btn-green shadow-sm btn--sm mr-2"
                                data-toggle="tooltip" data-placement="left" title="View User">Accept</a>
                            <button type="button" class="btn btn-danger shadow-sm btn--sm mr-2"
                                data-toggle="tooltip" data-placement="left"
                                title="Edit User">Reject</button>
                            <a href="referral_user_profile.html"
                                class="btn btn-info shadow-sm btn--sm mr-2" data-toggle="tooltip"
                                data-placement="left" title="Edit User">View
                                Profile</a>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><input type="checkbox"></td>
                    <td>Ohters</td>
                    <td>Doral LLC</td>
                    <td>example@example.com</td>
                    <td>
                        <div class="d-flex">
                            <a href="javascript:void(0)"
                                class="btn btn-primary btn-green shadow-sm btn--sm mr-2"
                                data-toggle="tooltip" data-placement="left" title="View User">Accept</a>
                            <button type="button" class="btn btn-danger shadow-sm btn--sm mr-2"
                                data-toggle="tooltip" data-placement="left"
                                title="Edit User">Reject</button>
                            <a href="referral_user_profile.html"
                                class="btn btn-info shadow-sm btn--sm mr-2" data-toggle="tooltip"
                                data-placement="left" title="Edit User">View
                                Profile</a>
                        </div>
                    </td>
                </tr>-->
            </tbody>
        </table>
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

        /*$(".profile").click(function() {
            var company_id = $(this).attr('id'); 

            $.ajax({
                method: 'POST',
                url: '/admin/referral-profile',
                data: {company_id},
                success: function( response ){
                    console.log( response );
                },
                error: function( e ) {
                    console.log(e);
                }
            });
            
        });*/

    });
</script> 
@stop