<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablleAdress extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adress', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('country_id')->unsigned();
            $table->integer('city_id')->unsigned();
            $table->integer('street_id')->unsigned();

            $table->foreign('country_id')
                ->references('id')->on('country')
                ->onDelete('cascade');

            $table->foreign('city_id')
                ->references('id')->on('city')
                ->onDelete('cascade');


            $table->foreign('street_id')
                ->references('id')->on('street')
                ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('adress');
    }
}
