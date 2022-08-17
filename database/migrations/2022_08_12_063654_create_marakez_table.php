<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        Schema::create('marakez', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->bigInteger('shahr_id')->unsigned();
            $table->bigInteger('state')->default(1);
            $table->timestamps();

            $table->foreign('shahr_id')->references('id')->on('shahr')->onDelete('cascade');
        });

        DB::insert('insert into marakez values (?,?,?,?,?,?)', [999, 'سازمان مرکزی', 1, 1, null, null]);
        DB::insert('insert into marakez values (?,?,?,?,?,?)', [33, 'شهید شمسی‌پور', 1, 1, null, null]);
    }

    public function down()
    {
        Schema::dropIfExists('marakez');
    }
};
