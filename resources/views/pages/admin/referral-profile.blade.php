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
                                    class="btn btn-primary btn-pink mr-2"
                                    data-toggle="tooltip" data-placement="left">Accepted
                                </button>
                                <button type="button" class="btn btn-primary btn-pink mr-2 rejectid"
                                    data-toggle="tooltip" data-placement="left"
                                    id="{{$record->id}}">Reject
                                </button>
                            @endif
                            @if($record->status == 'reject')
                            <button type="button"
                                class="btn btn-primary btn-pink mr-2 acceptid"
                                data-toggle="tooltip" data-placement="left" id="{{$record->id}}" >Accept
                            </button>
                            <button type="button" class="btn btn-primary btn-pink mr-2"
                                data-toggle="tooltip" data-placement="left">Rejected
                            </button>
                            @endif
                            @if($record->status == 'pending')
                                <button type="button"
                                class="btn btn-primary btn-pink mr-2 acceptid"
                                data-toggle="tooltip" data-placement="left" id="{{$record->id}}" >Accept
                                </button>
                                <button type="button" class="btn btn-primary btn-pink mr-2 rejectid"
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
                                <div class="app-card" id="CompanyInfo">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <h1>Company Information</h1>
                                        <div>
                                            <img src="{{ asset('assets/img/icons/edit-field.svg') }}" data-toggle="tooltip"
                                                data-placement="bottom" title="Edit" class="cursor-pointer edit-icon"
                                                alt="" onclick="editAllField('CompanyInfo')" id="editCompany">
                                            <img src="{{ asset('assets/img/icons/update-icon.svg') }}" data-toggle="tooltip"
                                                data-placement="bottom" title="Update"
                                                class="cursor-pointer update-icon" alt=""
                                                onclick="updateAllField('CompanyInfo')" id="upateCompany">
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12 col-sm-6">
                                                <ul class="form-data">
                                                    <li>
                                                        <label class="label">Name Of Company:</label>
                                                        <!-- <p class="t5">Doral Corporation</p> -->
                                                        <input type="text" class="form-control-plaintext _detail t5"
                                                            readonly name="name_company"
                                                            onclick="editableField('name_company')"
                                                            data-id="name_company" id="name_company"
                                                            placeholder="Name Of Company" value="{{ $record->name?$record->name:'' }}">
                                                    </li>
                                                    <li>
                                                        <label class="label">Addresss:</label>
                                                        <!-- <p class="t5">Doral Corporation</p> -->
                                                        <input type="text" class="form-control-plaintext _detail t5"
                                                            readonly name="addresss" onclick="editableField('addresss')"
                                                            data-id="addresss" id="addresss" placeholder="addresss"
                                                            value="{{ $record->address1 ? $record->address1:'' }} ">
                                                    </li>
                                                    <li>
                                                        <label class="label">Phone Number:</label>
                                                        <!-- <p class="t5">Doral Corporation</p> -->
                                                        <input type="text" class="form-control-plaintext _detail t5"
                                                            readonly name="phone_no" onclick="editableField('phone_no')"
                                                            data-id="phone_no" id="phone_no" placeholder="Phone Number"
                                                            value="{{ $record->phone?$record->phone:'' }}">
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-12 col-sm-6">
                                                <ul class="form-data">
                                                    <li>
                                                        <label class="label">Type of Services:</label>
                                                         <div class="row mt-3">
                                                        @if(isset($services)&&!empty($services))
                                                            @foreach($services as $s_row)
                                                                <div class="col-12 col-sm-3">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input"
                                                                            id="customCheck{{$s_row['id']}}" name="services[]" value="{{$s_row['id']}}"<?php if (in_array($s_row['id'],explode(',',($record->services)? $record->services :''))){ echo "checked";}?>>
                                                                        <label class="custom-control-label t5"
                                                                            for="customCheck{{$s_row['id']}}">{{$s_row['name']}}</label>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                            @endif
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <label class="label">Email:</label>
                                                        <input type="text" class="form-control-plaintext _detail t5"
                                                            readonly name="emailId" onclick="editableField('emailId')"
                                                            data-id="emailId" id="emailId"
                                                            placeholder="example@example.com"
                                                            value="{{ $record->email?$record->email:'' }}">
                                                    </li>
                                                    <li>
                                                        <label class="label">Fax Number:</label>
                                                        <input type="text" class="form-control-plaintext _detail t5"
                                                            readonly name="fax_no" onclick="editableField('fax_no')"
                                                            data-id="fax_no" id="fax_no" placeholder="Fax Number"
                                                            value="{{ $record->fax_no?$record->fax_no:'' }}"">
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Company Information End Here -->
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12">
                                <!-- Administrator Information Start Here -->
                                <div class="app-card" id="AdministratorInfo">
                                    <div
                                        class="card-header pt-2 pb-2 d-flex justify-content-between align-items-center">
                                        <h1>Administrator Information</h1>
                                        <img src="{{ asset('assets/img/icons/edit-field.svg') }}" data-toggle="tooltip"
                                            data-placement="bottom" title="Edit" class="cursor-pointer edit-icon" alt=""
                                            onclick="editAllField('AdministratorInfo')">
                                        <img src="{{ asset('assets/img/icons/update-icon.svg') }}" data-toggle="tooltip"
                                            data-placement="bottom" title="Update" class="cursor-pointer update-icon"
                                            alt="" onclick="updateAllField('AdministratorInfo')" id="updateAdministrator">
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12 col-sm-6">
                                                <ul class="form-data">
                                                    <li>
                                                        <label class="label">Administrator Name:</label>
                                                        <input type="text" class="form-control-plaintext _detail t5"
                                                            readonly name="administrator_name"
                                                            onclick="editableField('administrator_name')"
                                                            data-id="administrator_name" id="administrator_name"
                                                            placeholder="Administrator Name" value="{{ $record->administrator_name?$record->administrator_name:'' }}">
                                                    </li>
                                                    <li>
                                                        <label class="label">Registration Number:</label>
                                                        <input type="text" class="form-control-plaintext _detail t5"
                                                            readonly name="registration_no"
                                                            onclick="editableField('registration_no')"
                                                            data-id="registration_no" id="registration_no"
                                                            placeholder="Registration Number" value="{{ $record->registration_no?$record->registration_no:'' }}">
                                                    </li>
                                                    <li>
                                                        <label class="label">Email:</label>
                                                        <input type="text" class="form-control-plaintext _detail t5"
                                                            readonly name="administrator_emailId"
                                                            onclick="editableField('i_emailId')" data-id="i_emailId"
                                                            id="administrator_emailId" placeholder="example@example.com"
                                                            value="{{ $record->administrator_emailId?$record->administrator_emailId:'' }}">
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-12 col-sm-6">
                                                <ul class="form-data">
                                                    <li>
                                                        <label class="label">Licence Number:</label>
                                                        <input type="text" class="form-control-plaintext _detail t5"
                                                            readonly name="licence_no"
                                                            onclick="editableField('licence_no')" data-id="licence_no"
                                                            id="licence_no" placeholder="Licence Number"
                                                            value="{{ $record->licence_no?$record->licence_no:'' }}">
                                                    </li>
                                                    <li>
                                                        <label class="label">Phone Number:</label>
                                                        <input type="text" class="form-control-plaintext _detail t5"
                                                            readonly name="administrator_phone_no"
                                                            onclick="editableField('i_phone_no')" data-id="i_phone_no"
                                                            id="administrator_phone_no" placeholder="Phone Number"
                                                            value="{{ $record->administrator_phone_no?$record->administrator_phone_no:'' }}">
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Administrator Information End Here -->
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12">
                                <div class="app-card" id="insuranceDetail">
                                    <div
                                        class="card-header pt-2 pb-2 d-flex justify-content-between align-items-center">
                                        <h1>Mal Practitioner Insurance Detail</h1>
                                        <img src="{{ asset('assets/img/icons/edit-field.svg') }}" data-toggle="tooltip"
                                            data-placement="bottom" title="Edit" class="cursor-pointer edit-icon" alt=""
                                            onclick="editAllField('insuranceDetail')">
                                        <img src="{{ asset('assets/img/icons/update-icon.svg') }}" data-toggle="tooltip"
                                            data-placement="bottom" title="Update" class="cursor-pointer update-icon"
                                            alt="" onclick="updateAllField('insuranceDetail')" id="updateInsuranceDetail">
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12 col-sm-6">
                                                <ul class="form-data">
                                                    <li>
                                                        <label class="label">Id:</label>
                                                        <input type="text" class="form-control-plaintext _detail t5"
                                                            readonly name="insurance_id"
                                                            onclick="editableField('insurance_id')"
                                                            data-id="insurance_id" id="insurance_id"
                                                            placeholder="insurance_id" value="{{ $record->insurance_id?$record->insurance_id:'' }}">
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-12 col-sm-6">
                                                <ul class="form-data">
                                                    <li>
                                                        <label class="label">Expiration Date:</label>
                                                        <input type="text" class="form-control-plaintext _detail t5"
                                                            readonly name="expiration_date"
                                                            onclick="editableField('expiration_date')"
                                                            data-id="expiration_date" id="expiration_date"
                                                            placeholder="Expiration Date" value="{{ $record->expiration_date?date('m/d/Y',strtotime($record->expiration_date)):'' }}">
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Mal Practitioner Insurance Detail End Here -->
                            </div>
                        </div>
                    </div>
