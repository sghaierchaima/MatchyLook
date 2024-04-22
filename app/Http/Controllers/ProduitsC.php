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
        $data = Produit::get();
        return view('layoutsadmin.produits', compact('data'));
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
}
