<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'password',
        'category',
        'deleted_at',
        'deleted_user',
        'created_user',
        'updated_user',
        'last_login',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function userInformation()
    {
        return $this->hasOne(UserInformation::class, 'user_id', 'id');
    }

    public function adminInformation()
    {
        return $this->hasOne(AdminInformation::class, 'user_id', 'id');
    }

    public function contact()
    {
        return $this->hasMany(Contact::class, 'user_id', 'id');
    }

    public function checkUserInformation()
    {
        return $this->isUser() ? $this->userInformation() : $this->adminInformation();
    }

    public function userHistories()
    {
        return $this->hasMany(LoginHistory::class);
    }
    
    public function isUser(): bool
    {
        return $this->getAttribute('category') == USER;
    }
    
    public function isAdmin(): bool
    {
        return $this->getAttribute('category') == ADMIN;
    }

    public function getImageAttribute($path)
    {
        $pathImage = parse_url($path, PHP_URL_PATH);
        return $path && Storage::disk('s3')->exists($pathImage) ? Storage::disk('s3')->url($pathImage) : asset('images/user_default.png');
    }

}
