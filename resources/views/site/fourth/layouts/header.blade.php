<!-- header -->
<header class="site-header mo-left header-full header header-transparent header-sidenav onepage white">
    <!-- main header -->
    <div class="sticky-header main-bar-wraper navbar-expand-lg">
        <div class="main-bar clearfix">
            <div class="container-fluid p-r0">
                <div class="header-content-bx">
                    <!-- website logo -->
                    <div class="logo-header logo-white">
                        <a href="{{ url('/') }}"><img src="{{ getLogo() }}" alt=""/></a>
                    </div>
                    <div class="extra-nav">
                        <div class="extra-cell">
                            <ul>
                                <li class="search-btn">
                                    <a href="javascript:;" class="menu-icon">
                                        <div class="menu-icon-in">
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-nav navbar-collapse collapse full-sidenav navbar">
        <div class="logo-header logo-dark">
            <a href="{{ url('/') }}"><img src="{{ getLogo() }}" alt=""/></a>
        </div>
        <ul class="nav navbar-nav ">
            <li><a href="{{ url('/') }}" class="scroll nav-link">{{ __('home.home') }}</a></li>
            <li><a href="{{ url('about') }}" class="scroll nav-link">{{ __('home.about_us') }}</a></li>
            <li><a href="{{ url('services') }}" class="scroll nav-link">{{ __('home.our_services') }}</a></li>
            <li><a href="{{ url('projects') }}" class="scroll nav-link">{{ __('home.our_projects') }}</a></li>
            <li><a href="{{ url('blogs') }}" class="scroll nav-link">{{ trans('home.blogs') }}</a></li>
            <li><a href="{{ url('contact-us') }}" class="scroll nav-link">{{ __('home.contact_us') }}</a></li>
            <li><a href="{{ url('lang/ar') }}" class="scroll nav-link">{{ trans('home.arabic') }}</a></li>
            <li><a href="{{ url('lang/en') }}" class="scroll nav-link">{{ trans('home.english') }}</a></li>
        </ul>
        <div class="social-menu">
            <ul>
                @php
                    $socialSites = ['facebook', 'twitter', 'instagram'];
                @endphp
                @for($i = 0; $i < count($socialSites); $i++)
                    @if(setting($socialSites[$i]) != '')
                        <li>
                            <a class="fa fa-{{ $socialSites[$i] }}" href="{{ setting($socialSites[$i]) }}"></a>
                        </li>
                    @endif
                @endfor
            </ul>
            <p class="copyright-head">© {{ setting('title') }} </p>
        </div>
    </div>
    <div class="menu-close">
        <i class="ti-close"></i>
    </div>
    <!-- main header END -->
</header>
<!-- header END -->
