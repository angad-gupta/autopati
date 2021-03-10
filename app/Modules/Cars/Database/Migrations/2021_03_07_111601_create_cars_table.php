<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('brand_id')->nullable();
            $table->integer('model_id')->nullable();
            $table->integer('variant_id')->nullable();
            $table->string('short_quote')->nullable();
            $table->string('short_content')->nullable();
            $table->text('description')->nullable();
            $table->text('car_image')->nullable();
            $table->string('year_of_manufacture')->nullable();
            $table->integer('is_offer_available')->nullable();
            $table->double('starting_price',14,2)->nullable();
            $table->integer('discount_percent')->nullable();
            $table->double('discount_amount',14,2)->nullable();
            $table->double('flat_amount',14,2)->nullable();
            $table->integer('is_luxury')->nullable();
            $table->integer('is_deal_of_the_month')->nullable();
            $table->integer('is_popular')->nullable();
            $table->integer('is_electric')->nullable();
            $table->integer('is_launch')->nullable();
            $table->integer('currently_launch')->nullable();
            $table->date('expected_launch_date')->nullable();
            $table->integer('is_top_car')->nullable();

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
        Schema::dropIfExists('cars');
    }
}