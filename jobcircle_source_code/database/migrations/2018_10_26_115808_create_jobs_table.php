<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->text('title');
            $table->text('description');
            $table->text('excerpt');
            $table->integer('job_type_id')->unsigned();
            $table->foreign('job_type_id')->references('id')->on('jobTypes')->onDelete('cascade');
            $table->integer('job_category_id')->unsigned();
            $table->foreign('job_category_id')->references('id')->on('jobCategories')->onDelete('cascade');
            $table->enum('salary_type',['0', '1', '2', '3'])->default(0);
            $table->float('salary', 10, 2)->nullable();
            $table->char('no_of_vacancies')->nullable();
            $table->integer('total_children')->nullable();
            $table->integer('total_male_children')->nullable();
            $table->integer('total_female_children')->nullable();
            $table->integer('total_adults')->nullable();
            $table->char('total_working_days_in_week',1)->nullable();
            $table->string('weekdays',150);
            $table->time('start_time')->default('10:00:00');
            $table->time('end_time')->default('05:00:00');
            $table->enum('job_display_type',['0', '1', '2'])->default(2);
            $table->date('work_start_date')->nullable();
            $table->timestamp('job_publish_date')->default('2018-10-02 02:10:06');
            $table->timestamp('job_expiry_date')->default('2018-10-02 02:10:06');
            $table->string('no_of_year_of_experience',20)->nullable();
            $table->string('language_preferences',50)->nullable();
            $table->date('interview_date')->nullable();
            $table->time('interview_time')->nullable();
            $table->enum('status',['0', '1', '2', '3'])->default(0);
            $table->enum('shortlisted_status',['0', '1', '2', '3'])->default(0);
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
        Schema::dropIfExists('jobs');
    }
}
