<?php
Route::group(
    ['prefix' => 'auth'], function ($router) {
    $router->post('register', ['as' => 'auth.register', 'uses' => 'AuthController@register']);
    $router->post('login', ['as' => 'auth.login', 'uses' => 'AuthController@login']);
    $router->post('me', ['as' => 'auth.me', 'uses' => 'AuthController@me']);
    $router->group(['middleware' => 'jwt.check'], function ($router) {
        $router->post('auth/refresh', ['as' => 'auth.refresh', 'uses' => 'AuthController@refresh']);
        $router->post('logout', ['as' => 'auth.logout', 'uses' => 'AuthController@logout']);
    });
});
Route::group(['middleware' => 'jwt.auth'], function () {
    Route::prefix('customers')->group(function ($router) {
        $router->get('/', 'CustomerController@index');
        $router->get('/{id}', 'CustomerController@show');
        $router->delete('/{id}', 'CustomerController@destroy');
        $router->put('/{id}', 'CustomerController@update');
        $router->post('/', 'CustomerController@store');
    });
});
