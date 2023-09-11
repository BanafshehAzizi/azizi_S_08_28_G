<?php

namespace App\Requests\Users;

use App\Models\Users;
use Couchbase\User;

class UserRegisterRequest
{
    public function rules()
    {
        if (empty($_POST['username']) || !preg_match('/^[a-zA-Z][a-zA-Z0-9]*$/', $_POST['username'])) {
            return ['status' => 'error', 'message' => 'The username field is invalid.'];
        }

        if (empty($_POST['password']) || !preg_match('/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/', $_POST['password'])) {
            return ['status' => 'error', 'message' => 'The password field is invalid.'];
        }

        $model = new Users();
        $function = $model->show([
            'column_name' => 'username',
            'column_value' => $_POST['username']
        ]);

        if (!empty($function)) {
            return ['status' => 'error', 'message' => 'The username must be unique.'];
        }

        return ['status' => 'success', 'message' => 'The request is valid.'];
    }
}