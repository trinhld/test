<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VerifyUpdate extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'otp_code',
        'otp_expires_at'
    ];

}
