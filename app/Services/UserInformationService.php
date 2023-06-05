<?php

namespace App\Services;

use App\Repositories\UserInformationRepository;
use App\Traits\HandleUploadImage;
use Dflydev\DotAccessData\Data;
use Illuminate\Support\Facades\Auth;

class UserInformationService
{
    use HandleUploadImage;

    protected UserInformationRepository $userInformationRepository;

    public function __construct(UserInformationRepository $userInformationRepository)
    {
        $this->userInformationRepository = $userInformationRepository;
    }

    /**
     * Create new user information
     *
     * @param array $data
     * @return bool
     */
    public function createUserInformation(array $data)
    {
        try {
            $user = Auth::user();

            $attributes = [
                'user_id' => $user->id,
                'last_name' => $data['last_name'],
                'first_name' => $data['first_name'],
                'first_name_hiragana' => $data['first_name_hiragana'],
                'last_name_hiragana' => $data['last_name_hiragana'],
                'birth_date' => $data['birth_date'],
                'phone' => $data['phone'] ?? null,
                'sales_in_charge' => $data['sales_in_charge'] ?? null,
                'cancel_at' => $data['cancel_at'] ?? null,
                'created_user' => $user->id,
                'updated_user' => $user->id,
            ];

            if ($user->isUser()) {

                // check image from request data
                if (isset($data['profile_picture'])) {
                    $attributes['profile_picture'] = $this->saveImage($data['profile_picture']);
                }

                return $this->userInformationRepository->create($attributes);
            }
            return false;
        } catch (\Exception $e) {
            logger($e->getMessage());
        }
    }

    /**
     * Update data in user_information table
     *
     * @param array $data
     * @return bool
     */
    public function updateUserInformation(array $data)
    {
        try {
            $user = Auth::user();

            $attributes = [
                'user_id' => $user->id,
                'last_name' => $data['last_name'],
                'first_name' => $data['first_name'],
                'first_name_hiragana' => $data['first_name_hiragana'],
                'last_name_hiragana' => $data['last_name_hiragana'],
                'birth_date' => $data['birth_date'],
                'phone' => $data['phone'] ?? null,
                'sales_in_charge' => $data['sales_in_charge'] ?? null,
                'cancel_at' => $data['cancel_at'] ?? null,
                'created_user' => $user->id,
                'updated_user' => $user->id,
            ];

            if ($user->isUser()) {
                $userInformation = $user->userInformation()->first();
                $attributes['profile_picture'] = null;

                // get image of user information
                $urlImage = $userInformation->profile_picture;

                // check image from request data
                if (isset($data['profile_picture'])) {
                    $attributes['profile_picture'] = $this->saveImage($data['profile_picture']);
                }

                // update user information
                if ($data['profile_picture_hidden'] == 0) {
                    $userInformation->profile_picture = null;
                }else {
                    $userInformation->profile_picture = $attributes['profile_picture'] == null ? $userInformation->profile_picture : $attributes['profile_picture'];
                }

                // check image
                if ($urlImage !== $userInformation->profile_picture) {
                    $this->deleteUploadImage($urlImage);
                }

                return $userInformation->update($attributes);
            }
            return false;
        } catch (\Exception $e) {
            logger($e->getMessage());
        }
    }

    /**
     * Delete record in user_information table
     *
     * @param $id
     *
     * @return bool
     */
    public function deleteUserInformation($id): bool
    {
        return $this->userInformationRepository->delete($id);
    }
}