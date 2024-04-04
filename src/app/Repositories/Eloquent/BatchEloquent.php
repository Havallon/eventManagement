<?php

namespace App\Repositories\Eloquent;
use App\DTO\Batch\CreateBatchDTO;
use App\DTO\Batch\UpdateBatchDTO;
use App\Models\Batch;
use App\Repositories\Interfaces\BatchRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class BatchEloquent implements BatchRepositoryInterface
{
    public function __construct(
        protected Batch $batch
    ){}
    public function getAll(): Collection
    {
        return $this->batch->all();
    }
    public function getById(string $id): Batch
    {
        $batch = $this->batch->findOrFail($id);
        return (object) $batch;
    }
    public function getAllBySection(string $sectionId): Collection
    {
        return $this->batch->where("section_id", $sectionId)->get();
    }
    public function create(CreateBatchDTO $dto): Batch
    {
        $batch = $this->batch->create((array) $dto);
        return $batch;
    }
    public function update(UpdateBatchDTO $dto): Batch
    {
        $batch = $this->batch->findOrFail($dto->id);
        $batch->update((array) $dto);
        return (object) $batch;
    }
    public function delete(string $id): Batch
    {
        $batch = $this->batch->findOrFail($id);
        $batch->delete();
        return (object) $batch;
    }
}