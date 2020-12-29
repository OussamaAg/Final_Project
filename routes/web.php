<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//routes for rubrique shit
Route::get('rubriquelist','rubriqueController@index');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/show/{id}',"rubriqueController@show");

Route::get('/create',"rubriqueController@create");

Route::post('/store',"rubriqueController@store");

Route::get('/edit/{id}','rubriqueController@edit');

Route::post('/update/{id}',"rubriqueController@update");

Route::get('/destroy/{id}',"rubriqueController@destroy");

Route::get('/search',"rubriqueController@search");

//routes for factures
Route::get('/factureviews/facturelist','FactureController@indexFacture');
Route::get('/createFacture','FactureController@createFacture');
Route::post('/storeFacture','FactureController@storeFacture');
Route::get('/editFacture/{id}','FactureController@editFacture');
Route::get('/destroyFacture/{id}','FactureController@destroyFacture');
Route::get('/updateFacture/{id}','FactureController@updateFacture');
Route::get('/searchFacture','FactureController@searchFacture');

//Route::get('factureviews.')

//routes for fournisseurs 
Route::get('fournisseurviews/fournisseurlist','FournisseurController@indexFournisseur');

Route::get('/createFournisseur','FournisseurController@createFournisseur');

Route::post('/storeFournisseur','FournisseurController@storeFournisseur');

Route::get('/editFournisseur/{id}','FournisseurController@editFournisseur');

Route::get('/updateFournisseur/{id}',"FournisseurController@updateFournisseur");

Route::get('/destroyFournisseur/{id}',"FournisseurController@destroyFournisseur");

Route::get('/searchFournisseur',"FournisseurController@searchFournisseur");


//pdf routes

Route::get('/listeFacture','FactureController@download_pdf');





