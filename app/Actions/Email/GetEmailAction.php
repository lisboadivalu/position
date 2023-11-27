<?php

namespace App\Actions\Email;

use App\Models\Email;

class GetEmailAction
{
    public function handle(string $id)
    {
        return Email::where('id', $id)->first();
    }
}
