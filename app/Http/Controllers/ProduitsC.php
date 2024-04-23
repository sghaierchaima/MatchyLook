<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;
use App\Models\SousCategories;
use App\Models\Categories;
use Carbon\Carbon;

class ProduitsC extends Controller
{
    public function index()
    { 
        // Récupérer tous les produits
        $dataa = Produit::get();
    
        // Passer les données des produits et des sous-catégories à la vue
        return view('layoutsadmin.produits', compact('dataa'));
    } 
    public function indexe()
    {$categorieHommeId = Categories::where('nom', 'homme')->value('id');

        // Récupérer les sous-catégories qui ont comme catégorie "homme"
        $sousCategoriesHomme = SousCategories::where('categorie_id', $categorieHommeId)->get();
    
        $data = Produit::join('sous_categories', 'produits.sous_categorie_id', '=', 'sous_categories.id')
                    ->join('categories', 'sous_categories.categorie_id', '=', 'categories.id')
                    ->where('sous_categories.nom', 'pantalon')
                    ->where('categories.nom', 'homme')
                    ->select('produits.*') 
                    ->get();
        return view('frontend.pantalon', compact('data', 'sousCategoriesHomme'));
    } 

    public function ajouterProduit()
    {
        $scategories = SousCategories::all();
        return view('layoutsadmin.ajouterproduits', compact('scategories'));
    }

    public function saveProduit(Request $req)
    {
        // Validez les données du formulaire
        $req->validate([
            'categorie_id' => 'required',
            'nom' => 'required',
            'prix' => 'required',
            'description' => 'required',
            'couleur' => 'required',
            'quantite' => 'required|integer',
            'taille' => 'required',
            'image' => 'required|image', // Assurez-vous que l'image est valide
        ]);

        // Créez une nouvelle instance de Produit
        $produit = new Produit();

        // Assignez les données du formulaire aux propriétés du produit
        $produit->sous_categorie_id = $req->categorie_id;
        $produit->nom = $req->nom;
        $produit->prix = $req->prix;
        $produit->description = $req->description;
        $produit->couleur = $req->couleur;
        $produit->quantite = $req->quantite;
        $produit->taille = $req->taille;

        // Vérifiez et enregistrez l'image
        if ($req->hasFile('image')) {
            $imageName = Carbon::now()->timestamp . '.' . $req->image->extension();
            $req->image->move(public_path('assets/images'), $imageName);
            $produit->image = $imageName;
        }

        // Sauvegardez le produit dans la base de données
        $produit->save();

        // Redirigez l'utilisateur avec un message de succès
        return redirect()->back()->with('success', 'Produit ajouté avec succès');
    }
    public function lunettes()
    {$categorieHommeId = Categories::where('nom', 'Accessoires')->value('id');

        // Récupérer les sous-catégories qui ont comme catégorie "homme"
        $sousCategoriesHomme = SousCategories::where('categorie_id', $categorieHommeId)->get();
    
        $data = Produit::join('sous_categories', 'produits.sous_categorie_id', '=', 'sous_categories.id')
                    ->join('categories', 'sous_categories.categorie_id', '=', 'categories.id')
                    ->where('sous_categories.nom', 'lunettes')
                    ->where('categories.nom', 'Accessoires')
                    ->select('produits.*') 
                    ->get();
        return view('frontend.lunettes', compact('data', 'sousCategoriesHomme'));
    } 
    public function casquettes()
    {$categorieHommeId = Categories::where('nom', 'Accessoires')->value('id');

        // Récupérer les sous-catégories qui ont comme catégorie "homme"
        $sousCategoriesHomme = SousCategories::where('categorie_id', $categorieHommeId)->get();
    
        $data = Produit::join('sous_categories', 'produits.sous_categorie_id', '=', 'sous_categories.id')
                    ->join('categories', 'sous_categories.categorie_id', '=', 'categories.id')
                    ->where('sous_categories.nom', 'casquettes')
                    ->where('categories.nom', 'Accessoires')
                    ->select('produits.*') 
                    ->get();
        return view('frontend.casquettes', compact('data', 'sousCategoriesHomme'));
    }
    public function chapeau()
    {$categorieHommeId = Categories::where('nom', 'Accessoires')->value('id');

        // Récupérer les sous-catégories qui ont comme catégorie "homme"
        $sousCategoriesHomme = SousCategories::where('categorie_id', $categorieHommeId)->get();
    
        $data = Produit::join('sous_categories', 'produits.sous_categorie_id', '=', 'sous_categories.id')
                    ->join('categories', 'sous_categories.categorie_id', '=', 'categories.id')
                    ->where('sous_categories.nom', 'chapeau')
                    ->where('categories.nom', 'Accessoires')
                    ->select('produits.*') 
                    ->get();
        return view('frontend.casquettes', compact('data', 'sousCategoriesHomme'));
    } 
}
