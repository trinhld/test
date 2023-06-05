<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminInformationStoreRequest;
use App\Http\Requests\AdminInformationUpdateRequest;
use App\Http\Requests\ProfileUpdateRequest;
use App\Http\Requests\UserInformationStoreRequest;
use App\Http\Requests\UserInformationUpdateRequest;
use App\Services\AdminInformationService;
use App\Services\UserInformationService;
use App\Services\UserService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    protected $userService;

    protected $userInformationService;

    protected $adminInformationService;

    public function __construct(
        UserService $userService,
        UserInformationService $userInformationService,
        AdminInformationService $adminInformationService,
    ) {
        $this->userService = $userService;
        $this->userInformationService = $userInformationService;
        $this->adminInformationService = $adminInformationService;
    }

    /**
     * Display the user's profile.
     */
    public function index(): View
    {
        $user = Auth::user();

        return view('profile.index', [
            'user' => $user,
        ]);
    }

    /**
     * Display the user's profile form.
     */
    public function edit(): View
    {
        $user = Auth::user();

        $userInformation = $user->checkUserInformation()->first();

        $url = $this->userService->getUrl($user);

        return view('profile.partials.update-profile-information-form', [
            'user' => $user,
            'userInformation' => $userInformation,
            'url' => $url,
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function storeUserInformation(UserInformationStoreRequest $request): RedirectResponse
    {
        $result = $this->userInformationService->createUserInformation($request->validated());

        return $result
            ? Redirect::route(PROFILE_INDEX)->with('success', trans('profile.store.success'))
            : Redirect::route(PROFILE_INDEX)->with('error', trans('profile.store.error'));
    }

    /**
     * Handle an incoming authentication request.
     */
    public function storeAdminInformation(AdminInformationStoreRequest $request): RedirectResponse
    {
        $result = $this->adminInformationService->createAdminInformation($request->validated());

        return $result
            ? Redirect::route(PROFILE_INDEX)->with('success', trans('profile.store.success'))
            : Redirect::route(PROFILE_INDEX)->with('error', trans('profile.store.error'));
    }

    /**
     * Update the user information.
     */
    public function updateUserInformation(UserInformationUpdateRequest $request): RedirectResponse
    {
        $result = $this->userInformationService->updateUserInformation($request->validated());

        return $result
            ? Redirect::route(PROFILE_INDEX)->with('success', trans('profile.edit.success'))
            : Redirect::route(PROFILE_INDEX)->with('error', trans('profile.edit.error'));
    }

    /**
     * Update the admin information.
     */
    public function updateAdminInformation(AdminInformationUpdateRequest $request): RedirectResponse
    {
        $result = $this->adminInformationService->updateAdminInformation($request->validated());

        return $result
            ? Redirect::route(PROFILE_INDEX)->with('success', trans('profile.edit.success'))
            : Redirect::route(PROFILE_INDEX)->with('error', trans('profile.edit.error'));
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
