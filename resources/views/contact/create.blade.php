<x-profile-layout>
    <div class="content user-profile">
        <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/embed/v2.js"></script>
        <script>
            hbspt.forms.create({
                region: "na1",
                portalId: "39724404",
                formId: "2951d792-bc88-4a45-8e1c-cf9a4af75518"
            });
        </script>
{{--        <h4 class="my-5">{{ trans('attributes.contact.header') }}</h4>--}}
{{--        <form class="list-input" action="{{ route(USER_CONTACT_CONFIRM) }}" method="post">--}}
{{--            @csrf--}}

{{--            <div class="input-group mb-4">--}}
{{--                <div class="input-group-prepend">--}}
{{--                    <span class="input-group-text required">{{ trans('attributes.contact.title') }}</span>--}}
{{--                </div>--}}
{{--                <input type="text" name="title" value="{{ old('title', session('title-contact')) }}" class="form-control px-4"/>--}}
{{--            </div>--}}
{{--            <div class="h-240 input-group mb-4">--}}
{{--                <div class="input-group-prepend">--}}
{{--                    <span class="h-240 input-group-text required">{{ trans('attributes.contact.content') }}</span>--}}
{{--                </div>--}}
{{--                <textarea class="h-240 form-control" name="content" cols="30" rows="10">{{ old('content', session('content-contact')) }}</textarea>--}}
{{--            </div>--}}
{{--            <div class="list-btn">--}}
{{--                <button type="submit" class="bg-rgb-btn btn-child">{{ trans('attributes.contact.confirm') }}</button>--}}
{{--            </div>--}}
{{--        </form>--}}
    </div>


</x-profile-layout>
