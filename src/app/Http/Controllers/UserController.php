<?php

namespace App\Http\Controllers;

use App\DTO\User\CreateUserDTO;
use App\DTO\User\UpdateUserDTO;
use App\Http\Resources\UserResource;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{
    public function __construct(
        protected UserService $service
    ){}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = $this->service->getAll();
        return UserResource::collection($users);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = $this->service->create(CreateUserDTO::makeFromRequest($request));
        return (new UserResource($user))
        ->response()
        ->setStatusCode(Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = $this->service->getById($id);
        return new UserResource($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = $this->service->update(UpdateUserDTO::makeFromRequest($request, $id));
        return (new UserResource($user));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = $this->service->delete($id);
        return (new UserResource($user));
    }
}
