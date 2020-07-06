<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('supplier_code')->index();
            $table->string('supplier_name')->index()->unique();
            $table->string('supplier_phone')->nullable();
            $table->string('supplier_email')->nullable();
            $table->string('address')->nullable();
            $table->string('ATM')->nullable();
            $table->dateTime('last_input')->nullable();
            $table->bigInteger('total_money_input')->default(0);
            $table->bigInteger('lack_input')->default(0);
            $table->string('supplier_note')->nullable();
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
        Schema::dropIfExists('suppliers');
    }
}
