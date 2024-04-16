<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    protected $fillable = [
        'store_id',
        'name',
        'category_id',
        'weight',
        'unit',
        'stock',
        'price',
        'description',
        'image'
    ];

    use HasFactory;

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function getCategoryAttribute()
    {
        return ProductCategory::find($this->attributes['category_id']);
    }

    public function getFormattedPriceAttribute()
    {
        return 'Rp' . number_format($this->attributes['price'], 0, ',', '.') . ',00';
    }

    public function media()
    {
        return $this->belongsTo(Media::class, 'image', 'id');
    }
}
