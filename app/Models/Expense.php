<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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

    use SoftDeletes;

    protected $dates = ['deleted_at', 'date'];

    public function getFormattedValueAttribute()
    {
        return 'Rp' . number_format($this->attributes['value'], 0, ',', '.') . ',00';
    }

    public function getFormattedDateAttribute()
    {
        return Carbon::parse($this->attributes['date'])->translatedFormat('d F Y');
    }
}
