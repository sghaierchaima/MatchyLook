@extends('layouts.menu')
    @section('content')
    <br><br><br><br><br>
<div class="container py-4">
    <h2>Mes Commandes</h2>
    @foreach($commandes as $commande)
    <div class="card mb-4">
        <div class="card-header">
            <h5>Commande #{{ $commande->id }} - État : {{ $commande->etat }}</h5>
        </div>
        <div class="card-body">
            <p>Date : {{ $commande->created_at->format('d/m/Y H:i') }}</p>
            <p>Adresse de livraison : {{ $commande->adresse_livraison }}</p>
            <p>Téléphone : {{ $commande->telephone }}</p>
            <p>Mode de paiement : {{ $commande->mode_paiement }}</p>
            <p>Méthode de livraison : {{ $commande->methode_livraison }}</p>
            <hr>
            <h6>Détails de la commande :</h6>
            <ul>
                @foreach($commande->detailsCommande as $detail)
                <li>
                    Produit : {{ $detail->produit->nom }}<br>
                    Quantité : {{ $detail->quantite }}<br>
                    Prix Unitaire : {{ $detail->prix_unitaire }}<br>
                    Total : {{ $detail->total }}
                    @if($commande->etat == 'livrée')
                                    <a href="{{ route('donner_avis', ['produit_id' => $detail->produit->id, 'commande_id' => $commande->id]) }}" class="btn btn-primary btn-sm">Donner votre avis</a>
                                    @endif
                </li>
                @endforeach
            </ul>
        </div>
    </div>
    @endforeach
</div>
@endsection
