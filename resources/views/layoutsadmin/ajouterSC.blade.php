@extends('layoutsadmin.headerfotter')
    @section('adminmenu')
    <div class="row">
        <div class="col-md-15 mt-4">
          <div class="card">
            <div class="card-header pb-0 px-3">
              <h6 class="mb-0">Ajouter Categories</h6>
              @if(Session::has('succès'))
              <div class="alert alert-success" role="alert">
                {{Session::get('succès')}}
              </div>
              @endif
            <div class="card-body pt-15 p-3">
              <ul class="list-group">
                <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                  <div class="d-flex flex-column">
    <form action="{{url('saveSCategory')}}" method="post">
        @csrf
        <div class="mb-3">
        <label for="categorie_id" class="form-label">Choisir une catégorie</label>
        <select class="form-select" name="categorie_id" id="categorie_id">
            @foreach($categories as $categorie)
                <option value="{{$categorie->id}}">{{$categorie->nom}}</option>
            @endforeach
        </select>
        @error('categorie_id')
            <div class="alert alert-danger" role="alert">{{$message}}</div>
        @enderror
    </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Nom sous  categories</label>
    <input type="text" class="form-control" name="nom" >
    @error('nom')
    <div class="alert alert-danger" role="alert">
                {{$message}}
              </div>
    @enderror
  </div>
  
  
  <button type="submit" class="btn btn-primary">Ajouter</button>
  <a href="{{url('souscategorie')}}" class="btn btn-danger">retour</a>
</form>
            @endsection 