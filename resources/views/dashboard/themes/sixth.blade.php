@extends('site.sixth.layouts.app')

@section('content')

    <!-- Main Slider Two -->
    <section class="main-slider-two">
        <div class="banner-carousel">
            <!-- Swiper -->
            <div class="swiper-wrapper">
                @foreach ($sliders as $index => $slider)

                <div class="swiper-slide slide">

                    <div class="slider-icons">

                    <span class="icon-one"><img src="{{ asset('site/part2/images/icons/icon-1.png') }}" alt="" /></span>

                    <span class="icon-two"><img src="{{ asset('site/part2/images/icons/icon-2.png') }}" alt="" /></span>

                    <span class="icon-three"><img src="{{ asset('site/part2/images/icons/icon-3.png') }}" alt="" /></span>

                    <span class="icon-four"><img src="{{ asset('site/part2/images/icons/icon-4.png') }}" alt="" /></span>

                    <span class="icon-five"><img src="{{ asset('site/part2/images/icons/icon-2.png') }}" alt="" /></span>

                    <span class="icon-six"><img src="{{ asset('site/part2/images/icons/icon-5.png') }}" alt="" /></span>

                    <span class="icon-seven"><img src="{{ asset('site/part2/images/icons/icon-3.png') }}" alt="" /></span>

                    <span class="icon-eight"><img src="{{ asset('site/part2/images/icons/icon-3.png') }}" alt="" /></span>

                    <span class="icon-nine"><img src="{{ asset('site/part2/images/icons/icon-2.png') }}" alt="" /></span>

                </div>
                    <div class="auto-container">
                        <div class="row clearfix">
                            <!-- Image Column -->
                            <div class="image-column col-lg-7 col-md-12 col-sm-12">
                                <div class="inner-column">
                                    <div class="image">
                                        <img src="{{ $slider->slider_image }}" alt="" />
                                    </div>
                                </div>
                            </div>
                            <!-- Content Column -->
                            <div class="content-column col-lg-5 col-md-12 col-sm-12">
                                <div class="inner-column">
                                    @php
                                        $title = session('lang') . '_title';
                                        $desc = session('lang') . '_description';
                                    @endphp
                                    <div class="title">
                                        {{ $slider->$title }}
                                    </div>
                                    <h2>Full Medical Care</h2>
                                    <div class="text">
                                        {{ $slider->$desc }}
                                    </div>
                                    <a href="{{ url('services') }}" class="theme-btn btn-style-two">
                                        <span class="txt">{{ __('admin.our_services') }}</span>
                                    </a>
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

            <!-- Add Pagination -->

            <div class="swiper-pagination"></div>

            <!-- Add Arrows -->

            <div class="swiper-button-next"></div>

            <div class="swiper-button-prev"></div>

        </div>

    </section>

    <!-- End Main Slider -->


    <!-- Welcome Section -->
    @php
        $desc = session('lang') . '_description';
    @endphp
    <section class="welcome-section">

        <div class="image-layer" style="background-image:url({{ asset('site/part2/images/background/pattern-2.png') }})"></div>
        <div class="auto-container">
            <div class="row clearfix">
                <!-- Content Column -->
                <div class="content-column col-lg-7 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <div class="sec-title">
                            <h2>{{ $aboutUs->$title }}</h2>
                            <div class="separator"></div>
                        </div>
                        <div class="text">
                            <p> {{ $aboutUs->$desc }} </p>
                        </div>

                        <a href="https://www.youtube.com/watch?v=kxPCFljwJws" class="lightbox-image play-btn"><span class="icon flaticon-play-arrow"></span> {{ __('home.about_us') }}</a>

                    </div>

                </div>



                <!-- Image Column -->

                <div class="image-column col-lg-5 col-md-12 col-sm-12">

                    <div class="inner-column wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1500ms">

                        <div class="image">

                            <img src="{{ $aboutUs->about_image }}" alt="" />

                            <div class="icon-outer">
                                <span class="icon-inner"><span class="icon flaticon-rocket-ship"></span></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section>
    <!-- End Welcome Section -->


	<!-- Department Section Two -->
	<section class="department-section-two" style="background-image:url({{ asset('site/part2/images/background/3.png') }})">
		<div class="auto-container">
			<div class="sec-title light centered">
				<h2>{{ __('admin.our_projects') }}</h2>
				<div class="separator"></div>
			</div>

			<div class="three-item-carousel owl-carousel owl-theme">
				@foreach ($projects as $project)
				<!-- Department Block Two -->
				<div class="department-block-two">
					<div class="inner-box">
						<div class="image">
							<a href="#">
                                <img src="{{ $project->project_image }}" alt="" /></a>
						</div>
						<div class="lower-content">
                            @php
                                $title = session('lang') . '_title';
                                $desc = session('lang') . '_description';
                            @endphp
							<h3>
                                <a href="#">{{ $project->$title }}</a>
                            </h3>

							<div class="text">
                                {{ $project->$desc }}
                            </div>

							<a href="#" class="read-more">{{ __('home.read_more') }} <span class="arrow fas fa-angle-double-right"></span></a>

						</div>

					</div>

                </div>
                @endforeach
			</div>
		</div>
	</section>
	<!-- End Department Section Two -->

    <!-- Services Section Two -->
	<section class="services-section-two" style="background-image:url({{ asset('site/part2/images/background/4.jpg') }})">
		<div class="auto-container">
			<!-- Sec Title -->
			<div class="sec-title centered">
				<h2>{{ __('home.our_services') }}</h2>
				<div class="separator"></div>
			</div>
			<div class="row clearfix">
				<!-- Services Block Three -->
                @foreach ($services as $service)
                <div class="service-block-three col-lg-4 col-md-6 col-sm-12">
					<div class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
						<div class="border-one"></div>
						<div class="border-two"></div>
						<div class="icon-box">
							<span class="icon flaticon-stethoscope"></span>
                        </div>
                        @php
                            $title = session('lang') . '_title';
                            $desc = session('lang') . '_description';
                        @endphp
						<h3><a href="#">{{ $service->$title }}</a></h3>
						<div class="text"> {{ $service->$desc }} </div>

					</div>
                </div>
                @endforeach
			</div>

		</div>

	</section>
	<!-- End Services Section Two -->


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


    <!-- Testimonial Section -->
    <section class="testimonial-section">
        <div class="auto-container">
            <!-- Sec Title -->
            <div class="sec-title centered">
                <h2>{{ __('home.happy_customers_said') }}</h2>
                <div class="separator"></div>
            </div>
            <div class="testimonial-outer" style="background-image: url({{ asset('site/part2/images/background/pattern-4.png') }})">
                <!--Client Testimonial Carousel-->
                <div class="client-testimonial-carousel owl-carousel owl-theme">
                    @foreach ($testimonials as $index => $testimonial)
                    <!--Testimonial Block -->
                    <div class="testimonial-block">
                        <div class="inner-box">
                            <div class="quote-icon flaticon-quote"></div>
                            <div class="text">
                                @php
                                    $desc = session('lang') . '_description';
                                @endphp
                                {{ $testimonial->$desc }}
                            </div>
                        </div>
                    </div>
                    @if (@index == 5)
                        @break
                    @endif
                    @endforeach
                </div>

                <!--Product Thumbs Carousel-->
                <div class="client-thumb-outer">
                    <div class="client-thumbs-carousel owl-carousel owl-theme">
                        @foreach ($testimonials as $index => $testimonial)
                        <div class="thumb-item">
                            <figure class="thumb-box">
                                <img src="{{ $testimonial->testimonial_image }}" alt="">
                            </figure>
                            <div class="author-info">
                                @php
                                    $name = session('lang') . '_name';
                                    $title = session('lang') . '_title';
                                @endphp
                                <div class="author-name">{{ $testimonial->$name }}</div>
                                <div class="designation">{{ $testimonial->$title }}</div>
                            </div>

                        </div>
                        @if (@index == 5)
                            @break
                        @endif
                        @endforeach
                    </div>
                </div>





            </div>

        </div>

    </section>
    <!-- End Testimonial Section Two -->


    <!-- Doctor Gallery Section -->
	<section class="doctor-gallery-section">
		<div class="outer-container">
			<div class="doctor-gallery-carousel owl-carousel owl-theme">
                <!-- Gallery Block -->
                @foreach ($services as $service)
                <div class="gallery-block">
					<div class="inner-box">
						<figure class="image-box">
							<img src="{{ $service->service_image }}" alt="">
							<!--Overlay Box-->
							<div class="overlay-box">
								<div class="overlay-inner">
									<div class="content">
										<a href="#" class="link">
                                            <img src="{{ getLogo() }}" alt="" />
                                        </a>
									</div>
								</div>
							</div>
						</figure>
					</div>
				</div>
                @endforeach
			</div>
		</div>
	</section>
	<!-- End Gallery Section -->


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
