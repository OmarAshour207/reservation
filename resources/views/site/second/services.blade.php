@extends('site.second.layouts.app')

@section('content')
    <!-- Content -->
    <div class="page-content bg-white">
        <!-- inner page banner -->
        <div class="dlab-bnr-inr overlay-black-middle bg-pt" style="background-image:url({{ asset('site/images/banner/bnr2.jpg') }});">
            <div class="container">
                <div class="dlab-bnr-inr-entry">
                    <h1 class="text-white">{{ __('home.our_services') }}</h1>
                    <!-- Breadcrumb row -->
                    <div class="breadcrumb-row">
                        <ul class="list-inline">
                            <li><a href="{{ url('/') }}">{{ __('home.home') }}</a></li>
                            <li>{{ __('home.our_services') }}</li>
                        </ul>
                    </div>
                    <!-- Breadcrumb row END -->
                </div>
            </div>
        </div>
        <!-- inner page banner END -->
        <!-- contact area -->
        <div class="content-block">
            <!-- About Us -->
            <div class="section-full content-inner bg-gray">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-md-12">
                            <div class="section-head text-black">
                                <h4 class="text-gray-dark font-weight-300 m-b10">{{ __('home.our_services') }}</h4>
                                <h2 class="title">Completely customizable high-quality robust websites</h2>
                            </div>
                            <div class="section-content row">
                                @foreach($services as $index => $service)
                                    @php
                                        $title = session('lang') . '_title';
                                        $desc = session('lang') . '_description';
                                    @endphp
                                    <div class="col-lg-6 col-md-6 service-box style3">
                                        <div class="icon-bx-wraper" data-name="0{{ $index+1 }}">
                                            <div class="icon-lg">
                                                <a href="{{ route('service.show', ['id'=> $service->id, 'title'=> $service->$title]) }}" class="icon-cell"><i class="flaticon-factory-1"></i></a>
                                            </div>
                                            <div class="icon-content">
                                                <h2 class="dlab-tilte">{{ $service->$title }}</h2>
                                                <p>{{ $service->$desc }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12">
                            <div class="sticky-top m-b30">
                                <form class="inquiry-form inner" method="post" action="{{ route('send.contact') }}">

                                    @csrf

                                    <h3 class="title m-t0 m-b10"> {{ __('home.convert_idea') }} </h3>
                                    @php $desc = session('lang'). '_description'; @endphp
                                    <p> {!! $contactUs->$desc !!} </p>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="ti-user text-primary"></i></span>
                                                    <input name="name" type="text" required class="form-control" placeholder="{{ __('home.full_name') }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="ti-mobile text-primary"></i></span>
                                                    <input name="phone" type="text" class="form-control" placeholder="{{ __('home.phone') }} ({{ __('home.optional') }})">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="ti-email text-primary"></i></span>
                                                    <input name="email" type="email" class="form-control" required  placeholder="{{ __('home.email') }}" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="ti-agenda text-primary"></i></span>
                                                </div>
                                                <textarea name="message" rows="4" class="form-control" required placeholder="{{ __('home.tell_us') }}"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <button name="submit" type="submit" value="Submit" class="site-button button-lg"> <span>{{ __('home.send') }}</span> </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Our Services -->

            <!-- Why Chose Us -->
            <div class="section-full content-inner-1 overlay-black-dark about-8-service bg-img-fix" style="background-image:url({{ asset('site/images/background/bg1.jpg') }});">
                <div class="container">
                    <div class="section-head text-white text-center">
                        <h2 class="title-box m-tb0 max-w800 m-auto">
                            @php $desc = session('lang') . '_description'; @endphp
                            {!! $aboutUs->$desc !!}
                            <span class="bg-primary"></span>
                        </h2>
                    </div>
                </div>
                <div class="container">
                    <div class="row text-white">
                        @foreach($services as $index => $service)
                            @php
                                $title = session('lang') . '_title';
                                $desc = session('lang') . '_description';
                            @endphp
                            <div class="col-lg-4 col-md-4 m-b30">
                                <div class="icon-bx-wraper bx-style-1 p-a30 center">
                                    <div class="icon-lg text-white m-b20"> <a href="{{ route('service.show', ['id'=> $service->id, 'title'=> $service->$title]) }}" class="icon-cell text-white"><i class="flaticon-factory"></i></a> </div>
                                    <div class="icon-content">
                                        <h5 class="dlab-tilte text-uppercase">{{ $service->$title }}</h5>
                                        <p>{{ $service->$desc }}</p>
                                    </div>
                                </div>
                            </div>
                            @if ($index == 3)
                                @break
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="choses-info text-white">
                    <div class="container-fluid">
                        <div class="row choses-info-content">
                            <div class="col-lg-3 col-md-6 col-sm-6 col-6 p-a30 wow zoomIn" data-wow-delay="0.2s">
                                <h2 class="m-t0 m-b10 font-weight-400 font-45"><i class="flaticon-alarm-clock m-r10"></i><span class="counter">15</span>+</h2>
                                <h4 class="font-weight-300 m-t0">Years in Business</h4>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6 col-6 p-a30 wow zoomIn" data-wow-delay="0.4s">
                                <h2 class="m-t0 m-b10 font-weight-400 font-45"><i class="flaticon-worker m-r10"></i><span class="counter">700</span>+</h2>
                                <h4 class="font-weight-300 m-t0">Happy Clients</h4>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6 col-6 p-a30 wow zoomIn" data-wow-delay="0.6s">
                                <h2 class="m-t0 m-b10 font-weight-400 font-45"><i class="flaticon-settings m-r10"></i><span class="counter">50</span>+</h2>
                                <h4 class="font-weight-300 m-t0">Technical Experts</h4>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6 col-6 p-a30 wow zoomIn" data-wow-delay="0.8s">
                                <h2 class="m-t0 m-b10 font-weight-400 font-45"><i class="flaticon-presentation m-r10"></i><span class="counter">200</span>+</h2>
                                <h4 class="font-weight-300 m-t0">Apps Delivered</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Why Chose Us End -->
        </div>
        <!-- contact area END -->
    </div>
    <!-- Content END-->
@endsection
