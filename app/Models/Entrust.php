<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Entrust extends Model
{
    protected $fillable = [
        'product_id',
        'user_id',
        'admin_id',
        'quantity',
        'price',
        'description',
        'date'
    ];

    use HasFactory;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
}
