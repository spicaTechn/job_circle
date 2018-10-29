<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employer', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')
                                      ->on('users')
                                      ->onDelete('cascade');
            $table->string('first_name',50)->nullable();
            $table->string('last_name',50)->nullable();
            $table->string('phone',15)->unique();
            $table->string('company_name',100)->nullable();
            $table->string('position',50)->nullable();
            $table->binary('profile_image_path',150)->nullable();
            $table->integer('profile_setup_step',5)->default(0)->change();
            $table->char('profile_setup_complete',1)->default(0)->change();
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
        Schema::dropIfExists('employer');
    }
}
