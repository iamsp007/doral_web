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
                  <h1 class="title">{{$user->name}}</h1>
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
                                 readonly name="name"
                                 data-id="name" id="name"
                                 placeholder="Name Of Partner" value="{{ $user->name ? $user->name : '' }}">
                                  <span class="error-message" id="name_error">Partner Name is required</span>
                           </li>
                           <li>
                              <label class="label">Partner Type:</label>
                              <div class="normal_referralType_div">
                                 <input type="text" class="form-control-plaintext _detail" readonly name="referralType" data-id="referralType" placeholder="referralType" value="{{ $role }}">
                              </div>
                              <div class="input-group editable_referralType_div d-none">
                                 <select class="form-control" name="referralType" id="referralType">
                                    <option>Select partner type</option>
                                    @foreach($partners as $partner)
                                       <option value="{{ $partner->id }}">{{ $partner->name }}</option>
                                    @endforeach
                                 </select>
                              </div>
                              <span class="error-message" id="referralType_error">Partner type is required</span>
                           </li>
                           <li>
                              <label class="label">Phone Number:</label>
                              <input type="text" class="form-control-plaintext _detail t5 phone_format"
                                 readonly name="phone_no"
                                 data-id="phone_no" id="phone_no" placeholder="Phone Number"
                                 value="{{ $user->phone ? $user->phone : '' }}" maxlength="14">
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
@endsection
@push('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
@endpush
@push('scripts')
   <script src="{{ asset('assets/js/app.refferal.profile.min.js') }}"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script> 
   <script>
      $(document).ready(function () {
         $.ajaxSetup({
            headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
         });
      });

      $('#referralType').select2();

      $("#upateCompany").click(function() {
         $.ajaxSetup({
            headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
         });

         var csrf_token = $('meta[name="csrf-token"]').attr('content');
         var id = "{{ request()->route('id') }}";
         var name = $("#name").val();
         var referralType = $("#referralType").val();
         var phone_no = $("#phone_no").val();
       
         var data_arr = [];

         if(id == '') {
            id = $("#user_id").val();
         }
            
         var count = 0;
         if(jQuery.trim(name) == '') {
            $("#namey_error").css("display", "block");
            count++;
         }

         if(jQuery.trim(referralType) == '') {
            $("#referralType_error").css("display", "block");
            count++;
         }

         if(jQuery.trim(phone_no) == '') {
            $("#phone_no_error").css("display", "block");
            count++;
         }
      
         if (count > 0) {
            return false;
         }           
            
         data_arr.push({'id':id,'name':name,'referralType':referralType,'phone_no':phone_no});
         if("{{Request::is('admin/*')}}"){
            var url = "{{route('admin.updateProfile')}}";
         } else {
            var url = "{{route('referral.updateProfile')}}";
         }
         $("#loader-wrapper").show();

         $.ajax({
            url:url,
            method:"POST",
            data:{'id':id, 'name':name,'referralType':referralType,'phone_no':phone_no},
            dataType:'JSON',
            success:function(response)
            {
               $("#loader-wrapper").hide();
               if(response.status === true) {
                  alertText('Profile Information updated successfully','success');
               } else {
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
