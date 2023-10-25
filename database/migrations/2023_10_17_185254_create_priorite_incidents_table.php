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
        Schema::create('priorite_incidents', function (Blueprint $table) {
            $table->bigIncrements('id_Priorite_Incident');
            $table->String('nom_Priorite_Incident');
            $table->String('niveau_Priorite_Incident');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('priorite_incidents');
    }
};
