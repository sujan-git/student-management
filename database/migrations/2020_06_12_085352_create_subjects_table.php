<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('subject');
            $table->string('subject_code')->nullable();
            $table->boolean('status')->default(1);
            $table->decimal('full_marks_theory',5,2)->nullable();
            $table->decimal('full_marks_practical',5,2)->nullable();
            $table->decimal('pass_marks_theory',5,2)->nullable();
            $table->decimal('pass_marks_practical',5,2)->nullable();
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
        Schema::dropIfExists('subjects');
    }
}
