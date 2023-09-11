<?php

namespace App\Repositories;

use App\Models\Users;

class UsersRepository extends AbstractBaseRepository
{

    public function model()
    {
        return Users::class;
    }
}