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
        Schema::create('pengajarans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_guru');
            $table->foreign('id_guru')->references('id')->on('gurus');
            $table->unsignedBigInteger('id_mapel');
            $table->foreign('id_mapel')->references('id')->on('mapels');
            $table->string('kelas');
            $table->string('jam_pelajaran');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajarans');
    }
};
