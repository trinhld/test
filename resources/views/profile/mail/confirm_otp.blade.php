<x-profile-layout>
    <div class="form-login">
        @include('components.alert')

        <div class="form-login-block">
            <div class="form-login-block-header">{{ trans('profile.update.email.title') }}</div>
            <div class="form-login-block-content">
                <form action="{{ route(USER_UPDATE_EMAIL) }}" method="post">
                    @csrf
                    @method('PATCH')

                    <div class="mb-3">
                        <label class="form-label">{{ trans('profile.update.email.input') }}</label>
                        <p>{{ trans('profile.update.email.text_input') }}</p>
                        <input type="email" name="email" readonly class="form-control" value="{{ $email }}"/>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">コードオプト</label>
                        <input type="number" name="otp_code" class="form-control"/>
                    </div>
                    <button type="submit" class="btn bg-button">{{ trans('profile.update.email.button') }}</button>
                </form>
                <div class="list-button-social">
                    <p>{{ trans('profile.update.email.text_footer_confirm') }}
                        <a class="mt-4" href="{{ route(USER_EDIT_EMAIL) }}">{{ trans('profile.update.email.text_footer_confirm_a') }}</a>
                        {{ trans('profile.update.email.text_footer_confirm_end') }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-profile-layout>
