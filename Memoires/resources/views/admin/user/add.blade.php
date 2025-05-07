@extends('layouts.master')
@section('content')
<div class="row">
    <div class="container">
        <div class="card">
            <div class="card-header mx-auto pt-5"><h3>Enregistrer un utilisateur</h3></div>
            <div >
                @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{session('success')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
            </div>
    
                @endif
            <div class="card-body">
                
                <form method="Post" action="{{route('store_user')}}" class="forms-sample">
                    @csrf
                    <div class="form-group col-lg-12">
                        <label for="">Nom</label>
                        <input type="text" class="form-control"  name="nom" required>
                        <div style="color: red">{{$errors->first('nom')}}</div>
                    </div>
                    <div class="form-group col-lg-12">
                        <label >Prenom</label>
                        <input type="text" class="form-control"  name="prenom" required>
                        <div style="color: red">{{$errors->first('prenom')}}</div>
                    </div>
                    <div class="form-group col-lg-12">
                        <label >Email</label>
                        <input type="email" class="form-control"  name="email" placeholder="example@gmail.com" required>
                        <div style="color: red">{{$errors->first('email')}}</div>
                    </div>
                    <div style="display: flex">
                        <div class="form-group col-lg-6">
                            <label >Telephone</label>
                            <input type="number" class="form-control"  name="telephone" >
                            <div style="color: red">{{$errors->first('telephone')}}</div>
                        </div>
                        <div class="form-group col-lg-6">
                            <label >Mot de passe</label>
                            <input type="password" class="form-control"  name="password" required>

                        </div>
                    </div>
                    <div style="display: flex">
                        <div class="form-group col-lg-6">
                            <label >Statut</label>
                            <select class="form-control" name="statut" id="" required>
                                <option >Actif</option>
                                <option >Inactif</option>
                            </select>
                            
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="input-select">Role</label>
                            <select class="form-control" id="input-select" name="role_id" >
                            @foreach ($roles as $Role)
                        
                                <option value="{{$Role->id}}">{{$Role->libRole}}</option>
                            
                            @endforeach
                        </select> 
                        </div>
                    </div>
                <div >
                    <button type="submit" class="btn btn-primary  " >Enregistrer</button>
                </div>
                  </form>
            </div>
        </div>
    </div>

    
@endsection
@extends('layouts.master')
@section('content')

<div class="container">
    <div class="card shadow rounded-2">
        <div class="card-body p-5">
            <h2 class="mb-4 text-center text-primary">📝 Enregistrement d’un Projet</h2>
            <div >
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{session('success')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
            </div>
                
            <form action="{{route('store_user')}}" method="POST">
                @csrf 
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label  class="form-label">Nom</label>
                        <input type="text" class="form-control rounded-2" name="nom" id="code" required>
                        <div style="color: red">{{$errors->first('nom')}}</div>
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
                        <label  class="form-label">Structure initiatrice</label>
                        
                        <select class="form-control rounded-2 choices-select" name="structure_initiatrice_id" id="structure_initiatrice_id" multiple >
                            @foreach ($structures as $Structure)
                                <option value="{{$Structure->id}}">{{$Structure->libStruc}}</option>                        
                            @endforeach
                        </select>
                        
                    </div>
                    <div class="col-md-4">
                        <label for="structure_beneficiaire_id" class="form-label">Structure bénéficiaire</label>
                        <select class="form-control rounded-2 choices-select" name="structure_beneficiaire_id" id="structure_beneficiaire_id" multiple >
                            @foreach ($structures as $Structure)
                                <option value="{{$Structure->id}}">{{$Structure->libStruc}}</option>                        
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="financement_id" class="form-label">Source de financement</label>
                        <select class="form-control rounded-2 choices-select" name="financement_id" id="financement_id" multiple >
                            @foreach ($financements as $Financement)
                                <option value="{{$Financement->id}}">{{$Financement->libFinancement}}</option>                        
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="categorie_id" class="form-label">Catégorie</label>
                        <select class="form-control rounded-2 choices-select" name="categorie_id" id="categorie_id"  >
                            @foreach ($categories as $Categorie)
                                <option value="{{$Categorie->id}}">{{$Categorie->libCat}}</option>                        
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="prestataire_id" class="form-label">Prestataire</label>
                        <select class="form-control rounded-2 choices-select" name="prestataire_id" id="prestataire_id"  >
                            @foreach ($prestataires as $Prestataire)
                                <option value="{{$Prestataire->id}}">{{$Prestataire->nomStructure}}</option>                        
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="programme_id" class="form-label">Programme</label>
                        <select class="form-control rounded-2 choices-select" name="programme_id" id="choices-multiple-remote-fetch"  >
                            @foreach ($programmes as $Programme)
                                <option value="{{$Programme->id}}">{{$Programme->libProg}}</option>                        
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="statuts_projet_id" class="form-label">Statut du projet</label>
                        <select class="form-control rounded-2 choices-select" name="statuts_projet_id" id="statuts_projet_id"  >
                            <option value="1" selected>Nouveau</option>
                        </select>    
                    </div>
                </div>

                <div class="mb-3">
                    <label for="PTF" class="form-label">Partenaire technique et financier (PTF)</label>
                    <input type="text" class="form-control" name="PTF" id="PTF">
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
<script>
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
</script>




{{-- <script> 
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
</script>  --}}



@endsection

