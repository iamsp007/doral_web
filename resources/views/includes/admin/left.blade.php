<div class="block">
	<!-- Logo Start -->
	<a href="/admin/dashboard" title="Welcome to Doral">
		<img src="{{asset('assets/img/logo-white.svg')}}" alt="Welcome to Doral"
			srcset="{{asset('assets/img/logo-white.svg')}}" class="img-fluid">
	</a>
	<!-- Logo End -->
	<i class="las la-times-circle la-3x white d-block d-xl-none d-lg-none d-md-none d-sm-none"
		id="closeMenu"></i>
</div>
<ul class="sidenav">
	<li><a <?php if(request()->segment(count(request()->segments())) == 'dashboard') {?> class="active" <?php } ?>href="/admin/dashboard">Dashboard <span class="dot"></span></a></li>
	<li><a <?php if(request()->segment(count(request()->segments())) == 'roles') {?> class="active" <?php } ?>href="/admin/roles">Roles & Permission<span class="dot"></span></a></li>
	<li><a <?php if(request()->segment(count(request()->segments())) == 'employee') {?> class="active" <?php } ?>href="/admin/employee">Employee<span class="dot"></span></a></li>
	<li><a <?php if(request()->segment(count(request()->segments())) == 'referral-approval') {?> class="active" <?php } ?>href="/admin/referral-approval">Referral Approval<span class="dot"></span></a></li>
	<li><a href="/admin/logout">Log Out<span class="dot"></span></a></li>
</ul>