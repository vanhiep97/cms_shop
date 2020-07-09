<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('pur_order_code')->index()->unique();
            $table->unsignedBigInteger('supplier_id');
            $table->dateTime('pur_order_date');
            $table->text('notes')->nullable();
            $table->bigInteger('total_price')->default(0);
            $table->bigInteger('total_quantity')->default(0);
            $table->text('pur_order_detail');
            $table->string('user_practise');
            $table->tinyInteger('pur_order_status')->default(0);
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
        Schema::dropIfExists('purchase_orders');
    }
}
