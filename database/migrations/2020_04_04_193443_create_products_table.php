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
            $table->bigIncrements('id');
            $table->string('product_code')->index()->unique();
            $table->string('product_name')->index()->unique();
            $table->integer('product_amount')->index();
            $table->integer('product_origin_price')->index();
            $table->integer('product_sell_price')->index();
            $table->unsignedBigInteger('product_manufacture_id');
            $table->foreign('product_manufacture_id')->references('id')->on('manufactures')->onDelete('CASCADE');
            $table->unsignedBigInteger('product_group_id');
            $table->foreign('product_group_id')->references('id')->on('product_groups')->onDelete('CASCADE');
            $table->text('product_image_url');
            $table->text('product_description')->nullable();
            $table->tinyInteger('product_status');
            $table->string('user_practise');
            $table->timestamps();
            $table->softDeletes();
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
