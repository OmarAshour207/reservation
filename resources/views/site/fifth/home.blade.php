@extends('site.fifth.layouts.app')

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


    @if($page_filter != null)

    @if (in_array('about', $page_filter))
        <!-- Fluid Section One -->
        <section class="fluid-section-one">
            <div class="outer-section clearfix">
            <!--Image Column-->
                <div class="image-column" style="background-image: url('{{ $aboutUs->about_image }}')">
                    <div class="image">
                        <img src="{{ $aboutUs->about_image }}" alt="">
                    </div>
                </div>
                <!--End Image Column-->

                <!--Content Column-->
                <div class="content-column">
                    <div class="content-box">
                        <div class="sec-title">
                            <h2>Pioneering in Health.</h2>
                            <div class="separator style-two"></div>
                        </div>
                        <div class="text">
                            @php
                                $desc = session('lang') . '_description';
                            @endphp
                            <p> {{ $aboutUs->$desc }} </p>
                        </div>
                        <div class="row clearfix">
                            <div class="column col-lg-6 col-md-6 col-sm-12">
                                <ul class="list-style-one">
                                    @foreach ($services as $index => $service)
                                    <li>
                                        <span class="icon flaticon-medical-stethoscope-variant"></span>
                                        @php
                                            $title = session('lang') . '_title';
                                        @endphp
                                        {{ $service->$title }}
                                    </li>
                                    @if ($index == 3)
                                        @break;
                                    @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    @endif


        <!-- Services Section -->
        <section class="services-section">

            <div class="auto-container">



                <!-- Sec Title -->

                <div class="sec-title centered">

                    <h2>Best Health Services</h2>

                    <div class="separator"></div>

                </div>



                <div class="row clearfix">



                    <!-- Left Column -->

                    <div class="left-column pull-left col-lg-4 col-md-12 col-sm-12">

                        <div class="inner-column">



                            <!-- Service Block -->

                            <div class="service-block">

                                <div class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">

                                    <div class="icon-box">

                                        <span class="icon flaticon-doctor-stethoscope"></span>

                                    </div>

                                    <h3><a href="doctors-detail.html">Outdoor Checkup</a></h3>

                                    <div class="text">We provide best service for our cline. <br> Now place take it.</div>

                                </div>

                            </div>



                            <!-- Service Block -->

                            <div class="service-block">

                                <div class="inner-box wow fadeInLeft" data-wow-delay="250ms" data-wow-duration="1500ms">

                                    <div class="icon-box">

                                        <span class="icon flaticon-operating-room"></span>

                                    </div>

                                    <h3><a href="doctors-detail.html">Operation Theater</a></h3>

                                    <div class="text">We provide best service for our cline. Now place take it.</div>

                                </div>

                            </div>



                            <!-- Service Block -->

                            <div class="service-block">

                                <div class="inner-box wow fadeInLeft" data-wow-delay="500ms" data-wow-duration="1500ms">

                                    <div class="icon-box">

                                        <span class="icon flaticon-van"></span>

                                    </div>

                                    <h3><a href="doctors-detail.html">Emergency Care</a></h3>

                                    <div class="text">We provide best service for our cline. <br> Now place take it.</div>

                                </div>

                            </div>



                        </div>

                    </div>



                    <!-- Circles Column -->

                    <div class="circles-column col-lg-4 col-md-12 col-sm-12">

                        <div class="inner-column">



                            <div class="circles">

                                <div class="circle-one"></div>

                                <div class="circle-two"></div>

                                <div class="circle-three"></div>

                            </div>



                        </div>

                    </div>



                    <!-- Right Column -->

                    <div class="right-column pull-right col-lg-4 col-md-12 col-sm-12">

                        <div class="inner-column">



                            <!-- Service Block -->

                            <div class="service-block-two">

                                <div class="inner-box wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1500ms">

                                    <div class="icon-box">

                                        <span class="icon flaticon-water"></span>

                                    </div>

                                    <h3><a href="doctors-detail.html">Blood Test</a></h3>

                                    <div class="text">We provide best service for our cline. <br> Now place take it.</div>

                                </div>

                            </div>



                            <!-- Service Block -->

                            <div class="service-block-two">

                                <div class="inner-box wow fadeInRight" data-wow-delay="250ms" data-wow-duration="1500ms">

                                    <div class="icon-box">

                                        <span class="icon flaticon-pharmacy"></span>

                                    </div>

                                    <h3><a href="doctors-detail.html">Pharmacy Support</a></h3>

                                    <div class="text">We provide best service for our cline. Now place take it.</div>

                                </div>

                            </div>



                            <!-- Service Block -->

                            <div class="service-block-two">

                                <div class="inner-box wow fadeInRight" data-wow-delay="500ms" data-wow-duration="1500ms">

                                    <div class="icon-box">

                                        <span class="icon flaticon-nurse"></span>

                                    </div>

                                    <h3><a href="doctors-detail.html">24/7 Service</a></h3>

                                    <div class="text">We provide best service for our cline. <br> Now place take it.</div>

                                </div>

                            </div>



                        </div>

                    </div>



                </div>



            </div>

        </section>

        <!-- Counter Section -->
        <section class="counter-section" style="background-image: url(images/background/pattern-3.png)">

            <div class="auto-container">



                <!-- Fact Counter -->

                <div class="fact-counter">

                    <div class="row clearfix">



                        <!--Column-->

                        <div class="column counter-column col-lg-3 col-md-6 col-sm-12">

                            <div class="inner wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">

                                <div class="content">

                                    <div class="count-outer count-box">

                                        <span class="count-text" data-speed="2500" data-stop="2350">0</span>

                                    </div>

                                    <h4 class="counter-title">Satisfied Patients</h4>

                                </div>

                            </div>

                        </div>



                        <!--Column-->

                        <div class="column counter-column col-lg-3 col-md-6 col-sm-12">

                            <div class="inner wow fadeInLeft" data-wow-delay="300ms" data-wow-duration="1500ms">

                                <div class="content">

                                    <div class="count-outer count-box alternate">

                                        +<span class="count-text" data-speed="3000" data-stop="350">0</span>

                                    </div>

                                    <h4 class="counter-title">Doctor’s Team</h4>

                                </div>

                            </div>

                        </div>



                        <!--Column-->

                        <div class="column counter-column col-lg-3 col-md-6 col-sm-12">

                            <div class="inner wow fadeInLeft" data-wow-delay="600ms" data-wow-duration="1500ms">

                                <div class="content">

                                    <div class="count-outer count-box">

                                        <span class="count-text" data-speed="3000" data-stop="2150">0</span>

                                    </div>

                                    <h4 class="counter-title">Success Mission</h4>

                                </div>

                            </div>

                        </div>



                        <!--Column-->

                        <div class="column counter-column col-lg-3 col-md-6 col-sm-12">

                            <div class="inner wow fadeInLeft" data-wow-delay="900ms" data-wow-duration="1500ms">

                                <div class="content">

                                    <div class="count-outer count-box">

                                        +<span class="count-text" data-speed="2500" data-stop="225">0</span>

                                    </div>

                                    <h4 class="counter-title">Successfull Surgeries</h4>

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

                    <h2>The Medical Specialists</h2>

                    <div class="separator"></div>

                </div>



                <div class="row clearfix">



                    <!-- Team Block -->

                    <div class="team-block col-lg-3 col-md-6 col-sm-6 col-xs-12">

                        <div class="inner-box wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">

                            <div class="image">

                                <img src="images/resource/team-1.jpg" alt="" />

                                <div class="overlay-box">

                                    <ul class="social-icons">

                                        <li><a href="#"><span class="fab fa-facebook-f"></span></a></li>

                                        <li><a href="#"><span class="fab fa-google"></span></a></li>

                                        <li><a href="#"><span class="fab fa-twitter"></span></a></li>

                                        <li><a href="#"><span class="fab fa-skype"></span></a></li>

                                        <li><a href="#"><span class="fab fa-linkedin-in"></span></a></li>

                                    </ul>

                                    <a href="#" class="appointment">Make Appointment</a>

                                </div>

                            </div>

                            <div class="lower-content">

                                <h3><a href="#">Dr. Andria Jonea</a></h3>

                                <div class="designation">Cancer Specialist</div>

                            </div>

                        </div>

                    </div>



                    <!-- Team Block -->

                    <div class="team-block col-lg-3 col-md-6 col-sm-6 col-xs-12">

                        <div class="inner-box wow fadeInUp" data-wow-delay="250ms" data-wow-duration="1500ms">

                            <div class="image">

                                <img src="images/resource/team-2.jpg" alt="" />

                                <div class="overlay-box">

                                    <ul class="social-icons">

                                        <li><a href="#"><span class="fab fa-facebook-f"></span></a></li>

                                        <li><a href="#"><span class="fab fa-google"></span></a></li>

                                        <li><a href="#"><span class="fab fa-twitter"></span></a></li>

                                        <li><a href="#"><span class="fab fa-skype"></span></a></li>

                                        <li><a href="#"><span class="fab fa-linkedin-in"></span></a></li>

                                    </ul>

                                    <a href="#" class="appointment">Make Appointment</a>

                                </div>

                            </div>

                            <div class="lower-content">

                                <h3><a href="#">Dr. Robet Samith</a></h3>

                                <div class="designation">Heart Surgen</div>

                            </div>

                        </div>

                    </div>



                    <!-- Team Block -->

                    <div class="team-block col-lg-3 col-md-6 col-sm-6 col-xs-12">

                        <div class="inner-box wow fadeInUp" data-wow-delay="500ms" data-wow-duration="1500ms">

                            <div class="image">

                                <img src="images/resource/team-3.jpg" alt="" />

                                <div class="overlay-box">

                                    <ul class="social-icons">

                                        <li><a href="#"><span class="fab fa-facebook-f"></span></a></li>

                                        <li><a href="#"><span class="fab fa-google"></span></a></li>

                                        <li><a href="#"><span class="fab fa-twitter"></span></a></li>

                                        <li><a href="#"><span class="fab fa-skype"></span></a></li>

                                        <li><a href="#"><span class="fab fa-linkedin-in"></span></a></li>

                                    </ul>

                                    <a href="#" class="appointment">Make Appointment</a>

                                </div>

                            </div>

                            <div class="lower-content">

                                <h3><a href="#">Dr. Sharon Laura</a></h3>

                                <div class="designation">Family Physician</div>

                            </div>

                        </div>

                    </div>



                    <!-- Team Block -->

                    <div class="team-block col-lg-3 col-md-6 col-sm-6 col-xs-12">

                        <div class="inner-box wow fadeInUp" data-wow-delay="750ms" data-wow-duration="1500ms">

                            <div class="image">

                                <img src="images/resource/team-4.jpg" alt="" />

                                <div class="overlay-box">

                                    <ul class="social-icons">

                                        <li><a href="#"><span class="fab fa-facebook-f"></span></a></li>

                                        <li><a href="#"><span class="fab fa-google"></span></a></li>

                                        <li><a href="#"><span class="fab fa-twitter"></span></a></li>

                                        <li><a href="#"><span class="fab fa-skype"></span></a></li>

                                        <li><a href="#"><span class="fab fa-linkedin-in"></span></a></li>

                                    </ul>

                                    <a href="#" class="appointment">Make Appointment</a>

                                </div>

                            </div>

                            <div class="lower-content">

                                <h3><a href="#">Dr. Alex Furgosen</a></h3>

                                <div class="designation">Ortho Specialist</div>

                            </div>

                        </div>

                    </div>



                </div>



            </div>

        </section>
        <!-- End Team Section -->

        <!-- FullWidth Section -->
        <section class="fullwidth-section">

            <div class="outer-container">

                <div class="clearfix">



                    <!-- Left Column -->

                    <div class="left-column" style="background-image: url(images/background/1.jpg)">

                        <div class="inner-column clearfix">

                            <div class="content">

                                <div class="icon-box">

                                    <span class="icon flaticon-contract-1"></span>

                                </div>

                                <div class="title">Need a Doctor for Check-up?</div>

                                <h2>JUST MAKE AN APPOINTMENT</h2>

                                <a href="contact.html" class="theme-btn btn-style-two"><span class="txt">Get an Appointment</span></a>

                            </div>

                        </div>

                    </div>



                    <!-- Right Column -->

                    <div class="right-column">

                        <div class="inner-column">



                            <!-- Upper Box -->

                            <div class="upper-box">

                                <div class="icon flaticon-alarm-clock"></div>

                                <h3>Opening Hours</h3>

                            </div>

                            <ul class="time-list">

                                <li class="clearfix"><span class="left-span pull-left">Monday - Friday</span><span class="right-span pull-right">08:00am - 10:00pm</span></li>

                                <li class="clearfix"><span class="left-span pull-left">Saturday - Sunday</span><span class="right-span pull-right">09:00am - 06:00pm</span></li>

                                <li class="clearfix"><span class="left-span pull-left">Emergency Services</span><span class="right-span pull-right">24 hours Open</span></li>

                            </ul>



                        </div>

                    </div>



                </div>

            </div>

        </section>
        <!-- End FullWidth Section -->

        <!-- Testimonial Section -->
        <section class="testimonial-section">

            <div class="auto-container">

                <!-- Sec Title -->

                <div class="sec-title centered">

                    <h2>What Patients Saying</h2>

                    <div class="separator"></div>

                </div>

                <div class="testimonial-outer" style="background-image: url(images/background/pattern-4.png)">



                    <!--Client Testimonial Carousel-->

                    <div class="client-testimonial-carousel owl-carousel owl-theme">



                        <!--Testimonial Block -->

                        <div class="testimonial-block">

                            <div class="inner-box">

                                <div class="quote-icon flaticon-quote"></div>

                                <div class="text">Medical Centre is a great place to get all of your medical needs. I came in for a check up and did not wait more than 5 minutes before I was seen. I can only imagine the type of service you get for more serious issues. Thanks!</div>

                            </div>

                        </div>



                        <!--Testimonial Block -->

                        <div class="testimonial-block">

                            <div class="inner-box">

                                <div class="quote-icon flaticon-quote"></div>

                                <div class="text">Medical Centre is a great place to get all of your medical needs. I came in for a check up and did not wait more than 5 minutes before I was seen. I can only imagine the type of service you get for more serious issues. Thanks!</div>

                            </div>

                        </div>



                        <!--Testimonial Block -->

                        <div class="testimonial-block">

                            <div class="inner-box">

                                <div class="quote-icon flaticon-quote"></div>

                                <div class="text">Medical Centre is a great place to get all of your medical needs. I came in for a check up and did not wait more than 5 minutes before I was seen. I can only imagine the type of service you get for more serious issues. Thanks!</div>

                            </div>

                        </div>



                        <!--Testimonial Block -->

                        <div class="testimonial-block">

                            <div class="inner-box">

                                <div class="quote-icon flaticon-quote"></div>

                                <div class="text">Medical Centre is a great place to get all of your medical needs. I came in for a check up and did not wait more than 5 minutes before I was seen. I can only imagine the type of service you get for more serious issues. Thanks!</div>

                            </div>

                        </div>



                        <!--Testimonial Block -->

                        <div class="testimonial-block">

                            <div class="inner-box">

                                <div class="quote-icon flaticon-quote"></div>

                                <div class="text">Medical Centre is a great place to get all of your medical needs. I came in for a check up and did not wait more than 5 minutes before I was seen. I can only imagine the type of service you get for more serious issues. Thanks!</div>

                            </div>

                        </div>



                        <!--Testimonial Block -->

                        <div class="testimonial-block">

                            <div class="inner-box">

                                <div class="quote-icon flaticon-quote"></div>

                                <div class="text">Medical Centre is a great place to get all of your medical needs. I came in for a check up and did not wait more than 5 minutes before I was seen. I can only imagine the type of service you get for more serious issues. Thanks!</div>

                            </div>

                        </div>



                    </div>



                    <!--Product Thumbs Carousel-->

                    <div class="client-thumb-outer">

                        <div class="client-thumbs-carousel owl-carousel owl-theme">

                            <div class="thumb-item">

                                <figure class="thumb-box"><img src="images/resource/author-1.jpg" alt=""></figure>

                                <div class="author-info">

                                    <div class="author-name">Max Winchester</div>

                                    <div class="designation">Kidny Patient</div>

                                </div>

                            </div>

                            <div class="thumb-item">

                                <figure class="thumb-box"><img src="images/resource/author-2.jpg" alt=""></figure>

                                <div class="author-info">

                                    <div class="author-name">Max Winchester</div>

                                    <div class="designation">Kidny Patient</div>

                                </div>

                            </div>

                            <div class="thumb-item">

                                <figure class="thumb-box"><img src="images/resource/author-3.jpg" alt=""></figure>

                                <div class="author-info">

                                    <div class="author-name">Max Winchester</div>

                                    <div class="designation">Kidny Patient</div>

                                </div>

                            </div>

                            <div class="thumb-item">

                                <figure class="thumb-box"><img src="images/resource/author-1.jpg" alt=""></figure>

                                <div class="author-info">

                                    <div class="author-name">Max Winchester</div>

                                    <div class="designation">Kidny Patient</div>

                                </div>

                            </div>

                            <div class="thumb-item">

                                <figure class="thumb-box"><img src="images/resource/author-2.jpg" alt=""></figure>

                                <div class="author-info">

                                    <div class="author-name">Max Winchester</div>

                                    <div class="designation">Kidny Patient</div>

                                </div>

                            </div>

                            <div class="thumb-item">

                                <figure class="thumb-box"><img src="images/resource/author-3.jpg" alt=""></figure>

                                <div class="author-info">

                                    <div class="author-name">Max Winchester</div>

                                    <div class="designation">Kidny Patient</div>

                                </div>

                            </div>

                        </div>

                    </div>





                </div>

            </div>

        </section>
        <!-- End Testimonial Section Two -->

        <!-- News Section -->
        <section class="news-section">

            <div class="auto-container">

                <!-- Sec Title -->

                <div class="sec-title centered">

                    <h2>Latest News & Articals</h2>

                    <div class="separator style-three"></div>

                </div>

                <div class="row clearfix">



                    <!-- News Block -->

                    <div class="news-block col-lg-4 col-md-6 col-sm-12">

                        <div class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">

                            <div class="image">

                                <div class="category">Artical</div>

                                <a href="blog-detail.html"><img src="images/resource/news-1.jpg" alt="" /></a>

                            </div>

                            <div class="lower-content">

                                <ul class="post-meta">

                                    <li><a href="#">03 Comments</a></li>

                                    <li><a href="#">June 21, 2018 at 8:12pm</a></li>

                                    <li><a href="#">12 Liks</a></li>

                                </ul>

                                <h3><a href="blog-detail.html">Diagnostic Services for Efficient Results Picking Right </a></h3>

                                <div class="text">There are a lot of women that are unaware of the numerous risks associated with their health and eventually ignore the ...</div>

                                <a href="blog-detail.html" class="read-more">Read More</a>

                            </div>

                        </div>

                    </div>



                    <!-- News Block -->

                    <div class="news-block col-lg-4 col-md-6 col-sm-12">

                        <div class="inner-box wow fadeInLeft" data-wow-delay="300ms" data-wow-duration="1500ms">

                            <div class="image">

                                <div class="category">Artical</div>

                                <a href="blog-detail.html"><img src="images/resource/news-2.jpg" alt="" /></a>

                            </div>

                            <div class="lower-content">

                                <ul class="post-meta">

                                    <li><a href="#">03 Comments</a></li>

                                    <li><a href="#">June 21, 2018 at 8:12pm</a></li>

                                    <li><a href="#">12 Liks</a></li>

                                </ul>

                                <h3><a href="blog-detail.html">Reasons to Visit for Heart Specialist Us</a></h3>

                                <div class="text">There are a lot of women that are unaware of the numerous risks associated with their health and eventually ignore the ...</div>

                                <a href="blog-detail.html" class="read-more">Read More</a>

                            </div>

                        </div>

                    </div>



                    <!-- News Block -->

                    <div class="news-block col-lg-4 col-md-6 col-sm-12">

                        <div class="inner-box wow fadeInLeft" data-wow-delay="600ms" data-wow-duration="1500ms">

                            <div class="image">

                                <div class="category">Artical</div>

                                <a href="blog-detail.html"><img src="images/resource/news-3.jpg" alt="" /></a>

                            </div>

                            <div class="lower-content">

                                <ul class="post-meta">

                                    <li><a href="#">03 Comments</a></li>

                                    <li><a href="#">June 21, 2018 at 8:12pm</a></li>

                                    <li><a href="#">12 Liks</a></li>

                                </ul>

                                <h3><a href="blog-detail.html">Preparing for an ECG Tips From Our Diagnosticians</a></h3>

                                <div class="text">There are a lot of women that are unaware of the numerous risks associated with their health and eventually ignore the ...</div>

                                <a href="blog-detail.html" class="read-more">Read More</a>

                            </div>

                        </div>

                    </div>



                </div>

            </div>

        </section>
        <!-- End News Section -->

        <!-- Newsletter Section -->
        <section class="newsletter-section">

            <div class="auto-container">

                <div class="row clearfix">

                    <!-- Title Column -->

                    <div class="title-column col-lg-6 col-md-12 col-sm-12">

                        <div class="inner-column">

                            <h2>Subscribe Our Newsletter</h2>

                            <div class="text">To receive email releases, simply provide us with your email address below.</div>

                        </div>

                    </div>

                    <!-- Form Column -->

                    <div class="form-column col-lg-6 col-md-12 col-sm-12">

                        <div class="inner-column">

                            <!-- Subscribe Form -->

                            <div class="subscribe-form">

                                <form method="post" action="https://expert-themes.com/html/meditech/contact.html">

                                    <div class="form-group">

                                        <input type="email" name="email" value="" placeholder="Your Email Address" required>

                                        <button type="submit" class="theme-btn btn-style-two"><span class="txt">subscribe</span></button>

                                    </div>

                                </form>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </section>
        <!-- End Newsletter Section -->
    @endif
@endsection
