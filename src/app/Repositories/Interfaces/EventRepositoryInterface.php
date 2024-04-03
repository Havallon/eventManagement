<?php

namespace App\Repositories\Interfaces;
use App\DTO\Event\CreateEventDTO;
use App\DTO\Event\UpdateEventDTO;
use App\Models\Event;
use Illuminate\Database\Eloquent\Collection;

interface EventRepositoryInterface
{
    public function getAll(): Collection;
    public function getById(string $id): Event;
    public function getAllByUser(string $userId): Collection;
    public function create(CreateEventDTO $dto): Event;
    public function update(UpdateEventDTO $dto): Event;
    public function delete(string $id): Event;
}