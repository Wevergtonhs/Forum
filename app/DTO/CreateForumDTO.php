<?php

namespace App\DTO;

use App\Http\Requests\StoreRquest;

class CreateForumDTO
{
    public function __construct (
        public string $subject,
        public string $status,
        public string $body,
    ) { }

    public static function makeFromRequest(StoreRequest $request)
    {
        return new self(
            $request->subject,
            'a',
            $request->body,
        );
    }


}