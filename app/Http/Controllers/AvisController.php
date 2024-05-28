<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commandde;
use App\Models\DetailsCommande;
use App\Models\Paniers;
use App\Models\Produit;
use App\Models\Avis;
// Assurez-vous d'avoir importé le modèle User
use App\Mail\ConfirmationCommandeMail;
use Illuminate\Support\Facades\Mail;
use App\Models\Utilisateur;

class AvisController extends Controller
{
    //
    public function formAvis($produit_id, $commande_id)
    {
        $produit = Produit::find($produit_id);
        $commande = Commandde::find($commande_id);
        return view('frontend.formAvis', compact('produit', 'commande'));
    }

    public function submitAvis(Request $request)
    {
        $request->validate([
            'produit_id' => 'required|exists:produits,id',
            'commande_id' => 'required|exists:commanddes,id',
            'avis' => 'required|string|max:255',
            'note' => 'required|integer|min:1|max:5',
        ]);

        Avis::create([
            'produit_id' => $request->input('produit_id'),
            'commande_id' => $request->input('commande_id'),
            'utilisateur_id' => session('loginId'),
            'avis' => $request->input('avis'),
            'note' => $request->input('note'),
        ]);

        return redirect()->route('mes_commandes')->with('success', 'Votre avis a été soumis avec succès.');
    }
}
