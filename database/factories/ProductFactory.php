<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Currency;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        $arr = ['new', 'old'];
        return [
            'en_name' => $this->faker->name,
            'ar_name' => $this->faker->name,
            'fr_name' => $this->faker->name,
            'price' => $this->faker->randomFloat(),
            'quantity' => $this->faker->numberBetween(2, 1000),
            'condition' => Arr::random($arr),
            'brand_id' => Brand::all()->random()->id,
            'category_id' => Category::all()->random()->id,
            'user_id' => User::all()->random()->id,
            'currency_id' => Currency::all()->random()->id,
        ];
    }
}
