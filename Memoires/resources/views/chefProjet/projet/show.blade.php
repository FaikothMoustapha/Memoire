@extends('layouts.master')
@section('content')

<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="text-primary">📝 Projet</h2>
        <a href="{{ route('list_projet') }}" class="btn btn-secondary">
            🔙 Retour à la liste
        </a>
    </div>

    <div class="card shadow rounded-2">
        <div class="card-body p-5">

            <!-- Notification de succès -->
            <div>
                @include('alerte.alerte')
            </div>

            <!-- Formulaire d'enregistrement -->
            <form action="" method="POST">
                @csrf 
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Code du projet</label>
                        <input type="text" class="form-control" name="code" value="{{ $projets->code }}" readonly>
                        <small class="text-danger">{{ $errors->first('code') }}</small>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Libellé</label>
                        <input type="text" class="form-control" name="libProj" value="{{ $projets->libProj }}" readonly>
                        <small class="text-danger">{{ $errors->first('libProj') }}</small>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Objectifs</label>
                        <input type="text" class="form-control" name="objectifs" value="{{ $projets->objectifs }}" >
                        <small class="text-danger">{{ $errors->first('objectifs') }}</small>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Résultats attendus</label>
                        <input type="text" class="form-control" name="resAttendu" value="{{ $projets->resAttendu }}" >
                        <small class="text-danger">{{ $errors->first('resAttendu') }}</small>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Catégorie</label>
                        <select class="form-select" name="categorie_id" readonly>
                            @foreach ($categories as $categorie)
                                <option value="{{ $categorie->id }}" {{ $projets->categorie_id == $categorie->id ? 'selected' : '' }} >
                                    {{ $categorie->libCat }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Prestataire</label>
                        <select class="form-select" name="prestataire_id" readonly>
                            @foreach ($prestataires as $prestataire)
                                <option value="{{ $prestataire->id }}" {{ $projets->prestataire_id == $prestataire->id ? 'selected' : '' }} >
                                    {{ $prestataire->nomStructure }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Satut</label>
                        <select class="form-select" name="statuts_projet_id" readonly>
                            @foreach ($statuts as $statut)
                                <option value="{{ $statut->id }}" {{ $projets->statuts_projet_id == $statut->id ? 'selected' : '' }} >
                                    {{ $statut->libStatut }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Programme</label>
                        <select class="form-select" name="programme_id" readonly>
                            @foreach ($programmes as $programme)
                                <option value="{{ $programme->id }}" {{ $projets->programme_id == $programme->id ? 'selected' : '' }} >
                                    {{ $programme->libProg }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Stucture initiatrice</label>
                        <select class="form-select" name="structure_initiatrice_id" readonly>
                            @foreach ($structures as $structure)
                                <option value="{{ $structure->id }}" {{ $projets->structure_initiatrice_id == $structure->id ? 'selected' : '' }} >
                                    {{ $structure->code }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Structure beneficiaire</label>
                        <select class="form-select" name="structure_beneficiaire_id" readonly>
                            @foreach ($structures as $structure)
                                <option value="{{ $structure->id }}" {{ $projets->structure_beneficiaire_id == $structure->id ? 'selected' : '' }} >
                                    {{ $structure->code }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="financement_id" class="form-label">Source de financement</label>
                        <select class="form-control rounded-2" name="financement_id" id="financement_id">
                            @foreach ($financements as $Financements)
                                <option value="{{ $Financements->id }}" {{ $projets->financement_id == $Financements->id ? 'selected' : '' }} readonly>
                                    {{ $Financements->libFinancement }}
                                </option>
                            @endforeach
                            
                        </select>
                    </div>
        
                    <!-- PTF caché par défaut -->
                    <div class="col-md-6" id="ptf_container" style="display: none;">
                        <label for="PTF" class="form-label">Partenaire Technique et Financier (PTF)</label>
                        <input type="text" class="form-control" name="PTF" value="{{ $projets->PTF }}" readonly>
                        <small class="text-danger">{{ $errors->first('PTF') }}</small>
                    </div>
                </div> 

                <div class="mb-4 text-center text-primary">
                    <a class="dropdown-item d-flex align-items-center" href="{{route('addd',$projets->id)}}">
                        
                            💾 Completer le infos
                       
                    </a>
                    
                </div>  
                
            </form>
        </div>
    </div>
</div>

<script>
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
          

@endsection
