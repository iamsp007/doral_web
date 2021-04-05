@extends('pages.layouts.app')
@section('title','Admin - Refferal Profile')
@section('pageTitleSection')
Refferal Profile
@endsection
@section('content')
<div class="row">
   <div class="col-12 col-sm-4">
      <div class="app-card">
         <div class="user-photo">
            <div class="userContent">
               <div>
                  <img src="{{asset('assets/img/user/avatar.jpg')}}" class="user_photo" alt=""
                     srcset="{{asset('assets/img/user/avatar.jpg')}}">
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
                     data-toggle="tooltip" data-placement="left" 
                     id="{{$record->id}}">Accept
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
      <div class="row mt-3">
         <div class="col-12">
            <!-- Administrator Information Start Here -->
            <div class="app-card" id="AdministratorInfo">
               <div
                  class="card-header pt-2 pb-2 d-flex justify-content-between align-items-center">
                  <h1>Administrator Information</h1>
                     <img src="{{ asset('assets/img/icons/edit-field.svg') }}" data-toggle="tooltip"
                        data-placement="bottom" title="Edit" class="cursor-pointer edit-icon" alt=""
                        onclick="editAllProfileField('AdministratorInfo')">
                     <img id="updateAdministrator" src="{{ asset('assets/img/icons/update-icon.svg') }}" data-toggle="tooltip"
                        data-placement="bottom" title="Update" class="cursor-pointer update-icon" alt=""
                        >
               </div>
               <div class="card-body">
                  <div class="row">
                     <div class="col-12 col-sm-6">
                        <ul class="form-data">
                              <input type="hidden" id="user_id" value="{{ $record->id ? $record->id : '' }}">
                           <li>
                              <label class="label">Administrator Name:</label>
                              <input type="text" class="form-control-plaintext _detail t5"
                                 readonly name="administrator_name"
                                 onkeyup="erroMessage()"
                                 data-id="administrator_name" id="administrator_name"
                                 placeholder="Administrator Name" value="{{ $record->administrator_name ? $record->administrator_name : '' }}">
                                 <span class="error-message" id="admin_error_name">Administrator Name is required</span>
                           </li>
                           <li>
                              <label class="label">Registration Number:</label>
                              <input type="text" class="form-control-plaintext _detail t5"
                                 readonly name="registration_no"
                                 onkeyup="erroMessage()"
                                 data-id="registration_no" id="registration_no"
                                 placeholder="Registration Number" value="{{ $record->registration_no ? $record->registration_no : '' }}">
                                 <span class="error-message" id="registration_error">Registration Number is required</span>
                           </li>
                           <li>
                              <label class="label">Email:</label>
                              <input type="text" class="form-control-plaintext _detail t5"
                                 readonly name="administrator_emailId"
                                 onkeyup="erroMessage()" data-id="i_emailId"
                                 id="administrator_emailId" placeholder="example@example.com"
                                 value="{{ $record->administrator_emailId ? $record->administrator_emailId : '' }}">
                                  <span class="error-message" id="email_error">Email is not Valid</span>
                           </li>
                        </ul>
                     </div>
                     <div class="col-12 col-sm-6">
                        <ul class="form-data">
                           <li>
                              <label class="label">Licence Number:</label>
                              <input type="text" class="form-control-plaintext _detail t5"
                                 readonly name="licence_no"
                                 onkeyup="erroMessage()" data-id="licence_no"
                                 id="licence_no" placeholder="Licence Number"
                                 value="{{ $record->licence_no ? $record->licence_no : '' }}">
                                 <span class="error-message" id="licence_error">Licence Number is required</span>
                           </li>
                           <li>
                              <label class="label">Phone Number:</label>
                              <input type="text" class="form-control-plaintext _detail t5 phone_format"
                                 readonly name="administrator_phone_no"
                                 onkeyup="erroMessage()" data-id="i_phone_no"
                                 id="administrator_phone_no" placeholder="Phone Number"
                                 value="{{ $record->administrator_phone_no ? $record->administrator_phone_no : '' }}" maxlength="14">
                                 <span class="error-message" id="phone_error">Phone Number is not Valid</span>
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
                     onclick="editAllProfileField('insuranceDetail')">
                  <img src="{{ asset('assets/img/icons/update-icon.svg') }}" data-toggle="tooltip"
                     data-placement="bottom" title="Update" class="cursor-pointer update-icon"
                     alt=""  id="updateInsuranceDetail">
               </div>
               <div class="card-body">
                  <div class="row">
                     <div class="col-12 col-sm-6">
                        <ul class="form-data">
                           <li>
                              <label class="label">Id:</label>
                              <input type="text" class="form-control-plaintext _detail t5"
                                 readonly name="insurance_id"
                                 onkeyup="erroMessageMal()"
                                 data-id="insurance_id" id="insurance_id"
                                 placeholder="insurance_id" value="{{ $record->insurance_id ? $record->insurance_id : '' }}">
                                 <span class="error-message" id="insurance_error">Insurance Id is required</span>
                           </li>
                        </ul>
                     </div>
                     <div class="col-12 col-sm-6">
                        <ul class="form-data">
                           <li>
                              <label class="label">Expiration Date:</label>
                              <input type="text" class="form-control-plaintext _detail t5"
                                 readonly name="expiration_date"
                                 onkeyup="erroMessageMal()"
                                 data-id="expiration_date" id="expiration_date"
                                 placeholder="Expiration Date" value="{{ $record->expiration_date?date('m/d/Y',strtotime($record->expiration_date)):'' }}">

                                  <span class="error-message" id="date_error">Expiration Date is required</span>
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
                        alt="" onclick="editAllProfileField('CompanyInfo')" id="editCompany">
                     <img src="{{ asset('assets/img/icons/update-icon.svg') }}" data-toggle="tooltip"
                        data-placement="bottom" title="Update"
                        class="cursor-pointer update-icon" alt=""
                         id="upateCompany">
                  </div>
               </div>
               <div class="card-body">
                  <div class="row">
                     <div class="col-12 col-sm-6">
                        <ul class="form-data">
                           <li>
                              <label class="label">Name Of Company:</label>
                              <input type="text" class="form-control-plaintext _detail t5"
                                 readonly name="name_company"
                                 onkeyup="companyerror()"
                                 data-id="name_company" id="name_company"
                                 placeholder="Name Of Company" value="{{ $record->name ? $record->name : '' }}">
                                  <span class="error-message" id="company_error">Company Name is required</span>

                           </li>
                           <li>
                              <label class="label">Addresss:</label>
                              <input type="text" class="form-control-plaintext _detail t5"
                                 readonly name="addresss" onkeyup="companyerror()"
                                 data-id="addresss" id="addresss" placeholder="addresss"
                                 value="{{ $record->address1 ? $record->address1:'' }} ">
                                 <span class="error-message" id="address_error">Address is required</span>

                           </li>
                           <li>
                              <label class="label">Phone Number:</label>
                              <input type="text" class="form-control-plaintext _detail t5 phone_format"
                                 readonly name="phone_no" onkeyup="companyerror()"
                                 data-id="phone_no" id="phone_no" placeholder="Phone Number"
                                 value="{{ $record->phone ? $record->phone : '' }}" maxlength="14">
                                 <span class="error-message" id="company_phone_error">Phone Number is not valid</span>
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
                                       @role('admin')
                                          <div class="col-12 col-sm-6 mt-3">
                                             <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input"
                                                   id="customCheck{{$s_row['id']}}" name="services[]" value="{{$s_row['id']}}"<?php if (in_array($s_row['id'], explode(',', ($record->services) ? $record->services : ''))) { echo "checked";} ?> disabled>
                                                <label class="custom-control-label t5"
                                                   for="customCheck{{$s_row['id']}}">{{$s_row['name']}}</label>
                                             </div>
                                          </div>
                                       @else
                                          <input type="text" class="form-control-plaintext _detail t5" readonly value="{{$s_row['name']}}">
                                       @endrole
                                    @endforeach
                                 @endif
                              </div>
                           </li>
                           <li>
                              <label class="label">Email:</label>
                              <input type="text" class="form-control-plaintext _detail t5"
                                 readonly name="emailId" onkeyup="companyerror()"
                                 data-id="emailId" id="emailId"
                                 placeholder="example@example.com"
                                 value="{{ $record->email ? $record->email : '' }}">

                                 <span class="error-message" id="company_email_error">Email is not valid</span>
                           </li>
                           <li>
                              <label class="label">Fax Number:</label>
                              <input type="text" class="form-control-plaintext _detail t5"
                                 readonly name="fax_no" onkeyup="companyerror()"
                                 data-id="fax_no" id="fax_no" placeholder="Fax Number"
                                 value="{{ $record->fax_no ? $record->fax_no : '' }}">
                                 <span class="error-message" id="fax_error">Fax Number is required</span>
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
           <div class="app-card" id="paymentInfo">
               <div
                   class="card-header pt-3 pb-3 d-flex justify-content-between align-items-center">
                   <h1>Payment Information</h1>
               </div>
               <div class="card-body">
                  @foreach($paymentInfo as $key => $p_info)
                     @php $class = 'row mt-4'; @endphp
                     @if($key == 0)
                        @php $class = 'row'; @endphp
                     @endif
                        <div class="{{$class}}">
                           <div class="col-12 col-sm-3">
                              <div class="card text-white bg-info" style="min-height: 160px;">
                                  <div class="card-header">Service</div>
                                  <div class="card-body text-primary">
                                      <div class="text-white">{{ $p_info['name'] }}</div>
                                  </div>
                              </div>
                           </div>
                           @foreach($p_info['payment_plan'] as $p_plan)
                              <div class="col-12 col-sm-3">
                                 <div class="card border-light" style="min-height: 160px;">
                                    <div class="card-header">{{ $p_plan['name'] }}</div>
                                    <div class="card-body">
                                       @foreach($p_plan['plan_details'] as $p_details)
                                            <div>
                                                <label>
                                                    <input class="with-gap payment_info"
                                                    data-company-id="{{ $p_info['company_id'] }}" data-service-id="{{ $p_info['service_id'] }}" data-payment-plan-id="{{ $p_details['service_payment_plan_id'] }}" id="p_details{{ $p_details['id'] }}" name="group{{ $p_details['service_payment_plan_id'] }}" type="radio"
                                                    @php 
                                                      if(in_array($p_details['id'], $paymentPlanDetailsIds)) {
                                                         echo "checked";
                                                      }
                                                    @endphp
                                                        value="{{ $p_details['id'] }}" />
                                                    <span>{{ $p_details['name'] }}</span>
                                                </label>
                                            </div>
                                       @endforeach
                                    </div>
                                     
                                 </div>
                              </div>
                           @endforeach
                        </div>
                  @endforeach

               </div>
           </div>
           <!-- Payment Information End Here -->
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

            $("#loader-wrapper").show();
            $.ajax({
               method: 'POST',
               url: '/admin/referral-status',
               data: {company_id, status},
               success: function( response ){
                  $("#loader-wrapper").hide();
                  if(response.status == 1)
                     alertText(response.message,'success');
                  else
                     alertText(response.message,'success');
               },
               error: function( e ) {
                  $("#loader-wrapper").hide();
                  alertText('Something went wrong!','error');
               }
            });
         });
      
         $(".rejectid").click(function() {
            var company_id = $(this).attr('id');
            var status = "reject";

            $("#loader-wrapper").show();
            $.ajax({
               method: 'POST',
               url: '/admin/referral-status',
               data: {company_id, status},
               success: function( response ){
                  $("#loader-wrapper").hide();
                  if(response.status == 1)
                     alertText(response.message,'success');
                  else
                     alertText(response.message,'success');
               },
               error: function( e ) {
                  $("#loader-wrapper").hide();
                  alertText('Something went wrong!','error');
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

         if(id == '') {
            id = $("#user_id").val();
         }
            
         var phoneno = /^\d{10}$/;
         var emailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
         var count = 0;
         if(jQuery.trim(name) == '') {
            $("#company_error").css("display", "block");
            count++;
         }

         if(jQuery.trim(address1) == '') {
            $("#address_error").css("display", "block");
            count++;
         }

//         if(!(phone.match(phoneno))) {
//            $("#company_phone_error").css("display", "block");
//            count++;
//         }

         if(!(email.match(emailformat))) {
            $("#company_email_error").css("display", "block");
            count++;
         }
         if(jQuery.trim(fax_no) == '') {
            $("#fax_error").css("display", "block");
               count++;
            }
         if (count > 0) {
            return false;
         }           
            
         data_arr.push({'id':id,'name':name,'address1':address1,'email':email,'phone':phone,'services':services,'fax_no':fax_no});
         if("{{Request::is('admin/*')}}"){
            var url = "{{route('admin.updateProfile')}}";
         } else {
            var url = "{{route('referral.updateProfile')}}";
         }
         $("#loader-wrapper").show();

         $.ajax({
            url:url,
            method:"POST",
            data:{'id':id,'name':name,'address1':address1,'email':email,'phone':phone,'services':services,'fax_no':fax_no},
            dataType:'JSON',
            success:function(response)
            {
               $("#loader-wrapper").hide();
               if(response.status === true) {
                  alertText('Profile Information updated successfully','success');
                     updateAllProfileField('CompanyInfo')
               } else {
                  alertText('Not saved','error');
               }
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
         var phoneno = /^\d{10}$/;
         var emailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
         if(id == '') {
            id = $("#user_id").val();
         }
         var count = 0;
         if(jQuery.trim(administrator_name) == '') {
            $("#admin_error_name").css("display", "block");
            count++;
         }

         if(jQuery.trim(registration_no) == '') {
         $("#registration_error").css("display", "block");
            count++;
         }

         if(!(administrator_emailId.match(emailformat))) {
         $("#email_error").css("display", "block");
            count++;
         }

         if(jQuery.trim(licence_no) == '') {
            $("#licence_error").css("display", "block");
            count++;
         }

//         if(!(administrator_phone_no.match(phoneno))) {
//         $("#phone_error").css("display", "block");
//            count++;
//         }
         
         if (count > 0) {
            return false;
         }

         data_arr.push({'id':id,'administrator_name':administrator_name,'registration_no':registration_no,'administrator_emailId':administrator_emailId,'licence_no':licence_no,'administrator_phone_no':administrator_phone_no});
         
         if("{{Request::is('admin/*')}}"){
            var url = "{{route('admin.updateProfile')}}";
         } else {
            var url = "{{route('referral.updateProfile')}}";
         }

         $("#loader-wrapper").show();
         $.ajax({
            url:url,
            method:"POST",
            data:{'id':id,'administrator_name':administrator_name,'registration_no':registration_no,'administrator_emailId':administrator_emailId,'licence_no':licence_no,'administrator_phone_no':administrator_phone_no},
            dataType:'JSON',
            success:function(response)
            {
               $("#loader-wrapper").hide();
               if(response.status === true) {
                  alertText('Profile Information updated successfully','success');
                  updateAllProfileField('AdministratorInfo');
               }
               else {
                  alertText('Not saved','error');
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

         var count = 0;
         if(jQuery.trim(insurance_id) == '') {
            $("#insurance_error").css("display", "block");
            count++;
         } 
         
         if(jQuery.trim(expiration_date) == '') {
            $("#date_error").css("display", "block");
            count++;
         }
         if (count > 0) {
            return false;
         }
            
         var data_arr = [];
         if(id == '') {
            id = $("#user_id").val();
         }
         data_arr.push({'id':id,'insurance_id':insurance_id,'expiration_date':expiration_date});

         if("{{Request::is('admin/*')}}"){
            var url = "{{route('admin.updateProfile')}}";
         } else {
            var url = "{{route('referral.updateProfile')}}";
         }
         $("#loader-wrapper").show();

         $.ajax({
            url:url,
            method:"POST",
            data:{'id':id,'insurance_id':insurance_id,'expiration_date':expiration_date},
            dataType:'JSON',
            success:function(response)
            {
               $("#loader-wrapper").hide();
               if(response.status === true) {
                  alertText('Profile Information updated successfully','success');
                  updateAllProfileField('insuranceDetail');

               }
               else {
                  alertText('Not saved','error');
               }
            }
         })
      });
      
      // insert / update payment info
      $(".payment_info").change(function() {
         $.ajaxSetup({
            headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
         });
         var csrf_token = $('meta[name="csrf-token"]').attr('content');

         var company_id = $('#p_details'+this.value).attr('data-company-id');
         var service_id = $('#p_details'+this.value).attr('data-service-id');
         var service_payment_plan_id = $('#p_details'+this.value).attr('data-payment-plan-id');
         var service_payment_plan_details_id = this.value;
         if("{{Request::is('admin/*')}}"){
            var url = "{{route('admin.insertUpdateServicePayment')}}";
         } else {
            var url = "{{route('referral.insertUpdateServicePayment')}}";
         }
         $("#loader-wrapper").show();
         $.ajax({
            url:url,
            method:"POST",
            data:{'company_id':company_id,'service_id':service_id,'service_payment_plan_id':service_payment_plan_id,'service_payment_plan_details_id':service_payment_plan_details_id},
            dataType:'JSON',
            success:function(response)
            {
               $("#loader-wrapper").hide();
               if(response.status === true) {
                  alertText('Profile Information updated successfully','success');
               }
               else {
                  alertText('Not saved','error');
               }
            }
         })
      });

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
@stop