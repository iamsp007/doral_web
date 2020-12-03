<div class="block">
	<!-- Logo Start -->
	<a href="{{ route('admin.dashboard') }}" title="Welcome to Doral">
		<img src="{{asset('assets/img/logo-white.svg')}}" alt="Welcome to Doral"
			srcset="{{asset('assets/img/logo-white.svg')}}" class="img-fluid">
	</a>
	<!-- Logo End -->
	<i class="las la-times-circle la-3x white d-block d-xl-none d-lg-none d-md-none d-sm-none"
		id="closeMenu"></i>
</div>
<ul class="sidenav">
	<li><a class="{{ \Request::is('admin/dashboard')?'active':'' }}" href="{{ route('admin.dashboard') }}">Dashboard <span class="dot"></span></a></li>
	<li><a class="{{ \Request::is('admin/roles')?'active':'' }}" href="{{ route('admin.roles') }}">Roles & Permission <span class="dot"></span></a></li>
	<li><a class="{{ \Request::is('admin/employee')?'active':'' }}" href="{{ route('admin.employee') }}">Employee <span class="dot"></span></a></li>
	<li><a class="{{ \Request::is('admin/referral-approval')?'active':'' }}" href="{{ route('admin.referral.approval') }}">Referral Approval <span class="dot"></span></a></li>
	<li>
        <a href="{{ url('logout') }}"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
        >Logout <span class="dot"></span></a>
        <form id="logout-form" action="{{ url('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </li>
</ul>
