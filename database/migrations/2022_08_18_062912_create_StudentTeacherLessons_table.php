<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        Schema::create('StudentTeacherLessons', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('student_id')->unsigned();
            $table->bigInteger('teacherlesson_id')->unsigned();
            $table->string('description')->nullable();
            $table->bigInteger('state')->default(1);
            $table->timestamps();

            $table->foreign('student_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('teacherlesson_id')->references('id')->on('teacherlessons')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('StudentTeacherLessons');
    }
};
