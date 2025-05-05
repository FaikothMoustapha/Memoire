@extends('layouts.master')
@section('content')

<div class="container">
    <div class="card shadow rounded-2">
        <div class="card-body p-5">
            <h2 class="mb-4 text-center text-primary">📝 Enregistrement d’un Projet</h2>

            <form action="#" method="POST">
                @csrf 

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="code" class="form-label">Code du projet</label>
                        <input type="text" class="form-control rounded-2" name="code" id="code" required>
                    </div>
                    <div class="col-md-6">
                        <label for="libProj" class="form-label">Libellé</label>
                        <input type="text" class="form-control rounded-2" name="libProj" id="libProj" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="objectifs" class="form-label">Objectifs</label>
                    <textarea class="form-control rounded-2" name="objectifs" id="objectifs" rows="3" required></textarea>
                </div>

                <div class="mb-3">
                    <label for="resAttendu" class="form-label">Résultats attendus</label>
                    <textarea class="form-control rounded-2" name="resAttendu" id="resAttendu" rows="3" required></textarea>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <label  class="form-label">Structure initiatrice</label>
                        
                        <select class="form-select" name="structure_initiatrice_id" id="structure_initiatrice_id" multiple>
                            <option value="1" selected>DPAF</option>
                            <option value="2">DGEC</option>
                            <option value="3">DGYGN</option>
                            <option value="4">DIR</option>
                        </select>
                        
                    </div>
                    <div class="col-md-4">
                        <label for="structure_beneficiaire_id" class="form-label">Structure bénéficiaire</label>
                        <select class="form-select" name="structure_beneficiaire_id" id="structure_beneficiaire_id" multiple>
                            <option value="1">DPAF</option>
                            <option value="2" selected>DGEC</option>
                            <option value="3">DGYGN</option>
                            <option value="4">DIR</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="financement_id" class="form-label">Source de financement</label>
                        <select class="form-select" name="financement_id" id="financement_id" multiple>
                            <option value="1" selected>Fonds national</option>
                            <option value="2">Partenaire externe</option>
                            <option value="3">Budget spécial</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="categorie_id" class="form-label">Catégorie</label>
                        <select class="form-select" name="categorie_id" id="categorie_id" multiple>
                            <option value="1" selected>Infrastructure</option>
                            <option value="2">Énergie</option>
                            <option value="3">Environnement</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="prestataire_id" class="form-label">Prestataire</label>
                        <select class="form-select" name="prestataire_id" id="prestataire_id" multiple>
                            <option value="1" selected> Société A</option>
                            <option value="2">Société B</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="programme_id" class="form-label">Programme</label>
                        <select class="form-select" name="programme_id" id="programme_id" multiple >
                            <option value="1" selected  >Programme 1</option>
                            <option value="2">Programme 2</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="statuts_projet_id" class="form-label">Statut du projet</label>
                        <select class="form-select" name="statuts_projet_id" id="statuts_projet_id" multiple>
                            <option value="1" selected>Nouveau</option>
                        </select>    
                    </div>
                </div>

                <div class="mb-3">
                    <label for="PTF" class="form-label">Partenaire technique et financier (PTF)</label>
                    <input type="text" class="form-control" name="PTF" id="PTF">
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-lg rounded-pill">
                        💾 Enregistrer le projet
                    </button>
                </div>                 
            </form>
        </div>
    </div>
</div>

{{-- Script Choices.js --}}
<script>
    document.querySelectorAll('select').forEach(function(select) {
        new Choices(select, {
            placeholder: true,
            itemSelectText: '',
            placeholder: true,
            placeholderValue: 'Faites un choix',
            noResultsText: 'Aucun résultat trouvé',
            noChoicesText: 'Aucun choix à sélectionner',
            itemSelectText: 'Appuyez pour sélectionner',
        });
    });
</script>



<!-- <script>
    // Récupérer l'élément
    var selectElement = document.getElementById('choices-multiple-remote-fetch');

    // Initialiser Choices.js avec les options personnalisées
    var choices = new Choices(selectElement, {
        placeholder: true,
        placeholderValue: 'Faites un choix',
        noResultsText: 'Aucun résultat trouvé',
        noChoicesText: 'Aucun choix à sélectionner',
        itemSelectText: 'Appuyez pour sélectionner',
    });
</script> -->



@endsection

