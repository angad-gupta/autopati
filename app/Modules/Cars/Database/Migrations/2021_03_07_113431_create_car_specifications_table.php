<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarSpecificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_specifications', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('car_id')->nullable();
            $table->integer('spec_id')->nullable();
            $table->integer('config_id')->nullable();
            $table->integer('config_feature_id')->nullable();

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
        Schema::dropIfExists('car_specifications');
    }
}
