<?php

namespace App\Services;
use App\DTO\Ticket\CreateTicketDTO;
use App\DTO\Ticket\UpdateTicketDTO;
use App\Models\Ticket;
use App\Repositories\Interfaces\TicketsRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class TicketService
{
    public function __construct(
        protected TicketsRepositoryInterface $repository
    ){}

    public function getAll(): Collection
    {
        return $this->repository->getAll();
    }
    public function getById(string $id): Ticket
    {
        return $this->repository->getById($id);
    }
    public function getAllByBatch(string $batchId): Collection
    {
        return $this->repository->getAllByBatch($batchId);
    }
    public function create(Request $request): Ticket
    {
        return $this->repository->create(CreateTicketDTO::makeFromRequest($request));
    }
    public function update(Request $request, string $id): Ticket
    {
        return $this->repository->update(UpdateTicketDTO::makeFromRequest($request, $id));
    }
    public function delete(string $id): Ticket
    {
        return $this->repository->delete($id);
    }
}