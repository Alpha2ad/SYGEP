<?php

Route::group(['namespace' => 'Agent'], function() {
    Route::get('/', 'HomeController@index')->name('agent.dashboard');

    // Login
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('agent.login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('agent.logout');

    // Register
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('agent.register');
    Route::post('register', 'Auth\RegisterController@register');

    // Passwords
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('agent.password.email');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('agent.password.request');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('agent.password.reset');

    // Must verify email
    Route::get('email/resend','Auth\VerificationController@resend')->name('agent.verification.resend');
    Route::get('email/verify','Auth\VerificationController@show')->name('agent.verification.notice');
    Route::get('email/verify/{id}','Auth\VerificationController@verify')->name('agent.verification.verify');

    Route::resource('agentPelerins', 'PelerinController');

    Route::resource('agentProfile', 'AgentprofileController');
    Route::get('/{any}', function () {
        return abort(404);
    });

});
