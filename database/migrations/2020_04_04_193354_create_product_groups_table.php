<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_groups', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('pro_group_name')->unique()->index();
            $table->string('pro_group_slug')->unique()->index();
            $table->text('pro_group_description')->nullable();
            $table->tinyInteger('pro_group_parent_id')->default(0);
            $table->string('user_practise');
            $table->tinyInteger('pro_group_status')->default(0);
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
        Schema::dropIfExists('product_groups');
    }
}
