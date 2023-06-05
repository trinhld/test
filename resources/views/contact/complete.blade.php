<x-profile-layout>
    <div class="content user-profile">
        <h4 class="mt-5">{{ trans('attributes.contact.inquiry_completed') }}</h4>
        <p class="my-5">{{ trans('attributes.contact.message_completed') }}</p>
        <div class="list-btn">
            <a href="{{ route(DASHBOARD) }}" class="bg-rgb-btn btn-child">{{ trans('attributes.contact.return_home') }}</a>
        </div>
    </div>
</x-profile-layout>
