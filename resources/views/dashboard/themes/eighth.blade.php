@extends('site.eighth.layouts.app')

@push('scripts')

<script>
    $(document).ready(function(){

        $(document).on('change', '.doctors', function() {
            var doctor_id = $('.doctors option:selected').val();
            $.ajax({
                url: '{{ url("appointments/days") }}',
                method: 'POST',
                data_type: 'html',
                data: {
                    _token: '{{ csrf_token() }}',
                    doctor_id: doctor_id
                }, success: function(data) {
                    $('.days').html(data);
                    $('.modal-body').html('');
                }
            });
        });
        $(document).on('change', '.days', function(){
            var doctor_id = $('.doctors option:selected').val();
            var day = $('.days option:selected').val();
            var price = $('.days option:selected').data('price');
            $.ajax({
                url: '{{ url("appointments/times") }}',
                method: 'post',
                data_type: 'html',
                data: {
                    _token: '{{ csrf_token() }}',
                    doctor_id: doctor_id,
                    day: day
                }, success: function(data) {
                    $('.times').html(data);
                    $('.modal-body').append('{{ __('home.price') }} : ' + price + '<br>');
                    $('.price').val(price);
                }
            });
        });

        $(document).on('change', '.times', function(){
            var doctor = '';
            var day = $('.days option:selected').text();
            var time = $('.times option:selected').text();
            var price = $(this).data('price');
            var data = '{{ __('home.doctor_name') }} : ' + doctor + '<br>'
                + '{{ __('home.day') }} : ' + day + '<br>'
                + '{{ __('home.time') }} : ' + time + '<br>';
            $('.modal-body').append(data);
        });
    });

    $(document).on('click', '.btn_appointment', function(e) {
            e.preventDefault();
            $(this).closest('form').submit();
        });
</script>
@endpush

@push('styles')
<style>
    .modal-backdrop {
        z-index: 1 !important;
    }
</style>

