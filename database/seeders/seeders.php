<?php
require_once 'vendor/autoload.php';
require_once 'config/database.php';


use Database\Seeders\ShoppingItemsStatusTableSeeder;

$shopping_items_status = new ShoppingItemsStatusTableSeeder();
$shopping_items_status->run();