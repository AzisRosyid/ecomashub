<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Debt extends Model
{
    protected $fillable = [
        'store_id',
        'name',
        'description',
        'value',
        'date'
    ];

    use HasFactory;
}
