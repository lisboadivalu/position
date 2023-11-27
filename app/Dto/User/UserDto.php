<?php

namespace App\Dto\User;

use Spatie\LaravelData\Data;

class UserDto extends Data
{
    public function __construct(
        public string $name,
        public string $email,
        public string $password,
    )
    {

    }
}
