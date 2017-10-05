<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentTable extends Migration
{
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->string('student_code')->unique();
            $table->string('name');
            $table->string('lastname');
            $table->integer('group_code')->unsigned();
            $table->foreign('group_code')
                ->references('id')
                ->on('groups');
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
        Schema::drop('students');
    }
}
