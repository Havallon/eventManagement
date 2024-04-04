<?php

namespace App\Http\Controllers;

use App\Http\Resources\BatchResource;
use App\Services\BatchService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BatchController extends Controller
{
    public function __construct(
        protected BatchService $service
    ){}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $batch = $this->service->getAll();
        return BatchResource::collection($batch);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $batch = $this->service->create($request);
        return (new BatchResource($batch))
        ->response()
        ->setStatusCode(Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $batch = $this->service->getById($id);
        return new BatchResource($batch);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $batch = $this->service->update($request, $id);
        return (new BatchResource($batch));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $batch = $this->service->delete($id);
        return new BatchResource($batch);
    }
}
