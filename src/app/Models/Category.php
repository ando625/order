<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'sort_order',
        'is_active',
    ];

    //このカテゴリーは複数のメニューを持つ
    public function menus()
    {
        return $this->hasMany(Menu::class);
    }
}
