<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

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

    // 表示・確認用：現在の合計金額（DB保存とは別）
    public function getCalculatedTotalPriceAttribute()
    {
        return $this->items->sum(
            fn($item) => $item->price * $item->quantity
        );
    }

    // 注文作成時に「日付ごとの連番」だけを付与
    protected static function booted()
    {
        static::creating(function ($order) {
            $order->order_number = self::generateDailyOrderNumber();
        });
    }


    // 今日の注文番号を1から振る
    private static function generateDailyOrderNumber()
    {
        $today = Carbon::today();

        $latestNumber = self::whereDate('created_at', $today)
            ->max('order_number');

        return ($latestNumber ?? 0) + 1;
    }




}
