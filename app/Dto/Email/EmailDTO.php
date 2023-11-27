<?php

namespace App\Dto\Email;

use Spatie\LaravelData\Data;

class EmailDTO extends Data
{
    public function __construct(
        public string $id,
        public string $name,
        public string $email
    )
    {
    }
}
