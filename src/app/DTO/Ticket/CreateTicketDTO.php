<?php

namespace App\DTO\Ticket;
use Illuminate\Http\Request;

class CreateTicketDTO
{
    public function __construct(
        public string $type,
        public int $price,
        public int $amount,
        public string $batchId
    ){}
    public static function makeFromRequest(Request $request): self
    {
        return new self(
            $request->type,
            $request->price,
            $request->amount,
            $request->batchId
        );
    }
}