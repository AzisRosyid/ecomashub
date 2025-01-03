<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AssetUnit extends Model
{
    protected $fillable = [
        'name'
    ];

    use HasFactory;

    protected $dates = ['deleted_at'];
}
