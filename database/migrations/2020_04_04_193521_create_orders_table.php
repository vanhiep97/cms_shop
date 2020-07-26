<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('order_code')->index()->unique();
            $table->datetime('sell_date');
            $table->string('user_practise');
            $table->integer('customer_id');
            $table->bigInteger('total_origin_price')->default(0);
            $table->bigInteger('total_price')->default(0);
            $table->string('notes')->nullable();
            $table->tinyInteger('sell_type')->default(0);
            $table->bigInteger('coupon')->default(0);
            $table->bigInteger('total_money')->default(0);
            $table->bigInteger('total_quantity')->default(0);
            $table->bigInteger('customer_pay')->default(0);
            $table->bigInteger('lack')->default(0);
            $table->longText('order_detail');
            $table->tinyInteger('order_status')->default(0);
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
        Schema::dropIfExists('orders');
    }
}
