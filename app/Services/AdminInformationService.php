<?php

namespace App\Services;

use App\Repositories\AdminInformationRepository;
use App\Traits\HandleUploadImage;
use Illuminate\Support\Facades\Auth;

class AdminInformationService
{
    use HandleUploadImage;

    protected AdminInformationRepository $adminInformationRepository;

    public function __construct(AdminInformationRepository $adminInformationRepository)
    {
        $this->adminInformationRepository = $adminInformationRepository;
    }

    /**
     * Create new admin information
     *
     * @param array $data
     * @return bool
     */
    public function createAdminInformation(array $data): bool
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
                'class' => $data['class'] ?? 1,
                'cancel_at' => $data['cancel_at'] ?? null,
                'created_user' => $user->id,
                'updated_user' => $user->id
            ];

            if ($user->isAdmin()) {

                // check image from request data
                if (isset($data['profile_picture'])) {
                    $attributes['profile_picture'] = $this->saveImage($data['profile_picture']);
                }
                return $this->adminInformationRepository->create($attributes);
            }
            return false;
        } catch (\Exception $e) {
            logger($e->getMessage());
        }
    }


    /**
     * Update data in admin_information table
     *
     * @param array $data
     * @return bool
     */
    public function updateAdminInformation(array $data): bool
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
                'class' => $data['class'] ?? 1,
                'cancel_at' => $data['cancel_at'] ?? null,
                'created_user' => $user->id,
                'updated_user' => $user->id
            ];

            if ($user->isAdmin()) {
                $adminInformation = $user->adminInformation()->first();
                $attributes['profile_picture'] = null;

                // get image of admin information
                $urlImage = $adminInformation->profile_picture;

                // check image from request data
                if (isset($data['profile_picture'])) {
                    $attributes['profile_picture'] = $this->saveImage($data['profile_picture']);
                }

                // update admin information
                if ($data['profile_picture_hidden'] == 0) {
                    $adminInformation->profile_picture = null;
                }else {
                    $adminInformation->profile_picture = $attributes['profile_picture'] == null ? $adminInformation->profile_picture : $attributes['profile_picture'];
                }

                // check image
                if ($urlImage !== $adminInformation->profile_picture) {
                    $this->deleteUploadImage($urlImage);
                }

                return $adminInformation->update($data);
            }

            return false;
        } catch (\Exception $e) {
            logger($e->getMessage());
        }
    }

    /**
     * Delete record in admin_information table
     *
     * @param $id
     *
     * @return bool
     */
    public function deleteAdminInformation($id): bool
    {
        return $this->adminInformationRepository->delete($id);
    }
}