</div>
@push('scripts')
<script src="{{ asset('assets/js/app.refferal.profile.min.js') }}"></script>

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

     $("#upateCompany").click(function() {
            $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            var id = "{{ request()->route('id') }}";
            var name = $("#name_company").val();
            var address1 = $("#addresss").val();
            var email = $("#emailId").val();
            var phone = $("#phone_no").val();  
            var services = new Array();
            $("input[name='services[]']:checked").each(function() {
                services.push($(this).val());
            });
            var services = services.toString();
            var fax_no = $("#fax_no").val();
            var data_arr = [];
            data_arr.push({'id':id,'name':name,'address1':address1,'email':email,'phone':phone,'services':services,'fax_no':fax_no});
            console.log(data_arr);
            $.ajax({
                url:'{{route('admin.updateProfile')}}',
                method:"POST",
                data:{'id':id,'name':name,'address1':address1,'email':email,'phone':phone,'services':services,'fax_no':fax_no},
                dataType:'JSON',
                 //contentType: false,
                 //cache: false,
                 //processData: false,
                success:function(response)
                 {
                    console.log(response.status);
                      if(response.status === true) {
                          alert("saved");
                      }
                      else {
                          alert("not saved");
                      }
                    console.log( response );
                }
            })
        });


    $("#updateAdministrator").click(function() {
        $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        var csrf_token = $('meta[name="csrf-token"]').attr('content');
        var id = "{{ request()->route('id') }}";
        var administrator_name = $("#administrator_name").val();
        var registration_no = $("#registration_no").val();
        var administrator_emailId = $("#administrator_emailId").val();
        var licence_no = $("#licence_no").val();
        var administrator_phone_no = $("#administrator_phone_no").val();
        var data_arr = [];
        data_arr.push({'id':id,'administrator_name':administrator_name,'registration_no':registration_no,'administrator_emailId':administrator_emailId,'licence_no':licence_no,'administrator_phone_no':administrator_phone_no});
        console.log(data_arr);
        $.ajax({
             url:'{{route('admin.updateProfile')}}',
             method:"POST",
             data:{'id':id,'administrator_name':administrator_name,'registration_no':registration_no,'administrator_emailId':administrator_emailId,'licence_no':licence_no,'administrator_phone_no':administrator_phone_no},
             dataType:'JSON',
             //contentType: false,
             //cache: false,
             //processData: false,
             success:function(response)
             {
                if(response.status === true) {
                    alert("saved");
                }
                else {
                    alert("not saved");
                }
             }
        })
    });

    $("#updateInsuranceDetail").click(function() {
        $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        var csrf_token = $('meta[name="csrf-token"]').attr('content');
        var id = "{{ request()->route('id') }}";
        var insurance_id = $("#insurance_id").val();
        var date_expiration_date = $("#expiration_date").val();
        var expiration_date = moment(date_expiration_date).format('YYYY-MM-DD');

        var data_arr = [];
        data_arr.push({'id':id,'insurance_id':insurance_id,'expiration_date':expiration_date});
        console.log(data_arr);
        $.ajax({
             url:'{{route('admin.updateProfile')}}',
             method:"POST",
             data:{'id':id,'insurance_id':insurance_id,'expiration_date':expiration_date},
             dataType:'JSON',
             //contentType: false,
             //cache: false,
             //processData: false,
             success:function(response)
             {
                if(response.status === true) {
                    alert("saved");
                }
                else {
                    alert("not saved");
                }
             }
        })
    });

</script>
@endpush
@stop
