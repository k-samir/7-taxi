<?php

use App\Http\Controllers\TaxiControlleur;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::pattern('id', '\d+');

Route::get('/', function () {
    return redirect('home');
});
Route::get('/home', 'GetController@index')->name('home');

//shift
Route::get('/form/create/shift', 'GetController@addConductorShift')->name('addConductorShift')->middleware('auth');
Route::post('/form/create/shift', 'FormDriverController@addConductorShift')->middleware('auth');

//chauffeur
Route::get('/form/create/conductor', 'GetController@createConductor')->name('createConductor')->middleware('auth');
Route::post('/form/create/chauffeur', 'ChauffeurController@createChauffeur')->middleware('auth');
Route::get('/form/modify/conductor{id}', 'GetController@modifyConductor')->name('modifyConductor')->middleware('auth');
Route::post('/form/modify/conductor', 'GetController@modifyConductorFromRequest')->name('modifyConductorRequest')->middleware('auth');

//client
Route::get('/form/create/client', 'GetController@createClient')->name("createClient")->middleware('auth');
Route::post('/form/create/client', 'ClientController@createClient')->middleware('auth');
Route::get('/form/modify/client{id}', 'GetController@modifyClient')->name('modifyClient')->middleware('auth');
Route::post('/form/modify/client', 'GetController@modifyClientFromRequest')->name('modifyClientRequest')->middleware('auth');

//tarif fixe
Route::get('/form/create/fixTarif', 'GetController@createFixTarif')->name('createFixTarif')->middleware('auth');
Route::post('/form/create/fixTarif', 'FixTarifController@createFixTarif')->middleware('auth');
Route::get('/form/modify/fixTarif{id}', 'GetController@modifyFixTarif')->name('modifyFixTarif')->middleware('auth');
Route::post('/form/modify/fixTarif', 'GetController@modifyFixTarifFromRequest')->name('modifyFixTarifRequest')->middleware('auth');

//taxi
Route::get('/form/create/taxi', 'TaxiController@taxi')->name("createTaxi")->middleware('auth');
Route::post('/form/create/taxi', 'TaxiController@createTaxi')->middleware('auth');
Route::get('/form/modify/taxi{id}', 'GetController@modifyTaxi')->name('modifyTaxi')->middleware('auth');
Route::post('/form/modify/taxi', 'GetController@modifyTaxiFromRequest')->name('modifyTaxiRequest')->middleware('auth');

