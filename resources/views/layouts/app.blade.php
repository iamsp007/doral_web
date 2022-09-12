<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/fonts/Montserrat.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/line-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/assign-modal.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('css/toaster.css') }}">
    @stack('css')

    <!-- Styles -->
{{--    <link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
<title>@yield('title','Welcome to Doral')</title>
</head>
<body>
    <div id="loader-wrapper">
        <div class="pulse"></div>
    </div>
    <div id="app">
        <input type="hidden" id="base_url" name="base_url" value="{{ env('APP_URL') }}">
        <header class="header">
            <div class="container">
                <div class="block">
                    <div>
                        <!-- Logo Start -->
                        <a href="/" title="{{ config('app.name', 'Doral Health Connect') }}"  class="logo">
                            <img src="{{ asset('assets/img/logo-white.svg') }}" alt="Welcome to Doral" srcset="{{ asset('assets/img/logo-white.svg') }}">
                        </a>
                        <!-- Logo End -->
                    </div>
                    <div>
                        @guest
                            @if(\Request::is('provider/login'))
                                <a href="{{ route('login') }}" class="text-uppercase sign-up">{{ __('DORAL SIGN IN') }} <img
                                        src="{{ asset('assets/img/icons/sign-up.svg') }}" alt="" srcset="{{ asset('assets/img/icons/sign-up.svg') }}"
                                        class="ml-2"></a>
                            @elseif(\Request::is('register'))
                                <a class="text-uppercase sign-up" href="{{ route('login') }}">{{ __('SIGN IN') }} <img
                                        src="{{ asset('assets/img/icons/sign-up.svg') }}" alt="" srcset="{{ asset('assets/img/icons/sign-up.svg') }}"
                                        class="ml-2"></a>
                            @elseif(\Request::is('login'))
                                <a class="text-uppercase sign-up" href="{{ route('referral.register') }}">{{ __('REFERRAL SIGN UP') }} <img
                                        src="{{ asset('assets/img/icons/sign-up.svg') }}" alt="" srcset="{{ asset('assets/img/icons/sign-up.svg') }}"
                                        class="ml-2"></a>
                            @elseif(\Request::is('partner/login'))
                                <a class="text-uppercase sign-up" href="{{ route('partner.register') }}">{{ __('PARTNER SIGN UP') }} <img
                                        src="{{ asset('assets/img/icons/sign-up.svg') }}" alt="" srcset="{{ asset('assets/img/icons/sign-up.svg') }}"
                                        class="ml-2"></a>
                            @endif
                        @else
                            <div class="dropdown">
                                @guest
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="{{ route('login') }}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        Login
                                    </a>
                                @else
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                @endguest

                            </div>
                        @endguest

                    </div>
                </div>
            </div>
        </header>
        <main class="py-4">
         {{-- <div><input type="hidden" class="auth_user_id" value="{{ Auth::user()->id }}">
        <input type="hidden" class="auth_user_first_name" value="{{ Auth::user()->first_name }}">
        <input type="hidden" class="auth_user_last_name" value="{{ Auth::user()->last_name }}">
        <input type="hidden" class="auth_user_email" value="{{ Auth::user()->email }}"></div> --}}
            @yield('content')
        </main>
    </div>
    @include('includes.footer')
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/moment.min.js') }}"></script>
    <script src="{{ asset('assets/js/app.common.min.js') }}"></script>
    <script>
        var base_url = $('#base_url').val();
        var socket_url = '{{ env("SOCKET_IO_URL") }}';
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script src="{{ asset('assets/js/socket.io.js') }}"></script>
    <script src="{{ asset('assets/js/sidebar.js') }}"></script>
    <script src="{{ asset('assets/js/tail.select-full.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/js/dataTables.buttons.min.js') }}"></script>
    <script>
        $("#loader-wrapper").hide();
    </script>
      {{-- <script>
	    var auth_user_id = $('.auth_user_id').val();
	    var auth_user_name = $('.auth_user_first_name').val() + ' ' + $('.auth_user_last_name').val();
	    var auth_user_email = $('.auth_user_email').val();
	    console.log('auth_user_id=: ' + auth_user_id);
	    console.log('auth_user_name=: ' + auth_user_name);
	    console.log('auth_user_email=: ' + auth_user_email);
	    (function(apiKey){

		(function(p,e,n,d,o){var v,w,x,y,z;o=p[d]=p[d]||{};o._q=o._q||[];
		v=['initialize','identify','updateOptions','pageLoad','track'];for(w=0,x=v.length;w<x;++w)(function(m){
		    o[m]=o[m]||function(){o._q[m===v[0]?'unshift':'push']([m].concat([].slice.call(arguments,0)));};})(v[w]);
		    y=e.createElement(n);y.async=!0;y.src='https://cdn.pendo.io/agent/static/'+apiKey+'/pendo.js';
		    z=e.getElementsByTagName(n)[0];z.parentNode.insertBefore(y,z);})(window,document,'script','pendo');

		    pendo.initialize({
		        visitor: {
		            id: auth_user_id,
		            name: auth_user_name,
		            email: auth_user_email,
		        },

		        account: {
		            id: 'ACCOUNT-UNIQUE-ID'
		        }
		    });
	    })('71322162-1bf1-4bcd-72de-1d93c59ab919');
	</script> --}}
    @stack('scripts')
</body>
</html>