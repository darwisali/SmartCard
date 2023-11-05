<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RekapregistrasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rekap_registrasis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('santri');
            $table->foreign('santri')
                    ->references('id')
                    ->on('santris');
            $table->string('semester');
            $table->string('tahun');
            $table->string('status');
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
        
    }
}
