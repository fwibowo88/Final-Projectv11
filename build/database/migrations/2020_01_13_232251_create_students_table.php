<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nik',20)->nullable()->unique();
            $table->string('nisn',20)->nullable()->unique();
            $table->string('nis',20)->nullable()->unique();
            $table->text('password');
            $table->string('fname');
            $table->string('lname');
            $table->enum('gender',['male','female']);
            $table->string('b_place');
            $table->date('b_date');
            $table->string('address');
            $table->string('district');
            $table->string('sub_district');
            $table->string('rt');
            $table->string('rw');
            $table->string('city');
            $table->string('province');
            $table->string('phone');
            $table->string('email')->unique();
            $table->string('bank_acc')->nullable();
            $table->enum('blood_type',['A','B','O','AB']);
            $table->double('height')->nullable();
            $table->double('weight')->nullable();
            $table->string('gr_from');
            $table->double('science_score')->nullable();
            $table->double('mathematic_score')->nullable();
            $table->double('english_score')->nullable();
            $table->double('indonesian_score')->nullable();
            $table->double('total_score')->nullable();
            $table->enum('status',['reg','active','inactive','suspend','alumni']);
            $table->text('notes')->nullable();
            $table->timestamps();

            //Foreign Key to Religions Table
            $table->unsignedInteger('religion_id');
            $table->foreign('religion_id')->references('id')->on('religions');
            //Foreign Key to Classes Table
            $table->unsignedInteger('class_id')->nullable();
            $table->foreign('class_id')->references('id')->on('grades');
            //Foreign Key to Programs Table
            $table->unsignedInteger('bank_id')->nullable();
            $table->foreign('bank_id')->references('id')->on('banks');
            //Foreign Key to Tokens Table
            $table->unsignedInteger('token_id')->nullable();
            $table->foreign('token_id')->references('id')->on('tokens');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
