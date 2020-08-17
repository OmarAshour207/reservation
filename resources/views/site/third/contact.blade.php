@extends('site.third.layouts.app')

@section('content')
    <!-- Content -->
    <div class="page-content bg-white">
        <!-- Contact Form -->
        <div class="section-full content-inner contact-page-9 overlay-black-dark" style="background-image: url({{ asset('site/images/background/bg5.jpg') }}); background-position: 30% 100%">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-12 text-white">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 m-b30">
                                <div class="icon-bx-wraper bx-style-1 p-a20 radius-sm">
                                    <div class="icon-content">
                                        <h5 class="dlab-tilte">
                                            <span class="icon-sm text-primary"><i class="ti-location-pin"></i></span>
                                            {{ __('home.address') }}
                                        </h5>
                                        <p>{{ setting(session('lang') . '_address') }} </p>
                                        <h6 class="m-b15 text-black font-weight-400"><i class="ti-alarm-clock"></i> {{ __('home.office_hours') }}</h6>
                                        <p class="m-b0">Mon To Sat - 10.00 - 07.00</p>
                                        <p>Sunday - Close</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-6 m-b30">
                                <div class="icon-bx-wraper bx-style-1 p-a20 radius-sm">
                                    <div class="icon-content">
                                        <h5 class="dlab-tilte">
                                            <span class="icon-sm text-primary"><i class="ti-email"></i></span>
                                            {{ __('home.email_contact') }}
                                        </h5>
                                        <p class="m-b0">{{ setting('email') }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-6 m-b30">
                                <div class="icon-bx-wraper bx-style-1 p-a20 radius-sm">
                                    <div class="icon-content">
                                        <h5 class="dlab-tilte">
                                            <span class="icon-sm text-primary"><i class="ti-mobile"></i></span>
                                            {{ __('home.phone') }}
                                        </h5>
                                        <p class="m-b0">{{ setting('phone') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-12 m-b30">
                        @if (session('success'))
                            <h3 class="alert alert-success"> {{ __('home.sent_successfully') }} </h3>
                        @endif
                        <form class="inquiry-form wow box-shadow bg-white fadeInUp" data-wow-delay="0.2s" method="post" action="{{ route('send.contact') }}">
                            @csrf
                            <h3 class="title-box font-weight-300 m-t0 m-b10"> {{ __('home.convert_idea') }} <span class="bg-primary"></span></h3>
                            @php $desc = session('lang'). '_description'; @endphp
                            <p> {!! $contactUs->$desc !!} </p>
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="ti-user text-primary"></i></span>
                                            <input name="name" type="text" required class="form-control" placeholder="{{ __('home.full_name') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="ti-mobile text-primary"></i></span>
                                            <input name="phone" type="text" class="form-control" placeholder="{{ __('home.phone') }} ({{ __('home.optional') }})">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="ti-email text-primary"></i></span>
                                            <input name="email" type="email" class="form-control" placeholder="{{ __('home.email') }}" >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="ti-agenda text-primary"></i></span>
                                            <textarea name="message" rows="4" class="form-control" required placeholder="{{ __('home.tell_us') }}"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <button name="submit" type="submit" value="Submit" class="site-button button-md"> <span> {{ __('home.send') }} </span> </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact Form END -->
    </div>
    <!-- Content END-->
    <br>
@endsection
