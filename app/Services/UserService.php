<?php

namespace App\Services;


use App\Repositories\UsersRepository;
use App\Requests\Users\UserLoginRequest;
use App\Requests\Users\UserRegisterRequest;

class UserService extends AbstractBaseService
{
    private $jwt_service;
    public function __construct()
    {
        parent::__construct();
        $this->jwt_service = new JwtService();
    }

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
        } catch (\Exception $exception) {
            return ['status' => 'error', 'message' => 'The request has been done unsuccessfully.'];
        }

        try {
            $response = $this->showService([
                'where' => 'username = "' . $_POST['username'] . '" and password="' . md5($_POST['password']) . '"'
            ]);
        } catch (\Exception $exception) {
            return ['status' => 'error', 'message' => 'The username or password is incorrect.'];
        }

        $token = $this->jwt_service->generateToken($response[0]);
        $response = ['token' => $token];

        return ['status' => 'success', 'message' => 'The request has been done successfully.', 'response' => $response];

//        return ['status' => 'success', 'message' => 'The request has been done successfully.'];
    }

    public function show($input)
    {
//        'where' => 'user_name = "'. $_POST['username'] .'" and password="'. md5($_POST['password']).'"'
        $validation = new UserLoginRequest();
        $validation = $validation->rules();
        if ($validation['status'] == 'error') {
            return $validation;
        }

        try {
            $response = $this->showService([
                'where' => 'username = "' . $_POST['username'] . '" and password="' . md5($_POST['password']) . '"'
            ]);
        } catch (\Exception $exception) {
            return ['status' => 'error', 'message' => 'The username or password is incorrect.'];
        }

        $token = $this->jwt_service->generateToken($response[0]);
        $response = ['token' => $token];

        return ['status' => 'success', 'message' => 'The request has been done successfully.', 'response' => $response];
    }
}