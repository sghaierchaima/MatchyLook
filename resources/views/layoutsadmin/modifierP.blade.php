@extends('layoutsadmin.headerfotter')
    @section('adminmenu')
    <div class="row">
        <div class="col-md-15 mt-4">
          <div class="card">
            <div class="card-header pb-0 px-3">
              <h6 class="mb-0">Modifier Categories</h6>
              @if(Session::has('succès'))
              <div class="alert alert-success" role="alert">
                {{Session::get('succès')}}
              </div>
              @endif
            <div class="card-body pt-15 p-3">
              <ul class="list-group">
                <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                  <div class="d-flex flex-column">
    <form action="{{url('modifierProduit')}}" method="post">
        @csrf
        <input type="hidden" name="id" value="{{$data->id}}">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Nom Produit</label>
    <input type="text" class="form-control" name="nom" value="{{$data->nom}}">
    @error('nom')
    <div class="alert alert-danger" role="alert">
                {{$message}}
              </div>
    @enderror
    <label for="exampleInputEmail1" class="form-label">description Produit</label>
    <input type="text" class="form-control" name="description" value="{{$data->description}}">
    @error('description')
    <div class="alert alert-danger" role="alert">
                {{$message}}
              </div>
    @enderror
    <label for="exampleInputEmail1" class="form-label">couleur Produit</label>
    <input type="text" class="form-control" name="couleur" value="{{$data->couleur}}">
    @error('couleur')
    <div class="alert alert-danger" role="alert">
                {{$message}}
              </div>
    @enderror
    <label for="exampleInputEmail1" class="form-label">Taille Produit</label>
    <input type="text" class="form-control" name="taille" value="{{$data->taille}}">
    @error('taille')
    <div class="alert alert-danger" role="alert">
                {{$message}}
              </div>
    @enderror
    <label for="exampleInputEmail1" class="form-label">Quantité Produit</label>
    <input type="text" class="form-control" name="quantite" value="{{$data->quantite}}">
    @error('quantite')
    <div class="alert alert-danger" role="alert">
                {{$message}}
              </div>
    @enderror
    
    <div class="mb-3">
    <label for="sous_categorie_id" class="form-label">Sous_Catégorie</label>
    <select class="form-control" id="sous_categorie_id" name="sous_categorie_id">
        @foreach($sousCategories as $categorie)
            <option value="{{ $categorie->id }}" {{ $data->sous_categorie_id == $categorie->id ? 'selected' : '' }}>
                {{ $categorie->nom }}
            </option>
        @endforeach
    </select>
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
 
  <button type="submit" class="btn btn-primary">Modifier</button>
  <a href="{{url('produits')}}" class="btn btn-danger">retour</a>
</form>
            @endsection 