<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TabunganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabungans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('santri');
            $table->foreign('santri')
                    ->references('id')
                    ->on('santris');
            $table->string('saldo_awal');
            $table->string('debit')->nullable();
            $table->string('kredit')->nullable();
            $table->string('saldo')->nullable();
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
