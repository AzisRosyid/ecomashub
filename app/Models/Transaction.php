<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    protected $fillable = [
        'user_id',
        'category_id',
        'category',
        'value',
        'value_type',
        'date'
    ];

    use HasFactory;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
}
