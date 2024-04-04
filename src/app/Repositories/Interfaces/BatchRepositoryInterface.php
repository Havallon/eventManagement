<?php

namespace App\Repositories\Interfaces;
use App\DTO\Batch\CreateBatchDTO;
use App\DTO\Batch\UpdateBatchDTO;
use App\Models\Batch;
use Illuminate\Database\Eloquent\Collection;

interface BatchRepositoryInterface
{
    public function getAll(): Collection;
    public function getById(string $id): Batch;
    public function getAllBySection(string $sectionId): Collection;
    public function create(CreateBatchDTO $dto): Batch;
    public function update(UpdateBatchDTO $dto): Batch;
    public function delete(string $id): Batch;
}