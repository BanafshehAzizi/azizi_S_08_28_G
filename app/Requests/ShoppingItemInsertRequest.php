<?php


namespace App\Requests;


class ShoppingItemInsertRequest
{

    public function rules()
    {
        if (empty($_POST['name']) || !preg_match('/^[a-zA-Z][a-zA-Z0-9]*$/', $_POST['name'])) {
            return ['status' => 'error', 'message' => 'The item name field is invalid.'];
        }
        return ['status' => 'success', 'message' => 'The request is valid.'];

    }
}