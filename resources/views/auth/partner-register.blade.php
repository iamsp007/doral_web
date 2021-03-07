@extends('layouts.app')

@section('content')
    <div class="middle register">
        <div class="container">
            <div class="innerSpace">
                <h1 class="t1 fadeIn">Doral Partners</h1>
            </div>
            <div class="row">
                <div class="col-12 col-xl-7 col-lg-7 col-md-7 col-sm-12">
                    <div class="lside">
                        <img src="{{ asset('assets/img/login_img.png') }}" alt="" srcset="{{ asset('assets/img/login_img.png') }}">
                    </div>
                </div>
                <div class="col-12 col-xl-5 col-lg-7 col-md-5 col-sm-12">
                    <!-- Login Form Start -->
                    <div class="login">
                        <div class="top_back"></div>
                        <div class="mid">
                            <div class="p50">
                                <h1 class="t2"><img src="{{ asset('assets/img/icons/doctor.svg') }}" alt=""
                                                    srcset="{{ asset('assets/img/icons/doctor.svg') }}" class="mr-2">Partner Sign Up</h1>

                                <form method="POST" action="{{ route('partner.register') }}">
                                    @csrf
                                    <div id="insurance">
                                        @if($errors->any())
                                            @foreach ($errors->all() as $error)
                                                <div class="alert alert-danger" role="alert">
                                                    {{ $error }}
                                                </div>
                                        @endforeach
                                    @endif
                                        <!-- Your Referral Type -->
                                        <div class="form-group mt-4 pt-2">
                                            <label for="referralType" class="label d-block">Partner Type</label>
                                            <select class="form-control js-example-matcher-start select" name="referralType"
                                                    id="referralType">
                                                @foreach(\App\Models\Referral::where('guard_name','=','partner')->get() as $referral)
                                                    <option value="{{ $referral->id }}">{{ $referral->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('referralType')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <!-- Company Name -->
                                        <div class="form-group">
                                            <label for="company" class="label">Company Name</label>
                                            <input type="text" class="form-control" id="company" name="company" placeholder="Company Name" value="{{ old('company') }}">
                                            @error('company')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <!-- Email -->
                                        <div class="form-group">
                                            <label for="email" class="label">Email</label>
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{ old('email') }}">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <!-- Email -->
                                        <div class="form-group">
                                            <label for="mobile" class="label">Mobile</label>
                                            <input type="number" class="form-control" id="mobile" name="mobile" placeholder="Mobile" value="{{ old('mobile') }}">
                                            @error('mobile')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-pink btn-block"
                                                name="signup" id="register">Create Your Account</button>
                                    </div>
                                </form>
                                <div class="d-flex align-items-center justify-content-center mt-2 t3">Already member?<a href="{{ route('partner.login') }}" class="ml-2 underline">Login Account</a></div>
                                <div class="alert alert-success alert-dismissible fade show mt-4" role="alert" style="display: none">
                                    <strong>Success!</strong> <span id="successResponse"></span>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert" style="display: none">
                                    <strong>Error!</strong> <span id="errorResponse"></span>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>

                            </div>
                        </div>
                        <div class="btm_back"></div>
                    </div>
                    <!-- Login Form End -->
                </div>
            </div>
        </div>
    </div>
@endsection
