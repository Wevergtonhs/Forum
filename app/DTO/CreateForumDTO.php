<?php

namespace App\DTO;

use App\Http\Requests\StoreRequest;
use App\Services\ForumService;

class CreateForumDTO
{
    public function __construct (
        public string $subject,
        public string $status,
        public string $body,
    ) { }

    public static function makeFromRequest(StoreRequest $request): self
    {
        return new self(
            $request->subject,
            'a',
            $request->body,
        );
    }
}