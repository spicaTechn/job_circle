<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobTypes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',50)->unique();
            $table->string('slug',50)->unique();
            $table->text('description')->nullable();
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
        Schema::dropIfExists('jobTypes');
    }
}
