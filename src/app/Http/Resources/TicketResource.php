<?php

namespace App\Http\Resources;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TicketResource extends JsonResource
{
    public function toArray(Request $request)
    {
        return [
            "id"=> $this->id,
            "type"=> $this->type,
            "price"=> $this->price,
            "amount"=> $this->amount,
            "batch_id"=> $this->batch_id,
        ];
    }
}