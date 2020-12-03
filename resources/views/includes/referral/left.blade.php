<div class="block">
    <!-- Logo Start -->
    <a href="{{ route('referral.dashboard') }}" title="Welcome to Doral">
        <img src="{{asset('assets/img/logo-white.svg')}}" alt="Welcome to Doral"
            srcset="{{asset('assets/img/logo-white.svg')}}" class="img-fluid">
    </a>
    <!-- Logo End -->
    <i class="las la-times-circle la-3x white d-block d-xl-none d-lg-none d-md-none d-sm-none"
        id="closeMenu"></i>
</div>
<ul class="sidenav">
    <li><a class="{{ \Request::is('referral/dashboard')?'active':'' }}" href="{{ route('referral.dashboard') }}">Dashboard <span class="dot"></span></a></li>
    <li><a class="{{ \Request::is('referral/vbc')?'active':'' }}" href="{{ route('referral.vbc') }}">VBC <span class="dot"></span></a></li>
    <li><a class="{{ \Request::is('referral/md-order')?'active':'' }}" href="{{ route('referral.md-order') }}">MD Order <span class="dot"></span></a></li>
    <li><a class="{{ \Request::is('referral/employee-pre-physical')?'active':'' }}" href="{{ route('referral.employee-pre-physical') }}">Employee Pre-Physical<span class="dot"></span></a></li>
    <li>
        <a href="{{ url('logout') }}"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
        >Logout <span class="dot"></span></a>
        <form id="logout-form" action="{{ url('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </li>
</ul>