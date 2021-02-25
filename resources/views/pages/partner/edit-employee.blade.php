@extends('pages.layouts.app')

@section('content')
<div class="p-3 app-partner">
    <div class="row">
        <div class="col-12 col-sm-9">
            <form method="post" name="myForm" action="{{ route('partner.updateEmployee', $employee->id) }}" id="editEmployee">
                @csrf
                <div class="app-card no-minHeight">
                    <div class="app-card-header">
                        <div class="titleBox">
                            <div class="title">
                                Edit Employee
                            </div>
<!--                            <div>
                                <a href="javascript:void(0)" title="Add More">
                                    <img src="../assets/img/icons/add_more.svg" alt="Add More">
                                </a>
                            </div>-->
                        </div>
                    </div>
                    <div class="p-4">
                        <div class="row">
                            <div class="col-12 col-sm-4">
                                <div class="form-group">
                                    <label for="EmployeeID" class="label">Employee ID</label>
                                    <div class="input-group">
                                        <span class="input-group-text input-group-text-custom"><i
                                                class="las la-user-tie"></i></span>
                                        <input type="text" class="form-control form-control-lg"
                                               placeholder="" aria-label="Employee ID"
                                               aria-describedby="Employee ID" id="employeeID" value="{{ $employee->employeeID ?? null }}"
                                               name="employeeID">
                                    </div>
                                    <span class="errorText employeeID"></span>
                                </div>
                            </div>
<!--                            <div class="col-12 col-sm-4">
                                <div class="form-group">
                                    <label for="selectRole" class="label">Select Roles</label>
                                    <div class="input-group">
                                        <span class="input-group-text input-group-text-custom"><i
                                                class="las la-user-tie"></i></span>
                                        <select class="form-control" name="" id="">
                                            <option value="">Select Role</option>
                                        </select>
                                    </div>
                                </div>
                            </div>-->
                            <div class="col-12 col-sm-4">
                                <div class="form-group">
                                    <label for="firstName" class="label">First Name</label>
                                    <div class="input-group">
                                        <span class="input-group-text input-group-text-custom"><i
                                                class="las la-user-tie"></i></span>
                                        <input type="text" class="form-control form-control-lg"
                                               placeholder="" aria-label="firstName"
                                               aria-describedby="firstName" id="firstName" value="{{ $employee->first_name }}"
                                               name="firstName">
                                    </div>
                                    <span class="errorText firstName"></span>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group">
                                    <label for="lastName" class="label">Last Name</label>
                                    <div class="input-group">
                                        <span class="input-group-text input-group-text-custom"><i
                                                class="las la-user-tie"></i></span>
                                        <input type="text" class="form-control form-control-lg"
                                               placeholder="" aria-label="Last Name"
                                               aria-describedby="Last Name" id="lastName" value="{{ $employee->last_name }}"
                                               name="lastName">
                                    </div>
                                    <span class="errorText lastName"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            
                            <div class="col-12 col-sm-4">
                                <div class="form-group">
                                    <label for="emailID" class="label">Email ID</label>
                                    <div class="input-group">
                                        <span class="input-group-text input-group-text-custom"><i
                                                class="las la-user-tie"></i></span>
                                        <input type="email" class="form-control form-control-lg"
                                               placeholder="" aria-label="Email ID"
                                               aria-describedby="Email ID" id="emailID" value="{{ $employee->email }}"
                                               name="emailID">
                                    </div>
                                    <span class="errorText emailID"></span>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group">
                                    <label for="phoneNumber" class="label">Phone Number</label>
                                    <div class="input-group">
                                        <span class="input-group-text input-group-text-custom"><i
                                                class="las la-phone"></i></span>
                                        <input type="text" class="form-control form-control-lg"
                                               placeholder="" aria-label="Phone Number"
                                               aria-describedby="Phone Number" id="phoneNumber" value="{{ $employee->phone }}"
                                               name="phoneNumber">
                                    </div>
                                    <span class="errorText phoneNumber"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-4">
                                <div class="form-group">
                                    <label for="dlNumber" class="label">Driving License Number</label>
                                    <div class="input-group">
                                        <span class="input-group-text input-group-text-custom"><i
                                                class="las la-user-tie"></i></span>
                                        <input type="text" class="form-control form-control-lg"
                                               placeholder="" aria-label="Last Name"
                                               aria-describedby="Driving License Number" id="dlNumber"
                                               value="{{ $employee->dlNumber }}" name="dlNumber">
                                    </div>
                                    <span class="errorText dlNumber"></span>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group">
                                    <label for="dob" class="label">DOB</label>
                                    <div class="input-group">
                                        <span class="input-group-text input-group-text-custom"><i
                                                class="las la-user-tie"></i></span>
                                        <input type="text" class="form-control form-control-lg"
                                               placeholder="" aria-label="DOB" aria-describedby="DOB"
                                               id="dob" value="{{ $employee->dob ? date('m/d/Y', strtotime($employee->dob)) : null }}" name="dob">
                                    </div>
                                    <span class="errorText dob"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <input type="submit" id="submit" name="submit"
                                       class="btn btn-outline-green" value="Submit" />
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-12 col-sm-3">
            <div class="app-card">
                <div class="p-4">
                    <h1 class="title01 mb-2">Download Our New Application</h1>
                    <p class="sm-text">Looks like you're on desktop! Want us to send the download
                        link to your phone?
                    </p>
                    <div class="mt-5 d-flex">
                        <div>
                            <img src="../assets/img/icons/mobile_app.svg" class="img-fluid" alt="">
                        </div>
                        <div>
                            <img src="../assets/img/icons/mobile_app_1.svg" class="img-fluid" alt="">
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-center">
                        <div class="mt-1 d-flex align-items-center justify-content-center shareBox">
                            <a href="javascript:void(0)" class="iosStore _store mr-4"><span
                                    class="_ios"></span>IOS</a>
                            <a href="javascript:void(0)" class="androidStore _store"><span
                                    class="_android"></span>Android</a>
                        </div>
                    </div>
                    <div class="mt-4">
                        <div class="form-group">
                            <div class="d-flex justify-content-between">
