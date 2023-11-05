<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SantriBaruTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('santri_barus', function (Blueprint $table) {
            $table->id();
            $table->string('nis')->nullable();
            $table->string('uid')->nullable();
            $table->string('nama')->nullable();
            $table->string('status')->nullable();
            $table->date('masa_aktif');
            $table->string('pendaftaran');
            $table->string('infaq');
            $table->string('posaba');
            $table->string('kartu_santri');
            $table->string('seragam');
            $table->string('syahriyah');
            $table->string('pondok');
            $table->string('diniyah');
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
    }
}
