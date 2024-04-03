<?php

namespace App\DTO\Section;
use Illuminate\Http\Request;

class CreateSectionDTO
{
    public function __construct(
        public string $type,
        public string $eventId
    ){}

    public static function makeFromRequest(Request $request): self
    {
        return new self($request->type, $request->event_id);
    }
}