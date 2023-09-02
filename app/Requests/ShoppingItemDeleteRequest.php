<?php


namespace App\Requests;


class ShoppingItemDeleteRequest
{

    public function __construct()
    {
        $this->rules();
    }

    public function rules()
    {
        if(empty($_SERVER['item_id'])) {
            return ['status' => 'error', 'message' => 'The item id field is required.'];
        }
        return ['status' => 'success', 'message' => 'The request is valid.'];
    }

}