<?php

namespace App\Repositories\Eloquent;
use App\DTO\Event\CreateEventDTO;
use App\DTO\Event\UpdateEventDTO;
use App\Repositories\Interfaces\EventRepositoryInterface;
use App\Models\Event;
use Illuminate\Database\Eloquent\Collection;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class EventEloquent implements EventRepositoryInterface
{
    public function __construct(
        protected Event $event
    ){}

    public function getAll(): Collection
    {
        return $this->event->all();
    }
    public function getById(string $id): Event
    {
        $event = $this->event->findOrFail($id);
        return (object) $event;
    }
    public function getAllByUser(string $userId): Collection
    {
        return $this->event->where("user_id", $userId)->get();
    }
    public function create(CreateEventDTO $dto): Event
    {
        $event = $this->event->create((array) $dto);
        return (object) $event;
    }
    public function update(UpdateEventDTO $dto): Event
    {
        $event = $this->event->findOrFail($dto->id);
        $event->update($this->removeNullElement((array) $dto));
        return (object) $event;
    }
    public function delete(string $id): Event
    {
        $event = $this->event->findOrFail($id);
        $event->delete();
        return (object) $event;
    }

    private function removeNullElement(array $data): array
    {
        return array_filter($data, function ($value){
            return $value !== null;
        });
    }
}