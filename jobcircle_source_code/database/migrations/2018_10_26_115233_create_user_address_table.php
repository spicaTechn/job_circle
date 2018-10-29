<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userAddress', function (Blueprint $table) {
            $table->increments('id')->unsignedInteger();
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('address',100)->nullable();
            $table->string('street_1',100)->nullable();
            $table->string('street_2',100)->nullable();
            $table->string('city',100)->nullable();
            $table->string('country',50)->nullable();
            $table->string('postal_code',50)->nullable();
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
        Schema::dropIfExists('userAddress');
    }
}
