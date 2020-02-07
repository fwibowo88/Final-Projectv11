<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAbsentRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absent_records', function (Blueprint $table) {
            $table->increments('id');
            $table->date('start_date');
            $table->date('end_date');
            $table->enum('type',['A','I','S']);
            $table->text('description')->nullable();
            $table->enum('status',['confirmed','pending']);
            $table->text('receipt')->nullable();
            $table->timestamps();

            //Foreign Key to Students Table
            $table->unsignedInteger('student_id');
            $table->foreign('student_id')->references('id')->on('students');
            //Foreign Key to Employee Table
            $table->unsignedInteger('employee_id')->nullable();
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
        Schema::dropIfExists('absent_records');
    }
}
