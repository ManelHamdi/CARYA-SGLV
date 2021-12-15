<?php

use App\Http\Controllers\PhotoController;
use App\Http\Controllers\VehiculeController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('entreprises', 'App\Http\Controllers\EntrepriseController');
Route::resource('admins', 'App\Http\Controllers\AdminController');
Route::resource('employes', 'App\Http\Controllers\EmployeController');
Route::resource('clients', 'App\Http\Controllers\ClientController');
Route::resource('conducteurs', 'App\Http\Controllers\ConducteurController');
Route::resource('vehicules', 'App\Http\Controllers\VehiculeController');
Route::resource('photos', 'App\Http\Controllers\PhotoController');
Route::resource('contrats', 'App\Http\livewire\Contrats');
Route::resource('designunits', 'App\Http\Controllers\DesignunitController');
Route::resource('designmontants', 'App\Http\Controllers\DesignmontantController');
Route::resource('montants', 'App\Http\Controllers\MontantController');
Route::resource('checkouts', 'App\Http\Controllers\CheckoutController');
Route::resource('rapports', 'App\Http\Controllers\RapportController');


Route::get('/contrats/{contrat}/{vehicule}/{client}','App\Http\Controllers\ContratController@show')->name('contrats.showa');
Route::get('/edit/contrats/{contrat}/{vehicule}/{client}','App\Http\Controllers\ContratController@edit')->name('contrats.edita');

Route::get('/contrats/print/{contrat}','App\Http\livewire\Contrats@print')->name('contrats.print');

//Route::get('getphotos/{matricule}', [SiteController::class, 'getPhotos']);
Route::get('/disponibilite/update', 'App\Http\Controllers\VehiculeController@updateDisponibilite')->name('vehicules.update.disponibilite');
Route::get('/climatisation/update', 'App\Http\Controllers\VehiculeController@updateClimatisation')->name('vehicules.update.climatisation');


/*
Route::get('get-clients/{id}', [ContratController::class, 'getClients']);
Route::get('get-vehicules/{matricule}', [ContratController::class, 'getVehicules']);

Route::get('get-comments/{id}', [SiteController::class, 'getComments']);
Route::get('get-post/{id}', [SiteController::class, 'getPost']);
*/


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('auth:employe');

Route::group(['middleware' => 'auth:employe'], function () {
	Route::get('contrat', [App\Http\livewire\Contrats::class, 'render'], function () {
		return view('contrats.render');
	})->name('contrat');

    Route::get('contrats', [App\Http\livewire\Contrats::class, 'render'], function () {
		return view('contrats.render');
	})->name('contrats');

	Route::get('vehicule', [App\Http\Controllers\VehiculeController::class, 'index'], function () {
		return view('vehicules.index');
	})->name('vehicule');

	Route::get('icons', function () {
		return view('pages.icons');
	})->name('icons');

	Route::get('map', function () {
		return view('pages.map');
	})->name('map');

	Route::get('notifications', function () {
		return view('pages.notifications');
	})->name('notifications');

	Route::get('rtl-support', function () {
		return view('pages.language');
	})->name('language');

	Route::get('upgrade', function () {
		return view('pages.upgrade');
	})->name('upgrade');
});

Route::group(['middleware' => 'auth:employe'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

Route::get('/login/admin', 'App\Http\Controllers\Auth\LoginController@showAdminLoginForm');
Route::get('/login/employe', 'App\Http\Controllers\Auth\LoginController@showEmployeLoginForm');
//Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm');
//Route::get('/register/writer', 'Auth\RegisterController@showWriterRegisterForm');

Route::post('/login/admin', 'App\Http\Controllers\Auth\LoginController@adminLogin');
Route::post('/login/employe', 'App\Http\Controllers\Auth\LoginController@employeLogin');
//Route::post('/register/admin', 'Auth\RegisterController@createAdmin');
//Route::post('/register/writer', 'Auth\RegisterController@createWriter');

//Route::view('/home', 'home')->middleware('auth');

//Route::view('/admin', 'admin');
//Route::view('/employe', 'dashboard');

Route::get('loginadmin', function () {
    return view('auth.loginadmin');
})->name('loginadmin');

Route::post('/save', [
    'uses' => 'App\Http\Controllers\VehiculeController@store',
    'as' => 'vehicules',
]);
