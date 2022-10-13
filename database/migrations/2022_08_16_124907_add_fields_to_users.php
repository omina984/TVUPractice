<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('username')->after('id');
            $table->string('family')->after('name')->nullable();
            $table->string('father')->after('family')->nullable();
            $table->string('nationalcode')->after('father')->nullable();
            $table->string('mobile')->after('nationalcode')->nullable();
            $table->bigInteger('markaz_id')->after('mobile')->unsigned();
            $table->bigInteger('type')->after('remember_token')->default(1); //admin=0, teacher=1, student=2
            $table->bigInteger('major_id')->after('type')->unsigned(); //رشته تحصیلی
            $table->string('state')->after('major_id')->default(1); //false=0, true=1

            $table->foreign('markaz_id')->references('id')->on('marakez')->onDelete('cascade');
            $table->foreign('major_id')->references('id')->on('majors')->onDelete('cascade');
        });

        //admin user
        DB::table('users')->insert([
            'username' => 'admin99901',
            'name' => 'کاربر مدیریت 99901',
            'family' => '',
            'father' => '',
            'nationalcode' => '0',
            'mobile' => '0',
            'markaz_id' => 999, //999 = sazman markazi
            'email' => 'admin99901@tvu.ac.ir',
            'password' => bcrypt('1234567890'),
            'type' => '0', //admin
            'major_id' => 1,
            'state' => 1,
            'created_at' => null,
            'updated_at' => null
        ]);

        // user
        DB::table('users')->insert([
            'username' => 'user03301',
            'name' => 'استاد فناوری اطلاعات',
            'family' => '',
            'father' => '',
            'nationalcode' => '0',
            'mobile' => '0',
            'markaz_id' => 33, //33 = shamsipoor
            'email' => 'user03301@tvu.ac.ir',
            'password' => bcrypt('1234567890'),
            'type' => '1', //teacher
            'major_id' => 1,//فناوری اطلاعات
            'state' => 1,
            'created_at' => null,
            'updated_at' => null
        ]);

        DB::table('users')->insert([
            'username' => 'user03301',
            'name' => 'استاد نرم افزار',
            'family' => '',
            'father' => '',
            'nationalcode' => '0',
            'mobile' => '0',
            'markaz_id' => 33, //33 = shamsipoor
            'email' => 'user03302@tvu.ac.ir',
            'password' => bcrypt('1234567890'),
            'type' => '1', //teacher
            'major_id' => 2,//نرم افزار
            'state' => 1,
            'created_at' => null,
            'updated_at' => null
        ]);

        DB::table('users')->insert([
            'username' => 'user03301',
            'name' => 'استاد سخت افزار',
            'family' => '',
            'father' => '',
            'nationalcode' => '0',
            'mobile' => '0',
            'markaz_id' => 33, //33 = shamsipoor
            'email' => 'user03303@tvu.ac.ir',
            'password' => bcrypt('1234567890'),
            'type' => '1', //teacher
            'major_id' => 3,//سخت افزار
            'state' => 1,
            'created_at' => null,
            'updated_at' => null
        ]);

        DB::table('users')->insert([
            'username' => 'user03301',
            'name' => 'استاد برق صنعتی',
            'family' => '',
            'father' => '',
            'nationalcode' => '0',
            'mobile' => '0',
            'markaz_id' => 33, //33 = shamsipoor
            'email' => 'user03304@tvu.ac.ir',
            'password' => bcrypt('1234567890'),
            'type' => '1', //teacher
            'major_id' => 4,//برق صنعتی
            'state' => 1,
            'created_at' => null,
            'updated_at' => null
        ]);

        DB::table('users')->insert([
            'username' => 'user03301',
            'name' => 'استاد برق قدرت',
            'family' => '',
            'father' => '',
            'nationalcode' => '0',
            'mobile' => '0',
            'markaz_id' => 33, //33 = shamsipoor
            'email' => 'user03305@tvu.ac.ir',
            'password' => bcrypt('1234567890'),
            'type' => '1', //teacher
            'major_id' => 5,//برق قدرت
            'state' => 1,
            'created_at' => null,
            'updated_at' => null
        ]);
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
        });
    }
};
