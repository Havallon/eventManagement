<?php

namespace App\Http\Resources;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BatchResource extends JsonResource
{
    public function toArray(Request $request)
    {
        return [
            "id"=> $this->id,
            "order"=> $this->order,
            "expiration_date"=> $this->expiration_date,
            "section_id"=> $this->section_id
        ];
    }
}