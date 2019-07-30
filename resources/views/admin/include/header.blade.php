<header id="m_header" class="m-grid__item    m-header " m-minimize-offset="200" m-minimize-mobile-offset="200">
    <div class="m-container m-container--fluid m-container--full-height">
        <div class="m-stack m-stack--ver m-stack--desktop">

            <!-- BEGIN: Brand -->
            <div class="m-stack__item m-brand  m-brand--skin-dark ">
                <div class="m-stack m-stack--ver m-stack--general">
                    <div class="m-stack__item m-stack__item--middle m-brand__logo">
                        <a href="{{ route('admin.home.index') }}" class="m-brand__logo-wrapper">
                            <img alt="" src="/backend/assets/app/media/img/logo/logo.png" style="max-width: 75px;" />
                        </a>
                    </div>
                    <div class="m-stack__item m-stack__item--middle m-brand__tools">

                        <!-- BEGIN: Left Aside Minimize Toggle -->
                        <a href="javascript:;" id="m_aside_left_minimize_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-desktop-inline-block  ">
                            <span></span>
                        </a>

                        <!-- END -->

                        <!-- BEGIN: Responsive Aside Left Menu Toggler -->
                        <a href="javascript:;" id="m_aside_left_offcanvas_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-tablet-and-mobile-inline-block">
                            <span></span>
                        </a>

                        <!-- END -->

                        <!-- BEGIN: Responsive Header Menu Toggler -->
                        <a id="m_aside_header_menu_mobile_toggle" href="javascript:;" class="m-brand__icon m-brand__toggler m--visible-tablet-and-mobile-inline-block">
                            <span></span>
                        </a>

                        <!-- END -->

                        <!-- BEGIN: Topbar Toggler -->
                        <a id="m_aside_header_topbar_mobile_toggle" href="javascript:;" class="m-brand__icon m--visible-tablet-and-mobile-inline-block">
                            <i class="flaticon-more"></i>
                        </a>

                        <!-- BEGIN: Topbar Toggler -->
                    </div>
                </div>
            </div>

            <!-- END: Brand -->
            <div class="m-stack__item m-stack__item--fluid m-header-head" id="m_header_nav">

                <!-- BEGIN: Horizontal Menu -->
                <button class="m-aside-header-menu-mobile-close  m-aside-header-menu-mobile-close--skin-dark " id="m_aside_header_menu_mobile_close_btn"><i class="la la-close"></i></button>
                <!-- END: Horizontal Menu -->
                <!-- BEGIN: Topbar -->
                <div id="m_header_topbar" class="m-topbar  m-stack m-stack--ver m-stack--general m-stack--fluid">
                    <div class="m-stack__item m-topbar__nav-wrapper">
                        <ul class="m-topbar__nav m-nav m-nav--inline">

                            <li class="m-nav__item m-topbar__user-profile m-topbar__user-profile--img  m-dropdown m-dropdown--medium m-dropdown--arrow m-dropdown--header-bg-fill m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light"
                                m-dropdown-toggle="click">
                                <a href="#" class="m-nav__link m-dropdown__toggle">
                                    <b class="m-widget5__title text-white mobil-color" style="color: #3f4047 !important; float: left; margin-top: 15px; margin-left: 15px; margin-right: 35px; font-weight: 500; font-size: 1.1rem;">
                                        <span style="width: 20px; height: 20px; padding: 0px; margin: 0px; margin-right: 10px; float: left; display: block;">
                                          <svg class="p_v3ASA" viewBox="0 0 20 20" focusable="false" aria-hidden="true"><g><path d="M10 2a8 8 0 1 0 8 8 8.011 8.011 0 0 0-8-8zm0 14a5.943 5.943 0 0 1-3.28-.98 5.855 5.855 0 0 1 6.56 0A5.943 5.943 0 0 1 10 16zm4.78-2.39a7.95 7.95 0 0 0-9.56 0A5.887 5.887 0 0 1 4 10a6 6 0 0 1 12 0 5.887 5.887 0 0 1-1.22 3.61z"></path><path d="M10 5a3 3 0 1 0 3 3 3.009 3.009 0 0 0-3-3zm0 4a1 1 0 1 1 1-1 1 1 0 0 1-1 1z"></path></g></svg>
                                        </span>
                                        {{  \Auth::guard('admin')->user()->email }}
                                    </b>
                                </a>
                                <div class="m-dropdown__wrapper" >
                                    <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                                    <div class="m-dropdown__inner">
                                        <div class="m-dropdown__body">
                                            <div class="m-dropdown__content">
                                                <ul class="m-nav m-nav--skin-light">
                                                    <li class="m-nav__section m--hide">
                                                        <span class="m-nav__section-text">Section</span>
                                                    </li>
                                                    <li class="m-nav__item" >
                                                        <a href="/admin/logout" class="m-nav__link">
                                                            <span style="width: 20px; height: 20px; padding: 0px; margin: 0px; float: left; display: block;">
                                                                <svg class="p_v3ASA" viewBox="0 0 20 20" focusable="false" aria-hidden="true"><path d="M10 16a1 1 0 1 1 0 2c-4.411 0-8-3.589-8-8s3.589-8 8-8a1 1 0 1 1 0 2c-3.309 0-6 2.691-6 6s2.691 6 6 6zm7.707-6.707a.999.999 0 0 1 0 1.414l-3 3a.997.997 0 0 1-1.414 0 .999.999 0 0 1 0-1.414L14.586 11H10a1 1 0 1 1 0-2h4.586l-1.293-1.293a.999.999 0 1 1 1.414-1.414l3 3z" fill-rule="evenodd"></path></svg>
                                                            </span>
                                                            <span class="m-nav__link-title" style="float: left; margin-left: 15px; margin-top: 2px;">
                                                                <span class="m-nav__link-wrap">
                                                                    <span class="m-nav__link-text" style="color: #212b36; font-weight: 600;">Çıkış Yap</span>
                                                                </span>
                                                            </span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- END: Topbar -->
            </div>
        </div>
    </div>
</header>