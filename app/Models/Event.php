<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    protected $fillable = [
        'store_id',
        'title',
        'organizer',
        'description',
        'fund',
        'image',
        'file',
        'location',
        'type',
        'theme',
        'date_start',
        'date_end',
    ];

    use HasFactory;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
}
