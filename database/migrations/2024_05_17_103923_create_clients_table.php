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
    {Schema::create('clients', function (Blueprint $table) {
        $table->id('idC');
        $table->string('nomC');
        $table->string('prenomC');
        $table->date('dateNaissance');
        $table->string('numTelephone');
        $table->string('adresseC');
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
        Schema::dropIfExists('clients');
    }
};
