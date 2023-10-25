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
        Schema::create('Commentaire', function (Blueprint $table) {

            $table->unsignedBigInteger('id_Incident');
            $table->foreign('id_Incident')
                ->references('id_Incident')
                ->on('Incident')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->unsignedBigInteger('id_prioriteincident');
            $table->foreign('id_prioriteincident')
                ->references('id_prioriteincident')
                ->on('prioriteincident')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->String('contenu');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Commentaire');
    }
};
