@extends('layouts.admin.default')
@section('content')
<div class="row">
    <div class="col-12 col-sm-5">
        <div class="accordion" id="profileAccordion">
            <!-- Perfosnal Information Start Here -->
            <div class="app-card" style="min-height: auto;">
                <div class="card-header pt-3 pb-3" id="step1">
                    <div class="d-flex justify-content-between" data-toggle="collapse" data-target="#collapseInfo" aria-expanded="true"
                        aria-controls="collapseInfo">
                        Personal Information
                        <i class="las la-plus"></i>
                    </div>
                </div>
                <div class="card-body collapse" id="collapseInfo" aria-labelledby="collapseInfo"
                    data-parent="#profileAccordion">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <ul class="form-data">
                                <li>
                                    <label class="label">First Name:</label>
                                    <p class="t5">{{$record[0]['first_name']}}</p>
                                </li>
                                <li>
                                    <label class="label">Date of Birth:</label>
                                    <p class="t5">{{$record[0]['dob']}}</p>
                                </li>
                                <li>
                                    <label class="label">Address:</label>
                                    <p class="t5">{{$record[0]['address1']}}</p>
                                </li>
                                <li>
                                    <label class="label">State/Province:</label>
                                    <p class="t5">{{$record[0]['state']}}</p>
                                </li>
                                <li>
                                    <label class="label">Country:</label>
                                    <p class="t5">{{$record[0]['country']}}</p>
                                </li>
                                <li>
                                    <label class="label">Primary No:</label>
                                    <p class="t5">{{$record[0]['phone']}} </p>
                                </li>
                                <li>
                                    <label class="label">Marital Status:</label>
                                    <p class="t5">{{$record[0]['marital_status']}}</p>
                                </li>
                                <li>
                                    <label class="label">Blood Group:</label>
                                    <p class="t5">{{$record[0]['blood_group']}}</p>
                                </li>
                            </ul>
                        </div>
                        <div class="col-12 col-sm-6">
                            <ul class="form-data">
                                <li>
                                    <label class="label">Last Name:</label>
                                    <p class="t5">{{$record[0]['last_name']}}</p>
                                </li>
                                <li>
                                    <label class="label">Gender:</label>
                                    <p class="t5">{{$record[0]['gender']}}</p>
                                </li>
                                <li>
                                    <label class="label">City:</label>
                                    <p class="t5">{{$record[0]['city']}}</p>
                                </li>
                                <li>
                                    <label class="label">Zip/Postal Code:</label>
                                    <p class="t5">{{$record[0]['zip']}}</p>
                                </li>
                                <li>
                                    <label class="label">Home Telephone:</label>
                                    <p class="t5">{{$record[0]['home_phone']}}</p>
                                </li>
                                <li>
                                    <label class="label">Alternate No:</label>
                                    <p class="t5">{{$record[0]['alternate_phone']}}</p>
                                </li>
                                <li>
                                    <label class="label">Email:</label>
                                    <p class="t5">{{$record[0]['email']}}</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Perfosnal Information End Here -->
            <!-- Work Profile Start Here -->
            <div class="app-card mt-2" style="min-height: auto;">
                <div class="card-header pt-3 pb-3" id="step2">
                    <div class="d-flex justify-content-between" data-toggle="collapse" data-target="#collapseWork" aria-expanded="true"
                        aria-controls="collapseOne">
                        Work Profile
                        <i class="las la-plus"></i>
                    </div>
                </div>
                <div class="card-body collapse show" id="collapseWork" aria-labelledby="collapseWork"
                    data-parent="#profileAccordion">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <ul class="form-data">
                                <li>
                                    <label class="label">Current Job Location:</label>
                                    <p class="t5">{{$record[0]['current_job_location']}}</p>
                                </li>
                                <li>
                                    <label class="label">Language Known:</label>
                                    <p class="t5">{{$record[0]['language_known']}}</p>
                                </li>
                                <li>
                                    <label class="label">Employment type:</label>
                                    <p class="t5">{{$record[0]['employeement_type']}}</p>
                                </li>
                            </ul>
                        </div>
                        <div class="col-12 col-sm-6">
                            <ul class="form-data">
                                <li>
                                    <label class="label">Designation:</label>
                                    <p class="t5">
                                        @if($record[0]['designation_id'] == 1)
                                        Nurse Practioner
                                        @elseif($record[0]['designation_id'] == 2)
                                        Medical Assistant
                                        @elseif($record[0]['designation_id'] == 3)
                                        Physician
                                        @elseif($record[0]['designation_id'] == 4)
                                        Special assistant
                                        @endif
                                    </p>
                                </li>
                                
                                <li>
                                    <label class="label">Total Work Experience:</label>
                                    <p class="t5">{{$record[0]['experience']}}</p>
                                </li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Work Profile End Here -->
        </div>
    </div>
    <div class="col-12 col-sm-7">
        <div class="row">
            <div class="col-12">
                <div class="app-card">
                    <div class="user-photo">
                        <div class="userContent">
                            <div>
                                <img src="{{asset('assets/img/user/01.png') }}" class="user_photo" alt=""
                                    srcset="{{asset('assets/img/user/01.png') }}">
                            </div>
                            <div class="user-info">
                                <h1 class="title">{{ $record[0]['first_name']}} {{ $record[0]['last_name'] }}</h1>
                                <p>
                                    @if($record[0]['designation_id'] == 1)
                                    Nurse Practioner
                                    @elseif($record[0]['designation_id'] == 2)
                                    Medical Assistant
                                    @elseif($record[0]['designation_id'] == 3)
                                    Physician
                                    @elseif($record[0]['designation_id'] == 4)
                                    Special assistant
                                    @endif
                                </p>
                                <p>{{$record[0]['state']}} - {{$record[0]['country']}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-end align-items-center">
                            <button type="submit" class="btn btn-primary btn-sm btn-pink"
                                name="save_next">Edit
                                Profle</button>
                        </div>
                    </div>
                </div>
                <!-- Permission Start Here -->
                <div class="app-card mt-4" style="min-height: auto;">
                    <div class="card-header pt-3 pb-3">
                        Permissions
                    </div>
                    <div class="card-body">
                        <div class="row accordion gutter">
                            <div class="col-12 col-sm-4">
                                <div class="card user-role-card role-card">
                                    <div class="card-header user-card-header" id="headingZero">
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
                                    <div class="card-header user-card-header" id="headingTwo">
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
                                    <div class="card-header user-card-header" id="headingThird">
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
                <!-- Permission End Here -->
            </div>
        </div>
    </div>
</div>
@stop