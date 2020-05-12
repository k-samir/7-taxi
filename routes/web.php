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

Route::get('/', function () {
    return redirect('home');
});
Route::get('/home', 'GetController@index')->name('home');

Route::get('/form/driver/addShift', 'GetController@addConductorShift')->name('addConductorShift')->middleware('auth');
Route::post('/form/driver/addShift', 'FormDriverController@addRequest')->middleware('auth');

Route::get('/form/create/conductor', 'GetController@createConductor')->name('createConductor')->middleware('auth');
Route::get('/form/create/taxis','GetController@createTaxi')->name('createTaxi')->middleware('auth');

Route::get('/form/create/client', 'GetController@createClient')->name('createClient')->middleware('auth');




