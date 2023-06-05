<!-- Modal Logout -->
<div class="modal fade modal-logout" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-logout-header">{{ trans('profile.edit.logout') }}</div>
            <div class="modal-body">
                <p>{{ trans('profile.edit.confirm') }}</p>
                <div class="list-btn-modal-logut">
                    <div class="btn-back" data-bs-dismiss="modal">{{ trans('profile.edit.back') }}</div>
                    <a href="{{ route(LOGOUT) }}" class="btn-logout" data-bs-dismiss="modal">{{ trans('profile.edit.logout') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
