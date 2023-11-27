<?php

namespace App\Actions\Email;

use App\Models\Email;

class CreateEmailAction
{
    public function handle(array $data): Email
    {
        return Email::create($data);
    }
}
