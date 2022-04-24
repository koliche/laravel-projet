<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInterventionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interventions', function (Blueprint $table) {
            $table->dateTime('int_debut');
            $table->string('emp_nss');
            $table->foreign('emp_nss')->references('emp_nss')->on('employes')->constrained()->onDelete('cascade')->unsigned();
            $table->foreignId('parcelle_id')->references('id')->on('parcelles')->constrained()->onDelete('cascade');
            $table->integer('nb_jours');
            $table->primary(['int_debut','emp_nss','parcelle_id']);
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
        Schema::dropIfExists('interventions');
    }
}
