<?php

namespace App\DTO\Section;
use Illuminate\Http\Request;

class UpdateSectionDTO
{
    public function __construct(
        public int $id,
        public string $type,
    ){}

    public static function makeFromRequest(Request $request, string $id): self
    {
        return new self($id, $request->type);
    }
}