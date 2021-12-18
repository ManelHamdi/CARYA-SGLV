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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('auth:employe');

Route::group(['middleware' => 'auth:employe'], function () {
    Auth::routes();

    Route::get('vehicule', [App\Http\Controllers\VehiculeController::class, 'index'], function () {
        return view('vehicules.index');
    })->name('vehicule');

	Route::get('contrat', [App\Http\livewire\Contrats::class, 'render'], function () {
		return view('contrats.render');
	})->name('contrat');

    Route::get('mpaper', function () {
        return view('contrats.paper');
    });

    Route::get('client', [App\Http\livewire\clients::class, 'render'], function () {
        return view('clients.render');
    })->name('client');


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


    Route::get('/contrats/{contrat}/{vehicule}/{client}', 'App\Http\Controllers\ContratController@show')->name('contrats.showa');
    Route::get('/edit/contrats/{contrat}/{vehicule}/{client}', 'App\Http\Controllers\ContratController@edit')->name('contrats.edita');

    Route::get('/contrats/print/{contrat}', 'App\Http\livewire\Contrats@print')->name('contrats.print');

    Route::get('/contrats/printpdf/{contrat}', 'App\Http\livewire\Contrats@printpdf')->name('contrats.printpdf');

    Route::get('/disponibilite/update', 'App\Http\Controllers\VehiculeController@updateDisponibilite')->name('vehicules.update.disponibilite');
    Route::get('/climatisation/update', 'App\Http\Controllers\VehiculeController@updateClimatisation')->name('vehicules.update.climatisation');
});

Route::group(['middleware' => 'auth:employe'], function () {
    Auth::routes();
    Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
    Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

Auth::routes();

Route::get('/login/admin', 'App\Http\Controllers\Auth\LoginController@showAdminLoginForm');
Route::get('/login/employe', 'App\Http\Controllers\Auth\LoginController@showEmployeLoginForm');

Route::post('/login/admin', 'App\Http\Controllers\Auth\LoginController@adminLogin');
Route::post('/login/employe', 'App\Http\Controllers\Auth\LoginController@employeLogin');

Route::get('loginadmin', function () {
    return view('auth.loginadmin');
})->name('loginadmin');

Route::post('/save', [
    'uses' => 'App\Http\Controllers\VehiculeController@store',
    'as' => 'vehicules',
]);
