<?php

namespace App\Repositories;

use App\Models\AdminInformation;

class AdminInformationRepository extends BaseRepository
{
    public function model()
    {
        return AdminInformation::class;
    }
}