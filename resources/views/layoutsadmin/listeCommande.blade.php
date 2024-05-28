@extends('layoutsadmin.headerfotter')

@section('adminmenu')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Liste Commandes</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID Commande</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Utilisateur</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Adresse Livraison</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Téléphone</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Mode Paiement</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Méthode Livraison</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">État</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Détails</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($commandes as $commande)
                                <tr>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{ $commande->id }}</p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{ $commande->utilisateur->prenom }} {{ $commande->utilisateur->nom }}</p>
                                        <p class="text-xs text-secondary mb-0">{{ $commande->utilisateur->adressemail }}</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{ $commande->adresse_livraison }}</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{ $commande->telephone }}</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{ $commande->mode_paiement }}</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{ $commande->methode_livraison }}</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{ $commande->created_at->format('d/m/Y H:i') }}</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{ $commande->etat }}</p>
                                    </td>
                                    <td class="text-center">
                                        <button class="btn btn-link text-dark px-3 mb-0" type="button" data-bs-toggle="collapse" data-bs-target="#details-{{ $commande->id }}" aria-expanded="false" aria-controls="details-{{ $commande->id }}">
                                            <i class="fas fa-info-circle"></i> Voir Détails
                                        </button>
                                        <div class="collapse" id="details-{{ $commande->id }}">
                                            <div class="card card-body">
                                                <ul>
                                                    @foreach($commande->detailsCommande as $detail)
                                                    <li>
                                                        Produit: {{ $detail->produit->nom }}<br>
                                                        Quantité: {{ $detail->quantite }}<br>
                                                        Prix Unitaire: {{ $detail->prix_unitaire }}<br>
                                                        Total: {{ $detail->total }}
                                                    </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <form action="{{ route('commandes.update', $commande->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <select name="etat" class="form-control">
                                                <option value="en_traitement" {{ $commande->etat == 'en_traitement' ? 'selected' : '' }}>En traitement</option>
                                                <option value="livrée" {{ $commande->etat == 'livrée' ? 'selected' : '' }}>Livrée</option>
                                            </select>
                                            <button type="submit" class="btn btn-primary mt-2">Mettre à jour</button>
                                        </form>
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
