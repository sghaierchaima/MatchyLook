@extends('layoutsadmin.headerfotter')
    @section('adminmenu')
    <div class="row">
        <div class="col-md-15 mt-4">
          <div class="card">
            <div class="card-header pb-0 px-3">
              <h6 class="mb-0">Ajouter Categories</h6>
              @if(Session::has('succès'))
              <div class="alert alert-succes" role="alert">
                {{Session::get('succès')}}
              </div>
              @endif
            <div class="card-body pt-15 p-3">
              <ul class="list-group">
                <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                  <div class="d-flex flex-column">
    <form action="{{url('saveCategory')}}" method="post">
        @csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Nom Category</label>
    <input type="text" class="form-control" name="nom" >
    @error('nom')
    <div class="alert alert-danger" role="alert">
                {{$message}}
              </div>
    @enderror
  </div>
  
  
  <button type="submit" class="btn btn-primary">Ajouter</button>
  <a href="{{url('categorie')}}" class="btn btn-danger">retour</a>
</form>
            @endsection 