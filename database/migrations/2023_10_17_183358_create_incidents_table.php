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
        Schema::create('incidents', function (Blueprint $table) {
            $table->bigIncrements('id_Incident');
            $table->timestamps();
            $table->string('description_Incident');
            $table->unsignedBigInteger('id_Statut_Incident');
            $table->foreign('id_Statut_Incident')
            ->references('statu_incidents')
            ->on('Statut_Incident')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->unsignedBigInteger('id_Priorite_Incident');
            $table->foreign('id_Priorite_Incident')
            ->references('id_Priorite_Incident')
            ->on('priorite_incidents')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->unsignedBigInteger('id_Utilisateur');
            $table->foreign('id_Utilisateur')
            ->references('id_Utilisateur')
            ->on('utilisateurs')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incidents');
    }
};
