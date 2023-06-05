<x-profile-layout>
    <div class="content user-profile">
        @include('components.alert')

        <h3>{{ trans('profile.edit.profile') }}</h3>
        <img src="{{ $user->getImageAttribute($user->checkUserInformation->profile_picture ?? null) }}"/>
        <form class="list-input">
            <div class="input-group flex-nowrap mb-4">
                <div class="input-group-prepend">
                    <span class="input-group-text">{{ trans('profile.edit.name') }}</span>
                </div>
                <p class="d-flex align-items-center w-100 px-4 form-control border text-inline">{{ $user->checkUserInformation->last_name ?? '' }} {{ $user->checkUserInformation->first_name ?? '' }}</p>
            </div>
            <div class="input-group flex-nowrap mb-4">
                <div class="input-group-prepend">
                    <span class="input-group-text">{{ trans('profile.edit.furigana_name') }}</span>
                </div>
                <p class="d-flex align-items-center w-100 px-4 form-control border text-inline">{{ $user->checkUserInformation->last_name_hiragana ?? '' }} {{ $user->checkUserInformation->first_name_hiragana ?? '' }}</p>
            </div>
            <div class="input-group flex-nowrap mb-4">
                <div class="input-group-prepend">
                    <span class="input-group-text">{{ trans('profile.edit.date_of_birth') }}</span>
                </div>
                <p class="d-flex align-items-center w-100 px-4 form-control border text-inline">{{ isset($user->checkUserInformation) ? dateTimeFormat($user->checkUserInformation->birth_date) : '' }}</p>
            </div>
            <div class="input-group flex-nowrap mb-4">
                <div class="input-group-prepend">
                    <span class="input-group-text">{{ trans('profile.edit.email') }}</span>
                </div>
                <p class="d-flex align-items-center w-100 px-4 form-control border text-inline">
                    {{ $user->email ?? '' }}
                    <a class="btn-edit-profile" href="{{ route(USER_EDIT_EMAIL) }}">{{ trans('profile.edit.email_change') }}</a>
                </p>
            </div>
            <div class="input-group flex-nowrap mb-4">
                <div class="input-group-prepend">
                    <span class="input-group-text">{{ trans('profile.edit.phone') }}</span>
                </div>
                <p class="d-flex align-items-center w-100 px-4 form-control border text-inline">{{ $user->checkUserInformation->phone ?? '' }}</p>
            </div>
        </form>
        <div class="list-btn">
            <a class="btn-child" href="{{ route(DASHBOARD) }}">{{ trans('profile.edit.back') }}</a>
            <a class="btn-child" href="{{ route(PROFILE_EDIT) }}">{{ trans('profile.edit.edit') }}</a>
        </div>
    </div>
</x-profile-layout>
