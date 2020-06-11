<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Formulaire;

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

Auth::routes(['verify' => true]);
Route::pattern('id', '\d+');

Route::get('/', function () {
    return redirect()->route('homeNoVerification');
});


Route::get('homeNo', 'GetController@index')->name('homeNoVerification');
Route::get('createPassword&token={token}','Auth\ChangePasswordController@showCreatePassword')->name('createPassword');
Route::post('createPassword&token={token}','Auth\ChangePasswordController@createPassword');

Route::prefix('taxi')->middleware(['verified', 'auth'])->group(function () {
    Route::get('home', 'GetController@index')->name('home');
    Route::get('changePassword&token={token}', 'Auth\ChangePasswordController@showChangePassword')->name('changePassword');
    Route::post('changePassword&token={token}','Auth\ChangePasswordController@changePassword');
    Route::get('sendMail&token={token}','GetController@sendMail')->name('sendMail');
    
    Route::get('form/create/shift', 'GetController@addConductorShift')->name('addConductorShift');
    Route::post('form/create/shift', 'FormShiftController@addShift');
    
    
    //Routes for the conductor
    Route::get('form/create/conductor', 'GetController@createConductor')->name('createConductor');
    Route::post('form/create/conductor', 'ChauffeurController@createChauffeur');
    Route::get('form/modify/conductor_{id}', 'GetController@modifyConductor')->name('modifyConductor');
    Route::post('form/modify/conductor_{id}', 'ChauffeurController@modifyConductor');
    
    
    //Routes for the client
    Route::get('form/create/client', 'GetController@createClient')->name("createClient");
    Route::post('form/create/client', 'ClientController@createClient');
    Route::get('form/modify/client_{id}', 'GetController@modifyClient')->name('modifyClient');
    Route::post('form/modify/client_{id}', 'ClientController@modifyClient');
    
    
    //Routes for the fix tarif
    Route::get('form/create/fixTarif', 'GetController@createFixTarif')->name('createFixTarif');
    Route::post('form/create/fixTarif', 'FixTarifController@createFixTarif');
    Route::get('form/modify/fixTarif_{id}', 'GetController@modifyFixTarif')->name('modifyFixTarif');
    Route::post('form/modify/fixTarif_{id}', 'FixTarifController@modifyFixTarif');

    
    //Routes for the taxi
    Route::get('form/get/taxi', 'GetController@createTaxi')->name('getTaxi');
    Route::post('form/create/taxi', 'TaxiController@createTaxi')->name('createTaxi');
    Route::get('form/modify/taxi_{id}', 'GetController@modifyTaxi')->name('modifyTaxi');
    Route::post('form/modify/taxi_{id}', 'TaxiController@modifyTaxi');
    
    //changement de role
    Route::post('list/modify/user_{id}', 'ChangeUserRoleController@changeRole')->name('changeUser');
    
    //Routes for the lists
    Route::get('list/taxi', 'TaxiController@getTaxis')->name('listTaxi');
    Route::get('list/chauffeur', 'ChauffeurController@getChauffeur')->name('listChauffeur');
    Route::get('list/users', 'GetController@getListOfUsers')->name('listUsers');
    Route::get('list/forms', function () {
        return view('datagrid')->with('formulaires', Formulaire::all()); 
    })->name('listFormulaires');
    
});
