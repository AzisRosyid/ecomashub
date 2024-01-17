<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StoreUser extends Model
{
    protected $fillable = [
        'store_id',
        'user_id',
    ];

    use HasFactory;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
}
