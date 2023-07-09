<?php

namespace App\DTO;

use App\Http\Requests\StoreRquest;

class UpdateForumDTO
{
    public function __construct (
        public string $id,
        public string $subject,
        public string $status,
        public string $body,
    ) { }

    public static function makeFromRequest(StoreRequest $request)
    {
        return new self(
            $request->id,
            $request->subject,
            'a',
            $request->body,
        );
    }


}