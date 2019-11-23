<button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn">
    <i class="la la-close"></i>
</button>
<div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark ">

    <!-- BEGIN: Aside Menu -->
    <div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark " m-menu-vertical="1" m-menu-scrollable="1" m-menu-dropdown-timeout="500" style="position: relative;">
        <ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
            <li class="m-menu__item {{ Helper::isActiveRoute(['home'])  }}" aria-haspopup="true">
                <a href="{{ route('admin.home.index') }}" class="m-menu__link ">
                    <i class="m-menu__link-icon flaticon-line-graph"></i>
                    <span class="m-menu__link-title">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text">{{ trans_choice('admin.home.title', 2) }}</span>
                        </span>
                    </span>
                </a>
            </li>
            <li class="m-menu__item {{ Helper::isActiveRoute(['admin'])  }}" aria-haspopup="true">
                <a href="{{ route('admin.admin.index') }}" class="m-menu__link ">
                    <i class="m-menu__link-icon flaticon-users-1"></i>
                    <span class="m-menu__link-title">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text">{{ trans_choice('admin.admin.title', 2) }}</span>
                        </span>
                    </span>
                </a>
            </li>
            <li class="m-menu__item {{ Helper::isActiveRoute(['user'])  }}" aria-haspopup="true">
                <a href="{{ route('admin.user.index') }}" class="m-menu__link ">
                    <i class="m-menu__link-icon flaticon-users-1"></i>
                    <span class="m-menu__link-title">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text">{{ trans_choice('admin.user.title', 2) }}</span>
                        </span>
                    </span>
                </a>
            </li>
            <li class="m-menu__item {{ Helper::isActiveRoute(['festival'])  }}" aria-haspopup="true">
                <a href="{{ route('admin.festival.index') }}" class="m-menu__link ">
                    <i class="m-menu__link-icon flaticon-map"></i>
                    <span class="m-menu__link-title">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text">{{ trans_choice('models.festival.title', 2) }}</span>
                        </span>
                    </span>
                </a>
            </li>
            <li class="m-menu__item {{ Helper::isActiveRoute(['category'])  }}" aria-haspopup="true">
                <a href="{{ route('admin.category.index') }}" class="m-menu__link ">
                    <i class="m-menu__link-icon flaticon-folder"></i>
                    <span class="m-menu__link-title">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text">{{ trans_choice('models.category.title', 2) }}</span>
                        </span>
                    </span>
                </a>
            </li>
            <li class="m-menu__item {{ Helper::isActiveRoute(['contract'])  }}" aria-haspopup="true">
                <a href="{{ route('admin.contract.index') }}" class="m-menu__link ">
                    <i class="m-menu__link-icon flaticon-interface-3"></i>
                    <span class="m-menu__link-title">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text">{{ trans_choice('admin.contract.title', 2) }}</span>
                        </span>
                    </span>
                </a>
            </li>
            <li class="m-menu__item {{ Helper::isActiveRoute(['draw'])  }}" aria-haspopup="true">
                <a href="{{ route('admin.draw.index') }}" class="m-menu__link ">
                    <i class="m-menu__link-icon flaticon-gift"></i>
                    <span class="m-menu__link-title">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text">{{ trans_choice('admin.draw.title', 2) }}</span>
                        </span>
                    </span>
                </a>
            </li>
            <li class="m-menu__item {{ Helper::isActiveRoute(['drawwinner'])  }}" aria-haspopup="true">
                <a href="{{ route('admin.drawwinner.index') }}" class="m-menu__link ">
                    <i class="m-menu__link-icon flaticon-user-ok"></i>
                    <span class="m-menu__link-title">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text">{{ trans_choice('admin.drawwinner.title', 2) }}</span>
                        </span>
                    </span>
                </a>
            </li>
            <li class="m-menu__item {{ Helper::isActiveRoute(['adminnotification'])  }}" aria-haspopup="true">
                <a href="{{ route('admin.adminnotification.index') }}" class="m-menu__link ">
                    <i class="m-menu__link-icon flaticon-bell"></i>
                    <span class="m-menu__link-title">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text">{{ trans_choice('admin.adminnotification.title', 2) }}</span>
                        </span>
                    </span>
                </a>
            </li>
        </ul>
    </div>
    <!-- END: Aside Menu -->
</div>
