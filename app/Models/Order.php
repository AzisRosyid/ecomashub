<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    protected $fillable = [
        'store_id',
        'name',
        'down_payment',
        'description',
        'date_start',
        'date_end',
        'status',
    ];

    use HasFactory;

    use SoftDeletes;

    protected $dates = ['date_start', 'date_end', 'deleted_at'];

    public function getFormattedDownPaymentAttribute()
    {
        return 'Rp' . number_format($this->attributes['down_payment'], 0, ',', '.') . ',00';
    }

    public function getFormattedDateStartAttribute()
    {
        return Carbon::parse($this->attributes['date_start'])->translatedFormat('H:i | d F Y');
    }

    public function getFormattedDateEndAttribute()
    {
        return Carbon::parse($this->attributes['date_end'])->translatedFormat('H:i | d F Y');
    }

    public function getGrandTotalAttribute()
    {
        return $this->details->sum(function ($detail) {
            return $detail->product->price * $detail->quantity;
        });
    }

    public function getFormattedGrandTotalAttribute()
    {
        return 'Rp' . number_format($this->details->sum(function ($detail) {
            return $detail->product->price * $detail->quantity;
        }), 0, ',', '.') . ',00';
    }

    public function getOldDetailIdAttribute()
    {
        return $this->details->pluck('product.id')->toArray();
    }

    public function getOldDetailQuantityAttribute()
    {
        return $this->details->pluck('quantity')->toArray();
    }

    public function getOldDetailNameAttribute()
    {
        return $this->details->pluck('product.name')->toArray();
    }

    public function details()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function store()
    {
        return $this->belongsTo(Store::class);
    }
}
