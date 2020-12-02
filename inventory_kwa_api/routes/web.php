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
    $router->post('/create_tool', ['as' => 'create_tool', 'uses' => 'CreateToolController']);
    $router->patch('/update/{id}', ['as' => 'update_item', 'uses' => 'UpdateItemController']);
    $router->get('/get', ['as' => 'get_item', 'uses' => 'GetItemController@get_all']);
    $router->get('/get/{id}', ['as' => 'get_item_by_id', 'uses' => 'GetItemController@get_by_id']);
    $router->get('/get_tool', ['as' => 'get_tool', 'uses' => 'GetToolController@get_all']);
    $router->get('/get_tool/{id}', ['as' => 'get_tool_by_id', 'uses' => 'GetToolController@get_by_id']);
    $router->delete('/delete/{id}', ['as' => 'delete_item', 'uses' => 'DeleteItemController']);
    $router->patch('/accept/{id}', ['as' => 'accept_item', 'uses' => 'AcceptItemController']);
});

$router->group(['namespace' => 'Project', 'prefix' => 'project'], function() use ($router) {
    $router->post('/create', ['as' => 'create_project', 'uses' => 'CreateProjectController']);
    $router->get('/get', ['as' => 'get_project', 'uses' => 'GetProjectController@get_all']);
    $router->get('/get/{id}', ['as' => 'get_project_by_id', 'uses' => 'GetProjectController@get_by_id']);
    $router->patch('/update/{id}', ['as' => 'update_project', 'uses' => 'UpdateProjectController']);
    $router->delete('/delete/{id}', ['as' => 'delete_project', 'uses' => 'DeleteProjectController']);
});

$router->group(['namespace' => 'ToolRequest', 'prefix' => 'tool_request'], function() use ($router) {
    $router->post('/create', ['as' => 'create_tool_request', 'uses' => 'CreateToolRequestController']);
    $router->post('/update/{id}', ['as' => 'update_tool_request', 'uses' => 'UpdateToolRequestController']);
    $router->delete('/delete/{id}', ['as' => 'delete_tool_request', 'uses' => 'DeleteToolRequestController']);
    $router->get('/get', ['as' => 'get_tool_request', 'uses' => 'GetToolRequestController@get_all']);
    $router->get('/get/{id}', ['as' => 'get_tool_request_by_id', 'uses' => 'GetToolRequestController@get_by_id']);
    $router->post('/accept/{id}', ['as' => 'accept_tool_request', 'uses' => 'AcceptToolRequestController']);
});

$router->group(['namespace' => 'Param', 'prefix' => 'param'], function() use ($router) {
    $router->get('/get_sto', ['as' => 'get_sto', 'uses' => 'GetStoController']);
    $router->get('/get_jenis_alker', ['as' => 'get_jenis_alker', 'uses' => 'GetJenisAlkerController']);
    $router->get('/get_keterangan_alker', ['as' => 'get_keterangan_alker', 'uses' => 'GetKeteranganAlkerController']);
});

$router->group(['namespace' => 'Employee', 'prefix' => 'employee'], function() use ($router) {
    $router->get('/get', ['as' => 'get_all_employee', 'uses' => 'GetEmployeeController@get_all']);
    $router->get('/get/{id}', ['as' => 'get_employee_by_id', 'uses' => 'GetEmployeeController@get_by_id']);
});

$router->group(['middleware' => 'auth'], function() use ($router) {
    $router->group(['namespace' => 'Provinsi', 'prefix' => 'provinsi'], function() use ($router) {
        $router->get('/', ['as' => 'get_provinsi', 'uses' => 'GetProvinsiController']);
    });
    $router->group(['namespace' => 'KabKota', 'prefix' => 'kab_kota'], function() use ($router) {
        $router->get('/', ['as' => 'get_kab_kota', 'uses' => 'GetKabKotaController@get_all']);    
        $router->get('/{provinsi_id}', ['as' => 'get_kab_kota_by_provinsi_id', 'uses' => 'GetKabKotaController@get_by_provinsi_id']);    
    });

    $router->group(['namespace' => 'Alker', 'prefix' => 'alker'], function() use ($router) {
        $router->post('/create', ['as' => 'create_alker', 'uses' => 'CreateAlkerController']);
        $router->post('/create_detail_alker', ['as' => 'create_detail_alker', 'uses' => 'CreateDetailAlkerController']);
        $router->post('/create_alker_request', ['as' => 'create_alker_request', 'uses' => 'CreateAlkerRequestController']);
    });
});