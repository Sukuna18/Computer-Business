<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSuccursaleRequest;
use App\Http\Requests\UpdateSuccursaleRequest;
use App\Http\Resources\SuccursaleRessource;
use App\Models\Succursale;

class SuccursaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $succursales = Succursale::all();
        return SuccursaleRessource::collection($succursales);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSuccursaleRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Succursale $succursale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Succursale $succursale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSuccursaleRequest $request, Succursale $succursale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Succursale $succursale)
    {
        //
    }
}
