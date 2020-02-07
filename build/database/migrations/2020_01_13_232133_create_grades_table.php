<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('grades', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name');
          $table->text('description')->nullable();
          $table->enum('status',['active','inactive']);
          $table->timestamps();

          //Foreign Key to Programs Table
          $table->unsignedInteger('program_id');
          $table->foreign('program_id')->references('id')->on('programs');
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
        Schema::dropIfExists('classes');
    }
}
