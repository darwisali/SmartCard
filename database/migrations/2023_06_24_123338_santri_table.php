<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SantriTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('santris', function (Blueprint $table) {
        $table->id();
        $table->string('nis')->nullable();
        $table->string('uid')->nullable();
        $table->string('nama')->nullable();
        $table->string('status')->nullable();
        $table->date('masa_aktif');
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('santris');

    }
}
