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
                    <!--<th>Blood Group</th>-->
                    <th>Role</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Permission</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if(isset($record) && count($record) > 0)
                @foreach($record['employee'] as $raw)
                <tr>
                    <td><input type="checkbox"></td>
                    <td class="text-green">{{$raw['first_name']}} {{$raw['last_name']}} </td>
                    <td>{{$raw['dob']}}</td>
                    <!--<td>B+</td>-->
                    <td>
                        @if($raw['role_id'] == 2)
                        Admin
                        @elseif($raw['role_id'] == 4)
                        Co-ordinator
                        @elseif($raw['role_id'] == 5)
                        Supervisor
                        @endif
                    </td>
                    <td>{{$raw['email']}}</td>
                    <td>{{$raw['phone']}}</td>
                    <td>{{$raw['employeement_type']}}</td>
                    <td>
                        <div class="d-flex">
                            <a href="{{ url('/admin/employee-view/'.$raw['id']) }}"
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
                @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>
@stop