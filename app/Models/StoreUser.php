<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreUser extends Model
{
    protected $fillable = [
        'store_id',
        'user_id',
    ];

    use HasFactory;
}
