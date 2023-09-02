<?php
require_once 'vendor/autoload.php';

use Database\Migrations\CreateShoppingItemsStatusTable;
use Database\Migrations\CreateShoppingItemsTable;

$shopping_items_status = new CreateShoppingItemsStatusTable();
$shopping_items_status->up();

$shopping_items = new CreateShoppingItemsTable();
$shopping_items->up();