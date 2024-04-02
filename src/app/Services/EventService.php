<?php

namespace App\Services;
use App\DTO\Event\CreateEventDTO;
use App\DTO\Event\UpdateEventDTO;
use App\Enums\UserRole;
use App\Models\Event;
use App\Repositories\Interfaces\EventRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class EventService
{
    public function __construct(
        protected EventRepositoryInterface $repository
    ){}

    public function getAll(Request $request): Collection
    {
        $user = $request->user();
        if ($user->role === UserRole::admin)
        {
            return $this->repository->getAll();
        }
        return $this->repository->getAllByUser($user->id);
    }
    public function getById(string $id): Event
    {
        return $this->repository->getById($id);
    }
    public function create(Request $request): Event
    {
        return $this->repository->create(CreateEventDTO::makeDTO($request, 'teste/teste'));
    }
    public function update(Request $request, $id): Event
    {
        return $this->repository->update(UpdateEventDTO::makeDTO($request, $id));
    }
    public function delete(string $id): Event
    {
        return $this->repository->delete($id);
    }

}