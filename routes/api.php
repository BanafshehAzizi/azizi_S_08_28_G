<?php

$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $route) {
    $route->addRoute('GET', '/shopping_list/api/v1/register', 'App\Controllers\UserController@viewRegister');
    $route->addRoute('POST', '/shopping_list/api/v1/register', 'App\Controllers\UserController@register');


    $route->addRoute('GET', '/shopping_list/api/v1/shopping-list', 'App\Controllers\ShoppingController@index');
    $route->addRoute('GET', '/shopping_list/api/v1/shopping-items', 'App\Controllers\ShoppingController@list');
    $route->addRoute('POST', '/shopping_list/api/v1/shopping-items', 'App\Controllers\ShoppingController@insert');
    $route->addRoute('PUT', '/shopping_list/api/v1/shopping-items/{item_id}', 'App\Controllers\ShoppingController@update');
    $route->addRoute('DELETE', '/shopping_list/api/v1/shopping-items/{item_id}', 'App\Controllers\ShoppingController@delete');
});