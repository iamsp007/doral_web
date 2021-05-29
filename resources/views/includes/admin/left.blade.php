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
	<li><a class="{{ \Request::is('admin/dashboard')?'active':'' }} nav" href="{{ route('admin.dashboard') }}">Dashboard <span class="dot"></span></a></li>
	<li><a class="{{ \Request::is('admin/roles')?'active':'' }} nav" href="{{ route('admin.roles') }}">Roles & Permission <span class="dot"></span></a></li>
	<li><a class="{{ \Request::is('admin/employee')?'active':'' }} nav" href="{{ route('admin.employee') }}">Employee <span class="dot"></span></a></li>
    <li data-toggle="collapse" data-target="#products">
        <a href="javascript:void(0)" data-target="{{ route('admin.referral.pending') }}"
           class="{{ (\Request::is('admin/referral/pending') || \Request::is('admin/referral/active') || \Request::is('admin/referral/rejected'))?'active':'' }} nav">
            Referral<i class="las la-angle-down _arrow"></i>
        </a>
        <ul class="sub collapse" id="products">
            <li>
                <a class="{{ \Request::is('admin/referral/pending')?'active':'' }} _nav" href="{{ route('admin.referral.pending') }}">Approval Request<span class="dot"></span></a>
            </li>
            <li>
                <a class="{{ \Request::is('admin/referral/active')?'active':'' }} _nav" href="{{ route('admin.referral.active') }}">Active <span class="dot"></span></a>
            </li>
            <li>
                <a class="{{ \Request::is('admin/referral/rejected')?'active':'' }} _nav" href="{{ route('admin.referral.rejected') }}">Rejected <span class="dot"></span></a>
            </li>
        </ul>
    </li>
	<li>
        <a class="nav" href="{{ url('logout') }}"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
        >Logout <span class="dot"></span></a>
        <form id="logout-form" action="{{ url('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </li>
</ul>
