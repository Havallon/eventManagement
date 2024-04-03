<?php

namespace App\Repositories\Interfaces;
use App\DTO\Section\CreateSectionDTO;
use App\DTO\Section\UpdateSectionDTO;
use App\Models\Section;
use Illuminate\Database\Eloquent\Collection;

interface SectionRepositoryInterface
{
    public function getAll(): Collection;
    public function getById(string $id): Section;
    public function getAllByEvent(string $eventId): Collection;
    public function create(CreateSectionDTO $dto): Section;
    public function update(UpdateSectionDTO $dto): Section;
    public function delete(string $id): Section;
}