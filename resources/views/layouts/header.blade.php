<header class="header-dashboard">
    <div class="container">
        <div class="header-button-show-menu-sp">
            <img src="{{ asset("images/icon_hamberger.png") }}" alt="icon_hamberger" />
        </div>
        <a href="{{ route(DASHBOARD) }}" class="header-logo">
            <img src="{{ asset("images/logo.png") }}" alt="logo" />
        </a>
        <div class="header-text-gradient">{{ trans('attributes.header.title') }}</div>
        <div class="user-notify">
            <img src="{{ asset("images/icon_bell.png") }}" alt="icon-bell" />
            <span>1</span>
        </div>
        <div class="header-user">
            <div class="wrap-user">
                <div class="user-avatar">
                    <img src="{{ asset("images/image_user.png") }}" alt="icon_user" />
                </div>
                <div class="user-show">
                    <img src="{{ asset("images/icon_show_user.png") }}" alt="icon_show_user" />
                </div>
            </div>
            <div class="user-list-option">
                <ul>
                    <li><a href="{{ route(PROFILE_INDEX) }}">{{ trans('attributes.header.profile_edit') }}</a></li>
                    <li><a href="#">{{ trans('attributes.header.booking_information') }}</a></li>
                    <li><a href="#">{{ trans('attributes.header.plan_confirmation') }}</a></li>
                    <li><a href="#">{{ trans('attributes.header.change_password') }}</a></li>
                    <li><a href="#">{{ trans('attributes.header.change_email') }}</a></li>
                    <li><a href="#">{{ trans('attributes.header.faq') }}</a></li>
                    <li><a href="#">{{ trans('attributes.header.terms_of_service') }}</a></li>
                    <li>
                        <a class="btn-show-logout" data-bs-toggle="modal" href="#exampleModalToggle">{{ trans('attributes.header.logout') }}</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>