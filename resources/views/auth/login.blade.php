@extends('layouts.app')

@section('title','Login')
@section('content')
    <div class="middle">
        <div class="container">
            <div class="innerSpace">
                <h1 class="t1 fadeIn">Always Connected For Your Health</h1>
            </div>
            <div class="row">
                <div class="col-12 col-sm-7">
                    <div class="lside">
                        <img src="{{ asset('assets/img/login_img.png') }}" alt="" srcset="{{ asset('assets/img/login_img.png') }}">
                    </div>
                </div>
                <div class="col-12 col-sm-5">
                    <div class="login">
                        <div class="top_back"></div>
                        <div class="mid">
                            <div class="p50">
                                <h1 class="t2"><img src="{{ asset('assets/img/icons/doctor.svg') }}" alt=""
                                                    srcset="{{ asset('assets/img/icons/doctor.svg') }}" class="mr-2">{{__('SIGN IN')}}</h1>
                                <form method="POST" action="{{ route('login') }}" class="mt-4 pt-2" id="loginForm">
                                    @csrf
                                    @if(session()->has('success'))
                                        <div class="alert alert-success" role="alert">
                                            {{ session()->get('success') }}
                                        </div>
                                    @endif
                                    @if (!$errors->has('email') && !$errors->has('password'))
                                    @if($errors->any())
                                        @foreach ($errors->all() as $error)
                                            <div class="alert alert-danger" role="alert">
                                                 {{ $error }}
                                            </div>
                                        @endforeach
                                    @endif
                                    @endif
                                    <div class="form-group mt-4 pt-2">
                                        <label for="referralType" class="label d-block">Your Role</label>
                                        <select onchange="changeLoginRole(this.value)" class="form-control js-example-matcher-start select" name="referralType"
                                                id="referralType">
                                            <option value="1">Provider</option>
                                            <option value="2">Home Care</option>
                                            <option value="2">Insurance</option>
                                            <option value="3">Other</option>
                                        </select>
                                        @error('referralType')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <div class="d-flex justify-content-between">
                                            <label for="username" class="label">Username</label>
                                        </div>
                                        <input autocomplete="off" type="text" class="form-control form-control-lg" id="username"
                                               name="email" aria-describedby="emailHelp" value="">
                                       @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert" style="display: block;">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                        <!-- <small id="usernameHelp" class="form-text text-muted mt-2">Assistive Text</small> -->
                                    </div>
                                    <!-- Passowrd -->
                                    <div class="form-group">
                                        <div class="d-flex justify-content-between">
                                            <label for="password" class="label">Password</label>
                                            @if(Route::has('password.request'))
                                                <a href="{{ route('password.request') }}" target="_blank"
                                                   class="t3 forgot">{{ __('Forgot') }}</a>
                                            @endif
                                        </div>
                                        <div class="d-flex justify-content-between flex-wrap pos-rel pass">
                                            <input autocomplete="off" type="password" class="form-control form-control-lg" id="password"
                                                   name="password" value="">
                                            <span toggle="#password" class="view-password toggle-password">
                                                <img src="assets/img/icons/pass-show.svg" class="pass-show d-none">
                                                <img src="assets/img/icons/pass-hide.svg" class="pass-hide d-block">
                                            </span>
                                            @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert" style="display: block;">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <!-- @if ($errors->has('password'))
                                        <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert" style="display: block;">
                                            <strong>Error!</strong> {{ $errors->first('password') }}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                    @endif -->
                                        <!-- <small id="passwordHelp" class="form-text text-muted mt-2">Assistive Text</small> -->
                                    </div>
                                    <!-- Submit Btn -->
                                    <button type="submit" class="btn btn-primary btn-pink btn-block"
                                            name="signup" id="login">{{ __('Login') }}</button>
                                    @if (Route::has('/login'))
                                        <div class="d-flex align-items-center justify-content-center mt-2 t3">New
                                            here?<a href="{{ route('register') }}" class="ml-2 underline">Create Doral
                                                Account</a></div>
                                    @endif
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="//{{ Request::getHost() }}:3000/socket.io/socket.io.js"></script>
    <script src="{{ asset('/js/app.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        var socket = io('http://doral-web.test:3000', {
            "transports": ["polling","websocket"]
        });

        socket.on("new", function(e){
            // console.log("data", e)
            alert('Majaaa aya?');
        });
        function changeLoginRole(type) {
            if (type==='1'){
                $('#loginForm').attr('action',"{{ route('login') }}");
            }else {
                $('#loginForm').attr('action',"{{ route('referral.login') }}");
            }
            // console.log(type)
        }
        $('.pass-show').click(function (event) {
            $(".pass-hide").addClass('d-block').removeClass('d-none');
            $(".pass-show").addClass('d-none').removeClass('d-block');
            
        });
        $('.pass-hide').click(function (event) {
            $(".pass-hide").addClass('d-none').removeClass('d-block');
            $(".pass-show").addClass('d-block').removeClass('d-none');
            
        });
        $(".toggle-password").click(function() {
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
          input.attr("type", "text");
        } else {
          input.attr("type", "password");
        }
      });

    </script>
@endpush
