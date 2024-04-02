<?php

namespace App\DTO\Event;
use Illuminate\Http\Request;

class CreateEventDTO
{
    public function __construct(
        public string $name,
        public string $banner_url,
        public string $user_id,
    ){}

    public static function makeDTO(Request $request, string $banner_url): self
    {
        return new self(
            $request->name,
            $banner_url,
            $request->user()->id
        );
    }
}