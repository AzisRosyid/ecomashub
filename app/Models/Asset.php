<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'category',
        'quantity',
        'unit_id',
        'description',
        'location',
        'status'
    ];

    use HasFactory;
}
