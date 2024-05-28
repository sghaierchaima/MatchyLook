<?php

namespace App\Http\Controllers;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use App\Models\Produit;
use Illuminate\Support\Facades\Session; 
use Illuminate\Support\Facades\Auth;
use App\Models\Utilisateur;
use App\Models\Paniers; 
class PanierC extends Controller
{
   
    

    

    
 /* correct   public function ajouterAuPanier(Request $request, $produitId)
{
    try {
        // Vérifier si l'utilisateur est connecté en vérifiant si la clé 'loginId' est définie dans la session
        if (session()->has('loginId')) {
            // Utilisateur connecté, récupérer l'ID de l'utilisateur connecté à partir de la session
            $userId = session('loginId');
            \Log::info('Utilisateur ID : ' . $userId);

            // Créer une nouvelle entrée dans la table "Panier"
            Paniers::create([
                'produit_id' => $produitId,
                'utilisateur_id' => $userId,
                'quantite' => $request->input('quantite', 1) // Par défaut, la quantité est 1 si elle n'est pas fournie dans la requête
            ]);

            // Retourner une réponse JSON pour indiquer que le produit a été ajouté au panier
            return response()->json(['message' => 'Le produit a été ajouté au panier.']);
        } else {
            // Utilisateur non connecté, rediriger vers la page de connexion

           return redirect()->route('connexion')->with(['message'=>'Vous devez être connecté pour ajouter un produit au panier.']);
        }
    } catch (\Exception $e) {
        // Journaliser l'exception
        \Log::error('Une erreur s\'est produite : ' . $e->getMessage());
        // Retourner une réponse d'erreur
        return response()->json(['error' => 'Une erreur s\'est produite.'], 500);
    }
} */
/*  public function ajouterAuPanier(Request $request, $produitId)
{
    try {
        // Récupérer l'ID de l'utilisateur connecté
        $userId = session('loginId');

        // Vérifier si le produit existe déjà dans le panier de l'utilisateur
        $produitDansPanier = Paniers::where('produit_id', $produitId)
                                    ->where('utilisateur_id', $userId)
                                    ->first();

        if ($produitDansPanier) {
            // Le produit existe déjà dans le panier, mettre à jour la quantité
            $produitDansPanier->increment('quantite', $request->input('quantite', 1));
        } else {
            // Le produit n'existe pas dans le panier, créer une nouvelle entrée
            Paniers::create([
                'produit_id' => $produitId,
                'utilisateur_id' => $userId,
                'quantite' => $request->input('quantite', 1)
            ]);
        }

        // Retourner une réponse JSON pour indiquer que le produit a été ajouté ou mis à jour dans le panier
        return response()->json(['message' => 'Le produit a été ajouté ou mis à jour dans le panier.']);
    } catch (\Exception $e) {
        // Journaliser l'exception
        \Log::error('Une erreur s\'est produite : ' . $e->getMessage());
        // Retourner une réponse d'erreur
        return response()->json(['error' => 'Une erreur s\'est produite.'], 500);
    }
} */
/* public function ajouterAuPanier(Request $request, $produitId)
{
    try {
        $userId = session('loginId');

        $produitDansPanier = Paniers::where('produit_id', $produitId)
                                    ->where('utilisateur_id', $userId)
                                    ->first();

        if ($produitDansPanier) {
            $produitDansPanier->increment('quantite', $request->input('quantite', 1));
        } else {
            Paniers::create([
                'produit_id' => $produitId,
                'utilisateur_id' => $userId,
                'quantite' => $request->input('quantite', 1)
            ]);
        }

        return response()->json(['message' => 'Le produit a été ajouté ou mis à jour dans le panier.']);
    } catch (\Exception $e) {
        \Log::error('Une erreur s\'est produite : ' . $e->getMessage());
        return response()->json(['error' => 'Une erreur s\'est produite.'], 500);
    }
} */
/* public function ajouterAuPanier(Request $request, $produitId)
{
    try {
        $userId = session('loginId');

        // Récupérer le produit depuis la base de données
        $produit = Produit::find($produitId);

        if (!$produit) {
            return response()->json(['error' => 'Produit introuvable.'], 404);
        }

        $quantiteChoisie = $request->input('quantite', 1);

        // Vérifier si la quantité choisie dépasse la quantité disponible
        if ($quantiteChoisie > $produit->quantite) {
            return response()->json(['message' => 'Quantité de produit insuffisante.'], 400);
        }

        $produitDansPanier = Paniers::where('produit_id', $produitId)
                                    ->where('utilisateur_id', $userId)
                                    ->first();

        if ($produitDansPanier) {
            $produitDansPanier->increment('quantite', $quantiteChoisie);
        } else {
            Paniers::create([
                'produit_id' => $produitId,
                'utilisateur_id' => $userId,
                'quantite' => $quantiteChoisie
            ]);
        }

        return response()->json(['message' => 'Le produit a été ajouté ou mis à jour dans le panier.']);
    } catch (\Exception $e) {
        \Log::error('Une erreur s\'est produite : ' . $e->getMessage());
        return response()->json(['error' => 'Une erreur s\'est produite.'], 500);
    }
} */
public function ajouterAuPanier(Request $request, $produitId)
{
    try {
        $userId = session('loginId');

        // Récupérer le produit depuis la base de données
        $produit = Produit::find($produitId);

        if (!$produit) {
            return response()->json(['error' => 'Produit introuvable.'], 404);
        }

        $quantiteChoisie = $request->input('quantite', 1);

        // Vérifier si la quantité choisie dépasse la quantité disponible
        if ($quantiteChoisie > $produit->quantite) {
            return response()->json(['error' => 'Quantité de produit insuffisante.'], 400);
        }

        $produitDansPanier = Paniers::where('produit_id', $produitId)
                                    ->where('utilisateur_id', $userId)
                                    ->first();

        if ($produitDansPanier) {
            $produitDansPanier->increment('quantite', $quantiteChoisie);
        } else {
            Paniers::create([
                'produit_id' => $produitId,
                'utilisateur_id' => $userId,
                'quantite' => $quantiteChoisie
            ]);
        }

        // Calculer les totaux actuels du panier
        $panier = Paniers::where('utilisateur_id', $userId)->get();
        $cartItemCount = $panier->sum('quantite');
        $cartTotalPrice = $panier->sum(function ($item) {
            return $item->produit->prix * $item->quantite;
        });
        $cartTotalTTC = $cartTotalPrice * 1.18; // Supposons que le taux de TVA est de 18%

        return response()->json([
            'message' => 'Le produit a été ajouté ou mis à jour dans le panier.',
            'produitImage' => asset('assets/images/' . $produit->image),
            'produitNom' => $produit->nom,
            'produitTaille' => $produit->taille,
            'produitCouleur' => $produit->couleur,
            'cartItemCount' => $cartItemCount,
            'cartTotalPrice' => number_format($cartTotalPrice, 2, ',', ' '),
           
        ]);
    } catch (\Exception $e) {
        \Log::error('Une erreur s\'est produite : ' . $e->getMessage());
        return response()->json(['error' => 'Une erreur s\'est produite.'], 500);
    }
}

public function modifierQuantite(Request $request, $produitId)
{
    try {
        // Vérifier si l'utilisateur est connecté
        if (session()->has('loginId')) {
            // Récupérer l'ID de l'utilisateur connecté
            $userId = session('loginId');

            // Vérifier si le produit existe dans le panier de l'utilisateur
            $panier = Paniers::where('utilisateur_id', $userId)
                ->where('produit_id', $produitId)
                ->first();

            if ($panier) {
                // Mettre à jour la quantité du produit dans le panier
                $panier->quantite = $request->input('quantite', 1);
                $panier->save();

                return redirect()->back()->with('success', 'La quantité du produit a été mise à jour avec succès.');
            } else {
                return redirect()->back()->with('error', 'Le produit sélectionné n\'existe pas dans votre panier.');
            }
        } else {
            return redirect()->route('connexion')->with('message', 'Vous devez être connecté pour modifier la quantité des produits dans votre panier.');
        }
    } catch (\Exception $e) {
        \Log::error('Une erreur s\'est produite lors de la modification de la quantité du produit : ' . $e->getMessage());
        return redirect()->back()->with('error', 'Une erreur s\'est produite lors de la modification de la quantité du produit.');
    }
} 
/* public function ajouterAuPanier(Request $request, $produitId)
{
    try {
        // Récupérer l'ID de l'utilisateur connecté
        $userId = session('loginId');

        // Récupérer le produit et la quantité demandée
        $produit = Produit::find($produitId);
        $quantiteDemandee = $request->input('quantite', 1);

        if (!$produit) {
            return response()->json(['error' => 'Produit non trouvé.'], 404);
        }

        // Vérifier la disponibilité du produit
        if ($produit->quantite < $quantiteDemandee) {
            return response()->json(['error' => 'Quantité insuffisante en stock.'], 400);
        }

        // Vérifier si le produit existe déjà dans le panier de l'utilisateur
        $produitDansPanier = Paniers::where('produit_id', $produitId)
                                    ->where('utilisateur_id', $userId)
                                    ->first();

        if ($produitDansPanier) {
            // Le produit existe déjà dans le panier, mettre à jour la quantité
            $produitDansPanier->increment('quantite', $quantiteDemandee);
        } else {
            // Le produit n'existe pas dans le panier, créer une nouvelle entrée
            Paniers::create([
                'produit_id' => $produitId,
                'utilisateur_id' => $userId,
                'quantite' => $quantiteDemandee
            ]);
        }

        // Mettre à jour la quantité du produit en stock
        $produit->decrement('quantite', $quantiteDemandee);

        // Retourner une réponse JSON pour indiquer que le produit a été ajouté ou mis à jour dans le panier
        return response()->json(['message' => 'Le produit a été ajouté ou mis à jour dans le panier.']);
    } catch (\Exception $e) {
        // Journaliser l'exception
        \Log::error('Une erreur s\'est produite : ' . $e->getMessage());
        // Retourner une réponse d'erreur
        return response()->json(['error' => 'Une erreur s\'est produite.'], 500);
    }
}
public function modifierQuantite(Request $request, $produitId)
{
    try {
        // Vérifier si l'utilisateur est connecté
        if (session()->has('loginId')) {
            // Récupérer l'ID de l'utilisateur connecté
            $userId = session('loginId');

            // Récupérer le produit et la nouvelle quantité
            $produit = Produit::find($produitId);
            $nouvelleQuantite = $request->input('quantite', 1);

            if (!$produit) {
                return redirect()->back()->with('error', 'Produit non trouvé.');
            }

            // Vérifier la disponibilité du produit
            $panier = Paniers::where('utilisateur_id', $userId)
                ->where('produit_id', $produitId)
                ->first();

            if ($panier) {
                $quantiteActuelleDansPanier = $panier->quantite;
                $quantiteDisponible = $produit->quantite + $quantiteActuelleDansPanier;

                if ($nouvelleQuantite > $quantiteDisponible) {
                    return redirect()->back()->with('error', 'Quantité insuffisante en stock.');
                }

                // Mettre à jour la quantité du produit dans le panier
                $panier->quantite = $nouvelleQuantite;
                $panier->save();

                // Mettre à jour la quantité du produit en stock
                $produit->quantite = $quantiteDisponible - $nouvelleQuantite;
                $produit->save();

                return redirect()->back()->with('success', 'La quantité du produit a été mise à jour avec succès.');
            } else {
                return redirect()->back()->with('error', 'Le produit sélectionné n\'existe pas dans votre panier.');
            }
        } else {
            return redirect()->route('connexion')->with('message', 'Vous devez être connecté pour modifier la quantité des produits dans votre panier.');
        }
    } catch (\Exception $e) {
        \Log::error('Une erreur s\'est produite lors de la modification de la quantité du produit : ' . $e->getMessage());
        return redirect()->back()->with('error', 'Une erreur s\'est produite lors de la modification de la quantité du produit.');
    }
} */

  
    public function afficherPanier()
    {
        // Récupérer l'ID de l'utilisateur connecté
        $userId = session('loginId');
    
        // Récupérer le panier de l'utilisateur depuis la base de données
        $panier = Paniers::where('utilisateur_id', $userId)->paginate(3);;
    
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


   public function  passerCommande(){
    $nomUtilisateur = session('nom');
    $prenom = session('prenom');
    $emailUtilisateur = session('adressemail');
    $panier = Paniers::where('utilisateur_id', session('loginId'))->get();

    $total = 0;
    foreach ($panier as $item) {
        $total += $item->quantite * $item->produit->prix;
    }
    foreach ($panier as $item) {
        
        // Accès au nom du produit
        $nomProduit = $item->produit->nom;
        
    }
// Supposons que vous avez une méthode pour calculer le total

    // Afficher la vue de passage de commande avec les données nécessaires
    return view('frontend.commande', compact('nomUtilisateur', 'prenom','emailUtilisateur', 'panier','total'));
}
}

