<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WasteType extends Model
{
    protected $fillable = [
        'name',
        'category'
    ];

    use HasFactory;

    protected $dates = ['deleted_at'];
}