@section('content')

	<!-- Main Slider -->
	<section class="main-slider">

		<div class="banner-carousel">
            <!-- Swiper -->
			<div class="swiper-wrapper">
                @foreach ($sliders as $slider)
				<div class="swiper-slide slide" style="background-image:url('{{ $slider->slider_image }}')">
					<div class="auto-container">
						<div class="content clearfix">
                            @php
                                $title = session('lang') . '_title';
                                $desc = session('lang') . '_description';
                            @endphp
							<div class="title">{{ $slider->$title }}</div>
							<div class="text">
                                {{ $slider->$desc }}
                            </div>
							<div class="btn-box clearfix">
                                <a href="{{ url('services') }}" class="theme-btn btn-style-two">
                                    <span class="txt">{{ __('home.our_services') }}</span>
                                </a>
                                <a href="{{ url('contact-us') }}" class="theme-btn phone-btn">
                                    <span class="icon flaticon-call"></span>{{ setting('phone') }}
                                </a>
							</div>
						</div>
					</div>
				</div>
                @endforeach
            </div>
			<!-- Add Pagination -->

			<div class="swiper-pagination"></div>

			<!-- Add Arrows -->

			<div class="swiper-button-next"></div>

			<div class="swiper-button-prev"></div>

		</div>

	</section>
	<!-- End Main Slider -->


    <!-- Services Section Three -->
	<section class="services-section-three">
		<div class="auto-container">
			<div class="row clearfix">

				<!-- Services Block Four -->
				<div class="service-block-four col-lg-4 col-md-6 col-sm-12">
					<div class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
						<div class="icon-box">
							<span class="icon flaticon-timetable"></span>
						</div>
						<h4>{{ __('home.office_hours') }}</h4>
						<ul class="list">
                            @foreach ($times as $time)
                            <li>
                                {{ date('d M', strtotime($time->day)) }}
                                <span>{{ date('g:i A', strtotime($time->start_time)) }} – {{ date('g:i A', strtotime($time->end_time)) }}</span>
                            </li>
                            @endforeach
						</ul>
					</div>
				</div>

				<!-- Services Block Four -->
				<div class="service-block-four col-lg-4 col-md-6 col-sm-12">
					<div class="inner-box wow fadeInLeft" data-wow-delay="250ms" data-wow-duration="1500ms">
						<div class="icon-box">
							<span class="icon flaticon-timetable"></span>
						</div>
						<h4>{{ __('home.get_appointment') }}</h4>
						<div class="text">
                            @php
                                $desc = session('lang') . '_description';
                            @endphp
                            {{ substr($aboutUs->$desc, 0, 50) }}
                        </div>
                        <a class="appointment-btn" href="{{ url('appointments') }}">
                            {{ __('home.appointment') }} <span class="icon flaticon-right-arrow-1"></span></a>
					</div>
				</div>

				<!-- Services Block Four -->
				<div class="service-block-four col-lg-4 col-md-6 col-sm-12">
					<div class="inner-box wow fadeInLeft" data-wow-delay="500ms" data-wow-duration="1500ms">
						<div class="icon-box">
							<span class="icon flaticon-timetable"></span>
						</div>
						<h4>{{ __('home.services') }}</h4>
						<ul class="list-two">
                            @foreach ($services as $index => $service)
                                @php
                                    $title = session('lang') . '_title';
                                @endphp
                                <li> {{ $service->$title }} </li>
                                @if ($index == 2)
                                    @break
                                @endif
                            @endforeach
						</ul>
					</div>

				</div>

			</div>
		</div>
	</section>
	<!-- End Services Section Three -->


	<!-- About Section -->
	<section class="about-section">
		<div class="auto-container">
			<div class="row clearfix">
				<!-- Content Column -->
				<div class="content-column col-lg-6 col-md-12 col-sm-12">
					<div class="inner-column">
						<!-- Sec Title -->
						<div class="sec-title">
							<h2>{{ __('home.about_us') }}</h2>
							<div class="separator"></div>
                        </div>
                        @php
                            $desc = session('lang') . '_description';
                        @endphp
						<div class="bold-text">Better health care with efficient cost is the main focuse of our hospital.</div>

						<div class="text">{{ $aboutUs->$desc }}</div>

                        <a href="{{ url('contact-us') }}" class="theme-btn btn-style-two">
                            <span class="txt">{{ __('home.learn_more') }}</span>
                        </a>

					</div>

                </div>

				<!-- Blocks Column -->
				<div class="blocks-column col-lg-6 col-md-12 col-sm-12">

					<div class="inner-column">

						<div class="row clearfix">
                            <!-- Service Block Five -->
                            @foreach ($services as $index => $service)
                            <div class="service-block-five col-lg-6 col-md-6 col-sm-12">
								<div class="inner-box clearfix wow fadeInLeft" data-wow-delay="250ms" data-wow-duration="1500ms">
									<div class="icon-box">
										<span class="icon flaticon-surgery-room"></span>
                                    </div>
                                    @php
                                        $title = session('lang') . '_title';
                                        $desc = session('lang') . '_description';
                                    @endphp
									<h4> {{ $service->$title }} </h4>
									<div class="text">{{ $service->$desc }}</div>
								</div>
                            </div>
                            @if ($index == 3)
                                @break
                            @endif
                            @endforeach
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End About Section -->


    <!-- Appointment Section Three -->
	<section class="appointment-section-three">
		<div class="auto-container">
			<div class="row clearfix">
				<!-- Form Column -->
				<div class="form-column col-lg-4 col-md-12 col-sm-12">
					<div class="inner-column wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
						<!-- Upper Box -->
						<div class="upper-box">
							<div class="upper-inner">
								<div class="icon-box">
									<span class="icon flaticon-timetable"></span>
								</div>
								<h3>{{ __('home.get_appointment') }}</h3>
								<div class="text">We provide best service for our cline. Now place take it.</div>
							</div>
						</div>
						<!-- Lower Box -->
						<div class="lower-box">
							<div class="upper-inner">
								<!-- Appointment Form -->
								<div class="appointment-form">
                                    <form method="post" action="{{ url('book/appointment') }}">
                                        @csrf
                                        <input type="hidden" name="price" class="price">

                                        <div class="form-group">
                                            <i class="fa fa-user"></i>
                                            <label> {{ __('home.doctor') }} </label>
                                            <select class="doctors" name="doctor_id">
                                                <option> {{ __('home.choose_doctor') }} </option>
                                                @foreach ($doctors as $doctor)
                                                    <option value="{{ $doctor->id }}"> {{ $doctor->name }} </option>
                                                @endforeach
                                            </select>
										</div>

										<div class="form-group">
                                            <i class="fa fa-calendar"></i>
                                            <label> {{ __('home.day') }} </label>
                                            <select class="days" name="day">
                                                <option> {{ __('home.choose_day') }} </option>
                                            </select>
										</div>

										<div class="form-group">
                                            <i class="fa fa-clock"></i>
                                            <label> {{ __('home.appointment') }} </label>
                                            <select class="times" name="appointment">
                                                <option> {{ __('home.choose_appointment') }} </option>
                                            </select>
										</div>

										<div class="form-group">
											<button class="theme-btn submit-btn" type="button" data-toggle="modal" data-target="#exampleModalCenter">
                                                {{ __('home.book') }}
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">
                                                            {{ __('home.confirm_booking') }}
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        </div>
                                                        <div class="modal-body">
                                                        </div>
                                                        <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('home.close') }}</button>
                                                        <button type="button" class="btn btn-primary btn_appointment">{{ __('home.confirm_booking') }}</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Content Column -->
				<div class="content-column col-lg-8 col-md-12 col-sm-12">
					<div class="inner-column">
						<!-- Sec Title -->
						<div class="sec-title">
							<h2>{{ __('home.why_choose_us') }}</h2>
							<div class="separator"></div>
                        </div>
                        @php
                            $desc = session('lang') . '_description';
                        @endphp
						<div class="bold-text">
                            {{ $aboutUs->$desc }}
                        </div>
						<div class="row clearfix">
							<!-- Appointment List -->
                            @foreach ($services as $index => $service)
                            <div class="appointment-list col-lg-6 col-md-6 col-sm-12">

								<div class="list-inner wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">

                                    <div class="icon far fa-hand-point-right"></div>
                                    @php
                                        $title = session('lang') . '_title';
                                        $desc = session('lang') . '_description';
                                    @endphp
									<h4>{{ $service->$title }}</h4>
									<div class="text">{{ $service->$desc }}</div>
								</div>
                            </div>
                            @if ($index == 5)
                                @break
                            @endif
                            @endforeach
						</div>
					</div>

				</div>
			</div>
		</div>
	</section>
	<!-- End Appointment Section Three -->

	<!-- Counter Section -->
	<section class="counter-section style-two" style="background-image: url({{ asset('site/part2/images/background/pattern-3.png') }})">
		<div class="auto-container">
			<!-- Fact Counter -->
			<div class="fact-counter style-two">
				<div class="row clearfix">
					<!--Column-->
					<div class="column counter-column col-lg-4 col-md-6 col-sm-12">
						<div class="inner wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
							<div class="content">
								<div class="icon flaticon-logout"></div>
								<div class="count-outer count-box">
									<span class="count-text" data-speed="2500" data-stop="{{ $all_patients }}">0</span>
								</div>
								<h4 class="counter-title">{{ __('home.happy_client') }}</h4>
							</div>
						</div>
					</div>

					<!--Column-->
					<div class="column counter-column col-lg-4 col-md-6 col-sm-12">
						<div class="inner wow fadeInLeft" data-wow-delay="300ms" data-wow-duration="1500ms">
							<div class="content">
								<div class="icon flaticon-logout"></div>
								<div class="count-outer count-box alternate">
									+<span class="count-text" data-speed="3000" data-stop="{{ $all_doctors }}">0</span>
								</div>
                                <h4 class="counter-title">{{ __('home.team_clinic') }}</h4>
							</div>
						</div>
					</div>

					<!--Column-->
					<div class="column counter-column col-lg-4 col-md-6 col-sm-12">
						<div class="inner wow fadeInLeft" data-wow-delay="600ms" data-wow-duration="1500ms">
							<div class="content">
								<div class="icon flaticon-logout"></div>
								<div class="count-outer count-box">
									<span class="count-text" data-speed="3000" data-stop="{{ $success_mission }}">0</span>
								</div>
								<h4 class="counter-title">{{ __('home.success_missions') }}</h4>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</section>
    <!-- End Counter Section -->

    <!-- Team Section -->
    <section class="team-section">
        <div class="auto-container">
            <!-- Sec Title -->
            <div class="sec-title centered">
                <h2> {{ __('home.meet_team') }} </h2>
                <div class="separator"></div>
            </div>
            <div class="row clearfix">
                @foreach ($teamMembers as $index => $teamMember)
                <div class="team-block col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="inner-box wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                        <div class="image">
                            <img src="{{ $teamMember->member_image }}" alt="" />
                            <div class="overlay-box">
                                <ul class="social-icons">
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                </ul>
                                <a href="javascript:void(0);" class="appointment">{{ __('home.get_appointment') }}</a>
                            </div>
                        </div>
                        <div class="lower-content">
                            <h3>
                                @php
                                    $name = session('lang') . '_name';
                                    $title = session('lang') . '_title';
                                @endphp
                                <a href="javascript:void(0);">
                                    {{ $teamMember->role == 1 ? 'Dr' : 'Nur' }}. {{ $teamMember->$name }}
                                </a>
                            </h3>
                            <div class="designation"> {{ $teamMember->$title }} </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

        </div>

    </section>
    <!-- End Team Section -->

	<section class="provider-section">
		<div class="auto-container">
			<div class="row clearfix">
				<!-- Blocks Column -->
				<div class="blocks-column col-lg-12 col-md-12 col-sm-12">
					<div class="inner-column">
						<!-- Sec Title -->
						<div class="sec-title">
							<h2>{{ __('home.what_service_we_provide') }}</h2>
							<div class="separator"></div>
						</div>

						<div class="row clearfix">
                            <!-- Services Block Six -->
                            @foreach ($services as $index => $service)
                            <div class="service-block-six col-lg-4 col-md-6 col-sm-12">
								<div class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
									<div class="border-one"></div>
									<div class="border-two"></div>
									<div class="icon-box">
										<span class="icon flaticon-surgery-room-1"></span>
                                    </div>
                                    @php
                                        $title = session('lang') . '_title';
                                    @endphp
									<h3><a href="#">{{ $service->$title }}</a></h3>
								</div>
                            </div>
                            @if ($index == 5)
                                @break
                            @endif
                            @endforeach
						</div>
					</div>
				</div>
			</div>
		</div>

	</section>
	<!-- End Provider Section -->

    <!-- Newsletter Section -->
    <section class="newsletter-section">

        <div class="auto-container">

            <div class="row clearfix">

                <!-- Title Column -->
                <div class="title-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <h2>{{ __('home.subscribe_newsletter') }}</h2>
                        <div class="text">{{ __('home.to_receive_newsletter') }}</div>
                    </div>
                </div>
                <!-- Form Column -->
                <div class="form-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <!-- Subscribe Form -->
                        <div class="subscribe-form">
                            <form method="post" action="#">
                                @csrf
                                <div class="form-group">
                                    <input type="email" name="email" value="" placeholder="{{ __('home.email_contact') }}" required>
                                    <button type="submit" class="theme-btn btn-style-two"><span class="txt">{{ __('home.subscribe') }}</span></button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </section>
    <!-- End Newsletter Section -->
@endsection
@push('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $('a').on('click', function(e) {
                if (!$(this).hasClass('allowedLink')) {
                    e.preventDefault();
                }
            });
        });
    </script>
@endpush
