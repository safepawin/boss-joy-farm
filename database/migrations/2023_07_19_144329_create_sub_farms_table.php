<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubFarmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_farms', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('qty')->default(0);
            $table->integer('died_qty')->default(0);
            $table->integer('remaining_qty')->default(0);
            $table->integer('product_qty')->default(0);
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->string('release')->nullable();
            $table->unsignedBigInteger('farm_id');
            $table->timestamps();
        });

        Schema::table('sub_farms', function ($table) {
            $table->foreign('farm_id')->references('id')->on('farms')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_farms');
    }
}
