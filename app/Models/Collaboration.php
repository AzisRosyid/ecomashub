<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Collaboration extends Model
{
    protected $fillable = [
        'name',
        'type',
        'email',
        'phone_number',
        'address',
        'image',
        'description',
        'status',
    ];

    use HasFactory;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
}
