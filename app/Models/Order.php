<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    protected $fillable = [
        'store_id',
        'name',
        'down_payment',
        'description',
        'date_start',
        'date_end',
        'status',
    ];

    use HasFactory;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
}
