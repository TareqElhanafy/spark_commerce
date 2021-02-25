<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
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
            $table->integer('category_id');
            $table->integer('subcategory_id')->nullable();
            $table->integer('brand_id')->nullable();
            $table->string('name');
            $table->text('description');
            $table->integer('quantity');
            $table->integer('price');
            $table->integer('status');
            $table->string('image_one');
            $table->string('inage_two');
            $table->string('image_three');
            $table->string('color')->nullable();
            $table->string('size')->nullable();
            $table->integer('discount')->nullable();
            $table->string('video_link')->nullable();
            $table->integer('main_slider')->nullable();
            $table->integer('hot_deal')->nullable();
            $table->integer('mid_slider')->nullable();
            $table->integer('best_rated')->nullable();
            $table->integer('trend')->nullable();
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
}
