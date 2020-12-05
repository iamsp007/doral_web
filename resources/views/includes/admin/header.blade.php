<div class="app-header">
	<div class="nav">
		<button class="navbar-toggler d-none" type="button" data-toggle="collapse"
			data-target="#collapsibleNavbar" aria-controls="collapsibleNavbar" aria-expanded="false"
			aria-label="Toggle navigation">
			<span class="navbar-toggler-icon">
				<i class="las la-bars white"></i>
			</span></button>
		<h1 class="title">Admin</h1>
	</div>
	<div>
		<ul class="menus">
			<li>
				<a href="javascript:void(0)" class="notify">
					<i class="las la-bell la-3x white"></i>
					<span class="number">6</span>
				</a>
			</li>
			<li>
				<div class="dropdown user-dropdown">
					<div class="user dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown"
						aria-haspopup="true" aria-expanded="false">
						<span>Hi, {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</span>
						<a href="javascript:void(0)">
							<i class="las la-user-circle la-3x ml-2"></i>
						</a>
					</div>
					<div class="dropdown-menu shadow" aria-labelledby="dropdownMenuButton">
						<a class="dropdown-item" href="#">Profile</a>
                        <a class="dropdown-item" href="{{ url('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                        >Logout</a>
                        <form id="logout-form" action="{{ url('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
					</div>
				</div>
			</li>
		</ul>
	</div>
</div>
<div class="app-title-box">
	<div class="app-title">
		{{ucfirst(str_replace("-", " ",Request::segment(2)))}}
	</div>
	@if(Request::segment(2) == 'employee')
	<div class="d-flex">
        <a href="{{ route('admin.employee-add') }}" class="btn-green-outline"><i class="las la-user-circle icon1"></i>Add New Employee</a>
    </div>
	@endif
	@if(Request::segment(2) == 'employee-add')
	<div class="d-flex">
        <a href="{{ route('admin.employee') }}" class="btn-green-outline"><i class="las la-user-circle icon1"></i>View Employee</a>
    </div>
	@endif
</div>
