<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commandde;
use App\Models\DetailsCommande;
use App\Models\Paniers;
use App\Models\Produit;
// Assurez-vous d'avoir importé le modèle User
use App\Mail\ConfirmationCommandeMail;
use Illuminate\Support\Facades\Mail;
use App\Models\Utilisateur;

class CommanddeController extends Controller
{
    public function confirmerCommande(Request $request)
    {
        try {
            if (session()->has('loginId')) {
                $userId = session('loginId');
                \Log::info('Utilisateur ID : ' . $userId);

                $commande = Commandde::create([
                    'utilisateur_id' => $userId,
                    'adresse_livraison' => $request->input('adresse_livraison'),
                    'telephone' => $request->input('telephone'),
                    'mode_paiement' => $request->input('mode_paiement'),
                    'methode_livraison' => $request->input('mode_livraison')
                ]);

                $panier = Paniers::where('utilisateur_id', $userId)->get();

                foreach ($panier as $item) {
                    $produit = Produit::find($item->produit_id);

                    if (!$produit) {
                        \Log::error('Produit introuvable ID : ' . $item->produit_id);
                        return response()->json(['error' => 'Produit introuvable.'], 404);
                    }

                    if ($produit->quantite < $item->quantite) {
                        \Log::error('Quantité insuffisante pour le produit ' . $produit->nom . '. Quantité en stock : ' . $produit->quantite . ', Quantité demandée : ' . $item->quantite);
                        return response()->json(['error' => 'Quantité insuffisante pour le produit ' . $produit->nom . '.'], 400);
                    }

                    $totalProduit = $item->quantite * $produit->prix;

                    DetailsCommande::create([
                        'commandde_id' => $commande->id,
                        'produit_id' => $item->produit_id,
                        'quantite' => $item->quantite,
                        'prix_unitaire' => $produit->prix,
                        'total' => $totalProduit
                    ]);

                    $produit->quantite -= $item->quantite;
                    $produit->save();
                }

                Paniers::where('utilisateur_id', $userId)->delete();

                // Récupérer l'utilisateur à partir de la session
                $user = Utilisateur::find($userId);
                $details_commande = DetailsCommande::where('commandde_id', $commande->id)->get();
                if ($user) {
                    // Envoi de l'email de confirmation
                    Mail::to($user->adressemail)->send(new ConfirmationCommandeMail($commande, $user, $details_commande));
                } else {
                    \Log::error('Utilisateur introuvable ID : ' . $userId);
                    return response()->json(['error' => 'Utilisateur introuvable.'], 404);
                }

                return response()->json(['success' => 'Votre commande a été confirmée avec succès.']);
            } else {
                return redirect()->route('connexion')->with(['message' => 'Vous devez être connecté pour confirmer une commande.']);
            }
            Paniers::where('utilisateur_id', $userId)->delete();

        // Rediriger vers une route spécifique
        return redirect()->route('/masterr');
        } catch (\Exception $e) {
            \Log::error('Une erreur s\'est produite : ' . $e->getMessage());
            return response()->json(['error' => 'Une erreur s\'est produite lors de la confirmation de la commande.'], 500);
        }
    }
    public function indexc()
    {
        // Récupérer toutes les commandes avec leurs détails et l'utilisateur associé
        $commandes = Commandde::with(['utilisateur', 'detailsCommande.produit'])->get();
        return view('layoutsadmin.listeCommande', compact('commandes'));
    }
}
