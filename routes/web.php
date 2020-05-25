<?php

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
Auth::routes(['verify'=>true]);
Route::pattern('id', '\d+');

Route::get('/', function () {
    return redirect()->route('homeNoVerification');
});

Route::get('/homeNo', 'GetController@index')->name('homeNoVerification');
Route::prefix('taxi')->middleware(['verified','auth'])->group( function() {
    Route::get('home', 'GetController@index')->name('home');
    //shift
    Route::get('form/create/shift', 'GetController@addConductorShift')->name('addConductorShift');
    Route::post('form/create/shift', 'FormDriverController@addConductorShift');

    //chauffeur
    Route::get('form/create/conductor', 'GetController@createConductor')->name('createConductor');
    Route::post('form/create/conductor', 'ChauffeurController@createChauffeur');
    Route::get('form/modify/conductor{id}', 'GetController@modifyConductor')->name('modifyConductor');
    Route::post('form/modify/conductor{id}', 'ChauffeurController@modifyConductor');
    Route::post('form/modify/conductor', 'GetController@modifyConductorFromRequest')->name('modifyConductorRequest');

    //client
    Route::get('form/create/client', 'GetController@createClient')->name("createClient");
    Route::post('form/create/client', 'ClientController@createClient');
    Route::get('form/modify/client{id}', 'GetController@modifyClient')->name('modifyClient');
    Route::post('form/modify/client{id}', 'ClientController@modifyClient');
    Route::post('form/modify/client', 'GetController@modifyClientFromRequest')->name('modifyClientRequest');


    //tarif fixe
    Route::get('form/create/fixTarif', 'GetController@createFixTarif')->name('createFixTarif');
    Route::post('form/create/fixTarif', 'FixTarifController@createFixTarif');
    Route::get('form/modify/fixTarif{id}', 'GetController@modifyFixTarif')->name('modifyFixTarif');
    Route::post('form/modify/fixTarif{id}', 'FixTarifController@modifyFixTarif');
    Route::post('form/modify/fixTarif', 'GetController@modifyFixTarifFromRequest')->name('modifyFixTarifRequest');

    //taxi
    Route::get('form/get/taxi', 'TaxiController@taxi')->name('getTaxi');
    Route::post('form/create/taxi', 'TaxiController@createTaxi')->name('createTaxi');
    Route::get('form/modify/taxi{id}', 'GetController@modifyTaxi')->name('modifyTaxi');
    Route::post('form/modify/taxi{id}', 'TaxiController@modifyTaxi');
    Route::post('form/modify/taxi', 'GetController@modifyTaxiFromRequest')->name('modifyTaxiRequest');
});
