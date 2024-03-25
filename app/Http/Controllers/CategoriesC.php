<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;

class CategoriesC extends Controller
{
    //
     public function index(){
        $data=Categories::get();
        //return $data;
        return view('layoutsadmin.categories',compact('data'));
    } 
    public function indexe()
    { 
        $data = Categories::get();
        return view('frontend.master', compact('data'));
    }
    public function ajouterCategory(){
        return view('layoutsadmin.ajouterC');
    }
    public function saveCategory(Request $req){
        $req->validate([
            'nom'=>'required'
            
        ]);
       // dd($req->all());
        $nom=$req->nom;
        
        $c=new Categories();
        $c->nom=$nom;
        $c->save();
        return redirect()->back()->with('succès','Catégories ajoutées avec succès');

    }
    public function modifierCategory($id){
        $data=Categories::where('id','=',$id)->first();
        //return $data;
        return view('layoutsadmin.modifierC',compact('data'));

    }
    public function updateCategory(Request $req){
        $req->validate([
            'nom'=>'required'
            
        ]);
       // dd($req->all());
        $id=$req->id;
        $nom=$req->nom;
        Categories::where('id','=',$id)->update([
            'nom'=>$nom
        ]);
        return redirect()->back()->with('succès','Catégories modifiées avec succès');


    }
    public function deleteCategory($id){
        Categories::where('id','=',$id)->delete();
        return redirect()->back()->with('succès','Catégories supprimées avec succès');

    }
}
