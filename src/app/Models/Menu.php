<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'price',
        'description',
        'image_path',
        'is_active',
    ];

    //このメニューは１つのカテゴリーに属する
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    //このメニューは複数の注文アイテムを持つ
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
