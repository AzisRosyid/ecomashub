<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cash extends Model
{
    protected $fillable = [
        'store_id',
        'name',
        'collaboration_id',
        'description',
        'value',
        'interval',
        'type',
        'date_start',
        'date_end',
        'is_updated',
    ];

    use HasFactory;

    use SoftDeletes;

    protected $dates = ['deleted_at', 'date_start', 'date_end'];

    public function getSupplierAttribute()
    {
        return Collaboration::find($this->attributes['collaboration_id']);
    }

    public function getFormattedValueAttribute()
    {
        return 'Rp' . number_format($this->attributes['value'], 0, ',', '.') . ',00';
    }

    public function getFormattedDateStartAttribute()
    {
        return Carbon::parse($this->attributes['date_start'])->translatedFormat('H:i | d F Y');
    }

    public function getFormattedDateEndAttribute()
    {
        return Carbon::parse($this->attributes['date_end'])->translatedFormat('H:i | d F Y');
    }
}
