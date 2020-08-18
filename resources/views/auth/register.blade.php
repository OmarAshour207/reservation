@extends('site.first.layouts.app')

@section('content')

    <!-- Sign Up -->
    <div class="signup-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 pl-0">
                    <div class="signup-left">
                        <img src="{{ asset('site/img/signup-bg.jpg') }}" alt="SignUp">
                    </div>
                </div>

                <div class="col-lg-6 ptb-100">
                    <div class="signup-item">
                        <div class="signup-head">
                            <h2>{{ __('home.register_here') }}</h2>
                            <p> {{ __('home.already_have_account') }}
                                <a href="{{ route('login') }}">{{ __('home.login') }}</a>
                            </p>
                        </div>
                        <div class="signup-form">
                            <form method="post" action="{{ route('register') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="{{ __('home.full_name') }}" value="{{ old('name') }}">
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="{{ __('home.phone') }}  {{ __('home.optional') }}" value="{{ old('phone') }}">
                                            @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="{{ __('home.email') }}" value="{{ old('email') }}">
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="{{ __('home.password') }}">
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="{{ __('admin.confirm_password') }}">
                                            @error('password_confirmation')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="gridCheck">
                                                <label class="form-check-label" for="gridCheck">
                                                    Yes, I agree with all <a href="#">Terms & Conditions</a>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="text-center">
                                            <button type="submit" class="btn signup-btn">Sign Up</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Sign Up -->
@endsection
