<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicalRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_records', function (Blueprint $table) {
            $table->increments('id');
            $table->text('symptom');
            $table->text('diagnosis');
            $table->text('notes')->nullable();
            $table->text('recommendation');
            $table->timestamps();

            //Foreign Key to Students Table
            $table->unsignedInteger('student_id');
            $table->foreign('student_id')->references('id')->on('students');
            //Foreign Key to Employee Table
            $table->unsignedInteger('employee_id');
            $table->foreign('employee_id')->references('id')->on('employees');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medical_records');
    }
}
