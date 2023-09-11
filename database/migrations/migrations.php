<?php
require_once '../../vendor/autoload.php';

use Database\Migrations\CreateShoppingItemsStatusTable;
use Database\Migrations\CreateShoppingItemsTable;
use Database\Migrations\CreateUsersTable;

$shopping_items_status = new CreateShoppingItemsStatusTable();
$shopping_items_status->up();

$shopping_items = new CreateShoppingItemsTable();
$shopping_items->up();

$shopping_items = new CreateUsersTable();
$shopping_items->up();