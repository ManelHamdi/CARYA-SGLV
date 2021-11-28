<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('entreprise', 'App\Http\Controllers\EntrepriseController');
Route::resource('admin', 'App\Http\Controllers\AdminController');
Route::resource('employe', 'App\Http\Controllers\EmployeController');
Route::resource('Client', 'App\Http\Controllers\ClientController');
Route::resource('Vehicule', 'App\Http\Controllers\Vehicule');
Route::resource('Photo', 'App\Http\Controllers\PhotoController');
Route::resource('Contrat', 'App\Http\Controllers\ContratController');
Route::resource('Rapport', 'App\Http\Controllers\RapportController');
