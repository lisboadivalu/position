<?php

namespace App\UseCases\Email;

use App\Actions\Email\CreateEmailAction;
use App\Dto\Email\EmailDTO;
use App\Models\Email;
use DomainException;
use Illuminate\Support\Str;
use PDOException;


class CreateEmailUseCase
{
    public function handle(array $data): Email
    {
        $validEmail = filter_var($data['email'], FILTER_VALIDATE_EMAIL);
        if(!$validEmail) throw new DomainException('Email invalido');

        $emailFinded = Email::where('email', $data['email'])->first();
        if($emailFinded) throw new PDOException('Email já cadastrado');

        $dtoData = EmailDTO::from([
            'id' => Str::uuid(),
           'email' => $data['email'],
           'name' => $data['name']
        ])->toArray();

        return (new CreateEmailAction())->handle($dtoData);
    }
}
