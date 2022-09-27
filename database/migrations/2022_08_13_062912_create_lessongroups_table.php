<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        Schema::dropIfExists('lessongroups');

        Schema::create('lessongroups', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description')->nullable();
            $table->bigInteger('state')->default(1);
            $table->timestamps();
        });

        //کامپیوتر
        DB::table('lessongroups')->insert([
            'name' => 'کامپیوتر',
            'description' => 'گروه درسی کامپیوتر',
            'state' => 1,
            'created_at' => null,
            'updated_at' => null
        ]);
    }

    public function down()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('lessongroups');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
};