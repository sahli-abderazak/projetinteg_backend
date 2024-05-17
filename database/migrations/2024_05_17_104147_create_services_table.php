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
{
    Schema::create('services', function (Blueprint $table) {
        $table->id('idS'); // Colonne ID auto-incrémentée
        $table->string('nomS');
        $table->string('categorieS');
        $table->text('critereS'); // Colonne pour les critères (peut être une chaîne de texte)
        $table->unsignedBigInteger('idP'); // Colonne pour l'ID du prestataire
        $table->string('imgS')->default('Inconnu');
        $table->foreign('idP')->references('idP')->on('prestataires')->onDelete('cascade');
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
        Schema::dropIfExists('services');
    }
};
