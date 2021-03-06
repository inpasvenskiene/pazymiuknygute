<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->integer('id', true);
            $table->Integer('lecture_id');
            $table->Integer('student_id');
            $table->foreign('lecture_id')->references('id')->on('lectures')->onUpdate('cascade')->onDelete(('cascade'));
            $table->foreign('student_id')->references('id')->on('students')->onUpdate('cascade')->onDelete(('cascade'));
            $table->integer('grade');
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
        Schema::dropIfExists('grades');
    }
}
