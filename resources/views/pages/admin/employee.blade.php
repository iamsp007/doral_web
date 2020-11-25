@extends('layouts.admin.default')
@section('content')
<div class="app-roles">
    <!-- View Employee List HTML -->
    <div class="pt-2">
        <table id="employee-table" class="table">
            <thead>
                <tr>
                    <th><input type="checkbox" class="selectall"></th>
                    <th>Fullname</th>
                    <th>DOB</th>
                    <th>Blood Group</th>
                    <th>Designation</th>
                    <th>Email</th>
                    <th>Nationality</th>
                    <th>Permission</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><input type="checkbox"></td>
                    <td class="text-green">Airi Satou</td>
                    <td>28/08/2022</td>
                    <td>B+</td>
                    <td>Physician</td>
                    <td>example@example.com</td>
                    <td>American</td>
                    <td>Admin</td>
                    <td>
                        <div class="d-flex">
                            <a href="employee_user_profile.html"
                                class="btn btn-primary btn-view shadow-sm btn--sm mr-2"
                                data-toggle="tooltip" data-placement="left" title="View User"><i
                                    class="las la-binoculars"></i></a>
                            <a href="employee_add.html" class="btn btn-add shadow-sm btn--sm mr-2"
                                data-toggle="tooltip" data-placement="left" title="Edit User"><i
                                    class="las la-user-edit"></i></a>
                            <button type="button" class="btn btn-danger shadow-sm btn--sm mr-2"
                                data-toggle="tooltip" data-placement="left" title="Deactivate User"><i
                                    class="las la-user-times"></i></button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><input type="checkbox"></td>
                    <td class="text-green">Airi Satou</td>
                    <td>28/08/2022</td>
                    <td>B+</td>
                    <td>Physician</td>
                    <td>example@example.com</td>
                    <td>American</td>
                    <td>Supervisor</td>
                    <td>
                        <div class="d-flex">
                            <a href="employee_user_profile.html"
                                class="btn btn-primary btn-view shadow-sm btn--sm mr-2"
                                data-toggle="tooltip" data-placement="left" title="View User"><i
                                    class="las la-binoculars"></i></a>
                            <button type="button" class="btn btn-add shadow-sm btn--sm mr-2"
                                data-toggle="tooltip" data-placement="left" title="Edit User"><i
                                    class="las la-user-edit"></i></button>
                            <button type="button" class="btn btn-danger shadow-sm btn--sm mr-2"
                                data-toggle="tooltip" data-placement="left" title="Deactivate User"><i
                                    class="las la-user-times"></i></button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><input type="checkbox"></td>
                    <td class="text-green">Airi Satou</td>
                    <td>28/08/2022</td>
                    <td>B+</td>
                    <td>Physician</td>
                    <td>example@example.com</td>
                    <td>American</td>
                    <td>Clinician</td>
                    <td>
                        <div class="d-flex">
                            <a href="employee_user_profile.html"
                                class="btn btn-primary btn-view shadow-sm btn--sm mr-2"
                                data-toggle="tooltip" data-placement="left" title="View User"><i
                                    class="las la-binoculars"></i></a>
                            <button type="button" class="btn btn-add shadow-sm btn--sm mr-2"
                                data-toggle="tooltip" data-placement="left" title="Edit User"><i
                                    class="las la-user-edit"></i></button>
                            <button type="button" class="btn btn-danger shadow-sm btn--sm mr-2"
                                data-toggle="tooltip" data-placement="left" title="Deactivate User"><i
                                    class="las la-user-times"></i></button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><input type="checkbox"></td>
                    <td class="text-green">Airi Satou</td>
                    <td>28/08/2022</td>
                    <td>B+</td>
                    <td>Physician</td>
                    <td>example@example.com</td>
                    <td>American</td>
                    <td>Referral</td>
                    <td>
                        <div class="d-flex">
                            <a href="employee_user_profile.html"
                                class="btn btn-primary btn-view shadow-sm btn--sm mr-2"
                                data-toggle="tooltip" data-placement="left" title="View User"><i
                                    class="las la-binoculars"></i></a>
                            <button type="button" class="btn btn-add shadow-sm btn--sm mr-2"
                                data-toggle="tooltip" data-placement="left" title="Edit User"><i
                                    class="las la-user-edit"></i></button>
                            <button type="button" class="btn btn-danger shadow-sm btn--sm mr-2"
                                data-toggle="tooltip" data-placement="left" title="Deactivate User"><i
                                    class="las la-user-times"></i></button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><input type="checkbox"></td>
                    <td class="text-green">Airi Satou</td>
                    <td>28/08/2022</td>
                    <td>B+</td>
                    <td>Physician</td>
                    <td>example@example.com</td>
                    <td>American</td>
                    <td>Co-ordinator</td>
                    <td>
                        <div class="d-flex">
                            <a href="employee_user_profile.html"
                                class="btn btn-primary btn-view shadow-sm btn--sm mr-2"
                                data-toggle="tooltip" data-placement="left" title="View User"><i
                                    class="las la-binoculars"></i></a>
                            <button type="button" class="btn btn-add shadow-sm btn--sm mr-2"
                                data-toggle="tooltip" data-placement="left" title="Edit User"><i
                                    class="las la-user-edit"></i></button>
                            <button type="button" class="btn btn-danger shadow-sm btn--sm mr-2"
                                data-toggle="tooltip" data-placement="left" title="Deactivate User"><i
                                    class="las la-user-times"></i></button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><input type="checkbox"></td>
                    <td class="text-green">Airi Satou</td>
                    <td>28/08/2022</td>
                    <td>B+</td>
                    <td>Physician</td>
                    <td>example@example.com</td>
                    <td>American</td>
                    <td>Admin</td>
                    <td>
                        <div class="d-flex">
                            <a href="employee_user_profile.html"
                                class="btn btn-primary btn-view shadow-sm btn--sm mr-2"
                                data-toggle="tooltip" data-placement="left" title="View User"><i
                                    class="las la-binoculars"></i></a>
                            <button type="button" class="btn btn-add shadow-sm btn--sm mr-2"
                                data-toggle="tooltip" data-placement="left" title="Edit User"><i
                                    class="las la-user-edit"></i></button>
                            <button type="button" class="btn btn-danger shadow-sm btn--sm mr-2"
                                data-toggle="tooltip" data-placement="left" title="Deactivate User"><i
                                    class="las la-user-times"></i></button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><input type="checkbox"></td>
                    <td class="text-green">Airi Satou</td>
                    <td>28/08/2022</td>
                    <td>B+</td>
                    <td>Physician</td>
                    <td>example@example.com</td>
                    <td>American</td>
                    <td>Supervisor</td>
                    <td>
                        <div class="d-flex">
                            <a href="employee_user_profile.html"
                                class="btn btn-primary btn-view shadow-sm btn--sm mr-2"
                                data-toggle="tooltip" data-placement="left" title="View User"><i
                                    class="las la-binoculars"></i></a>
                            <button type="button" class="btn btn-add shadow-sm btn--sm mr-2"
                                data-toggle="tooltip" data-placement="left" title="Edit User"><i
                                    class="las la-user-edit"></i></button>
                            <button type="button" class="btn btn-danger shadow-sm btn--sm mr-2"
                                data-toggle="tooltip" data-placement="left" title="Deactivate User"><i
                                    class="las la-user-times"></i></button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><input type="checkbox"></td>
                    <td class="text-green">Airi Satou</td>
                    <td>28/08/2022</td>
                    <td>B+</td>
                    <td>Physician</td>
                    <td>example@example.com</td>
                    <td>American</td>
                    <td>Clinician</td>
                    <td>
                        <div class="d-flex">
                            <a href="employee_user_profile.html"
                                class="btn btn-primary btn-view shadow-sm btn--sm mr-2"
                                data-toggle="tooltip" data-placement="left" title="View User"><i
                                    class="las la-binoculars"></i></a>
                            <button type="button" class="btn btn-add shadow-sm btn--sm mr-2"
                                data-toggle="tooltip" data-placement="left" title="Edit User"><i
                                    class="las la-user-edit"></i></button>
                            <button type="button" class="btn btn-danger shadow-sm btn--sm mr-2"
                                data-toggle="tooltip" data-placement="left" title="Deactivate User"><i
                                    class="las la-user-times"></i></button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><input type="checkbox"></td>
                    <td class="text-green">Airi Satou</td>
                    <td>28/08/2022</td>
                    <td>B+</td>
                    <td>Physician</td>
                    <td>example@example.com</td>
                    <td>American</td>
                    <td>Referral</td>
                    <td>
                        <div class="d-flex">
                            <a href="employee_user_profile.html"
                                class="btn btn-primary btn-view shadow-sm btn--sm mr-2"
                                data-toggle="tooltip" data-placement="left" title="View User"><i
                                    class="las la-binoculars"></i></a>
                            <button type="button" class="btn btn-add shadow-sm btn--sm mr-2"
                                data-toggle="tooltip" data-placement="left" title="Edit User"><i
                                    class="las la-user-edit"></i></button>
                            <button type="button" class="btn btn-danger shadow-sm btn--sm mr-2"
                                data-toggle="tooltip" data-placement="left" title="Deactivate User"><i
                                    class="las la-user-times"></i></button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><input type="checkbox"></td>
                    <td class="text-green">Airi Satou</td>
                    <td>28/08/2022</td>
                    <td>B+</td>
                    <td>Physician</td>
                    <td>example@example.com</td>
                    <td>American</td>
                    <td>Co-ordinator</td>
                    <td>
                        <div class="d-flex">
                            <a href="employee_user_profile.html"
                                class="btn btn-primary btn-view shadow-sm btn--sm mr-2"
                                data-toggle="tooltip" data-placement="left" title="View User"><i
                                    class="las la-binoculars"></i></a>
                            <button type="button" class="btn btn-add shadow-sm btn--sm mr-2"
                                data-toggle="tooltip" data-placement="left" title="Edit User"><i
                                    class="las la-user-edit"></i></button>
                            <button type="button" class="btn btn-danger shadow-sm btn--sm mr-2"
                                data-toggle="tooltip" data-placement="left" title="Deactivate User"><i
                                    class="las la-user-times"></i></button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><input type="checkbox"></td>
                    <td class="text-green">Airi Satou</td>
                    <td>28/08/2022</td>
                    <td>B+</td>
                    <td>Physician</td>
                    <td>example@example.com</td>
                    <td>American</td>
                    <td>Admin</td>
                    <td>
                        <div class="d-flex">
                            <a href="employee_user_profile.html"
                                class="btn btn-primary btn-view shadow-sm btn--sm mr-2"
                                data-toggle="tooltip" data-placement="left" title="View User"><i
                                    class="las la-binoculars"></i></a>
                            <button type="button" class="btn btn-add shadow-sm btn--sm mr-2"
                                data-toggle="tooltip" data-placement="left" title="Edit User"><i
                                    class="las la-user-edit"></i></button>
                            <button type="button" class="btn btn-danger shadow-sm btn--sm mr-2"
                                data-toggle="tooltip" data-placement="left" title="Deactivate User"><i
                                    class="las la-user-times"></i></button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><input type="checkbox"></td>
                    <td class="text-green">Airi Satou</td>
                    <td>28/08/2022</td>
                    <td>B+</td>
                    <td>Physician</td>
                    <td>example@example.com</td>
                    <td>American</td>
                    <td>Supervisor</td>
                    <td>
                        <div class="d-flex">
                            <a href="employee_user_profile.html"
                                class="btn btn-primary btn-view shadow-sm btn--sm mr-2"
                                data-toggle="tooltip" data-placement="left" title="View User"><i
                                    class="las la-binoculars"></i></a>
                            <button type="button" class="btn btn-add shadow-sm btn--sm mr-2"
                                data-toggle="tooltip" data-placement="left" title="Edit User"><i
                                    class="las la-user-edit"></i></button>
                            <button type="button" class="btn btn-danger shadow-sm btn--sm mr-2"
                                data-toggle="tooltip" data-placement="left" title="Deactivate User"><i
                                    class="las la-user-times"></i></button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><input type="checkbox"></td>
                    <td class="text-green">Airi Satou</td>
                    <td>28/08/2022</td>
                    <td>B+</td>
                    <td>Physician</td>
                    <td>example@example.com</td>
                    <td>American</td>
                    <td>Clinician</td>
                    <td>
                        <div class="d-flex">
                            <a href="employee_user_profile.html"
                                class="btn btn-primary btn-view shadow-sm btn--sm mr-2"
                                data-toggle="tooltip" data-placement="left" title="View User"><i
                                    class="las la-binoculars"></i></a>
                            <button type="button" class="btn btn-add shadow-sm btn--sm mr-2"
                                data-toggle="tooltip" data-placement="left" title="Edit User"><i
                                    class="las la-user-edit"></i></button>
                            <button type="button" class="btn btn-danger shadow-sm btn--sm mr-2"
                                data-toggle="tooltip" data-placement="left" title="Deactivate User"><i
                                    class="las la-user-times"></i></button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><input type="checkbox"></td>
                    <td class="text-green">Airi Satou</td>
                    <td>28/08/2022</td>
                    <td>B+</td>
                    <td>Physician</td>
                    <td>example@example.com</td>
                    <td>American</td>
                    <td>Referral</td>
                    <td>
                        <div class="d-flex">
                            <a href="employee_user_profile.html"
                                class="btn btn-primary btn-view shadow-sm btn--sm mr-2"
                                data-toggle="tooltip" data-placement="left" title="View User"><i
                                    class="las la-binoculars"></i></a>
                            <button type="button" class="btn btn-add shadow-sm btn--sm mr-2"
                                data-toggle="tooltip" data-placement="left" title="Edit User"><i
                                    class="las la-user-edit"></i></button>
                            <button type="button" class="btn btn-danger shadow-sm btn--sm mr-2"
                                data-toggle="tooltip" data-placement="left" title="Deactivate User"><i
                                    class="las la-user-times"></i></button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><input type="checkbox"></td>
                    <td class="text-green">Airi Satou</td>
                    <td>28/08/2022</td>
                    <td>B+</td>
                    <td>Physician</td>
                    <td>example@example.com</td>
                    <td>American</td>
                    <td>Co-ordinator</td>
                    <td>
                        <div class="d-flex">
                            <a href="employee_user_profile.html"
                                class="btn btn-primary btn-view shadow-sm btn--sm mr-2"
                                data-toggle="tooltip" data-placement="left" title="View User"><i
                                    class="las la-binoculars"></i></a>
                            <button type="button" class="btn btn-add shadow-sm btn--sm mr-2"
                                data-toggle="tooltip" data-placement="left" title="Edit User"><i
                                    class="las la-user-edit"></i></button>
                            <button type="button" class="btn btn-danger shadow-sm btn--sm mr-2"
                                data-toggle="tooltip" data-placement="left" title="Deactivate User"><i
                                    class="las la-user-times"></i></button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@stop