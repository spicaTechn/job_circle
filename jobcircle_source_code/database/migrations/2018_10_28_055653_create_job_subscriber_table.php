<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobSubscriberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobSubscriber', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email',150)->unique();
            $table->integer('job_category_id')->unsigned();
            $table->foreign('job_category_id')->references('id')->on('jobCategories')->onDelete('cascade');
            $table->enum('status',['0', '1'])->default(1);
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
        Schema::dropIfExists('jobSubscriber');
    }
}
