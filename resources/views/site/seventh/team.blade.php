@extends('site.seventh.layouts.app')

@section('content')

	<!--Page Title-->

    <section class="page-title" style="background-image:url({{ asset('site/part2/images/background/7.jpg') }});">

        <div class="auto-container">

            <h1> {{ __('admin.team_members') }} </h1>

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
                @foreach ($teamMembers as $index => $teamMember)
                <!-- Team Block -->
				<div class="team-block col-lg-3 col-md-6 col-sm-6 col-xs-12">
					<div class="inner-box wow fadeInLeft" data-wow-delay="250ms" data-wow-duration="1500ms">
						<div class="image">
							<img src="{{ $teamMember->member_image }}" alt="" />
							<div class="overlay-box">
                                <a href="{{ url('appointments') }}" class="appointment">{{ __('home.get_appointment') }}</a>
							</div>
						</div>
						<div class="lower-content">
                            @php
                                $name = session('lang') . '_name';
                                $title = session('lang') . '_title';
                            @endphp
                            <h3>
                                <a href="#">
                                    {{ $teamMember->role == 1 ? 'Dr' : 'Nur' }}. {{ $teamMember->$name }}
                                </a>
                            </h3>
							<div class="designation">
                                {{ $teamMember->$title }}
                            </div>
						</div>
					</div>
                </div>
                @if ($index == 3)
                    @break
                @endif
                @endforeach
			</div>
		</div>
	</section>
	<!-- End Team Section -->

	<!-- Doctors Section -->
    <section class="doctors-section style-two">

        <div class="auto-container">
            <!-- Features Tab -->
            <div class="doctors-tabs tabs-box">
                <ul class="doctors-thumb tab-buttons clearfix">
                    @foreach ($teamMembers as $index => $teamMember)
                    <li data-tab="#doctor-tab-{{ $index+1 }}" class="tab-btn {{ $index == 0 ? 'active-btn' : '' }}">
                        <div class="image-box">
                            <figure>
                                <img src="{{ $teamMember->member_image }}" alt="">
                            </figure>
                        </div>
                    </li>
                    @if ($index == 2)
                        @break
                    @endif
                    @endforeach

                </ul>

                <!--Tabs Container-->
                <div class="tabs-content">
                    <!--Tab / Active Tab-->
                    @foreach ($teamMembers as $index => $teamMember)
                    @php
                        $title = session('lang') . '_title';
                        $name = session('lang') . '_name';
                        $desc = session('lang') . '_description';
                    @endphp
                    <div class="doctor-info tab {{ $index == 0 ? 'active-tab' : '' }}" id="doctor-tab-{{ $index+1 }}">
                        <div class="row clearfix">
                            <!-- Image-column -->
                            <div class="image-column col-lg-5 col-md-12 col-sm-12">
                                <div class="inner-column">
                                    <div class="image-box">
                                        <a href="{{ $teamMember->member_image }}" class="lightbox-image" data-fancybox="Gallery">
                                            <img src="{{ $teamMember->member_image }}" alt="">
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <!-- Image-column -->
                            <div class="content-column col-lg-5 col-md-12 col-sm-12">
                                <div class="inner-column">
                                    <h3 class="name">
                                        <a href="#">
                                            {{ $teamMember->role == 1 ? 'Dr' : 'Nur' }}. {{ $teamMember->$name }}
                                        </a>
                                    </h3>

                                    <span class="designation">{{ $teamMember->$title }}</span>

                                    <p> {{ $teamMember->$desc }} </p>

                                    <span class="timing"><i class="flaticon-alarm-clock"></i> Monday - Friday ( 5:00pm - 8pm )</span>

                                    <div class="clearfix">

                                        <div class="call-btn">

                                            <a href="{{ url('appointments') }}" class="theme-btn btn-style-two">
                                                <span class="txt">
                                                    {{ __('home.get_appointment') }}
                                                </span>
                                            </a>

                                        </div>

                                    </div>

                                </div>

                            </div>
                        </div>

                    </div>
                    @if ($index == 2)
                        @break
                    @endif
                    @endforeach
                </div>
            </div>
        </div>

    </section>
    <!-- End Doctors Section -->

@endsection
