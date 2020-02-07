<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuardiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guardians', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fname');
            $table->string('lname');
            $table->string('b_place');
            $table->date('b_date');
            $table->text('address');
            $table->enum('relation',['father','mother','guardian']);
            $table->string('email');
            $table->string('phone');
            $table->string('password');
            $table->string('education');
            $table->string('job');
            $table->text('notes')->nullable();
            $table->timestamps();

            //Foreign Key to Students Table
            $table->unsignedInteger('student_id');
            $table->foreign('student_id')->references('id')->on('students');
            //Foreign Key to Religions Table
            $table->unsignedInteger('religion_id');
            $table->foreign('religion_id')->references('id')->on('religions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('guardians');
    }
}
