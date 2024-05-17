<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { Schema::create('reservations', function (Blueprint $table) {
        $table->id('idR'); // Colonne ID auto-incrémentée
        $table->unsignedBigInteger('idService'); // Colonne pour l'ID du service réservé
        $table->unsignedBigInteger('idClient'); // Colonne pour l'ID du client
        $table->foreign('idService')->references('idS')->on('services')->onDelete('cascade');
        $table->foreign('idClient')->references('idC')->on('clients')->onDelete('cascade');
        $table->date('dateReservation');
        $table->timestamps(); // Ajoute automatiquement les colonnes created_at et updated_at
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservations');
    }
};
