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
route::get('/registre',function(){
    return view('frontend.registre');
});
