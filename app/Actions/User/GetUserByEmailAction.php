<?php

namespace App\Actions\User;

use App\Models\User;
use Illuminate\Support\Collection;

class GetUserByEmailAction
{
    public function handle(string $email): Collection
    {
        return User::where('email', $email)->get();
    }
}
