<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return response()->json([
        'developer' => [
            'name' => 'ivan ruiz ortega',
            'email' => 'soyandres3@gmail.com'
        ],
        'version' => '1.0'
    ]);
});

$router->group(['namespace' => 'Product'], function () use ($router) {
    $router->get('/get-active-products', [
        'uses' => 'GetActiveController'
    ]);

    $router->post('/store-product', [
        'uses' => 'StoreController'
    ]);

    $router->get('/get-product/{product}', [
        'uses' => 'GetController'
    ]);

    $router->put('/update-product/{product}', [
        'uses' => 'UpdateController'
    ]);

    $router->delete('/destroy-product/{product}', [
        'uses' => 'DestroyController'
    ]);
});

$router->group(['namespace' => 'Customer'], function () use ($router) {
    $router->get('/get-all-customers', [
        'uses' => 'GetAllController'
    ]);

    $router->post('/store-customer', [
        'uses' => 'StoreController'
    ]);

    $router->put('/update-customer/{customer}', [
        'uses' => 'UpdateController'
    ]);
});

$router->group(['namespace' => 'Customer\Sale'], function () use ($router) {
    $router->get('customer/{customer}/get-sales', [
        'uses' => 'GetController'
    ]);
    $router->post('customer/{customer}/store-sale', [
        'uses' => 'StoreController'
    ]);
});

$router->group(['namespace' => 'Customer\Cart'], function () use ($router) {
    $router->post('customer/{customer}/add-product-to-cart/', [
        'uses' => 'StoreController'
    ]);
    $router->get('customer/{customer}/get-my-cart/', [
        'uses' => 'GetController'
    ]);
    $router->delete('customer/{customer}/destroy-my-cart/', [
        'uses' => 'DestroyController'
    ]);

    $router->group(['namespace' => 'Product'], function () use ($router) {
        $router->delete('customer/{customer}/destroy-product-to-cart/{product}', [
            'uses' => 'DestroyController'
        ]);
    });
});


