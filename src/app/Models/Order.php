<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_number',
        'total_price',
        'status',
        'payment_status',
    ];

    //この注文は複数の注文アイテムを持つ
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    // pending   → 注文確定
    // cooking   → 調理中
    // ready     → 受け渡し待ち
    // handed    → 受け渡し完了

    //合計金額を計算するアクセサ
    public function getTotalPriceAttribute()
    {
        return $this->items->sum(function ($item) {
            return $item->price * $item->quantity;
        });
    }


    protected static function booted()
    {
        static::creating(function ($order) {
            $order->order_number = self::generateOrderNumber();
        });
    }

    private static function generateOrderNumber()
    {
        return now()->format('Ymd') . '-' . strtoupper(Str::random(6));
    }
}
