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
$router->get('alker/get_by_code', ['as' => 'get_by_code_alker', 'uses' => 'Alker\GetAlkerController@get_by_code_alker']);
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
    $router->post('/accept/{id}', ['as' => 'accept_item', 'uses' => 'AcceptItemController']);
});

$router->group(['namespace' => 'Project', 'prefix' => 'project'], function() use ($router) {
    $router->post('/create', ['as' => 'create_project', 'uses' => 'CreateProjectController']);
    $router->get('/get', ['as' => 'get_project', 'uses' => 'GetProjectController@get_all']);
    $router->get('/get/{id}', ['as' => 'get_project_by_id', 'uses' => 'GetProjectController@get_by_id']);
    $router->post('/search', ['as' => 'search_project', 'uses' => 'GetProjectController@search']);
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
    $router->post('/create', ['as' => 'create_employee', 'uses' => 'CreateEmployeeController']);
    $router->patch('/update/{employee_id}', ['as' => 'update_employee', 'uses' => 'UpdateEmployeeController']);
    $router->delete('/delete/{employee_id}', ['as' => 'delete_employee', 'uses' => 'DeleteEmployeeController']);
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
        $router->patch('/update/{alker_id}', ['as' => 'update_alker', 'uses' => 'UpdateAlkerController']);
        // $router->post('/create_detail_alker', ['as' => 'create_detail_alker', 'uses' => 'CreateDetailAlkerController']);
        $router->post('/create_alker_request', ['as' => 'create_alker_request', 'uses' => 'CreateAlkerRequestController']);
        $router->post('/accept_alker/{alker_request_id}', ['as' => 'accept_alker', 'uses' => 'AcceptAlkerController']);
        $router->get('/get', ['as' => 'get_all', 'uses' => 'GetAlkerController@get_all']);
        $router->get('/get/{alker_id}', ['as' => 'get_by_id', 'uses' => 'GetAlkerController@get_by_id']);
        $router->get('/get_main_alker', ['as' => 'get_main_alker', 'uses' => 'GetMainAlkerController']);
        $router->get('/get_alker_request', ['as' => 'get_all_alker_request', 'uses' => 'GetAlkerRequestController@get_all']);
        $router->get('/get_alker_request_group', ['as' => 'get_alker_request_group', 'uses' => 'GetAlkerRequestController@get_group']);
        $router->get('/get_alker_request_by_group/{alker_id}', ['as' => 'get_alker_request_by_group', 'uses' => 'GetAlkerRequestController@get_by_group']);
        $router->get('/get_alker_request/{alker_request_id}', ['as' => 'get_alker_request_by_id', 'uses' => 'GetAlkerRequestController@get_by_id']);
        $router->get('/get_alker_history/{alker_id}', ['as' => 'get_alker_history', 'uses' => 'HistoryAlkerController']);
        $router->get('/get_alker_status', ['as' => 'get_alker_status', 'uses' => 'GetAlkerController@get_by_status']);
    });

    $router->group(['namespace' => 'MainAlker', 'prefix' => 'main_alker'], function() use ($router) {
        $router->get('/get', ['as' => 'get_all_main_alker', 'uses' => 'GetMainAlkerController@get_all']);
        $router->get('/get/{main_alker_id}', ['as' => 'get_main_alker_by_id', 'uses' => 'GetMainAlkerController@get_by_id']);
        $router->post('/create', ['as' => 'create_main_alker', 'uses' => 'CreateMainAlkerController']);
        $router->patch('/update/{main_alker_id}', ['as' => 'update_main_alker', 'uses' => 'UpdateMainAlkerController']);
        $router->delete('/delete/{main_alker_id}', ['as' => 'delete_main_alker', 'uses' => 'DeleteMainAlkerController']);
    });

    $router->group(['namespace' => 'Supplier', 'prefix' => 'supplier'], function() use ($router) {
        $router->get('/get', ['as' => 'get_supplier', 'uses' => 'GetSupplierController@get_all']);
        $router->get('/get/{supplier_id}', ['as' => 'get_supplier_by_id', 'uses' => 'GetSupplierController@get_by_id']);
        $router->post('/create', ['as' => 'create_supplier', 'uses' => 'CreateSupplierController']);
        $router->patch('/update/{supplier_id}', ['as' => 'update_supplier', 'uses' => 'EditSupplierController']);
        $router->delete('/delete/{supplier_id}', ['as' => 'delete_supplier', 'uses' => 'DeleteSupplierController']);
    });
});