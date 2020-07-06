<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('customer_name', 100)->index();
            $table->string('customer_code', 50)->index()->unique();
            $table->string('customer_email', 100)->index()->unique();
            $table->string('customer_phone', 20)->index()->unique();
            $table->string('customer_address', 255);
            $table->date('customer_birthday');
            $table->tinyInteger('customer_gender');
            $table->string('user_practise', 50);
            $table->string('customer_note', 255)->nullable();
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
        Schema::dropIfExists('customers');
    }
}
