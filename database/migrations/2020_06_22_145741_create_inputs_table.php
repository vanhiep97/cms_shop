<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInputsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inputs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('input_code')->index()->unique();
            $table->unsignedBigInteger('supplier_id');
            $table->dateTime('input_date');
            $table->text('notes')->nullable();
            $table->bigInteger('total_price')->default(0);
            $table->bigInteger('total_quantity')->default(0);
            $table->bigInteger('discount')->default(0);
            $table->bigInteger('total_money')->default(0);
            $table->bigInteger('lack')->default(0);
            $table->string('user_practise');
            $table->tinyInteger('input_status')->default(0);
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
        Schema::dropIfExists('inputs');
    }
}
