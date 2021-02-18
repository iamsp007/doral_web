@extends('pages.layouts.app')

@section('content')
<div class="p-3 app-partner">
    <div class="row">
        <div class="col-12 col-sm-9">
            <form action="" name="myForm">
                <div class="app-card no-minHeight">
                    <div class="app-card-header">
                        <div class="titleBox">
                            <div class="title">
                                Add Employee
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
                                               aria-describedby="Employee ID" id="employeeID" value=""
                                               name="employeeID">
                                    </div>
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
                                               aria-describedby="firstName" id="firstName" value=""
                                               name="employeeID">
                                    </div>
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
                                               aria-describedby="Last Name" id="lastName" value=""
                                               name="lastName">
                                    </div>
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
                                               aria-describedby="Email ID" id="emailID" value=""
                                               name="employeeID">
                                    </div>
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
                                               aria-describedby="Phone Number" id="phoneNumber" value=""
                                               name="phoneNumber">
                                    </div>
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
                                               value="" name="dlNumber">
                                    </div>
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
                                               id="dob" value="" name="dob">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <input type="submit" id="submit" name="submit"
                                       class="btn btn-outline-green" value="Submit" />
                                <div class="popModal shadow">
                                    <div class="popovers promptBox">
                                        <div class="popovers-inner">
                                            <div class="popovers-content">
                                                <div class="d-flex justify-content-end">
                                                    <a href="javsacript:void(0)" class="p-2 closeBox">
                                                        <i class="las la-times la-2x text-green"></i>
                                                    </a>
                                                </div>
                                                <div class="p-5">
                                                    <div>
                                                        <div class="d-flex justify-content-center">
                                                            <img src="../assets/img/icons/link_icon.svg"
                                                                 alt="">
                                                        </div>
                                                        <p class="text-center mt-4">Will send you the
                                                            link on your phone. So
                                                            please check your text Message.</p>
                                                        <p class="text-muted text-center mt-2">Choose
                                                            One</p>
                                                        <div
                                                            class="d-flex align-items-center justify-content-center mt-4">
                                                            <div
                                                                class="mt-1 d-flex align-items-center justify-content-center shareBox">
                                                                <a onclick="saveLinkType(1)" href="javascript:void(0)"
                                                                   class="androidStore _store"><span
                                                                        class="_android"></span>Android</a>
                                                                <a onclick="saveLinkType(2)" href="javascript:void(0)"
                                                                        class="iosStore _store mr-2"><span
                                                                        class="_ios"></span>IOS</a>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex justify-content-center mt-5">
                                                            <button type="button"
                                                                    class="btn btn-outline-green btn-lg areyousure" onclick="employeeSave()">Submit Employee Details</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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