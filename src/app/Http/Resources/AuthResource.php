<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Request;

class AuthResource extends JsonResource
{
    public function toArray(Request $request)
    {
        return [
            'access_token' => $this['token'],
        ];
    }
}