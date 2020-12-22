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
    <li><a class="{{ \Request::is('referral/dashboard')?'active':'' }} nav" href="{{ route('referral.dashboard') }}">Dashboard <span class="dot"></span></a></li>
    <li><a class="{{ \Request::is('referral/vbc')?'active':'' }} nav" href="{{ route('referral.vbc') }}">VBC <span class="dot"></span></a></li>
    <li><a class="{{ \Request::is('referral/md-order')?'active':'' }} nav" href="{{ route('referral.md-order') }}">MD Order <span class="dot"></span></a></li>
    <li><a class="{{ \Request::is('referral/occupational-health')?'active':'' }} nav" href="{{ route('referral.occupational-health') }}">Occupational Health<span class="dot"></span></a></li>
   


    <li>
        <a href="{{ url('logout') }}" class="nav"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
        >Logout <span class="dot"></span></a>
        <form id="logout-form" action="{{ url('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </li>
</ul>

