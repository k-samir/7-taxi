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
Route::get('/home', 'BaseController@index')->name('home');

Route::get('/form/driver/addShift', 'BaseController@addConductorShift')->name('addConductorShift')->middleware('auth');
Route::get('/form/driver/newConductor', 'BaseController@addConductor')->name('addConductor')->middleware('auth');




