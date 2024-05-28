<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\CustomAuthController;

use App\Http\Controllers\ProductController;

use App\Http\Controllers\CategoriesC;
use App\Http\Controllers\SousCategorieC;
use App\Http\Controllers\ProduitsC;
use App\Http\Controllers\PanierC;
use App\Http\Controllers\CommanddeController;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestEmail;
use App\Http\Middleware;
Route::get('/send-test-email', function () {
    Mail::to('Chaima.Sghaier@esprim.tn')->send(new TestEmail());
    return 'Email sent!';
});
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::middleware(['role:admin'])->group(function () {
    // Définissez vos routes admin ici
    Route::get('/admin',[CustomAuthController::class,'admin']);
    Route::get('ajouterC', [CategoriesC::class, 'ajouterCategory']);
Route::post('saveCategory', [CategoriesC::class, 'saveCategory']);
Route::get('modifierC/{id}', [CategoriesC::class, 'modifierCategory']);
Route::post('modifierCategory', [CategoriesC::class, 'updateCategory']);
Route::get('supprimerC/{id}',[CategoriesC::class,'deleteCategory']);
Route::get('ajoutersC', [SousCategorieC::class, 'ajoutersousCategory']);
Route::post('saveSCategory', [SousCategorieC::class, 'savesousCategory']);
Route::get('modifierSC/{id}', [SousCategorieC::class, 'modifierSousCategorie']);
Route::post('modifierSCategory', [SousCategorieC::class, 'updateSCategory']);
Route::get('supprimerSC/{id}', [SousCategorieC::class, 'deleteSousCategory']);
<<<<<<< HEAD
route::post('/products', [ProductController::class, 'store']);

route::get('/articles', [ArticleController::class, 'showArticles'])->name('articles.index');

Route::get('ajouterP', [ProduitsC::class, 'ajouterproduit']);
Route::post('saveProduits', [ProduitsC::class, 'saveProduit']);
//Route::get('/pantalonHomme', 'ProduitsC @indexe')->name('pantalonHomme');
Route::get('pantalonHomme',[ProduitsC::class,"indexe"]);
/* route::get('/pantalonHomme',function (){ return view('frontend.pantalon');
})->name('pantalonHomme'); */
Route::get('lunettes',[ProduitsC::class,"lunettes"]);
Route::get('casquettes',[ProduitsC::class,"casquettes"]);
Route::get('chapeau',[ProduitsC::class,"chapeau"]);
Route::get('accesoires',[ProduitsC::class,"lunettes"]);
=======
Route::get('ajouterP', [ProduitsC::class, 'ajouterproduit']);
Route::post('saveProduits', [ProduitsC::class, 'saveProduit']);
Route::get('modifierp/{id}', [ProduitsC::class, 'modifierproduit']);
Route::post('modifierProduit', [ProduitsC::class, 'updateproduits']);
Route::get('produits',[ProduitsC::class,"index"]);
Route::get('categorie',[CategoriesC::class,"index"]);
Route::get('souscategorie',[SousCategorieC::class,"index"]);
Route::get('Commande',[CommanddeController::class,"indexc"]);

});

route::get('/login',[CustomAuthController::class,'inscrire']);
route::post('/registerUser',[CustomAuthController::class,'registerUser'])->name('registerUser');
route::post('connexionUser',[CustomAuthController::class,'connexionUser'])->name('connexionUser');
Route::middleware(['role:user'])->group(function () {
    // Définissez vos routes admin ici
    Route::post('/ajouter-au-panier/{produit}', [PanierC::class, 'ajouterAuPanier'])->name('ajouter-au-panier');
    Route::post('/passer-commande', [PanierC::class, 'passerCommande'])->name('passer-commande');
Route::post('/confirmer-commande', [CommanddeController::class, 'confirmerCommande'])->name('confirmer_commande');
Route::get('/panier', [PanierC::class, 'afficherPanier'])->name('panier');
Route::post('/retirer-du-panier/{id}', [PanierC::class, 'retirerDuPanier'])->name('retirer-du-panier');
});
>>>>>>> ef453538f183af11dc860ff7b4dda100842d166c








Route::get('masterr', [ProduitsC::class, 'master']);





    Route::get('/deconnexion', [CustomAuthController::class,"deconnexion"])->name('deconnexion');

Route::post('/modifier-quantite/{produitId}', [PanierC::class, 'modifierQuantite'])->name('modifier-quantite');



Route::get('/femme', [SousCategorieC::class, 'femme']);
Route::get('/homme', [SousCategorieC::class, 'homme']);
Route::get('/accessoires', [SousCategorieC::class, 'accessoires']);
Route::get('/souscategoriespa/{id}', [SousCategorieC::class, 'produitBySousCategoriesa'])->name('produitBySousCategoriesa');
Route::get('/souscategoriesp/{id}', [SousCategorieC::class, 'produitBySousCategories'])->name('produitBySousCategories');
Route::get('/souscategoriespf/{id}', [SousCategorieC::class, 'produitBySousCategoriesf'])->name('produitBySousCategoriesf');





route::get('/',[TemplateController::class,'index']);
route::get('/login',[CustomAuthController::class,'inscrire']);
route::post('/registerUser',[CustomAuthController::class,'registerUser'])->name('registerUser');
route::post('connexionUser',[CustomAuthController::class,'connexionUser'])->name('connexionUser');

Route::get('/log', function () {
    return view('frontend.connexion');
})->name('log');

route::get('/connexion',function(){
    return view('frontend.connexion');
})->name('connexion');

route::get('/masthiverer',function(){
    return view('frontend.hiver');
})->name('hiver');


route::get('/registre',function(){
    return view('frontend.registre');
});


Route::get('/', function () {
    return view('frontend.master');
});

route::get('/master',function(){
    return view('frontend.master');
})->name('master');

route::get('/about',function(){
    
    return view('frontend.about');
})->name('about');
route::get('/all',function(){
    return view('frontend.all');
})->name('all');










route::get('/avatarT',function(){
    return view('frontend.avatarT');
})->name('avatarT');


/* route::get('/admin',function(){
    return view('layoutsadmin.headerfotter');
})->name('headerfotter');
 */


route::get('/avatar',function(){
    return view('frontend.avatar');
})->name('avatar');

use App\Http\Controllers\BotManController;

Route::match(['get', 'post'], '/botman', 'App\Http\Controllers\BotManController@handle');

route::get('/botman1',function(){
    return view('frontend.botman');
})->name('botman1');



?>