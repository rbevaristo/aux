<?php


Route::group([
    'middleware' => 'api',
], function () {

    Route::post('login', 'AuthController@login');
    Route::post('register', 'AuthController@register');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
    Route::post('sendPasswordResetLink', 'ResetPasswordController@sendEmail');
    Route::post('resetPassword', 'ChangePasswordController@process');
    
    Route::apiResource('company', 'CompanyController');
    Route::apiResource('company/{company}/employee', 'EmployeeController');

    Route::get('/user/verify/{token}', 'AuthController@verifyUser');

});

// Route::get('facebook', 'Auth\LoginFacebookController@redirectToProvider');
// Route::get('facebook/callback', 'Auth\LoginFacebookController@handleProviderCallback');



