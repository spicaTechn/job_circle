
<nav class="pcoded-navbar">
    <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
    <div class="pcoded-inner-navbar main-menu">
        <div class="pcoded-navigatio-lavel" data-i18n="nav.category.navigation">{{ __('Navigation')}}</div>
        <ul class="pcoded-item pcoded-left-item">

            <!--Dahboard menu link-->
            <li class="{{Request::is('admin') ? 'active ' : '' }}">
                <a href="{{ route('admin.dashboard') }}">
                    <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                    <span class="pcoded-mtext" >{{ __('Dashboard')}}</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li class="{{Request::is('/job-category') ? 'active ' : '' }}">
                <a href="{{ route('admin.job-category') }}">
                    <span class="pcoded-micon"><i class="ti-layers-alt"></i><b>D</b></span>
                    <span class="pcoded-mtext" >{{ __('Jobs Category')}}</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li class="{{Request::is('/job-type') ? 'active ' : '' }}">
                <a href="{{ route('admin.job-type') }}">
                    <span class="pcoded-micon"><i class="ti-bag"></i><b>D</b></span>
                    <span class="pcoded-mtext" >{{ __('Jobs Type')}}</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li class="{{Request::is('/jobs') ? 'active ' : '' }}">
                <a href="{{ route('admin.jobs') }}">
                    <span class="pcoded-micon"><i class="ti-support"></i><b>D</b></span>
                    <span class="pcoded-mtext" >{{ __('Jobs')}}</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <!-- <li class="{{Request::is('/adminjobs') ? 'active ' : '' }}">
                <a href="{{ route('admin.adminjobs') }}">
                    <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                    <span class="pcoded-mtext" >{{ __('Admin Jobs')}}</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li> -->
            <li class="pcoded-hasmenu">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="ti-plug"></i><b>{{ __('PAGES')}}</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.extra-components.main">{{ __('PAGES')}}</span>
                    <span class="pcoded-mcaret"></span>
                </a>
                <ul class="pcoded-submenu">
                    <li class="{{Request::is('admin.pages.home') ? 'active ' : '' }}">
                        <a href="{{route('admin.pages.home')}}">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" >{{ __('Home')}}</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="{{Request::is('admin.pages.services') ? 'active ' : '' }}">
                        <a href="{{route('admin.pages.services')}}">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" >{{ __('Services')}}</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="{{Request::is('admin.pages.company') ? 'active ' : '' }}">
                        <a href="{{route('admin.pages.company')}}">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" >{{ __('Company')}}</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="{{ Request::is('admin.pages.terms-conditions') }}">
                        <a href="{{ route('admin.pages.terms-conditions') }}">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" >{{ __('Terms & Conditions')}}</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="{{Request::is('admin.pages.contact') ? 'active ' : '' }}">
                        <a href="{{route('admin.pages.contact')}}">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" >{{ __('Contact US')}}</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="{{Request::is('admin.pages.faq') ? 'active ' : '' }}">
                        <a href="{{route('admin.pages.faq')}}">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" >{{ __("FAQ's")}}</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                </ul>
            </li>


        </ul>
    </div>
</nav>