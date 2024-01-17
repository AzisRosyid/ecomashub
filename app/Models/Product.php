<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    protected $fillable = [
        'store_id',
        'name',
        'category_id',
        'stock',
        'price',
        'profit',
        'description',
        'image'
    ];

    use HasFactory;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
}
