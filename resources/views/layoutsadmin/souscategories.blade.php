@extends('layoutsadmin.headerfotter')
    @section('adminmenu')
    <div class="row">
        <div class="col-md-15 mt-4">
          <div class="card">
            <div class="card-header pb-0 px-3">
              <h6 class="mb-0">Liste Sous_Categories</h6>
              <div style="margin-right:10px;float:right">
              <a class="btn btn-link text-dark text-gradient px-3 mb-0" href="{{url('ajoutersC')}}">
                <i class="fas fa-plus"></i> Ajouter SousCategories</a> </div>
            </div>
            @if(Session::has('succès'))
              <div class="alert alert-success" role="alert">
                {{Session::get('succès')}}
              </div>
              @endif
            <div class="card-body pt-15 p-3">
              <ul class="list-group">
                <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                  <div class="d-flex flex-column">
                  @foreach($data as $c)
                    <h6 class="mb-3 text-sm">id:{{$c->id}}</h6>
                    <span class="mb-2 text-xs">nom_sous_categories: <span class="text-dark font-weight-bold ms-sm-2">{{$c->nom}}</span></span>
                    <span class="mb-2 text-xs">nom_categories: <span class="text-dark font-weight-bold ms-sm-2">{{$c->category->nom}}</span></span><div class="ms-auto text-end">
                    <a class="btn btn-link text-dark px-3 mb-0" href="{{ url('modifierSC/' . $c->id) }}"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Modifier</a>
                    <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="{{url('supprimerSC/'.$c->id)}}"><i class="far fa-trash-alt me-2"></i>Supprimer</a>
                    
                  </div>
                   
                    @endforeach
                  </div>
                  
                </li>
              
               
              </ul>
            </div>
          </div>
        </div>
    @endsection 