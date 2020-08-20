@extends('site.first.layouts.app')

@section('content')
    <!-- Page Title -->
    <div class="page-title-area page-title-five">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="page-title-item">
                    <h2>{{ __('home.contact_us') }}</h2>
                    <ul>
                        <li>
                            <a href="{{ url('/') }}">{{ __('home.home') }}</a>
                        </li>
                        <li>
                            <i class="icofont-simple-right"></i>
                        </li>
                        <li>{{ __('home.contact_us') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Title -->

    <!-- Location -->
    <div class="location-area">
        <div class="container">
            <div class="row location-wrap">
                <div class="col-sm-6 col-lg-4">
                    <div class="location-item">
                        <i class="icofont-location-pin"></i>
                        <h3>{{ __('home.address') }}</h3>
                        <p>{{ setting(session('lang') . '_address') }}</p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="location-item">
                        <i class="icofont-ui-message"></i>
                        <h3>{{ __('home.email') }}</h3>
                        <ul>
                            <li>{{ setting('email') }}</li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 offset-sm-3 offset-lg-0 col-lg-4">
                    <div class="location-item">
                        <i class="icofont-ui-call"></i>
                        <h3>{{ __('home.phone') }}</h3>
                        <ul>
                            <li>{{ setting('phone') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Location -->

    <!-- Drop -->
    <section class="drop-area pt-100">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-7 p-0">
                    <div class="drop-item drop-img">
                        <div class="drop-left">
                            <h2>{{ __('home.drop_your_message') }}</h2>
                            <form id="contactForm" method="post" action="{{ route('send.contact') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-6 col-lg-6">
                                        <div class="form-group">
                                            <input type="text" name="name" id="name" class="form-control" required data-error="{{ __('home.full_name') }}" placeholder="{{ __('home.full_name') }}">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 col-lg-6">
                                        <div class="form-group">
                                            <input type="email" name="email" id="email" class="form-control" required data-error="{{ __('home.email_contact') }}" placeholder="{{ __('home.email_contact') }}">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-lg-12">
                                        <div class="form-group">
                                            <input type="text" name="phone" id="phone_number" required data-error="{{ __('home.phone') }}" class="form-control" placeholder="{{ __('home.phone') }}">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-lg-12">
                                        <div class="form-group">
                                            <textarea name="message" class="form-control" id="message" cols="30" rows="5" required data-error="{{ __('home.message') }}" placeholder="{{ __('home.message') }}"></textarea>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-lg-12">
                                        <button type="submit" class="drop-btn">
                                            {{ __('home.send') }}
                                        </button>
                                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 p-0">
                    <div class="speciality-item speciality-right speciality-right-two speciality-right-three">
                        <img src="{{ $about->about_image }}" alt="Contact">
                        <div class="speciality-emergency">
                            <div class="speciality-icon">
                                <i class="icofont-ui-call"></i>
                            </div>
                            <h3>{{ __('home.emergency_call') }}</h3>
                            <p> {{ setting('phone') }} </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Drop -->
<br>
<br>
<br>
<br>
<br>
<br>
<br>
@endsection
