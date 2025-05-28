@extends('layouts.master')
@section('content')

<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="text-primary">📝 Projet</h2>
        <a href="#" class="btn btn-secondary">
            🔙 Retour à la liste
        </a>

        <div >
            @include('alerte.alerte')
        </div>
    </div>

    <div class="card shadow rounded-2">
        <div class="card-body p-5">

            <!-- Notification de succès -->
            <div>
                @include('alerte.alerte')
            </div>

            <!-- Formulaire d'enregistrement -->
            <form action="{{ route('updat', $projets->id) }}" method="POST">
            @csrf
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Code du projet</label>
                        <input type="text" class="form-control" name="code" value="{{ $projets->code }}" readonly>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Libellé</label>
                        <input type="text" class="form-control" name="libProj" value="{{ $projets->libProj }}" readonly>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Objectifs</label>
                        <textarea class="form-control" name="objectifs" rows="4" readonly>{{ $projets->objectifs }}</textarea>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Résultats attendus</label>
                        <textarea class="form-control" name="resAttendu" rows="4" readonly>{{ $projets->resAttendu }}</textarea>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Catégorie</label>
                        <select class="form-select" disabled>
                            @foreach ($categories as $categorie)
                                <option value="{{ $categorie->id }}" {{ $projets->categorie_id == $categorie->id ? 'selected' : '' }}>
                                    {{ $categorie->libCat }}
                                </option>
                            @endforeach
                        </select>
                        <input type="hidden" name="categorie_id" value="{{ $projets->categorie_id }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Prestataire</label>
                        <select class="form-select" disabled>
                            @foreach ($prestataires as $prestataire)
                                <option value="{{ $prestataire->id }}" {{ $projets->prestataire_id == $prestataire->id ? 'selected' : '' }}>
                                    {{ $prestataire->nomStructure }}
                                </option>
                            @endforeach
                        </select>
                        <input type="hidden" name="prestataire_id" value="{{ $projets->prestataire_id }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Statut</label>
                        <select class="form-select" disabled>
                            @foreach ($statuts as $statut)
                                <option value="{{ $statut->id }}" {{ $projets->statuts_projet_id == $statut->id ? 'selected' : '' }}>
                                    {{ $statut->libStatut }}
                                </option>
                            @endforeach
                        </select>
                        <input type="hidden" name="statuts_projet_id" value="{{ $projets->statuts_projet_id }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Programme</label>
                        <select class="form-select" disabled>
                            @foreach ($programmes as $programme)
                                <option value="{{ $programme->id }}" {{ $projets->programme_id == $programme->id ? 'selected' : '' }}>
                                    {{ $programme->libProg }}
                                </option>
                            @endforeach
                        </select>
                        <input type="hidden" name="programme_id" value="{{ $projets->programme_id }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Structure initiatrice</label>
                        <select class="form-select" disabled>
                            @foreach ($structures as $structure)
                                <option value="{{ $structure->id }}" {{ $projets->structure_initiatrice_id == $structure->id ? 'selected' : '' }}>
                                    {{ $structure->code }}
                                </option>
                            @endforeach
                        </select>
                        <input type="hidden" name="structure_initiatrice_id" value="{{ $projets->structure_initiatrice_id }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Structure bénéficiaire</label>
                        <select class="form-select" disabled>
                            @foreach ($structures as $structure)
                                <option value="{{ $structure->id }}" {{ $projets->structure_beneficiaire_id == $structure->id ? 'selected' : '' }}>
                                    {{ $structure->code }}
                                </option>
                            @endforeach
                        </select>
                        <input type="hidden" name="structure_beneficiaire_id" value="{{ $projets->structure_beneficiaire_id }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="financement_id" class="form-label">Source de financement</label>
                        <select class="form-control rounded-2" disabled>
                            @foreach ($financements as $Financements)
                                <option value="{{ $Financements->id }}" {{ $projets->financement_id == $Financements->id ? 'selected' : '' }}>
                                    {{ $Financements->libFinancement }}
                                </option>
                            @endforeach
                        </select>
                        <input type="hidden" name="financement_id" value="{{ $projets->financement_id }}">
                    </div>

                    <!-- PTF -->
                    <div class="col-md-6">
                        <label for="PTF" class="form-label">Partenaire Technique et Financier (PTF)</label>
                        <input type="text" class="form-control" name="PTF" value="{{ $projets->PTF }}" readonly>
                    </div>
                </div>

                <div class="mb-4 text-center text-primary">
                    <h2>📝 Complétez les infos</h2>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Date de début</label>
                        <input type="date" class="form-control rounded-2" name="dateDebut" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Date prévue pour la fin</label>
                        <input type="date" class="form-control rounded-2" name="dateFin" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Durée en jours</label>
                        <input type="number" class="form-control rounded-2" name="duree" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Statut du projet</label>
                        <select class="form-control rounded-2" name="statuts_projet_id">
                            @foreach ($statuts as $statut)
                                <option value="{{ $statut->id }}">{{ $statut->libStatut }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="mb-4 text-center text-primary">
                    <button type="submit" class="btn btn-primary rounded-2">
                        💾 Ajouter
                    </button>
                </div>
            </form>


            
        </div>
    </div>
</div>

<script>
     
</script>
          

@endsection
