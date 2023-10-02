<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommandePostRequest;
use App\Models\Commande;
use App\Models\Paiement;
use App\Traits\Format;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommandeController extends Controller
{
    use Format;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        $myCommande = [
            "date" => now(),
            "reduction" => $request->reduction ?? null,
            "client_id" => $request->client ?? null,
            "user_id" => $request->user
        ];
        $newCommande = Commande::create($myCommande);
        $paiement = [
            "commande_id" => $newCommande->id,
            "date" => now(),
            "montant" => $request->montant
        ];
        $newPaiement = Paiement::create($paiement);
        foreach ($request->produits as $produit) {
            DB::statement("UPDATE produit_succrusales set quantite = quantite - $produit[qte_commande] where id = $produit[produit_succrusale_id]");
        }
        DB::commit();
        return response([$newCommande, $newPaiement]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
