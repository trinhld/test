<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreatOtpRequest;
use App\Http\Requests\UpdateEmailRequest;
use App\Services\UserService;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function editEmail()
    {
        return view('profile.mail.edit');
    }

//    public function storeOtp(CreatOtpRequest $request)
//    {
//        $result = $this->userService->storeOtp($request->validated());
//
//        return $result
//            ? redirect()->route(USER_CONFIRM_OTP, $result)
//            : back()->with('error', 'エラーが発生しました。もう一度やり直してください。');
//    }

    public function confirmOtp($email)
    {
        return view('profile.mail.confirm_otp', [
            'email' => $email
        ]);
    }

    public function updateEmail(UpdateEmailRequest $request)
    {
        $result = $this->userService->updateEmail($request->validated());
        return $result
            ? redirect()->route(PROFILE_INDEX)->with('success', 'メールアドレスの変更が成功しました。')
            : back()->with('error', trans('validation.profile.email.otp_errors'));
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function storeOtp(CreatOtpRequest $request)
    {
        $result = $this->userService->storeOtp($request->validated());
        dd($result);
        return $result
            ? redirect()->route(USER_CONFIRM_OTP, $result)->with('success', 'OKe nhé!')
            : back()->with('error', 'エラーが発生しました。もう一度やり直してください。');
    }
}
