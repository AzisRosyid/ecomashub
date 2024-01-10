<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
