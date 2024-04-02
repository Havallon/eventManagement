<?php

namespace App\Http\Controllers;

use App\Http\Resources\EventResource;
use App\Services\EventService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EventController extends Controller
{
    public function __construct(
        protected EventService $service
    ){}
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $events = $this->service->getAll($request);
        return EventResource::collection($events);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $event = $this->service->create($request);
        return (new EventResource($event))
        ->response()
        ->setStatusCode(Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, string $id)
    {
        $event = $this->service->getById($request, $id);
        return new EventResource($event);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = $this->service->update($request, $id);
        return (new EventResource($user));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $event = $this->service->delete($request, $id);
        return (new EventResource($event));
    }
}
