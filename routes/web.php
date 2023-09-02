<?php

$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $route) {
    $route->addRoute('GET', '/shopping-list', 'App\Controllers\ShoppingController@index');
    $route->addRoute('GET', '/shopping-items', 'App\Controllers\ShoppingController@list');
    $route->addRoute('POST', '/shopping-items', 'App\Controllers\ShoppingController@insert');
    $route->addRoute('PUT', '/shopping-items/{item_id}', 'App\Controllers\ShoppingController@update');
    $route->addRoute('DELETE', '/shopping-items/{item_id}', 'App\Controllers\ShoppingController@delete');
});