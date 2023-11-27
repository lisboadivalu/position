<?php

namespace App\UseCases\User;

use App\Actions\User\CreateUserAction;
use App\Actions\User\GetUserByEmailAction;
use App\Dto\User\UserDto;
use App\Jobs\SendAdminEmailJoib;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use PDOException;

class CreateUserUseCase
{
    public function handle(array $data): User
    {
        $user = (new GetUserByEmailAction())->handle($data['email'])->toArray();

        if(!empty($user)) throw new PDOException('User already exists');

        $dtoData = UserDto::from([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ])->toArray();

        $newUser = (new CreateUserAction())->handle($dtoData);

        dispatch( (new SendAdminEmailJoib($data)) );

        return $newUser;
    }
}
