<?php

/** @var \Laravel\Lumen\Routing\Router $router */

use PHPUnit\TextUI\XmlConfiguration\Group;

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

$router->group(['namespace' => 'Auth', 'prefix' => 'auth'], function() use ($router) {
    $router->post('login', ['as' => 'login', 'uses' => 'LoginController']);
    $router->post('logout', ['as' => 'logout', 'uses' => 'LogoutController']);
});

$router->group(['namespace' => 'User', 'prefix' => 'user'], function() use ($router) {
    $router->get('/get_user/{user_id}', ['as' => 'get_user', 'uses' => 'GetUserController']);
});

$router->group(['namespace' => 'Item', 'prefix' => 'item'], function() use ($router) {
    $router->post('/create', ['as' => 'create_item', 'uses' => 'CreateItemController']);
    $router->patch('/update/{id}', ['as' => 'update_item', 'uses' => 'UpdateItemController']);
    $router->get('/get', ['as' => 'get_item', 'uses' => 'GetItemController@get_all']);
    $router->get('/get/{id}', ['as' => 'get_item_by_id', 'uses' => 'GetItemController@get_by_id']);
    $router->delete('/delete/{id}', ['as' => 'delete_item', 'uses' => 'DeleteItemController']);
});

$router->group(['namespace' => 'Project', 'prefix' => 'project'], function() use ($router) {
    $router->post('/create', ['as' => 'create_project', 'uses' => 'CreateProjectController']);
    $router->get('/get', ['as' => 'get_project', 'uses' => 'GetProjectController@get_all']);
    $router->get('/get/{id}', ['as' => 'get_project_by_id', 'uses' => 'GetProjectController@get_by_id']);
});