<?php

use Illuminate\Support\Facades\Route;

Route::group([
    // 'as' => 'agence.',
    'namespace' => 'Agence',
    // 'middleware' => 'auth:agence',
    // 'prefix'     => 'agence'
],
function() {
    Route::get('/', 'HomeController@index')->name('agence.dashboard');

    // Login
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('agence.login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('agence.logout');

    // Register
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('agence.register');
    Route::post('register', 'Auth\RegisterController@register');

    // Passwords
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('agence.password.email');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('agence.password.request');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('agence.password.reset');

    // Must verify email
    Route::get('email/resend','Auth\VerificationController@resend')->name('agence.verification.resend');
    Route::get('email/verify','Auth\VerificationController@show')->name('agence.verification.notice');
    Route::get('email/verify/{id}','Auth\VerificationController@verify')->name('agence.verification.verify');

    Route::put('/agent/{id}/approve', 'AgentController@approvation')->name('agenceAgent.approuve');

    Route::put('/comptable/{id}/approve', 'ComptableController@approvation')->name('agenceComptable.approuve');
    Route::put('/hebergement/{id}/approve', 'HebergementController@approvation')->name('agencehebergement.approuve');
    Route::resource('pelerins', 'PelerinController');
    Route::resource('agenceAgent', 'AgentController');
    Route::resource('agenceComptable', 'ComptableController');
    Route::resource('agenceProfile', 'AgenceprofileController');
    Route::resource('tuteurs', 'TuteurController');
    Route::resource('paiements', 'PaiementController');
    Route::resource('hebergements', 'HebergementController');
    Route::resource('logements', 'LogementController');
    Route::resource('bagages', 'BagageController');
    Route::resource('convoits', 'ConvoitController');

    Route::get('/{any}', function () {
        return abort(404);
    });

});
