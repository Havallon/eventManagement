<?php

namespace App\Services;
use App\DTO\Section\CreateSectionDTO;
use App\DTO\Section\UpdateSectionDTO;
use App\Enums\UserRole;
use App\Models\Section;
use App\Repositories\Interfaces\SectionRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Symfony\Component\Finder\Exception\AccessDeniedException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class SectionService
{
    public function __construct(
        protected SectionRepositoryInterface $repository,
        protected EventService $eventService
    ){}

    public function getAll(Request $request): Collection
    {
        $user = $request->user();
        if ($user->role === UserRole::admin)
        {
            return $this->repository->getAll();
        }
        throw new AccessDeniedException('Access denied');
    }

    public function getById(Request $request, string $id): Section
    {
        $section = $this->repository->getById($id);
        $user = $request->user();
        if ($user->role === UserRole::admin || $section->event->user_id === $user->id)
        {
            return $section;
        }
        throw new AccessDeniedException('Access Denied');
    }

    public function getAllByEvent(Request $request, string $eventId): Collection
    {
        $sections = $this->repository->getAllByEvent($eventId);
        $event = $this->eventService->getById($request, $eventId);
        $user = $request->user();
        if ($user->role === UserRole::admin || $event->user_id === $user->id)
        {
            return $sections;
        }
        throw new AccessDeniedException('Access Denied');
    }

    public function create(Request $request): Section
    {
        $event = $this->eventService->getById($request, $request->event_id);
        $user = $request->user();
        if ($user->role === UserRole::admin || $event->user_id === $user->id)
        {
            return $this->repository->create(CreateSectionDTO::makeFromRequest($request));
        }
        throw new AccessDeniedException('Access Denied');
    }

    public function update(Request $request, string $id): Section
    {
        $section = $this->repository->getById($id);
        $user = $request->user();
        if ($user->role === UserRole::admin || $section->event->user_id === $user->id)
        {
            return $this->repository->update(UpdateSectionDTO::makeFromRequest($request, $id));
        }
        throw new AccessDeniedException('Access Denied');
    }

    public function delete(Request $request, string $id): Section
    {
        $section = $this->repository->getById($id);
        $user = $request->user();
        if ($user->role === UserRole::admin || $section->event->user_id === $user->id)
        {
            return $this->repository->delete($id);
        }
        throw new AccessDeniedHttpException('Access Denied');
    }
}