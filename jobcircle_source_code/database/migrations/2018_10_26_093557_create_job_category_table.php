<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobCategories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',100)->unique();
            $table->string('slug',100)->unique();
            $table->text('description')->nullable();
            $table->string('image_path',150)->nullable();
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
        Schema::dropIfExists('jobCategories');
    }
}
