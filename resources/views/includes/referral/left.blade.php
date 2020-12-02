<div class="block">
                    <!-- Logo Start -->
    <a href="/referral/dashboard" title="Welcome to Doral">
        <img src="../assets/img/logo-white.svg" alt="Welcome to Doral"
            srcset="../assets/img/logo-white.svg" class="img-fluid">
    </a>
    <!-- Logo End -->
    <i class="las la-times-circle la-3x white d-block d-xl-none d-lg-none d-md-none d-sm-none"
        id="closeMenu"></i>
</div>
<ul class="sidenav">
    <li><a <?php if(request()->segment(count(request()->segments())) == 'dashboard') {?> class="active" <?php } ?>href="/referral/dashboard">Dashboard<span class="dot"></span></a></li>
    <li><a <?php if(request()->segment(count(request()->segments())) == 'vbc') {?> class="active" <?php } ?>href="/referral/vbc">VBC<span class="dot"></span></a></li>
    <li><a <?php if(request()->segment(count(request()->segments())) == 'md-order') {?> class="active" <?php } ?>href="/referral/md-order">MD Order<span class="dot"></span></a></li>
    <li><a <?php if(request()->segment(count(request()->segments())) == 'employee-pre-physical' || request()->segment(count(request()->segments())) == 'employee-pre-physical-upload-bulk-data') {?> class="active" <?php } ?> href="/referral/employee-pre-physical">Employee Pre-Physical<span class="dot"></span></a></li>
    <li><a href="/referral/logout">Log Out<span class="dot"></span></a></li>
</ul>