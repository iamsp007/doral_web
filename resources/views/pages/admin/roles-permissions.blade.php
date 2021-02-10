@extends('pages.layouts.app')
@section('title','Admin - Roles & Permissions')
@section('pageTitleSection')
    Admin - Roles & Permissions
@endsection
@section('content')
    <div class="app-roles">
        <div class="app-roles-title-box rounded d-shadow">
            <h1 class="title-roles left ml-3">Filter List</h1>
            <div class="right">
                <div class="input-group p-1 border rounded-lg">
                    <div class="input-group-prepend mr-2">
                        <!-- <select id="department" class="form-control select" multiple></select> -->
                        <select name="" class="form-control select" id="department" multiple>
                            <option value="">Admin</option>
                            <option value="">Clinician</option>
                            <option value="">Co-Ordinator</option>
                            <option value="">Partners</option>
                            <option value="">Patient</option>
                            <option value="">Referral</option>
                            <option value="">Supervisior</option>
                        </select>
                    </div>
                    <div class="input-group-prepend mr-2">
                        <!-- <select id="designation" class="form-control select" multiple></select> -->
                        <select name="" class="form-control select" id="designation" multiple>
                            <option value="">Physiotherapy</option>
                            <option value="">Special Assistance</option>
                            <option value="">Nurse Practitioner</option>
                            <option value="">Doctor</option>
                            <option value="">Medical Assistance</option>
                            <option value="">Physician Assistance</option>
                        </select>
                    </div>
                    <div class="input-group-prepend mr-2">
                        <!-- <select id="rolesOfUser" class="form-control select" multiple></select> -->
                        <select name="" class="form-control select" id="rolesOfUser" multiple>
                            <option value="">Jaini</option>
                            <option value="">Akshita</option>
                            <option value="">Jenny</option>
                            <option value="">Shruti</option>
                            <option value="">Manisha</option>
                        </select>
                    </div>
                    <input type="text" placeholder="Search by permissions"
                        class="form-control form-control-green form-control-lg rounded"
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
                                    <div class="card-header d-flex align-items-center" id="headingZero">
                                        <div>
                                            <label>
                                                <input type="checkbox" id="checkAll" />
                                                <span>Admin</span>
                                            </label>
                                        </div>
                                        <div data-toggle="collapse" data-target="#collapsibleToggleZero">
                                            <i class="las la-plus"></i>
                                        </div>
                                    </div>
                                    <div class="card-body collapse" id="collapsibleToggleZero"
                                        aria-labelledby="headingZero">
                                        <div class="mb-3">
                                            <label class="label" for="text">Search:</label>
                                            <input type="text" placeholder="Search permission(s)..."
                                                class="form-control" name="searchItem" id="searchItem">
                                        </div>
                                        <div class="scrollbar scroll-1 style-1">
                                            <div class="force-overflow">
                                                <div>
                                                    <label>
                                                        <input type="checkbox" />
                                                        <span>Create</span>
                                                    </label>
                                                </div>
                                                <div>
                                                    <label>
                                                        <input type="checkbox" />
                                                        <span>Delete</span>
                                                    </label>
                                                </div>
                                                <div>
                                                    <label>
                                                        <input type="checkbox" />
                                                        <span>Update</span>
                                                    </label>
                                                </div>
                                                <div>
                                                    <label>
                                                        <input type="checkbox" />
                                                        <span>Permission 1</span>
                                                    </label>
                                                </div>
                                                <div>
                                                    <label>
                                                        <input type="checkbox" />
                                                        <span>Permission 2</span>
                                                    </label>
                                                    <div>
                                                        <label>
                                                            <input type="checkbox" />
                                                            <span>Permission 3</span>
                                                        </label>
                                                    </div>
                                                    <div>
                                                        <label>
                                                            <input type="checkbox" />
                                                            <span>Permission 4</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="card user-role-card role-card-2">
                                    <div class="card-header d-flex align-items-center" id="headingTwo">
                                        <div>
                                            <label>
                                                <input type="checkbox" id="checkAll_1" />
                                                <span>Clinician</span>
                                            </label>
                                        </div>
                                        <div data-toggle="collapse" data-target="#collapsibleToggle_1">
                                            <i class="las la-plus"></i>
                                        </div>
                                    </div>
                                    <div class="card-body collapse" id="collapsibleToggle_1"
                                        aria-labelledby="headingTwo">
                                        <div class="mb-3">
                                            <label class="label" for="text">Search:</label>
                                            <input type="text" placeholder="Search permission(s)..."
                                                class="form-control" name="searchItem1" id="searchItem1">
                                        </div>
                                        <div class="scrollbar scroll-2 style-1">
                                            <div class="force-overflow">
                                                <div>
                                                    <label>
                                                        <input type="checkbox" />
                                                        <span>Create</span>
                                                    </label>
                                                </div>
                                                <div>
                                                    <label>
                                                        <input type="checkbox" />
                                                        <span>Delete</span>
                                                    </label>
                                                </div>
                                                <div>
                                                    <label>
                                                        <input type="checkbox" />
                                                        <span>Update</span>
                                                    </label>
                                                </div>
                                                <div>
                                                    <label>
                                                        <input type="checkbox" />
                                                        <span>Permission 1</span>
                                                    </label>
                                                </div>
                                                <div>
                                                    <label>
                                                        <input type="checkbox" />
                                                        <span>Permission 2</span>
                                                    </label>
                                                    <div>
                                                        <label>
                                                            <input type="checkbox" />
                                                            <span>Permission 3</span>
                                                        </label>
                                                    </div>
                                                    <div>
                                                        <label>
                                                            <input type="checkbox" />
                                                            <span>Permission 4</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="card user-role-card role-card-3">
                                    <div class="card-header d-flex align-items-center" id="headingThird">
                                        <div>
                                            <label>
                                                <input type="checkbox" id="checkAll_3" />
                                                <span>Co-Ordinator</span>
                                            </label>
                                        </div>
                                        <div data-toggle="collapse" data-target="#collapsibleToggle_2">
                                            <i class="las la-plus"></i>
                                        </div>
                                    </div>
                                    <div class="card-body collapse" id="collapsibleToggle_2"
                                        aria-labelledby="headingThird">
                                        <div class="mb-3">
                                            <label class="label" for="text">Search:</label>
                                            <input type="text" placeholder="Search permission(s)..."
                                                class="form-control" name="searchItem2" id="searchItem2">
                                        </div>
                                        <div class="scrollbar scroll-3 style-1">
                                            <div class="force-overflow">
                                                <div>
                                                    <label>
                                                        <input type="checkbox" />
                                                        <span>Create</span>
                                                    </label>
                                                </div>
                                                <div>
                                                    <label>
                                                        <input type="checkbox" />
                                                        <span>Delete</span>
                                                    </label>
                                                </div>
                                                <div>
                                                    <label>
                                                        <input type="checkbox" />
                                                        <span>Update</span>
                                                    </label>
                                                </div>
                                                <div>
                                                    <label>
                                                        <input type="checkbox" />
                                                        <span>Permission 1</span>
                                                    </label>
                                                </div>
                                                <div>
                                                    <label>
                                                        <input type="checkbox" />
                                                        <span>Permission 2</span>
                                                    </label>
                                                    <div>
                                                        <label>
                                                            <input type="checkbox" />
                                                            <span>Permission 3</span>
                                                        </label>
                                                    </div>
                                                    <div>
                                                        <label>
                                                            <input type="checkbox" />
                                                            <span>Permission 4</span>
                                                        </label>
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
@endsection
@push('scripts')
<script src="{{ asset('assets/js/app.admin.roles.permission.js') }}"></script>
@endpush