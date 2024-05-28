<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\CustomAuthController;

use App\Http\Controllers\ProductController;

use App\Http\Controllers\CategoriesC;
use App\Http\Controllers\SousCategorieC;
use App\Http\Controllers\ProduitsC;

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




route::get('/login',[CustomAuthController::class,'inscrire']);
route::post('/registerUser',[CustomAuthController::class,'registerUser'])->name('registerUser');
route::post('connexionUser',[CustomAuthController::class,'connexionUser'])->name('connexionUser');
Route::get('/admin',[CustomAuthController::class,'admin']);
Route::get('categorie',[CategoriesC::class,"index"]);
Route::get('masterr', [CategoriesC::class, 'indexe']);
Route::get('ajouterC', [CategoriesC::class, 'ajouterCategory']);
Route::post('saveCategory', [CategoriesC::class, 'saveCategory']);
Route::get('modifierC/{id}', [CategoriesC::class, 'modifierCategory']);
Route::post('modifierCategory', [CategoriesC::class, 'updateCategory']);
Route::get('supprimerC/{id}',[CategoriesC::class,'deleteCategory']);
Route::get('souscategorie',[SousCategorieC::class,"index"]);
Route::get('ajoutersC', [SousCategorieC::class, 'ajoutersousCategory']);
Route::post('saveSCategory', [SousCategorieC::class, 'savesousCategory']);
Route::get('produits',[ProduitsC::class,"index"]);
Route::get('modifierSC/{id}', [SousCategorieC::class, 'modifierSousCategorie']);
Route::post('modifierSCategory', [SousCategorieC::class, 'updateSCategory']);
Route::get('supprimerSC/{id}', [SousCategorieC::class, 'deleteSousCategory']);
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










route::get('/',[TemplateController::class,'index']);
route::get('/login',[CustomAuthController::class,'inscrire']);
route::post('/registerUser',[CustomAuthController::class,'registerUser'])->name('registerUser');
route::post('connexionUser',[CustomAuthController::class,'connexionUser'])->name('connexionUser');





route::get('/connexion',function(){
    return view('frontend.connexion');
})->name('connexion');

route::get('/masthiverer',function(){
    return view('frontend.hiver');
})->name('hiver');


route::get('/registre',function(){
    return view('frontend.registre');
});

/* route::get('/master',function(){
    return view('frontend.master');
})->name('master'); */
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
route::get('/femme',function(){
    return view('frontend.femme');
})->name('Femme');
route::get('/pullhomme',function(){
    return view('frontend.pullHomme');
})->name('pullHomme');


route::get('/femme_pull',function(){
    return view('frontend.femme_pull');
})->name('femme_pull');
route::get('/femme_pantalon',function(){
    return view('frontend.femme_pantalon');
})->name('femme_pantalon');
route::get('/femmen',function(){
    return view('frontend.hommen');
})->name('femmen');


route::get('/hommen',function(){
    return view('frontend.hommen');
})->name('hommen');
route::get('/accessoires',function(){
    return view('frontend.lunettes');
})->name('accessoires');

//chatbot  routes

//Route::match(['get', 'post'], '/chatboot', 'App\Http\Controllers\BotController@handle');

//Route::get('/chatboot', function () {
  //  return view('frontend.chat');
//});

route::get('/avatarT',function(){
    return view('frontend.avatarT');
})->name('avatarT');


route::get('/admin',function(){
    return view('layoutsadmin.headerfotter');
})->name('headerfotter');



route::get('/avatar',function(){
    return view('frontend.avatar');
})->name('avatar');

use App\Http\Controllers\BotManController;

Route::match(['get', 'post'], '/botman', 'App\Http\Controllers\BotManController@handle');

route::get('/botman1',function(){
    return view('frontend.botman');
})->name('botman1');



?>