<?php

namespace Database\Factories;

use App\Models\Stock;
use Illuminate\Database\Eloquent\Factories\Factory;

class StockFactory extends Factory
{
    protected $model = Stock::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,  // 商品名（ランダムな単語）
            'category' => $this->faker->randomElement(['回復', '弾', '調合素材', 'その他']), // 種別（ランダム選択）
            'quantity' => $this->faker->numberBetween(1, 100),  // 個数（1〜100のランダムな数）
            'memo' => $this->faker->sentence,  // メモ（ランダムな文章）
        ];
    }
}
