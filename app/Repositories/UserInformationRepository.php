<?php

namespace App\Repositories;

use App\Models\UserInformation;

class UserInformationRepository extends BaseRepository
{
    public function model()
    {
        return UserInformation::class;
    }
}