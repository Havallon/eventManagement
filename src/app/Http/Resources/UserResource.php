<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray(Request $request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'document' => $this->document,
            'phone_number' => $this->phone_number,
            'role' => $this->role,
            'email' => $this->email,
            'created_at' => Carbon::make($this->created_at)->format('Y-m-d')
        ];
    }
}