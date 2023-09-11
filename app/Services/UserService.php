<?php

namespace App\Services;


use App\Repositories\UsersRepository;
use App\Requests\ShoppingItemInsertRequest;
use App\Requests\Users\UserRegisterRequest;

class UserService extends AbstractBaseService
{

    public function repository()
    {
        return UsersRepository::class;
    }

    public function insert($input)
    {
        $validation = new UserRegisterRequest();
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
}