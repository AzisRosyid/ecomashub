<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Waste extends Model
{
    protected $fillable = [
        'product_id',
        'type_id',
        'value',
        'unit',
        'description'
    ];

    use HasFactory;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
}
