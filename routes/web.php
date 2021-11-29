<?php

use App\Http\Controllers\PhotoController;
use App\Http\Controllers\VehiculeController;
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

Route::resource('entreprises', 'App\Http\Controllers\EntrepriseController');
Route::resource('admins', 'App\Http\Controllers\AdminController');
Route::resource('employes', 'App\Http\Controllers\EmployeController');
Route::resource('clients', 'App\Http\Controllers\ClientController');
Route::resource('vehicules', 'App\Http\Controllers\VehiculeController');
Route::resource('photos', 'App\Http\Controllers\PhotoController');
Route::resource('contrats', 'App\Http\Controllers\ContratController');
Route::resource('rapports', 'App\Http\Controllers\RapportController');

//Route::get('getphotos/{matricule}', [SiteController::class, 'getPhotos']);


/*
Route::get('get-clients/{id}', [ContratController::class, 'getClients']);
Route::get('get-vehicules/{matricule}', [ContratController::class, 'getVehicules']);

Route::get('get-comments/{id}', [SiteController::class, 'getComments']);
Route::get('get-post/{id}', [SiteController::class, 'getPost']);
*/
