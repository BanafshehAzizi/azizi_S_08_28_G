<?php


namespace App\Requests;


use App\Models\ShoppingItems;
use App\Models\ShoppingItemsStatus;

class ShoppingItemUpdateRequest
{

    public function rules()
    {
        $body = file_get_contents("php://input");
        $data = json_decode($body);
        $name = $data->name ?? null;
        $status_id = $data->status_id ?? null;

        if (empty($_SERVER['item_id'])) {
            return ['status' => 'error', 'message' => 'The item id field is required.'];
        }

        $model = new ShoppingItems();
        $function = $model->show(['id' => $_SERVER['item_id']]);
        if (!empty($_SERVER['item_id']) && empty($function)) {
            return ['status' => 'error', 'message' => 'The item id field is invalid.'];
        }

        if (!empty($name) && !preg_match('/^[a-zA-Z][a-zA-Z0-9]*$/', $name)) {
            return ['status' => 'error', 'message' => 'The item name field is invalid.'];
        }

        $model = new ShoppingItemsStatus();
        $function = $model->show(['id' => $status_id]);

        if (!empty($status_id) && empty($function)) {
            return ['status' => 'error', 'message' => 'The item status_id field is invalid.'];
        }

        return ['status' => 'success', 'message' => 'The request is valid.'];

    }
}