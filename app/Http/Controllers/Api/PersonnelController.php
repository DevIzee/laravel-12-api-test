<?php

namespace App\Http\Controllers\Api;

use App\Models\Personnel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PersonnelResource;
use App\Http\Requests\Personnel\StorePersonnelRequest;
use App\Http\Requests\Personnel\UpdatePersonnelRequest;

class PersonnelController extends Controller
{
    /**
     * Display a listing of personnels.
     */
    public function index()
    {
        $personnels = Personnel::with(['user', 'products'])->get();
        return PersonnelResource::collection($personnels);
    }

    /**
     * Store a newly created personnel.
     */
    public function store(StorePersonnelRequest $request)
    {
        $personnel = Personnel::create($request->validated());
        return (new PersonnelResource($personnel->load(['user', 'products'])))->response()->setStatusCode(201);
    }

    /**
     * Display the specified personnel.
     */
    public function show(Personnel $personnel)
    {
        return new PersonnelResource($personnel->load(['user', 'products']));
    }

    /**
     * Update the specified personnel.
     */
    public function update(UpdatePersonnelRequest $request, Personnel $personnel)
    {
        $personnel->update($request->validated());
        return new PersonnelResource($personnel->load(['user', 'products']));
    }

    /**
     * Remove the specified personnel.
     */
    public function destroy(Personnel $personnel)
    {
        $personnel->delete();
        return response()->json(null, 204);
    }
}
