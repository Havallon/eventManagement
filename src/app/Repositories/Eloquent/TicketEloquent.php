<?php

namespace App\Repositories\Eloquent;
use App\DTO\Ticket\CreateTicketDTO;
use App\DTO\Ticket\UpdateTicketDTO;
use App\Models\Ticket;
use App\Repositories\Interfaces\TicketsRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class TicketEloquent implements TicketsRepositoryInterface
{
    public function __construct(
        protected Ticket $ticket
    ){}
    public function getAll(): Collection
    {
        return $this->ticket->all();
    }
    public function getById(string $id): Ticket
    {
        $ticket = $this->ticket->findOrFail($id);
        return (object) $ticket;
    }
    public function getAllByBatch(string $batchId): Collection
    {
        return $this->ticket->where('batch_id', $batchId)->get();
    }
    public function create(CreateTicketDTO $dto): Ticket
    {
        $ticket = $this->ticket->create((array) $dto);
        return (object) $ticket;
    }
    public function update(UpdateTicketDTO $dto): Ticket
    {
        $ticket = $this->ticket->findOrFail($dto->id);
        return (object) $ticket;
    }
    public function delete(string $id): Ticket
    {
        $ticket = $this->ticket->findOrFail($id);
        $ticket->delete();
        return (object) $ticket;
    }
}