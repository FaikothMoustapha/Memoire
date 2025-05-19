@extends('layouts.master')
@section('content')

<div class="container">
    <div class="card shadow rounded-2">
        <div class="card-body p-5">
            <h2 class="mb-4 text-center text-primary">📝 Enregistrement d’un Projet</h2>
            <div >
                @include('alerte.alerte')
            </div>
                
            <form action="{{route('store_projet')}}" method="POST">
                @csrf 
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label  class="form-label">Code du projet</label>
                        <input type="text" class="form-control rounded-2" name="code" id="code" required>
                        <div style="color: red">{{$errors->first('code')}}</div>
                    </div>
                    <div class="col-md-6">
                        <label for="libProj" class="form-label">Libellé</label>
                        <input type="text" class="form-control rounded-2" name="libProj" id="libProj" required>
                        <div style="color: red">{{$errors->first('libProj')}}</div>

                    </div>
                </div>

                <div class="mb-3">
                    <label for="objectifs" class="form-label">Objectifs</label>
                    <textarea class="form-control rounded-2" name="objectifs" id="objectifs" rows="3" required></textarea>
                    <div style="color: red">{{$errors->first('objectifs')}}</div>

                </div>

                <div class="mb-3">
                    <label for="resAttendu" class="form-label">Résultats attendus</label>
                    <textarea class="form-control rounded-2" name="resAttendu" id="resAttendu" rows="3" required></textarea>
                    <div style="color: red">{{$errors->first('resAttendu')}}</div>

                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="categorie_id" class="form-label">Catégorie</label>
                        <select class="form-control rounded-2 " name="categorie_id" id="categorie_id"  >
                           @foreach ($categories as $Categorie)
                                <option value="{{$Categorie->id}}">{{$Categorie->libCat}}</option>                        
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="prestataire_id" class="form-label">Prestataire</label>
                        <select class="form-control rounded-2 " name="prestataire_id" id="prestataire_id">
                            @foreach ($prestataires as $Prestataire)
                                <option value="{{ $Prestataire->id }}">{{ $Prestataire->nomStructure }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="statuts_projet_id" class="form-label">Statut du projet</label>
                        <select class="form-control rounded-2 " name="statuts_projet_id" id="statuts_projet_id">
                            @foreach ($statuts as $statut)
                                <option value="{{ $statut->id }}">{{ $statut->libStatut }}</option>
                            @endforeach
                        </select>
                    </div>
                </div> 
                  <!-- Sélection du Programme  -->
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="programme_id" class="form-label">Programme</label>
                        <select class="form-control rounded-2" name="programme_id" id="programme_id">
                            @foreach ($programmes as $programme)
                                <option value="{{ $programme->id }}">{{ $programme->code }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Structure initiatrice -->
                    <div class="col-md-4">
                        <label for="structure_initiatrice_id" class="form-label">Structure initiatrice</label>
                        <select class="form-control rounded-2" name="structure_initiatrice_id" id="structure_initiatrice_id">
                        </select>
                    </div>

                    <!-- Structure bénéficiaire -->
                    <div class="col-md-4">
                        <label for="structure_beneficiaire_id" class="form-label">Structure bénéficiaire</label>
                        <select class="form-control rounded-2" name="structure_beneficiaire_id" id="structure_beneficiaire_id">
                            @foreach ($structures as $structure)
                                <option value="{{ $structure->id }}">{{ $structure->code }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Sélection du Financement -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="financement_id" class="form-label">Source de financement</label>
                        <select class="form-control rounded-2" name="financement_id" id="financement_id">
                            @foreach ($financements as $Financements)
                                <option value="{{ $Financements->id }}">{{ $Financements->libFinancement }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- PTF caché par défaut -->
                    <div class="col-md-6" id="ptf_container" style="display: none;">
                        <label for="PTF" class="form-label">Partenaire Technique et Financier (PTF)</label>
                        <input type="text" class="form-control" name="PTF" id="PTF">
                    </div>
                </div>
                
                <div class="mb-4 text-center text-primary">
                    <button type="submit" class="btn btn-primary  rounded-2">
                        💾 Enregistrer le projet
                    </button>
                </div>                 
            </form>
        </div>
    </div>
</div>

{{-- Script Choices.js --}}
<!-- <script>
    document.querySelectorAll('.choices-select').forEach(function(select) {
        new Choices(select, {
            placeholder: true,
            itemSelectText: '',
            placeholderValue: 'Faites un choix',
            noResultsText: 'Aucun résultat trouvé',
            noChoicesText: 'Aucun choix à sélectionner',
            itemSelectText: 'Appuyez pour sélectionner',
        });
    });
</script> -->
<script>
    // 🎯 Sélection du programme
    document.getElementById('programme_id').addEventListener('change', function() {
        const programmeId = this.value;

        // Requête AJAX pour récupérer les structures liées au programme
        fetch(`/structures/${programmeId}`)
            .then(response => response.json())
            .then(data => {
                const structureInitiatriceSelect = document.getElementById('structure_initiatrice_id');
                // const structureBeneficiaireSelect = document.getElementById('structure_beneficiaire_id');

                // Vider les selects
                structureInitiatriceSelect.innerHTML = '';
                // structureBeneficiaireSelect.innerHTML = '';

                // Ajouter les nouvelles options
                data.forEach(structure => {
                    const option = new Option(structure.libStruc, structure.id);
                    structureInitiatriceSelect.add(option);

                    // Cloner l'option pour l'autre select
                    const optionClone = new Option(structure.libStruc, structure.id);
                    structureBeneficiaireSelect.add(optionClone);
                });
            })
            .catch(error => console.error('Erreur:', error));
    });

    // 🎯 Gestion du PTF selon le type de financement
    document.getElementById('financement_id').addEventListener('change', function() {
    const selectedText = this.options[this.selectedIndex].text.trim().toLowerCase();
    const ptfContainer = document.getElementById('ptf_container');

    if (selectedText.includes('don')) {
        ptfContainer.style.display = 'block';
    } else {
        ptfContainer.style.display = 'none';
        document.getElementById('PTF').value = ''; // On vide le champ
    }
});


    // Cacher le champ PTF par défaut
    document.getElementById('PTF').parentElement.style.display = 'none';
</script>



<!-- {{-- <script> 
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
</script>  --}} -->

@endsection

