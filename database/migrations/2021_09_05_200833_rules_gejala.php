<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RulesGejala extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rules_gejala', function (Blueprint $table) {
            $table->unsignedBigInteger('gejala_id');
            $table->string('rules_kode', 4);

            $table->foreign('gejala_id')->on('gejala')->references('id')->onDelete('cascade');
            $table->foreign('rules_kode')->on('rules')->references('kode')->onDelete('cascade');
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
