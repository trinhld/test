<x-profile-layout>
    <div class="form-login">
{{--        @include('components.alert')--}}

{{--        <div class="form-login-block">--}}
{{--            <div class="form-login-block-header">{{ trans('profile.update.email.title') }}</div>--}}
{{--            <div class="form-login-block-content">--}}
{{--                <form action="{{ route(USER_STORE_OTP) }}" method="post">--}}
{{--                    @csrf--}}
{{--                    <div class="mb-3">--}}
{{--                        <label for="exampleInputEmail1" class="form-label">{{ trans('profile.update.email.input') }}</label>--}}
{{--                        <input type="email" name="email" class="form-control" placeholder="メールアドレスを入力"/>--}}
{{--                    </div>--}}
{{--                    <button type="submit" class="btn bg-button">{{ trans('profile.update.email.button') }}</button>--}}
{{--                </form>--}}
{{--                <div class="list-button-social">--}}
{{--                    <span>{{ trans('profile.update.email.text_footer') }}</span>--}}
{{--                    <a class="register" href="{{ route(DASHBOARD) }}">{{ trans('profile.update.email.text_footer_a') }}</a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

        <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/embed/v2.js"></script>
        <script>
            hbspt.forms.create({
                region: "na1",
                portalId: "39724404",
                formId: "2c9431c1-7db8-49c6-9d0d-f677425c2eac"
            });
        </script>
    </div>
</x-profile-layout>
