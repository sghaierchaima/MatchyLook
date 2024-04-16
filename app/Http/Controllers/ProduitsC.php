<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;
use App\Models\SousCategories;
use App\Models\Categories;
class ProduitsC extends Controller
{
    //
    public function index(){
        $data=Produit::get();
        return view('layoutsadmin.produits',compact('data'));
    } 
   
    public function ajouterProduit()
    {
        $scategories = SousCategories::all();
        return view('layoutsadmin.ajouterproduits', compact('scategories'));
    }

    public function saveproduits(Request $req)
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
    
}
