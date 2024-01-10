<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
