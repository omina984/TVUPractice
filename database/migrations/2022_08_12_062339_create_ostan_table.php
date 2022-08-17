<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        Schema::create('ostan', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->bigInteger('state')->default(1);
            $table->timestamps();
        });

        DB::insert('insert into ostan values (?,?,?,?,?)', [1, 'آذربایجان شرقی', 1, null, null]);
        DB::insert('insert into ostan values (?,?,?,?,?)', [2, 'آذربایجان غربی', 1, null, null]);
        DB::insert('insert into ostan values (?,?,?,?,?)', [3, 'اردبیل', 1, null, null]);
        DB::insert('insert into ostan values (?,?,?,?,?)', [4, 'اصفهان', 1, null, null]);
        DB::insert('insert into ostan values (?,?,?,?,?)', [5, 'البرز', 1, null, null]);
        DB::insert('insert into ostan values (?,?,?,?,?)', [6, 'ایلام', 1, null, null]);
        DB::insert('insert into ostan values (?,?,?,?,?)', [7, 'بوشهر', 1, null, null]);
        DB::insert('insert into ostan values (?,?,?,?,?)', [8, 'تهران', 1, null, null]);
        DB::insert('insert into ostan values (?,?,?,?,?)', [9, 'چهارمحال و بختیاری', 1, null, null]);
        DB::insert('insert into ostan values (?,?,?,?,?)', [10, 'خراسان جنوبی', 1, null, null]);
        DB::insert('insert into ostan values (?,?,?,?,?)', [11, 'خراسان رضوی', 1, null, null]);
        DB::insert('insert into ostan values (?,?,?,?,?)', [12, 'خراسان شمالی', 1, null, null]);
        DB::insert('insert into ostan values (?,?,?,?,?)', [13, 'خوزستان', 1, null, null]);
        DB::insert('insert into ostan values (?,?,?,?,?)', [14, 'زنجان', 1, null, null]);
        DB::insert('insert into ostan values (?,?,?,?,?)', [15, 'سمنان', 1, null, null]);
        DB::insert('insert into ostan values (?,?,?,?,?)', [16, 'سیستان و بلوچستان', 1, null, null]);
        DB::insert('insert into ostan values (?,?,?,?,?)', [17, 'فارس', 1, null, null]);
        DB::insert('insert into ostan values (?,?,?,?,?)', [18, 'قزوین', 1, null, null]);
        DB::insert('insert into ostan values (?,?,?,?,?)', [19, 'قم', 1, null, null]);
        DB::insert('insert into ostan values (?,?,?,?,?)', [20, 'کردستان', 1, null, null]);
        DB::insert('insert into ostan values (?,?,?,?,?)', [21, 'کرمان', 1, null, null]);
        DB::insert('insert into ostan values (?,?,?,?,?)', [22, 'کرمانشاه', 1, null, null]);
        DB::insert('insert into ostan values (?,?,?,?,?)', [23, 'کهکلویه و بویراحمد', 1, null, null]);
        DB::insert('insert into ostan values (?,?,?,?,?)', [24, 'گلستان', 1, null, null]);
        DB::insert('insert into ostan values (?,?,?,?,?)', [25, 'گیلان', 1, null, null]);
        DB::insert('insert into ostan values (?,?,?,?,?)', [26, 'لرستان', 1, null, null]);
        DB::insert('insert into ostan values (?,?,?,?,?)', [27, 'مازندران', 1, null, null]);
        DB::insert('insert into ostan values (?,?,?,?,?)', [28, 'مرکزی', 1, null, null]);
        DB::insert('insert into ostan values (?,?,?,?,?)', [29, 'هرمزگان', 1, null, null]);
        DB::insert('insert into ostan values (?,?,?,?,?)', [30, 'همدان', 1, null, null]);
        DB::insert('insert into ostan values (?,?,?,?,?)', [31, 'یزد', 1, null, null]);
    }

    public function down()
    {
        Schema::dropIfExists('ostan');
    }
};
