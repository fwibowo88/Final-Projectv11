<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgramStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('program_student', function (Blueprint $table) {
          $table->increments('id');
          //Foreign Key to Student Table
          $table->unsignedInteger('student_id');
          $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
          //Foreign Key to Program Table
          $table->unsignedInteger('program_id');
          $table->foreign('program_id')->references('id')->on('programs')->onDelete('cascade');
          $table->boolean('is_primary')->nullable();
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
        Schema::dropIfExists('program_student');
    }
}
