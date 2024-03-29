<?php

namespace App\DTO\User;

use Illuminate\Http\Request;

class UpdateUserDTO
{
    public function __construct(
        public string $id,
        public string $name,
        public string $email,
        public string $phone_number,
        public string $role

    ){}

    public static function makeFromRequest(Request $request, string $id): self
    {
        return new self(
            $id,
            $request->name,
            $request->email,
            $request->phone_number,
            $request->role
        );
    }
}