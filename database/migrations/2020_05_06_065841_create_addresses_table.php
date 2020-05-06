<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up ()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();

            $table->string('first_name');
            $table->string('last_name');
            $table->string('address');
            $table->string('city');
            $table->string('post_code');
            $table->string('country');
            $table->string('phone_number');
            $table->string('name');

            $table->bigInteger('user_id')->index()->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down ()
    {
        Schema::dropIfExists('addresses');
    }
}
