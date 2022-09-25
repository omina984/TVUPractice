<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        Schema::dropIfExists('courses');

        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->bigInteger('lessongroups_id')->unsigned();
            $table->string('lessongroup_code');
            $table->string('lessoncode');
            $table->bigInteger('vahed');
            $table->bigInteger('vahed_teory');
            $table->bigInteger('vahed_amali');
            $table->bigInteger('state')->default(1);
            $table->timestamps();

            $table->foreign('lessongroups_id')->references('id')->on('lessongroups')->onDelete('cascade');
        });

        //امنيت شبكه
        DB::table('courses')->insert([
            'name' => 'امنيت شبكه',
            'lessongroups_id' => 1, //کامپیوتر
            'lessongroup_code' => '30201133',
            'lessoncode' => '3021131',
            'vahed' => 2,
            'vahed_teory' => 2,
            'vahed_amali' => 0,
            'state' => 1,
            'created_at' => null,
            'updated_at' => null
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('courses');
    }
};
