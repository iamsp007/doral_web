@extends('pages.layouts.app')

@section('content')
@php
    /*Fetching data while editing records*/

    $designation_id = $first_name = $last_name = $email = $phone = $driving_license = $dob = '';
    if(!empty($user)):
        $employee_ID = $user->employee->employee_ID;
        $designation_id = $user->designation_id;
        $first_name = $user->first_name;
        $last_name = $user->last_name;
        $email = $user->email;
        $phone = $user->phone;
        $driving_license = $user->employee->driving_license;
        $dob = $user->dob;
    endif;
@endphp
<div class="p-3 app-partner">
    <div class="row">
        <div class="col-12 col-sm-12">
            <form class="myForm">
                @csrf
                <div class="app-card no-minHeight">
                    <div class="app-card-header">
                        <div class="titleBox">
                            <div class="title">
                                Add Employee
                            </div>
                        </div>
                    </div>
                    <div class="p-4">
                        <div class="row">
                            <div class="col-12 col-sm-4">
                                <div class="form-group">
                                    <label for="EmployeeID" class="label"><span class="mendate">*</span> Employee ID</label>
                                    <div class="input-group">
                                        <span class="input-group-text input-group-text-custom"><i class="las la-user-tie"></i></span>
                                        <input type="text" class="form-control form-control-lg" placeholder="Employee ID" id="employee_ID" value="{{ $employee_ID }}" readonly name="employee_ID">
                                    </div>
                                    <span class="errorText employee_ID_error"></span>
                                </div>
                            </div>
                           <div class="col-12 col-sm-4">
                                <div class="form-group">
                                    <label for="selectRole" class="label"><span class="mendate">*</span> Select Designation</label>
                                    <div class="input-group">
                                        <span class="input-group-text input-group-text-custom"><i class="las la-user-tie"></i></span>
                                        <select class="form-control form-control-lg" name="designation_id" id="designation_id">
                                            <option value="default">Select Designation</option>
                                            @foreach ($designations as $designation)
                                            <option value="{{$designation->id}}" @if(isset($user)){{($designation_id == $designation->id) ? 'selected=""' : ''}} @endif>{{$designation->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <span class="errorText designation_id_error"></span>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group">
                                    <label for="first_name" class="label"><span class="mendate">*</span> First Name</label>
                                    <div class="input-group">
                                        <span class="input-group-text input-group-text-custom"><i class="las la-user-tie"></i></span>
                                        <input type="text" class="form-control form-control-lg" placeholder="First name" id="first_name" value="{{ $first_name }}" name="first_name">
                                    </div>
                                    <span class="errorText first_name_error"></span>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group">
                                    <label for="last_name" class="label"><span class="mendate">*</span> Last Name</label>
                                    <div class="input-group">
                                        <span class="input-group-text input-group-text-custom"><i class="las la-user-tie"></i></span>
                                        <input type="text" class="form-control form-control-lg" placeholder="Last name" id="last_name" value="{{ $last_name }}" name="last_name">
                                    </div>
                                    <span class="errorText last_name_error"></span>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group">
                                    <label for="email" class="label"><span class="mendate">*</span> Email</label>
                                    <div class="input-group">
                                        <span class="input-group-text input-group-text-custom"><i class="las la-user-tie"></i></span>
                                        <input type="email" class="form-control form-control-lg" placeholder="Email" id="email" value="{{ $email }}" name="email">
                                    </div>
                                    <span class="errorText email_error"></span>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group">
                                    <label for="phoneNumber" class="label"><span class="mendate">*</span> Phone Number</label>
                                    <div class="input-group">
                                        <span class="input-group-text input-group-text-custom"><i class="las la-phone"></i></span>
                                        <input type="text" class="form-control form-control-lg phone_format" placeholder="Phone number" id="phone" value="{{ $phone }}" name="phone" maxlength="14">
                                    </div>
                                    <span class="errorText phone_error"></span>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group">
                                    <label for="dlNumber" class="label"><span class="mendate">*</span> Driving License Number</label>
                                    <div class="input-group">
                                        <span class="input-group-text input-group-text-custom"><i class="las la-user-tie"></i></span>
                                        <input type="text" class="form-control form-control-lg" placeholder="Driving License Number" id="driving_license" value="{{ $driving_license }}" name="driving_license">
                                    </div>
                                    <span class="errorText driving_license_error"></span>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group">
                                    <label for="dob" class="label"><span class="mendate">*</span> Date of Birth</label>
                                    <div class="input-group">
                                        <span class="input-group-text input-group-text-custom"><i class="las la-user-tie"></i></span>
                                        <input type="text" class="form-control form-control-lg dateofbirth" placeholder="Date of birth" id="dateofbirth" value="{{ $dob }}" name="dateofbirth">
                                    </div>
                                    <span class="errorText dateofbirth_error"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                @if(isset($user))
                                    <input type="hidden" name="_method" value="PUT" class="put_method"/>
                                @endif
                                <input type="submit" id="submit" name="submit" class="btn btn-outline-green" value="Submit" />
                                <a href="{{route('employee.index')}}" class="btn btn-secondary text-uppercase">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <!-- <script src="{{ asset('assets/js/employee/employee.js') }}"></script> -->
    <script>
        
        /*@ Store / Update admin */
        $.validator.addMethod("designationValueNotEquals", function (value, element, arg) {
            return arg !== value;
        }, "Please select designation.");
        validator = $(".myForm").validate({
            rules:{
                employee_ID: {required: true},
                designation_id: {designationValueNotEquals: "default"},
                first_name: {required: true},
                last_name: {required: true},
                email: {required: true},
                phone: {required: true},
                driving_license: {required: true},
                dob: {required: true},
            },
            messages: {
                employee_ID: {
                    required: "Please enter employee ID."
                },
                first_name: {
                    required: "Please enter first name.",
                },
                last_name: {
                    required: "Please enter last name.",
                },
                email: {
                    required: "Please enter email.",
                },
                phone: {
                    required: "Please enter phone.",
                },
                driving_license: {
                    required: "Please enter driving license.",
                }
            },
            errorPlacement: function(error, element) {
                var el_id = element.attr("name");
                $('#'+el_id+'-error').remove();
                error.insertAfter(element.parents(".input-group")).css({"color" : "red"});
            },
            invalidHandler: function (event,validator) {
                
            },
            submitHandler: function (form,event) {
                event.preventDefault();

                var url = "@if(!isset($user)){{ Route('employee.store') }} @else {{ Route('employee.update',[$user->id]) }} @endif";
                var fdata = new FormData($(".myForm")[0]);
                $("#loader-wrapper").show();
                $.ajax({
                    type:"POST",
                    url:url,
                    data:fdata,
                    headers: {
                        'X_CSRF_TOKEN': '{{ csrf_token() }}',
                    },
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        if(data.status == 400) {
                            alertText(data.message,'error');
                        } else {
                            alertText(data.message,'success');
                            setTimeout(function () {
                                window.location= "{{ Route('employee.index') }}";
                            }, 2000);
                            $("#loader-wrapper").hide();
                        }
                    },
                    error: function() {
                        alertText("Server Timeout! Please try again",'warning');
                        $("#loader-wrapper").hide();
                    }
                });
            }
        });

        $('input[name="dateofbirth"]').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                minYear: 1901,
                maxYear: parseInt(moment().format('YYYY'), 10)
            }, function (start, end, label) {
                var years = moment().diff(start, 'years');
                alert("You are " + years + " years old!");
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
