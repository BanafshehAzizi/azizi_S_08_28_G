<?php


namespace App\Repositories;


use App\Models\ShoppingItems;

class ShoppingItemsRepository extends AbstractBaseRepository
{

    public function model()
    {
        return ShoppingItems::class;
    }
}