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
    // return $router->app->version();
    return "Hello Fern";
});

// ค่าผ่านทาง route 
$router->get('user/{id}', function ($id){
    return 'user = '.$id;
});

$router->group(['prefix' => 'api/v1'], function () use ($router) {
    $router->get('getAll', 'UserController@getAll');
    $router->get('getproduct', 'UserController@getproduct');
    $router->get('getID/{id}', 'UserController@getID');
    $router->get('getName/{name}', 'UserController@getName');
    $router->post('insertData', 'UserController@addData');
    $router->post('insertproduct', 'UserController@addDataproduct');
    $router->put('updateData/{id}', 'UserController@updateData');
    $router->delete('deleteData/{id}', 'UserController@deleteData');
});
