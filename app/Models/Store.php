<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Store extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'location'
    ];

    use HasFactory;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
}
