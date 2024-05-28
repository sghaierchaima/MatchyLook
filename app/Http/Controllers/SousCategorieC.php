<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SousCategories;
use App\Models\Categories;

use App\Models\Produit;

use App\Models\Paniers;
class SousCategorieC extends Controller
{
    //
    public function index(){
        $data=SousCategories::get();
        //return $data;
        return view('layoutsadmin.souscategories',compact('data'));
    } 
   /*  public function ajoutersousCategory(){
        return view('layoutsadmin.ajouterSC');
    } */
    public function ajoutersousCategory()
{
    $categories = Categories::all();
    return view('layoutsadmin.ajouterSC', compact('categories'));
}
   /*  public function savesousCategory(Request $req){
        $req->validate([
            'nom'=>'required'
            
        ]);
       // dd($req->all());
        $nom=$req->nom;
        
        $c=new Categories();
        $c->nom=$nom;
        $c->save();
        return redirect()->back()->with('succès','Catégories ajoutées avec succès');

    } */
    public function savesousCategory(Request $req)
{
    $req->validate([
        'categorie_id' => 'required',
        'nom' => 'required'
    ]);

    $sousCategory = new SousCategories();
    $sousCategory->categorie_id = $req->categorie_id;
    $sousCategory->nom = $req->nom;
    $sousCategory->save();

    return redirect()->back()->with('succès','Sous-catégorie ajoutée avec succès');
}

public function modifierSousCategorie($id)
{
    $sousCategorie = SousCategories::findOrFail($id);
    $categories = Categories::all();
    return view('layoutsadmin.modifierSc', compact('sousCategorie','categories'));
}

public function updateSCategory(Request $req)
{
    $req->validate([
        'nom' => 'required',
        'categorie_id' => 'required', // Ajoutez une validation pour la catégorie
    ]);

    $id = $req->id;
    $nom = $req->nom;
    $categorie_id = $req->categorie_id;

    SousCategories::where('id', $id)->update([
        'nom' => $nom,
        'categorie_id' => $categorie_id, // Mettez à jour la catégorie également
    ]);

    return redirect()->back()->with('succès', 'Sous-catégorie modifiée avec succès');
}
public function deleteSousCategory($id) {
    SousCategories::where('id', $id)->delete();
    return redirect()->back()->with('succès', 'Sous-catégorie supprimée avec succès');
}


public function show($id)
{
    // Récupérer la sous-catégorie spécifique
    $sousCategorie = SousCategories::findOrFail($id);

    // Récupérer le nom de la sous-catégorie
    $nomSousCategorie = $sousCategorie->nom;

    // Récupérer les produits associés à cette sous-catégorie
    $produits = $sousCategorie->produits;

    // Récupérer toutes les sous-catégories (peut être utile pour afficher les liens de navigation)
    $toutesLesSousCategories = SousCategories::all();

    // Retourner la vue avec les produits, le nom de la sous-catégorie et toutes les sous-catégories en utilisant compact
    return view('frontend.souscategories', compact('produits', 'nomSousCategorie', 'toutesLesSousCategories'));
}







public function indexe()
{
    
    // Récupérer la liste des sous-catégories de la catégorie "homme" depuis la base de données
    $sousCategories = SousCategories::whereHas('category', function ($query) {
        $query->where('nom', 'homme');
    })->get();

    // Récupérer les produits associés à chaque sous-catégorie
    foreach ($sousCategories as $sousCategorie) {
        $sousCategorie->produits = $sousCategorie->produits()->get();
    }

    // Passer les données récupérées à la vue correspondante
    return view('frontend.hommen', compact('sousCategories'));
}






 // Assurez-vous d'importer le modèle Produit

 public function homme()
 {
    
     // Récupérer les sous-catégories qui ont comme catégorie "homme"
     $sousCategoriesHomme = SousCategories::whereHas('category', function ($query) {
         $query->where('nom', 'homme');
     })->get();
     $panier = session()->get('panier', []);
     // Initialiser un tableau pour stocker les produits
     $produits = [];
 
     // Récupérer aléatoirement un produit de chaque sous-catégorie
     foreach ($sousCategoriesHomme as $sousCategorie) {
         $produitAleatoire = $sousCategorie->produits()->inRandomOrder()->first();
         if ($produitAleatoire) {
             $produits[] = $produitAleatoire;
         }
     }
 
     // Récupérer l'ID de la sous-catégorie active (vous devez définir cette variable)
     $activeSubcategoryId = request()->route('id'); // Exemple: Remplacez 1 par l'ID réel de la sous-catégorie active
     $userId = session('loginId');
     $panier = Paniers::where('utilisateur_id', $userId)->get();
     // Retourner les données vers la vue avec l'ID de la sous-catégorie active
     return view('frontend.accueil', ['sousCategories' => $sousCategoriesHomme, 'produits' => $produits,'activeSubcategoryId' => $activeSubcategoryId
     ,'panier'=>$panier]);
 }
 public function femme()
 {
     // Récupérer les sous-catégories qui ont comme catégorie "homme"
     $sousCategoriesFemme = SousCategories::whereHas('category', function ($query) {
         $query->where('nom', 'femme');
     })->get();
     $userId = session('loginId');
     $panier = Paniers::where('utilisateur_id', $userId)->get();
     // Initialiser un tableau pour stocker les produits
     $produits = [];
 
     // Récupérer aléatoirement un produit de chaque sous-catégorie
     foreach ($sousCategoriesFemme as $sousCategorie) {
         $produitAleatoire = $sousCategorie->produits()->inRandomOrder()->first();
         if ($produitAleatoire) {
             $produits[] = $produitAleatoire;
         }
     }
 
     // Récupérer l'ID de la sous-catégorie active (vous devez définir cette variable)
     $activeSubcategoryId = request()->route('id'); // Exemple: Remplacez 1 par l'ID réel de la sous-catégorie active
 
     // Retourner les données vers la vue avec l'ID de la sous-catégorie active
     return view('frontend.accueilF', ['sousCategories' => $sousCategoriesFemme, 'produits' => $produits,'activeSubcategoryId' => $activeSubcategoryId
     ,'panier'=>$panier]);
 }





