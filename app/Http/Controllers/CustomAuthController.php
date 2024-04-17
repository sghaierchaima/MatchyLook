<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Utilisateur;
use Hash;
use Session;

class CustomAuthController extends Controller
{
    //
    public function inscrire(){
        return view("frontend.registre");
    }
    public function registerUser(Request $request){
        $request->validate([
            'prenom'=>'required',
            'nom'=>'required',
            'email'=>'required|email|unique:utilisateurs,adressemail',
            'sexe'=>'required',
            'motDePasse'=>'required|min:8|max:13',
            'paswordC'=>'required',
        ]);
        $utilisateur= new Utilisateur();
        $utilisateur ->prenom=$request->prenom;
        $utilisateur ->nom=$request->nom;
        $utilisateur ->adressemail=$request->email;
        $utilisateur ->sexe=$request->sexe;
        $utilisateur ->mtp= Hash::make($request->motDePasse);
        $utilisateur ->mtpc=Hash::make($request->paswordC);
        $res= $utilisateur->save();
        if($res){
            return back()->with('success','You have registered successfuly');

        }else{
            return back()->with('fail','Somthing wrong');

        }

    }
    public function connexionUser(Request $request){
        $request->validate([
            'email'=>'required|email',
            'motDePasse'=>'required|min:8|max:13'
        ]);
        $utilisateur=Utilisateur::where('adressemail','=', $request->email)->first();
        if($utilisateur){
            if(Hash::check($request->motDePasse,$utilisateur->mtp)){
                $request->session()->put('loginId', $utilisateur->id);
                return redirect('/avatarT');
            }else{
                return back()->with('fail','this password  not matches');
            }

        }else{
            return back()->with('fail','this email is not register');
        }

    }
    public function admin(){
        return "welcome!to your dashbord";
    }
}
