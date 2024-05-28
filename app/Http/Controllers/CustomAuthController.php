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
   /*  public function registerUser(Request $request)
    {
        $request->validate([
            'prenom' => 'required',
            'nom' => 'required',
            'email' => 'required|email|unique:utilisateurs,adressemail',
            'sexe' => 'required',
            'motDePasse' => 'required|min:8|max:13',
            'paswordC' => 'required',
        ]);
    
        // Vérifier si l'email est celui de l'administrateur
        $isAdminEmail = $request->email === 'admin@admin.com';
    
        if ($isAdminEmail) {
            // Vérifier si l'adresse email n'est pas déjà enregistrée
            $existingUser = Utilisateur::where('adressemail', $request->email)->exists();
            if ($existingUser) {
                return back()->with('fail', 'L\'adresse email admin@admin.com est déjà utilisée.');
            }
        }
    
        $utilisateur = new Utilisateur();
        $utilisateur->prenom = $request->prenom;
        $utilisateur->nom = $request->nom;
        $utilisateur->adressemail = $request->email;
        $utilisateur->sexe = $request->sexe;
        $utilisateur->mtp = Hash::make($request->motDePasse);
        $utilisateur->mtpc = Hash::make($request->paswordC);
        $res = $utilisateur->save();
    
        if ($res) {
            return back()->with('success', 'You have registered successfuly');
        } else {
            return back()->with('fail', 'Something wrong');
        }
    } */
    public function registerUser(Request $request)
{
    $request->validate([
        'prenom' => 'required',
        'nom' => 'required',
        'email' => 'required|email|unique:utilisateurs,adressemail',
        'sexe' => 'required',
        'motDePasse' => 'required|min:8|max:13',
        'paswordC' => 'required|same:motDePasse',
    ]);

    $utilisateur = new Utilisateur();
    $utilisateur->prenom = $request->prenom;
    $utilisateur->nom = $request->nom;
    $utilisateur->adressemail = $request->email;
    $utilisateur->sexe = $request->sexe;
    $utilisateur->mtp = Hash::make($request->motDePasse);
     $utilisateur->mtpc = Hash::make($request->paswordC);
    $utilisateur->role = $request->email === 'admin@admin.com' ? 'admin' : 'user';
    $res = $utilisateur->save();

    if ($res) {
        return back()->with('success', 'You have registered successfully');
    } else {
        return back()->with('fail', 'Something went wrong');
    }
}
public function connexionUser(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'motDePasse' => 'required|min:8|max:13'
    ]);

    $utilisateur = Utilisateur::where('adressemail', '=', $request->email)->first();

    if ($utilisateur) {
        if (Hash::check($request->motDePasse, $utilisateur->mtp)) {
            // Sauvegarder les données du panier actuel
            $panier = $request->session()->get('panier', []);

            // Transférer le panier vers la nouvelle session de l'utilisateur connecté
            $request->session()->regenerate(); // Génère une nouvelle session ID pour éviter les attaques de fixation de session
            $request->session()->put('loginId', $utilisateur->id);
            $request->session()->put('nom', $utilisateur->nom);
            $request->session()->put('prenom', $utilisateur->prenom);
            $request->session()->put('adressemail', $utilisateur->adressemail);
            $request->session()->put('role', $utilisateur->role);
            $request->session()->put('panier', $panier);
            
            // Redirection basée sur le rôle de l'utilisateur
            if ($utilisateur->role === 'admin') {
                return redirect('/admin');
            } else {
                return redirect('/masterr');
            }
        } else {
            return back()->with('fail', 'Le mot de passe ne correspond pas.');
        }
    } else {
        return back()->with('fail', 'Cette adresse e-mail n\'est pas enregistrée.');
    }
}

    
  /*   public function connexionUser(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'motDePasse' => 'required|min:8|max:13'
    ]);

    // Récupérer l'utilisateur en fonction de l'adresse e-mail
    $utilisateur = Utilisateur::where('adressemail', $request->email)->first();

    if ($utilisateur) {
        // Vérifier si le mot de passe est correct
        if (Hash::check($request->motDePasse, $utilisateur->mtp)) {
            // Vérifier le rôle de l'utilisateur
            if ($utilisateur->adressemail === 'admin@admin.com') {
                return redirect('http://127.0.0.1:8000/admin');
            } else {
                // Si l'utilisateur n'est pas administrateur, le rediriger vers la page d'accueil
                $request->session()->put('loginId', $utilisateur->id);
                return redirect('/masterr');
            }
        } else {
            return back()->with('fail', 'Le mot de passe ne correspond pas.');
        }
    } else {
        return back()->with('fail', 'Cet email n\'est pas enregistré.');
    }
} */


    public function admin(){
        return view('layoutsadmin.headerfotter');
    }
    public function verifierConnexion() {
        if (session()->has('loginId')) {
            // L'utilisateur est connecté
            return true;
        } else {
            // L'utilisateur n'est pas connecté
            return false;
        }
    }
    public function afficherPageProtegee() {
        if ($this->verifierConnexion()) {
            // L'utilisateur est connecté, afficher la page protégée
            return view('frontend.panier');
        } else {
            // L'utilisateur n'est pas connecté, rediriger vers la page de connexion
            return redirect('/connexion');
        }
    }
    public function deconnexion(Request $request)
    {
        // Effacer toutes les données de session existantes
        $request->session()->flush();
        
        // Rediriger l'utilisateur vers la page de connexion
        return redirect()->route('connexion');
    }
}
