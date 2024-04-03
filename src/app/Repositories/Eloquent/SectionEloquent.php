<?php

namespace App\Repositories\Eloquent;
use App\DTO\Section\CreateSectionDTO;
use App\DTO\Section\UpdateSectionDTO;
use App\Models\Section;
use App\Repositories\Interfaces\SectionRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class SectionEloquent implements SectionRepositoryInterface
{
    public function __construct(
        protected Section $section
    ){}
    public function getAll(): Collection
    {
        return $this->section->all();
    }
    public function getById(string $id): Section
    {
        $section = $this->section->findOrFail($id);
        return (object) $section;
    }
    public function getAllByEvent(string $eventId): Collection
    {
        return $this->section->where("event_id", $eventId)->get();
    }
    public function create(CreateSectionDTO $dto): Section
    {
        $section = $this->section->create((array) $dto);
        return (object) $section;
    }
    public function update(UpdateSectionDTO $dto): Section
    {
        $section = $this->section->findOrFail($dto->id);
        $section->update((array) $dto);
        return (object) $section;
    }
    public function delete(string $id): Section
    {
        $section = $this->section->findOrFail($id);
        $section->delete();
        return (object) $section;
    }
}