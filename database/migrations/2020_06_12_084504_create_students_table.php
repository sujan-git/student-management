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
            $table->string('student_name');
            $table->string('slug')->unique();
            $table->date('dob');
            $table->integer('class_level')->unsigned();
            $table->integer('roll_no');
            $table->string('address');
            $table->string('guardian_name');
            $table->string('guardian_contact');
            $table->enum('gender',['male','female','other']);
            $table->integer('enrollment_year')->unsigned();
            $table->string('bus_route')->nullable();
            $table->string('image')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('register_pswd')->nullable();
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
        Schema::dropIfExists('students');
    }
}
