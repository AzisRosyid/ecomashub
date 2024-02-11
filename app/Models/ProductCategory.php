<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductCategory extends Model
{
    protected $fillable = [
        'name'
    ];

    use HasFactory;

    protected $dates = ['deleted_at'];

    public function getTotalReferenceAttribute()
    {
        return Product::where('category_id', $this->attributes['id'])->count();
    }
}
