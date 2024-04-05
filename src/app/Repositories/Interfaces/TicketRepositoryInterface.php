<?php

namespace App\Repositories\Interfaces;
use App\DTO\Ticket\CreateTicketDTO;
use App\DTO\Ticket\UpdateTicketDTO;
use App\Models\Ticket;
use Illuminate\Database\Eloquent\Collection;

interface TicketsRepositoryInterface
{
    public function getAll(): Collection;
    public function getById(string $id): Ticket;
    public function getAllByBatch(string $batchId): Collection;
    public function create(CreateTicketDTO $dto): Ticket;
    public function update(UpdateTicketDTO $dto): Ticket;
    public function delete(string $id): Ticket;
}