@extends('pages.admin.layouts.app')
@section('content')
<div class="app-roles">
    <div class="app-roles-title-box rounded d-shadow">
        <h1 class="title-roles left ml-3">Filter List</h1>
        <div class="right">
            <div class="input-group p-1 border rounded-lg">
                <div class="input-group-prepend mr-2">
                    <select class="select" multiple id="department">
                        <option>Administator</option>
                        <option>Co-ordinator</option>
                        <option>Supervisior</option>
                        <option>Clinician</option>
                        <option>Patient</option>
                    </select>
                </div>
                <div class="input-group-prepend mr-2">
                    <select class="select" multiple id="designation">
                        <option>Physiotherapy</option>
                        <option>Special Assistance</option>
                        <option>Nurse Practitioner</option>
                        <option>Doctor</option>
                        <option>Medical Assistance</option>
                        <option>Physician Assistance</option>
                    </select>
                </div>
                <div class="input-group-prepend mr-2">
                    <select class="select" multiple id="rolesOfUser">
                        <option>Shashikant Parmar</option>
                        <option>Ishani</option>
                        <option>Akshita</option>
                        <option>Hiren</option>
                        <option>Nikunj</option>
                        <option>Mayank</option>
                        <option>Sunil</option>
                        <option>Dhaval</option>
                        <option>Shailesh</option>
                        <option>Jayendra</option>
                        <option>Hiten</option>
                        <option>Abdul</option>
                    </select>
                </div>
                <input type="text" placeholder="Search by permissions"
                    class="form-control form-control-green rounded"
                    aria-label="Text input with dropdown button">
            </div>
        </div>
    </div>
    <div class="roles-block">
        <div class="tab-content">
            <div class="tab-pane active" id="home" role="tabpanel">
                <div class="role_space">
                    <h1 class="user-title">Assigned Roles to Shashikant Parmar</h1>
                    <div class="row accordion mb-5">
                        <div class="col-12 col-sm-4">
                            <div class="card user-role-card role-card">
                                <div class="card-header" id="headingZero">
                                    <div class="custom-control custom-checkbox custom-control-header">
                                        <input type="checkbox" class="custom-control-input"
                                            id="checkAll">
                                        <label class="custom-control-label" for="checkAll">Permission 1
                                            <span id="count-checked-checkboxes">(0)</span></label>
                                    </div>
                                    <div data-toggle="collapse" data-target="#collapsibleToggleZero">
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
                                    <div class="custom-control custom-checkbox custom-control-header">
                                        <input type="checkbox" class="custom-control-input"
                                            id="checkAll_1">
                                        <label class="custom-control-label" for="checkAll_1">Permission
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
                                            class="form-control" name="searchItem1" id="searchItem1">
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
                                    <div class="custom-control custom-checkbox custom-control-header">
                                        <input type="checkbox" class="custom-control-input"
                                            id="checkAll_3">
                                        <label class="custom-control-label" for="checkAll_3">Permission
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
                                            class="form-control" name="searchItem2" id="searchItem2">
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
            <div class="tab-pane" id="profile" role="tabpanel">
                <div class="role_space">
                    user 2
                </div>
            </div>
            <div class="tab-pane" id="messages" role="tabpanel">
                <div class="role_space">
                    user 3
                </div>
            </div>
            <div class="tab-pane" id="settings" role="tabpanel">
                <div class="role_space">
                    user 4
                </div>
            </div>
        </div>
        <div class="list-group list-box" id="myList" role="tablist">
            <a class="list-group-item list-group-item-action active" data-toggle="list" href="#home"
                role="tab">Clinician</a>
            <a class="list-group-item list-group-item-action" data-toggle="list" href="#profile"
                role="tab">Administration</a>
            <a class="list-group-item list-group-item-action" data-toggle="list" href="#messages"
                role="tab">Co-Ordinator</a>
            <a class="list-group-item list-group-item-action" data-toggle="list" href="#settings"
                role="tab">Patient</a>
        </div>
    </div>
</div>
@stop