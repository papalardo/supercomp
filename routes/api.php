<?php

use Illuminate\Http\Request;

Route::apiResources([
    'products' => 'ProductController',
    'comparate' => 'ComparateController'
]);

Route::namespace('AuthAPI')->prefix('auth')->group(function() {
    Route::post('login', 'AuthController@login');
    Route::post('register', 'AuthController@register');
    Route::middleware('auth')->post('refresh', 'AuthController@refresh');
    Route::middleware('auth')->get('user', 'AuthController@user');
});

Route::middleware('auth')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('login', function() {
    return 'Page Login';
})->name('login');