<!--                                <div>
                                    <label for="selectRole" class="label">Select</label>
                                    <div class="input-group">
                                        <span class="input-group-text input-group-select-custom">
                                            <i class="las la-user-tie"></i>
                                        </span>
                                        <select class="form-control" name="" id="">
                                            <option value="Select">Select</option>
                                            <option value="+1" selected="">+1</option>
                                        </select>
                                    </div>
                                </div>-->
                                <div>
                                    <label for="phoneNumber1" class="label">Enter Your Mobile
                                        Number</label>
                                    <div class="input-group">
                                        <span class="input-group-text input-group-text-custom"><i
                                                class="las la-phone"></i></span>
                                        <input type="text" class="form-control" placeholder=""
                                               aria-label="directLinkPhoneNumber" aria-describedby="Phone Number"
                                               id="directLinkPhoneNumber" value="" name="directLinkPhoneNumber">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="form-group">
                            <label for="chooseDevice" class="label">Choose Device</label>
                            <div class="input-group">
                                <span class="input-group-text input-group-select-custom"><i
                                        class="las la-user-tie"></i></span>
                                <select class="form-control" name="chooseDevice" id="chooseDevice">
                                    <option value="">Select</option>
                                </select>
                            </div>
                        </div> -->
                        <button type="button"
                                class="btn btn-outline-green btn-block areyousure" onclick="directSendLink()">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/tail.select-default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/daterangepicker.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/add-employee.css') }}">
	<style>
		.errorText {
			color: red;
			/* visibility: hidden; */
		}
	</style>
@endpush

@push('scripts')
    <script src="{{ asset('assets/js/daterangepicker.min.js') }}"></script>
    <script src="{{ asset('assets/js/partner/add-employee.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/js/additional-methods.js') }}"></script>
    <script>
        $(function () {
            
        });
    </script>
@endpush