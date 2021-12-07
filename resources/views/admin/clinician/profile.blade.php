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
                <div class="app-card" id="ClinicianInfo">
                    <form id="clinician_form" enctype="multipart/form-data">
                    @csrf
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h1>Clinician Information</h1>
                            <div>
                                <img src="{{ asset('assets/img/icons/edit-field.svg') }}" data-toggle="tooltip"
                                    data-placement="bottom" title="Edit" class="cursor-pointer edit-icon"
                                    alt="" onclick="editAllProfileField('ClinicianInfo')" id="editCompany">
                                <img src="{{ asset('assets/img/icons/update-icon.svg') }}" data-toggle="tooltip"
                                    data-placement="bottom" title="Update"
                                    class="cursor-pointer update-icon" alt=""
                                    id="upateClinician">
                            </div>
                        </div>
                        <div class="card-body">
                            
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <ul class="form-data">
                                    <input type="hidden" name="id_for_update" value="{{ $user->id }}">
                                        <li>
                                            <label class="label">First Name</label>
                                            <input type="text" class="form-control-plaintext t5" readonly name="first_name" onkeyup="companyerror()" id="first_name" placeholder="First Name" value="{{ $user->first_name ? $user->first_name : '' }}">
                                            <span class="error-message" id="first_name_error">First Name is required</span>
                                        </li>
                                        <li>
                                            <label class="label">Last Name</label>
                                            <input type="text" class="form-control-plaintext _detail t5" readonly name="last_name" onkeyup="companyerror()" id="last_name" placeholder="Name Of Clinician" value="{{ $user->last_name ? $user->last_name : '' }}">
                                            <span class="error-message" id="last_name_error">Last Name is required</span>
                                        </li>
                                        <li>
                                            <label class="label">Nick Name</label>
                                            <input type="text" class="form-control-plaintext _detail t5" readonly name="nickname" onkeyup="companyerror()" data-id="nickname" id="nickname" placeholder="Name Of Clinician" value="{{ $user->nickname ? $user->nickname : '' }}">
                                            <span class="error-message" id="nickname_error">Nick Name is required</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <ul class="form-data">
                                        <li>
                                            <label class="label">Email</label>
                                            <input type="text" class="form-control-plaintext _detail t5"
                                                readonly name="emailId" onkeyup="companyerror()"
                                                id="emailId"
                                                placeholder="example@example.com"
                                                value="{{ $user->email ? $user->email : '' }}">
                                                <span class="error-message" id="company_email_error">Email is not valid</span>
                                        </li>
                                        <li>
                                            <label class="label">Phone Number</label>
                                            <input type="text" class="form-control-plaintext _detail t5"
                                                readonly name="phone_no" onkeyup="companyerror()"
                                                id="phone_no" placeholder="Phone Number"
                                                value="{{ $user->phone ? $user->phone : '' }}">
                                                <span class="error-message" id="company_phone_error">Phone Number is not valid</span>
                                        </li>
                                        <li>
                                            <label class="label">Avatar</label>
                                            <input type="file" class="form-control"
                                                    style="height: inherit;" id="avatar"
                                                    name="avatar">
                                            
                                            @if(isset($user->avatar) && !empty($user->avatar))
                                                <img src="{{ isset($user->avatar_image) ? $user->avatar_image : null }}" class="imageThumb" alt="avatar" id="s1" heigth="100" width="100">
                                            @else
                                                <img src="{{ asset('assets/img/user/avatar.jpg') }}" class="imageThumb" alt="avatar" id="s1" heigth="100" width="100">
                                            @endif
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </form>
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

        /*@ Image preview */
        $("#avatar").change(function() {
            profileimage(this);
        });

        $(document).on('click','#upateClinician',function(event) {
            //$('#clinician_form').on('submit', function(event){
            event.preventDefault();
            var formdata = $('#clinician_form').serializeArray();
            // var formdata = new FormData($("#clinician_form")[0]);
            var url = "{{route('clinician.edit.profile')}}";
       
            $("#loader-wrapper").show();

            $.ajax({
                type:"POST",
                url:url,
                data:formdata,
                headers: {
                    'X_CSRF_TOKEN': '{{ csrf_token() }}',
                },
                success: function(data) {
                    if(data.status == 400) {
                        $.each(data.message, function( key, value ) {
                            t.parents('.upateClinician').find("." + key + "-invalid-feedback").append('<strong>' + value[0] + '</strong>');
                        });
                    } else {
                        alertText(data.message,'success');
                        updateAllProfileField('ClinicianInfo')     
                    }
                    $("#loader-wrapper").hide();
                },
                error: function() {
                    alertText("Server Timeout! Please try again",'warning');
                    $("#loader-wrapper").hide();
                }
            });
        });
 
        function profileimage(input) {
            var fileTypes = ['jpg', 'jpeg', 'png'];
            if (input.files && input.files[0]) {
                var extension = input.files[0].name.split('.').pop().toLowerCase();
                isSuccess = fileTypes.indexOf(extension) > -1;
                if (isSuccess) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#s1').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                }else{
                    $('#s1').css({'display':'none'});
                }
            }
        }

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