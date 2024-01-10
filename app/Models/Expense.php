<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $fillable = [
        'store_id',
        'name',
        'description',
        'value',
        'type',
        'date'
    ];

    use HasFactory;
}
