@extends('layoutsadmin.headerfotter')
    @section('adminmenu')
   
  
   
   
   
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Liste Produits</h6>
              <div style="margin-right:10px;float:right">
              <a class="btn btn-link text-dark text-gradient px-3 mb-0" href="{{url('ajouterP')}}">
                <i class="fas fa-plus"></i> Ajouter Produits</a> </div>
            </div>
           
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">image</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">nom Produit</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">description</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Couleur</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Prix</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Taille</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Quantité</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">sous_Categories</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Categories</th>
                      <th class="text-secondary opacity-7">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                   
                  @foreach($dataa as $p)
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <img src="{{asset('../assets/images')}}/{{$p->image}}" class="avatar avatar-sm me-3" alt="{{$p->image}}">
                          </div>
                          
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"></h6>
                            
                          </div>
                        
                        </div>
                      </td>
                      <td>
                        <!-- <p class="text-xs font-weight-bold mb-0">Executive</p>
                        <p class="text-xs text-secondary mb-0">Projects</p> -->
                        <p class="text-xs text-secondary mb-0">{{$p->nom}}</p>
                      </td>
                      <td class="align-middle text-center text-sm">
                      <p class="text-xs text-secondary mb-0">{{$p->description}}</p>
                      <!-- <span class="badge badge-sm bg-gradient-success">Online</span> -->
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">{{$p->couleur}}</span>
                      </td>
                      <td class="align-middle">
                        <!-- <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                          Edit
                        </a> -->
                        <span class="text-secondary text-xs font-weight-bold">{{$p->prix}}</span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">{{$p->taille}}</span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">{{$p->quantite}}</span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">{{$p->sousCategorie->nom}}</span>
                      </td>
                      <td class="align-middle text-center">
                     
                        <span class="text-secondary text-xs font-weight-bold">{{$p->sousCategorie->category->nom}}</span>
                     
                      </td>
                      <td class="text-xs font-weight-bold mb-0"> 
                     
                        <a class="btn btn-link text-dark px-3 mb-0" href="{{url('modifierp/'.$p->id)}}"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Modifier</a>
                    <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="{{url('supprimerp/'.$p->id)}}"><i class="far fa-trash-alt me-2"></i>Supprimer</a>
                    
                      </td>
                    </tr>
                    @endforeach
                    
                   
                   
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      
    </div>
    @endsection 