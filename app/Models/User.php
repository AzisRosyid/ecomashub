<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
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
        'first_name',
        'last_name',
        'username',
        'email',
        'password',
        'role_id',
        'source_type',
        'gender',
        'date_of_birth',
        'phone_number',
        'address',
        'image',
        'status'
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
        'password' => 'hashed',
    ];

    public function getRouteKeyName()
    {
        return 'id';
    }

    use HasFactory;

    use SoftDeletes;

    protected $dates = ['deleted_at', 'date_of_birth'];

    public function getRoleAttribute()
    {
        return UserRole::find($this->attributes['role_id']);
    }

    public function getFormattedDateOfBirthAttribute()
    {
        return Carbon::parse($this->attributes['date_of_birth'])->translatedFormat('d F Y');
    }

    public function userRole()
    {
        return $this->belongsTo(UserRole::class, 'role_id', 'id');
    }
}
