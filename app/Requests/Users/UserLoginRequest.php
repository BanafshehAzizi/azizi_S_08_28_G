<?php

namespace App\Requests\Users;

use App\Models\Users;

class UserLoginRequest
{
    public function rules()
    {
        if (empty($_POST['username']) || !preg_match('/^[a-zA-Z][a-zA-Z0-9]*$/', $_POST['username'])) {
            return ['status' => 'error', 'message' => 'The username field is invalid.'];
        }

        if (empty($_POST['password']) || !preg_match('/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/', $_POST['password'])) {
            return ['status' => 'error', 'message' => 'The password field is invalid.'];
        }

        return ['status' => 'success', 'message' => 'The request is valid.'];
    }
}