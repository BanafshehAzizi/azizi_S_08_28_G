<?php

namespace App\Controllers;


use App\Services\UserService;
use App\Traits\ResponseTrait;

class AuthController
{
    use ResponseTrait;

    private $user_service;

    public function __construct()
    {
        $this->user_service = new UserService();
    }

    public function viewLogin()
    {
        require_once APP_ROOT . '/views/users/login.php';
    }

    public function login()
    {
        $response = $this->user_service->show([
            'username' => $_POST['username'],
            'password' => md5($_POST['password']),
        ]);
        $this->showResponse($response);
    }
}