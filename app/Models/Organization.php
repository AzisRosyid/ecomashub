<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Organization extends Model
{
    protected $fillable = [
        'name',
        'is_master',
        'status',
    ];

    use HasFactory;

    use SoftDeletes;
}
