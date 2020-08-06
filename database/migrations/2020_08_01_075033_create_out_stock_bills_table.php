<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOutStockBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('out_stock_bills', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('bill_out_stock_code')->index()->unique();
            $table->unsignedBigInteger('supplier_id');
            $table->dateTime('bill_out_stock_date');
            $table->bigInteger('total_price')->default(0);
            $table->bigInteger('total_quantity')->default(0);
            $table->text('bill_out_stock_detail');
            $table->text('bill_out_stock_reason')->nullable();
            $table->string('user_practise');
            $table->tinyInteger('bill_out_stock_status')->default(0);
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
        Schema::dropIfExists('out_stock_bills');
    }
}
