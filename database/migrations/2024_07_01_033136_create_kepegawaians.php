<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kepegawaians', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nipBps')->unique();
            $table->string('nama');
            $table->string('nipPns')->unique();
            $table->string('pangkat');
            $table->string('golongan');
            $table->string('jabatan');
            $table->string('grade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kepegawaians');
    }
};
