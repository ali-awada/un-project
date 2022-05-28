<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Currency::factory(10)->create();
        \App\Models\Category::factory(10)->create();
        \App\Models\Brand::factory(10)->create();
//        \App\Models\Product::factory(40)->create()->each(function ($product) {
//            $product->images()->saveMany(\App\Models\ProductImage::factory(4)->make());
//        });

//
//        \App\Models\User::factory()->create([
//            'name' => 'derar',
//            'email' => 'derar.derar@derar',
//        ]);
    }
}
