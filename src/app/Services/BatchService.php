<?php

namespace App\Services;
use App\DTO\Batch\CreateBatchDTO;
use App\DTO\Batch\UpdateBatchDTO;
use App\Models\Batch;
use App\Repositories\Interfaces\BatchRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class BatchService
{
    public function __construct(
        protected BatchRepositoryInterface $repository
    ){}

    public function getAll(): Collection
    {
        return $this->repository->getAll();
    }
    public function getById(string $id): Batch
    {
        return $this->repository->getById($id);
    }
    public function getAllBySection(string $sectionId): Collection
    {
        return $this->repository->getAllBySection($sectionId);
    }
    public function create(Request $request): Batch
    {
        return $this->repository->create(CreateBatchDTO::makeFromRequest($request));
    }
    public function update(Request $request, string $id): Batch
    {
        return $this->repository->update(UpdateBatchDTO::makeFromRequest($request, $id));
    }
    public function delete(string $id): Batch
    {
        return $this->repository->delete($id);
    }
}