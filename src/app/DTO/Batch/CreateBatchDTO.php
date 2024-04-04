<?php

namespace App\DTO\Batch;
use Illuminate\Http\Request;

class CreateBatchDTO
{
    public function __construct(
        public string $order,
        public string $expiration_date,
        public string $sectionId
    ){}

    public static function makeFromRequest(Request $request): self
    {
        return new self(
            $request->order,
            $request->expiration_date,
            $request->section_id
        );
    }
}