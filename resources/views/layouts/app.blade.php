<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{ asset('assets/css/fonts/Montserrat.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.min.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>{{ config('app.name', 'Doral Health Connect') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    @stack('css')

    <!-- Styles -->
{{--    <link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
</head>
<body>
    <div id="loader-wrapper">
        <div class="pulse"></div>
    </div>
    <div id="app">
        <header class="header">
            <div class="container">
                <div class="block">
                    <div>
                        <!-- Logo Start -->
                        <a href="/" title="{{ config('app.name', 'Doral Health Connect') }}"  class="logo">
                            <img src="{{ asset('assets/img/logo-white.svg') }}" alt="Doral Health Connect" srcset="{{ asset('assets/img/logo-white.svg') }}">
                        </a>
                        <!-- Logo End -->
                    </div>
                    <div>
                        @guest
                            @if(\Request::is('provider/login'))
                                <a href="{{ route('login') }}" class="text-uppercase sign-up">{{ __('DORAL SIGN IN') }} <img
                                        src="{{ asset('assets/img/icons/sign-up.svg') }}" alt="" srcset="{{ asset('assets/img/icons/sign-up.svg') }}"
                                        class="ml-2"></a>
<!--                            @elseif(\Request::is('referral/register'))
                                <a class="text-uppercase sign-up" href="{{ route('login') }}">{{ __('SIGN IN') }} <img
                                        src="{{ asset('assets/img/icons/sign-up.svg') }}" alt="" srcset="{{ asset('assets/img/icons/sign-up.svg') }}"
                                        class="ml-2"></a>-->
                            @elseif(\Request::is('register'))
                                <a class="text-uppercase sign-up" href="{{ route('login') }}">{{ __('SIGN IN') }} <img
                                        src="{{ asset('assets/img/icons/sign-up.svg') }}" alt="" srcset="{{ asset('assets/img/icons/sign-up.svg') }}"
                                        class="ml-2"></a>
                            @elseif(\Request::is('login'))
                                <a class="text-uppercase sign-up" href="{{ route('referral.register') }}">{{ __(' REFERRAL SIGN UP') }} <img
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
            @yield('content')
        </main>
    </div>
    @include('includes.footer')
    @include('includes.script')
    @stack('scripts')
</body>
</html>
