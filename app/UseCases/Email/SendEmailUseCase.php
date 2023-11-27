<?php

namespace App\UseCases\Email;

use App\Jobs\SendWelcomeEmailJob;
use App\Models\Email;
use PDOException;

class SendEmailUseCase
{
    public function handle(string $id)
    {
        $emailFound = Email::where('id', $id)->first();

        if(!$emailFound) throw new PDOException("The email wasn't found");

        dispatch(new SendWelcomeEmailJob($emailFound->toArray()));

        return 'the email was sent';
    }
}
