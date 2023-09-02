<?php


namespace App\Services;


use App\Repositories\ShoppingItemsRepository;

class ShoppingService extends AbstractBaseService
{

    public function repository()
    {
        return ShoppingItemsRepository::class;
    }


}