<?php


Route::group([
    'middleware' => 'api',
], function () {

    Route::post('login', 'AuthController@login');
    Route::post('socialLogin', 'AuthController@socialLogin');
    Route::post('register', 'AuthController@register');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
    Route::post('sendPasswordResetLink', 'ResetPasswordController@sendEmail');
    Route::post('resetPassword', 'ChangePasswordController@process');
    Route::post('/user/verify', 'AuthController@verifyUser');
    Route::apiResource('company', 'CompanyController');
    Route::apiResource('company/{company}/employee', 'EmployeeController');
});
