@extends('site.first.layouts.app')

@section('content')
    <div class="page-content bg-white">
        <div class="content-block">
            <!-- Our Services -->
            <div class="section-full bg-gray content-inner">
                <div class="container">
                    <div class="section-head text-center">
                        <h2 class="title"> {{ __('home.our_services') }} </h2>
                        <p>There are many variations of passages of Lorem Ipsum typesetting industry has been the industry's standard dummy text ever since the been when an unknown printer.</p>
                    </div>
                    <div class="section-content row">
                        @foreach($services as $index => $service)
                            @php
                                $title = session('lang') . '_title';
                                $desc = session('lang') . '_description';
                            @endphp
                            <div class="col-md-6 col-lg-4 col-sm-12 service-box style3 wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.4s">
                            <div class="icon-bx-wraper" data-name="0{{ $index+1 }}">
                                <div class="icon-lg">
                                    <a href="{{ route('service.show', ['id'=> $service->id, 'title'=> $service->$title]) }}" class="icon-cell"><i class="flaticon-factory-1"></i></a>
                                </div>

                                <div class="icon-content">
                                    <h2 class="dlab-tilte">{{ $service->$title }}</h2>
                                    <p> {{ $service->$desc }} </p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- Our Services End -->
        </div>
    </div>
@endsection
