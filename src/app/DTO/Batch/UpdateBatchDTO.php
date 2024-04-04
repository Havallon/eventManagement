<?php

namespace App\DTO\Batch;
use Illuminate\Http\Request;

class UpdateBatchDTO
{
    public function __construct(
        public string $id,
        public string $order,
        public string $expiration_date,
    ){}

    public static function makeFromRequest(Request $request, $id): self
    {
        return new self(
            $id,
            $request->order,
            $request->expiration_date,
        );
    }
}