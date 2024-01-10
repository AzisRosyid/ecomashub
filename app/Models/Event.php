<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'organizer',
        'description',
        'fund',
        'image',
        'link',
        'location',
        'type',
        'theme',
        'start_date',
        'end_date',
    ];

    use HasFactory;
}
