<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubFarmDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_farm_details', function (Blueprint $table) {
            $table->id();
            $table->integer('qty')->default(0);
            $table->integer('died_qty')->default(0);
            $table->integer('remaining_qty')->default(0);
            $table->integer('product_qty')->default(0);
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->string('release')->nullable();
            $table->unsignedBigInteger('sub_farm_id');
            $table->timestamps();

            $table->foreign('sub_farm_id')->references('id')->on('sub_farms')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_farm_details');
    }
}
