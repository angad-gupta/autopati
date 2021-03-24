<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceManagementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_managements', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('category_id')->nullable();
            $table->text('title')->nullable();
            $table->text('location')->nullable();
          
            $table->integer('status')->nullable();
            $table->text('cover_image')->nullable();
            $table->text('description')->nullable();

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
        Schema::dropIfExists('service_managements');
    }
}
