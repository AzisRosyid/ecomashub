<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Debt extends Model
{
    protected $fillable = [
        'store_id',
        'name',
        'description',
        'value',
        'date_start',
        'date_end',
        'interest',
        'is_updated',
    ];

    use HasFactory;

    use SoftDeletes;

    protected $dates = ['date_start', 'date_end', 'deleted_at'];

    public function getFormattedValueAttribute()
    {
        return 'Rp' . number_format($this->attributes['value'], 0, ',', '.') . ',00';
    }

    public function getFormattedDateStartAttribute()
    {
        return Carbon::parse($this->attributes['date_start'])->translatedFormat('d F Y');
    }

    public function getFormattedDateEndAttribute()
    {
        return Carbon::parse($this->attributes['date_end'])->translatedFormat('d F Y');
    }
}
