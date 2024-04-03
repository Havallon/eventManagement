<?php

namespace App\Services;
use App\DTO\Event\CreateEventDTO;
use App\DTO\Event\UpdateEventDTO;
use App\Enums\UserRole;
use App\Models\Event;
use App\Models\User;
use App\Repositories\Interfaces\EventRepositoryInterface;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class EventService
{
    public function __construct(
        protected EventRepositoryInterface $repository
    ){}

    public function getAll(Request $request): Collection
    {
        $user = $request->user();
        if ($this->isAdmin($user))
        {
            return $this->repository->getAll();
        }
        return $this->repository->getAllByUser($user->id);
    }
    public function getById(Request $request, string $id): Event
    {
        $event = $this->repository->getById($id);
        $user = $request->user();
        if ($this->isAdmin($user))
        {
            return $event;
        }
        if ($event->user_id != $user->id)
        {
            throw new AccessDeniedHttpException("Access Denied");
        }
        return $event;
        
    }
    public function create(Request $request): Event
    {
        $user = $request->user();
        if ($user->role == UserRole::admin || $user->role == UserRole::producer){
            return $this->repository->create(CreateEventDTO::makeDTO($request, 'teste/teste'));
        }
        throw new AccessDeniedHttpException('Access Denied');
    }
    public function update(Request $request, $id): Event
    {
        $user = $request->user();
        $event = $this->repository->getById($id);
        if ($this->isAdmin( $user) || $event->user_id != $user->id)
        {
           return $this->repository->update(UpdateEventDTO::makeDTO($request, $id));
        }
        throw new AccessDeniedHttpException('Access denied');
    }
    public function delete(Request $request, string $id): Event
    {
        $user = $request->user();
        $event = $this->repository->getById($id);
        if ($this->isAdmin( $user) || $event->user_id != $user->id)
        {
           return $this->repository->delete($id);
        }
        throw new AccessDeniedHttpException('Access denied'); 
    }

    private function isAdmin(User $user): bool
    {
        return $user->role === UserRole::admin;
    }
}