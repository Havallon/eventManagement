<?php

namespace App\DTO\User;

use Illuminate\Http\Request;

class CreateUserDTO
{
    public function __construct(
        public string $name,
        public string $email,
        public string $document,
        public string $phone_number,
        public string $password,
        public string $role

    ){}

    public static function makeFromRequest(Request $request): self
    {
        return new self(
            $request->name,
            $request->email,
            $request->document,
            $request->phone_number,
            $request->password,
            $request->role
        );
    }
}