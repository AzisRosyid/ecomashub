<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'store_id',
        'name',
        'down_payment',
        'description',
        'date_entry',
        'date_start',
        'date_end',
        'status',
    ];

    use HasFactory;
}
