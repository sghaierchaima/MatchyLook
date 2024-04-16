<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SousCategories;
use App\Models\Categories;

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
/* public function modifierSousCategorie($id)
{
    $data = SousCategories::findOrFail($id);
    return view('layoutsadmin.modifierSc', compact('data'));
} */
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
}
