@extends('layoutsadmin.headerfotter')

@section('adminmenu')
<div class="row">
    <div class="col-md-15 mt-4">
        <div class="card">
            <div class="card-header pb-0 px-3">
                <h6 class="mb-0">Ajouter Produits</h6>
                @if(Session::has('succès'))
                <div class="alert alert-success" role="alert">
                    {{Session::get('succès')}}
                </div>
                @endif
            </div>
            <div class="card-body pt-15 p-3">
                <ul class="list-group">
                    <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                        <div class="d-flex flex-column">
                            <form action="{{ url('saveProduits') }}" method="post" enctype="multipart/form-data" >
                                @csrf
                                <div class="mb-3">
                                    <label for="categorie_id" class="form-label">Choisir une sous catégorie</label>
                                    <select class="form-select" name="categorie_id" id="categorie_id">
                                        @foreach($scategories as $categorie)
                                            <option value="{{$categorie->id}}" data-categorie="{{$categorie->category->nom}}">{{$categorie->nom}}</option>
                                        @endforeach
                                    </select>
                                    @error('categorie_id')
                                        <div class="alert alert-danger" role="alert">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="nom" class="form-label">Nom produit</label>
                                    <input type="text" class="form-control" id="nom" name="nom">
                                    @error('nom')
                                        <div class="alert alert-danger" role="alert">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <input type="text" class="form-control" id="description" name="description">
                                    @error('description')
                                        <div class="alert alert-danger" role="alert">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="couleur" class="form-label">Couleur</label>
                                    <input type="text" class="form-control" id="couleur" name="couleur">
                                    @error('couleur')
                                        <div class="alert alert-danger" role="alert">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="prix" class="form-label">Prix</label>
                                    <input type="number" class="form-control" id="prix" name="prix">
                                    @error('prix')
                                        <div class="alert alert-danger" role="alert">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="quantite" class="form-label">Quantité</label>
                                    <input type="text" class="form-control" id="quantite" name="quantite">
                                    @error('quantite')
                                        <div class="alert alert-danger" role="alert">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="taille" class="form-label">Taille</label>
                                    <input type="text" class="form-control" id="taille" name="taille">
                                    @error('taille')
                                        <div class="alert alert-danger" role="alert">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="image" class="form-label">Image</label>
                                    <input type="file" class="form-control" id="image" name="image">
                                    @if(session()->has('image'))
                                        <img src="{{ asset('assets/images/' . session('image')) }}" width="120"/>
                                    @endif
                                    @error('image')
                                        <div class="alert alert-danger" role="alert">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Ajouter</button>
                                <a href="{{ url('souscategorie') }}" class="btn btn-danger">Retour</a>
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('categorie_id').addEventListener('change', function() {
        var select = this;
        var selectedOption = select.options[select.selectedIndex];
        var categorieNom = selectedOption.getAttribute('data-categorie');
        alert('La sous-catégorie sélectionnée appartient à la catégorie : ' + categorieNom);
    });
</script>
@endsection
