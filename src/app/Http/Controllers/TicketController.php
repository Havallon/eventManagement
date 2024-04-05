<?php

namespace App\Http\Controllers;

use App\Http\Resources\TicketResource;
use App\Services\TicketService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TicketController extends Controller
{
    public function __construct(
        protected TicketService $service
    ){}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tickets = $this->service->getAll();
        return TicketResource::collection($tickets);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $ticket = $this->service->create($request);
        return (new TicketResource($ticket))
        ->response()
        ->setStatusCode(Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, string $id)
    {
        $ticket = $this->service->getById($id);
        return (new TicketResource($ticket));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $ticket = $this->service->update($request, $id);
        return (new TicketResource($ticket));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ticket = $this->service->getById($id);
        return (new TicketResource($ticket));
    }
}
