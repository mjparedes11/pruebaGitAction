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

// $router->get('/', function () use ($router) {
//     return $router->app->version();
// });

$router->group(['prefix' => 'authors'], function () use ($router) {
    $router->get('/', ['uses' => 'AuthorController@index']);
    $router->get('/{id}', ['uses' => 'AuthorController@show']);
    $router->post('/', ['uses' => 'AuthorController@store']);
    $router->put('/{id}', ['uses' => 'AuthorController@update']);
    $router->delete('/{id}', ['uses' => 'AuthorController@destroy']);
});

// Rutas para el microservicio de Reseñas
$router->group(['prefix' => 'reviews'], function () use ($router) {
    $router->get('/', ['uses' => 'ReviewController@index']);
    $router->get('/{id}', ['uses' => 'ReviewController@show']);
    $router->post('/', ['uses' => 'ReviewController@store']);
    $router->put('/{id}', ['uses' => 'ReviewController@update']);
    $router->delete('/{id}', ['uses' => 'ReviewController@destroy']);
    
    // Ruta para obtener reseñas de un autor específico
    $router->get('/author/{authorId}', ['uses' => 'ReviewController@getReviewsByAuthor']);
});