<?php

use App\Models\Brand;
use App\Models\Category;
use App\Models\Currency;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('fr_name');
            $table->string('ar_name');
            $table->string('en_name');
            $table->double('price');
            $table->integer('quantity');
            $table->string('condition');
            $table->foreignIdFor(Category::class);
            $table->foreignIdFor(Currency::class);
            $table->foreignIdFor(Brand::class);


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
