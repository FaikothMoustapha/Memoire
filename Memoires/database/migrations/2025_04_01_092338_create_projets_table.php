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
        Schema::create('projets', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('libProj');
            $table->text('objectifs');
            $table->text('resAttendu');
            $table->date('dateDebut');
            $table->date('dateFin');
            $table->integer('duree');
            $table->foreignId('categorie_id')->constrained('categories');
            $table->foreignId('prestataire_id')->constrained('prestataires');
            $table->foreignId('programme_id')->constrained('programmes');
            $table->foreignId('structure_initiatrice_id')->constrained('structures');
            $table->foreignId('structure_beneficiaire_id')->constrained('structures');
            $table->foreignId('financement_id')->constrained('financements');
            $table->string('PTF')->nullable();
            $table->foreignId('statuts_projet_id')->constrained('statuts_projets')->default('nouveau');
            $table->foreignId('chef_projet_id')->constrained('users')->nullable()->onDelecte('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projets');
    }
};
