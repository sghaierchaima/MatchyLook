<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;
use App\Models\SousCategories;
use App\Models\Categories;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session; 
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
        $sousCategories = SousCategories::whereHas('category', function($query) {
                        $query->where('nom', 'homme');
                    })->get();
        return view('frontend.pantalon', compact('data', 'sousCategoriesHomme','sousCategories'));
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
    public function modifierproduit($id){
        $data = Produit::where('id', '=', $id)->first();
        $sousCategories = SousCategories::all(); // Assurez-vous que cette ligne récupère toutes les sous-catégories
        $sousCategorie = SousCategories::findOrFail($data->sous_categorie_id);
        $categories = Categories::all();
        return view('layoutsadmin.modifierP', compact('data', 'categories', 'sousCategories', 'sousCategorie'));
    }
    public function updateproduits(Request $req)
{
    $req->validate([
        'nom' => 'required',
        'description' => 'required',
        'taille' => 'required',
        
        'sous_categorie_id' => 'required', // Ajoutez une validation pour la catégorie
    ]);

    $id = $req->id;
    $nom = $req->nom;
    $description = $req->description;
    $taille = $req->taille;
    $quantite = $req->quantite;
    $sous_categorie_id = $req->sous_categorie_id;

    Produit::where('id', $id)->update([
        'nom' => $nom,
        'description' => $description,
        'taille' => $taille,
        'quantite' => $quantite,
        'sous_categorie_id' => $sous_categorie_id, // Mettez à jour la catégorie également
    ]);

    return redirect()->back()->with('succès', 'Produit modifiée avec succès');
}
    public function updateProduit(Request $req){
        $req->validate([
            'nom'=>'required',
            'description'=>'required',
            'couleur'=>'required',
            'prix'=>'required',
            'sous_categorie_id'=>'required'
        ]);
       
        // Récupérer les données du formulaire
        $id = $req->id;
        $nom = $req->nom;
        $description = $req->description;
        $couleur = $req->couleur;
        $prix = $req->prix;
        $sous_categorie_id = $req->sous_categorie_id;
    
        // Mettre à jour les autres champs du produit
        Produit::where('id', $id)->update([
            'nom' => $nom,
            'description' => $description,
            'couleur' => $couleur,
            'prix' => $prix,
            'sous_categorie_id' => $sous_categorie_id
        ]);
    
        return redirect()->back()->with('succès','Produit modifié avec succès');
    }
    public function pantalonfemme()
    {$categorieHommeId = Categories::where('nom', 'femme')->value('id');

        // Récupérer les sous-catégories qui ont comme catégorie "homme"
        $sousCategoriesHomme = SousCategories::where('categorie_id', $categorieHommeId)->get();
    
        $data = Produit::join('sous_categories', 'produits.sous_categorie_id', '=', 'sous_categories.id')
                    ->join('categories', 'sous_categories.categorie_id', '=', 'categories.id')
                    ->where('sous_categories.nom', 'pantalon')
                    ->where('categories.nom', 'femme')
                    ->select('produits.*') 
                    ->get();
        return view('frontend.femme_pantalon', compact('data', 'sousCategoriesHomme'));
    } 
    public function pullfemme()
    {$categorieHommeId = Categories::where('nom', 'femme')->value('id');

        // Récupérer les sous-catégories qui ont comme catégorie "homme"
        $sousCategoriesHomme = SousCategories::where('categorie_id', $categorieHommeId)->get();
    
        $data = Produit::join('sous_categories', 'produits.sous_categorie_id', '=', 'sous_categories.id')
                    ->join('categories', 'sous_categories.categorie_id', '=', 'categories.id')
                    ->where('sous_categories.nom', 'pull')
                    ->where('categories.nom', 'femme')
                    ->select('produits.*') 
                    ->get();
        return view('frontend.femme_pull', compact('data', 'sousCategoriesHomme'));
    } 
    public function vestefemme()
    {$categorieHommeId = Categories::where('nom', 'femme')->value('id');

        // Récupérer les sous-catégories qui ont comme catégorie "homme"
        $sousCategoriesHomme = SousCategories::where('categorie_id', $categorieHommeId)->get();
    
        $data = Produit::join('sous_categories', 'produits.sous_categorie_id', '=', 'sous_categories.id')
                    ->join('categories', 'sous_categories.categorie_id', '=', 'categories.id')
                    ->where('sous_categories.nom', 'veste')
                    ->where('categories.nom', 'femme')
                    ->select('produits.*') 
                    ->get();
        return view('frontend.femme_veste', compact('data', 'sousCategoriesHomme'));
    } 

    public function pullhomme()
    {$categorieHommeId = Categories::where('nom', 'homme')->value('id');

        // Récupérer les sous-catégories qui ont comme catégorie "homme"
        $sousCategoriesHomme = SousCategories::where('categorie_id', $categorieHommeId)->get();
    
        $data = Produit::join('sous_categories', 'produits.sous_categorie_id', '=', 'sous_categories.id')
                    ->join('categories', 'sous_categories.categorie_id', '=', 'categories.id')
                    ->where('sous_categories.nom', 'pull')
                    ->where('categories.nom', 'homme')
                    ->select('produits.*') 
                    ->get();
        return view('frontend.pullHomme', compact('data', 'sousCategoriesHomme'));
    } 
    public function  vestehomme()
    {$categorieHommeId = Categories::where('nom', 'homme')->value('id');

        // Récupérer les sous-catégories qui ont comme catégorie "homme"
        $sousCategoriesHomme = SousCategories::where('categorie_id', $categorieHommeId)->get();
    
        $data = Produit::join('sous_categories', 'produits.sous_categorie_id', '=', 'sous_categories.id')
                    ->join('categories', 'sous_categories.categorie_id', '=', 'categories.id')
                    ->where('sous_categories.nom', 'veste')
                    ->where('categories.nom', 'homme')
                    ->select('produits.*') 
                    ->get();
        return view('frontend.vestehomme', compact('data', 'sousCategoriesHomme'));
    } 
    public function master()
    { $categorieHommeId = Categories::where('nom', 'homme')->value('id');

        // Récupérer les sous-catégories qui ont comme catégorie "homme"
        $sousCategoriesHomme = SousCategories::where('categorie_id', $categorieHommeId)->get();
        $panier = session()->get('panier', []);
        $data = Produit::join('sous_categories', 'produits.sous_categorie_id', '=', 'sous_categories.id')
                    ->join('categories', 'sous_categories.categorie_id', '=', 'categories.id')
                    ->where('sous_categories.nom', 'pantalon')
                    ->where('categories.nom', 'homme')
                    ->select('produits.*') 
                    ->take(3)
                    ->get();
       
        return view('frontend.master', compact('data','panier'));
    }
   
    public function afficherProduits($id) {
        $sousCategorie = SousCategorie::findOrFail($id);
        $produits = $sousCategorie->produits; // Assurez-vous que la relation 'produits' est correctement définie dans votre modèle SousCategorie
    
        return view('frontend.recautomatique', ['produits' => $produits]);
    }




}
