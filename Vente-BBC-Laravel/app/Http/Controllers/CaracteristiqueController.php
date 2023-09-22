<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorecaracteristiqueRequest;
use App\Http\Requests\UpdatecaracteristiqueRequest;
use App\Models\caracteristique;

class CaracteristiqueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $all = caracteristique::all();
        return $all;
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
    public function store(StorecaracteristiqueRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(caracteristique $caracteristique)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(caracteristique $caracteristique)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatecaracteristiqueRequest $request, caracteristique $caracteristique)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(caracteristique $caracteristique)
    {
        //
    }
}
