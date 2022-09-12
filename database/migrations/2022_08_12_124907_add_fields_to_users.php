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
            $table->bigInteger('type')->after('remember_token')->default(1); //student=1, teacher=2, admin=99
            $table->string('isadmin')->after('type')->default(0); //false=0, true=1
            $table->string('state')->after('isadmin')->default(1); //false=0, true=1

            $table->foreign('markaz_id')->references('id')->on('marakez')->onDelete('cascade');
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
            'type' => '99',
            'isadmin' => 1,
            'state' => 1,
            'created_at' => null,
            'updated_at' => null
        ]);

        // user
        DB::table('users')->insert([
            'username' => 'user03301',
            'name' => 'کاربر 01 مرکز شمسی‌پور',
            'family' => '',
            'father' => '',
            'nationalcode' => '0',
            'mobile' => '0',
            'markaz_id' => 33, //33 = shamsipoor
            'email' => 'user03301@tvu.ac.ir',
            'password' => bcrypt('1234567890'),
            'type' => '99',
            'isadmin' => 0,
            'state' => 1,
            'created_at' => null,
            'updated_at' => null
        ]);
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
