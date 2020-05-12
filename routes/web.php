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
Route::post('/form/create/shift', 'FormDriverController@addRequest')->middleware('auth');

Route::get('/form/create/conductor', 'GetController@createConductor')->name('createConductor')->middleware('auth');
Route::get('/form/modify/conductor{id}', 'GetController@modifyConductor')->name('modifyConductor')->middleware('auth');

Route::get('/form/create/client', 'GetController@createClient')->name('createClient')->middleware('auth');
Route::get('/form/modify/client{id}', 'ClientController@modifyClient')->name('modifyClient')->middleware('auth');

Route::get('/form/create/fixTarif', 'GetController@createFixTarif')->name('createFixTarif')->middleware('auth');
Route::get('/form/modify/fixTarif{id}', 'FixTarifController@modifyFixTarif')->name('modifyFixTarif')->middleware('auth');




