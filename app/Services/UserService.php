<?php


namespace App\Services;


use App\Mail\SendMailUpdateUser;
use App\Models\VerifyUpdate;
use App\Repositories\UserRepository;
use GuzzleHttp\Client;
use HubSpot\Client\Marketing\Transactional\ApiException;
use HubSpot\Client\Marketing\Transactional\Model\PublicSingleSendRequestEgg;
use HubSpot\Factory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Http;

class UserService
{
    protected $userRepository;
    protected $hubspot;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;

//        $config = [
//            'key' => config('hubspot.access_token'),
//            'oauth' => false,
//            'base_url' => 'https://api.hubapi.com',
//        ];
//
//        $this->hubspot = Factory::create($config);
    }

    /**
     * get url by user
     *
     * @param $user
     * @return string
     */
    public function getUrl($user): string
    {
        if ($user->isUser()) {
            return $user->userInformation()->first() == null ? USER_PROFILE_STORE : USER_PROFILE_UPDATE;
        }
        return $user->adminInformation()->first() == null ? ADMIN_PROFILE_STORE : ADMIN_PROFILE_UPDATE;
    }

    /**
     *
     * @param $request
     * @return string
     */
    public function storeOtp($request) {
        try {
            $client = new Client();
            $url = config('hubspot.url');
            $otp = rand(112345, 999999);
            $apiKey = config('hubspot.access_token');
            $email = $request['email'];
            $subject = 'OTP';


            $emailPayload = [
                'name' => 'New Email' . ' ' . Date::now()->minute . Date::now()->second,
                'subject' => 'Subject of the Email',
                'html' => '<p>Content of the Email</p>',
            ];

            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $apiKey,
                'Content-Type' => 'application/json',
            ])->post('https://api.hubapi.com/marketing-emails/v1/emails', $emailPayload);
            return  $response;
            if ($response->successful()) {
                // Lấy ID của email
                $emailId = $response->json()['id'];
                logger($emailId);

                // Chuẩn bị thông tin gửi email
                $recipientEmail = $request;
                $emailSubject = 'Subject of the Email';
                $emailContent = '<p>Content of the Email</p>';

                // Gửi email
                $sendPayload = [
//                    'message' => [
                        'to' => $recipientEmail,
                        'subject' => $emailSubject,
                        'html' => $emailContent
//                    ],
//                    'templateId' => $emailId,
                ];
                $response = Http::post('https://api.hubapi.com/email/public/v1/singleEmail/send', $sendPayload);

//                $sendResponse = Http::withHeaders([
//                    'Authorization' => 'Bearer ' . $apiKey,
//                    'Content-Type' => 'application/json',
//                ])->post('https://api.hubapi.com/marketing-emails/v1/emails/' . $emailId . '/send', $sendPayload);


                return $response;


                if ($sendResponse->successful()) {
                    // Email đã được gửi thành công
                    echo "Email sent successfully.";
                } else {
                    // Lỗi khi gửi email
                    echo "Failed to send email.";
                }
            } else {
                // Lỗi khi tạo email
                echo "Failed to create email.";
            }


            if ($response->getStatusCode() === 200) {
                return "aaa";

                $user = Auth::user();

                $userInformation = $user->checkUserInformation()->first();

                if ($userInformation !== null) {
                    $userName = $userInformation->last_name . ' ' . $userInformation->first_name;

                    $verifyUpdates = VerifyUpdate::where('email', $request['email'])->first();
                    if ($verifyUpdates !== null) {
                        $verifyUpdates->delete();
                    }

                    $verifyUpdates = new VerifyUpdate();
                    $verifyUpdates->email = $request['email'];
                    $verifyUpdates->otp_code = $otp;
                    $verifyUpdates->otp_expires_at = now()->addMinutes(config('auth.otp_timeout'));

                    $verifyUpdates->save();

//                    dispatch(new SendMailUpdateUser($userName, $otp, $request['email']));
                    return $verifyUpdates->email;
                }
            } else {
                return "abc";
            }
        } catch (\Exception $exception){
            logger($exception->getMessage());
        }
    }

    /**
     *
     * @param $request
     * @return string
     */
    public function updateEmail($request) {
        try {
            $user = Auth::user();

            $verifyUpdate = VerifyUpdate::where('email', $request['email'])->first();

            if ($verifyUpdate->otp_code === $request['otp_code']) {
                $user->email = $request['email'];
                $user->save();
                return true;
            }
            return false;
        } catch (\Exception $exception){
            logger($exception->getMessage());
        }
    }
}
