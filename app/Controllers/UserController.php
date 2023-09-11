<?php

namespace App\Controllers;



use App\Services\UserService;
use App\Traits\ResponseTrait;

class UserController
{
    use ResponseTrait;

    private $user_service;

    public function __construct()
    {
        $this->user_service = new UserService();
    }

    public function viewRegister()
    {
        require_once APP_ROOT . '/views/users/register.php';
    }

    public function register()
    {
        $response = $this->user_service->insert([
            'username' => $_POST['username'],
            'password' => $_POST['password'],
        ]);
        $this->showResponse($response);
    }
}