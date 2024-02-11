<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserRole extends Model
{
    protected $fillable = [
        'name',
        'type'
    ];

    use HasFactory;

    protected $dates = ['deleted_at'];
}
