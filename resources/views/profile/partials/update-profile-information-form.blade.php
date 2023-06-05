<x-profile-layout>
    <div class="content user-profile">
        @include('components.alert')

        <h3 class="mb-5">{{ trans('profile.edit.profile') }}</h3>

        <form id="form-update-profile" method="post" action="{{ route($url) }}" class="list-input" enctype="multipart/form-data">
            @csrf
{{--            @if(request()->routeIs(USER_PROFILE_UPDATE) || request()->routeIs(ADMIN_PROFILE_UPDATE))--}}
{{--                @method('patch')--}}
{{--            @endif--}}

            <div class="input-group align-items-normal mb-4">
                <div class="input-group-prepend">
                    <span class="input-group-text required">{{ trans('profile.edit.name') }}</span>
                </div>
                <div class="form-edit form-control">
                    <div>
                        <span>{{ trans('profile.edit.last_name') }}</span>
                        <input type="text" name="last_name" class="form-control" value="{{ $userInformation->last_name ?? '' }}" placeholder="{{ trans('profile.edit.last_name_example') }}"/>
                    </div>
                    <div>
                        <span>{{ trans('profile.edit.first_name') }}</span>
                        <input type="text" name="first_name" class="form-control" value="{{ $userInformation->first_name ?? '' }}" placeholder="{{ trans('profile.edit.first_name_example') }}"/>
                    </div>
                </div>
            </div>
            <div class="input-group mb-4">
                <div class="input-group-prepend">
                    <span class="input-group-text required">{{ trans('profile.edit.furigana_name') }}</span>
                </div>
                <div class="form-edit form-control">
                    <div>
                        <span>{{ trans('profile.edit.furigana_last_name') }}</span>
                        <input type="text" name="last_name_hiragana" class="form-control" value="{{ $userInformation->last_name_hiragana ?? '' }}" placeholder="{{ trans('profile.edit.furigana_last_name_example') }}"/>
                    </div>
                    <div>
                        <span>{{ trans('profile.edit.furigana_first_name') }}</span>
                        <input type="text" name="first_name_hiragana" class="form-control" value="{{ $userInformation->first_name_hiragana ?? '' }}" placeholder="{{ trans('profile.edit.furigana_first_name_example') }}"/>
                    </div>
                </div>
            </div>
            <div class="input-group mb-4">
                <div class="input-group-prepend">
                    <span class="input-group-text">{{ trans('profile.edit.date_of_birth') }}</span>
                </div>
                <input type="date" name="birth_date" class="form-control px-4" value="{{ $userInformation->birth_date ?? '' }}"/>
            </div>
            <div class="input-group flex-nowrap mb-4">
                <div class="input-group-prepend">
                    <span class="input-group-text">{{ trans('profile.edit.email') }}</span>
                </div>
                <p class="d-flex align-items-center w-100 px-4 form-control border text-inline">{{ $user->email ?? '' }}</p>
            </div>
            <div class="input-group mb-4">
                <div class="input-group-prepend">
                    <span class="input-group-text">{{ trans('profile.edit.phone') }}</span>
                </div>
                <input type="number" name="phone" class="form-control px-4" value="{{ $userInformation->phone ?? '' }}"/>
            </div>
            <div class="h-240 input-group flex-nowrap mb-4">
                <div class="input-group-prepend">
                    <span class="h-240 input-group-text">{{ trans('profile.edit.avatar') }}</span>
                </div>
                <div class="w-100 h-240 px-4 form-control border text-inline">
                    <div class="form-upload-image">
                        <img class="image-preview preview1" src="{{ $user->getImageAttribute($userInformation->profile_picture ?? null) }}" />
                        <div class="btn-control">
                            <span class="btn_upload">
                                <input type="file" id="imag" name="profile_picture"/>
                                {{ trans('profile.edit.upload_image') }}
                            </span>
                            <div class="btn-delete-image">
                                <img id="data-img-profile" src="{{ asset('images/icon_trash.png') }}" data-img-profile="{{ asset('images/user_default.png') }}">
                            </div>
                            <input type="hidden" value="1" name="profile_picture_hidden" id="profile_picture_hidden"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="list-btn">
                @if(request()->routeIs(PROFILE_EDIT))
                    <a class="btn-child" href="{{ route(PROFILE_INDEX) }}">{{ trans('profile.edit.back') }}</a>
                @else
                    <a class="btn-child" href="{{ route(DASHBOARD) }}">{{ trans('profile.edit.back') }}</a>
                @endif
                <button class="btn-child btn-update-profile" type="submit">{{ trans('profile.edit.update') }}</button>
            </div>
        </form>

    </div>
</x-profile-layout>
