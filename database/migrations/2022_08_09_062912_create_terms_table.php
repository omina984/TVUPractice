<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        Schema::create('terms', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description')->nullable();
            $table->bigInteger('state')->default(1);
            $table->timestamps();
        });

        //نامشخص
        DB::table('terms')->insert([
            'name' => 'نامشخص',
            'description' => '',
            'state' => 1,
            'created_at' => null,
            'updated_at' => null
        ]);

        //011
        DB::table('terms')->insert([
            'name' => '011',
            'description' => 'ترم 011',
            'state' => 1,
            'created_at' => null,
            'updated_at' => null
        ]);

        //012
        DB::table('terms')->insert([
            'name' => '012',
            'description' => 'ترم 012',
            'state' => 1,
            'created_at' => null,
            'updated_at' => null
        ]);

        //013
        DB::table('terms')->insert([
            'name' => '013',
            'description' => 'ترم 013',
            'state' => 1,
            'created_at' => null,
            'updated_at' => null
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('terms');
    }
};
