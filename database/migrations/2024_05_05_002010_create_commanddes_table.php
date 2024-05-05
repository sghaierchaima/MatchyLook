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
        Schema::create('commanddes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('utilisateur_id');
            $table->foreign('utilisateur_id')->references('id')->on('utilisateurs')->onDelete('cascade');
            $table->dateTime('date_commande');
            $table->string('adresse_livraison');
            $table->string('statut')->default('en_attente');
            $table->decimal('total', 8, 2);
            $table->string('mode_paiement');
            $table->string('methode_livraison');
            $table->unsignedBigInteger('article_id');
            $table->foreign('article_id')->references('id')->on('articles')->onDelete('cascade');
            $table->integer('quantite');
            $table->decimal('prix_unitaire', 8, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commanddes');
    }
};
