	<!--Main Footer-->
    <footer class="main-footer" style="background-image: url({{ asset('site/part2/images/background/2.jpg') }})">
		<div class="auto-container">
        	<!--Widgets Section-->
            <div class="widgets-section">
            	<div class="row clearfix">
                    <!--big column-->
                    <div class="big-column col-lg-6 col-md-12 col-sm-12">
                        <div class="row clearfix">
							<!--Footer Column-->
                            <div class="footer-column col-lg-7 col-md-6 col-sm-12">
                                <div class="footer-widget logo-widget">
									<div class="logo">
                                        <a href="{{ url('/') }}">
                                            <img src="{{ getLogo() }}" alt="" />
                                        </a>
                                    </div>

                                    <div class="text">
                                    </div>

                                    <ul class="social-icons">

                                        @php
                                            $socialSites = ['facebook', 'twitter', 'instagram'];
                                        @endphp
                                        @for($i = 0; $i < count($socialSites); $i++)
                                            @if(setting($socialSites[$i]) != '')
                                                <li>
                                                    <a href="{{ setting($socialSites[$i]) }}">
                                                        <span class="fab fa-{{ $socialSites[$i] }}"></span>
                                                    </a>
                                                </li>
                                            @endif
                                        @endfor
									</ul>
								</div>
							</div>

							<!--Footer Column-->
                            <div class="footer-column col-lg-5 col-md-6 col-sm-12">
                                <div class="footer-widget links-widget">
									<div class="footer-title  clearfix">
										<h2>{{ __('home.services') }}</h2>
										<div class="separator"></div>
									</div>

									<ul class="footer-list">
                                        @foreach ($services as $service)
                                        @php
                                            $title = session('lang') . '_title';
                                        @endphp
                                        <li>
                                            <a href="{{ route('service.show', ['id' => $service->id, 'title' => $service->$title]) }}">
                                                {{ $service->$title }}
                                            </a>
                                        </li>
                                        @endforeach
									</ul>
								</div>
							</div>
						</div>
					</div>



					<!--big column-->

                    <div class="big-column col-lg-6 col-md-12 col-sm-12">
                        <div class="row clearfix">
							<!--Footer Column-->
                            <div class="footer-column col-lg-6 col-md-6 col-sm-12">
                                <div class="footer-widget news-widget">
									<div class="footer-title  clearfix">
										<h2> {{ __('home.useful_links') }} </h2>
										<div class="separator"></div>
									</div>
									<!--News Widget Block-->
                                    <div class="news-widget-block">
                                        <div class="widget-inner">
                                            <h3>
                                                <a href="{{ url('contact-us') }}">
                                                    {{ __('home.contact_us') }}
                                                </a>
                                            </h3>
                                            <h3>
                                                <a href="{{ url('appointments') }}">
                                                    {{ __('home.appointments') }}
                                                </a>
                                            </h3>
                                            <h3>
                                                <a href="{{ url('team') }}">
                                                    {{ __('home.team') }}
                                                </a>
                                            </h3>
                                            <h3>
                                                <a href="{{ url('about') }}">
                                                    {{ __('home.about_us') }}
                                                </a>
                                            </h3>
                                            <h3>
                                                <a href="{{ url('services') }}">
                                                    {{ __('home.services') }}
                                                </a>
                                            </h3>
                                        </div>
                                    </div>
								</div>

							</div>
							<!--Footer Column-->
                            <div class="footer-column col-lg-6 col-md-6 col-sm-12">
                                <div class="footer-widget contact-widget">
									<div class="footer-title  clearfix">
										<h2>{{ __('home.contact_us') }}</h2>
										<div class="separator"></div>
									</div>
									<ul class="contact-list">
										<li>
                                            <span class="icon flaticon-placeholder"></span>
                                            {{ setting(session('lang') .'_address') }}
                                        </li>
										<li>
                                            <span class="icon flaticon-call"></span>
                                            Mon to Fri : 08:30 - 18:00 <br>
                                            <a href="tel:{{ setting('phone') }}">
                                                {{ setting('phone') }}
                                            </a>
                                        </li>
										<li>
                                            <span class="icon flaticon-message"></span>
                                            {{ __('home.have_question') }}
                                            <a href="mailto:{{ setting('email') }}">{{ setting('email') }}</a>
                                        </li>
									</ul>
								</div>
							</div>
						</div>

					</div>



				</div>

			</div>

		</div>
	</footer>
