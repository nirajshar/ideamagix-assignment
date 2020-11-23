<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignedLecturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assigned_lectures', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('instructor_id')->unsigned();
            $table->bigInteger('course_id')->unsigned();
            $table->bigInteger('lecture_id')->unsigned();
            $table->date('assigned_for_date');
            $table->timestamps();
            $table->foreign('instructor_id')->references('id')->on('instructors');
            $table->foreign('course_id')->references('id')->on('courses');
            $table->foreign('lecture_id')->references('id')->on('lectures');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assigned_lectures');
    }
}
