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
        Schema::create('configurations', function (Blueprint $table) {
            $table->id();

            //ici cette table va prendre que les valeurs qui se trouvent dans le tableau apres le type
            $table->enum('type',['DATE_PAIEMENT', 'NOM_APPLICATION', 'NOM_DEVELOPPEUR', 'AUTRE'])
                ->default('AUTRE')
                ->comment('Type de la configuration');

            //c'est à l'intérieur de cette table que je vais affiché les valeurs de ceux qui sont en haut
            $table->string('valeur');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('configurations');
    }
};
