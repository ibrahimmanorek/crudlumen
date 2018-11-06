<?php

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
    return $router->app->version();
});
$router->get('/getData', 'ExampleController@getData');
$router->post('/insertData', 'ExampleController@insertData');
$router->put('/updateData', 'ExampleController@updateData');
$router->delete('/deleteData/{id}', 'ExampleController@deleteData');
$router->get('/getApi', 'ExampleController@getApi');
