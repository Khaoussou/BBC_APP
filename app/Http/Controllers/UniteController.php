<?php

namespace App\Http\Controllers;

use App\Http\Resources\UniteResource;
use App\Models\Unite;
use App\Traits\Format;
use Illuminate\Http\Request;
use App\Http\Requests\UnitePostRequest;
use Symfony\Component\HttpFoundation\Response;

class UniteController extends Controller
{
    use Format;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allUnite = UniteResource::collection(Unite::all());
        return $this->response(Response::HTTP_ACCEPTED, "", ["unites" => $allUnite]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UnitePostRequest $request)
    {
        $libelleExist = Unite::getUniteByLibelle($request->libelle)->first();
        if ($libelleExist) {
            return $this->response(Response::HTTP_UNAUTHORIZED, "Cette unité existe deja !", []);
        }
        $newUnite = new UniteResource(Unite::create($request->all()));
        return $this->response(Response::HTTP_ACCEPTED, "Insertion réussie !", [$newUnite]);
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
