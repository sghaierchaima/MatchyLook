<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;
use Illuminate\Support\Facades\Session; 
use Illuminate\Support\Facades\Auth;
use App\Models\Utilisateur;
use App\Models\Paniers; 
class PanierC extends Controller
{
    //
   /*   vraiii public function ajouterAuPanier(Request $request, Produit $produit)
    {
        // Récupérer les données du formulaire (par exemple, la quantité)
        $quantite = $request->input('quantite', 1); // Par défaut, la quantité est 1 si elle n'est pas fournie dans la requête

        // Ajouter le produit au panier
        $panier = $request->session()->get('panier', []);

        if (array_key_exists($produit->id, $panier)) {
            // Si le produit est déjà dans le panier, augmenter la quantité
            $panier[$produit->id]['quantite'] += $quantite;
        } else {
            // Sinon, ajouter le produit au panier avec la quantité spécifiée
            $panier[$produit->id] = [
                'produit' => $produit,
                'quantite' => $quantite
            ];
        }

        // Mettre à jour le panier dans la session
        $request->session()->put('panier', $panier);

        // Rediriger vers la page précédente ou une autre page
        return redirect()->back()->with('success', 'Le produit a été ajouté au panier.');
    } */
    

    

    

   /* mregla public function ajouterAuPanier(Request $request, $produitId)
    {
        try {
            // Journaliser le début de la méthode
            \Log::info('Début de la méthode ajouterAuPanier');
    
            // Récupérer les données envoyées via AJAX
            $quantite = $request->input('quantite', 1); // Par défaut, la quantité est 1 si elle n'est pas fournie dans la requête
    
            // Récupérer l'ID de l'utilisateur à partir de la session ou de toute autre méthode que vous utilisez pour identifier l'utilisateur
            $userId = session('loginId'); // Assurez-vous que cela récupère correctement l'ID de l'utilisateur connecté
            \Log::info('Utilisateur ID : ' . $userId);
    
            // Journaliser les valeurs des variables
            \Log::info('Produit ID : ' . $produitId);
            \Log::info('Quantité : ' . $quantite);
    
            // Créer une nouvelle entrée dans la table "Panier"
            Paniers::create([
                'produit_id' => $produitId,
                'utilisateur_id' => $userId,
                'quantite' => $quantite
            ]);
    
            // Journaliser la fin de la méthode
            \Log::info('Fin de la méthode ajouterAuPanier');
    
            // Retourner une réponse JSON pour indiquer que le produit a été ajouté au panier et enregistré dans la base de données
            return response()->json(['message' => 'Le produit a été ajouté au panier et enregistré dans la base de données.']);
        } catch (\Exception $e) {
            // Journaliser l'exception
            \Log::error('Une erreur s\'est produite : ' . $e->getMessage());
            // Retourner une réponse d'erreur
            return response()->json(['error' => 'Une erreur s\'est produite.'], 500);
        }
    } */
    
    public function ajouterAuPanier(Request $request, $produitId)
    {
        try {
            // Journaliser le début de la méthode
            \Log::info('Début de la méthode ajouterAuPanier');
    
            // Récupérer les données envoyées via AJAX
            $quantite = $request->input('quantite', 1); // Par défaut, la quantité est 1 si elle n'est pas fournie dans la requête
    
            // Vérifier si l'utilisateur est connecté en vérifiant si la clé 'loginId' est définie dans la session
            if (session()->has('loginId')) {
                // Récupérer l'ID de l'utilisateur connecté à partir de la session
                $userId = session('loginId');
                \Log::info('Utilisateur ID : ' . $userId);
    
                // Créer une nouvelle entrée dans la table "Panier"
                Paniers::create([
                    'produit_id' => $produitId,
                    'utilisateur_id' => $userId,
                    'quantite' => $quantite
                ]);
            } else {
                // Récupérer le panier de la session
                $panier = session()->get('panier', []);
    
                // Ajouter le produit au panier en session
                $panier[$produitId] = [
                    'produit_id' => $produitId,
                    'quantite' => $quantite
                ];
    
                // Enregistrer le panier dans la session
                session()->put('panier', $panier);
            }
    
            // Journaliser la fin de la méthode
            \Log::info('Fin de la méthode ajouterAuPanier');
    
            // Retourner une réponse JSON pour indiquer que le produit a été ajouté au panier
            return response()->json(['message' => 'Le produit a été ajouté au panier.']);
        } catch (\Exception $e) {
            // Journaliser l'exception
            \Log::error('Une erreur s\'est produite : ' . $e->getMessage());
            // Retourner une réponse d'erreur
            return response()->json(['error' => 'Une erreur s\'est produite.'], 500);
        }
    }
    

   /*  public function afficherPanier()
    {
        $panier = session()->get('panier', []);
        $total = $this->calculerTotal($panier);
        
       
        return view('frontend.panier', compact('panier', 'total', )); 
    } */
    public function afficherPanier()
    {
        // Récupérer l'ID de l'utilisateur connecté
        $userId = session('loginId');
    
        // Récupérer le panier de l'utilisateur depuis la base de données
        $panier = Paniers::where('utilisateur_id', $userId)->get();
    
        // Calculer le total du panier
        $total = 0;
        foreach ($panier as $item) {
            $total += $item->quantite * $item->produit->prix;
        }
    
        // Retourner la vue du panier avec les données nécessaires
        return view('frontend.panier', compact('panier', 'total'));
    }
    private function calculerTotal($panier)
    {
        $total = 0;

        foreach ($panier as $item) {
            $total += $item['quantite'] * $item['produit']->prix;
        }

        return $total;
    }
   /*  public function retirerDuPanier($id) {
        // Vérification si le produit est présent dans le panier en session
        if(Session::has('panier')) {
            // Retirer le produit du panier en session
            Session::forget("panier.$id");
            
            // Rediriger vers la page du panier avec un message de succès
            return redirect()->route('panier')->with('success', 'Produit retiré du panier avec succès.');
        }
        
        // Si le panier est vide ou si le produit n'est pas trouvé dans le panier, rediriger avec un message d'erreur
        return redirect()->route('panier')->with('error', 'Le produit que vous essayez de retirer du panier n\'existe pas.');
    } */
    public function retirerDuPanier($id) {
        try {
            // Recherche de l'entrée dans la table Panier avec l'ID du produit et l'ID de l'utilisateur connecté
            $userId = session('loginId');
            $panier = Paniers::where('produit_id', $id)->where('utilisateur_id', $userId)->first();
    
            // Vérifier si une entrée correspondante a été trouvée
            if ($panier) {
                // Supprimer l'entrée du panier
                $panier->delete();
            }
    
            // Rediriger vers la page du panier avec un message de succès
            return redirect()->route('panier')->with('success', 'Produit retiré du panier avec succès.');
        } catch (\Exception $e) {
            // Journaliser l'erreur
            \Log::error('Une erreur s\'est produite lors de la suppression du produit du panier : ' . $e->getMessage());
            
            // Rediriger vers la page du panier avec un message d'erreur
            return redirect()->route('panier')->with('error', 'Une erreur s\'est produite lors de la suppression du produit du panier.');
        }
    }
}

