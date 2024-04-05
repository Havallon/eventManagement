<?php

namespace App\DTO\Ticket;
use Illuminate\Http\Request;

class UpdateTicketDTO
{
    public function __construct(
        public string $id,
        public string $type,
        public int $price,
        public int $amount
    ){}
    public static function makeFromRequest(Request $request, string $id): self
    {
        return new self(
            $id,
            $request->type,
            $request->price,
            $request->amount,
        );
    }
}