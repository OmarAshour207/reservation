<!-- Footer -->
<footer class="site-footer footer-gray-1">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-12 wow fadeIn" data-wow-delay="0.2s">
                    <div class="widget border-0">
                        <h6 class="m-b20 text-white font-weight-300 text-uppercase"> {{ __('home.useful_links') }} </h6>
                        <ul class="list-2">
                            <li><a href="{{ url('about') }}">{{ trans('home.about_us') }}</a></li>
                            <li><a href="{{ url('services') }}">{{ trans('home.our_services') }}</a></li>
                            <li><a href="{{ url('projects') }}">{{ trans('home.our_projects') }}</a></li>
                            <li><a href="{{ url('contact-us') }}">{{ trans('home.contact_us') }}</a></li>
                            <li><a href="{{ url('blogs') }}">{{ trans('home.blogs') }}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 wow fadeIn" data-wow-delay="0.4s">
                    <div class="widget">
                        <h6 class="text-white font-weight-300 text-uppercase">{{ __('home.newsletter') }}</h6>
                        <div class="subscribe-form m-b20 m-t15">
                            <form class="dzSubscribe" action="https://industry.dexignzone.com/xhtml/script/mailchamp.php" method="post">
                                <div class="dzSubscribeMsg"></div>
                                <div class="input-group">
                                    <input name="dzEmail" required="required" class="form-control radius-no" placeholder="{{ __('home.email_contact') }}" type="email">
                                    <span class="input-group-btn">
											<button name="submit" value="Submit" type="submit" class="site-button radius-no btnhover14">{{ __('home.send') }}</button>
										</span>
                                </div>
                            </form>
                        </div>
                        <h6 class="m-b10 text-white font-weight-300 text-uppercase">{{ __('home.connect_with_us') }}</h6>
                        <ul class="list-inline m-a0">
                            @php
                                $socialSites = ['facebook', 'twitter', 'instagram'];
                            @endphp
                            @for($i = 0; $i < count($socialSites); $i++)
                                @if(setting($socialSites[$i]) != '')
                                    <li>
                                        <a class="site-button {{ $socialSites[$i] }} sharp" href="{{ setting($socialSites[$i]) }}">
                                            <i class="fa fa-{{ $socialSites[$i] }}"></i>
                                        </a>
                                    </li>
                                @endif
                            @endfor
                        </ul>
                    </div>
                </div>
                <div class="col-lg-5 col-md-12 col-sm-12 wow fadeIn" data-wow-delay="0.6s">
                    <div class="icon-bx-wraper bx-style-1 p-a30 m-b15 radius-sm br-col-w1 bg-tpw1">
                        <h5 class="text-white font-weight-300">{{ __('home.about_us') }}</h5>
                        <p> {{ __('home.about_us_description') }} </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer END-->
