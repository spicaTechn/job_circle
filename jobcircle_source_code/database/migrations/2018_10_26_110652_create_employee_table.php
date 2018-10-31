<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')
                                      ->on('users')
                                      ->onDelete('cascade');
            $table->string('first_name',50);
            $table->string('sur_name',50)->nullable();
            $table->string('phone',15)->nullable();
            $table->string('nationality',50)->nullable();
            $table->text('language')->nullable();
            $table->text('work_skills')->nullable();
            $table->string('work_experience',10)->nullable();
            $table->string('reference_1',50)->nullable();
            $table->string('reference_2',50)->nullable();
            $table->enum('salary_type',['0', '1', '2', '3'])->default(0);
            $table->string('expected_salary',10)->nullable();
            $table->string('seeking_position',50)->nullable();
            $table->integer('job_type_id')->unsigned();
            $table->foreign('job_type_id')->references('id')->on('jobTypes')->onDelete('cascade');
            $table->date('job_start_date');
            $table->text('health_condition')->nullable();
            $table->string('cv_public_path',150)->nullable();
            $table->string('cv_private_path',150)->nullable();
            $table->string('profile_image_path',150)->nullable();
            $table->integer('profile_setup_step')->default(0);
            $table->char('profile_setup_complete')->default(0);
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
        Schema::dropIfExists('employee');
    }
}
