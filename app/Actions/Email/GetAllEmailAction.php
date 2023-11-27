<?php

namespace App\Actions\Email;

use App\Models\Email;

class GetAllEmailAction
{
    public function handle()
    {
        return Email::all();
    }
}
