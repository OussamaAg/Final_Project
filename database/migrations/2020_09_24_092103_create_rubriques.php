<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRubriques extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rubriques', function (Blueprint $table) {
            $table->string('id_rubrique',255)->primary();
            $table->string('intitule',255);
            $table->double('montant',10,2);
	        $table->double('disponible',10,2);
            $table->string('Annee',4);
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
        Schema::dropIfExists('rubriques');
    }
}
