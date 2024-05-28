@extends('layouts.menu')

@section('content')
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<br><br><br><br><br>

<h1>Passage de commande</h1>
<p>Bonjour, {{ $nomUtilisateur }},{{$prenom}}</p>
<p>Email : {{ $emailUtilisateur }}</p>

<h2>Détails de la commande :</h2>
<table  class="table">
    <thead>
        <tr>
            <th>Produit</th>
            <th>Quantité</th>
            <th>Prix unitaire</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($panier as $item)
            <tr>
                <td>{{ $item->produit->nom }}</td>
                <td>{{ $item->quantite }}</td>
                <td>{{ $item->produit->prix }}</td>
            </tr>
        @endforeach
        <tr>
            <td colspan="2" class="text-right"><strong>Total :</strong></td>
            <td>{{ $total }} DT</td>
        </tr>
    </tbody>
</table>

<form id="confirmation-form" action="{{ route('confirmer_commande') }}" method="POST">
    @csrf
    <label for="adresse_livraison">Adresse de livraison :</label>
    <input type="text" id="adresse_livraison" name="adresse_livraison" required>
    <label for="telephone">Numéro de téléphone :</label>
    <input type="tel" id="telephone" name="telephone" required>
    <label for="mode_paiement">Mode de paiement :</label>
    <select id="mode_paiement" name="mode_paiement" required>
        <option value="espece">Espèce</option>
        <option value="carte_credit">Carte de crédit</option>
        <option value="paypal">PayPal</option>
    </select>
    <label for="mode_livraison">Mode de livraison :</label>
    <select id="mode_livraison" name="mode_livraison" required>
        <option value="livraison_standard">Livraison standard</option>
        <option value="livraison_express">Livraison express</option>
    </select>
    <button type="submit">Valider la commande</button>
</form>

<!-- Popup Bootstrap pour la confirmation de commande -->
<!-- <div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="confirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmationModalLabel">Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Votre commande a été confirmée avec succès.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div> -->

<div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="confirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmationModalLabel">Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Votre commande a été confirmée avec succès.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>


<!-- <script>
    $(document).ready(function(){
        $('#confirmation-form').submit(function(event){
            event.preventDefault();

            $.ajax({
                url: $(this).attr('action'),
                method: $(this).attr('method'),
                data: $(this).serialize(),
                success: function(response){
                    if(response.success) {
                        $('#confirmationModal').modal('show');
                    } else {
                        alert('Erreur: ' + response.error);
                    }

                },
                error: function(xhr, status, error){
                    console.error(error);
                }
            });
        });
    });
</script> -->
<script>
    $(document).ready(function(){
        $('#confirmation-form').submit(function(event){
            event.preventDefault();

            $.ajax({
                url: $(this).attr('action'),
                method: $(this).attr('method'),
                data: $(this).serialize(),
                success: function(response){
                    if(response.success) {
                        $('#confirmationModal').modal('show');
                    } else {
                        alert('Erreur: ' + response.error);
                    }
                },
                error: function(xhr, status, error){
                    console.error(error);
                }
            });
        });

        // Redirection vers master.blade.php après la fermeture du modal
        $('#confirmationModal').on('hidden.bs.modal', function () {
            window.location.href = '{{ url('/masterr') }}';
        });
    });
</script>
@endsection