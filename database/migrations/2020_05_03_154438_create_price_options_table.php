<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePriceOptionsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('price_options', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->double('value');
            $table->integer('menu_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('menu_id')->references('id')->on('menus');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('price_options');
    }
}
