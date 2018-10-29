<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobAddress', function (Blueprint $table) {
            $table->increments('id')->unsignedInteger();
            $table->integer('job_id')->unsigned();
            $table->foreign('job_id')->references('id')->on('jobs')->onDelete('cascade');
            $table->string('address',100)->nullable();
            $table->string('street_1',100)->nullable();
            $table->string('street_2',100)->nullable();
            $table->string('city',100)->nullable();
            $table->string('country',100)->nullable();
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
        Schema::dropIfExists('jobAddress');
    }
}
