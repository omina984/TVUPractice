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
            $table->string('username')->after('id')->uniqid();
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
            'name' => 'کاربر 1 مدیریت',
            'family' => '99901',
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
            'name' => 'استاد 1',
            'family' => 'فناوری اطلاعات',
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
            'username' => 'user03302',
            'name' => 'استاد 1',
            'family' => 'نرم افزار',
            'father' => '',
            'nationalcode' => '0064693848',
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
            'username' => 'user03303',
            'name' => 'استاد 1',
            'family' => 'سخت افزار',
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
            'username' => 'user03304',
            'name' => 'استاد 1',
            'family' => 'برق صنعتی',
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
            'username' => 'user03305',
            'name' => 'استاد 1',
            'family' => 'برق قدرت',
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

        DB::table('users')->insert([
            'username' => 'user03306',
            'name' => 'استاد 2',
            'family' => 'فناوری اطلاعات',
            'father' => '',
            'nationalcode' => '0',
            'mobile' => '0',
            'markaz_id' => 33, //33 = shamsipoor
            'email' => 'user03306@tvu.ac.ir',
            'password' => bcrypt('1234567890'),
            'type' => '1', //teacher
            'major_id' => 1,//فناوری اطلاعات
            'state' => 1,
            'created_at' => null,
            'updated_at' => null
        ]);

        DB::table('users')->insert([
            'username' => 'user03307',
            'name' => 'استاد 2',
            'family' => 'نرم افزار',
            'father' => '',
            'nationalcode' => '0',
            'mobile' => '0',
            'markaz_id' => 33, //33 = shamsipoor
            'email' => 'user03307@tvu.ac.ir',
            'password' => bcrypt('1234567890'),
            'type' => '1', //teacher
            'major_id' => 2,//نرم افزار
            'state' => 1,
            'created_at' => null,
            'updated_at' => null
        ]);

        DB::table('users')->insert([
            'username' => 'user03308',
            'name' => 'استاد 2',
            'family' => 'سخت افزار',
            'father' => '',
            'nationalcode' => '0',
            'mobile' => '0',
            'markaz_id' => 33, //33 = shamsipoor
            'email' => 'user03308@tvu.ac.ir',
            'password' => bcrypt('1234567890'),
            'type' => '1', //teacher
            'major_id' => 3,//سخت افزار
            'state' => 1,
            'created_at' => null,
            'updated_at' => null
        ]);

        DB::table('users')->insert([
            'username' => 'user03309',
            'name' => 'استاد 2',
            'family' => 'برق صنعتی',
            'father' => '',
            'nationalcode' => '0',
            'mobile' => '0',
            'markaz_id' => 33, //33 = shamsipoor
            'email' => 'user03309@tvu.ac.ir',
            'password' => bcrypt('1234567890'),
            'type' => '1', //teacher
            'major_id' => 4,//برق صنعتی
            'state' => 1,
            'created_at' => null,
            'updated_at' => null
        ]);

        DB::table('users')->insert([
            'username' => 'user03310',
            'name' => 'استاد 2',
            'family' => 'برق قدرت',
            'father' => '',
            'nationalcode' => '0',
            'mobile' => '0',
            'markaz_id' => 33, //33 = shamsipoor
            'email' => 'user03310@tvu.ac.ir',
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
