<link rel="stylesheet" href="{{ asset('assets/css/tail.select-default.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
 
<div class="app-roles-title-box rounded d-shadow">
    <h1 class="title-roles left ml-3">Filter List</h1>
    <div class="right">
        <div class="input-group p-1 border rounded-lg">
            <div class="input-group-prepend mr-2">
                <select name="roles[]" class="form-control select role_department" id="department" multiple>
                    @foreach($roles as $role)
                        <option value="{{ $role['id'] }}" @if(in_array($role['id'], $selectedRoles)) selected @endif>{{ ucfirst($role['name']) }}</option>
                    @endforeach
                </select>
            </div>
            <div class="input-group-prepend mr-2 ">
                <select name="" class="form-control select" id="rolesOfUser" multiple>
                    @foreach($data['users'] as $user)
                        <option value="{{ $user['id'] }}">{{ ucfirst($user['name']) }}</option>
                    @endforeach
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
        @php $i = 0; $j = 0; @endphp
        @foreach($data['rolesData'] as $role_val)
            <div class="tab-pane @if($i==0) active @endif" id="tab_id{{ $role_val['id'] }}" role="tabpanel">
                <div class="role_space">
                    <h1 class="user-title">Assigned Roles to <span>{{ ucfirst($role_val['name']) }}</span></h1>
                    <div class="row accordion mb-5">
                        @foreach($role_val['modules'] as $modules_val)
                            <div class="col-12 col-sm-4">
                                <div class="card user-role-card role-card-{{$j+1}}">
                                    <div class="card-header d-flex align-items-center" id="heading_{{ $modules_val['id'] }}">
                                        <div>
                                            <label>
                                                <input type="checkbox" name="moduleCheck{{ $modules_val['id'] }}" class="moduleCheck" data-module-id="{{ $modules_val['id'] }}" data-role-id="{{ $role_val['id'] }}"  id="checkAll_{{$j+1}}" onclick="checkall('{{$j}}')" />
                                                <span>{{ $modules_val['module_name'] }}</span>
                                            </label>
                                        </div>
                                        <div data-toggle="collapse" data-target="#collapsibleToggle_{{ $modules_val['id']}}">
                                            <i class="las la-plus"></i>
                                        </div>
                                    </div>
                                    <div class="card-body collapse" id="collapsibleToggle_{{ $modules_val['id']}}"
                                        aria-labelledby="heading_{{ $modules_val['id'] }}">
                                        <div class="mb-3">
                                            <label class="label" for="text">Search:</label>
                                            <input type="text" placeholder="Search permission(s)..."
                                                class="form-control" name="searchItem" id="searchItem">
                                        </div>
                                        <div class="scrollbar scroll-{{ $modules_val['id'] }} style-1">
                                            <div class="force-overflow">
                                                @foreach($modules_val['module_permission'] as $per_val)
                                                    <div>
                                                        <label>
                                                            <input type="checkbox" class="permission_check" data-role-id="{{ $role_val['id'] }}" id="permission_check{{ $per_val['permission_id'] }}" value="{{ $per_val['permission_id'] }}" @if(isset($role_val['role_permission']) && in_array($per_val['permission_id'], $role_val['role_permission'])) checked @endif />
                                                            <span>{{ ucwords(str_replace('_', ' ',$per_val['permission_name'] )) }}</span>
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @php $j++; @endphp
                        @endforeach
                    </div>
                </div>
            </div>
            @php $i++; @endphp
        @endforeach
    </div>
    <div class="list-group list-box" id="myList" role="tablist">
        @php $j = 0; @endphp
        @foreach($data['rolesData'] as $role_val)
            <a class="list-group-item list-group-item-action @if($j==0) active @endif" data-toggle="list" href="#tab_id{{ $role_val['id'] }}"
            role="tab">{{ ucfirst($role_val['name']) }}</a>
            @php $j++; @endphp
        @endforeach
    </div>
</div>


@yield('app-video')

   <script src="{{ asset('assets/js/app.admin.roles.permission.js') }}"></script>
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
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

        $(".permission_check").change(function() {
            if($("#permission_check"+this.value).prop('checked') == true) {
                var slug = 'create';
            } else {
                var slug = 'delete';
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var csrf_token = $('meta[name="csrf-token"]').attr('content');

            var role_id = $('#permission_check'+this.value).attr('data-role-id');
            var permission_id = this.value;

            $.ajax({
                url:"{{route('admin.rolesAndPermissionSave')}}",
                method:"POST",
                data:{'role_id':role_id,'permission_id':permission_id,'slug':slug},
                dataType:'JSON',
                success:function(response)
                {
                    if(response.status === true) {
                      alertText('Saved successfully','success');
                    } else {
                      alertText('Not saved','error');
                    }
                }
            })
        });

        $(".moduleCheck").change(function() {

            if($("input[name='moduleCheck"+ $(this).attr('data-module-id') +"']").prop('checked') == true) {
                var slug = 'create';
            } else {
                var slug = 'delete';
            }
            
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var csrf_token = $('meta[name="csrf-token"]').attr('content');

            var role_id = $(this).attr('data-role-id');
            var rl_module_name_id = $(this).attr('data-module-id');

            $.ajax({
                url:"{{route('admin.rolesAndPermissionSave')}}",
                method:"POST",
                data:{'role_id':role_id,'rl_module_name_id':rl_module_name_id,'slug':slug},
                dataType:'JSON',
                success:function(response)
                {
                    if(response.status === true) {
                      alertText('Saved successfully','success');
                    } else {
                      alertText('Not saved','error');
                    }
                }
            })
        });

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

