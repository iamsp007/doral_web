<header class="header">
    <div class="container">
        <div class="block">
            <div>
                <!-- Logo Start -->
                <a href="/" title="Welcome to Doral"  class="logo">
                    <img src="assets/img/logo-white.svg" alt="Welcome to Doral" srcset="assets/img/logo-white.svg">
                </a>
                <!-- Logo End -->
            </div>
            <div>
                @php
                    $url = "/register";
                    $label = 'Sing Up';
                    if(Request::path() == 'register') {
                        $url = "/";
                        $label = 'Sing In';
                    }
                    
                @endphp    
                <a href="{{ $url }}" class="text-uppercase sign-up">{{ $label }} <img
                        src="assets/img/icons/sign-up.svg" alt="" srcset="assets/img/icons/sign-up.svg"
                        class="ml-2"></a>
            </div>
        </div>
    </div>
</header>