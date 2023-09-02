<?php

namespace App\Controllers;



use App\Services\ShoppingService;

class ShoppingController
{
    private $shopping_service;

    public function __construct()
    {
        $this->shopping_service = new ShoppingService();
    }

    public function index()
    {
        try {
            $items = $this->shopping_service->listService();
        } catch (\Exception $exception) {
            $items = [];
        }
        extract($items);
        require_once APP_ROOT . '/views/index.php';
    }

}