@extends('pages.layouts.app')
@section('title','Admin - Partner Profile')
@section('pageTitleSection')
Partner Profile
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
                  <h1 class="title">{{$user->first_name}}</h1>
               </div>
            </div>
         </div>
         <div class="card-body">
            <div class="d-flex justify-content-end align-items-center">
                @if ($user->status === '0')
                    <a class="btn btn-primary btn-green shadow-sm btn--sm mr-2 user_status change_status" data-value="1" data-id="Accept" id="{{ $user->id }}" title="Accept">Accept</a>
                    <a class="btn btn-danger shadow-sm btn--sm mr-2 user_status change_status" data-value="3" data-id="Reject" id="{{ $user->id }}" title="Reject">Reject</a>';
                @elseif ($user->status === '1')
                    <a class="btn btn-danger shadow-sm btn--sm mr-2 user_status change_status" data-value="3" data-id="Reject" id="{{ $user->id }}" title="Reject">Reject</a>
                @elseif ($user->status === '3')
                    <a class="btn btn-primary btn-green shadow-sm btn--sm mr-2 user_status change_status" data-value="1" data-id="Accept" id="{{ $user->id }}" title="Accept">Accept</a>
                @endif
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
                  <h1>Partner Information</h1>
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
                              <label class="label">Name Of Partner:</label>
                              <input type="text" class="form-control-plaintext _detail t5"
                                 readonly name="first_name"
                                 data-id="first_name" id="first_name"
                                 placeholder="Name Of Partner" value="{{ $user->first_name ? $user->first_name : '' }}">
                                  <span class="error-message" id="first_name_error">Partner Name is required</span>
                           </li>
                           <li>
                              <label class="label">Partner Type:</label>
                              <input type="text" class="form-control-plaintext _detail t5"
                                 readonly name="role" onkeyup="companyerror()"
                                 data-id="role" id="role" placeholder="Partner Type"
                                 value="">
                                 <span class="error-message" id="address_error">Address is required</span>

                           </li>
                           <li>
                              <label class="label">Phone Number:</label>
                              <input type="text" class="form-control-plaintext _detail t5"
                                 readonly name="phone_no" onkeyup="companyerror()"
                                 data-id="phone_no" id="phone_no" placeholder="Phone Number"
                                 value="{{ $user->phone ? $user->phone : '' }}">
                                 <span class="error-message" id="company_phone_error">Phone Number is not valid</span>
                           </li>
                        </ul>
                     </div>
                    
                  </div>
               </div>
            </div>
            <!-- Company Information End Here -->
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

         if(!(phone.match(phoneno))) {
            $("#company_phone_error").css("display", "block");
            count++;
         }

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

         if(!(administrator_phone_no.match(phoneno))) {
         $("#phone_error").css("display", "block");
            count++;
         }
         
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