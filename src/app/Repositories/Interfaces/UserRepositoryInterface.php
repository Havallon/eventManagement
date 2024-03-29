<?php

namespace App\Repositories\Interfaces;

use App\DTO\User\CreateUserDTO;
use App\DTO\User\UpdateUserDTO;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

interface UserRepositoryInterface
{
    public function getAll(): Collection;
    public function getById(string $id): User;
    public function create(CreateUserDTO $dto): User;
    public function update(UpdateUserDTO $dto): User;
    public function delete(string $id): User;
}