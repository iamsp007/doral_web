@extends('layouts.app')

@section('content')
    <div class="middle">
        <div class="container">
            <div class="innerSpace">
                <h1 class="t1 fadeIn">Doral Partners</h1>
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
                                <form method="POST" action="{{ route('partner.login') }}" class="mt-4 pt-2" id="loginForm">
                                    @csrf
                                    @if($errors->any())
                                        @foreach ($errors->all() as $error)
                                            <div class="alert alert-danger" role="alert">
                                                {{ $error }}
                                            </div>
                                        @endforeach
                                    @endif
                                    <div class="form-group">
                                        <div class="d-flex justify-content-between">
                                            <label for="username" class="label">Username</label>
                                        </div>
                                        <input autocomplete="off" type="text" class="form-control form-control-lg" id="username"
                                               name="email" aria-describedby="emailHelp" value="">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
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
                                                <img src="{{ asset('assets/img/icons/pass-show.svg') }}" class="pass-show d-block">
                                                <img src="{{ asset('assets/img/icons/pass-hide.svg') }}" class="pass-hide d-none">
                                            </span>
                                        </div>
                                        @error('password')
                                        <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert" style="display: none">
                                            <strong>Error!</strong> {{ $message }}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                    @enderror
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
    <script>
        function changeLoginRole(type) {
            if (type==='1'){
                $('#loginForm').attr('action',"{{ route('login') }}");
            }else {
                $('#loginForm').attr('action',"{{ route('referral.login') }}");
            }
        }
        $(".toggle-password").click(function() {
        $('.pass-show').click(function (event) {
            $(".pass-hide").addClass('d-block').removeClass('d-none');
            $(".pass-show").addClass('d-none').removeClass('d-block');
            
        });
        $('.pass-hide').click(function (event) {
            $(".pass-hide").addClass('d-none').removeClass('d-block');
            $(".pass-show").addClass('d-block').removeClass('d-none');
            
        });
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
          input.attr("type", "text");
        } else {
          input.attr("type", "password");
        }
      });

    </script>
@endpush
