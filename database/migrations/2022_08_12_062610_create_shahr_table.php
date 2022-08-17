<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use League\CommonMark\Reference\Reference;

return new class extends Migration
{
    public function up()
    {
        Schema::create('shahr', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->BigInteger('ostan_id')->unsigned(); // ya unsignedBigInteger(no BigInteger)
            $table->bigInteger('state')->default(1);
            $table->timestamps();

            $table->foreign('ostan_id')->references('id')->on('ostan')->onDelete('cascade');
        });

        DB::insert('insert into shahr values (?,?,?,?,?,?)', [1, 'تهران', 8, 1, null, null]);
        DB::insert('insert into shahr values (?,?,?,?,?,?)', [2, 'کرج', 5, 1, null, null]);
    }

    public function down()
    {
        Schema::dropIfExists('shahr');
    }
};
