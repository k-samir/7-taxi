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

Route::pattern('id','\d+');

Route::get('/', function () {
    return redirect('home');
});
Route::get('/home', 'GetController@index')->name('home');

Route::get('/form/create/shift', 'GetController@addConductorShift')->name('addConductorShift')->middleware('auth');
Route::post('/form/create/shift', 'FormDriverController@addConductorShift')->middleware('auth');

Route::get('/form/create/conductor', 'GetController@createConductor')->name('createConductor')->middleware('auth');
Route::get('/form/modify/conductor{id}', 'GetController@modifyConductor')->name('modifyConductor')->middleware('auth');
Route::post('/form/modify/conductor', 'GetController@modifyConductorFromRequest')->name('modifyConductorRequest')->middleware('auth');

Route::get('/form/create/client', 'GetController@createClient')->name('createClient')->middleware('auth');
Route::get('/form/modify/client{id}', 'GetController@modifyClient')->name('modifyClient')->middleware('auth');
Route::post('/form/modify/client', 'GetController@modifyClientFromRequest')->name('modifyClientRequest')->middleware('auth');

Route::get('/form/create/fixTarif', 'GetController@createFixTarif')->name('createFixTarif')->middleware('auth');
Route::get('/form/modify/fixTarif{id}', 'GetController@modifyFixTarif')->name('modifyFixTarif')->middleware('auth');
Route::post('/form/modify/fixTarif', 'GetController@modifyFixTarifFromRequest')->name('modifyFixTarifRequest')->middleware('auth');

Route::get('/form/create/taxis','GetController@createTaxi')->name('createTaxi')->middleware('auth');
Route::get('/form/modify/taxis{id}','GetController@modifyTaxi')->name('modifyTaxi')->middleware('auth');
Route::post('/form/modify/taxis','GetController@modifyTaxiFromRequest')->name('modifyTaxiRequest')->middleware('auth');



