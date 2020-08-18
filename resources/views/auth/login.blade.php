@extends('site.first.layouts.app')

@section('content')
    <!-- Login -->
    <div class="signup-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 pl-0">
                    <div class="login-left">
                        <img src="{{ asset('site/img/login-bg.jpg') }}" alt="Login">
                    </div>
                </div>

                <div class="col-lg-6 ptb-100">
                    <div class="signup-item">
                        <div class="signup-head">
                            <h2> {{ __('home.login_here') }} </h2>
                            <p> {{ __('home.have_an_account') }}
                                <a href="{{ route('register') }}"> {{ __('home.register_here') }} </a>
                            </p>
                        </div>
                        <div class="signup-form">
                            <form method="post" action="{{ route('login') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="{{ __('home.email') }}" value="{{ old('email') }}">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="{{ __('home.password') }}">
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input type="checkbox" class="form-check-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <div class="forgot-pass">
                                                <a href="#">Forgot Password?</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="text-center">
                                            <button type="submit" class="btn signup-btn">{{ __('home.login') }}</button>
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
    <!-- End Login -->

@endsection
