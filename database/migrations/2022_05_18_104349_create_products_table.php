<?php

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
            $table->integer('user_id');
            $table->integer('color_id');
            $table->integer('size_id');
            $table->integer('gender_id')->nullable();
            $table->string('product_name');
            $table->string('slug');
            $table->string('sku');
            $table->integer('qty');
            $table->decimal('price');
            $table->decimal('sale_price')->nullable();
            $table->string('short_description');
            $table->text('description')->nullable();
            $table->text('other_info')->nullable();
            $table->string('product_img');
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
