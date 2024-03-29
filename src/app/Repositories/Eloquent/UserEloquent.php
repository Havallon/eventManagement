<?php

namespace App\Repositories\Eloquent;

use App\DTO\User\CreateUserDTO;
use App\DTO\User\UpdateUserDTO;
use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class UserEloquent implements UserRepositoryInterface
{
    public function __construct(
        protected User $user
    ){}

    public function getAll(): Collection
    {
        return $this->user->all();
    }
    public function getById(string $id): User
    {
        $user = $this->user->find($id);
        return (object) $user;
    }
    public function create(CreateUserDTO $dto): User
    {
        $user = $this->user->create((array) $dto);
        return (object) $user;
    }
    public function update(UpdateUserDTO $dto): User
    {
        $user = $this->user->find($dto->id);
        $user->update((array) $dto);
        return (object) $user;
    }
    public function delete(string $id): User
    {
        $user = $this->user->find($id);
        $user->delete();
        return  (object) $user;
    }
}