<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'en_name' => $this->faker->name,
            'ar_name' => $this->faker->name,
            'fr_name' => $this->faker->name,
            'image' => $this->faker->imageUrl(),
            'parent_id' =>null,
        ];
    }
}
