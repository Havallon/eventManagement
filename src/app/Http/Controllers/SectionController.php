<?php

namespace App\Http\Controllers;

use App\Http\Resources\SectionResource;
use App\Services\SectionService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SectionController extends Controller
{
    public function __construct(
        protected SectionService $service
    ){}
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $sections = $this->service->getAll($request);
        return SectionResource::collection($sections);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $section = $this->service->create($request);
        return (new SectionResource($section))
        ->response()
        ->setStatusCode(Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, string $id)
    {
        $section = $this->service->getById($request, $id);
        return (new SectionResource($section));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $section = $this->service->update($request, $id);
        return (new SectionResource($section));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $section = $this->service->delete($request, $id);
        return (new SectionResource($section));
    }
}
