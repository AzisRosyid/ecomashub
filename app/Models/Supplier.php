<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supplier extends Model
{
    protected $fillable = [
        'store_id',
        'name',
        'item',
        'quantity',
        'cost',
        'type',
        'date',
        'interval',
        'description'
    ];

    use HasFactory;

    use SoftDeletes;

    protected $dates = ['deleted_at', 'date'];
}
