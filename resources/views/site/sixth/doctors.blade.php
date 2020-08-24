@extends('site.fifth.layouts.app')

@section('content')

	<!--Page Title-->
    <section class="page-title" style="background-image:url({{ asset('site/part2/images/background/7.jpg') }});">

        <div class="auto-container">

            <h1> {{ __('home.doctor') }} </h1>

			<div class="text">What We Actually Do?</div>

			<ul class="bread-crumb clearfix">
				<li><a href="{{ url('/') }}"><span class="fas fa-home"></span> {{ __('home.home') }} </a></li>
				<li>{{ __('home.team') }}</li>
			</ul>
        </div>

    </section>
    <!--End Page Title-->

    	<!-- Team Section -->
	<section class="team-section">

		<div class="auto-container">
			<!-- Sec Title -->
			<div class="sec-title centered">
				<h2>{{ __('home.meet_team') }}</h2>
				<div class="separator"></div>
			</div>

			<div class="row clearfix">
                @foreach ($doctors as $index => $doctor)
                <!-- Team Block -->
				<div class="team-block col-lg-3 col-md-6 col-sm-6 col-xs-12">
					<div class="inner-box wow fadeInLeft" data-wow-delay="250ms" data-wow-duration="1500ms">
						<div class="image">
							<img src="{{ $doctor->admin_image }}" alt="" />
							<div class="overlay-box">
                                <a href="{{ url('appointments/' . $doctor->id) }}" class="appointment">{{ __('home.get_appointment') }}</a>
							</div>
						</div>
						<div class="lower-content">
                            <h3>
                                <a href="{{ url('appointments/' . $doctor->id) }}">
                                    {{ $doctor->role == 1 ? 'Dr' : 'Nur' }}. {{ $doctor->name }}
                                </a>
                            </h3>
							<div class="designation">
                                {{ $doctor->name }}
                            </div>
						</div>
					</div>
                </div>
                @endforeach
            </div>
            {{ $doctors->appends(request()->query())->links() }}
		</div>
	</section>
	<!-- End Team Section -->


    <!-- Doctor Search -->
    <div class="doctor-search-area">
        <div class="container">
            <form>
                <div class="row doctor-search-wrap">
                    <div class="col-sm-12 col-lg-12">
                        <div class="doctor-search-item">
                            <div class="form-group">
                                <i class="icofont-doctor-alt"></i>
                                <label>{{ __('home.search_here') }}</label>
                                <input type="text" class="form-control" name="search" value="{{ request('search') }}" placeholder="{{ __('admin.doctor_name') }}">
                            </div>
                            <button type="submit" class="btn doctor-search-btn">
                                <i class="icofont-search-1"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- End Doctor Search -->

    <!-- Doctors -->
    <section class="doctors-area doctors-area-two pt-100">
        <div class="doctor-shape">
            <img src="{{ asset('site/img/doctor/2.png') }}" alt="Shape">
        </div>
        <div class="container">
            <div class="row">
                @foreach($doctors as $doctor)
                    <div class="col-sm-6 col-lg-4 wow fadeInUp" data-wow-delay=".5s">
                    <div class="doctor-item">
                        <div class="doctor-top">
                            <img src="{{ $doctor->admin_image }}" alt="Doctor">
                            <a href="{{ url('appointments/' . $doctor->id) }}">{{ __('home.get_appointment') }}</a>
                        </div>
                        <div class="doctor-bottom">
                            <h3>
                                <a href="#"> {{ $doctor->role == 1 ? 'Dr' : 'Nur' }}  {{ $doctor->name }}</a>
                            </h3>
                            <span>{{ $doctor->name }}</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End Doctors -->

@endsection
