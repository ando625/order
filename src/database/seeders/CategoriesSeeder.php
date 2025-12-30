<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'メインディッシュ'],
            ['name' => 'サイドメニュー＆スナック'],
            ['name' => 'ドリンク＆デザート'],

        ];
        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
