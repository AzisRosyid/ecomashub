<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Waste extends Model
{
    protected $fillable = [
        'product_id',
        'name',
        'type_id',
        'weight',
        'unit',
        'description'
    ];

    use HasFactory;

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function getProductAttribute()
    {
        return Product::find($this->attributes['product_id']);
    }

    public function getTypeAttribute()
    {
        return WasteType::find($this->attributes['type_id']);
    }
}
