<?php

namespace App\Models;

use Carbon\Carbon;
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

    protected $dates = ['date_start', 'date_end', 'deleted_at'];

    public function getFormattedFundAttribute()
    {
        return 'Rp' . number_format($this->attributes['fund'], 0, ',', '.') . ',00';
    }

    public function getFormattedDateStartAttribute()
    {
        return Carbon::parse($this->attributes['date_start'])->translatedFormat('h:i | d F Y');
    }

    public function getFormattedDateEndAttribute()
    {
        return Carbon::parse($this->attributes['date_end'])->translatedFormat('h:i | d F Y');
    }
}
