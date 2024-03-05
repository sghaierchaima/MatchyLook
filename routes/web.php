<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TemplateController;
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



route::get('/',[TemplateController::class,'index']);
route::get('/connexion',function(){
    return view('frontend.connexion');
})->name('connexion');

route::get('/masthiverer',function(){
    return view('frontend.hiver');
})->name('hiver');


route::get('/registre',function(){
    return view('frontend.registre');
});
route::get('/master',function(){
    return view('frontend.master');
})->name('master');
route::get('/about',function(){
    return view('frontend.about');
})->name('about');
route::get('/homme',function(){
    return view('frontend.homme');
})->name('homme');
route::get('/femme',function(){
    return view('frontend.femme');
})->name('Femme');
route::get('/pullhomme',function(){
    return view('frontend.pullHomme');
})->name('pullHomme');
route::get('/pantalonHomme',function(){
    return view('frontend.pantalon');
})->name('pantalonHomme');

route::get('/femme_pull',function(){
    return view('frontend.femme_pull');
})->name('femme_pull');
route::get('/femme_pantalon',function(){
    return view('frontend.femme_pantalon');
})->name('femme_pantalon');