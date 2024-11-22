<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerformasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('performas', function (Blueprint $table) {
            $table->id();
            $table->integer('tahun');
            $table->string('bulan');
            $table->foreign('nipBps')->references('nipBps')->on('kepegawaians')->onDelete('cascade');
            $table->foreign('nama')->references('nama')->on('kepegawaians')->onDelete('cascade');
            $table->float('skp');
            $table->integer('ckp');
            $table->integer('tl1')->nullable();
            $table->integer('tl2')->nullable();
            $table->integer('tl3')->nullable();
            $table->integer('tl4')->nullable();
            $table->integer('psw1')->nullable();
            $table->integer('psw2')->nullable();
            $table->integer('psw3')->nullable();
            $table->integer('psw4')->nullable();
            $table->integer('kjk');
            $table->integer('hk')->nullable();
           // $table->integer('absensi_bulanan')->nullable();
            $table->integer('hadirApel')->nullable();
            $table->integer('jumlahApel')->nullable();
            //$table->boolean('approved')->default(false);
            $table->timestamps();

            $table->foreign('nipBps')->references('nipBps')->on('kepegawaians')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('performas');
    }
}
