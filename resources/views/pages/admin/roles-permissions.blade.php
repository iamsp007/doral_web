@extends('pages.layouts.app')
@section('title','Admin - Roles & Permissions')
@section('pageTitleSection')
    Admin - Roles & Permissions
@endsection
@section('content')
    <div class="app-roles roles_permissions" id="roles-permissions">
        <div class="app-roles-title-box rounded d-shadow">
            <h1 class="title-roles left ml-3">Filter List</h1>
            <div class="right">
                <div class="input-group p-1 border rounded-lg">
                    <div class="input-group-prepend mr-2">
                        <!-- <select id="department" class="form-control select" multiple></select> -->
                        <select name="roles[]" class="form-control select role_department" id="department" multiple>
                            @foreach($roles as $role)
                                <option value="{{ $role['id'] }}">{{ ucfirst($role['name']) }}</option>
                            @endforeach
                        </select>
                    </div>
                    {{-- <div class="input-group-prepend mr-2">
                        <select name="" class="form-control select" id="designation" multiple>
                            <option value="">Physiotherapy</option>
                            <option value="">Special Assistance</option>
                            <option value="">Nurse Practitioner</option>
                            <option value="">Doctor</option>
                            <option value="">Medical Assistance</option>
                            <option value="">Physician Assistance</option>
                        </select>
                    </div> --}}
                    <div class="input-group-prepend mr-2 ">
                        <select name="" class="form-control select rolesOfUser" id="rolesOfUser" multiple>
                            <option value=""></option>
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
                
            </div>
            <div class="list-group list-box" id="myList" role="tablist">

            </div>
        </div>
    </div>
@endsection
@push('scripts')
<script src="{{ asset('assets/js/app.admin.roles.permission.js') }}"></script>
<script>
    $(document).ready(function () {
        $('.role_department').on('change', function(e) {
            $.ajaxSetup({
                headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var csrf_token = $('meta[name="csrf-token"]').attr('content');

            var role_ids = $(e.target).val();

            $.ajax({
                url:'{{route('admin.getRolePermission')}}',
                method:"POST",
                data:{'role_ids':role_ids},
                dataType:'JSON',
                success:function(response)
                {
                    // $('.roles_permissions').html(response);
                    $('.roles_permissions').html(response);
                    if(response.status === true) {
                      // alertText('Profile Information updated successfully','success');
                    } else {
                      
                    }
                }
           })
        });
    });
</script>
@endpush