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
        Schema::create('gest_activites', function (Blueprint $table) {
            $table->id();
            $table->date('dateDeb')->nullable();
            $table->date('dateFAct')->nullable();
            $table->string('statut')->default('Non demarer');
            $table->foreignId('activite_id')->constrained('activites')->onDelete('cascade');
            $table->foreignId('projet_id')->constrained('projets')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gest_activites');
    }
};
