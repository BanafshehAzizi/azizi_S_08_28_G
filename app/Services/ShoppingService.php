<?php


namespace App\Services;


use App\Repositories\ShoppingItemsRepository;
use App\Requests\ShoppingItemDeleteRequest;
use App\Requests\ShoppingItemInsertRequest;

class ShoppingService extends AbstractBaseService
{

    public function repository()
    {
        return ShoppingItemsRepository::class;
    }

    public function insert($input)
    {
        $validation = new ShoppingItemInsertRequest();
        $validation = $validation->rules();
        if ($validation['status'] == 'error') {
            return $validation;
        }
        try {
            $this->insertService($input);
        }catch (\Exception $exception) {
            return ['status' => 'error', 'message' => 'The request has been done unsuccessfully.'];
        }

        return ['status' => 'success', 'message' => 'The request has been done successfully.'];
    }

    public function delete($input)
    {
        $validation = new ShoppingItemDeleteRequest();
        $validation = $validation->rules();
        if ($validation['status'] == 'error') {
            return $validation;
        }
        try {
            $this->deleteService($input);
        }catch (\Exception $exception) {
            var_dump($exception);
            return ['status' => 'success', 'message' => 'The request has been done successfully.'];
        }
        return ['status' => 'success', 'message' => 'The request has been done successfully.'];
    }


}