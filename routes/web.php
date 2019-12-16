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

Route::group([
	'as'=>'admin.',
    'namespace'  => 'admin',
    'middleware' => 'auth:admin',
    'prefix'     => config('multiauth.prefix', 'admin'),
], function () {
     Route::resource('agences', 'AgenceController');
     Route::resource('agents', 'AgentController');
    Route::resource('medecins', 'MedecinController');
     Route::put('/agent/{id}/approve', 'AgentController@approvation')->name('agent.approuve');
    Route::put('/medecins/{id}/approve', 'MedecinController@approvation')->name('medecin.approuve');
     Route::resource('comptables', 'ComptableController');
     Route::put('/comptable/{id}/approve', 'ComptableController@approvation')->name('comptable.approuve');
     Route::put('/agence/{id}/approve', 'AgenceController@approvation')->name('agence.approuve');
     Route::put('/phase/{id}/approve', 'PhaseController@approvation')->name('phase.approuve');
     Route::put('/hebergement/{id}/approve', 'HebergementController@approvation')->name('hebergement.approuve');
     Route::resource('pelerins', 'PelerinController');
    Route::resource('hebergements', 'HebergementController');
    Route::resource('profile', 'ProfileController');
    Route::resource('paiements', 'PaiementController');
    Route::resource('bagages', 'BagageController');
    Route::resource('tuteurs', 'TuteurController');
    Route::resource('logements', 'LogementController');
    Route::resource('acounts', 'AcountController');
    Route::resource('phases', 'PhaseController');
    Route::resource('convoits', 'ConvoitController');

    Route::get('/{any}', function () {
        return abort(404);
    });
});