 public function produitBySousCategories($id)
 {
     // Récupérer la sous-catégorie spécifique en fonction de l'ID
     $sousCategorieActive = SousCategories::findOrFail($id);
 
     // Récupérer toutes les sous-catégories de la catégorie "homme"
     $sousCategoriesHomme = SousCategories::whereHas('category', function ($query) {
         $query->where('nom', 'homme');
     })->get();
 
     // Logique pour récupérer les produits appartenant à une sous-catégorie spécifique
     $produits = Produit::with('avis')->where('sous_categorie_id', $id)->get();
 
     // Passer les données à la vue, y compris la sous-catégorie active
     return view('frontend.produitBySousCategories', [
         'sousCategories' => $sousCategoriesHomme,
         'produits' => $produits,
         'activeSubcategoryId' => $sousCategorieActive->id
     ]);
 }
 

 public function produitBySousCategoriesf($id)
 {
     // Récupérer la sous-catégorie spécifique en fonction de l'ID
     $sousCategorieActive = SousCategories::findOrFail($id);
 
     // Récupérer toutes les sous-catégories de la catégorie "homme"
     $sousCategoriesHomme = SousCategories::whereHas('category', function ($query) {
         $query->where('nom', 'femme');
     })->get();
 
     // Logique pour récupérer les produits appartenant à une sous-catégorie spécifique
     $produits = Produit::with('avis')->where('sous_categorie_id', $id)->get();
 
     // Passer les données à la vue, y compris la sous-catégorie active
     return view('frontend.produitBySousCategoriesf', [
         'sousCategories' => $sousCategoriesHomme,
         'produits' => $produits,
         'activeSubcategoryId' => $sousCategorieActive->id
     ]);
 }
 

 public function accessoires()
 {
     // Récupérer les sous-catégories qui ont comme catégorie "homme"
     $sousCategoriesaccesoires = SousCategories::whereHas('category', function ($query) {
         $query->where('nom', 'accessoires');
     })->get();
     $userId = session('loginId');
     $panier = Paniers::where('utilisateur_id', $userId)->get();
     // Initialiser un tableau pour stocker les produits
     $produits = [];
 
     // Récupérer aléatoirement un produit de chaque sous-catégorie
     foreach ($sousCategoriesaccesoires as $sousCategorie) {
         $produitAleatoire = $sousCategorie->produits()->inRandomOrder()->first();
         if ($produitAleatoire) {
             $produits[] = $produitAleatoire;
         }
     }
 
     // Récupérer l'ID de la sous-catégorie active (vous devez définir cette variable)
     $activeSubcategoryId = request()->route('id'); // Exemple: Remplacez 1 par l'ID réel de la sous-catégorie active
 
     // Retourner les données vers la vue avec l'ID de la sous-catégorie active
     return view('frontend.accueilA', ['sousCategories' => $sousCategoriesaccesoires, 'produits' => $produits,'activeSubcategoryId' => $activeSubcategoryId
     ,'panier'=>$panier]);
 }

 public function produitBySousCategoriesa($id)
 {
     // Récupérer la sous-catégorie spécifique en fonction de l'ID
     $sousCategorieActive = SousCategories::findOrFail($id);
 
     // Récupérer toutes les sous-catégories de la catégorie "homme"
     $sousCategoriesAccessoires = SousCategories::whereHas('category', function ($query) {
         $query->where('nom', 'accessoires');
     })->get();
 
     // Logique pour récupérer les produits appartenant à une sous-catégorie spécifique
     $produits = Produit::with('avis')->where('sous_categorie_id', $id)->get();
 
     // Passer les données à la vue, y compris la sous-catégorie active
     return view('frontend.produitBySousCategoriesa', [
         'sousCategories' => $sousCategoriesAccessoires,
         'produits' => $produits,
         'activeSubcategoryId' => $sousCategorieActive->id
     ]);
 }
 public function showw($id)
 {
     $produit = Produit::with('avis.utilisateur')->findOrFail($id);
     return view('frontend.accueil', compact('produit'));
 }
}
