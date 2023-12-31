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
        Schema::create('mascota_vacunas', function (Blueprint $table) {
            $table->unsignedBigInteger('vacunas_id');
            $table->unsignedBigInteger('tipoMascota_id');
            $table->timestamps();
            $table->foreign('vacunas_id')->references('id')->on('vacunas');
            $table->foreign('tipoMascota_id')->references('id')->on('tipo_mascotas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mascota_vacunas');
    }
};
