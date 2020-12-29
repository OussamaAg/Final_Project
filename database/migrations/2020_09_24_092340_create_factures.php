<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFactures extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factures', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('num_facture',255);
            $table->double('montant_facture',10,2);
            $table->date('date_emiss');
            $table->date('date_recep');
            $table->date('date_paie');
            $table->string('id_rub',255);
            $table->integer('id_four');
            $table->foreign('id_rub')->references('id_rubrique')->on('rubriques')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->foreign('id_four')->references('id')->on('fournisseurs')
            ->onDelete('cascade')
            ->onUpdate('cascade');
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
        Schema::dropIfExists('factures');
    }
}
