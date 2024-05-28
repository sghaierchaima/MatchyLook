<!DOCTYPE html>
<html>
<head>
    <title>Confirmation de commande</title>
</head>
<body>
    <h1>Confirmation de commande</h1>
    <p>Bonjour {{ $user->prenom }},</p>
    <p>Merci pour votre commande. Voici les détails de votre commande :</p>
    <ul>
        <li>Commande ID : {{ $commande->id }}</li>
        <li>Adresse de livraison : {{ $commande->adresse_livraison }}</li>
        <li>Mode de paiement : {{ $commande->mode_paiement }}</li>
        <li>Mode de livraison : {{ $commande->methode_livraison }}</li>
    </ul>
    
    <table>
        <thead>
            <tr>
                <th>Produit</th>
                <th>Quantité</th>
                <th>Prix unitaire</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($details_commande as $detail)
                <tr>
                <td>{{ $detail->produit->nom }}</td>
    <td>{{ $detail->quantite }}</td>
    <td>{{ $detail->prix_unitaire }}</td>
    <td>{{ $detail->total }}</td>
                  
                </tr>
            @endforeach
        </tbody>
    </table>

    <p>Nous vous remercions pour votre confiance.</p>
</body>
</html>
