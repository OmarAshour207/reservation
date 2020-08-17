<!-- header -->
<header class="site-header mo-left header navstyle1">
    <!-- main header -->
    <div class="sticky-header main-bar-wraper header-curve navbar-expand-lg">
        <div class="main-bar clearfix bg-primary">
            <div class="container clearfix">
                <!-- website logo -->
                <div class="logo-header mostion logo-dark">
                    <a href="{{ url('/') }}"><img src="{{ getLogo() }}" alt=""></a>
                </div>
                <!-- nav toggle button -->
                <button class="navbar-toggler collapsed navicon justify-content-end" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                <!-- extra nav -->
                <div class="extra-nav">
                    <div class="extra-cell">
                        <button id="quik-search-btn" type="button" class="site-button-link"><i class="la la-search"></i></button>
                    </div>
                </div>
                <!-- Quik search -->
                <div class="dlab-quik-search ">
                    <form action="#">
                        <input name="search" value="" type="text" class="form-control" placeholder="Type to search">
                        <span id="quik-search-remove"><i class="ti-close"></i></span>
                    </form>
                </div>
                <!-- main nav -->
                <div class="header-nav navbar-collapse collapse justify-content-end" id="navbarNavDropdown">
                    <div class="logo-header d-md-block d-lg-none">
                        <a href="{{ url('/') }}"><img src="{{ getLogo() }}" alt=""></a>
                    </div>
                    <ul class="nav navbar-nav">
                        <li class="{{ setActiveHome('') }}">
                            <a href="{{ url('/') }}">
                                <i class="fa fa-home" style="font-size: 18px;"></i> {{ __('home.home') }}
                            </a>
                        </li>

                        <li class="{{ setActive('about') }}">
                            <a href="{{ url('about') }}">
                                <i class="fa fa-info" style="font-size: 18px"></i> {{ __('home.about_us') }}
                            </a>
                        </li>

                        <li class="{{ setActive('services') }}">
                            <a href="{{ url('services') }}"> {{ __('home.our_services') }} </a>
                        </li>

                        <li class="{{ setActive('projects') }} ">
                            <a href="{{ url('projects') }}"> {{ trans('home.our_projects') }}</a>
                        </li>

                        <li class="{{ setActive('blogs') }}">
                            <a href="{{ url('blogs') }}">
                                <i class="fa fa-book-open" style="font-size: 18px"></i> {{ trans('home.blogs') }}
                            </a>
                        </li>

                        <li class="{{ setActive('contact-us') }}">
                            <a href="{{ url('contact-us') }}">
                                <i class="fa fa-phone" style="font-size: 18px"></i> {{ trans('home.contact_us') }}
                            </a>
                        </li>

                        <li>
                            <a href="javascript:;">{{ __('home.language') }}<i class="fa fa-chevron-down"></i></a>
                            <ul class="sub-menu right">
                                <li>
                                    <a href="{{ url('lang/ar') }}"><i class="fa fa-flag" style="font-size: 18px"></i> {{ trans('home.arabic') }}</a>
                                </li>
                                <li>
                                    <a href="{{ url('lang/en') }}"><i class="fa fa-flag" style="font-size: 18px"></i> {{ trans('home.english') }}</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <div class="dlab-social-icon">
                        <ul>
                            <li><a class="site-button facebook sharp-sm fa fa-facebook" href="javascript:void(0);"></a></li>
                            <li><a class="site-button twitter sharp-sm fa fa-twitter" href="javascript:void(0);"></a></li>
                            <li><a class="site-button linkedin sharp-sm fa fa-linkedin" href="javascript:void(0);"></a></li>
                            <li><a class="site-button instagram sharp-sm fa fa-instagram" href="javascript:void(0);"></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- main header END -->
</header>
<!-- header END -->
