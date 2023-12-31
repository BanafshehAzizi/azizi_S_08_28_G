<?php

namespace App\Controllers;



use App\Services\ShoppingService;
use App\Traits\ResponseTrait;


class ShoppingController
{
    use ResponseTrait;

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

    public function list()
    {
        try {
            $items = $this->shopping_service->listService();
            $response = ['status' => 'success', 'message' => 'The request has been done successfully.', 'response' => $items];
        } catch (\Exception $exception) {
            $response = ['status' => 'error', 'message' => 'The request has been done unsuccessfully.'];
        }
        $this->showResponse($response);
    }

    public function insert()
    {
        $response = $this->shopping_service->insert([
            'name' => $_POST['name'],
            'status_id' => 1#not_checked
        ]);
        $this->showResponse($response);
    }

    public function delete()
    {
        $response = $this->shopping_service->delete([
            'id' => $_SERVER['item_id']
        ]);
        $this->showResponse($response);
    }

    public function update()
    {
        $body = file_get_contents("php://input");
        $data = json_decode($body);
        $name = $data->name ?? null;
        $status_id = $data->status_id ?? null;
        $input = [
            'name' => $name,
            'status_id' => $status_id,
            'id' => $_SERVER['item_id']
        ];
        $input = array_filter($input);
        $response = $this->shopping_service->update($input);
        $this->showResponse($response);
    }
}