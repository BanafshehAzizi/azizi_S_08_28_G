<?php

$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $route) {
    $route->addRoute('GET', '/api/v1/shopping-list', 'App\Controllers\ShoppingController@index');
    $route->addRoute('GET', '/api/v1/shopping-items', 'App\Controllers\ShoppingController@list');
    $route->addRoute('POST', '/api/v1/shopping-items', 'App\Controllers\ShoppingController@insert');
    $route->addRoute('PUT', '/api/v1/shopping-items/{item_id}', 'App\Controllers\ShoppingController@update');
    $route->addRoute('DELETE', '/api/v1/shopping-items/{item_id}', 'App\Controllers\ShoppingController@delete');
});