@extends('layouts.master')
@section('content')

<div class="container">
    <div class="card shadow rounded-2">
        <div class="card-body p-5">
            <h2 class="mb-4 text-center text-primary">📝 Ajout des informations liées a lactivites</h2>
            <div >
                @include('alerte.alerte')
            </div>
                
            <form action="{{route('updat',$projets->id)}}" method="POST">
                @csrf 
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label  class="form-label">Date de début</label>
                        <input type="date" class="form-control rounded-2" name="datePrev" id="datePrev" required>
                        <div style="color: red">{{$errors->first('datePrev')}}</div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Date de fin</label>
                        <input type="date" class="form-control rounded-2" name="dateFinAct" id="dateFinAct" required>
                        <div style="color: red">{{$errors->first('dateFinAct')}}</div>

                    </div>
                </div>
                <div class="row mb-3">
                    
                    <div class="col-md-6">
                        <label for="statuts_projet_id" class="form-label">Statut de l'activite</label>
                        <select class="form-control rounded-2 " name="statut" id="statut">
                            <option value="">Début</option>
                            <option value="">En cours</option>
                            <option value="">Terminé</option>
                        </select>
                        
                    </div>
                </div>
                <div class="mb-4 text-center text-primary">
                    <button type="submit" class="btn btn-primary  rounded-2">
                        💾 Ajouter 
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

