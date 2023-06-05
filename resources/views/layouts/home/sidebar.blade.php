<div class="sidebar">
    <div class="sidebar-header">
        <div class="info-user">
            <p>{{ trans('attributes.sidebar.title') }}</p>
            <span>{{ trans('attributes.sidebar.title1') }}
                <img src="{{ asset('images/icon_level.png') }}" alt="" />
            </span>
        </div>
        <div class="img-user">
            <img src="{{ asset('images/image_user.png') }}" alt="" />
        </div>
    </div>
    <div class="sidebar-body">
        <ul>
            <li>
                <span>{{ trans('profile.edit.home') }}</span>
                <img src="{{ asset('images/icon_home.png') }}" alt="" />
            </li>
            <li>
                <span>{{ trans('profile.edit.function1') }}</span>
                <img src="{{ asset('images/icon_user.png') }}" alt="" />
            </li>
            <li>
                <span>{{ trans('profile.edit.function2') }}</span>
                <img src="{{ asset('images/icon_gmail.png') }}" alt="" />
            </li>
            <li>
                <span>{{ trans('profile.edit.function3') }}</span>
                <img src="{{ asset('images/icon_cart.png') }}" alt="" />
            </li>
            <li>
                <span>{{ trans('profile.edit.function4') }}</span>
                <img src="{{ asset('images/icon_dowload.png') }}" alt="" />
            </li>
            <li>
                <span>{{ trans('profile.edit.function5') }}</span>
                <img src="{{ asset('images/icon_global.png') }}" alt="" />
            </li>
            <li>
                <a href="{{ route(USER_CONTACT_CREATE) }}">{{ trans('profile.edit.function6') }}</a>
                <img src="{{ asset('images/icon_fly.png') }}" alt="" />
            </li>
        </ul>
        <div class="text-cp">{{ trans('profile.edit.title_footer') }}</div>
    </div>
</div>
