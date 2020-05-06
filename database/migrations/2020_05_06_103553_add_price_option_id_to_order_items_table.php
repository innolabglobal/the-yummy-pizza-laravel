<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPriceOptionIdToOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up ()
    {
        Schema::table('order_items', function (Blueprint $table) {
            $table->integer('price_option_id')->index()->unsigned();
            $table->foreign('price_option_id')->references('id')->on('price_options');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down ()
    {
        Schema::table('order_items', function (Blueprint $table) {
            $table->removeColumn('price_option_id');
        });
    }
}
