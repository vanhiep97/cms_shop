<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExchangeBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exchange_bills', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('exchange_code');
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('order_id');
            $table->datetime('exchange_date');
            $table->text('exchange_detail');
            $table->bigInteger('exchange_ammount')->default(0);
            $table->bigInteger('exchange_price')->default(0);
            $table->bigInteger('exchange_refund')->default(0);
            $table->text('exchange_reason')->nullable();
            $table->string('user_practise');
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
        Schema::dropIfExists('exchange_bills');
    }
}
