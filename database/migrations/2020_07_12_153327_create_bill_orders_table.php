<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bill_orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('bill_code')->index()->unique();
            $table->unsignedBigInteger('input_id');
            $table->unsignedBigInteger('supplier_id');
            $table->dateTime('bill_date');
            $table->string('notes')->nullable();
            $table->tinyInteger('sell_type')->default(0);
            $table->bigInteger('total_price')->default(0);
            $table->integer('coupon')->default(0);
            $table->bigInteger('total_money')->default(0);
            $table->bigInteger('total_quantity')->default(0);
            $table->bigInteger('pair_pay')->default(0);
            $table->bigInteger('lack')->default(0);
            $table->text('bill_detail');
            $table->string('user_practise');
            $table->tinyInteger('bill_status')->default(0);
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
        Schema::dropIfExists('bill_orders');
    }
}
