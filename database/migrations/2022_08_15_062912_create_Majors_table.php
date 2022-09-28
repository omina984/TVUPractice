<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

// رشته تحصیلی
return new class extends Migration
{
    public function up()
    {
        Schema::create('majors', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('lessongroup_id')->unsigned();
            $table->string('name');
            $table->string('description')->nullable();
            $table->bigInteger('state')->default(1);
            $table->timestamps();

            $table->foreign('lessongroup_id')->references('id')->on('lessongroups')->onDelete('cascade');
        });

        //کامپیوتر
        DB::table('majors')->insert([
            'lessongroup_id' => 1,// کامپیوتر
            'name' => 'فناوری اطلاعات',
            'description' => 'رشته کامپیوتر',
            'state' => 1,
            'created_at' => null,
            'updated_at' => null
        ]);

        DB::table('majors')->insert([
            'lessongroup_id' => 1,//کامپیوتر
            'name' => 'نرم‌افزار',
            'description' => 'رشته کامپیوتر',
            'state' => 1,
            'created_at' => null,
            'updated_at' => null
        ]);

        DB::table('majors')->insert([
            'lessongroup_id' => 1,//کامپیوتر
            'name' => 'سخت‌افزار',
            'description' => 'رشته کامپیوتر',
            'state' => 1,
            'created_at' => null,
            'updated_at' => null
        ]);

        //برق
        DB::table('majors')->insert([
            'lessongroup_id' => 2,//برق
            'name' => 'برق صنعتی',
            'description' => 'رشته برق',
            'state' => 1,
            'created_at' => null,
            'updated_at' => null
        ]);

        DB::table('majors')->insert([
            'lessongroup_id' => 2,//برق
            'name' => 'برق قدرت',
            'description' => 'رشته برق',
            'state' => 1,
            'created_at' => null,
            'updated_at' => null
        ]);
    }

    public function down()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('majors');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
};
