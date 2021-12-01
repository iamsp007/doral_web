@extends('pages.layouts.app')
@section('title','Admin - Clinician Profile')
@section('pageTitleSection')
Clinician Profile
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
                        <h1 class="title">{{$user->full_name}}</h1>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-end align-items-center">
                    <button type="submit" class="btn btn-primary btn-sm btn-green mr-2"
                    name="save_next">Accept</button>
                    <button type="submit" class="btn btn-primary btn-sm btn-pink"
                    name="save_next">Reject</button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-8">
        <div class="row">
            <div class="col-12">
                <div class="app-card" id="CompanyInfo">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h1>Clinician Information</h1>
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
                                        <label class="label">First Name</label>
                                        <input type="text" class="form-control-plaintext _detail t5" readonly name="first_name" onkeyup="companyerror()" data-id="first_name" id="first_name" placeholder="First Name" value="{{ $user->first_name ? $user->first_name : '' }}">
                                        <span class="error-message" id="first_name_error">First Name is required</span>
                                    </li>
                                    <li>
                                        <label class="label">Last Name</label>
                                        <input type="text" class="form-control-plaintext _detail t5" readonly name="last_name" onkeyup="companyerror()" data-id="last_name" id="last_name" placeholder="Name Of Clinician" value="{{ $user->last_name ? $user->last_name : '' }}">
                                        <span class="error-message" id="last_name_error">Last Name is required</span>
                                    </li>
                                    <li>
                                        <label class="label">Phone Number</label>
                                        <input type="text" class="form-control-plaintext _detail t5"
                                            readonly name="phone_no" onkeyup="companyerror()"
                                            data-id="phone_no" id="phone_no" placeholder="Phone Number"
                                            value="{{ $user->phone ? $user->phone : '' }}">
                                            <span class="error-message" id="company_phone_error">Phone Number is not valid</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-12 col-sm-6">
                                <ul class="form-data">
                                    <li>
                                        <label class="label">Email</label>
                                        <input type="text" class="form-control-plaintext _detail t5"
                                            readonly name="emailId" onkeyup="companyerror()"
                                            data-id="emailId" id="emailId"
                                            placeholder="example@example.com"
                                            value="{{ $user->email ? $user->email : '' }}">
                                            <span class="error-message" id="company_email_error">Email is not valid</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });
      
        $("#upateCompany").click(function() {
            $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            var url = "{{route('clinician.edit.profile')}}";
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