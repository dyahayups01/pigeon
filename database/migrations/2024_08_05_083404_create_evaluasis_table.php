<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvaluasisTable extends Migration
{
    public function up()
    {
        Schema::create('evaluasis', function (Blueprint $table) {
            $table->id();
            $table->string('nipBps');
            $table->foreign('nipBps')->references('nipBps')->on('kepegawaians')->onDelete('cascade');
            $table->string('nama');
            $table->foreign('nama')->references('nama')->on('kepegawaians')->onDelete('cascade');
            $table->float('skp');
            $table->integer('tl1');
            $table->integer('tl2');
            $table->integer('tl3');
            $table->integer('tl4');
            $table->integer('hk');
            $table->integer('hadirApel');
            $table->integer('jumlahApel');
            $table->double('absensiBulanan');
            $table->double('persentaseApel');
            $table->double('evaluasiBulanan');
            $table->integer('ranking');
            $table->integer('tahun');
            $table->integer('bulan');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('evaluasis');
    }
}
