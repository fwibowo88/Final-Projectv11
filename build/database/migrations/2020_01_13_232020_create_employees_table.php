<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nik',20);
            $table->string('password');
            $table->string('fname');
            $table->string('lname');
            $table->text('address');
            $table->string('email')->unique();
            $table->string('phone');
            $table->enum('status',['active','inactive']);
            $table->timestamps();

            //Foreign Key to Department Table
            $table->unsignedInteger('department_id');
            $table->foreign('department_id')->references('id')->on('departments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
