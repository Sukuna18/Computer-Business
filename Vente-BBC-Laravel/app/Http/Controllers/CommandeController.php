<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommandeRequest;
use App\Http\Requests\UpdateCommandeRequest;
use App\Models\Commande;
use App\Models\ProduitCommande;
use Illuminate\Support\Facades\DB;

class CommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreCommandeRequest $request)
    {
        DB::beginTransaction();
        $commandes = Commande::create([
            'user_id' => $request->user_id,
            'date_commande' => now(),
            'reduction' => $request->reduction,
        ]);
        ProduitCommande::create([
            'produit_id' => $request->produit_id,
            'commande_id' => $commandes->id,
            'quantite' => $request->quantite,
            'prix_vente' => $request->prix_vente,
            'reduction' => $request->reduction,
        ]);
        DB::commit();
        return $commandes;
    }

    /**
     * Display the specified resource.
     */
    public function show(Commande $commande)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Commande $commande)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCommandeRequest $request, Commande $commande)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Commande $commande)
    {
        //
    }
}
