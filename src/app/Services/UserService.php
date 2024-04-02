<?php

namespace App\Services;

use App\DTO\User\CreateUserDTO;
use App\DTO\User\UpdateUserDTO;
use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

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
    public function create(Request $request): User
    {
        return $this->repository->create(CreateUserDTO::makeFromRequest($request));
    }
    public function update(Request $request, string $id): User
    {
        return $this->repository->update(UpdateUserDTO::makeFromRequest($request, $id));
    }
    public function delete(string $id): User
    {
        return $this->repository->delete($id);
    }
}