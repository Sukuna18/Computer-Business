<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProduitCaracteristiqueRequest;
use App\Http\Requests\UpdateProduitCaracteristiqueRequest;
use App\Models\ProduitCaracteristique;

class ProduitCaracteristiqueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $all = ProduitCaracteristique::all();
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
    public function store(StoreProduitCaracteristiqueRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ProduitCaracteristique $produitCaracteristique)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProduitCaracteristique $produitCaracteristique)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProduitCaracteristiqueRequest $request, ProduitCaracteristique $produitCaracteristique)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProduitCaracteristique $produitCaracteristique)
    {
        //
    }
}
