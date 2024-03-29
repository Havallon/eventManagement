<?php

namespace App\Services;

use App\DTO\User\CreateUserDTO;
use App\DTO\User\UpdateUserDTO;
use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class UserService
{
    public function __construct(
        protected UserRepositoryInterface $repository
    ){}

    public function getAll(): Collection
    {
        return $this->repository->getAll();
    }

    public function getById(string $id): User
    {
        return $this->repository->getById($id);
    }
    public function create(CreateUserDTO $dto): User
    {
        return $this->repository->create($dto);
    }
    public function update(UpdateUserDTO $dto): User
    {
        return $this->repository->update($dto);
    }
    public function delete(string $id): User
    {
        return $this->repository->delete($id);
    }
}