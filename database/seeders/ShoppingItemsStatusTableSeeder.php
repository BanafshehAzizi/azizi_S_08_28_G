<?php

namespace Database\Seeders;

use App\Models\ShoppingItemsStatus;

class ShoppingItemsStatusTableSeeder
{
    public function run()
    {
        $model = new ShoppingItemsStatus();
        $model->insert(['id' => 1, 'name' => 'not checked']);
        $model->insert(['id' => 2, 'name' => 'checked']);
    }

}