<?php

namespace App\Actions\User;

use App\Models\User;

class CreateUserAction
{
    public function handle(array $data): User
    {
        return User::create($data);
    }
}
