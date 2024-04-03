<?php

namespace App\Http\Resources;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SectionResource extends JsonResource
{
    public function toArray(Request $request)
    {
        return [
            'id'=> $this->id,
            'type'=> $this->type,
            'event_id'=> $this->event_id
        ];
    }
}