<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Asset extends Model
{
    protected $fillable = [
        'store_id',
        'name',
        'category',
        'quantity',
        'unit_id',
        'image',
        'description',
        'location',
        'status'
    ];

    use HasFactory;

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function getUnitAttribute()
    {
        return AssetUnit::find($this->attributes['unit_id']);
    }
}
