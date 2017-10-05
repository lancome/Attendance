<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttendanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pivot_id')->unsigned();
            $table->foreign('pivot_id')
                ->references('id')
                ->on('pivots')
                ->onDelete('cascade');
            $table->integer('student_id')->unsigned();
            $table->foreign('student_id')
                ->references('id')
                ->on('students')
                ->onDelete('cascade');
            $table->text('description',300)->nullable();
            $table->boolean('is_was')->default(0);
            $table->date('att_date')->index();
            $table->unique(['att_date', 'pivot_id','student_id']);
            $table->index(['att_date', 'pivot_id','student_id']);
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
        Schema::drop('attendances');
    }
}
