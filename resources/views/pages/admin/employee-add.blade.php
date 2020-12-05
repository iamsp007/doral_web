@extends('layouts.admin.default')
@section('content')
<div class="app-roles">
    <div class="pt-2">
        <div class="roles-block">
            <div class="tab-content">
                <!-- Personal Details -->
                <div class="tab-pane active" id="profile" role="tabpanel">
                    <div class="card">
                        <div class="card-header card-header-2">Personal Details</div>
                        <div class="card-body">
                            <form name="personal_details" class="personal_details_form" novalidate>
                                
                                <div class="form-group">
                                    <div class="row">
                                        <!-- First Name -->
                                        <div class="col-12 col-sm-4">
                                            <label for="firstname" class="label">First Name</label>
                                            <input type="text" class="form-control fname" id="firstname"
                                                value="" name="firstname"
                                                aria-describedby="firstnameHelp">
                                            <div class="invalid-feedback d-none"></div>
                                        </div>
                                        <!-- Last Name -->
                                        <div class="col-12 col-sm-4">
                                            <label for="lastname" class="label">Last Name</label>
                                            <input type="text" class="form-control lname" id="lastname"
                                                value="" name="lastname"
                                                aria-describedby="lastnameHelp">
                                            <div class="invalid-feedback d-none"></div>
                                        </div>
                                        <!-- Date Of Birth -->
                                        <div class="col-12 col-sm-4">
                                            <label for="dob" class="label">Date of Birth</label>
                                            <input type="text" class="form-control" id="licenseExpireId"
                                                name="licenseExpireId" aria-describedby="dobHelp">
                                            <div class="invalid-feedback d-none"></div>
                                        </div>
                                    </div>
                                </div>
                                <hr />
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12 col-sm-4">
                                            <label for="gender" class="label">Gender</label>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    id="maleRadio" value="option1">
                                                <label class="form-check-label"
                                                    for="maleRadio">Male</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    id="femaleRadio" value="option2">
                                                <label class="form-check-label"
                                                    for="femaleRadio">Female</label>
                                            </div>
                                            <div class="invalid-feedback d-none"></div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <label for="address" class="label">Address</label>
                                            <input type="text" class="form-control" id="address"
                                                value="" name="address" aria-describedby="address">
                                            <div class="invalid-feedback d-none"></div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <label for="address" class="label">City</label>
                                            <input type="text" class="form-control" id="city" value=""
                                                name="city" aria-describedby="city">
                                            <div class="invalid-feedback d-none"></div>
                                        </div>
                                    </div>
                                </div>
                                <hr />
                                <div class="form-group">
                                    <div class="row">
                                        <!-- State/Province -->
                                        <div class="col-12 col-sm-4">
                                            <label for="stateprovince"
                                                class="label">State/Province</label>
                                            <input type="text" class="form-control" id="stateprovince"
                                                name="stateprovince"
                                                aria-describedby="stateprovinceHelp" value="">
                                            <small id="stateprovinceHelp"
                                                class="form-text text-muted mt-2">Assistive
                                                Text</small>
                                        </div>
                                        <!-- Zip/Postal Code -->
                                        <div class="col-12 col-sm-4">
                                            <label for="zipcode" class="label">Zip/Postal
                                                Code</label>
                                            <input type="text" class="form-control" id="zipcode"
                                                name="zipcode" aria-describedby="zipcodeHelp" value="">
                                            <small id="zipcodeHelp"
                                                class="form-text text-muted mt-2">Assistive
                                                Text</small>
                                        </div>
                                        <!--Country-->
                                        <div class="col-12 col-sm-4">
                                            <label for="country_list" class="label">Country</label>
                                            <select class="form-control country_list">
                                                <option>India</option>
                                                <option>USA</option>
                                                <option>UK</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <div class="row">
                                        <!--Home Telephone-->
                                        <div class="col-12 col-sm-4">
                                            <label for="hometelephone" class="label">Home
                                                Telephone</label>
                                            <input type="text" class="form-control" id="hometelephone"
                                                name="hometelephone"
                                                aria-describedby="hometelephoneHelp">
                                        </div>
                                        <!--Mobile-->
                                        <div class="col-12 col-sm-4">
                                            <label for="mobile" class="label">Primary No</label>
                                            <input type="text" class="form-control" id="mobile"
                                                name="mobile" aria-describedby="mobileHelp">
                                        </div>
                                        <!--Work Telephone-->
                                        <div class="col-12 col-sm-4">
                                            <label for="worktelephone" class="label">Alternate
                                                No</label>
                                            <input type="text" class="form-control" id="worktelephone"
                                                name="worktelephone"
                                                aria-describedby="worktelephoneHelp">
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <div class="row">
                                        <!--Marital Status-->
                                        <div class="col-12 col-sm-4">
                                            <label for="maritalstatus" class="label">Marital
                                                Status</label>
                                            <select class="form-control marital_status"
                                                name="marital_status" id="marital_status">
                                                <option value="Merried">Merried</option>
                                                <option value="Un-Merried">Un-Merried</option>
                                            </select>
                                            <small id="maritalstatusHelp"
                                                class="form-text text-muted mt-2">Assistive
                                                Text</small>
                                        </div>
                                        <!--Nationality-->
                                        <div class="col-12 col-sm-4">
                                            <label for="nationality" class="label">Nationality</label>
                                            <select class="form-control nationality" name="nationality"
                                                id="nationality">
                                                <option value="Afghanistan">Afghanistan</option>
                                                <option value="Albania">Albania</option>
                                                <option value="Algeria">Algeria</option>
                                                <option value="Andorra">Andorra</option>
                                                <option value="Angola">Angola</option>
                                                <option value="Antigua and Barbuda">Antigua and
                                                    Barbuda</option>
                                                <option value="Argentina">Argentina</option>
                                                <option value="Bahrain">Bahrain</option>
                                                <option value="Bangladesh">Bangladesh</option>
                                                <option value="Belgium">Belgium</option>
                                            </select>
                                            <small id="nationalityHelp"
                                                class="form-text text-muted mt-2">Assistive
                                                Text</small>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <label for="bloodtypeId" class="label">Blood
                                                Group</label>
                                            <select class="form-control blood_group" name="blood_group"
                                                id="blood_group">
                                                <option value="" disabled>-- Select --</option>
                                                <option value="a">A+</option>
                                                <option value="b">B+</option>
                                                <option value="o">O</option>
                                                <option value="oPlus">O+</option>
                                            </select>
                                            <small id="bloodtypeIdHelp"
                                                class="form-text text-muted mt-2">Assistive
                                                Text</small>
                                        </div>
                                    </div>
                                </div>
                                <hr />
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12">
                                            <label for="uploadphoto" class="label">Upload Your
                                                Photo</label>
                                            <input type="file" class="form-control"
                                                style="height: inherit;" id="uploadphoto" value=""
                                                name="uploadphoto" aria-describedby="uploadphoto">
                                            <div class="invalid-feedback d-none"></div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <button type="submit" class="btn btn-primary btn-sm btn-pink mr-2"
                                    name="save_next">Save & Next</button>
                                <button type="submit" class="btn btn-secondary btn-sm text-uppercase"
                                    name="cancel">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Personal Details End -->
                <!-- Contact Details Start-->
                <div class="tab-pane" id="messages" role="tabpanel">
                    <div class="role_space">
                        <div class="card">
                            <div class="card-header card-header-2">Work Profile</div>
                            <div class="card-body">
                                <form action="post">
                                    <div class="form-group">
                                        <div class="row">
                                            
                                            <div class="col-12 col-sm-4">
                                                <label for="companyname" class="label">Company
                                                    Name</label>
                                                <input type="text" class="form-control" id="companyname"
                                                    name="companyname" aria-describedby="companyname"
                                                    value="">
                                            </div>
                                            <div class="col-12 col-sm-4">
                                                <label for="companywebsite" class="label">Company
                                                    Website</label>
                                                <input type="text" class="form-control"
                                                    id="companywebsite" name="companywebsite"
                                                    aria-describedby="companywebsite" value="">
                                            </div>
                                            <!-- Zip/Postal Code -->
                                            <div class="col-12 col-sm-4">
                                                <label for="email" class="label">Email</label>
                                                <input type="text" class="form-control" id="email"
                                                    name="email" aria-describedby="email" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <hr />
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-12 col-sm-4">
                                                <label for="twk" class="label">Total Work
                                                    Experience</label>
                                                <input type="text" class="form-control" id="twk"
                                                    name="twk" aria-describedby="twk" value="">
                                            </div>
                                            <div class="col-12 col-sm-4">
                                                <label for="clist" class="label">Current Job
                                                    Location</label>
                                                <select class="form-control form-control-sm clist">
                                                    <option>United State </option>
                                                    <option>India</option>
                                                    <option>London</option>
                                                </select>
                                            </div>
                                            <div class="col-12 col-sm-4">
                                                <label for="emplist" class="label">Employment
                                                    type</label>
                                                <select class="form-control form-control-sm emplist">
                                                    <option>Full-time</option>
                                                    <option>Part-time</option>
                                                    <option>Self-employed</option>
                                                    <option>Freelance</option>
                                                    <option>Contract</option>
                                                    <option>Internship</option>
                                                    <option>Apprenticeship</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-12 col-sm-4">
                                                <label for="LanguageKnown" class="label">Language
                                                    Known</label>
                                                <select
                                                    class="form-control form-control-sm LanguageKnown">
                                                    <option>Hindi</option>
                                                    <option>English</option>
                                                    <option>Gujarati</option>
                                                </select>
                                            </div>
                                            <div class="col-12 col-sm-4"></div>
                                            <div class="col-12 col-sm-4"></div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-sm btn-pink mr-2"
                                        name="save">Save</button>
                                    <button type="submit"
                                        class="btn btn-secondary btn-sm text-uppercase"
                                        name="cancel2">Cancel</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Contact Details End-->
                <!-- Add Permissions Start Here -->
                <div class="tab-pane" id="add-permissoin" role="tabpanel">
                    <div class="role_space">
                        <h1 class="user-title">Assigned Roles to Shashikant Parmar</h1>
                        <div class="row accordion_block">
                            <div class="col-12 col-sm-4">
                                <div class="card user-role-card role-card">
                                    <div class="card-header" id="headingZero">
                                        <div
                                            class="custom-control custom-checkbox custom-control-header">
                                            <input type="checkbox" class="custom-control-input"
                                                id="checkAll">
                                            <label class="custom-control-label"
                                                for="checkAll">Permission 1
                                                <span id="count-checked-checkboxes">(0)</span></label>
                                        </div>
                                        <div data-toggle="collapse"
                                            data-target="#collapsibleToggleZero">
                                            <i class="las la-plus"></i></div>
                                    </div>
                                    <div class="card-body collapse" id="collapsibleToggleZero"
                                        aria-labelledby="headingZero">
                                        <div class="mb-3">
                                            <label class="label" for="text">Search:</label>
                                            <input type="text" placeholder="Search permission(s)..."
                                                class="form-control" name="searchItem" id="searchItem">
                                        </div>
                                        <div class="scrollbar scroll-1" id="style-1">
                                            <div class="force-overflow">
                                                <div class="custom-control custom-checkbox">
                                                    <input checked type="checkbox" name="chk[]"
                                                        class="custom-control-input" id="permission1">
                                                    <label class="custom-control-label"
                                                        for="permission1">Create</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input checked type="checkbox" name="chk[]"
                                                        class="custom-control-input" id="permission2">
                                                    <label class="custom-control-label"
                                                        for="permission2">Delete</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input checked type="checkbox" name="chk[]"
                                                        class="custom-control-input" id="permission3">
                                                    <label class="custom-control-label"
                                                        for="permission3">Update</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input checked type="checkbox" name="chk[]"
                                                        class="custom-control-input" id="permission_1">
                                                    <label class="custom-control-label"
                                                        for="permission_1">Permission 1</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input checked type="checkbox" name="chk[]"
                                                        class="custom-control-input" id="permission_2">
                                                    <label class="custom-control-label"
                                                        for="permission_2">Permission 2</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" name="chk[]"
                                                        class="custom-control-input" id="permission_3">
                                                    <label class="custom-control-label"
                                                        for="permission_3">Permission 3</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" name="chk[]"
                                                        class="custom-control-input" id="permission_4">
                                                    <label class="custom-control-label"
                                                        for="permission_4">Permission 4</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" name="chk[]"
                                                        class="custom-control-input" id="permission_5">
                                                    <label class="custom-control-label"
                                                        for="permission_5">Permission 5</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" name="chk[]"
                                                        class="custom-control-input" id="permission_6">
                                                    <label class="custom-control-label"
                                                        for="permission_6">Permission 6</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" name="chk[]"
                                                        class="custom-control-input" id="permission_7">
                                                    <label class="custom-control-label"
                                                        for="permission_7">Permission 7</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" name="chk[]"
                                                        class="custom-control-input" id="permission_8">
                                                    <label class="custom-control-label"
                                                        for="permission_8">Permission 8</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="card user-role-card role-card-2">
                                    <div class="card-header" id="headingTwo">
                                        <div
                                            class="custom-control custom-checkbox custom-control-header">
                                            <input type="checkbox" class="custom-control-input"
                                                id="checkAll_1">
                                            <label class="custom-control-label"
                                                for="checkAll_1">Permission
                                                2</label>
                                        </div>
                                        <div data-toggle="collapse" data-target="#collapsibleToggle_1">
                                            <i class="las la-plus"></i></div>
                                    </div>
                                    <div class="card-body collapse" id="collapsibleToggle_1"
                                        aria-labelledby="headingTwo">
                                        <div class="mb-3">
                                            <label class="label" for="text">Search:</label>
                                            <input type="text" placeholder="Search permission(s)..."
                                                class="form-control" name="searchItem1"
                                                id="searchItem1">
                                        </div>
                                        <div class="scrollbar scroll-2" id="style-1">
                                            <div class="force-overflow">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="permission150">
                                                    <label class="custom-control-label"
                                                        for="permission150">Create</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="permission151">
                                                    <label class="custom-control-label"
                                                        for="permission151">Delete</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="permission152">
                                                    <label class="custom-control-label"
                                                        for="permission152">Update</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="permission153">
                                                    <label class="custom-control-label"
                                                        for="permission153">Permission 1</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="permission154">
                                                    <label class="custom-control-label"
                                                        for="permission154">Permission 2</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="permission155">
                                                    <label class="custom-control-label"
                                                        for="permission155">Permission 3</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="permission156">
                                                    <label class="custom-control-label"
                                                        for="permission156">Permission 4</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="permission157">
                                                    <label class="custom-control-label"
                                                        for="permission157">Permission 5</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="permission158">
                                                    <label class="custom-control-label"
                                                        for="permission158">Permission 6</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="permission159">
                                                    <label class="custom-control-label"
                                                        for="permission159">Permission 7</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="permission160">
                                                    <label class="custom-control-label"
                                                        for="permission160">Permission 8</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="card user-role-card role-card-3">
                                    <div class="card-header" id="headingThird">
                                        <div
                                            class="custom-control custom-checkbox custom-control-header">
                                            <input type="checkbox" class="custom-control-input"
                                                id="checkAll_3">
                                            <label class="custom-control-label"
                                                for="checkAll_3">Permission
                                                3</label>
                                        </div>
                                        <div data-toggle="collapse" data-target="#collapsibleToggle_2">
                                            <i class="las la-plus"></i></div>
                                    </div>
                                    <div class="card-body collapse" id="collapsibleToggle_2"
                                        aria-labelledby="headingThird">
                                        <div class="mb-3">
                                            <label class="label" for="text">Search:</label>
                                            <input type="text" placeholder="Search permission(s)..."
                                                class="form-control" name="searchItem2"
                                                id="searchItem2">
                                        </div>
                                        <div class="scrollbar scroll-3" id="style-1">
                                            <div class="force-overflow">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="permission__1">
                                                    <label class="custom-control-label"
                                                        for="permission__1">Create</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="permission__2">
                                                    <label class="custom-control-label"
                                                        for="permission__2">Delete</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="permission__3">
                                                    <label class="custom-control-label"
                                                        for="permission__3">Update</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="permission__4">
                                                    <label class="custom-control-label"
                                                        for="permission__4">Permission 1</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="permission__5">
                                                    <label class="custom-control-label"
                                                        for="permission__5">Permission 2</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="permission__6">
                                                    <label class="custom-control-label"
                                                        for="permission__6">Permission 3</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="permission__7">
                                                    <label class="custom-control-label"
                                                        for="permission__7">Permission 4</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="permission__8">
                                                    <label class="custom-control-label"
                                                        for="permission__8">Permission 5</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="permission__9">
                                                    <label class="custom-control-label"
                                                        for="permission__9">Permission 6</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="permission__10">
                                                    <label class="custom-control-label"
                                                        for="permission__10">Permission 7</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="permission__11">
                                                    <label class="custom-control-label"
                                                        for="permission__11">Permission 8</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Add Permissions End Here -->
            </div>
            <div class="list-group" id="myList" role="tablist">
                <a class="list-group-item list-group-item-action active" data-toggle="tab"
                    href="#profile" role="tab">Personal Details</a>
                <a class="list-group-item list-group-item-action" data-toggle="tab" href="#messages"
                    role="tab">Work Profile</a>
                <a class="list-group-item list-group-item-action" data-toggle="tab"
                    href="#add-permissoin" role="tab">Add Permission</a>
            </div>
        </div>
    </div>

</div>
            
@stop