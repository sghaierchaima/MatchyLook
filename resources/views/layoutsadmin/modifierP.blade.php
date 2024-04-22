@extends('layoutsadmin.headerfotter')

@section('adminmenu')
<div class="row">
    <div class="col-md-15 mt-4">
        <div class="card">
            <div class="card-header pb-0 px-3">
                <h6 class="mb-0">Modifier sousCatégories</h6>
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
                            <form action="{{url('modifierSCategory')}}" method="post">
                                @csrf
                               
                                <input type="hidden" name="id" value="{{ $sousCategorie->id }}">
                                <div class="mb-3">
                                    <label for="nom" class="form-label">Nom Sous-catégorie</label>
                                    <input type="text" class="form-control" id="nom" name="nom" value="{{ $sousCategorie->nom }}">
                                    @error('nom')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="categorie_id" class="form-label">Catégorie</label>
                                    <select class="form-control" id="categorie_id" name="categorie_id">
                                        @foreach($categories as $categorie)
                                            <option value="{{ $categorie->id }}" {{ $sousCategorie->categorie_id == $categorie->id ? 'selected' : '' }}>
                                                {{ $categorie->nom }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Modifier</button>
                                <a href="{{ url('souscategorie') }}" class="btn btn-danger">Retour</a>
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
